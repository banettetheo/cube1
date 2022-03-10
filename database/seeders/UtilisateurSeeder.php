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
        Utilisateur::factory(50)->create();
        //
        // Utilisateur::create([
        //     'Prenom' => 'Bebere_'.Str::random(5),
        //     'Nom' => 'De_'.Str::random(5),
        //     'Moderateur' => 1,
        //     'email' => 'Bebere@gmail.com',
        //     'password' => 'motdepasse',

        // ]);

        // Utilisateur::create([
        //     'Prenom' => 'Jacline_'.Str::random(5),
        //     'Nom' => 'De_'.Str::random(5),
        //     'Moderateur' => 1,
        //     'email' => 'Jacline@gmail.com',
        //     'password' => 'motdepasse',

        // ]);
    }
}
