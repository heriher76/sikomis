@extends('layouts.admin')

@section('style')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('content')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Web Setting
                    </h1>
                </div>
                <div class="body">

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">No Konfirmasi LK</label>
                                <input type="text" name="number_contact_lk" class="form-control" form="willSubmit" value="{{ $infoweb->number_contact_lk }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Nama Konfirmasi LK</label>
                                <input type="text" name="name_contact_lk" class="form-control" form="willSubmit" value="{{ $infoweb->name_contact_lk }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Instagram</label>
                                <input type="text" name="instagram" class="form-control" form="willSubmit" value="{{ $infoweb->instagram }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Facebook</label>
                                <input type="text" name="facebook" class="form-control" form="willSubmit" value="{{ $infoweb->facebook }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Twitter</label>
                                <input type="text" name="twitter" class="form-control" form="willSubmit" value="{{ $infoweb->twitter }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Youtube</label>
                                <input type="text" name="youtube" class="form-control" form="willSubmit" value="{{ $infoweb->youtube }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Google Email</label>
                                <input type="text" name="google" class="form-control" form="willSubmit" value="{{ $infoweb->google }}">
                            </div>
                        </div>

                        <div class="row">
            							<div class="col-md-4">
            								<div class="form-group form-float">
                                <label class="form-label">Slider 1</label>
                                @if(isset($infoweb->slider1))
                                    <br>
                                    <img class="img-responsive" style="max-width: 30vw; max-height: 30vh;" src="{{ url('slider/'.$infoweb->slider1) }}">
                                @endif
		                            <input type="file" name="slider1" class="form-control" form="willSubmit">
		                        </div>
            							</div>

                          <div class="col-md-4">
            								<div class="form-group form-float">
                                <label class="form-label">Slider 2</label>
                                @if(isset($infoweb->slider2))
                                    <br>
                                    <img class="img-responsive" style="max-width: 30vw; max-height: 30vh;" src="{{ url('slider/'.$infoweb->slider2) }}">
                                @endif
		                            <input type="file" name="slider2" class="form-control" form="willSubmit">
		                        </div>
            							</div>

                          <div class="col-md-4">
            								<div class="form-group form-float">
                                <label class="form-label">Slider 3</label>
                                @if(isset($infoweb->slider3))
                                    <br>
                                    <img class="img-responsive" style="max-width: 30vw; max-height: 30vh;" src="{{ url('slider/'.$infoweb->slider3) }}">
                                @endif
		                            <input type="file" name="slider3" class="form-control" form="willSubmit">
		                        </div>
            							</div>
            						</div>

                      </div>
                  </div>
                  <form action="{{ url('admin/web-settings/update') }}" id="willSubmit" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                      <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                  </form>
                    </div>

                    </div>
                </div>
@endsection
