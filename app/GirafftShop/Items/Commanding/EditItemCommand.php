<?php namespace GirafftShop\Items\Commanding;


class EditItemCommand {

    public $upc;

    public $price;

    public $stock;

    function __construct($price, $stock, $upc)
    {
        $this->price = $price;
        $this->stock = $stock;
        $this->upc = $upc;
    }

} 