<?php namespace GirafftShop\Items\Commanding;


use CommandHandler;
use GirafftShop\Repos\ItemRepository;
use GirafftShop\Items\Item;

class AddItemCommandHandler implements CommandHandler {

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
        $item = Item::add([
            'upc'            => $command->upc,
            'title'          => $command->title,
            'type'           => $command->type,
            'category'       => $command->category,
            'company'        => $command->company,
            'year'           => $command->year,
            'price'          => $command->price,
            'stock'          => $command->stock,
        ]);

        $this->repository->save($item);

        return $item;
    }
}