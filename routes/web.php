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

Route::resource('kes', 'kesController');
Route::resource('notices', 'noticesController');
Route::resource('customers', 'customersController');
Route::resource('categories', 'categoriesController');
Route::resource('guide', 'guideController');
Route::resource('evidences', 'evidencesController');

Route::get('/kes/{kes_id}/evidences', 'evidencesController@getKesEvidence');

Route::get('/home', 'HomeController@index')->name('home');
