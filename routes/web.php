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

Route::get('kahmi-register','Auth\KahmiLoginController@showRegisterPage');
Route::post('kahmi-register', 'Auth\KahmiLoginController@register')->name('kahmi.register');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
	Route::get('/admin', 'Admin\AdminController@index');

	Route::get('/admin/kader', 'Admin\KaderController@index');
	Route::delete('/admin/kader/{id}', 'Admin\KaderController@destroy');

	Route::get('/admin/kahmi', 'Admin\KahmiController@index');
	Route::delete('/admin/kahmi/{id}', 'Admin\KahmiController@destroy');

	Route::get('/admin/pendaftar-lk', 'Admin\PendaftarLKController@index');
	Route::delete('/admin/pendaftar-lk/{id}', 'Admin\PendaftarLKController@destroy');

	Route::get('/admin/verifikasi/lk/{id}', 'Admin\VerifikasiController@verifLK');
	Route::get('/admin/verifikasi/upgrading/{id}', 'Admin\VerifikasiController@verifUpgrading');
	Route::get('/admin/verifikasi/pelantikan/{id}', 'Admin\VerifikasiController@verifPelantikan');

	Route::resource('/admin/news-schedules', 'Admin\NewsScheduleController');
	Route::resource('/admin/articles', 'Admin\ArticleController');
	Route::resource('/admin/activities', 'Admin\ActivityController');

	Route::get('/admin/organizations', 'Admin\OrganizationController@index');
	Route::put('/admin/organizations/update', 'Admin\OrganizationController@update');

	Route::get('/admin/donations', 'Admin\DonationController@index');
	Route::put('/admin/donations/update', 'Admin\DonationController@update');

	Route::get('/admin/web-settings', 'Admin\WebSettingController@index');
	Route::put('/admin/web-settings/update', 'Admin\WebSettingController@update');
});

Route::group(['middleware' => ['auth']], function () {
	Route::get('/profile', 'PagesController@profile');
	Route::put('/profile/update-kahmi', 'PagesController@profileUpdateKahmi');
	Route::put('/profile/update-kader', 'PagesController@profileUpdateKader');

	Route::post('/send-opinion', 'PagesController@storeOpinion');

	Route::get('/notif', function() {
	    $user = \App\User::where('email', 'herhermawan007@gmail.com')->first();
	    $user->notify(new \App\Notifications\News);
	});
});

// PUBLIC
Route::get('/', 'PagesController@home');
Route::get('/organizations', 'PagesController@organizations');
Route::get('/news', 'PagesController@news');
Route::get('/activities', 'PagesController@activities');

Route::get('/articles', 'PagesController@articles');
Route::get('/articles/{slug}', 'PagesController@showArticle');

Route::get('/news-schedule', 'PagesController@newsSchedule');
Route::get('/{slug}', 'PagesController@showNewsSchedule');
