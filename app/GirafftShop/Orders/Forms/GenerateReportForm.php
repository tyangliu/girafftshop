<?php namespace GirafftShop\Orders\Forms;

use FormValidator;

class GenerateReportForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'date' => 'required|date'
    ];
} 