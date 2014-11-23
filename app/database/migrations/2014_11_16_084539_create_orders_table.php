<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
            $table->increments('id');
			$table->string('receiptId', 64)->unique();
			$table->date('date');
			$table->string('cUsername');
            $table->foreign('cUsername')
                ->references('username')->on('customers')
                ->onDelete('cascade');
			$table->integer('card')->unsigned();
			$table->date('expiryDate');
			$table->date('expectedDate')->nullable();
			$table->date('deliveredDate')->nullable();
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
		Schema::drop('orders');
	}

}
