<?php namespace GirafftShop\Repos;

use GirafftShop\OrderReturns\OrderReturn;

class OrderReturnRepository extends Repository {

    protected $model;

    function __construct(OrderReturn $model)
    {
        $this->model = $model;
    }

    /**
     * Save a return
     *
     * @param Order $order
     * @return mixed
     */
    public function save(OrderReturn $orderReturn)
    {
        return $orderReturn->save();
    }
} 