<?php namespace GirafftShop\Items;

use PresentableTrait;

class Item extends \Eloquent {

    use PresentableTrait;

    protected $presenter = 'GirafftShop\Presenters\ItemPresenter';

    protected $guarded = [];

    public function leadSinger()
    {
        return $this->belongsTo('GirafftShop\LeadSingers\LeadSinger', 'upc', 'item_upc');
    }

    public function songs()
    {
        return $this->hasMany('GirafftShop\Songs\Song', 'item_upc', 'upc');
    }

    public function purchaseItem()
    {
        return $this->belongsToMany('GirafftShop\Orders\PurchaseItem', 'upc', 'item_upc');
    }

    public function returnItem()
    {
        return $this->belongsToMany('GirafftShop\OrderReturns\ReturnItem', 'upc', 'item_upc');
    }

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = (int) ($price * 100);
    }

    public static function add($input)
    {
        $item = new static($input);

        return $item;
    }

}