<?php

namespace Database\Seeders;
use App\Models\Type_Relation;
use Database\Seeders\Type_Relation as SeedersType_Relation;
use Illuminate\Database\Seeder;

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
        Type_Relation::create([
            'Nom' => 'Etranger',
        ]);

        Type_Relation::create([
            'Nom' => 'Amis',
        ]);

        Type_Relation::create([
            'Nom' => 'Professionelle',
        ]);

        Type_Relation::create([
            'Nom' => 'Famille',
        ]);

        Type_Relation::create([
            'Nom' => 'Conjoint',
        ]);

    }
}
