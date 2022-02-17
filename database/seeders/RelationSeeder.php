<?php

namespace Database\Seeders;

use App\Models\Relation;
use Illuminate\Database\Seeder;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Relation::create([
            'IdUser1' => 1,
            'IdUser2' => 2,
            'IdTypeRelation' => 5,
        ]);
    }
}
