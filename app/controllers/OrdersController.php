<?php

<<<<<<< HEAD
use Illuminate\Session\Store;
use GirafftShop\Repos\ItemRepository;
use GirafftShop\Orders\Forms\MakeOrderForm;
use GirafftShop\Orders\Commanding\MakeOrderCommand;
use GirafftShop\Orders\Commanding\PurchaseItemCommand;

class OrdersController extends \BaseController {

    use CartTrait;

    private $session;
	private $makeOrderForm;
    private $repository;

	function __construct(Store $session, MakeOrderForm $makeOrderForm, ItemRepository $repository)
    {
        $this->session = $session;
        $this->makeOrderForm = $makeOrderForm;
        $this->repository = $repository;
=======
use GirafftShop\Orders\Order;
use GirafftShop\Orders\Forms\MakeOrderForm;
use GirafftShop\Orders\Commanding\MakeOrderCommand;

class OrdersController extends \BaseController {

	private $makeOrderForm;

	function __construct(MakeOrderForm $makeOrderForm)
    {
        $this->makeOrderForm = $makeOrderForm;
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a
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
<<<<<<< HEAD

        $data['items'] = $this->getCartItems();

        return View::make('orders.create', $data);
=======
		return View::make('orders.create');
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /orders
	 *
	 * @return Response
	 */
	public function store()
	{
<<<<<<< HEAD
        $items = $this->getCartItems();


        // throw exception if any upcs or quantities in cart are invalid
        if (!$this->isValidCart())
        {
            throw new Exception;
        }

        // Create new order
		$input = array_merge(Input::only(['card', 'expiryDate']), [
            'receiptId' => generateReceiptId(),
            'date' => date('Y-m-d'),
            'cUsername' => Auth::user()->username
        ]);

		$this->makeOrderForm->validate($input);

        $order = $this->execute(MakeOrderCommand::class, $input);


        // Create new purchase item for each cart item

        foreach($items as $upc => $itemContainer)
        {
            $quantity = $itemContainer['quantity'];
            $item = $itemContainer['entity'];

            $this->execute(PurchaseItemCommand::class, [
                'order_receiptId' => $order->receiptId,
                'item_upc'        => $item->upc,
                'quantity'        => $quantity
            ]);
        }

        // clear the cart

        $this->session->set('cart', []);
=======
		$input = Input::all();

		$this->makeOrderForm->validate($input);

		$input['date'] = strtotime($input['date']);
		$input['expiryDate'] = strtotime($input['expiryDate']);
		$input['expectedDate'] = strtotime($input['expectedDate']);
		$input['deliveredDate'] = strtotime($input['deliveredDate']);

		$this->execute(MakeOrderCommand::class);
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a

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