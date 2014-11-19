<?php

class PurchaseItem extends \Eloquent {
	protected $guarded = [];

    public function getOrderReceiptId()
    {
        return $this->order_receiptId;
    }

    public function getItemUpc()
    {
        return $this->item_upc;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function order()
    {
        return $this->belongsTo('Order', 'order_receiptId', 'receiptId');
    }

    public function item()
    {
        return $this->hasOne('Item', 'item_upc', 'upc');
    }
}