<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@showHomePage');



Route::get('/dash', 'AdminPanelController@index');

Route::post('/dash/order/save_order_status', 'AdminPanelController@saveOrderStatus');

Route::resource('/order', 'OrderController');



Route::resource('/category', 'CategoryController');



Route::post('/request_custom_order', 'OrderController@requestCustomOrder');



Route::resource('/product', 'ProductController');


Route::resource('/menu', 'MenuController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search_query', 'HomeController@searchQuery');




Route::get('/invoice', 'OrderController@showInvoice');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

