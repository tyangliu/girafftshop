<?php namespace GirafftShop\OrderReturns\Forms;
use FormValidator;
class MakeReturnForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'order_receiptId' => 'required',
    ];
} 