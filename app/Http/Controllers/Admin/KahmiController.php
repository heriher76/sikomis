<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;

class KahmiController extends Controller
{
    public function index()
    {
    	$users = Role::where('name', 'kahmi')->first()->users()->get();

    	return view('admin.kahmi.index', compact('users'));
    }

    public function destroy($id)
    {
      User::destroy($id);

      alert()->success('User Berhasil Dihapus !', '...');

      return back();
    }
}
