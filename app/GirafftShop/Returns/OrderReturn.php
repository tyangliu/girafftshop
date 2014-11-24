<?php

class OrderReturn extends \Eloquent {
	protected $guarded = [];
    protected $table = 'returns';

        public static function make($input) 
    {
        $return = new static($input);
        return $return;
    }

    public function getReturnId()
    {
        return $this->returnId;
    }

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = date("Y-m-d", strtotime($date));
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