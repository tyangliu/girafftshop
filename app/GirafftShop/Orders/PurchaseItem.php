<?php namespace GirafftShop\Orders;

class PurchaseItem extends \Eloquent {
	protected $guarded = [];

    public function order()
    {
        return $this->belongsTo('GirafftShop\Orders\Order', 'order_receiptId', 'receiptId');
    }

    public function item()
    {
        return $this->hasOne('GirafftShop\Items\Item', 'upc', 'item_upc');
    }

    public static function add($input)
    {
        $purchaseItem = new static($input);

        return $purchaseItem;
    }
}