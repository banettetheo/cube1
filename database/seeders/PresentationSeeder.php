<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use App\Models\Favoris;
use App\Models\Jointure_ress_utilisateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Ressources;
use Faker\Factory as fake;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = fake::create();
        $ress = Ressources::factory(20)->create(['IdEtat' => 1]);

        foreach($ress as $value)
        {
            Jointure_ress_utilisateur::create([
                'IdUtilisateur' =>$value->IdUtilisateur_createur,
                'IdRessource' =>$value->id
            ]);
             Commentaire::create([
                'Contenue' => $faker->realText(200),
                'IdUser' =>$value->IdUtilisateur_createur,
                'IdRessources' =>$value->id
            ]); 
            Favoris::create([
                'Utilisateur_id' =>$value->IdUtilisateur_createur,
                'IdRessources' =>$value->id,
                'Type_favoris_id' =>$faker->numberBetween(1,3)
            ]);           

        }

        
        

    }
}