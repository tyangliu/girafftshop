<?php

use GirafftShop\Repos\SongRepository;
use GirafftShop\Songs\Forms\AddSongForm;

class SongsController extends \BaseController {

    private $songRepository;
    private $addSongForm;

    function __construct(SongRepository $songRepository, AddSongForm $addSongForm)
    {
        $this->songRepository = $songRepository;
        $this->addSongForm = $addSongForm;
    }

    public function create($receiptId)
    {
        return View::make('control_panel.songs.create', )
    }

    public function update($receiptId)
    {
        $input = array_add(Input::all(), 'receiptId', $receiptId);

        $this->execute(EditOrderCommand::class, $input);

        return Redirect::route('cp_showOrder_path', $receiptId);
    }

}