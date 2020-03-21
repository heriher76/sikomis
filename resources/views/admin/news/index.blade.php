@extends('layouts.admin')

@section('content')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Berita
                    </h1>
                    <a href="{{ url('admin/news/create') }}" class="btn btn-primary waves-effect">Create</a>
                </div>
                <br>
                <div class="body">
                    <div class="table-responsive">
                        <table id="table_id" class="display table table-condensed table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Publish Status</th>
                                    <th>By</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($newsNews as $berita)
                                <tr>
                                    <td>{{ $berita->title }}</td>
                                    <td>@php echo ($berita->publish_status == 1) ? 'Published' : 'Drafted'; @endphp</td>
                                    <td>{{ $berita->user->name }}</td>
                                    <td>{{ $berita->created_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/berita/'.$berita->slug) }}" class="btn btn-info btn-xs waves-effect">View</a>
                                        <a href="{{ url('admin/berita/'.$berita->slug.'/edit') }}" class="btn btn-success btn-xs waves-effect">Edit</a>
                                        <form action="{{ url('admin/berita/'.$berita->id) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Menghapus Berita Ini ?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END Table -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection
