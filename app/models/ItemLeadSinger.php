<?php

class ItemLeadSinger extends \Eloquent {
    protected $guarded = [];

    public function getItemUpc()
    {
        return $this->item_upc;
    }

    public function getName()
    {
        return $this->name;
    }

    public function item()
    {
        return $this->belongsTo('Item', 'item_upc', 'upc');
    }
}