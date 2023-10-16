<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // The faking library has a large amount of countries, and seeded
        // data is better if schools have country cross over, so will use
        // countries ToucanTech is based in.
        $countries = ['United Kingdom', 'Portugal', 'Australia'];

        return [
            'name' => fake()->city(),
            'country' => $countries[array_rand($countries)],
        ];
    }
}
