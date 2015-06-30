<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTankersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tankers', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('number');
            $table->tinyInteger('chambers');
            $table->double('capacity');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tankers');
	}

}
