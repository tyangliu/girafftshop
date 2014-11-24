<?php namespace GirafftShop\OrderReturns\Commanding;

class ReturnItemCommand {

    public $return_returnId;
    public $item_upc;
    public $quantity;

    function __construct($item_upc, $return_returnId, $quantity)
    {
        $this->item_upc = $item_upc;
        $this->return_returnId = $return_returnId;
        $this->quantity = $quantity;
    }
}