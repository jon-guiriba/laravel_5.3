$(document).ready(function() {
    $('#eventListingsTable input[name=date]').datetimepicker({
        format: 'D MMM, Y'
    });

    $('#eventListingsTable input[name=time]').datetimepicker({
        format: 'LT'
    });

    $("#eventListingsTable").DataTable({
        columnDefs: [{
            "type": "html-input",
            "targets": [3, 4]
        }]
    });

    $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
        return $(value).val();
    };

    $("#eventListingsTable td input").on('change', function() {
        var $td = $(this).parent();
        $td.find('input').attr('value', this.value);
        table.cell($td).invalidate().draw();
    });

});

function initMap() {
    var geocoder = new google.maps.Geocoder();
    var map = new google.maps.Map($("#venueMap"), {
          zoom: 4,
          center: {lat: 0, lng: 0}
        });
    var venue = $("#eventListingsTable [name='venue']").val();

    /*geocoder.geocode( { 'address': venue}, function(results, status) {
      if (status == 'OK') {
        console.log(venue);
        console.log(results);
        console.log(status);

        var coordinates = results[0].geometry.location;

        map.setCenter(coordinates);

        var marker = new google.maps.Marker({
            map: map,
            position: coordinates
        });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });*/

}