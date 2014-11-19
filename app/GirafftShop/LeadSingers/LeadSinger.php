<?php namespace GirafftShop\LeadSingers;

use Eloquent;

class LeadSinger extends Eloquent {
    protected $guarded = [];

    public function item()
    {
        return $this->hasMany('GirafftShop\Items\Item', 'upc', 'item_upc');
    }

    public static function add($item_upc, $name)
    {
        $leadSinger = new static(compact('item_upc', 'name'));

        return $leadSinger;
    }
}