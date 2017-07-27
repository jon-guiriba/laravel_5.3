@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<a id="addEventButton" class="btn btn-success btn-circle btn-lg fixed-lr" data-toggle="modal" data-target="#eventModal">
		<i class="glyphicon glyphicon-plus"></i>
	</a>
	<div class="height-fullscreen padding-bottom-40 padding-top-20">
		<div id="calendar"></div>
	</div>
</div>

@include('modals.eventModal')
@endsection

@section('page-scripts')
    <script src="{{asset('js/calendar.js')}}"></script>
@stop
