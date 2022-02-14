<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeRelationTable extends Migration {

	public function up()
	{
		Schema::create('Type_relation', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('Nom');
		});
	}

	public function down()
	{
		Schema::drop('Type_relation');
	}
}