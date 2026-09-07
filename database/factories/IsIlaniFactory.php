<?php

namespace Database\Factories;

use App\Models\IsIlani;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<IsIlani>
 */
class IsIlaniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->jobTitle();

        return [
            'slug' => Str::slug($title).'-'.fake()->unique()->numberBetween(1000, 9999),
            'title' => $title,
            'summary' => fake()->sentence(10),
            'type' => fake()->randomElement(array_keys(IsIlani::typeLabels())),
            'cities' => fake()->randomElements(
                ['Ankara', 'Antalya', 'Bursa', 'İstanbul', 'İzmir', 'Konya', 'Mersin'],
                fake()->numberBetween(1, 3),
            ),
            'employment_type' => 'Tam zamanlı',
            'application_deadline' => fake()->dateTimeBetween('+1 week', '+6 months'),
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}
