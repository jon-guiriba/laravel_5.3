<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--CDN-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous"> 
    

    <!--Import styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fullcalendar-3.4.0/fullcalendar.css')}}" rel="stylesheet">
    <link href="{{ asset('jquery-ui-1.12.1.custom/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{ asset('jquery-ui-1.12.1.custom/jquery-ui.structure.css')}}" rel="stylesheet">
    <link href="{{ asset('jquery-ui-1.12.1.custom/jquery-ui.theme.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{ asset('DataTables/datatables.min.css')}}" rel="stylesheet"/>
    <link href="{{ asset('DataTables/DataTables-1.10.15/css/jquery.dataTables.css')}}" rel="stylesheet"/>
    <link href="{{ asset('DataTables/DataTables-1.10.15/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!--Import scripts-->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('fullcalendar-3.4.0/lib/moment.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/calendar.js')}}"></script>
    <script src="{{asset('js/eventListings.js')}}"></script>


</head>
<body>
    <script type="text/javascript">
            var addEventUrl = "{{route('addEvent')}}";
            var updateEventUrl = "{{route('updateEvent')}}";
            var deleteEventUrl = "{{route('deleteEvent')}}";
    </script>
    <div id="app">
        @yield('content')
    </div>

    <!-- Late loading Scripts -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('fullcalendar-3.4.0/fullcalendar.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdsdK5dBOJZBEyTDcbYv6Sjqhk_CTl4UY&callback=initMap"></script>
    
</body>
</html>
