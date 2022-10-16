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

$(document).on('submit','#frm_feedback_add', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'admin/ajax.php?action=save_feedback',
        data: $(this).serialize(),
        success: function(res) {
            swal("Great!", "Thank you for your Feedback!", "success");
            setTimeout(function() {
                location.reload();
            },1000)
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(document).on('submit','#frm_set_appointment', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'admin/ajax.php?action=add_appointment',
        data: $(this).serialize(),
        success: function(res) {
            if(res == 1) {
                swal("Great!", "Appointment Registered!", "success");
                setTimeout(function() {
                    location.reload();
                },1000)
            } else if(res == 3) {
                swal("Invalid!", "Invalid time range!", "error");
            } else {
                swal("Invalid!", "Sorry we can't schedule on weekends!", "error");
            }

            console.log(res)
        },
        error: function(res) {
            console.log(res)
        }
    })
})

// can select only weekdays
if($("#date1")) {
    const picker = document.getElementById('date1');
    var today = new Date().toISOString().split('T')[0];
    picker.setAttribute('min', today);
    // picker.addEventListener('input', function(e){
    // var day = new Date(this.value).getUTCDay();
    //     if([6,0].includes(day)){
    //         e.preventDefault();
    //         this.value = '';
    //         swal ( "Sorry" ,  "Can't schedule in weekends" ,  "error" )
    //     }
    // });

}
