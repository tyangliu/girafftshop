<?php

use GirafftShop\Items\Commanding\AddToCartCommand;
use GirafftShop\Items\Forms\AddToCartForm;
use GirafftShop\Repos\ItemRepository;
use Illuminate\Session\Store;

class CartController extends \BaseController {

    protected $session;
    protected $addToCartForm;
    protected $repository;

    function __construct(Store $session, AddToCartForm $addToCartForm, ItemRepository $repository)
    {
        $this->session = $session;
        $this->repository = $repository;
        $this->addToCartForm = $addToCartForm;
    }

    public function store() {

        $this->addToCartForm->validate(Input::all());

        extract(Input::all());

        if ($quantity <= $this->repository->getByField('upc',$item_upc)->first()->stock)
        {
            $this->execute(AddToCartCommand::class);

            return Redirect::back();
        }
        else
        {
            return Redirect::back()->withInput();
        }


    }

    // inefficient implementation
    public function removeCartItem() {

    }

    public function index() {
        $cart = $this->session->get('cart');

        $items = [];

        foreach ($cart as $upc => $quantity ) {
            $items =
                array_add(
                    $items,
                    $quantity,
                    $this->repository->getByField('upc', $upc)->first()
                );
        }

        $data['items'] = $items;

        return View::make('cart.index', $data);
    }
}