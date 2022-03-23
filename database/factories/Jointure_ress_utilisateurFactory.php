<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Jointure_ress_utilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'IdUtilisateur' => $this->faker->numberBetween(1,50),
            'IdRessource' => $this->faker->numberBetween(1,200)
        ];
    }
}
