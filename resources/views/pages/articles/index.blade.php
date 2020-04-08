@extends('layouts.main')

@section('title', 'Berita & Agenda | SIKOMIS')

@section('contents')
<div class="col-md-4 sidebar">
<aside>
  <h1 class="aside-title">Berita & Agenda Terbaru</h1>
  <div class="aside-body">
    @foreach($newsSchedules as $news)
    <article class="article-fw">
      <div class="inner">
        <figure>
            <a href="{{ url($news->slug) }}">
              <img src="{{ url('news-thumbnail/'.$news->thumbnail) }}">
            </a>
        </figure>
        <div class="details">
          <h1><a href="{{ url($news->slug) }}">{{ $news->title }}</a></h1>
          <p>
            {!! str_limit($news->description, $limit = 150, $end = '...') !!}
          </p>
          <div class="detail">
            <div class="time">{{ $news->updated_at }}</div>
            <div class="category"><a href="javascript:void();">{{ $news->user->name }}</a></div>
          </div>
        </div>
      </div>
    </article>
    @endforeach
  </div>
</aside>
</div>

<div class="col-md-8 text-left">
<div class="row">
  @if(Auth::user())
    @if(Auth::user()->sudahPelantikan == 1 || Auth::user()->roles[0]->name == 'kahmi' || Auth::user()->roles[0]->name == 'admin')
    <h5 style="margin-left: 10px;"><i class="ion-edit"> </i>Ingin Buat Artikel? <a href="#" data-toggle="modal" data-target="#createArticle" style="color: green;">Klik Disini</a></h5>
    <hr>
    <!-- Modal -->
      <div id="createArticle" class="modal fade" role="dialog" style="z-index: 9999999999999999 !important;">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Buat Artikel</h4>
            </div>
            <div class="modal-body">
              <form action="{{ url('send-article') }}" id="willSubmit" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="form-group form-float">
                    <div class="form-line">
                        <label class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" form="willSubmit">
                    </div>
                </div>
                <label>Deskripsi</label>
                <textarea name="description" class="form-control my-editor" form="willSubmit"></textarea>
                <br>
                <label>Thumbnail *Max size: 1 MB</label>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group form-float">
                        <input type="file" name="thumbnail" class="form-control" form="willSubmit">
                    </div>
                  </div>
                </div>
                <input type="hidden" name="slug" form="willSubmit">
                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Kirim</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
    @endif
  @endif
  @foreach($articles as $article)
  <article class="col-md-12 article-list">
    <div class="inner">
      <figure>
          <a href="{{ url('articles/'.$article->slug) }}">
            <img src="{{ url('articles-thumbnail/'.$article->thumbnail) }}">
        </a>
      </figure>
      <div class="details">
        <div class="detail">
          <div class="category">
           <a href="javascript:void():">{{ $article->user->name }}</a>
          </div>
          <div class="time">{{ $article->updated_at }}</div>
        </div>
        <h1><a href="{{ url('articles/'.$article->slug) }}">{{ $article->title }}</a></h1>
        <p>
          {!! str_limit($article->description, $limit = 150, $end = '...') !!}
        </p>
        <footer>
          <!-- <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1820</div></a> -->
          <a class="btn btn-primary more" href="{{ url('articles/'.$article->slug) }}">
            <div>Baca Semua</div>
            <div><i class="ion-ios-arrow-thin-right"></i></div>
          </a>
        </footer>
      </div>
    </div>
  </article>
  @endforeach
  <div class="col-md-12 text-center">
    {{ $articles->links() }}
    <!-- <ul class="pagination">
      <li class="prev"><a href="#"><i class="ion-ios-arrow-left"></i></a></li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">...</a></li>
      <li><a href="#">97</a></li>
      <li class="next"><a href="#"><i class="ion-ios-arrow-right"></i></a></li>
    </ul> -->
    <!-- <div class="pagination-help-text">
      Showing 8 results of 776 &mdash; Page 1
    </div> -->
  </div>
</div>
</div>
@stop

@section('styles')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('scripts')
<script>
  var editor_config = {
    path_absolute : "{{ url('/').'/' }}",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endsection

@section('sweet-alert')
  @include('sweetalert::alert')
@stop
