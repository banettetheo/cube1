<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use Illuminate\Database\Seeder;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Commentaire::create([
            'Contenue' => 'Je suis le commentaire de test',
            'IdRessources' => 1,
            'IdUser' => 1,
        ]);
    }
}
