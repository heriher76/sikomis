@extends('layouts.admin')

@section('content')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Artikel
                    </h1>
                    <a href="{{ url('admin/articles/create') }}" class="btn btn-primary waves-effect">Create</a>
                </div>
                <br>
                <div class="body">
                    <div class="table-responsive">
                        <table id="table_id" class="display table table-condensed table-striped table-hover table-bordered">
                            <thead>
                                <tr>
																		<th>No</th>
                                    <th>Judul</th>
                                    <th>Publish Status</th>
                                    <th>By</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $key => $article)
                                <tr>
																		<td>{{ $key+1 }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>@php echo ($article->publish_status == 1) ? 'Published' : 'Drafted'; @endphp</td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/send-article-notif/'.$article->id) }}" class="btn btn-warning btn-xs waves-effect">Notif</a>
                                        <a href="{{ url('admin/articles/'.$article->slug.'/edit') }}" class="btn btn-success btn-xs waves-effect">Edit</a>
                                        <form action="{{ url('admin/articles/'.$article->id) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Menghapus Item Ini ?');">Delete</button>
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
