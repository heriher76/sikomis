<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class KaderController extends Controller
{
	public function index()
    {
    	$users = Role::where('name', 'user')->first()->users()->where('sudahPelantikan', 1)->get();
    	
    	return view('admin.kader.index', compact('users'));
    } 
}
