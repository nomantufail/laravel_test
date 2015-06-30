<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stock', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('product');
            $table->string('tanker');
            $table->double('quantity');
            $table->integer('purchase_id');
            $table->double('price_per_unit');
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
		Schema::drop('stock');
	}

}
