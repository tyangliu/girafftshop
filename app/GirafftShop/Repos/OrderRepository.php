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

    public function update($receiptId, $deliveredDate)
    {
        $order = $this->getByField('receiptId', $receiptId)->first();
        $order->deliveredDate = $deliveredDate;

        return $order->save();
    }

    public function getPending()
    {
        return $this->model->where('deliveredDate', null)->get();
    }

    public function getReturnable()
    {
        $seconds = strtotime(date('Y-m-d')) - (86400 * 15);
        $date = date('Y-m-d', $seconds);

        return $this->model->where('date', '>=', $date)->get();
    }
} 