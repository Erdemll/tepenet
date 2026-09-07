<?php

use App\Models\Urun;
use App\Models\UrunKategori;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('connects products to their category in both directions', function () {
    $kategori = UrunKategori::factory()->create();
    $urunler = Urun::factory()->count(2)->for($kategori, 'kategori')->create();

    expect($kategori->urunler()->pluck('id')->all())->toBe($urunler->pluck('id')->all())
        ->and($urunler->first()->kategori->is($kategori))->toBeTrue();
});

it('uses the slug for route model binding', function () {
    $urun = Urun::factory()->create([
        'slug' => 'kablolu-alarm-paneli',
    ]);

    expect($urun->getRouteKeyName())->toBe('slug')
        ->and($urun->getRouteKey())->toBe('kablolu-alarm-paneli');
});

it('uses the category slug for route model binding', function () {
    $kategori = UrunKategori::factory()->create([
        'slug' => 'hd-kamera-sistemleri',
    ]);

    expect($kategori->getRouteKeyName())->toBe('slug')
        ->and($kategori->getRouteKey())->toBe('hd-kamera-sistemleri');
});
