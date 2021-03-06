<?php namespace GirafftShop\Orders;

class Order extends \Eloquent {
	protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo('GirafftShop\Customers\Customer', 'cUsername', 'username');
    }

    public function purchaseItems()
    {
        return $this->hasMany('GirafftShop\Orders\PurchaseItem', 'order_receiptId', 'receiptId');
    }

    public static function make($input) 
    {
        $order = new static($input);

        return $order;
    }

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = date("Y-m-d", strtotime($date));
    }

    public function setExpiryDateAttribute($expiryDate)
    {
        $this->attributes['expiryDate'] = date("Y-m-d", strtotime($expiryDate));
    }

    public function setExpectedDateAttribute($expectedDate)
    {
        $this->attributes['expectedDate'] = date("Y-m-d", strtotime($expectedDate));
    }

    public function setDeliveredDateAttribute($deliveredDate)
    {
        $this->attributes['deliveredDate'] = date("Y-m-d", strtotime($deliveredDate));
    }
}