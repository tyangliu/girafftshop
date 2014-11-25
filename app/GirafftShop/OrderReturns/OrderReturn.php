<?php namespace GirafftShop\OrderReturns;

class OrderReturn extends \Eloquent {
	protected $guarded = [];
    protected $table = 'returns';

    public static function make($input)
    {
        $return = new static($input);
        return $return;
    }

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = date("Y-m-d", strtotime($date));
    }

    public function order()
    {
        return $this->belongsTo('GirafftShop\Orders\Order', 'order_receiptId', 'receiptId');
    }

    public function returnItems()
    {
        return $this->hasMany('GirafftShop\OrderReturns\ReturnItem', 'return_returnId', 'returnId');
    }
}