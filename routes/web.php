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

Route::get('/', 'FrontProductController@index')->name('inicio');
Route::get('/search', 'SearchController@show')->name('search');
Route::get('/search/json', 'SearchController@data')->name('data_json');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show')->name('products.show');
Route::post('/cart','CartDetailController@store')->name('cartDetail.show');
Route::delete('/cart','CartDetailController@destroy')->name('cartDetail.destroy');
Route::get('/categories/{category}','CategoryController@show')->name('categories.show');

Route::post('/order','CartController@update')->name('cart.update');
/*isAdmin es el alias que le ponemos en el Kernel a nuestro middleware*/
/*los middlewares se ejecutan en serie, primero ejecutamos auth y si pasa luego
nuestro middleware isAdmin, con auth recordaremos que pagina queriamos visitar*/

/*ojo prefix es para las urls y namespace es para la ruta de los controllers*/
Route::middleware(['auth','isAdmin'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/products','ProductController@index')->name('products.index');
    Route::get('/products/create','ProductController@create')->name('products.create');
    Route::post('/products','ProductController@store')->name('products.store');
    Route::get('/products/{id}/edit','ProductController@edit')->name('products.edit');
    Route::post('/products/{id}/edit','ProductController@update')->name('products.update');
    Route::delete('/products/{id}','ProductController@destroy')->name('products.destroy');

    Route::get('/products/{id}/images','ImageController@index')->name('images.index');//listado
    Route::post('/products/{id}/images','ImageController@store')->name('images.store');//registrar
    Route::delete('/products/{id}/images','ImageController@destroy')->name('images.destroy');//eliminar
    Route::put('/products/{id}/images','ImageController@update_featured')->name('images.update_featured');//asignar o desasignar a una imagen como destacada

    Route::get('/categories','CategoryController@index')->name('categories.index');
    Route::get('/categories/create','CategoryController@create')->name('categories.create');
    Route::post('/categories','CategoryController@store')->name('categories.store');
    Route::get('/categories/{category}/edit','CategoryController@edit')->name('categories.edit');
    Route::post('/categories/{category}/edit','CategoryController@update')->name('categories.update');
    Route::delete('/categories/{category}','CategoryController@destroy')->name('categories.destroy');

    //Route::get('/orders/{id}','')->name('orders.show');

});

