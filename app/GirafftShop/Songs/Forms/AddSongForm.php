<?php namespace GirafftShop\Songs\Forms;

use FormValidator;

class AddSongForm extends FormValidator {

    protected $rules = [
        'item_upc' => 'required|numeric',
        'title' => 'required'
    ];
} 