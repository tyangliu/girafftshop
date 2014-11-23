<?php namespace GirafftShop\Orders;

class PurchaseItem extends \Eloquent {
	protected $guarded = [];

    public function order()
    {
        return $this->belongsTo('Order', 'order_receiptId', 'receiptId');
    }

    public function item()
    {
        return $this->hasOne('Item', 'item_upc', 'upc');
    }

    public static function add($input)
    {
        $purchaseItem = new static($input);

        return $purchaseItem;
    }
}