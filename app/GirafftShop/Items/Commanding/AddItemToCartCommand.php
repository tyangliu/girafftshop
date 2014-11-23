<?php namespace GirafftShop\Items\Commanding;


class AddItemToCartCommand {

    public $item_upc;
    public $quantity;

    function __construct($item_upc, $quantity)
    {
        $this->item_upc = $item_upc;
        $this->quantity = $quantity;
    }

} 