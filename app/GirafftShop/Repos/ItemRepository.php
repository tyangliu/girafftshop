<?php namespace GirafftShop\Repos;

use GirafftShop\Items\Item;

class ItemRepository extends Repository {

    protected $model;

    function __construct(Item $model)
    {
        $this->model = $model;
    }

    public function save(Item $item)
    {
        return $item->save();
    }

    public function update($upc, $stock, $price='')
    {
        $item = $this->getByField('upc', $upc)->first();

        $item->stock = $item->stock + $stock;

        if ($price != '') {
            $item->price = $price;
        }

        return $item->save();
    }

    public function getByFields($fields)
    {
        $query = $this->query();

        foreach ($fields as $fieldName => $fieldValue)
        {
            if ($fieldName == 'leadSingerName')
            {
                $query =
                    $query->whereHas('leadSinger', function ($q) use ($fieldValue) {
                        $q->where('name', '=', $fieldValue);
                    });

            }
            else
            {
                $query = $query->where($fieldName, $fieldValue);
            }
        }

        return $query->get();
    }
}