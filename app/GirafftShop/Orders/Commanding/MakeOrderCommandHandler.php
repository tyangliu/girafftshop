<?php namespace GirafftShop\Orders\Commanding;


use CommandHandler;
use GirafftShop\Repos\OrderRepository;
use GirafftShop\Orders\Order;

class MakeOrderCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $order = Order::make([
            'receiptId'     => $command->receiptId,
            'date'          => $command->date,
            'cUsername'     => $command->cUsername,
            'card'          => $command->card,
            'expiryDate'    => $command->expiryDate,
            'expectedDate'  => $command->expectedDate
        ]);

        $this->repository->save($order);

        return $order;
    }
}