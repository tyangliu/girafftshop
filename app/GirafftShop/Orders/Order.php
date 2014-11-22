<?php namespace GirafftShop\Orders;

class Order extends \Eloquent {
	protected $guarded = [];

    public function getReceiptId()
    {
        return $this->receiptId;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getCUsername()
    {
        return $this->cUsername;
    }

    public function getCard()
    {
        return $this->card;
    }

    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    public function getExpectedDate()
    {
        return $this->expectedDate;
    }

    public function getDeliveredDate()
    {
        return $this->deliveredDate();
    }

    public function customer()
    {
        return $this->belongsTo('Customer', 'cUsername', 'username');
    }

    public static function make($input) 
    {
        $order = new static($input);

        return $order;
    }

}