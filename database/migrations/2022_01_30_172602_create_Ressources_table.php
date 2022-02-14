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
			$table->integer('IdCategorie')->unsigned();
			$table->string('Lien_ressources');
			$table->string('Type');
		});
	}

	public function down()
	{
		Schema::drop('Ressources');
	}
}