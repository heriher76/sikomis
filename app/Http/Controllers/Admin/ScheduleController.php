<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;
use Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();

        return view('admin.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.schedule.create');
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

        ($input['slug']) ? $slug = $input['slug'] : $slug = str_slug($input['title'], '-');
        (isset($input['thumbnail'])) ? $namaThumbnail = str_random().'.'.$input['thumbnail']->getClientOriginalExtension() : $namaThumbnail = null;

        Schedule::create([
            'title' => $input['title'],
            'description' => $input['description'],
            'date' => $input['date'],
            'slug' => $slug,
            'thumbnail' => $namaThumbnail
        ]);
        
        (isset($input['thumbnail'])) ? $input['thumbnail']->move(public_path('schedule-thumbnail'), $namaThumbnail) : null ;

        alert()->success('Agenda Berhasil Dibuat !', '...');

        return redirect()->action(
            'Admin\ScheduleController@index'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $schedule = Schedule::where('slug', $slug)->first();

        return view('admin.schedule.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $input = $request->all();

        $schedule = Schedule::where('slug', $slug)->first();

        ($input['slug']) ? $slug = $input['slug'] : $slug = str_slug($input['title'], '-');
        if (isset($input['thumbnail'])) {
            $namaThumbnail = str_random().'.'.$input['thumbnail']->getClientOriginalExtension();
            
            if (isset($schedule->thumbnail)) {
                unlink(public_path('schedule-thumbnail/'.$schedule->thumbnail));
            }
            $input['thumbnail']->move(public_path("schedule-thumbnail/"), $namaThumbnail);  

            $schedule->update([
                'title' => $input['title'],
                'description' => $input['description'],
                'thumbnail' => $namaThumbnail,
                'date' => $input['date'],
                'slug' => $input['slug']
            ]);
        }else{
            $schedule->update([
                'title' => $input['title'],
                'description' => $input['description'],
                'date' => $input['date'],
                'slug' => $input['slug']
            ]);
        }

        alert()->success('Agenda Berhasil DiPerbarui !', '...');
        
        return redirect()->action(
            'Admin\ScheduleController@index'
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
        $schedule = Schedule::where('id', $id)->first();

        if (isset($schedule->thumbnail)) {
            unlink(public_path('schedule-thumbnail/'.$schedule->thumbnail));
        }
        
        $schedule->destroy($id);

        alert()->success('Agenda Berhasil Dihapus !', '...');

        return redirect()->action(
            'Admin\ScheduleController@index'
        );
    }
}
