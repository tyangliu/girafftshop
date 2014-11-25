<?php namespace GirafftShop\Items\Forms;

use FormValidator;

class SearchItemForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'category' => '',
        'title' => '',
        'leadSingerName' => ''
    ];
} 