<?php

namespace Database\Factories;

use App\Models\Wish;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class WishesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            Wish::factory(1)->create([
                'week_id' => '',
                'user_id' => '',
                'wishes' => ''
            ])
        ];
    }
}
