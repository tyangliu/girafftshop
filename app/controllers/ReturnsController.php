<?php

use GirafftShop\Repos\OrderReturnRepository;

class ReturnsController extends \BaseController {

    private $orderReturnRepository;

    function __construct(OrderReturnRepository $orderReturnRepository)
    {
        $this->orderReturnRepository = $orderReturnRepository;
    }

    public function index()
    {

        $data['returns'] = $this->orderReturnRepository->getAll();

        return View::make('control_panel.returns.index', $data);
    }

    public function show($returnId)
    {
        $orderReturn = $this->orderReturnRepository->getByField('returnId', $returnId)->first();
        $returnItems = $orderReturn->returnItems;

        $data['return'] = $orderReturn;
        $data['returnItems'] = $returnItems;

        return View::make('control_panel.returns.show', $data);
    }

}