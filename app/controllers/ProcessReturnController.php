<?php

use GirafftShop\Repos\OrderRepository;
use GirafftShop\Repos\PurchaseItemRepository;
use GirafftShop\Repos\OrderReturnRepository;
use GirafftShop\OrderReturns\Forms\MakeReturnForm;
use GirafftShop\OrderReturns\Commanding\MakeReturnCommand;
use GirafftShop\OrderReturns\Commanding\ReturnItemCommand;

class ProcessReturnController extends \BaseController {

	private $makeReturnForm;
    private $orderRepository;
    private $purchaseItemRepository;

	function __construct(
        MakeReturnForm $makeReturnForm,
        OrderRepository $orderRepository,
        PurchaseItemRepository $purchaseItemRepository)
    {
        $this->makeReturnForm = $makeReturnForm;
        $this->orderRepository = $orderRepository;
        $this->purchaseItemRepository = $purchaseItemRepository;
    }

    public function index()
    {
        $data['orders'] = $this->orderRepository->getReturnable();

        return View::make('control_panel.returnable-orders.index', $data);
    }

    public function show($receiptId)
    {
        $order = $this->orderRepository->getByField('receiptId', $receiptId)->first();
        $purchaseItems = $order->purchaseItems;

        $data['order'] = $order;
        $data['purchaseItems'] = $purchaseItems;
        $data['returnable'] = $this->isReturnable($order);

        return View::make('control_panel.returnable-orders.show', $data);
    }

    public function store()
    {
        $returnItems = Input::except('_token', 'receiptId');
        $order_receiptId = Input::get('receiptId');

        // Remove inputs without return == 1
        $returnItems = array_where($returnItems, function($key, $value)
        {
            return array_key_exists('return', $value) && ($value['quantity'] > 0);
        });

        // redirect if no items are selected
        if (empty($returnItems))
        {
            return Redirect::back();
        }

        $today = date('Y-m-d');

        $returnFields = [
            'returnId' => generateReturnId(),
            'date' => $today,
            'order_receiptId' => $order_receiptId
        ];

        $this->makeReturnForm->validate($returnFields);

        $orderReturn = $this->execute(MakeReturnCommand::class, $returnFields);

        // Create new purchase item for each cart item

        foreach($returnItems as $upc => $params)
        {
            extract($params);

            $purchaseItem = $this->purchaseItemRepository->getByFields([
                'order_receiptId' => $order_receiptId,
                'item_upc' => 123232
            ])->first();

            $purchaseQty = $purchaseItem->quantity;

            $sumReturnQty = $this->getSum($orderReturn->returnId, $upc);

            // if total number of items returned is more than items purchased, give error

            if ($purchaseQty < ($sumReturnQty + $quantity))
            {
                return Redirect::back()->withInput();
            }

            $this->execute(ReturnItemCommand::class, [
                'return_returnId' => $orderReturn->returnId,
                'item_upc'        => $item_upc,
                'quantity'        => $quantity
            ]);
        }

        return Redirect::route('showOrderReturn_path', $order_receiptId);
    }

    private function isReturnable($order) {
        $seconds = strtotime(date('Y-m-d')) - strtotime($order->date);
        $days = ceil($seconds / 86400);
        return $days <= 15;
    }

    private function getSum($returnId, $item_upc)
    {
        $result = DB::select(DB::raw(
            "SELECT SUM(quantity) as qtySum FROM return_items
             WHERE return_returnId ='" . $returnId .
            "'AND item_upc =" . $item_upc .
            " GROUP BY item_upc"));

        if (empty($result)) {
            $sum = 0;
        }
        else {
            $sum = $result[0]->qtySum;
        }
        return $sum;
    }

}