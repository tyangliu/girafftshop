<?php namespace GirafftShop\OrderReturns;

class ReturnItem extends \Eloquent {
	protected $guarded = [];

    public static function add($input)
    {
        $returnItem = new static($input);
        return $returnItem;
    }

    public function orderReturn()
    {
        return $this->belongsTo('GirafftShop\OrderReturns\OrderReturn', 'return_returnId', 'returnId');
    }

    public function item()
    {
        return $this->hasOne('GirafftShop\Items\Item', 'upc', 'item_upc');
    }
}