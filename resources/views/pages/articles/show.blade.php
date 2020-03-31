@extends('layouts.main')

@section('title')
	SIKOMIS | {{ $article->title }}
@stop

@section('contents')
<div class="col-md-8">
	<ol class="breadcrumb">
	  <li><a href="{{ url('articles') }}">Artikel</a></li>
	  <li class="active">{{ $article->slug }}</li>
	</ol>
	<article class="article main-article">
		
		<header>
			<h1>{{ $article->title }}</h1>
			<ul class="details">
				<li>Diposting pada {{ $article->updated_at }}</li>
				<li>Oleh <a href="#">{{ $article->user->name }}</a></li>
			</ul>
		</header>
		<div class="main">
			<center>
				<img src="{{ url('articles-thumbnail/'.$article->thumbnail) }}" style="max-width: 350px;">
			</center>
			<br>
			{!! $article->description !!}
		</div>
		
	</article>
	<div class="line"><div>Lihat Artikel Lain</div></div>
	<div class="row">
		@foreach($otherArticles as $itemArticle)
		<article class="article related col-md-6 col-sm-6 col-xs-12">
			<div class="inner">
				<figure>
					<a href="{{ url($itemArticle->slug) }}">
						<img src="{{ url('articles-thumbnail/'.$itemArticle->thumbnail) }}">
					</a>
				</figure>
				<div class="padding">
					<h2><a href="{{ url($itemArticle->slug) }}">{{ $itemArticle->title }}</a></h2>
					<div class="detail">
						<div class="category"><a href="javascript:void();">{{ $itemArticle->user->name }}</a></div>
						<div class="time">{{ $itemArticle->updated_at }}</div>
					</div>
				</div>
			</div>
		</article>
		@endforeach
	</div>	
</div>

<div class="col-md-4 sidebar" id="sidebar">
	<aside>
		<h1 class="aside-title">Berita & Agenda Terbaru</h1>
		<div class="aside-body">
			@foreach($newsSchedules as $news)
			<article class="article-mini">
				<div class="inner">
					<figure>
						<a href="{{ url($news->slug) }}">
							<img src="{{ url('news-thumbnail/'.$news->thumbnail) }}">
						</a>
					</figure>
					<div class="padding">
						<h1><a href="{{ url($news->slug) }}">{{ $news->title }}</a></h1>
						<div class="detail">
							<div class="category"><a href="javascript:void();">{{ $news->user->name }}</a></div>
							<div class="time">{{ $news->updated_at }}</div>
						</div>
					</div>
				</div>
			</article>
			@endforeach
		</div>
	</aside>
</div>
@stop