<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Categorie::create([
        //     'Nom' => 'test:'.Str::random(5),
        // ]);
        Categorie::create([
            'Nom' => "Communication",
        ]);
        Categorie::create([
            'Nom' => "Cultures",
        ]);
        Categorie::create([
            'Nom' => "Développement personnel",
        ]);
        Categorie::create([
            'Nom' => "Intelligence émotionnelle",
        ]);
        Categorie::create([
            'Nom' => "Loisirs",
        ]);
        Categorie::create([
            'Nom' => "Monde professionnel",
        ]);
        Categorie::create([
            'Nom' => "Parentalité",
        ]);
        Categorie::create([
            'Nom' => "Qualité de vie",
        ]);
        Categorie::create([
            'Nom' => "Recherche de sens",
        ]);
        Categorie::create([
            'Nom' => "Santé physique",
        ]);
        Categorie::create([
            'Nom' => "Santé psychique",
        ]);
        Categorie::create([
            'Nom' => "Spiritualité",
        ]);
        Categorie::create([
            'Nom' => "Vie affective",
        ]);
    }
}
