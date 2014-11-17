<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemLeadSingersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_lead_singers', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('item_upc')->unsigned();
            $table->foreign('item_upc')
                  ->references('upc')->on('items')
                  ->onDelete('cascade');
			$table->string('name', 64);
            $table->unique( ['item_upc', 'name']);
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
		Schema::drop('item_lead_singers');
	}

}
