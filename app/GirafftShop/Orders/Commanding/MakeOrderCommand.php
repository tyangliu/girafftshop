<?php namespace GirafftShop\Orders\Commanding;


class MakeOrderCommand {

    public $receiptId;

    public $date;

    public $cUsername;

    public $card;

    public $expiryDate;

    public $expectedDate;

    function __construct($receiptId, $date, $cUsername, $card, $expiryDate, $expectedDate)

    {
        $this->receiptId = $receiptId;
        $this->date = $date;
        $this->cUsername = $cUsername;
        $this->card = $card;
        $this->expiryDate = $expiryDate;
        $this->expectedDate = $expectedDate;
    }
} 