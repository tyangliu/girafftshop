<?php namespace GirafftShop\Returns\Commanding;
class ReturntemCommand {
    public $return_returnId;
    public $item_upc;
    public $quantity;
    function __construct($item_upc, $order_returntId, $quantity)
    {
        $this->item_upc = $item_upc;
        $this->order_returnId = $order_returnId;
        $this->quantity = $quantity;
    }
}