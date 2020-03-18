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
    	$users = Role::where('name', 'user')->first()->users()->get();

    	return view('admin.kahmi.index', compact('users'));
    }

    public function register()
    {
      return view();
    }

    public function postRegister(Request $request)
    {
      $data = $request->all();

      $user = User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'status' => $data['status'],
          'jk' => $data['jk']
      ]);
      $user->attachRole(2);

      Alert::success('Berhasil', 'Terimakasih Kanda Sudah Register!');

      return back();
    }
}
