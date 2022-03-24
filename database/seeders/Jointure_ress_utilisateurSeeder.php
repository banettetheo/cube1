<?php

namespace Database\Seeders;

use App\Models\Jointure_ress_utilisateur;
use Faker\Factory as fake;
use Illuminate\Database\Seeder;
use App\Models\Commentaire;

class Jointure_ress_utilisateurSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
         Commentaire::factory(180)->create();
         $faker = fake::create();
        $ress = Jointure_ress_utilisateur::factory(180)->create();

        foreach($ress as $value)
        {
            Commentaire::create([
                'Contenue' => $faker->realText(200),
                'IdUser' =>$value->IdUtilisateur,
                'IdRessources' =>$value->IdRessource
            ]);
                

        }
    }
}
