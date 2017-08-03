@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<table id="eventListingsTable">
		<thead>
			<tr>
				<th>#</th>
				<th>Event Image</th>
				<th>Venue</th>
				<th>Event</th>
				<th>Date</th>
				<th>Time</th>
				<th>Link</th>
                <th>Price</th>
			    <th>Ticket</th>
            </tr>
		</thead>
		<tbody>
			@if ($events)
            	@foreach($events as $i => $event)
            		<tr>
            			<td>{{$event->id}}</td>
            			<td>
	            			@if($event->image_data != null)
	            				<img class="img-normal" src="data:{{$event->image_mime_type}};charset=utf-8;base64,{{$event->image_data}}">
	            			@endif
            			</td>
                        <td>
                            <input type="hidden" name="venue" value="{{$event->preparation_venue}}">
                            <div id="venueMap{{$i}}" class="map-normal"></div>
                        </td>
            			<td>
                            <input class="form-control" type="text" name="time" value="{{$event->event}}"> 
                        </td>
            			<td>
            				<input class="form-control" type="text" name="date" value="{{$event->date}}"></td>
            			<td>
            				<input class="form-control" type="text" name="time" value="{{$event->time}}"> 
            			</td>
            			<td>
                            <input class="form-control" name="link" value="{{$event->link}}">
                        </td>
                        <td>
                            <input class="form-control" name="price" value="{{$event->price}}">
                        </td>
            			<td>
            				<select class="form-control">
							    <option value="free"  {{$event->ticket_type === 'free' ? 'selected' : '' }}>Free</option>
							    <option value="door_sales" {{$event->ticket_type === 'door_sales' ? 'selected' : '' }}>Door Sale</option>
							    <option value="buy_online" {{$event->buy_online === 'free' ? 'selected' : '' }}>Buy Online</option>
  							</select>
  						</td>
            		</tr>
            	@endforeach
            @endif
		</tbody>
	</table>
    <a id="addEventButton" class="btn btn-success btn-circle btn-lg fixed-lr" data-toggle="modal" data-target="#addEventModal">
        <i class="glyphicon glyphicon-plus"></i>
    </a>
    @include('modals.addEventModal')
</div>

@endsection

@section('page-scripts')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdsdK5dBOJZBEyTDcbYv6Sjqhk_CTl4UY&callback=initMap"></script>
    <script src="{{asset('js/eventListings.js')}}"></script>
@stop
