<?php

class Item extends \Eloquent {
    protected $guarded = [];

    /**
     * Get the UPC of the item
     *
     * @return string
     */
    public function getUPC()
    {
        return $this->upc;
    }

    /**
     * Get the title of the item
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the type of the item
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the category of the item
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get the company of the item
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Get the year of the item
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Get the price of the item
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the stock of the item
     *
     * @return string
     */
    public function getStock()
    {
        return $this->stock;
    }

    public function itemLeadSinger()
    {
        return $this->hasOne('ItemLeadSinger', 'item_upc', 'upc');
    }

    public function itemHasSongs()
    {
        return $this->hasMany('ItemHasSong', 'item_upc', 'upc');
    }

    public function purchaseItem()
    {
        return $this->belongsToMany('PurchaseItem', 'item_upc', 'upc');
    }

    public function returnItem()
    {
        return $this->belongsToMany('ReturnItem', 'item_upc', 'upc');
    }

    public function scopeOfUpc($query, $upc)
    {
        return $query->whereUpc($upc);
    }

    public function scopeOfType($query, $type)
    {
        return $query->whereType($type);
    }

    public function scopeOfCategory($query, $category)
    {
        return $query->whereCategory($category);
    }

    public function scopeOfTitle($query, $title)
    {
        return $query->whereTitle($title);
    }
    public function scopeOfSinger($query, $singer)
    {
        // get all upcs from item_lead_singer that are related to $singer
        $upcsOfSinger =
            DB::table('item_lead_singer')
                ->where('name', $singer)
                ->lists('item_upc');

        return $query->whereIn('upc', $upcsOfSinger);
    }

    public function scopeMatching($query, $category, $title, $singer)
    {
        if ($category != '')
            $query = $query->ofCategory($category);
        if ($title != '')
            $query = $query->ofTitle($title);
        if ($singer != '')
            $query = $query->ofSinger($singer);
        return $query;
    }

}