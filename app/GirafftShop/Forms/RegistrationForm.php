<?php namespace GirafftShop\Forms;

use FormValidator;

/**
 * Class RegistrationFormValidator
 * @package GirafftShop\Forms
 */
class RegistrationForm extends FormValidator {
    /**
     * Validation rules for registration
     *
     * @var array
     */
    protected $rules = [
        'username' => 'required|alpha_num|unique:customers',
        'password' => 'required|alpha_num',
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required|digits:10'
    ];

}