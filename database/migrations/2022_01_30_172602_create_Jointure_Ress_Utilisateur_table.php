<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJointureRessUtilisateurTable extends Migration {

	public function up()
	{
		Schema::create('jointure_Ress_Utilisateur', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('IdUtilisateur')->unsigned();
			$table->integer('IdRessource')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('jointure_Ress_Utilisateur');
	}
}