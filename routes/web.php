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
 
  Route::get('get-klien', 'KlienController@index');
  Route::post('store-klien', 'KlienController@store');
  Route::post('edit-klien', 'KlienController@edit');
  Route::post('delete-klien', 'KlienController@destroy');