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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact/create', 'UserController@createContact')->name('create-contact');
Route::post('/contact', 'UserController@saveContact')->name('save-contact');
Route::get('/contact/{id}/edit', 'UserController@editContact')->name('edit-contact');
Route::put('/contact/{id}', 'UserController@updateContact')->name('update-contact');
Route::delete('/contact/{id}', 'UserController@deleteContact')->name('delete-contact');
