<?php

use GirafftShop\Commands\SearchItemCommand;
use GirafftShop\Forms\SearchItemForm;

class SearchController extends \BaseController {

    private $searchItemForm;

    function __construct(SearchItemForm $searchItemForm)
    {
        $this->searchItemForm = $searchItemForm;
    }

    public function create()
	{
        return View::make('items.index');
	}

	public function show()
	{
        $this->searchItemForm->validate(Input::all());

        $items = $this->execute(SearchItemCommand::class);

        $data = ['items' => $items];
        return View::make('items.list', $data);
	}

}