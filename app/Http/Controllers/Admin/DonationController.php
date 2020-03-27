<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donation;

class DonationController extends Controller
{
    public function index()
    {
        $donation = Donation::first();

        return view('admin.donation.index', compact('donation'));
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $donation = Donation::first();

        $donation->update([
            'no_rek' => $input['no_rek'],
            'atas_nama' => $input['atas_nama'],
            'bank' => $input['bank'],
            'nama_wa' => $input['nama_wa'],
            'no_wa' => $input['no_wa']
        ]);

        alert()->success('Info Donasi Berhasil DiPerbarui !', '...');

        return redirect()->action(
            'Admin\DonationController@index'
        );
    }
}
