<?php namespace GirafftShop\Orders\Commanding;


class MakeOrderCommand {

    public $receiptId;

    public $date;

    public $cUsername;

    public $card;

    public $expiryDate;

    public $expectedDate;

    public $deliveredDate;

    function __construct($receiptId, $date, $cUsername, $card, $expiryDate, $expectedDate, $deliveredDate)
    {
        $this->receiptId = $receiptId;
        $this->date = $date;
        $this->cUsername = $cUsername;
        $this->card = $card;
        $this->expiryDate = $expiryDate;
        $this->expectedDate = $expectedDate;
        $this->deliveredDate = $deliveredDate;
    }
} 