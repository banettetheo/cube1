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
        Relation::factory(50)->create();

    }
}
