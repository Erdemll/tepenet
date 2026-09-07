<?php

use App\Models\Urun;
use App\Models\UrunKategori;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('renders a product detail from its system category and product slugs', function () {
    $kategori = UrunKategori::factory()->create([
        'baslik' => 'Kablolu Alarm Sistemi',
        'slug' => 'kablolu-alarm-sistemi',
    ]);
    $urun = Urun::factory()->for($kategori, 'kategori')->create([
        'baslik' => 'Deneme Alarm Paneli',
        'slug' => 'deneme-urun-3',
        'urun_kodu' => 'TP-DENEME-3',
        'aciklama' => 'Ev ve iş yerleri için örnek alarm paneli açıklaması.',
        'resim_yolu' => 'urunler/deneme-alarm-paneli.png',
    ]);

    $response = $this->get(route('urunler-ve-hizmetler.urun-detay', [
        'sistem' => 'alarm-sistemleri',
        'urunKategori' => $kategori,
        'urun' => $urun,
    ]));

    $response
        ->assertOk()
        ->assertViewIs('urun_detay')
        ->assertViewHas('urunKategori', fn (UrunKategori $viewKategori): bool => $viewKategori->is($kategori))
        ->assertViewHas('urun', fn (Urun $viewUrun): bool => $viewUrun->is($urun))
        ->assertSeeText('Kablolu Alarm Sistemi')
        ->assertSeeText('Deneme Alarm Paneli')
        ->assertSeeText('TP-DENEME-3')
        ->assertSeeText('Ev ve iş yerleri için örnek alarm paneli açıklaması.')
        ->assertSeeText('Bu Ürün Hakkında Bilgi Al')
        ->assertSee(route('iletisim'), false)
        ->assertSee($urun->resimUrl(), false);
});

it('links products on the category page to their canonical detail route', function () {
    $kategori = UrunKategori::factory()->create([
        'baslik' => 'HD Güvenlik Kamerası Sistemleri',
        'slug' => 'hd-kamera-sistemleri',
    ]);
    $urun = Urun::factory()->for($kategori, 'kategori')->create([
        'slug' => 'hd-kamera-deneme',
        'resim_yolu' => null,
    ]);

    $detailUrl = route('urunler-ve-hizmetler.urun-detay', [
        'sistem' => 'kamera-sistemleri',
        'urunKategori' => $kategori,
        'urun' => $urun,
    ]);

    $this->get(route('urunler-ve-hizmetler.kategori', [
        'sistem' => 'kamera-sistemleri',
        'urunKategori' => $kategori,
    ]))
        ->assertOk()
        ->assertSee($detailUrl, false);
});

it('returns not found when the product does not belong to the category in the url', function () {
    $kabloluKategori = UrunKategori::factory()->create([
        'baslik' => 'Kablolu Alarm Sistemi',
        'slug' => 'kablolu-alarm-sistemi',
    ]);
    $kablosuzKategori = UrunKategori::factory()->create([
        'baslik' => 'Kablosuz Alarm Sistemi',
        'slug' => 'kablosuz-alarm-sistemi',
    ]);
    $kablosuzUrun = Urun::factory()->for($kablosuzKategori, 'kategori')->create([
        'slug' => 'kablosuz-alarm-paneli',
    ]);

    $this->get(route('urunler-ve-hizmetler.urun-detay', [
        'sistem' => 'alarm-sistemleri',
        'urunKategori' => $kabloluKategori,
        'urun' => $kablosuzUrun,
    ]))->assertNotFound();
});

it('returns not found when the category is requested under the wrong system path', function () {
    $kategori = UrunKategori::factory()->create([
        'baslik' => 'Kablolu Alarm Sistemi',
        'slug' => 'kablolu-alarm-sistemi',
    ]);
    $urun = Urun::factory()->for($kategori, 'kategori')->create();

    $this->get(route('urunler-ve-hizmetler.urun-detay', [
        'sistem' => 'kamera-sistemleri',
        'urunKategori' => $kategori,
        'urun' => $urun,
    ]))->assertNotFound();
});

it('escapes product content on the public detail page', function () {
    $kategori = UrunKategori::factory()->create([
        'baslik' => 'IP Kamera Sistemleri',
        'slug' => 'ip-kamera-sistemleri',
    ]);
    $urun = Urun::factory()->for($kategori, 'kategori')->create([
        'baslik' => 'IP Kamera <script>alert(1)</script>',
        'slug' => 'guvenli-ip-kamera',
        'urun_kodu' => 'TP-<script>alert(2)</script>',
        'aciklama' => 'Açıklama <script>alert(3)</script>',
        'resim_yolu' => null,
    ]);

    $response = $this->get(route('urunler-ve-hizmetler.urun-detay', [
        'sistem' => 'kamera-sistemleri',
        'urunKategori' => $kategori,
        'urun' => $urun,
    ]));

    $response
        ->assertOk()
        ->assertSeeText('Ürün görseli')
        ->assertDontSee('<script>alert(1)</script>', false)
        ->assertDontSee('<script>alert(2)</script>', false)
        ->assertDontSee('<script>alert(3)</script>', false);
});
