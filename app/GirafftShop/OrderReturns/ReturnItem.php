<?php namespace GirafftShop\OrderReturns;

class ReturnItem extends \Eloquent {
	protected $fillable = [];

    public function getReturnReturnId()
    {
        return $this->return_returnId;
    }

    public function getItemUpc()
    {
        return $this->item_upc;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function orderReturn()
    {
        return $this->belongsTo('OrderReturn', 'return_returnId', 'returnId');
    }

    public function item()
    {
        return $this->hasOne('Item', 'item_upc', 'upc');
    }
}