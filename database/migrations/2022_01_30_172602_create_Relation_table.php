<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelationTable extends Migration {

	public function up()
	{
		Schema::create('Relation', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('IdUser1')->unsigned();
			$table->integer('IdUser2')->unsigned();
			$table->integer('IdTypeRelation')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Relation');
	}
}