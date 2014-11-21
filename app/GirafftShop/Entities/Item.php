<?php namespace GirafftShop\Entities;

class Item extends \Eloquent {
    protected $guarded = [];

    public function leadSinger()
    {
        return $this->belongsTo('GirafftShop\LeadSingers\LeadSinger', 'upc', 'item_upc');
    }

    public function itemHasSongs()
    {
        return $this->hasMany('GirafftShop\Songs\Song', 'item_upc', 'upc');
    }

    public function purchaseItem()
    {
        return $this->belongsToMany('GirafftShop\Orders\PurchaseItem', 'upc', 'item_upc');
    }

    public function returnItem()
    {
        return $this->belongsToMany('GirafftShop\Returns\ReturnItem', 'upc', 'item_upc');
    }

    public static function add($input)
    {
        $item = new static($input);

        return $item;
    }

}