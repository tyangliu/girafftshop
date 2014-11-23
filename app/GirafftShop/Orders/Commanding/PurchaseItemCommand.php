<?php namespace GirafftShop\Orders\Commanding;


class PurchaseItemCommand {

    public $order_receiptId;

    public $item_upc;

    public $quantity;

    function __construct($item_upc, $order_receiptId, $quantity)
    {
        $this->item_upc = $item_upc;
        $this->order_receiptId = $order_receiptId;
        $this->quantity = $quantity;
    }
}