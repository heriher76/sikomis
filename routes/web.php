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

Route::group(['middleware' => ['auth', 'role:admin']], function () {
	Route::get('/admin', 'Admin\AdminController@index');
	Route::get('/admin/kader', 'Admin\KaderController@index');
	Route::get('/admin/kahmi', 'Admin\KahmiController@index');
	Route::get('/admin/pendaftar-lk', 'Admin\PendaftarLKController@index');
	Route::get('/admin/verifikasi/lk/{id}', 'Admin\VerifikasiController@verifLK');
	Route::get('/admin/verifikasi/upgrading/{id}', 'Admin\VerifikasiController@verifUpgrading');
	Route::get('/admin/verifikasi/pelantikan/{id}', 'Admin\VerifikasiController@verifPelantikan');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/', 'PagesController@home');
});