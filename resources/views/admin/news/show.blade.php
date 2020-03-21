@extends('layouts.admin')

@section('contents')
	<div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <center><h1>
                        {{ $berita->title }}
                    </h1></center>
                </div>
                <div class="body">
                	<center><img src="{{ url('berita/'.$berita->thumbnail) }}" class="img-responsive" style="max-width: 30vw; max-height: 30vh;"></center><br>
                    {!! $berita->description !!}
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                	<p>Author = <b>{{ $berita->user->name }}</b></p>
              		<p>Publish Status = <b>@php echo ($berita->publish_status == 1) ? 'Published' : 'Drafted'; @endphp</b></p>
              		<p>Created At = <b>{{ \Carbon\Carbon::parse($berita->created_at)->formatLocalized('%A / %d %B %y') }}</b></p>
            		<p>Last Updated = <b>{{ \Carbon\Carbon::parse($berita->updated_at)->formatLocalized('%A / %d %B %y') }}</b></p>	
                </div>
            </div>
        </div>
    </div>
@endsection
