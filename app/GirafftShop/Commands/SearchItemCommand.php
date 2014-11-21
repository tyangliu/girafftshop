<?php namespace GirafftShop\Commands;


class SearchItemCommand {

    public $category;

    public $title;

    public $leadSingerName;

    function __construct($category, $title, $leadSingerName)
    {
        $this->category = $category;
        $this->title = $title;
        $this->leadSingerName = $leadSingerName;
    }

} 