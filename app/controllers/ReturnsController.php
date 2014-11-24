<?php

use GirafftShop\Repos\ItemRepository;
use GirafftShop\OrderReturns\Forms\MakeReturnForm;
use GirafftShop\OrderReturns\Commanding\MakeReturnCommand;
use GirafftShop\OrderReturns\Commanding\ReturnItemCommand;

class ReturnsController extends \BaseController {

	private $makeReturnForm;
    private $repository;

	function __construct(Store $session, MakeReturnForm $makeReturnForm, ItemRepository $repository)
    {
        $this->session = $session;
        $this->makeReturnForm = $makeReturnForm;
        $this->repository = $repository;
    }

}