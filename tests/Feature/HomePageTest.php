<?php

use App\Models\Blog;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('renders the three newest blog previews with their detail links', function () {
    Blog::factory()->create([
        'baslik' => 'Eski güvenlik rehberi',
        'created_at' => now()->subDays(4),
    ]);
    $blogs = Blog::factory()->count(3)->sequence(
        ['baslik' => 'Birinci yeni rehber', 'created_at' => now()->subDays(3)],
        ['baslik' => 'İkinci yeni rehber', 'created_at' => now()->subDays(2)],
        ['baslik' => 'En yeni güvenlik rehberi', 'created_at' => now()->subDay()],
    )->create();

    $response = $this->get(route('home'));

    $response->assertOk()
        ->assertViewIs('index')
        ->assertSee('En yeni güvenlik rehberi')
        ->assertSee('İkinci yeni rehber')
        ->assertSee('Birinci yeni rehber')
        ->assertDontSee('Eski güvenlik rehberi')
        ->assertSee(route('bloglar.show', $blogs->last()), false)
        ->assertSee('id="home-blog-carousel"', false)
        ->assertSee('data-bs-slide-to="2"', false)
        ->assertSee('Önceki blog yazısı');
    expect($response->viewData('blogs')->pluck('id')->all())->toBe([
        $blogs->last()->id,
        $blogs->get(1)->id,
        $blogs->first()->id,
    ]);
});

it('renders the waiting state when there are no blog posts', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertSee('Yeni güvenlik notları hazırlanıyor.');
});
