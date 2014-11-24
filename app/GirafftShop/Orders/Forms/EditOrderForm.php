<?php namespace GirafftShop\Orders\Forms;

use FormValidator;

class EditOrderForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'deliveredDate' => 'required|date'
    ];
} 