@extends('layouts.admin')

@section('content')
<h1>Daftar KAHMI</h1>
<br>
<div class="table-responsive">
<table id="table_id" class="display table table-condensed table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>HP</th>
            <th>JK</th>
            <th style="display: none;">Alamat</th>
            <th style="display: none;">TTL</th>
            <th style="display: none;">Riwayat Pendidikan</th>
            <th style="display: none;">Jenjang Training HMI</th>
            <th style="display: none;">Pengalaman Organisasi</th>
            <th style="display: none;">Pekerjaan</th>
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
                <td>{{ $user->jk }}</td>
                <td style="display: none;">{{ $user->alamatSekarang }}</td>
                <td style="display: none;">{{ $user->tempat }} || {{ $user->tanggalLahir }}</td>
                <td style="display: none;">{{ $user->formals }}</td>
                <td style="display: none;">{{ $user->trainings }}</td>
                <td style="display: none;">{{ $user->organizations }}</td>
                <td style="display: none;">{{ $user->jobs }}</td>
                <td>
                    <form action="{{ url('/admin/kahmi/'.$user->id) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Yakin Akan Dihapus?');">Hapus</button>
                    </form>
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
                    title: 'KAHMI Saintek',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10]
                    }
                },
                {
                    extend: 'pdf',
                    orientation: 'landscape',
                    pageSize: 'A1',
                    title: 'KAHMI Saintek',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10]
                    }
                }]
            } );
        } );
    </script>
@endsection