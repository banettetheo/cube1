<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Contenue' => $this->faker->realText(200),
            'IdRessources' => $this->faker->numberBetween(1,200),
            'IdUser' => $this->faker->numberBetween(1,50),
        ];
    }
}
