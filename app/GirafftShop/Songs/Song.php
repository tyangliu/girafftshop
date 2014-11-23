<?php namespace GirafftShop\Songs;

use Eloquent;

class Song extends Eloquent {
	protected $guarded = [];

    public function item()
    {
        return $this->belongsTo('GirafftShop\Items\Item', 'item_upc', 'upc');
    }
}