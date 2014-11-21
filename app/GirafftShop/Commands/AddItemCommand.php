<?php namespace GirafftShop\Commands;


class AddItemCommand {

    public $upc;

    public $title;

    public $type;

    public $category;

    public $company;

    public $year;

    public $price;

    public $stock;

    function __construct($upc, $title, $type, $category, $company, $year, $price, $stock)
    {
        $this->upc = $upc;
        $this->title = $title;
        $this->type = $type;
        $this->category = $category;
        $this->company = $company;
        $this->year = $year;
        $this->price = $price;
        $this->stock = $stock;
    }
} 