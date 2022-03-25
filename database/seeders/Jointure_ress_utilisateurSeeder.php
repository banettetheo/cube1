<?php

namespace Database\Seeders;

use App\Models\Jointure_ress_utilisateur;
use Faker\Factory as fake;
use Illuminate\Database\Seeder;
use App\Models\Commentaire;
use App\Models\Relation;
use App\Models\Ressources;

class Jointure_ress_utilisateurSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        
         $faker = fake::create();
         $ress = Ressources::factory(180)->create();
     //   $jru = Jointure_ress_utilisateur::factory(180)->create();

     foreach($ress as $value)
     {
         $random = $faker->numberBetween(1,50);
         Jointure_ress_utilisateur::create([
             'IdUtilisateur' =>$value->IdUtilisateur_createur,
             'IdRessource' =>$value->id
         ]);
         Jointure_ress_utilisateur::create([
            'IdUtilisateur' =>$random,
            'IdRessource' =>$value->id
        ]);
          Commentaire::create([
             'Contenue' => $faker->realText(200),
             'IdUser' => $value->IdUtilisateur_createur,
             'IdRessources' =>$value->id
         ]); 
         Relation::create([
            'IdUser1' =>$value->IdUtilisateur_createur,
        'IdUser2' => $random,
        'IdTypeRelation' => $faker->numberBetween(1,5),
        ]);      

     }
        foreach($ress as $valueress)
        {
           //$jru = Jointure_ress_utilisateur::factory()->create(['IdUtilisateur'=>$valueress->IdUtilisateur_createur]);
            //  $jru = Jointure_ress_utilisateur::factory()->create();

           /*  foreach($jru as $value)
            {
                Relation::create([
                    'IdUser1' =>$value->IdUtilisateur,
                'IdUser2' => $valueress->IdUtilisateur_createur,
                'IdTypeRelation' => $faker->numberBetween(1,5),
                ]);

                Commentaire::create([
                    'Contenue' => $faker->realText(200),
                    'IdUser' =>$value->IdUtilisateur,
                    'IdRessources' =>$value->IdRessource,
                ]); */
            //  };

        }
    }
}
