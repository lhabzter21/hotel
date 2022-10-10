$(document).ready(function() {
    // intialize date picker
    $("#range_date").daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    })

    $('#range_date').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });
  
    $('#range_date').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
})