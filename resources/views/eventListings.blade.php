@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<table id="eventListingsTable">
		<thead>
			<tr>
				<th>#</th>
				<th>Event</th>
				<th>Date</th>
				<th>Time</th>
				<th>Venue</th>
				<th>Link</th>
				<th>Ticket</th>
			</tr>
		</thead>
		<tbody>
			@if ($events)
            	@foreach($events as $event)
            		<tr>
            			<td>{{$event->id}}</td>
            			<td>{{$event->event}}</td>
            			<td>
            				<input type="text" name="date" value="{{$event->date}}"></td>
            			<td>
            				<input type="text" name="time" value="{{$event->time}}"> 
            			</td>
            			<td>{{$event->venue}}</td>
            			<td>{{$event->link}}</td>
            			<td>{{$event->ticket}}</td>
            		</tr>
            	@endforeach
            @endif
		</tbody>
	</table>
</div>

@endsection
