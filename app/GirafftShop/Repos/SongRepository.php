<?php namespace GirafftShop\Repos;

use GirafftShop\Songs\Song;

class SongRepository extends Repository {

    protected $model;

    function __construct(Song $model)
    {
        $this->model = $model;
    }

    public function save(Song $leadSinger)
    {
        return $leadSinger->save();
    }
} 