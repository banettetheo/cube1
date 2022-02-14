<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUtilisateurTable extends Migration {

	public function up()
	{
		Schema::create('Utilisateur', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('Nom', 50);
			$table->string('Prenom', 50);
			$table->boolean('Moderateur');
		});
	}

	public function down()
	{
		Schema::drop('Utilisateur');
	}
}