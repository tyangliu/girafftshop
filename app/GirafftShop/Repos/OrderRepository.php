<?php namespace GirafftShop\Repos;

use GirafftShop\Orders\Order;
use \DB;

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

    public function getPending()
    {
        return $this->model->where('deliveredDate', null)->get();
    }
} 