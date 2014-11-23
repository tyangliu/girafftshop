<?php

use GirafftShop\Customers\Customer;
use GirafftShop\Items\Item;
use GirafftShop\Orders\Order;
use GirafftShop\Orders\PurchaseItem;

// if not signed in, show sign in page on home
if( ! Auth::check()) $uses = 'SessionsController@create';
// else show search page on home
else $uses = 'SearchController@create';

/**
 * Home
 */
Route::get('/', [
    'as'=>'home',
    'uses'=> $uses
]);

/**
 * Sign up
 */
Route::get('signup', [
    'as' => 'signup_path',
    'before' => 'guest',
    'uses' => 'RegistrationController@create'
]);

Route::post('signup', [
    'as' => 'signup_path',
    'uses'   => 'RegistrationController@store'
]);

/**
 * Sign In
 */

Route::post('login', [
    'as' => 'login_path',
    'before' => 'csrf',
    'uses' => 'SessionsController@store'
]);

/*
|--------------------------------------------------------------------------
| Clerk Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['before' => 'auth'], function()
{

});

/*
|--------------------------------------------------------------------------
| Manager Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['before' => 'auth'], function()
{
    /**
     * Dashboard
     */
    Route::get('cp', [
        'as' => 'dashboard_path',
        'uses' => 'PanelController@showDashboard'
    ]);
    /**
     * Item Management
     */

    Route::get('cp/inventory', [
        'as' => 'inventory_path',
        'uses' => 'ItemsController@index'
    ]);

    Route::get('cp/inventory/new', [
        'as' => 'newItem_path',
        'uses' => 'ItemsController@create'
    ]);
    Route::post('cp/inventory/new', [
        'as' => 'newItem_path',
        'uses' => 'ItemsController@store'
    ]);
    Route::get('cp/inventory/{upc}', [
        'as' => 'editItem_path',
        'uses' => 'ItemsController@edit'
    ]);
    Route::post('cp/inventory/{upc}', [
        'as' => 'editItem__path',
        'uses' => 'ItemsController@update'
    ]);

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['before' => 'auth'], function()
{

});


/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['before' => 'auth'], function()
{

    Route::get('logout', [
        'as' => 'logout_path',
        'uses' => 'SessionsController@destroy'
    ]);

    /**
     * Item Search
     */
    Route::get('search', [
        'as' => 'search_path',
        'uses' => 'SearchController@show'
    ]);

    /**
     * Individual Item Page
     */

    Route::get('items/{upc}', [
        'as' => 'showItem_path',
        'uses' => 'ItemsController@show'
    ]);


    /**
     * Shopping Cart
     */

    Route::get('cart', [
        'as' => 'cart_path',
        'uses' => 'CartController@index'
    ]);

    Route::post('cart/add', [
        'as' => 'addToCart_path',
        'uses' => 'CartController@store'
    ]);

    Route::post('cart/update', [
        'as' => 'updateCart_path',
        'uses' => 'CartController@update'
    ]);

    /**
     * Orders
     */
    Route::get('orders/', [
        'as' => 'orders_path',
        'uses' => 'OrdersController@index'
    ]);
    Route::get('orders/new', [
        'as' => 'newOrder_path',
        'uses' => 'OrdersController@create'
    ]);
    Route::post('orders/new', [
        'as' => 'newOrder_path',
        'uses' => 'OrdersController@store'
    ]);
    Route::get('orders/{receiptId}', [
        'as' => 'showOrder_path',
        // redirect back to orders list if requested order doesn't belong to user
        'before' => 'belongsToUser',
        'uses' => 'OrdersController@show'
    ]);

});


/*
|--------------------------------------------------------------------------
| Test Routes
|--------------------------------------------------------------------------
|
*/
Route::get('test', function() {

    $data['customers'] = Customer::all();
    $data['items'] = Item::all();
    $data['orders'] = Order::all();

    $data['purchaseItems'] = PurchaseItem::all();

    return View::make('test', $data);
});