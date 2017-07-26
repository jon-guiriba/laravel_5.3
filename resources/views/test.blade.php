@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-8">
			<form id="albumForm" method="POST" action="{{route('testUpload')}}" enctype="multipart/form-data">
				{{ csrf_field() }}
			  <h5>Upload photos</h5>
			  <h6 class="text-danger">Note: At least 5 photos per album, and maximum of 3MB per image is allowed</h6>
	  		  <div class="dropzone" style="height: 200px; border: 1px dotted"></div>
			  <label> Album Title</label>
			  <input class="form-control" type="text" name="title">
			  <label> Album Description</label>
			  <input class="form-control" type="text" name="description" placeholder="Your album description">
			  <button id="albumFormSubmit" type="submit">Submit</button>
			</form>
		</div>
	</div>
	
</div>

@foreach($tests as $test)
     <img class="col-xs-1" src="data:{{$test->mimeType}};charset=utf-8;base64,{{$test->image}}">
@endforeach

@endsection

