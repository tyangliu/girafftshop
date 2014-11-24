<?php

use GirafftShop\Repos\SongRepository;
use GirafftShop\Songs\Forms\AddSongForm;
use GirafftShop\Songs\Commanding\AddSongCommand;

class SongsController extends \BaseController {

    private $songRepository;
    private $addSongForm;

    function __construct(SongRepository $songRepository, AddSongForm $addSongForm)
    {
        $this->songRepository = $songRepository;
        $this->addSongForm = $addSongForm;
    }

    public function create($upc)
    {
        $data['upc'] = $upc;

        return View::make('control_panel.inventory.songs.create', $data);
    }

    public function store($upc)
    {
        $titles = filterEmpty(Input::get('titles'));

        foreach ($titles as $title)
        {
            $input = ['title' => $title, 'item_upc' => $upc];

            $this->addSongForm->validate($input);


            if ($this->songRepository->getByField('title', $title)->isEmpty())
                $this->execute(AddSongCommand::class, $input);

        }

        return Redirect::route('editItem_path', $upc);
    }

}