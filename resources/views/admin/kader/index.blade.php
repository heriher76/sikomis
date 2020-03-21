@extends('layouts.admin')

@section('content')
<h1>Daftar Kader</h1>
<br>
<div class="table-responsive">
<table id="table_id" class="display table table-condensed table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>HP</th>
            <th>Jurusan</th>
            <th style="display: none;">Gender</th>
            <th style="display: none;">Username</th>
            <th style="display: none;">Status</th>
            <th style="display: none;">TTL</th>
            <th style="display: none;">SMA</th>
            <th style="display: none;">SMP</th>
            <th style="display: none;">SD</th>
            <th style="display: none;">Organisasi SMA</th>
            <th style="display: none;">Organisasi Kuliah</th>
            <th style="display: none;">Organisasi Lainnya</th>
            <th style="display: none;">Penyakit</th>
            <th style="display: none;">Hobby</th>
            <th style="display: none;">Keahlian</th>
            <th style="display: none;">Bahasa</th>
            <th style="display: none;">Nama Ayah</th>
            <th style="display: none;">Nama Ibu</th>
            <th style="display: none;">Jumlah Saudara</th>
            <th style="display: none;">Anak Keberapa</th>
            <th style="display: none;">Harapan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->jurusan }} - {{ $user->angkatan }}</td>
                <td style="display: none;">{{ $user->jk }}</td>
                <td style="display: none;">{{ $user->username }}</td>
                <td style="display: none;">{{ $user->status }}</td>
                <td style="display: none;">{{ $user->ttl }}</td>
                <td style="display: none;">{{ $user->sma }} | {{ $user->lulusSma }}</td>
                <td style="display: none;">{{ $user->smp }} | {{ $user->lulusSmp }}</td>
                <td style="display: none;">{{ $user->sd }} | {{ $user->lulusSd }}</td>
                <td style="display: none;">{{ $user->organisasiSma }}</td>
                <td style="display: none;">{{ $user->organisasiKuliah }}</td>
                <td style="display: none;">{{ $user->organisasiLainnya }}</td>
                <td style="display: none;">{{ $user->penyakit }}</td>
                <td style="display: none;">{{ $user->hobby }}</td>
                <td style="display: none;">{{ $user->keahlian }}</td>
                <td style="display: none;">{{ $user->bahasa }}</td>
                <td style="display: none;">{{ $user->namaAyah }}</td>
                <td style="display: none;">{{ $user->namaIbu }}</td>
                <td style="display: none;">{{ $user->jumlahSaudara }}</td>
                <td style="display: none;">{{ $user->anakKeberapa }}</td>
                <td style="display: none;">{{ $user->harapan }}</td>
                <td>
                    <!-- <a href="{{ url('admin/verifikasi/lk/'.$user->id) }}" class="btn btn-primary btn-sm">LK</a> -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection

@section('script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                {
                    extend: 'excel',
                    title: 'Kader Saintek',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]
                    }
                },
                {
                    extend: 'pdf',
                    orientation: 'landscape',
                    pageSize: 'A1',
                    title: 'Kader Saintek',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]
                    }
                }]
            } );
        } );
    </script>
@endsection