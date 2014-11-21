<?php

use GirafftShop\Items\Forms\AddItemForm;
use GirafftShop\Items\Forms\EditItemForm;
use GirafftShop\Items\Commanding\AddItemCommand;
use GirafftShop\Items\Commanding\EditItemCommand;
use GirafftShop\LeadSingers\Commanding\AddLeadSingerCommand;
use GirafftShop\Repos\ItemRepository;

class ItemsController extends BaseController {

    private $addItemForm;
    private $editItemForm;
    private $repository;

    function __construct(AddItemForm $addItemForm, EditItemForm $editItemForm, ItemRepository $repository)
    {
        $this->addItemForm = $addItemForm;
        $this->editItemForm = $editItemForm;
        $this->repository = $repository;
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

    public function show( $upc )
    {
        $data = ['item' => $this->repository->getByField('upc', $upc)->first() ];
        return View::make('items.show', $data);
    }


}
