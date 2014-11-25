<?php namespace GirafftShop\OrderReturns\Commanding;
use CommandHandler;
use GirafftShop\Repos\OrderReturnRepository;
use GirafftShop\OrderReturns\OrderReturn;
class MakeReturnCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(OrderReturnRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($command)
    {
        $orderReturn = OrderReturn::make([
            'returnId'        => $command->returnId,
            'date'            => $command->date,
            'order_receiptId' => $command->order_receiptId
        ]);

        $this->repository->save($orderReturn);

        return $orderReturn;
    }
}