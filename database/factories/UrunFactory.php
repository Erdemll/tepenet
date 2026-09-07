<?php

namespace Database\Factories;

use App\Models\Urun;
use App\Models\UrunKategori;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Urun>
 */
class UrunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $baslik = fake()->unique()->words(3, true);

        return [
            'baslik' => Str::title($baslik),
            'kategori_id' => UrunKategori::factory(),
            'aciklama' => fake()->paragraph(),
            'urun_kodu' => Str::upper(fake()->unique()->bothify('TP-####-??')),
            'resim_yolu' => 'urunler/'.fake()->unique()->lexify('????????').'.jpg',
            'slug' => Str::slug($baslik).'-'.fake()->unique()->numberBetween(1000, 9999),
        ];
    }
}
