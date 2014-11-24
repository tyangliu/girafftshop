<?php namespace GirafftShop\Orders\Forms;

use FormValidator;

class GetTopSellingForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'date' => 'required|date',
        'numberOfRows' => 'required|integer|min:1'
    ];
} 