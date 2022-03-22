<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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

        $nomsTypesRessource = ['Activité / Jeu a réaliser','Article',"Carte defi","Cours au format PDF","Exercice","Fiche de lecture","Jeu en ligne","Qualité de vie","Video"];
        $typesRessource = array();

        foreach ($nomsTypesRessource as $unTypeRessource){
            $element = [
                'Nom'=>$unTypeRessource,
                'created_at' => now()
            ];
            array_push($typesRessource,$element);
        }


    DB::table('type_ressource')->insert($typesRessource);

    }
}
