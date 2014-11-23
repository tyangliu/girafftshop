<?php

use GirafftShop\Items\Commanding\AddToCartCommand;
use GirafftShop\Items\Commanding\EditCartItemCommand;
use GirafftShop\Items\Forms\AddToCartForm;
use GirafftShop\Items\Forms\EditCartItemForm;
use GirafftShop\Repos\ItemRepository;
use Illuminate\Session\Store;

class CartController extends \BaseController {

<<<<<<< HEAD
    use CartTrait;

=======
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a
    protected $session;
    protected $addToCartForm;
    protected $editCartItemForm;
    protected $repository;

    function __construct(Store $session, AddToCartForm $addToCartForm, EditCartItemForm $editCartItemForm, ItemRepository $repository)
    {
        $this->session = $session;
        $this->repository = $repository;
        $this->addToCartForm = $addToCartForm;
        $this->editCartItemForm = $editCartItemForm;
    }

    public function store()
    {

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

    public function index()
    {
<<<<<<< HEAD

        $data['items'] = $this->getCartItems();
=======
        $cart = $this->session->get('cart');

        $items = [];

        if (is_null($cart) == FALSE) {

            foreach ($cart as $upc => $quantity ) {
                $items = array_add(
                    $items,
                    $upc,
                    ['quantity' => $quantity, 'entity' => $this->repository->getByField('upc', $upc)->first()]
                );
            }
        }     

        $data['items'] = $items;
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a

        return View::make('cart.index', $data);
    }

    public function update()
    {
        $input = Input::except('_token');
        foreach ($input as $upc => $params ) {
            $this->editCartItemForm->validate($params);
            $delete = '0';
            extract($params);

            if (($quantity <= $this->repository->getByField('upc',$item_upc)->first()->stock) || ($delete == '1'))
            {
                $this->execute(EditCartItemCommand::class, [
                    'item_upc' => $item_upc,
                    'quantity' => $quantity,
                    'delete'   => $delete
                ]);
            }
            else
            {
                return Redirect::back();
            }
        }
        return Redirect::back();
    }
}