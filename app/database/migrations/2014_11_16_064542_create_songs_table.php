<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSongsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('songs', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('item_upc', 64);
            $table->foreign('item_upc')
                  ->references('upc')->on('items')
                  ->onDelete('cascade');
            $table->string('title', 64);
            $table->unique( ['item_upc', 'title']);
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
		Schema::drop('item_has_songs');
	}

}
