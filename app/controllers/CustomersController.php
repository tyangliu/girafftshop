<?php

class CustomersController extends \BaseController
{

    /**
     * Show the sign up form
     * GET /customers/create
     *
     * @return Response
     */
    public function create()
    {
        return View::make('customers.create');
    }


    /**
     * Create a new customer
     *
     * @return Response
     */
    public function store()
    {
        $rules = array(
            'username' => 'required|alpha_num',
            'password' => 'required|alpha_num',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|digits:10'
        );
        $validator = Validator::make(Input::all(), $rules);

        //process the login
        if ($validator->fails()) {
            return Redirect::to('signup')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            //store
            $customer = new Customer;
            $customer->username = Input::get('username');
            $customer->password = Hash::make(Input::get('password'));
            $customer->name = Input::get('name');
            $customer->address = Input::get('address');
            $customer->phone = Input::get('phone');
            $customer->save();

            Session::flash('message', 'Successfully created a Customer !');

            // TODO: registration complete page
            return Redirect::home();
        }
    }

}