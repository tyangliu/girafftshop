<?php

use GirafftShop\Repos\OrderRepository;
use GirafftShop\Orders\Forms\EditOrderForm;
use GirafftShop\Orders\Commanding\EditOrderCommand;

class DeliveryController extends \BaseController {

    private $orderRepository;
    private $editOrderForm;

	function __construct(OrderRepository $orderRepository, EditOrderForm $editOrderForm)
    {
        $this->orderRepository = $orderRepository;
        $this->editOrderForm = $editOrderForm;
    }

    public function index()
    {

        $data['orders'] = $this->orderRepository->getPending();

        return View::make('control_panel.pending-orders.index', $data);
    }

    public function show($receiptId)
    {
        $order = $this->orderRepository->getByField('receiptId', $receiptId)->first();
        $purchaseItems = $order->purchaseItems;

        $data['order'] = $order;
        $data['purchaseItems'] = $purchaseItems;

        return View::make('control_panel.pending-orders.show', $data);
    }

    public function update($receiptId)
    {
        $input = array_add(Input::all(), 'receiptId', $receiptId);

        $this->execute(EditOrderCommand::class, $input);

        return Redirect::route('cp_showOrder_path', $receiptId);
    }

}