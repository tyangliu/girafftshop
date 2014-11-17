<?php

class ItemsController extends BaseController {

	public function index()
	{
		return View::make('items.index');
	}

    public function search()
    {
        $category = Input::get('category');
        $title = Input::get('title');
        $singer = Input::get('artist');
        $data = ['items' => Item::matching($category, $title, $singer)->get()];

        return View::make('items.list', $data);

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
        $rules = array(
            'upc' => 'required|integer',
            'title' => 'required|alpha_num',
            'type' => 'required|alpha|between:2,3',
            'category' => 'required|alpha_num',
            'company' => 'required|alpha_num',
            'year' => 'required|integer|digits:4',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'leadSinger' => 'alpha'
        );
        $validator = Validator::make(Input::all(), $rules);

        //process the login
        if ($validator->fails()) {
            return Redirect::route('newItem_path')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            $input = Input::except('leadSinger');
            $item = Item::create($input);

            $leadSinger = Input::get('leadSinger');
            if ($leadSinger != '')
            {
                $itemLeadSinger = new ItemLeadSinger;
                $itemLeadSinger->name = $leadSinger;
                $itemLeadSinger->item()->associate($item);
                $itemLeadSinger->save();
            }

            Session::flash('message', 'Successfully created a item!');

            // TODO: add complete page
            return Redirect::route('newItem_path');
        }
    }

    public function update()
    {//validate
        $rules = array(
            'upc' => 'required|integer',
            'price' => 'integer',
            'stock' => 'required|integer'
        );
        $validator = Validator::make(Input::all(), $rules);

        //process the login
        if ($validator->fails()) {
            return Redirect::route('editItem_path')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            //store
            $upc      = Input::get('upc');
            $quantity = Input::get('stock');
            $newPrice = Input::get('price');
            $item = Item::ofUpc($upc)->first();
            $item->stock += $quantity;
            if ($newPrice != '')
                $item->price = $newPrice;
            $item->save();

            //refirect
            Session::flash('message', 'Successfully updated item!');
            return Redirect::route('editItem_path');
        }
    }

}
