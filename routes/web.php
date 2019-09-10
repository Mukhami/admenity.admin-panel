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

Route::get('/fact_sheet_details', 'ProfileController@index')->name('index');//profile and listings view

Route::get('/', 'StatsController@stats_index')->name('stats');//admin home
Route::get('/refresh_access_token', 'StatsController@refreshAccessToken')->name('refresh');
Route::get('/users_list', 'StatsController@getUsersList')->name('user.lists');
Route::get('/sent_sms_summary', 'StatsController@getSentSMSSummary')->name('sms.summary');
Route::get('/sent_sms_logs', 'StatsController@getSentSMSLogs')->name('sms.logs');

//listed securities routes
Route::get('view_securities', 'ListedSecuritiesController@index')->name('listings.index');
Route::get('securities', 'ListedSecuritiesController@create')->name('security.create');
Route::post('securities', 'ListedSecuritiesController@store')->name('security.create');
Route::get('edit_listing/{id}', 'ListedSecuritiesController@edit')->name('listing.edit');
Route::post('edit_listing', 'ListedSecuritiesController@update')->name('listing.update');
Route::get('delete_listing/{id}', 'ListedSecuritiesController@destroy')->name('listing.delete');

//Profile Routes
Route::get('create', 'ProfileController@create')->name('profile.create');
Route::post('create', 'ProfileController@store')->name('profile.create');
Route::get('edit_profile/{id}', 'ProfileController@edit')->name('profile.edit');
Route::post('edit_profile', 'ProfileController@update')->name('profile.update');

//Market Flow Routes
Route::get('market_flow', 'ListedSecuritiesController@create_market_flow')->name('market_flow.create');
Route::post('market_flow', 'ListedSecuritiesController@store_market_flow')->name('market_flow.create');
Route::get('edit_market_flow/{id}', 'ListedSecuritiesController@edit_market_flow')->name('market_flow.edit');
Route::post('edit_market_flow', 'ListedSecuritiesController@update_market_flow')->name('market_flow.update');
Route::get('delete_market_flow/{id}', 'ListedSecuritiesController@delete_market_flow')->name('market_flow.delete');

//Industry Sector Routes
Route::get('industry_sector', 'ListedSecuritiesController@create_industry_sector')->name('sector.create');
Route::post('industry_sector', 'ListedSecuritiesController@store_industry_sector')->name('sector.create');
Route::get('edit_industry_sector/{id}', 'ListedSecuritiesController@edit_industry_sector')->name('sector.edit');
Route::post('edit_industry_sector', 'ListedSecuritiesController@update_industry_sector')->name('sector.update');
Route::get('delete_sector/{id}', 'ListedSecuritiesController@delete_industry_sector')->name('sector.delete');


//Performance Capitalization Routes
Route::get('performance_by_capitalization', 'ListedSecuritiesController@create_capitalization')->name('capitalization.create');
Route::post('performance_by_capitalization', 'ListedSecuritiesController@store_capitalization')->name('capitalization.create');
Route::get('edit_performance_by_capitalization/{id}', 'ListedSecuritiesController@edit_capitalization')->name('capitalization.edit');
Route::post('edit_performance_by_capitalization', 'ListedSecuritiesController@update_capitalization')->name('capitalization.update');
Route::get('delete_capitalization_group/{id}', 'ListedSecuritiesController@delete_capitalization')->name('capitalization.delete');
Auth::routes();

//User Roles
Route::get('create_role', 'HomeController@create_role')->name('role.create');
Route::post('create_role', 'HomeController@store_role')->name('role.create');

Route::get('listed_panel_users', 'HomeController@user_list')->name('users.list');
Route::get('edit_user_role/{id}', 'HomeController@show_user_edit')->name('user.edit');
Route::post('edit_user_role', 'HomeController@update_user')->name('user.update');;
Route::get('delete_user/{id}', 'HomeController@delete_user')->name('user.delete');


Route::get('send_invite', 'HomeController@invite_form')->name('invite');
Route::post('send_invite', 'HomeController@invite_mail')->name('mail');


Route::get('/home', 'HomeController@index')->name('home');
