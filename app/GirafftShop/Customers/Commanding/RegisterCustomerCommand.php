<?php namespace GirafftShop\Customers\Commanding;

class RegisterCustomerCommand {

    public $username;

    public $password;

    public $name;

    public $address;

    public $phone;

    function __construct($address, $name, $password, $phone, $username)
    {
        $this->address = $address;
        $this->name = $name;
        $this->password = $password;
        $this->phone = $phone;
        $this->username = $username;
    }


} 