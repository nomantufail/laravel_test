<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Http\Middleware\OldMiddleware;

Route::get('guest',['as'=>'guest','middleware'=>'child',function(){

}]);

Route::get('/', ['as'=>'home','uses'=>'WelcomeController@index']);
Route::get('/customers', ['as'=>'customers','uses'=>'CustomersController@showMany']);
Route::post('/customers/add', ['as'=>'addCustomer','uses'=>'CustomersController@store']);

Route::get('/products', ['as'=>'products','uses'=>'ProductController@show_all']);
Route::post('/product/add', ['as'=>'addProduct','uses'=>'ProductController@store']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
