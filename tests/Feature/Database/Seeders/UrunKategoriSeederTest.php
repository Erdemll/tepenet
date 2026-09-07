<?php

use App\Models\UrunKategori;
use Database\Seeders\UrunKategoriSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('imports the product categories idempotently', function () {
    $this->seed(UrunKategoriSeeder::class);
    $this->seed(UrunKategoriSeeder::class);

    expect(UrunKategori::query()->orderBy('id')->pluck('baslik', 'slug')->all())->toBe([
        'kablolu-alarm-sistemi' => 'Kablolu Alarm Sistemi',
        'kablosuz-alarm-sistemi' => 'Kablosuz Alarm Sistemi',
        'hd-kamera-sistemleri' => 'HD Güvenlik Kamerası Sistemleri',
        'ip-kamera-sistemleri' => 'IP Kamera Sistemleri',
    ]);
});
