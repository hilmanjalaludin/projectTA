<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'AuthController@index');
Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin');
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration');
Route::get('dashboard', 'AuthController@dashboard');
Route::get('logout', 'AuthController@logout');


Route::get('ajax-crud-datatable', 'DataTableAjaxCRUDController@index');
Route::post('store-company', 'DataTableAjaxCRUDController@store');
Route::post('edit-company', 'DataTableAjaxCRUDController@edit');
Route::post('delete-company', 'DataTableAjaxCRUDController@destroy');

Route::get('get-klien', 'KlienController@index')->name('klien.index');
Route::post('store-klien', 'KlienController@store');
Route::post('edit-klien', 'KlienController@edit');
Route::post('delete-klien', 'KlienController@destroy');

Route::get('get-blknama', 'BaliknamaController@index')->name('blknama.index');
Route::post('store-blknama', 'BaliknamaController@store');
Route::post('edit-blknama', 'BaliknamaController@edit');
Route::post('delete-blknama', 'BaliknamaController@destroy');

Route::get('get-jsbn', 'JasabnController@index')->name('jsbn.index');
Route::post('store-jsbn', 'JasabnController@store');
Route::post('edit-jsbn', 'JasabnController@edit');
Route::post('delete-jsbn', 'JasabnController@destroy');

Route::get('get-lpjr', 'LaporanjrController@index')->name('lpjr.index');
Route::post('store-lpjr', 'LaporanjrController@index');
Route::post('edit-lpjr', 'LaporanjrController@edit');
Route::post('delete-lpjr', 'LaporanjrController@destroy');

Route::get('get-lpbayar', 'LaporanbayarController@index')->name('lpbayar.index');
Route::post('store-lpbayar', 'LaporanbayarController@store');
Route::post('edit-lpbayar', 'LaporanbayarController@edit');
Route::post('delete-lpbayar', 'LaporanbayarController@destroy');

Route::get('get-dtpng', 'DatapngController@index')->name('dtpng.index');
Route::post('store-dtpng', 'DatapngController@store');
Route::post('edit-dtpng', 'DatapngController@edit');
Route::post('delete-dtpng', 'DatapngController@destroy');

Route::get('get-dtprk', 'DataprkController@index')->name('dtprk.index');
Route::post('store-dtprk', 'DataprkController@store');
Route::post('edit-dtprk', 'DataprkController@edit');
Route::post('delete-dtprk', 'DataprkController@destroy');
