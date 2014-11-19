<?php namespace GirafftShop\Items\Commanding;

use CommandHandler;
use GirafftShop\Repos\ItemRepository;

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