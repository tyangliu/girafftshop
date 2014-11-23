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
			$table->string('returnId', 64)->unique();
			$table->date('date');
			$table->string('order_receiptId', 64);
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
