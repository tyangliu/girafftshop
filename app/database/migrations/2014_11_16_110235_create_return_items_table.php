<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReturnItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('return_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('return_returnId', 64);
            $table->foreign('return_returnId')
                ->references('returnId')
                ->on('returns');
			$table->integer('item_upc')->unsigned();
            $table->foreign('item_upc')
                ->references('upc')
                ->on('items');
			$table->integer('quantity')->unsigned();
            $table->unique(['return_returnId', 'item_upc']);
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
		Schema::drop('return_items');
	}

}
