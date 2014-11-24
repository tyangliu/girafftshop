<?php namespace GirafftShop\Repos;

use GirafftShop\OrderReturns\ReturnItem;

class ReturnItemRepository extends Repository {

    protected $model;

    function __construct(ReturnItem $model)
    {
        $this->model = $model;
    }

    public function save(ReturnItem $returnItem)
    {
        return $returnItem->save();
    }
} 