@extends('layouts.app')

@section('content')
<div class="row" style="margin: 1vw;">
    <div class="col-md-4">
        <h2>FORM REGISTRASI KADER HMI KOMISARIAT SAINS & TEKNOLOGI CABANG KABUPATEN BANDUNG</h2>
        <form id="registKader">
            <div class="row">
                <input type="text" name="name" placeholder="Nama Lengkap" class="col-md-6">
                <input type="text" name="username" placeholder="Username" class="col-md-6">
            </div>
            <input type="text" name="phone" placeholder="Nomor Ponsel" class="col-md-6" style="width: 100%;">
            <input type="email" name="email" placeholder="Alamat Email" class="col-md-6" style="width: 100%;">
            <input type="text" name="ttl" placeholder="Tempat Tanggal Lahir" class="col-md-6" style="width: 100%;">
            <select>
                <option>Laki Laki</option>
                <option>Perempuan</option>
            </select>
            <input type="password" name="password" placeholder="Password" class="col-md-6" style="width: 100%;">
            <input type="password" name="confirmPassword" placeholder="Ulangi Password" class="col-md-6" style="width: 100%;">
        </form>
    </div>
    <div class="col-md-4">
        <select>
            <option>Belum Menikah</option>
            <option>Menikah</option>
        </select>
        <textarea placeholder="Alamat Asal"></textarea>
        <textarea placeholder="Alamat Sekarang"></textarea>
        <div class="row">
            <input type="text" name="jurusan" placeholder="Jurusan" class="col-md-8">
            <input type="text" name="angkatan" placeholder="Angkatan" class="col-md-4">
        </div>
        <div class="row">
            <input type="text" name="sma" placeholder="SMA" class="col-md-8">
            <input type="text" name="lulusSma" placeholder="Tahun Lulus" class="col-md-4">
        </div>
        <div class="row">
            <input type="text" name="smp" placeholder="SMP" class="col-md-8">
            <input type="text" name="lulusSmp" placeholder="Tahun Lulus" class="col-md-4">
        </div>
        <div class="row">
            <input type="text" name="sd" placeholder="SD" class="col-md-8">
            <input type="text" name="lulusSd" placeholder="Tahun Lulus" class="col-md-4">
        </div>
        <input type="text" name="organisasiSma" placeholder="Organisasi Saat SMA" class="col-md-6" style="width: 100%;">
        <input type="text" name="organisasiKuliah" placeholder="Organisasi Saat Kuliah" class="col-md-6" style="width: 100%;">
        <input type="text" name="organisasiLainnya" placeholder="Organisasi Lainnya" class="col-md-6" style="width: 100%;">
        <input type="text" name="penyakit" placeholder="Penyakit Yang Sering Dialami" class="col-md-6" style="width: 100%;">
    </div>
    <div class="col-md-4">
        <input type="text" name="hobby" placeholder="Hobby" class="col-md-6" style="width: 100%;">
        <input type="text" name="keahlian" placeholder="Keahlian" class="col-md-6" style="width: 100%;">
        <input type="text" name="bahasa" placeholder="Bahasa" class="col-md-6" style="width: 100%;">
        <input type="text" name="namaAyah" placeholder="Nama Ayah" class="col-md-6" style="width: 100%;">
        <input type="text" name="namaIbu" placeholder="Nama Ibu" class="col-md-6" style="width: 100%;">
        <input type="text" name="jumlahSaudara" placeholder="Jumlah Saudara Kandung" class="col-md-6" style="width: 100%;">
        <input type="text" name="anakKeberapa" placeholder="Anak Keberapa" class="col-md-6" style="width: 100%;">
        <input type="text" name="harapan" placeholder="Pengembangan Yang Diharapkan di HmI" class="col-md-6" style="width: 100%;">
        <textarea placeholder="Alasan Mengikuti HmI"></textarea>
        <br>
        <button class="btn btn-primary" style="float: right;">Daftar</button>
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
@endsection

@section('navbar')
    @include('partials.navbarPage')
@endsection