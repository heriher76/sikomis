@extends('layouts.main')

@section('contents')
<div class="col-md-12">
	<article class="article main-article">
		<header>
			<center><h1>Profil Kabinet</h1></center>
		</header>
		<div class="main">
			<h4>Visi Misi</h4>
			<p><label>Visi:</label> {{ $organization->visi }}</p>
			<p><label>Misi :</label> {!! $organization->misi !!}
			<h4>Program Kerja</h4>
			{!! $organization->proker !!}
			<h4>Jajaran Pengurus</h4>
			{!! $organization->profile !!}
		</div>
	</article>
</div>
@stop
