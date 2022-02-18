<?php

namespace Database\Seeders;

use App\Models\Type_ressource;
use Illuminate\Database\Seeder;

class Type_ressourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Type_ressource::create([
            'Nom' => 'Activité / Jeu a réaliser',
        ]);

        Type_ressource::create([
            'Nom' => 'Article',
        ]);

        Type_ressource::create([
            'Nom' => 'Carte defi',
        ]);

        Type_ressource::create([
            'Nom' => 'Cours au format PDF',
        ]);

        Type_ressource::create([
            'Nom' => 'Exercice',
        ]);

        Type_ressource::create([
            'Nom' => 'Fiche de lecture',
        ]);

        Type_ressource::create([
            'Nom' => 'Jeu en ligne',
        ]);

        Type_ressource::create([
            'Nom' => 'Video',
        ]);
    }
}
