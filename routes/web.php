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
	Route::get('/admin/news-schedules/highlight/{id}', 'Admin\NewsScheduleController@highlight');
	Route::get('/admin/news-schedules/unhighlight/{id}', 'Admin\NewsScheduleController@unhighlight');

	Route::resource('/admin/articles', 'Admin\ArticleController');
	Route::get('/admin/articles/publish/{id}', 'Admin\ArticleController@publishArticle');
	
	Route::resource('/admin/activities', 'Admin\ActivityController');

	Route::get('/admin/organizations', 'Admin\OrganizationController@index');
	Route::put('/admin/organizations/update', 'Admin\OrganizationController@update');

	Route::get('/admin/donations', 'Admin\DonationController@index');
	Route::put('/admin/donations/update', 'Admin\DonationController@update');

	Route::get('/admin/web-settings', 'Admin\WebSettingController@index');
	Route::put('/admin/web-settings/update', 'Admin\WebSettingController@update');

	Route::get('/admin/send-news-notif/{id}', function($id) {
	    $kahmis = \App\Role::where('name', 'kahmi')->first()->users()->get();
	    $kaders = \App\User::where('sudahPelantikan', 1)->get();
	    $news = \App\News::where('id', $id)->first();

	    foreach ($kahmis as $key => $kahmi) {
	    	$kahmi->notify(new \App\Notifications\News($news, 'news'));
	    }
	    foreach ($kaders as $key => $kader) {
	    	$kader->notify(new \App\Notifications\News($news, 'news'));
	    }

	    return back();
	});

	Route::get('/admin/send-article-notif/{id}', function($id) {
	    $kahmis = \App\Role::where('name', 'kahmi')->first()->users()->get();
	    $kaders = \App\User::where('sudahPelantikan', 1)->get();
	    $article = \App\Article::where('id', $id)->first();

	    foreach ($kahmis as $key => $kahmi) {
	    	$kahmi->notify(new \App\Notifications\News($article, 'article'));
	    }
	    foreach ($kaders as $key => $kader) {
	    	$kader->notify(new \App\Notifications\News($article, 'article'));
	    }

	    return back();
	});
});

Route::group(['middleware' => ['auth']], function () {
	Route::get('/profile', 'PagesController@profile');
	Route::put('/profile/update-kahmi', 'PagesController@profileUpdateKahmi');
	Route::put('/profile/update-kader', 'PagesController@profileUpdateKader');

	Route::post('/send-opinion', 'PagesController@storeOpinion');
	Route::post('/send-article', 'PagesController@storeArticle');
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
