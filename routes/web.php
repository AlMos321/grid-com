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

Route::get('/', 'FrontController@index');
Route::get('/about', 'FrontController@about');
Route::get('/delivery', 'FrontController@delivery');
Route::get('/thankyou', 'FrontController@thankyou');

Route::get('/nowa-poshta', 'FrontController@novaPoshta');


Route::get('/posta', 'FrontController@posta');
Route::get('/catalog', 'CatalogController@index');
Route::get('/catalog', 'CatalogController@index');
Route::post('/create/order', 'OrderController@createOrder');
Route::post('/create/posta/order', 'OrderController@createPoshtaOrder');


Auth::routes();
Route::get('/home', 'HomeController@index');

/**
 * Admin section 
 */
Route::get('/admin', 'AdminController@index');
Route::get('/admin/create/catalog', 'AdminController@createView');
Route::post('/post/catalog/create', 'AdminController@createProduct');
Route::post('/post/catalog/update', 'AdminController@updateProduct');
Route::get('/remove/catalog', 'AdminController@removeProduct');
Route::get('/update/catalog', 'AdminController@updateView');


/**
 * Orders Section 
 */

Route::get('/admin/orders', 'AdminController@indexOrder');
Route::post('/update/order', 'AdminController@changeOrderValue');
Route::post('/remove/order', 'AdminController@removeOrder');



/**
 * Seo section
 */

Route::get('/admin/seo', 'AdminController@indexSeo');
Route::get('/add/seo/new', 'AdminController@createSeo');
Route::post('/update/seo', 'AdminController@updateSeo');


/**
 * End admin section
 */


/**
 * Telegram section
 */
Route::get('/telegram/get/updates', 'TelegramController@getUpdates');


/**
 * Poshta section
 */

Route::get('/get/cities', 'PoshtaController@getCities');
