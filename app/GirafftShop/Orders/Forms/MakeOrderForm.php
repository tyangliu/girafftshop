<?php namespace GirafftShop\Orders\Forms;

use FormValidator;

class MakeOrderForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'card' => 'required|integer',
        'expiryDate' => 'required|date'
    ];
} 