@extends('layouts.app')

@section('content')
<div class="container" style="background-image: url({{ url('images/logo_hmi.png') }}); background-repeat: no-repeat; background-position: center; background-size: 40vh;">
<div class="row">
    <center>
    <div class="col-md-12">
        <h3 style="background-color: #D1BA91; width: 50%; border-radius: 5%;">FORM REGISTRASI KAHMI HMI KOMISARIAT SAINS & TEKNOLOGI CABANG KABUPATEN BANDUNG</h3>
        <form id="registKahmi" method="POST" action="{{ route('kahmi.register') }}">
            {{csrf_field()}}
            <input type="text" name="name" placeholder="Nama Lengkap" class="col-md-6 col-xs-12 form-control" value="{{ old('name') }}" required>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Alamat Email" class="col-md-6 form-control" style="width: 100%;" required>
            <input type="password" name="password" id="password" placeholder="Password" class="col-md-6 form-control" style="width: 100%;" required>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Ulangi Password" class="col-md-6 form-control" style="width: 100%;" required>
            <span id='message' style="float: left;"></span>
            <input type="text" name="phone" placeholder="Nomor Ponsel" class="col-md-6 form-control" value="{{ old('phone') }}" style="width: 100%;" required>
            <div class="row" style="margin: 1px 2px;">
                <input type="text" name="birthplace" placeholder="Tempat" class="col-md-4 col-xs-4" form="registKahmi" style="background-color: #D1BA91;opacity: 0.9;" value="{{ old('birthplace') }}" required>
                <input placeholder="Tanggal Lahir" name="birthday" value="{{ old('birthday') }}" form="registKahmi" class="textbox-n col-md-8 col-xs-8" type="text" onfocus="(this.type='date')" style="background-color: #D1BA91;opacity: 0.9;" id="date" required>
            </div>
            <select class="form-control col-md-8" name="jk" required>
                <option value="laki-laki" {{ (old('jk') == 'laki-laki') ? 'selected' : "" }}>Laki Laki</option>
                <option value="perempuan" {{ (old('jk') == 'perempuan') ? 'selected' : "" }}>Perempuan</option>
            </select>
            <textarea name="address" placeholder="Alamat Sekarang" class="form-control col-md-8" form="registKahmi" required>{{ old('address') }}</textarea>
            <textarea name="formals" placeholder="Riwayat Pendidikan (Gunakan comma ',' untuk pemisah) ex: SD, SMP" class="form-control col-md-8" form="registKahmi" required>{{ old('formals') }}</textarea>
            <textarea name="trainings" placeholder="Jenjang Training LK (Gunakan comma ',' untuk pemisah) ex: LK1, LK2" class="form-control col-md-8" form="registKahmi" required>{{ old('trainings') }}</textarea>
            <textarea name="organizations" placeholder="Pengalaman Organisasi (Gunakan comma ',' untuk pemisah) ex: HMJ, DEMA" class="form-control col-md-8" form="registKahmi" required>{{ old('organizations') }}</textarea>
            <textarea name="jobs" placeholder="Pekerjaan (Gunakan comma ',' untuk pemisah) ex: Dosen, Pengusaha" class="form-control col-md-8" form="registKahmi" required>{{ old('jobs') }}</textarea>
            <button type="submit" class="btn btn-success" style="float: right; width: 150px; margin-bottom: 10px;" form="registKahmi">Daftar</button>
        </form>
    </div>
</center>
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

@section('script')
    <script type="text/javascript">
        $('#password, #confirmPassword').on('keyup', function () {
          if ($('#password').val() == $('#confirmPassword').val()) {
            $('#message').html('Matching').css('color', 'green');
          } else 
            $('#message').html('Not Matching').css('color', 'red');
        });
    </script>
@endsection