<?php

namespace Database\Seeders;

use App\Models\Ressources;
use Illuminate\Database\Seeder;

class RessourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ressources::factory(180)->create();
       
    }
}
