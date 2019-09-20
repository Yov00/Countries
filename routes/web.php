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

Route::get('/','CountryController@index');
Route::post('/','CountryController@index');
Route::post('/search','CountryController@search');
Route::get('/store','CountryController@store');
Route::get('/destroy','CountryController@destroy');
Route::get('/country/{country}','CountryController@show');