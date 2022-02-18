<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRessourcesTable extends Migration {

	public function up()
	{
		Schema::create('Ressources', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('Titre');
			$table->string('Contenue');
			$table->integer('IdCategorie')->unsigned();
			$table->integer('IdUtilisateur_createur')->unsigned();
			$table->integer('IdType')->unsigned();
			$table->integer('IdEtat')->unsigned()->default(1);
			$table->string('Lien_ressources');
		});
	}

	public function down()
	{
		Schema::drop('Ressources');
	}
}