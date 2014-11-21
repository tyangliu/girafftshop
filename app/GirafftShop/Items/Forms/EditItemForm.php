<?php namespace GirafftShop\Items\Forms;

use FormValidator;

class EditItemForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'upc'   => 'required|integer',
        'price' => 'required|integer',
        'stock' => 'required|integer'
    ];
} 