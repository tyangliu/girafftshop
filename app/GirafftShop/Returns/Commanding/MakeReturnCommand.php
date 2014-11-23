<?php namespace GirafftShop\Returns\Commanding;
class MakeReturnCommand {
    public $returnId;
    public $date;
    public $receiptId;

    function __construct($returnId, $date, $receiptId)
    {
        $this->returnId= $returnId;
        $this->receiptId = $receiptId;
        $this->date = $date;

    }
} 