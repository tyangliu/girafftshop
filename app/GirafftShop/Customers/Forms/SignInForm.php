<?php namespace GirafftShop\Customers\Forms;

use FormValidator;

/**
 * Class Login
 * @package GirafftShop\Forms
 */
class SignInForm extends FormValidator {
    /**
     * Validation rules for sign in
     *
     * @var array
     */
    protected $rules = [
        'username' => 'required|alpha_num',
        'password' => 'required|alpha_num',
        'remember' => 'boolean'
    ];
} 