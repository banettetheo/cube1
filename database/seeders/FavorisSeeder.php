<?php

namespace Database\Seeders;

use App\Models\Favoris;
use Illuminate\Database\Seeder;

class FavorisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Favoris::create([
            'Utilisateur_id' => 1,
            'IdRessources' => 1,
            'Type_favoris_id' =>1,
        ]);
    }
}
