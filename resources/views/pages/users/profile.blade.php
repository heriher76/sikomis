@extends('layouts.main')

@section('title', 'Profil Saya | SIKOMIS')

@section('contents')
<div class="col-md-12">
	<div class="comments">
		<form class="row" action="{{ url('profile/update-kader') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="col-md-12">
				<h3 class="title">Profil Saya</h3>
			</div>
			<div class="form-group col-md-4">
				<label for="name">Nama</label>
				<input type="text" id="name" name="name" value="{{ $me->name }}" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" value="{{ $me->email }}" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" value="{{ $me->username }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="status">Status</label>
				<select class="form-control" name="status" id="status">
		            <option value="belum-menikah" {{ ($me->status == 'belum-menikah') ? 'selected' : "" }}>Belum Menikah</option>
		            <option value="menikah" {{ ($me->status == 'menikah') ? 'selected' : "" }}>Menikah</option>
		        </select>
	    	</div>
			<div class="form-group col-md-6">
				<label for="jk">Jenis Kelamin</label>
				<select class="form-control" name="jk" id="jk">
		            <option value="laki-laki" {{ ($me->jk == 'laki-laki') ? 'selected' : "" }}>Laki-laki</option>
		            <option value="perempuan" {{ ($me->jk == 'perempuan') ? 'selected' : "" }}>Perempuan</option>
		        </select>
	    	</div>
	    	<div class="form-group col-md-4">
				<label for="phone">Nomor HP</label>
				<input type="text" id="phone" name="phone" value="{{ $me->phone }}" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="tempat">Tempat Lahir</label>
				<input type="text" id="tempat" name="tempat" value="{{ $me->tempat }}" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="tanggalLahir">Tanggal Lahir</label>
				<input type="text" id="tanggalLahir" name="tanggalLahir" value="{{ $me->tanggalLahir }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="alamatAsal">Alamat Asal</label>
				<textarea class="form-control" name="alamatAsal" placeholder="Alamat Asal">{{ $me->alamatAsal }}</textarea>
			</div>
			<div class="form-group col-md-6">
				<label for="alamatSekarang">Alamat Sekarang</label>
				<textarea class="form-control" name="alamatSekarang" placeholder="Alamat Sekarang">{{ $me->alamatSekarang }}</textarea>
			</div>
			<div class="form-group col-md-8">
				<label for="jurusan">Jurusan</label>
				<input type="text" id="jurusan" name="jurusan" value="{{ $me->jurusan }}" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="angkatan">Angkatan di Jurusan</label>
				<input type="text" id="angkatan" name="angkatan" value="{{ $me->angkatan }}" class="form-control">
			</div>
			<div class="form-group col-md-8">
				<label for="sma">Asal SMA</label>
				<input type="text" id="sma" name="sma" value="{{ $me->sma }}" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="lulusSma">Tahun Lulus SMA</label>
				<input type="text" id="lulusSma" name="lulusSma" value="{{ $me->lulusSma }}" class="form-control">
			</div>
			<div class="form-group col-md-8">
				<label for="smp">Asal SMP</label>
				<input type="text" id="smp" name="smp" value="{{ $me->smp }}" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="lulusSmp">Tahun Lulus SMP</label>
				<input type="text" id="lulusSmp" name="lulusSmp" value="{{ $me->lulusSmp }}" class="form-control">
			</div>
			<div class="form-group col-md-8">
				<label for="sd">Asal SD</label>
				<input type="text" id="sd" name="sd" value="{{ $me->sd }}" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="lulusSd">Tahun Lulus SD</label>
				<input type="text" id="lulusSd" name="lulusSd" value="{{ $me->lulusSd }}" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="organisasiSma">Pengalaman Organisasi di SMA</label>
				<textarea class="form-control" name="organisasiSma" placeholder="Pengalaman Organisasi di SMA">{{ $me->organisasiSma }}</textarea>
			</div>
			<div class="form-group col-md-4">
				<label for="organisasiKuliah">Pengalaman Organisasi di Kuliah</label>
				<textarea class="form-control" name="organisasiKuliah" placeholder="Pengalaman Organisasi di Kuliah">{{ $me->organisasiKuliah }}</textarea>
			</div>
			<div class="form-group col-md-4">
				<label for="organisasiLainnya">Pengalaman Organisasi Lainnya</label>
				<textarea class="form-control" name="organisasiLainnya" placeholder="Pengalaman Organisasi Lainnya">{{ $me->organisasiLainnya }}</textarea>
			</div>
			<div class="form-group col-md-6">
				<label for="penyakit">Riwayat Penyakit</label>
				<input type="text" id="penyakit" name="penyakit" value="{{ $me->penyakit }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="hobby">Hobby</label>
				<input type="text" id="hobby" name="hobby" value="{{ $me->hobby }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="keahlian">Keahlian</label>
				<input type="text" id="keahlian" name="keahlian" value="{{ $me->keahlian }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="bahasa">Bahasa</label>
				<input type="text" id="bahasa" name="bahasa" value="{{ $me->bahasa }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="namaAyah">Nama Ayah</label>
				<input type="text" id="namaAyah" name="namaAyah" value="{{ $me->namaAyah }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="namaIbu">Nama Ibu</label>
				<input type="text" id="namaIbu" name="namaIbu" value="{{ $me->namaIbu }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="jumlahSaudara">Jumlah Saudara</label>
				<input type="text" id="jumlahSaudara" name="jumlahSaudara" value="{{ $me->jumlahSaudara }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="anakKeberapa">Anak Ke-berapa?</label>
				<input type="text" id="anakKeberapa" name="anakKeberapa" value="{{ $me->anakKeberapa }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="harapan">Harapan Masuk HMI</label>
				<textarea class="form-control" name="harapan" placeholder="Harapan Masuk HMI" disabled>{{ $me->harapan }}</textarea>
			</div>
			<div class="form-group col-md-6">
				<label for="alasan">Alasan Masuk HMI</label>
				<textarea class="form-control" name="alasan" placeholder="Alasan Masuk HMI" disabled>{{ $me->alasan }}</textarea>
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