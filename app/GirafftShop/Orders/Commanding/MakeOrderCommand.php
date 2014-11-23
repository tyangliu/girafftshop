<?php namespace GirafftShop\Orders\Commanding;


class MakeOrderCommand {

    public $receiptId;

    public $date;

    public $cUsername;

    public $card;

    public $expiryDate;

    function __construct($receiptId, $date, $cUsername, $card, $expiryDate)

    {
        $this->receiptId = $receiptId;
        $this->date = $date;
        $this->cUsername = $cUsername;
        $this->card = $card;
        $this->expiryDate = $expiryDate;
    }
} 