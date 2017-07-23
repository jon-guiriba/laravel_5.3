$(document).ready(function() {
    initFullCalendar();
    initAddEventFab();
    initDeleteEvent();

    $('#eventModal').on('hidden.bs.modal', function () {
        resetModal();
    })

    $('#date').datetimepicker({format: 'D MMM, Y'});
    $('#time').datetimepicker({format: 'LT'});
    $('#preparationTime').datetimepicker({format: 'LT'});
});

function resetModal(){
    $('#deleteEventButton').show();
    $('#status-form-group').show();
    $('#eventModal .modal-title').text('Booking Details');
}

function initAddEventFab(){
    $( "#addEventButton" ).click(function() {
      $("#eventModal form").trigger('reset');
      $('#eventModal .modal-title').text('Add Booking');
      $('#eventModal form').attr('action', addEventUrl);
      $('#deleteEventButton').hide();
      $('#status-form-group').hide();
    });
}

function initDeleteEvent(){
    $( "#deleteEventButton" ).click(function() {
      $('#eventModal form').attr('action', deleteEventUrl);
      $('#eventModal form').submit();
    });

}

function initFullCalendar() {
    $('#calendar').fullCalendar({
        height: 'parent',
        navLinks: true,
        timeFormat: 'LT',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'addEvent month,agendaWeek,agendaDay'
        },
        eventSources: [
        {
               events: function(start, end, timezone, callback) {
                $.ajax({
                    type: 'get',
                    url: 'getAllEvents',
                    success: function(data) {
                        var events = [];
                        $(data).each(function(i, obj) {
                            events.push({
                                title: obj.event,
                                start: moment(obj.date).format("YYYY-MM-DD") + "T" +
                                        moment(obj.time, ["h:mm A"]).format("HH:mm:ss"),
                                data: obj
                            });
                        });
                        callback(events);
                    }
                });
            },
            editable: true,
            color: 'light-blue',     
            textColor: 'white',
        }
        ],
        eventClick: function(calEvent, jsEvent, view) {
            $("#eventModal #id").val(calEvent.data.id);
            $("#eventModal #event").val(calEvent.data.event);
            $("#eventModal #date").val(calEvent.data.date);
            $("#eventModal #time").val(calEvent.data.time);
            $("#eventModal #preparationVenue").val(calEvent.data.preparation_venue);
            $("#eventModal #noOfHeads").val(calEvent.data.no_of_heads);
            $("#eventModal #preparationTime").val(calEvent.data.preparation_time);
            $("#eventModal #client").val(calEvent.data.client);
            $("#eventModal #mobile").val(calEvent.data.mobile);
            $("#eventModal #email").val(calEvent.data.email);
            $("#eventModal #message").val(calEvent.data.message);
            $("#eventModal #status").val(calEvent.data.status);

            $('#eventModal form').attr('action', updateEventUrl);

            $('#eventModal').modal('show');
        }
    });  
}
