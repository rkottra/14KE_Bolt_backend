<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Termek>
 */
class TermekFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nev" => fake()->sentence,
            "leiras" => fake()->text,
            "ar" => rand(100,1000),
            "kedvezmeny" => rand(0, 100)>90 ? 0.2 : 0,
        ];
    }
}
