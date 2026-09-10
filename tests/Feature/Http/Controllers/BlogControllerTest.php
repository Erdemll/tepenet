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

it('renders a sanitized blog detail page', function () {
    $blog = Blog::factory()->create([
        'baslik' => 'Ev güvenliği rehberi',
        'icerik' => '<h2>Güvenli başlangıç</h2><script>alert(1)</script><p>Detaylı <strong>bilgi</strong>.</p><a href="javascript:alert(1)">Bağlantı</a>',
    ]);

    $response = $this->get(route('bloglar.show', $blog));

    $response->assertOk()
        ->assertViewIs('bloglar.show')
        ->assertSee($blog->baslik)
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
