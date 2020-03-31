@extends('layouts.main')

@section('contents')
<div class="col-md-4 sidebar" id="sidebar">
	<aside>
		<h1 class="aside-title">Artikel Terbaru</h1>
		<div class="aside-body">
			@foreach($articles as $article)
			<article class="article-mini">
				<div class="inner">
					<figure>
						<a href="{{ url('articles/'.$article->slug) }}">
							<img src="{{ url('articles-thumbnail/'.$article->thumbnail) }}">
						</a>
					</figure>
					<div class="padding">
						<h1><a href="{{ url('articles/'.$article->slug) }}">{{ $article->title }}</a></h1>
						<div class="detail">
							<div class="category"><a href="javascript:void();">{{ $article->user->name }}</a></div>
							<div class="time">{{ $article->updated_at }}</div>
						</div>
					</div>
				</div>
			</article>
			@endforeach
		</div>
	</aside>
</div>
<div class="col-md-8">
	<ol class="breadcrumb">
	  <li><a href="{{ url('news-schedule') }}">Berita & Agenda</a></li>
	  <li class="active">{{ $news->slug }}</li>
	</ol>
	<article class="article main-article">
		
		<header>
			<h1>{{ $news->title }}</h1>
			<ul class="details">
				<li>Diposting pada {{ $news->updated_at }}</li>
				<li>Oleh <a href="#">{{ $news->user->name }}</a></li>
			</ul>
		</header>
		<div class="main">
			<center>
				<img src="{{ url('news-thumbnail/'.$news->thumbnail) }}" style="max-width: 350px;">
			</center>
			<br>
			{!! $news->description !!}
		</div>
		
	</article>
	<div class="line"><div>Lihat Berita & Agenda Lain</div></div>
	<div class="row">
		@foreach($otherNews as $itemNews)
		<article class="article related col-md-6 col-sm-6 col-xs-12">
			<div class="inner">
				<figure>
					<a href="{{ url($itemNews->slug) }}">
						<img src="{{ url('news-thumbnail/'.$itemNews->thumbnail) }}">
					</a>
				</figure>
				<div class="padding">
					<h2><a href="{{ url($itemNews->slug) }}">{{ $itemNews->title }}</a></h2>
					<div class="detail">
						<div class="category"><a href="javascript:void();">{{ $itemNews->user->name }}</a></div>
						<div class="time">{{ $itemNews->updated_at }}</div>
					</div>
				</div>
			</div>
		</article>
		@endforeach
	</div>
	
</div>
@stop