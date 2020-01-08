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
Route::get('/contact/create', 'ContactController@createContact')->name('create-contact');
Route::post('/contact', 'ContactController@saveContact')->name('save-contact');
Route::get('/contact/{id}/edit', 'ContactController@editContact')->name('edit-contact');
Route::put('/contact/{id}', 'ContactController@updateContact')->name('update-contact');
Route::delete('/contact/{id}', 'ContactController@deleteContact')->name('delete-contact');
Route::post('/validate_email', 'ContactController@validateEmail')->name('validate-email');

Route::get('/country', 'CountryController@viewCountry')->name('view-country');
Route::get('/country/add', 'CountryController@addCountry')->name('add-country');
Route::post('/country', 'CountryController@saveCountry')->name('save-country');
Route::get('/country/{id}/edit', 'CountryController@editCountry')->name('edit-country');
Route::put('/country/{id}', 'CountryController@updateCountry')->name('update-country');
Route::delete('/country/{id}', 'CountryController@deleteCountry')->name('delete-country');
