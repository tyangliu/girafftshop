<?php namespace GirafftShop\Forms;

use Laracasts\Validation\FormValidator;

class AddItemForm extends FormValidator {
    /**
     * Validation rules for adding item
     *
     * @var array
     */
    protected $rules = [
        'upc' => 'required|integer',
        'title' => 'required|alpha_num',
        'type' => 'required|alpha|between:2,3',
        'category' => 'required|alpha_num',
        'company' => 'required|alpha_num',
        'year' => 'required|integer|digits:4',
        'price' => 'required|integer',
        'stock' => 'required|integer',
        'leadSingerName' => 'alpha'
    ];
} 