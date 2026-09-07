<?php

namespace Database\Factories;

use App\Models\UrunKategori;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<UrunKategori>
 */
class UrunKategoriFactory extends Factory
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
            'slug' => Str::slug($baslik).'-'.fake()->unique()->numberBetween(1000, 9999),
        ];
    }
}
