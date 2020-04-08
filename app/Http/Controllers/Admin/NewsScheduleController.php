<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Auth;

class NewsScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsNews = News::orderBy('created_at', 'desc')->get();

        return view('admin.news-schedule.index', compact('newsNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news-schedule.create');
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

        News::create([
            'title' => $input['title'],
            'description' => $input['description'],
            'slug' => $slug,
            'thumbnail' => $namaThumbnail,
            'publish_status' => $input['publish_status'],
            'user_id' => Auth::user()->id
        ]);
        
        (isset($input['thumbnail'])) ? $input['thumbnail']->move(public_path('news-thumbnail'), $namaThumbnail) : null ;

        alert()->success('Berita Berhasil Dibuat !', '...');

        return redirect()->action(
            'Admin\NewsScheduleController@index'
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
        $berita = News::where('slug', $slug)->first();

        return view('admin.news-schedule.edit', compact('berita'));
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

        $News = News::where('slug', $slug)->first();

        ($input['slug']) ? $slug = $input['slug'] : $slug = str_slug($input['title'], '-');
        if (isset($input['thumbnail'])) {
            $namaThumbnail = str_random().'.'.$input['thumbnail']->getClientOriginalExtension();
            
            if (isset($News->thumbnail)) {
                unlink(public_path('news-thumbnail/'.$News->thumbnail));
            }
            $input['thumbnail']->move(public_path("news-thumbnail/"), $namaThumbnail);  

            $News->update([
                'title' => $input['title'],
                'description' => $input['description'],
                'thumbnail' => $namaThumbnail,
                'publish_status' => $input['publish_status'],
                'slug' => $input['slug']
            ]);
        }else{
            $News->update([
                'title' => $input['title'],
                'description' => $input['description'],
                'publish_status' => $input['publish_status'],
                'slug' => $input['slug']
            ]);
        }

        alert()->success('Berita Berhasil DiPerbarui !', '...');
        
        return redirect()->action(
            'Admin\NewsScheduleController@index'
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
        $News = News::where('id', $id)->first();

        if (isset($News->thumbnail)) {
            unlink(public_path('news-thumbnail/'.$News->thumbnail));
        }
        
        $News->destroy($id);

        alert()->success('Berita Berhasil Dihapus !', '...');

        return redirect()->action(
            'Admin\NewsScheduleController@index'
        );
    }

    public function highlight($id)
    {
        $News = News::where('id', $id)->first();
        
        $News->update([
            'highlighted' => 1
        ]);

        alert()->success('Highlight Berita Berhasil!', '...');

        return redirect()->action(
            'Admin\NewsScheduleController@index'
        );
    }

    public function unhighlight($id)
    {
        $News = News::where('id', $id)->first();
        
        $News->update([
            'highlighted' => null
        ]);

        alert()->success('Unhighlight Berita Berhasil!', '...');

        return redirect()->action(
            'Admin\NewsScheduleController@index'
        );
    }
}
