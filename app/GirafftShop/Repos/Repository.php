<?php namespace GirafftShop\Repos;


abstract class Repository {

    protected function query()
    {
        return $this->model->newQuery();
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function getByField($fieldName, $fieldValue)
    {
        $query = $this->query()->where($fieldName, $fieldValue);

        return $query->get();
    }

    public function getByFields($fields)
    {
        $query = $this->query();

        foreach ($fields as $fieldName => $fieldValue)
        {
            $query = $query->where($fieldName, $fieldValue);
        }

        return $query->get();
    }
} 