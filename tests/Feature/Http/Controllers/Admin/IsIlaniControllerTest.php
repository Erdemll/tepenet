<?php

use App\Models\IsIlani;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

function validIsIlaniPayload(array $overrides = []): array
{
    return array_merge([
        'title' => 'Konya Özel Güvenlik Görevlisi',
        'slug' => '',
        'summary' => 'Konya projelerimiz için özel güvenlik görevlileri arıyoruz.',
        'type' => IsIlani::TYPE_SECURITY_OFFICER,
        'cities' => "Konya\nKaraman, Aksaray",
        'employment_type' => 'Tam zamanlı',
        'application_deadline' => '2026-12-31',
        'is_active' => '1',
    ], $overrides);
}

it('redirects guests and forbids non administrators', function () {
    $this->get(route('admin.is-ilanlari.index'))
        ->assertRedirectToRoute('admin.login');

    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.is-ilanlari.index'))
        ->assertForbidden();
});

it('renders the reusable paginated table for administrators', function () {
    $admin = User::factory()->admin()->create();
    IsIlani::factory()->count(12)->create();

    $response = $this->actingAs($admin)
        ->get(route('admin.is-ilanlari.index'));

    $response
        ->assertOk()
        ->assertViewIs('admin.is-ilanlari.index')
        ->assertSee('Toplam 12 kaydın')
        ->assertSee('Tablonun diğer sütunları için yana kaydırın.')
        ->assertSee('role="region" aria-label="Kayıt tablosu"', false);
    expect($response->viewData('table')['paginator'])
        ->toHaveCount(10)
        ->total()->toBe(12);
});

it('searches records and sorts only by allowed columns', function () {
    $admin = User::factory()->admin()->create();
    IsIlani::factory()->create([
        'title' => 'Zulu İlanı',
        'cities' => ['Ankara'],
    ]);
    IsIlani::factory()->create([
        'title' => 'Alfa İlanı',
        'cities' => ['Konya'],
    ]);
    IsIlani::factory()->create([
        'title' => 'Beta İlanı',
        'cities' => ['Konya'],
    ]);

    $response = $this->actingAs($admin)->get(route('admin.is-ilanlari.index', [
        'search' => 'Konya',
        'sort' => 'title',
        'direction' => 'asc',
    ]));
    $table = $response->viewData('table');

    $response->assertOk();
    expect($table['paginator']->pluck('title')->all())
        ->toBe(['Alfa İlanı', 'Beta İlanı']);

    $unsafeResponse = $this->actingAs($admin)->get(route('admin.is-ilanlari.index', [
        'sort' => 'title; DROP TABLE users',
        'direction' => 'sideways',
    ]));

    expect($unsafeResponse->viewData('table'))
        ->sort->toBe('created_at')
        ->direction->toBe('desc');
});

it('renders create and edit forms', function () {
    $admin = User::factory()->admin()->create();
    $isIlani = IsIlani::factory()->create();

    $this->actingAs($admin)
        ->get(route('admin.is-ilanlari.create'))
        ->assertOk()
        ->assertViewIs('admin.is-ilanlari.create')
        ->assertSee('Yeni İş İlanı');

    $this->actingAs($admin)
        ->get(route('admin.is-ilanlari.edit', $isIlani))
        ->assertOk()
        ->assertViewIs('admin.is-ilanlari.edit')
        ->assertSee($isIlani->title);
});

it('creates an active job and normalizes its slug and cities', function () {
    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)
        ->post(route('admin.is-ilanlari.store'), validIsIlaniPayload());
    $isIlani = IsIlani::query()->where('slug', 'konya-ozel-guvenlik-gorevlisi')->firstOrFail();

    $response
        ->assertRedirectToRoute('admin.is-ilanlari.index')
        ->assertSessionHas('status', 'İş ilanı başarıyla eklendi.');
    expect($isIlani->cities)->toBe(['Konya', 'Karaman', 'Aksaray'])
        ->and($isIlani->is_active)->toBeTrue();
});

it('rejects invalid job data with user facing messages', function () {
    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)
        ->from(route('admin.is-ilanlari.create'))
        ->post(route('admin.is-ilanlari.store'), []);

    $response
        ->assertRedirectToRoute('admin.is-ilanlari.create')
        ->assertSessionHasErrors([
            'title' => 'İlan başlığını girin.',
            'slug' => 'İlan bağlantısını girin.',
            'summary' => 'İlan özetini girin.',
            'type' => 'Pozisyon tipini seçin.',
            'cities' => 'En az bir şehir girin.',
            'employment_type' => 'Çalışma şeklini girin.',
        ]);
    expect(IsIlani::query()->count())->toBe(0);
});

it('updates a job without allowing unexpected attributes', function () {
    $admin = User::factory()->admin()->create();
    $isIlani = IsIlani::factory()->create([
        'title' => 'Eski Başlık',
        'is_active' => true,
    ]);

    $response = $this->actingAs($admin)->put(
        route('admin.is-ilanlari.update', $isIlani),
        validIsIlaniPayload([
            'title' => 'Yeni Başlık',
            'slug' => $isIlani->slug,
            'is_active' => '0',
            'deleted_at' => now()->toDateTimeString(),
        ]),
    );

    $response
        ->assertRedirectToRoute('admin.is-ilanlari.index')
        ->assertSessionHas('status', 'İş ilanı başarıyla güncellendi.');
    expect($isIlani->refresh())
        ->title->toBe('Yeni Başlık')
        ->is_active->toBeFalse()
        ->deleted_at->toBeNull();
});

it('soft deletes a job', function () {
    $admin = User::factory()->admin()->create();
    $isIlani = IsIlani::factory()->create();

    $response = $this->actingAs($admin)
        ->delete(route('admin.is-ilanlari.destroy', $isIlani));

    $response
        ->assertRedirectToRoute('admin.is-ilanlari.index')
        ->assertSessionHas('status', 'İş ilanı silindi.');
    $this->assertSoftDeleted($isIlani);
});
