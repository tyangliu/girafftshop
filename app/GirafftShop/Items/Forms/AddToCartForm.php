<?php namespace GirafftShop\Items\Forms;


use FormValidator;

class AddToCartForm extends FormValidator {
    protected $rules = [
        'item_upc' => 'required|integer',
        'quantity' => 'required|integer|min:1'
    ];
} 