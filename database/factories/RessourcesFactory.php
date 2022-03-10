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
            'Nombre_vue' => $this->faker->buildingNumber(),
            'Nombre_like' => $this->faker->buildingNumber(),
            'IdCategorie' => 1,
            'IdType' => 1,
            'IdUtilisateur_createur' => 2,
            'IdEtat' => 1,
            'Lien_ressources' => $this->faker->imageUrl(10,5)
        ];
    }
}
