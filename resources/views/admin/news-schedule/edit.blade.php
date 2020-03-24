@extends('layouts.admin')

@section('style')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('content')
	<div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Edit Berita / Agenda
                    </h1>
                </div>
                <div class="body">
                    <!-- <form action="{{ url('user/survey-points') }}" id="myForm" class="willSubmit" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} -->
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Judul</label>
                                <input type="text" name="title" class="form-control" form="willSubmit" value="{{ $berita->title }}">
                            </div>
                        </div>

                        <textarea name="description" class="form-control my-editor" form="willSubmit">{{ $berita->description }}</textarea>
						<br>
						<h4>Thumbnail</h4>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group form-float">
                                    @if(isset($berita->thumbnail))
                                        <br>
                                        <img class="img-responsive" style="max-width: 30vw; max-height: 30vh;" src="{{ url('news-thumbnail/'.$berita->thumbnail) }}">
                                    @endif 
		                            <input type="file" name="thumbnail" class="form-control" form="willSubmit">
		                        </div>
							</div>
						</div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
              		<p>Publish Status = </p>
              		<form action="{{ url('admin/news-schedules/'.$berita->slug) }}" id="willSubmit" method="POST" enctype="multipart/form-data">
              			{{ csrf_field() }}
                        {{ method_field('put') }}
	          			<input type="radio" id="published" class="with-gap" name="publish_status" value="1" @if ($berita->publish_status == 1) checked @endif>
	          			<label for="published">Publish</label>
	          			<input type="radio" id="drafted" class="with-gap" name="publish_status" value="0" @if ($berita->publish_status == 0) checked @endif>
	          			<label for="drafted">Draft</label>
	                    <br><br>
	              		<div class="form-group form-float">	
	              			<div class="form-line">
                        <label class="form-label">Slug <em>*optional</em></label>
	              				<input type="text" name="slug" class="form-control" value="{{ $berita->slug }}">
	              			</div>
	              		</div>
	                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
              		</form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
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
