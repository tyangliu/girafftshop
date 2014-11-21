<?php

use GirafftShop\Forms\RegistrationForm;
use GirafftShop\Commands\RegisterCustomerCommand;

/**
 * Class RegistrationController
 */
class RegistrationController extends BaseController {

    /**
     * @var RegistrationForm
     */
    private $registrationForm;
    /**
     * Constructor
     *
     * @param RegistrationForm $registrationForm
     */
    function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;
        $this->beforeFilter('guest');
    }
    /**
     * Show a form to register the user
     *
     * @return Response
     */
    public function create()
    {
        return View::make('registration.create');
    }
    /**
     * Create a new Larabook user.
     *
     * @return string
     */
    public function store()
    {
        $this->registrationForm->validate(Input::all());

        $customer = $this->execute(RegisterCustomerCommand::class);

        Auth::login($customer);
        //Flash::overlay('Sign up successful!');
        return Redirect::home();
    }
} 