<?php

use Illuminate\Session\Store;
use GirafftShop\Repos\OrderRepository;
use GirafftShop\Repos\ItemRepository;
use GirafftShop\Orders\Forms\MakeOrderForm;
use GirafftShop\Orders\Forms\EditOrderForm;
use GirafftShop\Orders\Commanding\EditOrderCommand;
use GirafftShop\Orders\Commanding\MakeOrderCommand;
use GirafftShop\Orders\Commanding\PurchaseItemCommand;

class CpOrdersController extends \BaseController {

    use CartTrait;

    private $session;
	private $makeOrderForm;
    private $orderRepository;
    private $itemRepository;
    private $editOrderForm;
    // set number of deliverable orders per day
    private $deliverablePerDay = 1;

	function __construct(Store $session,
                         MakeOrderForm $makeOrderForm,
                         OrderRepository $orderRepository,
                         ItemRepository $itemRepository,
                         EditOrderForm $editOrderForm)
    {
        $this->session = $session;
        $this->makeOrderForm = $makeOrderForm;
        $this->orderRepository = $orderRepository;
        $this->itemRepository = $itemRepository;
        $this->editOrderForm = $editOrderForm;
    }

    public function index()
    {

        $data['orders'] = $this->orderRepository->getPending();

        return View::make('control_panel.orders.index', $data);
    }

    public function show($receiptId)
    {
        $order = $this->orderRepository->getByField('receiptId', $receiptId)->first();
        $purchaseItems = $order->purchaseItems;

        $data['order'] = $order;
        $data['purchaseItems'] = $purchaseItems;

        return View::make('control_panel.orders.show', $data);
    }

    public function update($receiptId)
    {
        $input = array_add(Input::all(), 'receiptId', $receiptId);

        $this->execute(EditOrderCommand::class, $input);

        return Redirect::route('cp_showOrder_path', $receiptId);
    }

}