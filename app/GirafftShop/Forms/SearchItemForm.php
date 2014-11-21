<?php namespace GirafftShop\Forms;

use FormValidator;

class SearchItemForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'category' => 'alpha_num',
        'type' => 'alpha|between:2,3',
        'leadSingerName' => 'alpha'
    ];
} 