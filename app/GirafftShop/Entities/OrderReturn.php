<?php namespace GirafftShop\Entities;

class OrderReturn extends \Eloquent {
	protected $guarded = [];
    protected $table = 'returns';

    public function order()
    {
        return $this->belongsTo('Order', 'order_receiptId', 'receiptId');
    }
}