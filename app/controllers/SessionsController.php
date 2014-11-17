<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
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
		$input = Input::only('username', 'password', 'remember');

        $rememberMe = false;
        if (Input::get('remember') == 'true') {
            $rememberMe = true;
        }

        $attempt = Auth::attempt([
            'username' => $input['username'],
            'password' => $input['password']
        ], $rememberMe);

        if ($attempt) return Redirect::intended('/');

        //TODO: change this
        return Redirect::back()->with('flash_message', 'Invalid credentials')->withInput();

	}

	/**
	 * Logout user
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
        return Redirect::home();
	}

}