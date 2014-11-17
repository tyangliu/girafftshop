<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReturnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('returns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('returnId')->unsigned()->unique();
			$table->date('date');
			$table->integer('order_receiptId')->unsigned();
            $table->foreign('order_receiptId')
                ->references('receiptId')
                ->on('orders');
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
		Schema::drop('returns');
	}

}
