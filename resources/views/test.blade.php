@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<form method="POST" action="{{route('testUpload')}}" enctype="multipart/form-data">
		{{ csrf_field() }}
	  Select images: <input type="file" name="images[]" multiple>
	  <input type="submit">
	</form>
</div>

@foreach($tests as $test)
     <img class="col-xs-1" src="data:{{$test->mimeType}};charset=utf-8;base64,{{$test->image}}">
@endforeach

@endsection

