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
<<<<<<< HEAD
            'expiryDate'    => $command->expiryDate
=======
            'expiryDate'    => $command->expiryDate,
            'expectedDate'  => $command->expectedDate,
            'deliveredDate' => $command->deliveredDate,
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a
        ]);

        $this->repository->save($order);

        return $order;
    }
}