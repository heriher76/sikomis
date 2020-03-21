<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsNews = News::all();

        return view('admin.news.index', compact('newsNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
        
        (isset($input['thumbnail'])) ? $input['thumbnail']->move(public_path('News'), $namaThumbnail) : null ;

        alert()->success('News Berhasil Dibuat !', '...');

        return redirect()->action(
            'NewsController@index'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $News = News::where('slug', $slug)->first();

        return view('admin.News.show', compact('News'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $News = News::where('slug', $slug)->first();

        return view('admin.News.edit', compact('News'));
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
                unlink(public_path('News/'.$News->thumbnail));
            }
            $input['thumbnail']->move(public_path("News/"), $namaThumbnail);  

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

        alert()->success('News Berhasil DiPerbarui !', '...');
        
        return redirect()->action(
            'NewsController@index'
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
        News::destroy($id);

        alert()->success('News Berhasil Dihapus !', '...');

        return redirect()->action(
            'NewsController@index'
        );
    }
}
