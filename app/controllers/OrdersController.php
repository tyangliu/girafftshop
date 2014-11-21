<?php

use GirafftShop\Entities\Order;
use GirafftShop\Forms\MakeOrderForm;
use GirafftShop\Commands\MakeOrderCommand;

class OrdersController extends \BaseController {

	private $makeOrderForm;

	function __construct(MakeOrderForm $makeOrderForm)
    {
        $this->makeOrderForm = $makeOrderForm;
    }

	/**
	 * Display a listing of the resource.
	 * GET /orders
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /orders/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('orders.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /orders
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$this->makeOrderForm->validate($input);

		$input['date'] = strtotime($input['date']);
		$input['expiryDate'] = strtotime($input['expiryDate']);
		$input['expectedDate'] = strtotime($input['expectedDate']);
		$input['deliveredDate'] = strtotime($input['deliveredDate']);

		$this->execute(MakeOrderCommand::class);

		return Redirect::route('newOrder_path');

	}

	/**
	 * Display the specified resource.
	 * GET /orders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /orders/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /orders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /orders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}