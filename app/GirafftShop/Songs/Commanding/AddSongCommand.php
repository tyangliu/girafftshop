<?php namespace GirafftShop\Songs\Commanding;


class AddSongCommand {

    public $item_upc;

    public $title;

    function __construct($item_upc, $title)
    {
        $this->item_upc = $item_upc;
        $this->title = $title;
    }

}