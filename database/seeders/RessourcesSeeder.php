<?php

namespace Database\Seeders;

use App\Models\Ressources as ModelsRessources;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RessourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsRessources::create([
            'Lien_ressources' => 'Lien:'.Str::random(5),
            'Type' => 'Type:'.Str::random(5),
            'IdCategorie' => 1,
        ]);
    }
}
