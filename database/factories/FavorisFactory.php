<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FavorisFactory extends Factory
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
            'Utilisateur_id' => $this->faker->numberBetween(1,50),
            'IdRessources' => $this->faker->numberBetween(1,180),
            'Type_favoris_id' => $this->faker->numberBetween(1,3)
        ];
    }
}
