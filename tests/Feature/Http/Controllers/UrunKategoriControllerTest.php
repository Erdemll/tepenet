<?php

use App\Models\Urun;
use App\Models\UrunKategori;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('lists only the products belonging to the requested public category', function (
    string $kategoriBasligi,
    string $kategoriSlug,
    string $sistem,
) {
    $kategori = UrunKategori::factory()->create([
        'baslik' => $kategoriBasligi,
        'slug' => $kategoriSlug,
    ]);
    $urun = Urun::factory()->for($kategori, 'kategori')->create([
        'baslik' => "{$kategoriBasligi} Test Ürünü",
        'urun_kodu' => 'TP-KATEGORI-01',
        'resim_yolu' => null,
    ]);
    $digerUrun = Urun::factory()->create([
        'baslik' => 'Başka Kategorinin Ürünü',
        'resim_yolu' => null,
    ]);

    $response = $this->get(route('urunler-ve-hizmetler.kategori', [
        'sistem' => $sistem,
        'urunKategori' => $kategori,
    ]));

    $response
        ->assertOk()
        ->assertViewIs('urunler')
        ->assertViewHas('urunKategori', fn (UrunKategori $viewKategori): bool => $viewKategori->is($kategori))
        ->assertViewHas('urunler', fn ($urunler): bool => $urunler->count() === 1 && $urunler->first()->is($urun))
        ->assertSeeText($kategoriBasligi)
        ->assertSeeText($urun->baslik)
        ->assertSeeText($urun->urun_kodu)
        ->assertDontSeeText($digerUrun->baslik);
})->with([
    'kablolu alarm' => ['Kablolu Alarm Sistemi', 'kablolu-alarm-sistemi', 'alarm-sistemleri'],
    'kablosuz alarm' => ['Kablosuz Alarm Sistemi', 'kablosuz-alarm-sistemi', 'alarm-sistemleri'],
    'hd kamera' => ['HD Güvenlik Kamerası Sistemleri', 'hd-kamera-sistemleri', 'kamera-sistemleri'],
    'ip kamera' => ['IP Kamera Sistemleri', 'ip-kamera-sistemleri', 'kamera-sistemleri'],
]);

it('returns not found when a category is requested under the wrong system path', function () {
    $kategori = UrunKategori::factory()->create([
        'baslik' => 'HD Güvenlik Kamerası Sistemleri',
        'slug' => 'hd-kamera-sistemleri',
    ]);

    $this->get(route('urunler-ve-hizmetler.kategori', [
        'sistem' => 'alarm-sistemleri',
        'urunKategori' => $kategori,
    ]))->assertNotFound();
});

it('links category cards to their canonical product listing routes', function () {
    $this->get(route('urunler-ve-hizmetler.alarm-sistemleri'))
        ->assertOk()
        ->assertSee(route('urunler-ve-hizmetler.kategori', [
            'sistem' => 'alarm-sistemleri',
            'urunKategori' => 'kablolu-alarm-sistemi',
        ]), false)
        ->assertSee(route('urunler-ve-hizmetler.kategori', [
            'sistem' => 'alarm-sistemleri',
            'urunKategori' => 'kablosuz-alarm-sistemi',
        ]), false);

    $this->get(route('urunler-ve-hizmetler.kamera-sistemleri'))
        ->assertOk()
        ->assertSee(route('urunler-ve-hizmetler.kategori', [
            'sistem' => 'kamera-sistemleri',
            'urunKategori' => 'hd-kamera-sistemleri',
        ]), false)
        ->assertSee(route('urunler-ve-hizmetler.kategori', [
            'sistem' => 'kamera-sistemleri',
            'urunKategori' => 'ip-kamera-sistemleri',
        ]), false);
});
