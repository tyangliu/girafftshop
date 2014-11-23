<?php namespace GirafftShop\Items\Commanding;

use CommandHandler;
use Illuminate\Session\Store;

class EditCartItemCommandHandler implements CommandHandler {

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
        if ( $command->delete == '1' )
        {
            $this->session->forget('cart.' . $command->item_upc);
        }
        else
        {
            $cart[$command->item_upc] = $command->quantity;
            $this->session->put('cart', $cart);
        }
    }
}