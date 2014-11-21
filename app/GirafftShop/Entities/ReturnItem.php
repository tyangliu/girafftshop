<?php namespace GirafftShop\Entities;

class ReturnItem extends \Eloquent {
	protected $fillable = [];

    public function orderReturn()
    {
        return $this->belongsTo('OrderReturn', 'return_returnId', 'returnId');
    }

    public function item()
    {
        return $this->hasOne('Item', 'item_upc', 'upc');
    }
}