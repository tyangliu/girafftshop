<?php namespace GirafftShop\Orders\Forms;

use FormValidator;

class MakeOrderForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
<<<<<<< HEAD
        'card' => 'required|integer',
        'expiryDate' => 'required|date'
=======
        'receiptId' => 'required|integer',
        'date' => 'required|date',
        'cUsername' => 'required',
        'card' => 'required|integer',
        'expiryDate' => 'required|date',
        'expectedDate' => 'required|date',
        'deliveredDate' => 'required|date',
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a
    ];
} 