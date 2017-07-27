@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-6 col-xs-offset-3">
			<form id="albumForm" method="POST" action="{{route('addAlbum')}}" enctype="multipart/form-data">
				{{ csrf_field() }}
			  <h5>Upload photos</h5>
			  <h6 class="text-danger">Note: At least 5 photos per album, and maximum of 3MB per image is allowed</h6>
	  		  <div class="dropzone padding-15" style="width: 100%; min-height:200px; border: 1px dotted"></div>
			  <label> Album Title</label>
			  <input class="form-control" type="text" name="title" placeholder="Your title">
			  <label> Album Description</label>
			  <textarea class="form-control" type="text" name="description" placeholder="Your album description" rows="2" resizable=false></textarea>
			  <button class="btn btn-purple margin-top-25 white" id="albumFormSubmit" type="submit">Submit</button>
			</form>
		</div>
	</div>
	
</div>
@foreach($images as $image)

     <img class="col-xs-1" src="data:{{$image->mime_type}};charset=utf-8;base64,{{$image->data}}">
@endforeach

@endsection

@section('page-scripts')
    <script src="{{asset('js/albums.js')}}"></script>
@stop
