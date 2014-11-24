<?php namespace GirafftShop\Orders\Commanding;

use CommandHandler;
use GirafftShop\Repos\OrderRepository;

class EditOrderCommandHandler implements CommandHandler {

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
        $this->repository->update($command->receiptId, $command->deliveredDate);
    }
}