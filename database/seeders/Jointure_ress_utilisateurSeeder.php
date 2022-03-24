<?php

namespace Database\Seeders;

use App\Models\Jointure_ress_utilisateur;
use Faker\Factory as fake;
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
         Jointure_ress_utilisateur::factory(180)->create();
    }
}
