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

// Route::get('/', function () {
//     return view('welcome');
// });


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/clients', 'ClientsController@index');
Route::get('/client/create', 'ClientsController@create');
Route::get('/client/{id}/edit', 'ClientsController@edit');
Route::get('/client/{id}/view', 'ClientsController@view');
Route::post('/client/{client}', 'ClientsController@update')->name('clients.update');
Route::post('/client/delete/{id}', 'ClientsController@delete');
Route::get('/client/{id}/stand', 'ClientsController@stand');
Route::get('/client/{id}/invoice', 'ClientsController@invoice');
Route::post('/client/stand/add/{id}', 'ClientsController@addStand');
Route::post('/client', 'ClientsController@store');

Route::get('/locations', 'LocationsController@index');
Route::get('/location/create', 'LocationsController@create');
Route::get('/location/{id}/edit', 'LocationsController@edit');
Route::post('/location/{id}', 'LocationsController@update')->name('locations.update');
Route::post('/location/delete/{id}', 'LocationsController@delete');
Route::post('/location', 'LocationsController@store');

Route::get('/stands', 'StandsController@index');
Route::get('/stands/import', 'StandsController@create');
Route::get('/stand/{id}/edit', 'StandsController@edit');
Route::get('/stand/{id}/view', 'StandsController@view');
Route::post('/stand/{id}', 'StandsController@update')->name('clients.update');
Route::post('/stand/delete/{id}', 'StandsController@delete');
Route::post('/stands', 'StandsController@import');

Route::get('/payments', 'PaymentsController@index');
Route::get('/payment/{id}/view', 'PaymentsController@view');
Route::post('/payment', 'PaymentsController@makePayment');
Route::post('/billing', 'PaymentsController@runBilling');

Route::get('/user/types', 'UserTypesController@index');
Route::get('/user/type/create', 'UserTypesController@create');
Route::get('/user/type/{id}/edit', 'UserTypesController@edit');
Route::post('/user/type/{id}', 'UserTypesController@update')->name('user_types.update');
Route::post('/user/type/delete/{id}', 'UserTypesController@delete');
Route::post('/user/type', 'UserTypesController@store');

Route::get('/users', 'UsersController@index');
Route::get('/users/{id}/edit', 'UsersController@edit');
Route::get('/profile', 'UsersController@profile');
Route::put('/users/{user}', 'UsersController@update')->name('users.update');
Route::post('/users/delete/{id}', 'UsersController@delete');
Route::post('/changePassword', 'UsersController@changePassword')->name('changePassword');
Route::post('/resetPassword', 'UsersController@resetPassword');

Route::get('/graph', 'HomeController@locationGraph');

Route::get('/reports', 'ReportsController@index');
Route::get('/reports/data', 'ReportsController@data');
Route::post('/reports/revenue', 'ReportsController@revenue');
Route::get('/reports/location', 'ReportsController@reportByLocation');
Route::get('/reports/location/data/{id}', 'ReportsController@reportByLocationData');
