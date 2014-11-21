<?php namespace GirafftShop\Items\Forms;


use FormValidator;

class EditCartItemForm extends FormValidator {
    protected $rules = [
        'item_upc' => 'required|integer',
        'quantity' => 'required|integer|min:1'
    ];
} 