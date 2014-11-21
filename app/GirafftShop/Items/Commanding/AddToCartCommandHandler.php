<?php namespace GirafftShop\Items\Commanding;

use CommandHandler;
use Illuminate\Session\Store;

class AddToCartCommandHandler implements CommandHandler {

    protected $session;

    function __construct(Store $session)
    {
        $this->session = $session;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $cart = $this->session->get('cart');
        $cart[$command->item_upc] = $command->quantity;
        $this->session->put('cart', $cart);
    }
}