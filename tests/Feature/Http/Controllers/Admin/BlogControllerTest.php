<?php

use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

function validBlogPayload(array $overrides = []): array
{
    return array_merge([
        'baslik' => 'Güvenlik sistemleri için rehber',
        'icerik' => '<p>Güvenliğinizi <strong>doğru sistemlerle</strong> güçlendirin.</p>',
    ], $overrides);
}

it('redirects guests and forbids non administrators', function () {
    $this->get(route('admin.bloglar.index'))
        ->assertRedirectToRoute('admin.login');

    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.bloglar.index'))
        ->assertForbidden();
});

it('renders a searchable, sortable and paginated blog table', function () {
    $admin = User::factory()->admin()->create();
    Blog::factory()->create(['baslik' => 'Kamera güvenliği']);
    Blog::factory()->create(['baslik' => 'Alarm güvenliği']);
    Blog::factory()->count(10)->create();

    $response = $this->actingAs($admin)->get(route('admin.bloglar.index', [
        'search' => 'güvenliği',
        'sort' => 'baslik',
        'direction' => 'asc',
    ]));

    $table = $response->viewData('table');

    $response->assertOk()
        ->assertViewIs('admin.bloglar.index')
        ->assertSee('Kamera güvenliği')
        ->assertSee('Alarm güvenliği');
    expect($table['paginator']->total())->toBe(2)
        ->and($table['paginator']->pluck('baslik')->all())->toBe(['Alarm güvenliği', 'Kamera güvenliği']);
});

it('renders create and edit forms with the HTML editor', function () {
    $admin = User::factory()->admin()->create();
    $blog = Blog::factory()->create(['icerik' => '<p>Mevcut içerik</p>']);

    $this->actingAs($admin)
        ->get(route('admin.bloglar.create'))
        ->assertOk()
        ->assertViewIs('admin.bloglar.create')
        ->assertSee('contenteditable="true"', false)
        ->assertSee('data-editor-command="bold"', false);

    $this->actingAs($admin)
        ->get(route('admin.bloglar.edit', $blog))
        ->assertOk()
        ->assertViewIs('admin.bloglar.edit')
        ->assertSee($blog->baslik);
});

it('creates and sanitizes HTML blog content', function () {
    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->post(route('admin.bloglar.store'), validBlogPayload([
        'icerik' => '<h2>Başlık</h2><script>alert(1)</script><p onclick="bad()">Metin <strong>vurgulu</strong></p><a href="javascript:alert(1)">Kötü bağlantı</a>',
    ]));
    $blog = Blog::query()->latest('id')->firstOrFail();

    $response
        ->assertRedirectToRoute('admin.bloglar.index')
        ->assertSessionHas('status', 'Blog yazısı başarıyla eklendi.');
    expect($blog->icerik)
        ->toContain('<h2>Başlık</h2>')
        ->toContain('<p>Metin <strong>vurgulu</strong></p>')
        ->not->toContain('<script')
        ->not->toContain('onclick')
        ->not->toContain('javascript:');
});

it('rejects empty blog data', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->from(route('admin.bloglar.create'))
        ->post(route('admin.bloglar.store'), [])
        ->assertRedirectToRoute('admin.bloglar.create')
        ->assertSessionHasErrors([
            'baslik' => 'Blog başlığını girin.',
            'icerik' => 'Blog içeriğini girin.',
        ]);
    expect(Blog::query()->count())->toBe(0);
});

it('updates and deletes a blog', function () {
    $admin = User::factory()->admin()->create();
    $blog = Blog::factory()->create(['baslik' => 'Eski başlık']);

    $this->actingAs($admin)
        ->put(route('admin.bloglar.update', $blog), validBlogPayload(['baslik' => 'Yeni başlık']))
        ->assertRedirectToRoute('admin.bloglar.index')
        ->assertSessionHas('status', 'Blog yazısı başarıyla güncellendi.');
    expect($blog->refresh()->baslik)->toBe('Yeni başlık');

    $this->actingAs($admin)
        ->delete(route('admin.bloglar.destroy', $blog))
        ->assertRedirectToRoute('admin.bloglar.index')
        ->assertSessionHas('status', 'Blog yazısı silindi.');
    $this->assertModelMissing($blog);
});
test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
