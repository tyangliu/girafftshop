<?php namespace GirafftShop\Songs;

use Eloquent;

class Song extends Eloquent {
	protected $guarded = [];

    public function item()
    {
        return $this->belongsTo('GirafftShop\Items\Item', 'item_upc', 'upc');
    }

    public static function add($item_upc, $title)
    {
        $song = new static(compact('item_upc', 'title'));

        return $song;
    }
}