<?php

use GirafftShop\Items\Commanding\AddToCartCommand;
use GirafftShop\Items\Commanding\EditCartItemCommand;
use GirafftShop\Items\Forms\AddToCartForm;
use GirafftShop\Items\Forms\EditCartItemForm;
use GirafftShop\Repos\ItemRepository;
use Illuminate\Session\Store;

class CartController extends \BaseController {

    use CartTrait;

    protected $session;
    protected $addToCartForm;
    protected $editCartItemForm;
    protected $itemRepository;

    function __construct(Store $session,
                         AddToCartForm $addToCartForm,
                         EditCartItemForm $editCartItemForm,
                         ItemRepository $itemRepository)
    {
        $this->session = $session;
        $this->itemRepository = $itemRepository;
        $this->addToCartForm = $addToCartForm;
        $this->editCartItemForm = $editCartItemForm;
    }

    public function store()
    {

        $this->addToCartForm->validate(Input::all());

        extract(Input::all());

        if ($quantity <= $this->itemRepository->getByField('upc',$item_upc)->first()->stock)
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

        $data['items'] = $this->getCartItems();

        return View::make('cart.index', $data);
    }

    public function update()
    {
        $input = Input::except('_token');
        foreach ($input as $upc => $params ) {
            $this->editCartItemForm->validate($params);
            $delete = '0';
            extract($params);

            if (($quantity <= $this->itemRepository->getByField('upc',$item_upc)->first()->stock) || ($delete == '1'))
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