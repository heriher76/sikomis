@extends('layouts.main')

@section('title', 'Profil Saya | SIKOMIS')

@section('contents')
<div class="col-md-12">
	<div class="comments">
		<form class="row" action="{{ url('profile/update-kahmi') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="col-md-12">
				<h3 class="title">Profil Saya</h3>
			</div>
			<div class="form-group col-md-6">
				<label for="name">Nama</label>
				<input type="text" id="name" name="name" value="{{ $me->name }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" value="{{ $me->email }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="jk">Jenis Kelamin</label>
				<select class="form-control" name="jk" id="jk">
		            <option value="laki-laki" {{ ($me->jk == 'laki-laki') ? 'selected' : "" }}>Laki-laki</option>
		            <option value="perempuan" {{ ($me->jk == 'perempuan') ? 'selected' : "" }}>Perempuan</option>
		        </select>
	    	</div>
	    	<div class="form-group col-md-6">
				<label for="phone">Nomor HP</label>
				<input type="text" id="phone" name="phone" value="{{ $me->phone }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="tempat">Tempat Lahir</label>
				<input type="text" id="tempat" name="tempat" value="{{ $me->tempat }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="tanggalLahir">Tanggal Lahir</label>
				<input type="text" id="tanggalLahir" name="tanggalLahir" value="{{ $me->tanggalLahir }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="alamatSekarang">Alamat Sekarang</label>
				<textarea class="form-control" name="alamatSekarang" placeholder="Alamat Sekarang">{{ $me->alamatSekarang }}</textarea>
			</div>
			<div class="form-group col-md-6">
				<label for="formals">Riwayat Pendidikan</label>
				<textarea class="form-control" name="formals" placeholder="Riwayat Pendidikan">{{ $me->formals }}</textarea>
			</div>
			<div class="form-group col-md-4">
				<label for="organizations">Pengalaman Organisasi</label>
				<textarea class="form-control" name="organizations" placeholder="Pengalaman Organisasi">{{ $me->organizations }}</textarea>
			</div>
			<div class="form-group col-md-4">
				<label for="trainings">Jenjang Training di HMI</label>
				<textarea class="form-control" name="trainings" placeholder="Jenjang Training di HMI">{{ $me->trainings }}</textarea>
			</div>
			<div class="form-group col-md-4">
				<label for="jobs">Pekerjaan</label>
				<textarea class="form-control" name="jobs" placeholder="Pekerjaan">{{ $me->jobs }}</textarea>
			</div>
			<div class="form-group col-md-4">
				<label for="photo-profile">Perbarui Foto Profil *Max Size: 700 KB</label>
				@if(isset($me->photoprofile))
                    <br>
                    <img class="img-responsive" style="max-width: 28vw; max-height: 28vh;" src="{{ url('photo-profile/'.$me->photoprofile) }}">
                @endif 
				<input type="file" name="photo-profile" class="form-control">
			</div>

			<div class="form-group col-md-12">
				<button class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>
@stop

@section('sweet-alert')
  @include('sweetalert::alert')
@stop