<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;
use Auth;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::orderBy('created_at', 'desc')->get();

        return view('admin.activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        Activity::create([
            'like' => $input['like'],
            'description' => $input['description'],
            'dislike' => $input['dislike'],
            'user_id' => Auth::user()->id
        ]);

        alert()->success('Aktifitas Berhasil Dibuat !', '...');

        return redirect()->action(
            'Admin\ActivityController@index'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::where('id', $id)->first();

        return view('admin.activity.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $article = Activity::where('id', $id)->first();

        $article->update([
            'like' => $input['like'],
            'description' => $input['description'],
            'dislike' => $input['dislike']
        ]);

        alert()->success('Aktifitas Berhasil DiPerbarui !', '...');

        return redirect()->action(
            'Admin\ActivityController@index'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::where('id', $id)->first();

        $activity->destroy($id);

        alert()->success('Aktifitas Berhasil Dihapus !', '...');

        return redirect()->action(
            'Admin\ActivityController@index'
        );
    }
}
