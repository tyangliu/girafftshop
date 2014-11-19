<?php namespace GirafftShop\Repos;

use GirafftShop\Customers\Customer;

class CustomerRepository extends Repository {

    protected $model;

    function __construct(Customer $model)
    {
        $this->model = $model;
    }

    /**
     * Save a customer
     *
     * @param Customer $customer
     * @return mixed
     */
    public function save(Customer $customer)
    {
        return $customer->save();
    }
} 