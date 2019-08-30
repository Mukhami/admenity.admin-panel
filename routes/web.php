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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/view_profile', 'ProfileController@index')->name('index');//profile and listings view

Route::get('/', 'ProfileController@stats_index')->name('stats');//admin home


Route::get('view_securities', 'ListedSecuritiesController@index')->name('listings.index');
Route::get('securities', 'ListedSecuritiesController@create')->name('security.create');
Route::post('securities', 'ListedSecuritiesController@store')->name('security.create');
Route::get('edit_listing/{id}', 'ListedSecuritiesController@edit')->name('listing.edit');
Route::post('edit_listing', 'ListedSecuritiesController@update')->name('listing.update');
Route::get('delete_listing/{id}', 'ListedSecuritiesController@destroy')->name('listing.delete');


Route::get('create', 'ProfileController@create')->name('profile.create');
Route::post('create', 'ProfileController@store')->name('profile.create');
Route::get('edit_profile/{id}', 'ProfileController@edit')->name('profile.edit');
Route::post('edit_profile', 'ProfileController@update')->name('profile.update');
