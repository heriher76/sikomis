<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class KahmiLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showRegisterPage()
    {
        return view('auth.register_kahmi');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:199',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'tempat' => $request->birthplace,
            'tanggalLahir' => $request->birthday,
            'jk' => $request->jk,
            'kahmi' => 1,
            'alamatSekarang' => $request->address,
            'formals' => $request->formals,
            'trainings' => $request->trainings,
            'organizations' => $request->organizations,
            'jobs' => $request->jobs
        ]);

        $user->attachRole(3);

        return redirect('/')->with('success','Registration Success');
    }
}