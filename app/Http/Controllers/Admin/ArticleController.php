<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
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

        Article::create([
            'title' => $input['title'],
            'description' => $input['description'],
            'slug' => $slug,
            'thumbnail' => $namaThumbnail,
            'publish_status' => $input['publish_status'],
            'user_id' => Auth::user()->id
        ]);

        (isset($input['thumbnail'])) ? $input['thumbnail']->move(public_path('articles-thumbnail'), $namaThumbnail) : null ;

        alert()->success('Artikel Berhasil Dibuat !', '...');

        return redirect()->action(
            'Admin\ArticleController@index'
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
        $article = Article::where('slug', $slug)->first();

        return view('admin.articles.edit', compact('article'));
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

        $article = Article::where('slug', $slug)->first();

        ($input['slug']) ? $slug = $input['slug'] : $slug = str_slug($input['title'], '-');
        if (isset($input['thumbnail'])) {
            $namaThumbnail = str_random().'.'.$input['thumbnail']->getClientOriginalExtension();

            if (isset($article->thumbnail)) {
                unlink(public_path('articles-thumbnail/'.$article->thumbnail));
            }
            $input['thumbnail']->move(public_path("articles-thumbnail/"), $namaThumbnail);

            $article->update([
                'title' => $input['title'],
                'description' => $input['description'],
                'thumbnail' => $namaThumbnail,
                'publish_status' => $input['publish_status'],
                'slug' => $input['slug']
            ]);
        }else{
            $article->update([
                'title' => $input['title'],
                'description' => $input['description'],
                'publish_status' => $input['publish_status'],
                'slug' => $input['slug']
            ]);
        }

        alert()->success('Artikel Berhasil DiPerbarui !', '...');

        return redirect()->action(
            'Admin\ArticleController@index'
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
        $article = Article::where('id', $id)->first();

        if (isset($article->thumbnail)) {
            unlink(public_path('articles-thumbnail/'.$article->thumbnail));
        }

        $article->destroy($id);

        alert()->success('Artikel Berhasil Dihapus !', '...');

        return redirect()->action(
            'Admin\ArticleController@index'
        );
    }

    public function publishArticle($id)
    {
        $article = Article::where('id', $id)->first();

        $article->update([
            'publish_status' => 1
        ]);

        alert()->success('Artikel Berhasil Dipublikasi !', '...');

        return redirect()->action(
            'Admin\ArticleController@index'
        );
    }
}
