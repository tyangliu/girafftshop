<?php namespace GirafftShop\Items\Forms;

use FormValidator;

class SearchItemForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'category' => 'alpha_num',
        'title' => '',
        'leadSingerName' => 'alpha'
    ];
} 