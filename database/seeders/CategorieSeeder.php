<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;



class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Categorie::create([
        //     'Nom' => 'test:'.Str::random(5),
        // ]);
            $nomCateg = ['Communication','Cultures',"Développement personnel","Intelligence émotionnelle","Loisirs","Monde professionnel","Parentalité","Qualité de vie","Recherche de sens","Santé physique","Santé psychique","Spiritualité","Vie affective"];
            $categories = array();

            foreach ($nomCateg as $uneCateg){
                $element = [
                    'Nom'=>$uneCateg,
                    'created_at' => now()
                ];
                array_push($categories,$element);
            }


        DB::table('categorie')->insert($categories);

        // Categorie::create([
        //     'Nom' => "Cultures",
        // ]);

    }
}
