<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitant>
 */
class HabitantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cin' => $this->faker->unique()->randomNumber(8),
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'ville_id' => Ville::factory(),
            'photo' => $this->faker->imageUrl(640, 480, 'people', true)
        ];
    }
}
