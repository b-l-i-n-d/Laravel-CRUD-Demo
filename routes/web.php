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
Route::get('/country', 'CountryController@viewCountry')->name('view-country');
Route::get('/country/add', 'CountryController@addCountry')->name('add-country');
Route::post('/country', 'CountryController@saveCountry')->name('save-country');
Route::get('/country/{id}/edit', 'CountryController@editCountry')->name('edit-country');
Route::put('/country/{id}', 'CountryController@updateCountry')->name('update-country');
Route::delete('/country/{id}', 'CountryController@deleteCountry')->name('delete-country');
