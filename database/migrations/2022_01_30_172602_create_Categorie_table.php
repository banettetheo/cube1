<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategorieTable extends Migration {

	public function up()
	{
		Schema::create('Categorie', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('Nom');
		});
	}

	public function down()
	{
		Schema::drop('Categorie');
	}
}