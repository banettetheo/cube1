<?php

namespace Database\Seeders;

use App\Models\Etat;
use Illuminate\Database\Seeder;

class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Etat::create([
            'Nom' => 'Publique',
        ]);

        Etat::create([
            'Nom' => 'En cours de validation',
        ]);
    }
}
