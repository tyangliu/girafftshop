<?php namespace GirafftShop\Orders;

use PresentableTrait;

class PurchaseItem extends \Eloquent {

    use PresentableTrait;

    protected $presenter = 'GirafftShop\Presenters\PurchaseItemPresenter';

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

    public function getRemaining()
    {
        return $this->quantity - getSum($this->order_receiptId, $this->item_upc);
    }

}