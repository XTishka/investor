<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class RoundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->text(),
            'start_round_date' => $this->faker->date(),
            'end_wishes_date' => $this->faker->date(),
            'end_round_date' => $this->faker->date(),
        ];
    }
}
