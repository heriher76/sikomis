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
                        Update Info Donasi
                    </h1>
                </div>
                <div class="body">

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">No Rekening</label>
                                <input type="text" name="no_rek" class="form-control" form="willSubmit" value="{{ $donation->no_rek }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Atas Nama</label>
                                <input type="text" name="atas_nama" class="form-control" form="willSubmit" value="{{ $donation->atas_nama }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Bank</label>
                                <input type="text" name="bank" class="form-control" form="willSubmit" value="{{ $donation->bank }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Nama Whatsapp</label>
                                <input type="text" name="nama_wa" class="form-control" form="willSubmit" value="{{ $donation->nama_wa }}">
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Nomor Whatsapp</label>
                                <input type="text" name="no_wa" class="form-control" form="willSubmit" value="{{ $donation->no_wa }}">
                            </div>
                        </div>

                      </div>
                  </div>
                  <form action="{{ url('admin/donations/update') }}" id="willSubmit" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                      <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                  </form>
                    </div>

                    </div>
                </div>
@endsection
