@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Terima Kasih</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Anda Sudah Berhasil Mendaftar, Silahkan Mengikuti Latihan Kader 1 Untuk Menjadi Anggota HmI. Yakin Usaha Sampai!
                    <br>
                    <br>
                    Konfirmasi Pendaftaran (Whatsapp): 
                    <br>
                    {{ $infoweb->number_contact_lk }} ( {{ $infoweb->name_contact_lk }} )
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('navbar')
    @include('partials.navbarPage')
@endsection