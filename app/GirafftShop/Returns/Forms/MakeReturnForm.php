<?php namespace GirafftShop\Returns\Forms;
use FormValidator;
class MakeReturnForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'receiptId' => 'required|integer',

    ];
} 