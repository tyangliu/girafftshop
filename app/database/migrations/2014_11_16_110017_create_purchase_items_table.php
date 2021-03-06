<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('order_receiptId', 64);
            $table->foreign('order_receiptId')
                ->references('receiptId')->on('orders')
                ->onDelete('cascade');
            $table->string('item_upc', 64);
            $table->foreign('item_upc')
                ->references('upc')->on('items')
                ->onDelete('cascade');
            $table->integer('quantity')->unsigned();
            $table->unique(['order_receiptId', 'item_upc']);
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
		Schema::drop('purchase_items');
	}

}
