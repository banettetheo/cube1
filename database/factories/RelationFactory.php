<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RelationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'IdUser1' => $this->faker->numberBetween(1,50),
            'IdUser2' => $this->faker->numberBetween(1,50),
            'IdTypeRelation' => $this->faker->numberBetween(1,5),
        ];
    }
}
