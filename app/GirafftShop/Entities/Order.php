<?php namespace GirafftShop\Entities;

class Order extends \Eloquent {
	protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo('Customer', 'cUsername', 'username');
    }

    public static function make($input) 
    {
        $order = new static($input);

        return $order;
    }
}