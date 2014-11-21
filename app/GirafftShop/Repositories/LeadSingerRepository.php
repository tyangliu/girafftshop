<?php namespace GirafftShop\Repositories;

use GirafftShop\Entities\LeadSinger;

class LeadSingerRepository extends Repository {

    protected $model;

    function __construct(LeadSinger $model)
    {
        $this->model = $model;
    }

    /**
     * Save a customer
     *
     * @param Customer $customer
     * @return mixed
     */
    public function save(LeadSinger $leadSinger)
    {
        return $leadSinger->save();
    }
} 