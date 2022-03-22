<?php

namespace Database\Seeders;

use App\Models\Etat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $nomsEtats = ['Privée','Partager',"En cours de validation","Publique","Refuser"];
        $etats = array();

        foreach ($nomsEtats as $unEtat){
            $element = [
                'Nom'=>$unEtat,
                'created_at' => now()
            ];
            array_push($etats,$element);
        }


    DB::table('etat')->insert($etats);
    }
}
