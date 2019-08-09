@extends('layouts.app')

@section('content')
<div class="container" style="background-image: url({{ url('images/logo_hmi.png') }}); background-repeat: no-repeat; background-position: center; background-size: 40vh;">
<div class="row">
    <div class="col-md-4">
        <h3>FORM REGISTRASI KADER HMI KOMISARIAT SAINS & TEKNOLOGI CABANG KABUPATEN BANDUNG</h3>
        <form id="registKader" method="POST" action="{{ route('register') }}">
            {{csrf_field()}}    
            <input type="text" name="name" placeholder="Nama Lengkap" class="col-md-6 col-xs-12 form-control" value="{{ old('name') }}" required>
            <input type="text" name="username" placeholder="Username" class="col-md-6 col-xs-12 form-control" value="{{ old('username') }}" required>
            <input type="text" name="phone" placeholder="Nomor Ponsel" class="col-md-6 form-control" value="{{ old('phone') }}" style="width: 100%;" required>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Alamat Email" class="col-md-6 form-control" style="width: 100%;" required>
            <input type="text" name="ttl" value="{{ old('ttl') }}" placeholder="Tempat Tanggal Lahir" class="col-md-6 form-control" style="width: 100%;" required>
            <select class="form-control col-md-8" name="jk" required>
                <option value="laki-laki" {{ (old('jk') == 'laki-laki') ? 'selected' : "" }}>Laki Laki</option>
                <option value="perempuan" {{ (old('jk') == 'perempuan') ? 'selected' : "" }}>Perempuan</option>
            </select>
            <input type="password" name="password" placeholder="Password" class="col-md-6 form-control" style="width: 100%;" required>
            <input type="password" name="confirmPassword" placeholder="Ulangi Password" class="col-md-6 form-control" style="width: 100%;" required>
        </form>
    </div>
    <div class="col-md-4">
        <select class="form-control col-md-8" name="status" form="registKader" required>
            <option value="belum-menikah" {{ (old('status') == 'belum-menikah') ? 'selected' : "" }}>Belum Menikah</option>
            <option value="menikah" {{ (old('status') == 'menikah') ? 'selected' : "" }}>Menikah</option>
        </select>
        <textarea name="alamatAsal" placeholder="Alamat Asal" class="form-control col-md-8" form="registKader" required>{{ old('alamatAsal') }}</textarea>
        <textarea name="alamatSekarang" placeholder="Alamat Sekarang" class="form-control col-md-8" form="registKader" required>{{ old('alamatSekarang') }}</textarea>
        <div class="row" style="margin: 1px 2px;">
            <input type="text" name="jurusan" placeholder="Jurusan" class="col-md-8 col-xs-8" form="registKader" style="background-color: #D1BA91;opacity: 0.9;" value="{{ old('jurusan') }}" required>
            <input type="text" name="angkatan" value="{{ old('angkatan') }}" placeholder="Angkatan" class="col-md-4 col-xs-4" form="registKader" style="background-color: #D1BA91;opacity: 0.9;" required>
        </div>
        <div class="row" style="margin: 1px 2px;">
            <input type="text" name="sma" value="{{ old('sma') }}" placeholder="SMA" class="col-md-8 col-xs-8" style="background-color: #D1BA91;opacity: 0.9;" form="registKader" required>
            <input type="text" name="lulusSma" value="{{ old('lulusSma') }}" placeholder="Thn Lulus" class="col-md-4 col-xs-4" form="registKader" style="background-color: #D1BA91;opacity: 0.9;" required>
        </div>
        <div class="row" style="margin: 1px 2px;">
            <input type="text" name="smp" value="{{ old('smp') }}" placeholder="SMP" class="col-md-8 col-xs-8" style="background-color: #D1BA91;opacity: 0.9;" form="registKader" required>
            <input type="text" name="lulusSmp" value="{{ old('lulusSmp') }}" placeholder="Thn Lulus" class="col-md-4 col-xs-4" form="registKader" style="background-color: #D1BA91;opacity: 0.9;" required>
        </div>
        <div class="row" style="margin: 3px 2px;">
            <input type="text" name="sd" value="{{ old('sd') }}" placeholder="SD" class="col-md-8 col-xs-8" style="background-color: #D1BA91;opacity: 0.9;" form="registKader" required>
            <input type="text" name="lulusSd" value="{{ old('lulusSd') }}" placeholder="Thn Lulus" class="col-md-4 col-xs-4" form="registKader" style="background-color: #D1BA91;opacity: 0.9;" required>
        </div>
        <input type="text" name="organisasiSma" value="{{ old('organisasiSma') }}" placeholder="Organisasi Saat SMA" class="col-md-6 form-control" style="width: 100%;" form="registKader" required>
        <input type="text" name="organisasiKuliah" value="{{ old('organisasiKuliah') }}" placeholder="Organisasi Saat Kuliah" class="col-md-6 form-control" style="width: 100%;" form="registKader" required>
        <input type="text" name="organisasiLainnya" value="{{ old('organisasiLainnya') }}" placeholder="Organisasi Lainnya" class="col-md-6 form-control" style="width: 100%;" form="registKader" required>
        <input type="text" name="penyakit" value="{{ old('penyakit') }}" placeholder="Penyakit Yang Sering Dialami" class="col-md-6 form-control" style="width: 100%;" form="registKader" required>
    </div>
    <div class="col-md-4">
        <input type="text" name="hobby" value="{{ old('hobby') }}" placeholder="Hobby" class="col-md-6 form-control" form="registKader" style="width: 100%;" required>
        <input type="text" name="keahlian" value="{{ old('keahlian') }}" placeholder="Keahlian" class="col-md-6 form-control" form="registKader" style="width: 100%;" required>
        <input type="text" name="bahasa" value="{{ old('bahasa') }}" placeholder="Bahasa" class="col-md-6 form-control" style="width: 100%;" form="registKader" required>
        <input type="text" name="namaAyah" value="{{ old('namaAyah') }}" placeholder="Nama Ayah" class="col-md-6 form-control" style="width: 100%;" form="registKader" required>
        <input type="text" name="namaIbu" value="{{ old('namaIbu') }}" placeholder="Nama Ibu" class="col-md-6 form-control" style="width: 100%;" form="registKader" required>
        <input type="text" name="jumlahSaudara" value="{{ old('jumlahSaudara') }}" placeholder="Jumlah Saudara Kandung" class="col-md-6 form-control" style="width: 100%;" form="registKader" required>
        <input type="text" name="anakKeberapa" value="{{ old('anakKeberapa') }}" placeholder="Anak Keberapa" class="col-md-6 form-control" style="width: 100%;"  form="registKader"required>
        <input type="text" name="harapan" value="{{ old('harapan') }}" placeholder="Pengembangan Yang Diharapkan di HmI" class="col-md-6 form-control" style="width: 100%;" form="registKader" required>
        <textarea name="alasan" placeholder="Alasan Mengikuti HmI" form="registKader" class="form-control col-md-8" required>{{ old('alasan') }}</textarea>
        <br>
        <button type="submit" class="btn btn-success" style="float: right; width: 150px; margin-bottom: 10px;" form="registKader">Daftar</button>
    </div>
    <!-- <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
</div>
</div>
@endsection

@section('navbar')
    @include('partials.navbarPage')
@endsection

@section('style')
    <style>
        .col-md-6, .col-md-8, .col-md-4{
            font-size: 20px;
            margin: 5px 0px;
        }
        .form-control {
            background-color: #D1BA91;
            opacity: 0.9;
            color: #0F2C13;
        }
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
          color: #0F2C13;
          opacity: 1; /* Firefox */
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
          color: #0F2C13;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
          color: #0F2C13;
        }
        .form-control::-moz-placeholder {
          color: #0F2C13;
          opacity: 1;
        }
        .form-control:-ms-input-placeholder {
          color: #0F2C13;
        }
        .form-control::-webkit-input-placeholder {
          color: #0F2C13;
        }
    </style>
@endsection