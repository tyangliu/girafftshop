<?php namespace GirafftShop\Items\Commanding;

use CommandHandler;
use GirafftShop\Repos\ItemRepository;
use GirafftShop\Items\Item;

class SearchItemCommandHandler implements CommandHandler {
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
        $fields = filterEmpty([
            'category' => $command->category,
            'title' => $command->title,
            'leadSingerName' => $command->leadSingerName
        ]);

        return $this->repository->getByFields($fields);
    }

} 