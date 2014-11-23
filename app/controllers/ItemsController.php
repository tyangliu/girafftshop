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
    private $itemRepository;

    function __construct(AddItemForm $addItemForm, EditItemForm $editItemForm, ItemRepository $itemRepository)
    {
        $this->addItemForm = $addItemForm;
        $this->editItemForm = $editItemForm;
        $this->itemRepository = $itemRepository;
    }

    public function index()
    {
        $data['items'] = $this->itemRepository->getAll();

        return View::make('control_panel.inventory.index', $data);

    }

    public function create()
    {
        return View::make('control_panel.inventory.create');
    }

    public function edit($upc)
    {
        $data = ['item' => $this->itemRepository->getByField('upc', $upc)->first() ];
        return View::make('control_panel.inventory.edit', $data);
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
        return Redirect::route('inventory_path');
    }

    public function update($upc)
    {
        $input = array_add(Input::all(), 'upc', $upc);
        $this->editItemForm->validate($input);


        $this->execute(EditItemCommand::class, $input);

        return Redirect::route('editItem_path', $upc);
    }

    public function show( $upc )
    {
        $data = ['item' => $this->itemRepository->getByField('upc', $upc)->first() ];
        return View::make('items.show', $data);
    }

}
