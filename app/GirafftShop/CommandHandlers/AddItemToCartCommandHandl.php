<?php namespace GirafftShop\CommandHandlers;

use CommandHandler;
use Illuminate\Session\Store;

class AddItemToCartCommandHandler implements CommandHandler {

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
        $this->session->put('cart', array_add(
            $cart,
            $command->item_upc,
            $command->quantity
        ));
    }
}