<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('upc', 64)->unique();
			$table->string('title', 64);
			$table->string('type', 64);
			$table->string('category', 64);
			$table->string('company', 64);
			$table->integer('year')->unsigned();
			$table->integer('price')->unsigned();
			$table->integer('stock')->unsigned();
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
		Schema::drop('items');
	}

}
