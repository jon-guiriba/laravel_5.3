@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="height-fullscreen padding-bottom-40 padding-top-20">
		<div id="calendar"></div>
	</div>
</div>
@include('modals.bookingModal')
@endsection

@section('page-scripts')
    <script src="{{asset('js/calendar.js')}}"></script>
@stop
