<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class PendaftarLKController extends Controller
{
    public function index()
    {
    	$users = Role::where('name', 'user')->first()->users()->where('sudahPelantikan', null)->get();
    	
    	return view('admin.pendaftar-lk.index', compact('users'));
    } 
}
