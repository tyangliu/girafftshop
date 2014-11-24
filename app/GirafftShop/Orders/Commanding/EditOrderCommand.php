<?php namespace GirafftShop\Orders\Commanding;


class EditOrderCommand {

	public $receiptId;
    public $deliveredDate;

    function __construct($deliveredDate, $receiptId)
    {
    	$this->receiptId = $receiptId;
        $this->deliveredDate = $deliveredDate;
    }

} 