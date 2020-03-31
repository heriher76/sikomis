@extends('layouts.main')

@section('title', 'Berita & Agenda | SIKOMIS')

@section('contents')
<div class="col-md-4 sidebar">
<aside>
  <h1 class="aside-title">Berita & Agenda Terbaru</h1>
  <div class="aside-body">
    @foreach($newsSchedules as $news)
    <article class="article-fw">
      <div class="inner">
        <figure>
            <a href="{{ url('/articles/'.$news->slug) }}">
              <img src="{{ url('news-thumbnail/'.$news->thumbnail) }}">
            </a>
        </figure>
        <div class="details">
          <h1><a href="{{ url('/articles/'.$news->slug) }}">{{ $news->title }}</a></h1>
          <p>
            {!! str_limit($news->description, $limit = 150, $end = '...') !!}
          </p>
          <div class="detail">
            <div class="time">{{ $news->updated_at }}</div>
            <div class="category"><a href="javascript:void();">{{ $news->user->name }}</a></div>
          </div>
        </div>
      </div>
    </article>
    @endforeach
  </div>
</aside>
</div>

<div class="col-md-8 text-left">
<div class="row">
  @foreach($articles as $article)
  <article class="col-md-12 article-list">
    <div class="inner">
      <figure>
          <a href="{{ url('articles/'.$article->slug) }}">
            <img src="{{ url('articles-thumbnail/'.$article->thumbnail) }}">
        </a>
      </figure>
      <div class="details">
        <div class="detail">
          <div class="category">
           <a href="javascript:void():">{{ $article->user->name }}</a>
          </div>
          <div class="time">{{ $article->updated_at }}</div>
        </div>
        <h1><a href="{{ url('articles/'.$article->slug) }}">{{ $article->title }}</a></h1>
        <p>
          {!! str_limit($article->description, $limit = 150, $end = '...') !!}
        </p>
        <footer>
          <!-- <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1820</div></a> -->
          <a class="btn btn-primary more" href="{{ url('articles/'.$article->slug) }}">
            <div>Baca Semua</div>
            <div><i class="ion-ios-arrow-thin-right"></i></div>
          </a>
        </footer>
      </div>
    </div>
  </article>
  @endforeach
  <div class="col-md-12 text-center">
    {{ $articles->links() }}
    <!-- <ul class="pagination">
      <li class="prev"><a href="#"><i class="ion-ios-arrow-left"></i></a></li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">...</a></li>
      <li><a href="#">97</a></li>
      <li class="next"><a href="#"><i class="ion-ios-arrow-right"></i></a></li>
    </ul> -->
    <!-- <div class="pagination-help-text">
      Showing 8 results of 776 &mdash; Page 1
    </div> -->
  </div>
</div>
</div>
@stop