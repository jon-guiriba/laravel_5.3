$(document).ready(function() {
    $('#eventListingsTable input[name=date]').datetimepicker({format: 'D MMM, Y'});
    $('#eventListingsTable input[name=time]').datetimepicker({format: 'LT'});
    $("#eventListingsTable").DataTable({
        columnDefs: [
            {"type": "html-input", "targets": [3,4] }
        ] 
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
