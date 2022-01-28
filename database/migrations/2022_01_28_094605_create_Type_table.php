<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeTable extends Migration {

	public function up()
	{
		Schema::create('Type', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('type');
		});
	}

	public function down()
	{
		Schema::drop('Type');
	}
}