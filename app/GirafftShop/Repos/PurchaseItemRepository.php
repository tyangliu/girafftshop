<?php namespace GirafftShop\Repos;

use GirafftShop\Orders\PurchaseItem;

class PurchaseItemRepository extends Repository {

    protected $model;

    function __construct(PurchaseItem $model)
    {
        $this->model = $model;
    }

    /**
     * Save a customer
     *
     * @param Customer $customer
     * @return mixed
     */
    public function save(PurchaseItem $purchaseItem)
    {
        return $purchaseItem->save();
    }
} 