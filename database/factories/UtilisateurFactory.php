<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UtilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $nom = $this->faker->lastName();
        return [
            'Prenom' => $this->faker->firstName(),
            'Nom'=> $nom,
            'Email'=> strtolower($nom). '.' . $this->faker->numberBetween(0,999) . '@' . $this->faker->freeEmailDomain(),
            'password' => $this->faker->password(),
            'Moderateur' => $this->faker->boolean(20),
            'Compte_ban' => $this->faker->boolean(20),
        ];
    }


}
