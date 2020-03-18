<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;

class PendaftarLKController extends Controller
{
    public function index()
    {
    	$users = Role::where('name', 'user')->first()->users()->where('sudahPelantikan', null)->get();

    	return view('admin.pendaftar-lk.index', compact('users'));
    }

    public function destroy($id)
    {
      User::destroy($id);

      return back();
    }
}
