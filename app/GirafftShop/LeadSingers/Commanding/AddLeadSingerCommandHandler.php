<?php namespace GirafftShop\LeadSingers\Commanding;

use GirafftShop\LeadSingers\LeadSinger;
use GirafftShop\Repos\LeadSingerRepository;
use CommandHandler;

class AddLeadSingerCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(LeadSingerRepository $repository)
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
        $leadSinger = LeadSinger::add($command->item_upc, $command->name);

        $this->repository->save($leadSinger);

        return $leadSinger;
    }
}