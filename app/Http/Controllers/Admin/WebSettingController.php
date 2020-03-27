<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Infoweb;

class WebSettingController extends Controller
{
    public function index()
    {
        $infoweb = Infoweb::first();

        return view('admin.infoweb.index', compact('infoweb'));
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $infoweb = Infoweb::first();

        if (isset($input['slider1'])) {
            $namaThumbnail1 = str_random().'.'.$input['slider1']->getClientOriginalExtension();
            if (isset($infoweb->slider1)) {
                unlink(public_path('slider/'.$infoweb->slider1));
            }
        }else{
            $namaThumbnail1 = $infoweb->slider1 ?? null;
        }
        if (isset($input['slider2'])) {
            $namaThumbnail2 = str_random().'.'.$input['slider2']->getClientOriginalExtension();
            if (isset($infoweb->slider2)) {
                unlink(public_path('slider/'.$infoweb->slider2));
            }
        }else{
            $namaThumbnail2 = $infoweb->slider2 ?? null;
        }
        if (isset($input['slider3'])) {
            $namaThumbnail3 = str_random().'.'.$input['slider3']->getClientOriginalExtension();
            if (isset($infoweb->slider3)) {
                unlink(public_path('slider/'.$infoweb->slider3));
            }
        }else{
            $namaThumbnail3 = $infoweb->slider3 ?? null;
        }

        $infoweb->update([
            'name_contact_lk' => $input['name_contact_lk'],
            'number_contact_lk' => $input['number_contact_lk'],
            'instagram' => $input['instagram'],
            'facebook' => $input['facebook'],
            'twitter' => $input['twitter'],
            'youtube' => $input['youtube'],
            'google' => $input['google'],
            'slider1' => $namaThumbnail1,
            'slider2' => $namaThumbnail2,
            'slider3' => $namaThumbnail3
        ]);
        // SLIDER 1
        (isset($input['slider1'])) ? $input['slider1']->move(public_path('slider'), $namaThumbnail1) : null ;
        // SLIDER 2
        (isset($input['slider2'])) ? $input['slider2']->move(public_path('slider'), $namaThumbnail2) : null ;
        // SLIDER 3
        (isset($input['slider3'])) ? $input['slider3']->move(public_path('slider'), $namaThumbnail3) : null ;

        alert()->success('Web Setting Berhasil DiPerbarui !', '...');

        return redirect()->action(
            'Admin\WebSettingController@index'
        );
    }
}
