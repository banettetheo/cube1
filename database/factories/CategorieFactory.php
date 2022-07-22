<?php

namespace Database\Factories;
use Faker\Generator as Faker;
use App\Http\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nom' => $this->faker->word(),
        ];
    }
}
