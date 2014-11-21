<?php namespace GirafftShop\Items\Commanding;

class EditCartItemCommand {

    public $item_upc;
    public $quantity;
    public $delete;

    function __construct($item_upc, $quantity, $delete)
    {
        $this->item_upc = $item_upc;
        $this->quantity = $quantity;
        $this->delete   = $delete;
    }

} 