<?php

use GirafftShop\Commands\AddItemToCartCommand;
use GirafftShop\Repositories\ItemRepository;
use Illuminate\Session\Store;

class CartController extends \BaseController {

    protected $session;
    protected $repository;

    function __construct(Store $session, ItemRepository $repository)
    {
        $this->session = $session;
    }

    public function store() {

        $this->execute(AddItemToCartCommand::class);
    }

    // inefficient implementation
    public function removeCartItem() {

    }

    public function index() {
        $cart = $this->session->get('cart');

        foreach ($cart as $upc => $quantity ) {
            $item = $this->repository->getByField('upc', $upc);
        }
    }
}