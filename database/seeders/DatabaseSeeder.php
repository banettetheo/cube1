<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call([
						//here you need the seeder class, not the model class
			CategorieSeeder::class ,
			UtilisateurSeeder::class,
			Type_Relation::class,
			Ressources::class,
		 ]);
	}
}