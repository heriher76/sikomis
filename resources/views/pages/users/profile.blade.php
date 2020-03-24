@extends('layouts.main')

@section('contents')
<div class="col-md-12">
	<div class="comments">
		<form class="row">
			<div class="col-md-12">
				<h3 class="title">Profil Saya</h3>
			</div>
			<div class="form-group col-md-4">
				<label for="name">Nama <span class="required"></span></label>
				<input type="text" id="name" name="name" value="{{ $me->name }}" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="email">Email <span class="required"></span></label>
				<input type="email" id="email" name="email" value="{{ $me->email }}" class="form-control">
			</div>
			<div class="form-group col-md-4">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" value="{{ $me->username }}" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="status">Status</label>
				<select class="form-control" name="status" id="status">
		            <option value="belum-menikah" {{ ($me->status == 'belum-menikah') ? 'selected' : "" }}>Belum Menikah</option>
		            <option value="menikah" {{ ($me->status == 'menikah') ? 'selected' : "" }}>Menikah</option>
		        </select>
	    	</div>
			<div class="form-group col-md-6">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" value="{{ $me->username }}" class="form-control">
			</div>
			<div class="form-group col-md-12">
				<label for="message">Response <span class="required"></span></label>
				<textarea class="form-control" name="message" placeholder="Write your response ..."></textarea>
			</div>
			<div class="form-group col-md-12">
				<button class="btn btn-primary">Send Response</button>
			</div>
		</form>
	</div>
</div>
@stop