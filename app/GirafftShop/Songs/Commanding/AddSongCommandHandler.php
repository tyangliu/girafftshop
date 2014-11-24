<?php namespace GirafftShop\Songs\Commanding;

use GirafftShop\Songs\Song;
use GirafftShop\Repos\SongRepository;
use CommandHandler;

class AddSongCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(SongRepository $repository)
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
        $song = Song::add($command->item_upc, $command->title);

        $this->repository->save($song);

        return $song;
    }
}