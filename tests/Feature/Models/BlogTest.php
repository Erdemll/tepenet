<?php

use App\Models\Blog;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('persists blog content in the bloglar table with timestamps', function () {
    $blog = Blog::factory()->create([
        'baslik' => 'Tepenet Güvenlik Rehberi',
        'icerik' => 'Güvenlik sistemleri hakkında bilgilendirici içerik.',
    ]);

    expect($blog->getTable())->toBe('bloglar')
        ->and($blog->getKey())->toBeInt()
        ->and($blog->created_at)->not->toBeNull()
        ->and($blog->updated_at)->not->toBeNull();

    $this->assertModelExists($blog);
    $this->assertDatabaseHas('bloglar', [
        'id' => $blog->getKey(),
        'baslik' => 'Tepenet Güvenlik Rehberi',
        'icerik' => 'Güvenlik sistemleri hakkında bilgilendirici içerik.',
    ]);
});
