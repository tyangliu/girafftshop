<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class Customer extends \Eloquent implements UserInterface {

    use UserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    /**
     * Get the name of the customer
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the address of the customer
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the phone number of the customer
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Get the orders of the customer
     *
     * @return array
     */
    public function orders(){
        return $this->hasMany('Order', 'username');
    }
}
