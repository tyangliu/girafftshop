<?php

class OrderReturn extends \Eloquent {
	protected $guarded = [];
    protected $table = 'returns';

    public function getReturnId()
    {
        return $this->returnId;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getOrderReceiptId()
    {
        return $this->order_receiptId;
    }

    public function order()
    {
        return $this->belongsTo('Order', 'order_receiptId', 'receiptId');
    }
}