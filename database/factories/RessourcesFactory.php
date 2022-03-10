<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RessourcesFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Titre' => $this->faker->sentence(),
            'Contenue' => $this->faker->text(200),
            'created_at' => $this->faker->dateTimeBetween('-10 years','now'),
            'updated_at' => null,
            'Nombre_vue' => $this->faker->buildingNumber(),
            'Nombre_like' => $this->faker->buildingNumber(),
            'IdCategorie' => $this->faker->numberBetween(1,13),
            'IdType' => $this->faker->numberBetween(1,9),
            'IdUtilisateur_createur' => $this->faker->numberBetween(1,50),
            'IdEtat' =>  $this->faker->numberBetween(1,5),
            'Lien_ressources' => $this->faker->imageUrl(10,5)
        ];
    }
}
