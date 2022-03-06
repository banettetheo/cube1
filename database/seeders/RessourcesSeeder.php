<?php

namespace Database\Seeders;

use App\Models\Ressources;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Integer;

class RessourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ressources::create([
            'Lien_ressources' => 'Lien:'.Str::random(5),
            'Titre' => 'Titre:'.Str::random(5),
            'Contenue' => 'contenu:'.Str::random(5),
            'Nombre_vue' => rand(1,999),
            'Nombre_like' => rand(1,999),
            'IdCategorie' => 1,
            'IdType' => 1,
            'IdUtilisateur_createur' => 2,
            'IdEtat' => 1,
        ]);
    }
}
