<?php

use App\Models\Blog;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('renders published blogs with pagination and links to their detail pages', function () {
    $blogs = Blog::factory()->count(10)->create();

    $response = $this->get(route('bloglar.index'));

    $response->assertOk()
        ->assertViewIs('bloglar.index')
        ->assertSee('Bloglar')
        ->assertSee(route('bloglar.show', $blogs->first()), false);
    expect($response->viewData('blogs'))->toHaveCount(9)->total()->toBe(10);
});

it('filters blogs by title or content and retains filters in pagination links', function () {
    Blog::factory()->count(9)->sequence(fn ($sequence) => [
        'baslik' => "Alarm rehberi {$sequence->index}",
        'icerik' => 'Kamera ve alarm sistemleri için uygulama rehberi.',
    ])->create();
    Blog::factory()->create([
        'baslik' => 'Kamera teknolojileri',
        'icerik' => 'Alarm sistemleriyle entegre kamera rehberi.',
    ]);
    Blog::factory()->create([
        'baslik' => 'Ev güvenliği',
        'icerik' => 'Bu içerik yalnızca kamera kurulumundan bahseder.',
    ]);

    $response = $this->get(route('bloglar.index', [
        'search' => 'Alarm',
        'sort' => 'oldest',
    ]));

    $response->assertSee('Alarm rehberi 1')
        ->assertSee('Kamera teknolojileri')
        ->assertDontSee('Ev güvenliği')
        ->assertSee('Blog sayfaları')
        ->assertSee('search=Alarm&amp;sort=oldest&amp;page=2', false);

    $blogs = $response->viewData('blogs');

    expect($blogs)->toHaveCount(9)->total()->toBe(10)
        ->and($blogs->nextPageUrl())->toContain('search=Alarm')
        ->toContain('sort=oldest');
});

it('sorts blogs by the selected ordering and falls back to newest for unknown values', function () {
    $oldest = Blog::factory()->create([
        'baslik' => 'İlk yayınlanan yazı',
        'created_at' => now()->subDays(2),
    ]);
    $newest = Blog::factory()->create([
        'baslik' => 'Son yayınlanan yazı',
        'created_at' => now()->subDay(),
    ]);

    $oldestResponse = $this->get(route('bloglar.index', ['sort' => 'oldest']));
    $unknownSortResponse = $this->get(route('bloglar.index', ['sort' => 'created_at desc']));

    expect($oldestResponse->viewData('blogs')->pluck('id')->all())->toBe([$oldest->id, $newest->id])
        ->and($unknownSortResponse->viewData('blogs')->pluck('id')->all())->toBe([$newest->id, $oldest->id])
        ->and($unknownSortResponse->viewData('sort'))->toBe('newest');
});

it('renders a sanitized blog detail page', function () {
    $blog = Blog::factory()->create([
        'baslik' => 'Ev güvenliği rehberi',
        'icerik' => '<h2>Güvenli başlangıç</h2><script>alert(1)</script><p>Detaylı <strong>bilgi</strong>.</p><a href="javascript:alert(1)">Bağlantı</a>',
    ]);

    $response = $this->get(route('bloglar.show', $blog));

    $response->assertOk()
        ->assertViewIs('bloglar.show')
        ->assertSee($blog->baslik)
        ->assertSee('YAYIN BİLGİSİ')
        ->assertSee('Tüm blog yazıları')
        ->assertSee('<h2>Güvenli başlangıç</h2>', false)
        ->assertSee('<p>Detaylı <strong>bilgi</strong>.</p>', false)
        ->assertDontSee('alert(1)', false)
        ->assertDontSee('javascript:', false);
});

it('returns not found for an unknown blog', function () {
    $this->get(route('bloglar.show', 999999))->assertNotFound();
});
test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
