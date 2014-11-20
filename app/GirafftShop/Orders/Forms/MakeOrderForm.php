<?php namespace GirafftShop\Orders\Forms;

use Laracasts\Validation\FormValidator;

class MakeOrderForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'receiptId' => 'required|integer',
        'date' => 'required|date',
        'cUsername' => 'required',
        'card' => 'required|integer',
        'expiryDate' => 'required|date',
        'expectedDate' => 'required|date',
        'deliveredDate' => 'required|date',
    ];
} 