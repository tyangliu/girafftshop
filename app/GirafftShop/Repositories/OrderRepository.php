<?php namespace GirafftShop\Repositories;

use GirafftShop\Entities\Order;

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
    public function save(Order $order)
    {
        return $order->save();
    }
} 