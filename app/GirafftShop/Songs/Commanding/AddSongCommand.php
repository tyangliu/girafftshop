<?php namespace GirafftShop\Songs\Commanding;


class AddSongCommand {

    public $item_upc;

    public $title;

    function __construct($upc, $title)
    {
        $this->item_upc = $upc;
        $this->title = $title;
    }

}