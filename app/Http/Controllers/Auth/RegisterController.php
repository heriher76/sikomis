<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
Use Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => $data['status'],
            'jk' => $data['jk'],
            'password' => bcrypt($data['password']),
            'username' => $data['username'],
            'phone' => $data['phone'],
            'alamatAsal' => $data['alamatAsal'],
            'alamatSekarang' => $data['alamatSekarang'],
            'ttl' => $data['ttl'],
            'jurusan' => $data['jurusan'],
            'angkatan' => $data['angkatan'],
            'sma' => $data['sma'],
            'lulusSma' => $data['lulusSma'],
            'smp' => $data['smp'],
            'lulusSmp' => $data['lulusSmp'],
            'sd' => $data['sd'],
            'lulusSd' => $data['lulusSd'],
            'organisasiSma' => $data['organisasiSma'],
            'organisasiKuliah' => $data['organisasiKuliah'],
            'organisasiLainnya' => $data['organisasiLainnya'],
            'penyakit' => $data['penyakit'],
            'hobby' => $data['hobby'],
            'keahlian' => $data['keahlian'],
            'bahasa' => $data['bahasa'],
            'namaAyah' => $data['namaAyah'],
            'namaIbu' => $data['namaIbu'],
            'jumlahSaudara' => $data['jumlahSaudara'],
            'anakKeberapa' => $data['anakKeberapa'],
            'harapan' => $data['harapan'],
            'alasan' => $data['alasan']
        ]);
        $user->attachRole(2);

        Alert::success('Berhasil', 'Terimakasih Sudah Mendaftar');

        return $user;
    }
}
