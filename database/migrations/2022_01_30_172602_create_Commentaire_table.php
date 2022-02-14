<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentaireTable extends Migration {

	public function up()
	{
		Schema::create('Commentaire', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('Contenue', 255);
			$table->integer('IdUser')->unsigned();
			$table->integer('IdRessources')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Commentaire');
	}
}