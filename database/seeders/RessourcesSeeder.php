<?php

namespace Database\Seeders;

use App\Models\Ressources;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Integer;

class RessourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ressources::factory(200)->create();
    }
}
