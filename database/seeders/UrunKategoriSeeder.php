<?php

namespace Database\Seeders;

use App\Models\UrunKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrunKategoriSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (UrunKategori::publicCatalog() as $slug => $kategori) {
            UrunKategori::query()->updateOrCreate(
                ['slug' => $slug],
                ['baslik' => $kategori['baslik']],
            );
        }
    }
}
