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


Auth::routes();
Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('users', 'UserController');

Route::resource('companies', 'CompanyController');

Route::resource('companyMetas', 'CompanyMetaController');

Route::resource('cobranzas', 'CobranzaController');

Route::resource('notifications', 'NotificationController');

Route::get('test', 'userController@test');

Route::get('vouchers/{company}', 'CobranzaController@vouchers')->name('vouchers');
Route::get('vouchers_by_ceco/{cecoId}', 'CobranzaController@vouchersByCeco')->name('vouchersByCeco');
Route::get('vouchers_periodo/', 'CobranzaController@periodo')->name('vouchersPeriodo');
Route::get('vouchers_ceco_list', 'CobranzaController@getCecoList')->name('cecoLists');


Route::get('/periodo_anterior', 'CobranzaController@old')->name('periodo_anterior');
