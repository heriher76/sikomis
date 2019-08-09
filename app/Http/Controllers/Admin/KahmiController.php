<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class KahmiController extends Controller
{
    public function index()
    {
    	$users = Role::where('name', 'user')->first()->users()->get();
    	
    	return view('admin.kahmi.index', compact('users'));
    } 
}
