<?php namespace GirafftShop\Forms;

use Laracasts\Validation\FormValidator;

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