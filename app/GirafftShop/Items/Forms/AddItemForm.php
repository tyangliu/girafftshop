<?php namespace GirafftShop\Items\Forms;

use FormValidator;

class AddItemForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'upc' => 'required|numeric',
        'title' => 'required',
        'type' => 'required|alpha|between:2,3',
        'category' => 'required',
        'company' => 'required',
        'year' => 'required|integer|digits:4',
        'price' => ['required', 'regex:/^\d*(\.\d{2})?$/'],
        'stock' => 'required|integer|min:0',
        'leadSingerName' => ''
    ];
} 