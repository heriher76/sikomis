<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
    	$me = \Auth::user();

    	if($me->sudahPelantikan == 1)
        	return view('pages.home');
        else
        	return view('pages.mustLK');
    }
}
