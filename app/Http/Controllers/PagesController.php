<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infoweb;
use App\Donation;
use App\News;
use App\Article;
use App\Activity;
use View;

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
    	$me = \Auth::user();

    	if($me->sudahPelantikan == 1 || $me->roles[0]->name == 'kahmi' || $me->roles[0]->name == 'admin') {
        $hotNews = News::orderBy('created_at', 'desc')->take(4)->get();
        $popularNews = News::whereNotIn('id', $hotNews->pluck('id'))->take(6)->get();
        $articles = Article::orderBy('created_at', 'desc')->take(7)->get();
        $activities = Activity::orderBy('created_at', 'desc')->take(8)->get();

        return view('pages.home', compact('hotNews', 'popularNews', 'articles', 'activities'));
      }else{
        return view('pages.mustLK');
      }
    }

    public function profile()
    {
    	$me = \Auth::user();

    	return view('pages.users.profile', compact('me'));
    }

    public function organizations()
    {
    	return view('pages.organizations');
    }

    public function activities()
    {
    	return view('pages.activities');
    }

    public function newsSchedule()
    {
    	return view('pages.news.index');
    }

    public function showNewsSchedule()
    {
    	return view('pages.news.show');
    }

    public function articles()
    {
    	return view('pages.articles.index');
    }

    public function showArticle()
    {
    	return view('pages.articles.show');
    }
}
