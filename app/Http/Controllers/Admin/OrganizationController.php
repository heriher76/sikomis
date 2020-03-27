<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        $organization = Organization::first();

        return view('admin.organization.index', compact('organization'));
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $organization = Organization::first();

        $organization->update([
            'visi' => $input['visi'],
            'misi' => $input['misi'],
            'proker' => $input['proker'],
            'profile' => $input['profile']
        ]);

        alert()->success('Info Kabinet Berhasil DiPerbarui !', '...');

        return redirect()->action(
            'Admin\OrganizationController@index'
        );
    }
}
