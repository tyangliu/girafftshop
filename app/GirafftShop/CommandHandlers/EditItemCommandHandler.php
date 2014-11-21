<?php namespace GirafftShop\CommandHandlers;

use CommandHandler;
use GirafftShop\Repositories\ItemRepository;

class EditItemCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(ItemRepository $repository)
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
        $this->repository->update($command->upc, $command->stock, $command->price);
    }
}