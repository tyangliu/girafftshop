<?php namespace GirafftShop\Orders\Commanding;


class MakeOrderCommand {

    public $receiptId;

    public $date;

    public $cUsername;

    public $card;

    public $expiryDate;

<<<<<<< HEAD
    function __construct($receiptId, $date, $cUsername, $card, $expiryDate)
=======
    public $expectedDate;

    public $deliveredDate;

    function __construct($receiptId, $date, $cUsername, $card, $expiryDate, $expectedDate, $deliveredDate)
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a
    {
        $this->receiptId = $receiptId;
        $this->date = $date;
        $this->cUsername = $cUsername;
        $this->card = $card;
        $this->expiryDate = $expiryDate;
<<<<<<< HEAD
=======
        $this->expectedDate = $expectedDate;
        $this->deliveredDate = $deliveredDate;
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a
    }
} 