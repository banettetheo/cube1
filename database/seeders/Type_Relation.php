<?php

namespace Database\Seeders;

use App\Models\Type_Relation as ModelsType_Relation;
use Illuminate\Database\Seeder;

class Type_Relation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ModelsType_Relation::create([
            'Nom' => 'Etranger',
        ]);
    }
}
