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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'pizza'], function (){

    Route::get('/', [
       'uses' => 'PCPizzasController@index',
    ]);

    Route::get('/create/', [
        'uses' => 'PCPizzasController@create',
    ]);

    Route::post('/create/', [
        'as' => 'create.pizza',
        'uses' => 'PCPizzasController@store'
    ]);

});

Route::group(['prefix' => 'ingridients'], function (){

    Route::get('/', [
        'uses' => 'PCIngridientsController@index',
    ]);
});