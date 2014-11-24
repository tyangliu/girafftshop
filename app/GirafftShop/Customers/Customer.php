<?php namespace GirafftShop\Customers;

use Eloquent, Hash;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Laracasts\Commander\Events\EventGenerator;


/**
 * Class Customer
 * @package GirafftShop\Customers
 */
class Customer extends Eloquent implements UserInterface {

    use UserTrait, EventGenerator;

    protected $guarded = [];

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
     * Get the pending-orders of the customer
     *
     * @return array
     */
    public function orders()
    {
        return $this->hasMany('Order', 'username');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Register a new customer
     *
     * @param $input
     */
    public static function register($input)
    {
        $customer = new static($input);

        return $customer;
    }
}
