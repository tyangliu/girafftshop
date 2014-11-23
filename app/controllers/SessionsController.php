<?php

use GirafftShop\Customers\Forms\SignInForm;

/**
 * Class SessionsController
 */
class SessionsController extends \BaseController {

    /**
     * @var SignInForm
     */
    protected $signInForm;

    /**
     * @param SignInForm $signInForm
     */
    function __construct(SignInForm $signInForm)
    {
        $this->signInForm = $signInForm;

        $this->beforeFilter('guest', ['except' => 'destroy']);
    }


    /**
	 * Show login form
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        $this->signInForm->validate($input);

        $remember = 0;

        extract($input);

        $attempt = Auth::attempt([
            'username' => $username,
            'password' => $password],
            $remember
        );

        if ( $attempt ) return Redirect::intended('/');

        //TODO: add error message
        return Redirect::back()->withInput(Input::except('password'));
	}

	/**
	 * Logout user
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
        Session::flush();
        return Redirect::home();
	}

}