<?php

class ItemHasSong extends \Eloquent {
	protected $guarded = [];

    public function getItemUpc()
    {
        return $this->item_upc;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function item()
    {
        return $this->belongsTo('Item', 'item_upc', 'upc');
    }
}