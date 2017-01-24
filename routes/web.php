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
//Establecer rutas del navegador
// Route::get('prueba',function(){
// 	return "hola desde route.php";
// });
// //enviar parametro por url nombre / pepito
// Route::get('nombre/{nombre}',function($nombre){
// 	return "mi nombre es".$nombre;	
// });

/**********Ruta Index***********/
Route::get('/','frontController@index');
Route::get('/insert','frontController@order');
Route::post('post','frontController@order');
//get data restaurant 
Route::get('restaurant','restaurantController@index');
//get data headquarter with parameter restaurant_id
Route::get('headquarter','headquarterController@index');
//get data product with parameter headquarter_id
Route::get('product','productController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

// example of test unity's laravel
// if ( ! function_exists('welcome')) {
//     function welcome()
//     {
//         if (auth()->check()) {
// 	        return 'Welcome ' . auth()->user()->name . '!';
// 	    }
	 
// 	    return 'Welcome guest!';
//     }
// }
