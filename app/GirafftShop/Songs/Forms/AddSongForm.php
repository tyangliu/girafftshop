<?php namespace GirafftShop\Songs\Forms;

use FormValidator;

class AddSongForm extends FormValidator {

    protected $rules = [
        'upc' => 'required|integer',
        'title' => 'required'
    ];
} 