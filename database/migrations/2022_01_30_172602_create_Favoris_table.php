<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavorisTable extends Migration {

	public function up()
	{
		Schema::create('Favoris', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('Utilisateur_id')->unsigned();
			$table->integer('IdRessources')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Favoris');
	}
}