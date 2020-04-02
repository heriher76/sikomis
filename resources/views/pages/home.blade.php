@extends('layouts.main')

@section('contents')
<div class="col-md-8 col-sm-12 col-xs-12">
    <div class="owl-carousel owl-theme slide" id="featured">
        <div class="item active">
            <article class="featured">
                <div class="overlay"></div>
                <figure>
                    <img src="{{ url('slider/a.jpeg') }}" alt="Slider 1">
                </figure>
                <div class="details">
                    <h1><a href="javascript:void();">Pembukaan Latihan Kader 1 HMI Komisariat Sains & Teknologi Cabang Kabupaten Bandung</a></h1>
                </div>
            </article>
        </div>
        <div class="item">
            <article class="featured">
                <div class="overlay"></div>
                <figure>
                    <img src="{{ url('slider/b.jpg') }}" alt="Slider 2">
                </figure>
                <div class="details">
                    <h1><a href="javascript:void();">BukBer Puasa Ramadhan Keluarga Besar HMI Komisariat Sains & Teknologi Cabang Kabupaten Bandung</a></h1>
                </div>
            </article>
        </div>
        <div class="item">
            <article class="featured">
                <div class="overlay"></div>
                <figure>
                    <img src="{{ url('slider/c.jpeg') }}" alt="Slider 3">
                </figure>
                <div class="details">
                    <h1><a href="javascript:void();">Kajian Rutin Komisariat Sains & Teknologi di PUSGIT HMI Cabang Kabupaten Bandung</a></h1>
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
                    <a href="{{ url($itemNews->slug) }}">
                        <img src="{{ url('news-thumbnail/'.$itemNews->thumbnail) }}" alt="News and Schedule">
                    </a>
                </figure>
                <div class="details">
                    <div class="detail">
                        <div class="category">
                          <a href="javascript:void():">{{ $itemNews->user->name }}</a>
                        </div>
                        <div class="time">{{ $itemNews->updated_at }}</div>
                    </div>
                    <h1><a href="{{ url($itemNews->slug) }}">{{ $itemNews->title }}</a></h1>
                    <p>
                    {!! str_limit($itemNews->description, $limit = 150, $end = '...') !!}
                    </p>
                    <footer>
                        <a class="btn btn-primary more" href="{{ url($itemNews->slug) }}">
                            <div>Lanjut Baca</div>
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
                        <a href="{{ url($popular->slug) }}">
                            <img src="{{ url('news-thumbnail/'.$popular->thumbnail) }}" alt="Popular News">
                        </a>
                    </figure>
                    <div class="padding">
                        <h1><a href="{{ url($popular->slug) }}">{{ $popular->title }}</a></h1>
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
