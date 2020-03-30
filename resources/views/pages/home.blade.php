@extends('layouts.main')

@section('contents')
<div class="col-md-8 col-sm-12 col-xs-12">
    <div class="owl-carousel owl-theme slide" id="featured">
        <div class="item active">
            <article class="featured">
                <div class="overlay"></div>
                <figure>
                    <img src="{{ url('front/images/news/img04.jpg') }}" alt="Sample Article">
                </figure>
                <div class="details">
                    <div class="category"><a href="category.html">Computer</a></div>
                    <h1><a href="single.html">Phasellus iaculis quam sed est elementum vel ornare ligula venenatis</a></h1>
                    <div class="time">December 26, 2016</div>
                </div>
            </article>
        </div>
        <div class="item">
            <article class="featured">
                <div class="overlay"></div>
                <figure>
                    <img src="{{ url('front/images/news/img14.jpg') }}" alt="Sample Article">
                </figure>
                <div class="details">
                    <div class="category"><a href="category.html">Travel</a></div>
                    <h1><a href="single.html">Class aptent taciti sociosqu ad litora torquent per conubia nostra</a></h1>
                    <div class="time">December 10, 2016</div>
                </div>
            </article>
        </div>
        <div class="item">
            <article class="featured">
                <div class="overlay"></div>
                <figure>
                    <img src="{{ url('front/images/news/img13.jpg') }}" alt="Sample Article">
                </figure>
                <div class="details">
                    <div class="category"><a href="category.html">International</a></div>
                    <h1><a href="single.html">Maecenas accumsan tortor ut velit pharetra mollis</a></h1>
                    <div class="time">October 12, 2016</div>
                </div>
            </article>
        </div>
        <div class="item">
            <article class="featured">
                <div class="overlay"></div>
                <figure>
                    <img src="{{ url('front/images/news/img05.jpg') }}" alt="Sample Article">
                </figure>
                <div class="details">
                    <div class="category"><a href="category.html">Lifestyle</a></div>
                    <h1><a href="single.html">Mauris elementum libero at pharetra auctor Fusce ullamcorper elit</a></h1>
                    <div class="time">November 27, 2016</div>
                </div>
            </article>
        </div>
    </div>

    <div class="line">
        <div>Berita & Agenda Terbaru</div>
    </div>
    <div class="row">
        @foreach($hotNews as $itemNews)
        <article class="col-md-12 article-list">
            <div class="inner">
                <figure>
                    <a href="single.html">
                        <img src="{{ url('news-thumbnail/'.$itemNews->thumbnail) }}" alt="News and Schedule">
                    </a>
                </figure>
                <div class="details">
                    <div class="detail">
                        <div class="time">{{ $itemNews->updated_at }}</div>
                    </div>
                    <h1><a href="single.html">Donec consequat arcu at ultrices sodales quam erat aliquet diam</a></h1>
                    <p>
                    {!! str_limit($itemNews->description, $limit = 150, $end = '...') !!}
                    </p>
                    <footer>
                        <a class="btn btn-primary more" href="{{ url('news-schedule/'.$itemNews->slug) }}">
                            <div>More</div>
                            <div><i class="ion-ios-arrow-thin-right"></i></div>
                        </a>
                    </footer>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</div>
<div class="col-xs-6 col-md-4 sidebar" id="sidebar">

    <aside>
        <h1 class="aside-title">Berita & Agenda Terpopuler <a href="{{ url('news-schedule') }}" class="all">Lihat Semua <i class="ion-ios-arrow-right"></i></a></h1>
        <div class="aside-body">
            @foreach($popularNews as $popular)
            <article class="article-mini">
                <div class="inner">
                    <figure>
                        <a href="{{ url('news-schedule/'.$popular->slug) }}">
                            <img src="{{ url('news-thumbnail/'.$popular->thumbnail) }}" alt="Popular News">
                        </a>
                    </figure>
                    <div class="padding">
                        <h1><a href="{{ url('news-schedule/'.$popular->slug) }}">{{ $popular->title }}</a></h1>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </aside>

    <aside>

        <h1 class="title-col">
            Artikel Terpopuler
            <div class="carousel-nav" id="hot-news-nav">
                <div class="prev">
                    <i class="ion-ios-arrow-left"></i>
                </div>
                <div class="next">
                    <i class="ion-ios-arrow-right"></i>
                </div>
            </div>
        </h1>
        <div class="body-col vertical-slider" data-max="4" data-nav="#hot-news-nav" data-item="article">
            @foreach($articles as $article)
            <article class="article-mini">
                <div class="inner">
                    <figure>
                        <a href="{{ url('articles/'.$article->slug) }}">
                            <img src="{{ url('articles-thumbnail/'.$article->thumbnail) }}" alt="Article">
                        </a>
                    </figure>
                    <div class="padding">
                        <h1><a href="{{ url('articles/'.$article->slug) }}">{{ $article->title }}</a></h1>
                        <div class="detail">
                            <div class="time">{{ $article->updated_at }}</div>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </aside>
</div>
@endsection

@section('top-footer')
<section class="best-of-the-week">
    <div class="container">
        <h1><div class="text">Kolom Opini</div>
            <div class="carousel-nav" id="best-of-the-week-nav">
                <div class="prev">
                    <i class="ion-ios-arrow-left"></i>
                </div>
                <div class="next">
                    <i class="ion-ios-arrow-right"></i>
                </div>
            </div>
        </h1>
        <div class="owl-carousel owl-theme carousel-1">
            @foreach($activities as $activity)
            <article class="article">
                <div class="inner">
                    <div class="padding">
                        <div class="detail">
                            <div class="time">{{ $activity->updated_at }}</div>
                        </div>
                        <h2><a href="{{ url('activities') }}">{{ $activity->user->name }}</a></h2>
                        <p><a href="{{ url('activities') }}">{!! str_limit($activity->description, $limit = 250, $end = '...') !!}</a></p>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('title', 'Beranda | SIKOMIS')
