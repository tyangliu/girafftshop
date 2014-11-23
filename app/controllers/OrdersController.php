<?php

use Illuminate\Session\Store;
use GirafftShop\Repos\OrderRepository;
use GirafftShop\Repos\ItemRepository;
use GirafftShop\Orders\Forms\MakeOrderForm;
use GirafftShop\Orders\Commanding\MakeOrderCommand;
use GirafftShop\Orders\Commanding\PurchaseItemCommand;

class OrdersController extends \BaseController {

    use CartTrait;

    private $session;
	private $makeOrderForm;
    private $orderRepository;
    private $itemRepository;
    // set number of deliverable orders per day
    private $deliverablePerDay = 1;

	function __construct(Store $session,
                         MakeOrderForm $makeOrderForm,
                         OrderRepository $orderRepository,
                         ItemRepository $itemRepository)
    {
        $this->session = $session;
        $this->makeOrderForm = $makeOrderForm;
        $this->orderRepository = $orderRepository;
        $this->itemRepository = $itemRepository;
    }

	/**
	 * Display a listing of the resource.
	 * GET /orders
	 *
	 * @return Response
	 */
	public function index()
	{
        $data['orders'] = $this->orderRepository->getByField('cUsername', Auth::user()->username);
        return View::make('orders.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /orders/create
	 *
	 * @return Response
	 */
	public function create()
	{

        $data['items'] = $this->getCartItems();

        return View::make('orders.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /orders
	 *
	 * @return Response
	 */
	public function store()
	{
        $items = $this->getCartItems();


        // throw exception if any upcs or quantities in cart are invalid
        if (!$this->isValidCart())
        {
            throw new Exception;
        }

        // Create new order

        $today = date('Y-m-d');

		$input = array_merge(Input::only(['card', 'expiryDate']), [
            'receiptId' => generateReceiptId(),
            'date' => $today,
            'cUsername' => Auth::user()->username,
            'expectedDate' => $this->calcExpectedDate($today)
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

		return Redirect::route('newOrder_path');

	}

	/**
	 * Display the specified resource.
	 * GET /orders/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($receiptId)
	{
        $order = $this->orderRepository->getByField('receiptId', $receiptId)->first();
        $purchaseItems = $order->purchaseItems;

        $data['order'] = $order;
        $data['purchaseItems'] = $purchaseItems;

        return View::make('orders.show', $data);
	}

    public function setDeliverablePerDay($numOrders)
    {
        $this->deliverablePerDay = $numOrders;
    }

    private function calcExpectedDate($orderDate)
    {
        $totalPending = count($this->orderRepository->getPending());

        $days = ceil($totalPending/$this->deliverablePerDay);

        return date('Y-m-d', strtotime($orderDate . ' + ' . $days . ' days'));
    }

}