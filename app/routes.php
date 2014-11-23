<?php

use GirafftShop\Customers\Customer;
use GirafftShop\Items\Item;
use GirafftShop\Orders\Order;
<<<<<<< HEAD
use GirafftShop\Orders\PurchaseItem;
=======
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

if( ! Auth::check()) $uses = 'SessionsController@create';
else $uses = 'SearchController@create';

Route::get('/', [
    'as'=>'home',
    'uses'=> $uses
]);

/*
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
 * Sessions
 */
/*
Route::get('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@create'
]);
*/
Route::post('login', [
    'as' => 'login_path',
    'before' => 'csrf',
    'uses' => 'SessionsController@store'
]);
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

Route::get('items/new', [
    'as' => 'newItem_path',
    'uses' => 'ItemsController@create'
]);
Route::post('items/new', [
    'as' => 'newItem_path',
    'uses' => 'ItemsController@store'
]);

Route::get('items/edit', [
    'as' => 'editItem_path',
    'uses' => 'ItemsController@edit'
]);
Route::post('items/edit', [
    'as' => 'editItem_path',
    'uses' => 'ItemsController@update'
]);

Route::get('items/{upc}', [
    'as' => 'showItem_path',
    'uses' => 'ItemsController@show'
]);

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
Route::get('orders/new', [
    'as' => 'newOrder_path',
    'uses' => 'OrdersController@create'
]);
Route::post('orders/new', [
    'as' => 'newOrder_path',
    'uses' => 'OrdersController@store'
]);


/* -------- test functions -------- */
Route::get('test', function() {

    $data['customers'] = Customer::all();
    $data['items'] = Item::all();
    $data['orders'] = Order::all();
<<<<<<< HEAD
    $data['purchaseItems'] = PurchaseItem::all();
=======
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a
    return View::make('test', $data);
});