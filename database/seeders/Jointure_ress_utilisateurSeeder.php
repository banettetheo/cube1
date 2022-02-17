<?php

namespace Database\Seeders;

use App\Models\Jointure_ress_utilisateur;
use Illuminate\Database\Seeder;

class Jointure_ress_utilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        Jointure_ress_utilisateur::create([
            'IdUtilisateur' => 1,
            'IdRessource' => 1,
        ]);
    }
}
