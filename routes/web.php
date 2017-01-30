<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/**********Ruta Index***********/
Route::get('/','frontController@index');

Route::post('/order','frontController@create');//route for create order 

Route::get('restaurant','restaurantController@index');
//get data headquarter with parameter restaurant_id
Route::get('headquarter','headquarterController@index');
//get data product with parameter headquarter_id
Route::get('product','productController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
