<?php namespace GirafftShop\OrderReturns\Commanding;
class MakeReturnCommand {
    public $returnId;
    public $date;
    public $order_receiptId;

    function __construct($returnId, $date, $order_receiptId)
    {
        $this->returnId= $returnId;
        $this->order_receiptId = $order_receiptId;
        $this->date = $date;

    }
} 