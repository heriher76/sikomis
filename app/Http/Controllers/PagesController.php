<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
    	$me = \Auth::user();

    	if($me->sudahPelantikan == 1 || $me->roles[0]->name == 'kahmi' || $me->roles[0]->name == 'admin')
        	return view('pages.home');
        else
        	return view('pages.mustLK');
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
