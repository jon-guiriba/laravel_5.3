$(document).ready(function() {
    initFullCalendar();
    $('#bookingModal').on('hidden.bs.modal', function () {
        resetModal();
    })

    $('#bookingModal input[name=date]').datetimepicker({format: 'D MMM, Y'});
    $('#bookingModal input[name=time]').datetimepicker({format: 'LT'});
    $('#bookingModal input[name=preparationTime]').datetimepicker({format: 'LT'});
});

function resetModal(){
    $('#deleteEventButton').show();
    $('#status-form-group').show();
    $('#bookingModal .modal-title').text('Booking Details');
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
                    type: 'post',
                    headers: {'X-CSRF-TOKEN' : csrf_token},
                    url: 'getAllBookings',
                    success: function(data) {
                        var events = [];
                        $(data).each(function(i, obj) {
                        console.log(obj);
                            events.push({
                                title: obj.event,
                                start: moment(obj.dat).format("YYYY-MM-DD") + "T" +
                                        moment(obj.tme, ["h:mm A"]).format("HH:mm:ss"),
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
            $("#bookingModal input[name=id]").val(calEvent.data.cid);
            $("#bookingModal input[name=event]").val(calEvent.data.evt);
            $("#bookingModal input[name=date]").val(calEvent.data.dat);
            $("#bookingModal input[name=time]").val(calEvent.data.tme);
            $("#bookingModal input[name=preparationVenue]").val(calEvent.data.pvenue);
            $("#bookingModal input[name=noOfHeads]").val(calEvent.data.ptime);
            $("#bookingModal input[name=preparationTime]").val(calEvent.data.nofheads);
            $("#bookingModal input[name=client]").val(calEvent.data.clnt);
            $("#bookingModal input[name=mobile]").val(calEvent.data.mbl);
            $("#bookingModal input[name=email]").val(calEvent.data.eml);
            $("#bookingModal input[name=message]").val(calEvent.data.msg);
            $("#bookingModal input[name=status]").val(calEvent.data.stat);

            $('#bookingModal form').attr('action', updateBookingUrl);

            $('#bookingModal').modal('show');
        }
    });  
}
