<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Alert;

class VerifikasiController extends Controller
{
    public function verifLK($id)
    {
    	$user = User::where('id', $id)->first();

    	$user->update([
    		'sudahLK' => 1
    	]);

    	Alert::success('Berhasil', 'Terverifikasi Melaksanakan LK');

    	return back();
    }

    public function verifUpgrading($id)
    {
    	$user = User::where('id', $id)->first();

    	$user->update([
    		'sudahUpgrading' => 1
    	]);

    	Alert::success('Berhasil', 'Terverifikasi Melaksanakan Upgrading');

    	return back();
    }

    public function verifPelantikan($id)
    {
    	$user = User::where('id', $id)->first();

    	$user->update([
    		'sudahPelantikan' => 1
    	]);

    	Alert::success('Berhasil', 'Terverifikasi Melaksanakan Pelantikan');

    	return back();
    }
}
