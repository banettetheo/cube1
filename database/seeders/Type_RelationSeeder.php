<?php

namespace Database\Seeders;
use App\Models\Type_Relation;
use Database\Seeders\Type_Relation as SeedersType_Relation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Type_RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $nomsRelations = ["Conjoints","Famille","Professionelle","Amis et communautés","Inconnus"];
        $relations = array();

        foreach ($nomsRelations as $uneRelation){
            $element = [
                'Nom'=>$uneRelation,
                'created_at' => now()
            ];
            array_push($relations,$element);
        }


    DB::table('type_relation')->insert($relations);

    }
}
