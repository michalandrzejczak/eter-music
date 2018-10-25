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

Route::get('users', function()
					 {
						 return View::make('users');
					 });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/rents/{id?}', 'RentController@show', function ($id = null) {
    return $id;
})->name('rents');

Route::post('/rents', 'RentController@create')->name('rents.create');

Route::get('/myrents/{userName}', 'MyrentsController@index')->name('myrents');
