$(document).ready(function() {
    initFullCalendar();
    initAddEventFab();
    initDeleteEvent();

    $('#eventModal').on('hidden.bs.modal', function () {
        resetModal();
    })

    $('#eventModal input[name=date]').datetimepicker({format: 'D MMM, Y'});
    $('#eventModal input[name=time]').datetimepicker({format: 'LT'});
    $('#eventModal input[name=preparationTime]').datetimepicker({format: 'LT'});
});

function resetModal(){
    $('#deleteEventButton').show();
    $('#status-form-group').show();
    $('#eventModal .modal-title').text('Booking Details');
}

function initAddEventFab(){
      $("#addEventButton" ).click(function() {
      $("#eventModal form").trigger('reset');
      $('#eventModal form').attr('action', addEventUrl);
      $('#eventModal .modal-title').text('Add Booking');
      $('#eventModal #deleteEventButton').hide();
      $('#status-form-group').hide();
    });
}

function initDeleteEvent(){
      $("#eventModal #deleteEventButton" ).click(function() {
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
            $("#eventModal input[name=id]").val(calEvent.data.id);
            $("#eventModal input[name=event]").val(calEvent.data.event);
            $("#eventModal input[name=date]").val(calEvent.data.date);
            $("#eventModal input[name=time]").val(calEvent.data.time);
            $("#eventModal input[name=preparationVenue]").val(calEvent.data.preparation_venue);
            $("#eventModal input[name=noOfHeads]").val(calEvent.data.no_of_heads);
            $("#eventModal input[name=preparationTime]").val(calEvent.data.preparation_time);
            $("#eventModal input[name=client]").val(calEvent.data.client);
            $("#eventModal input[name=mobile]").val(calEvent.data.mobile);
            $("#eventModal input[name=email]").val(calEvent.data.email);
            $("#eventModal input[name=message]").val(calEvent.data.message);
            $("#eventModal input[name=status]").val(calEvent.data.status);

            $('#eventModal form').attr('action', updateEventUrl);

            $('#eventModal').modal('show');
        }
    });  
}
