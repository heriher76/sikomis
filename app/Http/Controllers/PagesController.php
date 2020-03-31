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
    	$organization = Organization::first();

    	return view('pages.organizations', compact('organization'));
    }

    public function activities()
    {
    	return view('pages.activities');
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
}
