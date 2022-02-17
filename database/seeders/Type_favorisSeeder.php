<?php

namespace Database\Seeders;

use App\Models\Type_favoris;
use Illuminate\Database\Seeder;

class Type_favorisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Type_favoris::create([
            'Nom' => 'Favoris',
        ]);

        Type_favoris::create([
            'Nom' => 'Mis de coter',
        ]);

        Type_favoris::create([
            'Nom' => 'Visiter',
        ]);
    }
}
