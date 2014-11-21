<?php

use GirafftShop\Entities\Item;
use GirafftShop\Entities\LeadSinger;
use GirafftShop\Entities\Song;
use GirafftShop\Forms\AddItemForm;
use GirafftShop\Forms\EditItemForm;
use GirafftShop\Commands\AddItemCommand;
use GirafftShop\Commands\EditItemCommand;
use GirafftShop\Commands\AddLeadSingerCommand;

class ItemsController extends BaseController {

    private $addItemForm;
    private $editItemForm;

    function __construct(AddItemForm $addItemForm, EditItemForm $editItemForm)
    {
        $this->addItemForm = $addItemForm;
        $this->editItemForm = $editItemForm;
    }

    public function create()
    {
        return View::make('items.create');
    }

    public function edit()
    {
        return View::make('items.edit');
    }

    public function store()
    {
        $this->addItemForm->validate(Input::all());

        $this->execute(AddItemCommand::class);

        $upc = Input::get('upc');
        $leadSingerName = Input::get('leadSingerName');

        if ($leadSingerName != '') {
            $this->execute(new AddLeadSingerCommand($leadSingerName, $upc));
        }


        Session::flash('message', 'Successfully created the item!');

        // TODO: add complete page
        return Redirect::route('newItem_path');
    }

    public function update()
    {
        $this->editItemForm->validate(Input::all());

        $this->execute(EditItemCommand::class);

        return Redirect::route('editItem_path');
    }


}
