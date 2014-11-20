<?php namespace GirafftShop\Repos;

use GirafftShop\Orders\Order;

class OrderRepository extends Repository {

    protected $model;

    function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * Save a order
     *
     * @param Order $order
     * @return mixed
     */
    public function save(Customer $order)
    {
        return $order->save();
    }
} 