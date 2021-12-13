<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            //
            'bookTitle'=>$this->faker->name,
            'edition'=>$this->faker->numerify('#.#'),
            'authId'=>$this->faker->numberBetween(1,10),
            'catId'=>$this->faker->numberBetween(1,8),
            'totalAvail'=>$this->faker->numberBetween(1,15),
            'totalIss'=>$this->faker->numberBetween(16,20),

        ];

    }
}
