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
    }
}
