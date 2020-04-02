<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infoweb;
use App\Donation;
use App\News;
use App\Article;
use App\Activity;
use App\Organization;
use View;
use Auth;

class BaseController extends Controller {
    public function __construct() {
       $donation = Donation::first();
       $infoweb = Infoweb::first();
       $newsSchedules = News::all()->take(4);

       View::share ('donation', $donation);
       View::share ('infoweb', $infoweb);
       View::share ('newsSchedules', $newsSchedules);
    }
}

class PagesController extends BaseController
{
    public function home()
    {
    	$me = Auth::user();

  		if(!$me || $me->sudahPelantikan == 1 || $me->roles[0]->name == 'kahmi' || $me->roles[0]->name == 'admin') {
  			$hotNews = News::orderBy('created_at', 'desc')->take(4)->get();
  			$popularNews = News::whereNotIn('id', $hotNews->pluck('id'))->take(6)->get();
  			$articles = Article::orderBy('created_at', 'desc')->take(7)->get();
  			$activities = Activity::orderBy('created_at', 'desc')->take(8)->get();

  			return view('pages.home', compact('hotNews', 'popularNews', 'articles', 'activities'));
  		}else{
  			$infoweb = Infoweb::first();

  			return view('pages.mustLK', compact('infoweb'));
  		}
    }

    public function profile()
    {
    	$me = Auth::user();

    	if ($me->roles[0]->name == 'kahmi')
    		return view('pages.users.profile-kahmi', compact('me'));
    	else
    		return view('pages.users.profile', compact('me'));
    }

    public function profileUpdateKahmi(Request $request)
    {
        $input = $request->all();

        $me = Auth::user();

        if (isset($input['photo-profile'])) {
            $namaThumbnail = str_random().'.'.$input['photo-profile']->getClientOriginalExtension();

            if (isset($me->photoprofile)) {
                unlink(public_path('photo-profile/'.$me->photoprofile));
            }

            $me->update([
	            'name' => $request->name,
	            'email' => $request->email,
	            'phone' => $request->phone,
	            'tempat' => $request->birthplace,
	            'tanggalLahir' => $request->birthday,
	            'jk' => $request->jk,
	            'photoprofile' => $namaThumbnail,
	            'alamatSekarang' => $request->address,
	            'formals' => $request->formals,
	            'trainings' => $request->trainings,
	            'organizations' => $request->organizations,
	            'jobs' => $request->jobs
	        ]);

            $input['photo-profile']->move(public_path("photo-profile/"), $namaThumbnail);
        }else{
        	$me->update([
	            'name' => $request->name,
	            'email' => $request->email,
	            'phone' => $request->phone,
	            'tempat' => $request->birthplace,
	            'tanggalLahir' => $request->birthday,
	            'jk' => $request->jk,
	            'alamatSekarang' => $request->address,
	            'formals' => $request->formals,
	            'trainings' => $request->trainings,
	            'organizations' => $request->organizations,
	            'jobs' => $request->jobs
	        ]);
        }
        alert()->success('Pembaharuan Profil Berhasil !', '...');

        return redirect('/profile')->with('success', 'Pembaharuan Profil Berhasil');
    }

    public function profileUpdateKader(Request $request)
    {
    	$input = $request->all();

        $me = Auth::user();

        if (isset($input['photo-profile'])) {
            $namaThumbnail = str_random().'.'.$input['photo-profile']->getClientOriginalExtension();

            if (isset($me->photoprofile)) {
                unlink(public_path('photo-profile/'.$me->photoprofile));
            }

            $me->update([
	            'name' => $input['name'],
	            'email' => $input['email'],
	            'status' => $input['status'],
	            'jk' => $input['jk'],
	            'username' => $input['username'],
	            'phone' => $input['phone'],
	            'alamatAsal' => $input['alamatAsal'],
	            'alamatSekarang' => $input['alamatSekarang'],
	            'tempat' => $input['tempat'],
	            'tanggalLahir' => $input['tanggalLahir'],
	            'jurusan' => $input['jurusan'],
	            'angkatan' => $input['angkatan'],
	            'sma' => $input['sma'],
	            'lulusSma' => $input['lulusSma'],
	            'smp' => $input['smp'],
	            'lulusSmp' => $input['lulusSmp'],
	            'sd' => $input['sd'],
	            'lulusSd' => $input['lulusSd'],
	            'organisasiSma' => $input['organisasiSma'],
	            'organisasiKuliah' => $input['organisasiKuliah'],
	            'organisasiLainnya' => $input['organisasiLainnya'],
	            'penyakit' => $input['penyakit'],
	            'hobby' => $input['hobby'],
	            'keahlian' => $input['keahlian'],
	            'bahasa' => $input['bahasa'],
	            'namaAyah' => $input['namaAyah'],
	            'namaIbu' => $input['namaIbu'],
	            'jumlahSaudara' => $input['jumlahSaudara'],
	            'anakKeberapa' => $input['anakKeberapa'],
	            'photoprofile' => $namaThumbnail
	        ]);

            $input['photo-profile']->move(public_path("photo-profile/"), $namaThumbnail);
        }else{
        	$me->update([
	            'name' => $input['name'],
	            'email' => $input['email'],
	            'status' => $input['status'],
	            'jk' => $input['jk'],
	            'username' => $input['username'],
	            'phone' => $input['phone'],
	            'alamatAsal' => $input['alamatAsal'],
	            'alamatSekarang' => $input['alamatSekarang'],
	            'tempat' => $input['tempat'],
	            'tanggalLahir' => $input['tanggalLahir'],
	            'jurusan' => $input['jurusan'],
	            'angkatan' => $input['angkatan'],
	            'sma' => $input['sma'],
	            'lulusSma' => $input['lulusSma'],
	            'smp' => $input['smp'],
	            'lulusSmp' => $input['lulusSmp'],
	            'sd' => $input['sd'],
	            'lulusSd' => $input['lulusSd'],
	            'organisasiSma' => $input['organisasiSma'],
	            'organisasiKuliah' => $input['organisasiKuliah'],
	            'organisasiLainnya' => $input['organisasiLainnya'],
	            'penyakit' => $input['penyakit'],
	            'hobby' => $input['hobby'],
	            'keahlian' => $input['keahlian'],
	            'bahasa' => $input['bahasa'],
	            'namaAyah' => $input['namaAyah'],
	            'namaIbu' => $input['namaIbu'],
	            'jumlahSaudara' => $input['jumlahSaudara'],
	            'anakKeberapa' => $input['anakKeberapa']
	        ]);
        }
        alert()->success('Pembaharuan Profil Berhasil !', '...');

        return redirect('/profile')->with('success', 'Pembaharuan Profil Berhasil');
    }

    public function organizations()
    {
    	$organization = Organization::first();

    	return view('pages.organizations', compact('organization'));
    }

    public function activities()
    {
    	$opinions = Activity::orderBy('created_at', 'desc')->paginate(8);

    	return view('pages.activities', compact('opinions'));
    }

    public function newsSchedule()
    {
    	$articles = Article::orderBy('created_at', 'desc')->where('publish_status', 1)->take(3)->get();
    	$newsSchedules = News::orderBy('created_at', 'desc')->where('publish_status', 1)->paginate(5);

    	return view('pages.news.index', compact('articles', 'newsSchedules'));
    }

    public function showNewsSchedule($slug)
    {
    	$news = News::where('slug', $slug)->first();
    	$otherNews = News::whereNotIn('id', [$news->id])->where('publish_status', 1)->orderBy('updated_at', 'desc')->take(2)->get();
    	$articles = Article::where('publish_status', 1)->orderBy('updated_at', 'desc')->take(3)->get();

    	return view('pages.news.show', compact('news', 'otherNews', 'articles'));
    }

    public function articles()
    {
    	$articles = Article::orderBy('created_at', 'desc')->where('publish_status', 1)->paginate(5);
    	$newsSchedules = News::orderBy('created_at', 'desc')->where('publish_status', 1)->take(3)->get();

    	return view('pages.articles.index', compact('articles', 'newsSchedules'));
    }

    public function showArticle($slug)
    {
    	$article = Article::where('slug', $slug)->first();
    	$otherArticles = Article::whereNotIn('id', [$article->id])->where('publish_status', 1)->orderBy('updated_at', 'desc')->take(2)->get();
    	$newsSchedules = News::where('publish_status', 1)->orderBy('updated_at', 'desc')->take(3)->get();

    	return view('pages.articles.show', compact('article', 'otherArticles', 'newsSchedules'));
    }

    public function storeOpinion(Request $request)
    {
    	$input = $request->all();

        Activity::create([
            'like' => 0,
            'description' => $input['description'],
            'dislike' => 0,
            'user_id' => Auth::user()->id
        ]);

        alert()->success('Opini Berhasil Dikirim !', '...');

        return back();
    }
}
