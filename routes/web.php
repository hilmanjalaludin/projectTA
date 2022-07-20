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

Route::group(['middleware' => 'usersession'], function () {
    Route::get('dashboard', 'AuthController@dashboard')->name('dashboard.index');   
    Route::get('transaksi', 'AuthController@transaksi')->name('transaksi.index');   
    Route::get('laporan', 'AuthController@laporan')->name('laporan.index');   
    Route::get('pengaturan', 'AuthController@pengaturan')->name('pengaturan.index');   
    
    Route::get('about', 'AuthController@about')->name('about.index');   
    Route::get('ttkm', 'AboutController@ttkm')->name('ttkm.index');   
    Route::get('ktt', 'AboutController@ktt')->name('ktt.index');   


    Route::get('get-tarif', 'TarifController@index')->name('tarif.index');
    Route::post('store-tarif', 'TarifController@store');
    Route::post('update-tarif', 'TarifController@update');
    Route::post('edit-tarif', 'TarifController@edit');
    Route::post('delete-tarif', 'TarifController@destroy');
    
    Route::get('get-mobil', 'MobilController@index')->name('mobil.index');
    Route::post('store-mobil', 'MobilController@store');
    Route::post('update-mobil', 'MobilController@update');
    Route::post('edit-mobil', 'MobilController@edit');
    Route::post('delete-mobil', 'MobilController@destroy');

    Route::get('get-kondisi', 'KondisiController@index')->name('kondisi.index');
    Route::post('store-kondisi', 'KondisiController@store');
    Route::post('update-kondisi', 'KondisiController@update');
    Route::post('edit-kondisi', 'KondisiController@edit');
    Route::post('delete-kondisi', 'KondisiController@destroy');

    Route::get('get-dtprk', 'DataprkController@index')->name('dtprk.index');
    Route::post('store-dtprk', 'DataprkController@store');
    Route::post('update-dtprk', 'DataprkController@update');
    Route::post('edit-dtprk', 'DataprkController@edit');
    Route::post('delete-dtprk', 'DataprkController@destroy');

    Route::get('get-penyewa', 'PenyewaController@index')->name('penyewa.index');
    Route::post('store-penyewa', 'PenyewaController@store');
    Route::post('update-penyewa', 'PenyewaController@update');
    Route::post('edit-penyewa', 'PenyewaController@edit');
    Route::post('delete-penyewa', 'PenyewaController@destroy');

    Route::get('get-sewa', 'SewaController@index')->name('sewa.index');
    Route::post('store-sewa', 'SewaController@store');
    Route::post('update-sewa', 'SewaController@update');
    Route::post('edit-sewa', 'SewaController@edit');
    Route::post('delete-sewa', 'SewaController@destroy');
    Route::get('coronas/edit/{id}', 'SewaController@detailsewa')->name('coronas.edit');
    Route::get('/projects/display/{id}', 'SewaController@detailsewa')->name('projects.display');
    Route::get('/biodata/tampildata/{id}', 'SewaController@detailsewa')->name('biodata.tampildata');

});

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
Route::get('/detail-dtpng/{id}', 'DatapngController@detail')->name('dtpng.detailpng');
// Route::get('/biodata/tampildata/{id}', 'SewaController@detailsewa')->name('biodata.tampildata');

