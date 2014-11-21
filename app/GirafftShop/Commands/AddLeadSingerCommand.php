<?php namespace GirafftShop\Commands;


class AddLeadSingerCommand {

    public $item_upc;

    public $name;

    function __construct($leadSingerName, $upc)
    {
        $this->name = $leadSingerName;
        $this->item_upc = $upc;
    }

}