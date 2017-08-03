$(document).ready(function() {
    $('#eventListingsTable input[name=date]').datetimepicker({
        format: 'D MMM, Y'
    });

    $('#eventListingsTable input[name=time]').datetimepicker({
        format: 'LT'
    });    

    $('#addEventModal input[name=date]').datetimepicker({
        format: 'D MMM, Y'
    });

    $('#addEventModal input[name=time]').datetimepicker({
        format: 'LT'
    });

    initDataTable();
});

function initAddEventFab(){
      $("#addEventButton" ).click(function() {
      $("#addEventModal form").trigger('reset');
    });
 }

function initMap() {

    $('#eventListingsTable > tbody  > tr > td > div').each(function() {
    var geocoder = new google.maps.Geocoder();
    var venue = "Quezon City";
    var pwet = {lat: -25.363, lng: 131.044};
    var dom = this;
    
    var map = new google.maps.Map(document.getElementById(dom.id), {
          zoom: 4,
          center: pwet
    });

    geocoder.geocode( { 'address': venue}, function(results, status) {
      if (status == 'OK') {
        var coordinates = results[0].geometry.location;

        map.setCenter(coordinates);

        var marker = new google.maps.Marker({
            map: map,
            position: coordinates
        });
      } else {
        console.log('Geocode was not successful for the following reason: ' + status);
      }
    });

    });

    

}

function initDataTable(){
    $("#eventListingsTable").DataTable({
        columnDefs: [{
            "type": "html-input",
            "targets": [3, 4]
        }]
    });

    applyInputSearchFix();
}

function applyInputSearchFix(){
    $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
        return $(value).val();
    };

    $("#eventListingsTable td input").on('change', function() {
        var $td = $(this).parent();
        $td.find('input').attr('value', this.value);
        table.cell($td).invalidate().draw();
    });
}