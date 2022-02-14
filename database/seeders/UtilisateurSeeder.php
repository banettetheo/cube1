<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Utilisateur;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Utilisateur::create([
            'Prenom' => 'Bebere_'.Str::random(5),
            'Nom' => 'De_'.Str::random(5),
            'Moderateur' => 1,

        ]);
    }
}
