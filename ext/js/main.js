
$(".btn-edit-customer").click(function() {
    let id = $(this).data('id')

    $.ajax({
        method: 'GET',
        dataType: 'html',
        url: 'modules/modal/customers_modal_edit.php?customer_id='+id,
        success: function(res) {
            $(".modal-title").text('Customer Details')
            $(".modal-body").html(res)
            $("#modal").modal('show')
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(".btn-services-edit").click(function() {
    let id = $(this).data('id')

    $.ajax({
        method: 'GET',
        dataType: 'html',
        url: 'modules/modal/services_modal_edit.php?services_id='+id,
        success: function(res) {
            $(".modal-title").text('Services Details')
            $(".modal-body").html(res)
            $("#modal").modal('show')
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(".btn-edit-appointment").click(function() {
    let id = $(this).data('id')

    $.ajax({
        method: 'GET',
        dataType: 'html',
        url: 'modules/modal/appointment_modal_edit.php?appointment_id='+id,
        success: function(res) {
            $(".modal-title").text('Edit Appointment Details')
            $(".modal-body").html(res)
            $("#modal").modal('show')
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(".btn-products-edit").click(function() {
    let id = $(this).data('id')

    $.ajax({
        method: 'GET',
        dataType: 'html',
        url: 'modules/modal/products_modal_edit.php?products_id='+id,
        success: function(res) {
            $(".modal-title").text('Edit Products Details')
            $(".modal-body").html(res)
            $("#modal").modal('show')
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(".btn-user-edit").click(function() {
    let id = $(this).data('id')

    $.ajax({
        method: 'GET',
        dataType: 'html',
        url: 'modules/modal/user_modal_edit.php?user_id='+id,
        success: function(res) {
            $(".modal-title").text('Edit User Details')
            $(".modal-body").html(res)
            $("#modal").modal('show')
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(".btn-add-customer").click(function() {
    $.ajax({
        method: 'GET',
        dataType: 'html',
        url: 'modules/modal/customers_modal_add.php',
        success: function(res) {
            $(".modal-title").text('Add New Customer')
            $(".modal-body").html(res)
            $("#modal").modal('show')
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(".btn-add-appointment").click(function() {
    $.ajax({
        method: 'GET',
        dataType: 'html',
        url: 'modules/modal/appointment_modal_add.php',
        success: function(res) {
            $(".modal-title").text('Add New Appointment')
            $(".modal-body").html(res)
            $("#modal").modal('show')
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(".btn-user-add").click(function() {
    $.ajax({
        method: 'GET',
        dataType: 'html',
        url: 'modules/modal/user_modal_add.php',
        success: function(res) {
            $(".modal-title").text('Add New User')
            $(".modal-body").html(res)
            $("#modal").modal('show')
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(".btn-delete-customer").click(function() {
    let id = $(this).data('id');
    let img  = $(this).data('img');

    swal("Delete", "Are you sure you want to delete?", {
        buttons: {
          cancel: "Cancel",
          accept: "Yes, Im sure"
        },
      })
      .then((value) => {
        switch (value) {
        
          case "accept":

            $.ajax({
                method: 'POST',
                url: 'ajax.php?action=delete_customer',
                data: {id:id, img:img},
                success: function(res) {
                    swal("Success!", "Successfully deleted!", "success");
                    setTimeout(function() {
                        location.reload();
                    },1000)
                },
                error: function(res) {
                    console.log(res)
                }
            })
            
            break;
       
          default:
            // do nothing ..
        }
      });
})

$(".btn-delete-appointment").click(function() {
    let id = $(this).data('id')
    swal("Delete", "Are you sure you want to delete?", {
        buttons: {
          cancel: "Cancel",
          accept: "Yes, Im sure"
        },
      })
      .then((value) => {
        switch (value) {
        
          case "accept":

            $.ajax({
                method: 'POST',
                url: 'ajax.php?action=delete_appointment',
                data: {id:id},
                success: function(res) {
                    swal("Success!", "Successfully deleted!", "success");
                    setTimeout(function() {
                        location.reload();
                    },1000)
                },
                error: function(res) {
                    console.log(res)
                }
            })
            
            break;
       
          default:
            // do nothing ..
        }
      });
})

$(".btn-products-delete").click(function() {
    let id = $(this).data('id')
    swal("Delete", "Are you sure you want to delete?", {
        buttons: {
          cancel: "Cancel",
          accept: "Yes, Im sure"
        },
      })
      .then((value) => {
        switch (value) {
        
          case "accept":

            $.ajax({
                method: 'POST',
                url: 'ajax.php?action=delete_products',
                data: {id:id},
                success: function(res) {
                    swal("Success!", "Successfully deleted!", "success");
                    setTimeout(function() {
                        location.reload();
                    },1000)
                },
                error: function(res) {
                    console.log(res)
                }
            })
            
            break;
       
          default:
            // do nothing ..
        }
      });
})

$(".btn-services-delete").click(function() {
    let id = $(this).data('id');
    let img = $(this).data('img');

    swal("Delete", "Are you sure you want to delete?", {
        buttons: {
          cancel: "Cancel",
          accept: "Yes, Im sure"
        },
      })
      .then((value) => {
        switch (value) {
        
          case "accept":

            $.ajax({
                method: 'POST',
                url: 'ajax.php?action=delete_services',
                data: {id:id, img:img},
                success: function(res) {
                    swal("Success!", "Successfully deleted!", "success");
                    setTimeout(function() {
                        location.reload();
                    },1000)
                },
                error: function(res) {
                    console.log(res)
                }
            })
            
            break;
       
          default:
            // do nothing ..
        }
      });
})

$(".btn-user-delete").click(function() {
    let id = $(this).data('id');

    swal("Delete", "Are you sure you want to delete?", {
        buttons: {
          cancel: "Cancel",
          accept: "Yes, Im sure"
        },
      })
      .then((value) => {
        switch (value) {
        
          case "accept":

            $.ajax({
                method: 'POST',
                url: 'ajax.php?action=delete_user',
                data: {id:id},
                success: function(res) {
                    swal("Success!", "Successfully deleted!", "success");
                    setTimeout(function() {
                        location.reload();
                    },1000)
                },
                error: function(res) {
                    console.log(res)
                }
            })
            
            break;
       
          default:
            // do nothing ..
        }
      });
})

$(document).on('submit', '#frm_customer', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'ajax.php?action=update_customer',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            if(res == 1) {
                swal("Success!", "Successfully Updated!", "success");
                setTimeout(function() {
                    location.reload();
                },1000)
            } else if(res == 3){
                swal("Invalid!", "Must be image!", "error");
            }else {
                swal("Invalid!", "Username already exist!", "error");
            }
                
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(document).on('submit', '#frm_site_settings', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'ajax.php?action=update_site_settings',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            if(res == 1) {
                swal("Success!", "Successfully Updated!", "success");
                setTimeout(function() {
                    location.reload();
                },1000)
            } else {
                swal("Invalid!", "Must be image!", "error");
            }
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(document).on('submit', '#frm_user_edit', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'ajax.php?action=update_user',
        data: $(this).serialize(),
        success: function(res) {
            if(res == 1) {
                swal("Success!", "Successfully Updated!", "success");
                setTimeout(function() {
                    location.reload();
                },1000)
            } else {
                swal("Invalid!", "Username already exist!", "error");
            }
                
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(document).on('submit', '#frm_customer_add', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'ajax.php?action=register',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            if(res == 1) {
                swal("Success!", "Successfully Added!", "success");
                setTimeout(function() {
                    location.reload();
                },1000)
            } else if(res == 3){
                swal("Invalid!", "Must be Image!", "error");
            } else {
                swal("Invalid!", "Username already exist!", "error");
            }
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(document).on('submit', '#frm_user_add', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'ajax.php?action=add_user',
        data: $(this).serialize(),
        success: function(res) {
            console.log(res)

            if(res == 1) {
                swal("Success!", "Successfully Added!", "success");
                setTimeout(function() {
                    location.reload();
                },1000)
            } else {
                swal("Invalid!", "Username already exist!", "error");
            }
                
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(document).on('submit', '#frm_appointment_add', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'ajax.php?action=add_appointment',
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
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(document).on('submit', '#frm_appointment_edit', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'ajax.php?action=update_appointment',
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
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(document).on('submit', '#frm_products_add', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'ajax.php?action=add_products',
        data: $(this).serialize(),
        success: function(res) {
            swal("Success!", "Successfully Added!", "success");
            setTimeout(function() {
                location.reload();
            },1000)
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(document).on('submit', '#frm_products_edit', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'ajax.php?action=update_products',
        data: $(this).serialize(),
        success: function(res) {
            swal("Success!", "Successfully Updated!", "success");
            setTimeout(function() {
                location.reload();
            },1000)
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(document).on('submit', '#frm_services_add', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'ajax.php?action=add_services',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            if(res == 1) {
                swal("Success!", "Successfully Added!", "success");
                setTimeout(function() {
                    location.reload();
                },1000)
            } else {
                swal("Invalid!", "Must be Image!", "error");
            }
        },
        error: function(res) {
            console.log(res)
        }
    })
})

$(document).on('submit', '#frm_services_edit', function(e) {
    e.preventDefault();

    $.ajax({
        method: 'POST',
        url: 'ajax.php?action=update_services',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            if(res == 1) {
                swal("Success!", "Successfully Updated!", "success");
                setTimeout(function() {
                    location.reload();
                },1000)
            } else {
                swal("Invalid!", "Must be Image!", "error");
            }
        },
        error: function(res) {
            console.log(res)
        }
    })
})

// set an active page
$(".nav-item a").click(function(){
    let nav_item_name = $(this).text().trim()
    sessionStorage.setItem('active_page', nav_item_name);

    activePage();
})

// call active page
function activePage() {
    let active_page = sessionStorage.getItem('active_page');

    // hide first all pages
    $(".content-main .main-panel-custom").each(function(){
        $(this).addClass('content-body-custom')
    })

    switch(active_page) {
        case "Dashboard": 
            $("#home_content").removeClass('content-body-custom');
            break;
        case "Customers": 
            $("#booked_content").removeClass('content-body-custom');
            break;
        case "Appointment": 
            $("#reservation_content").removeClass('content-body-custom');
            break;
        case "Feedbacks": 
            $("#checkout_content").removeClass('content-body-custom');
            break;
        case "Services Offer": 
            $("#services_content").removeClass('content-body-custom');
            break;
        case "Products Offer": 
            $("#products_content").removeClass('content-body-custom');
            break;
        case "Users": 
            $("#users_content").removeClass('content-body-custom');
            break;
        case "Site Settings": 
            $("#site_setting_content").removeClass('content-body-custom');
            break;
        default: 
            break;
    }

    navItemActive(active_page);

}

function navItemActive(nav_name) {
    // remove active class on nav-item
    $('.navbar-nav .nav-item').each(function() {
        $(this).removeClass('active')
    })

    // add active class on selected page
    $('.nav-item a span').each(function() {
    if($(this).text() === nav_name) {
        $(this).parent().parent().addClass('active')
    }
    })
}

window.uni_modal = function(title = '' , url=''){

    $.ajax({
        url:url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(res){
            if(res){
                $('#uni_modal .modal-title').text(title)
                $('#uni_modal .modal-body').html(res)
                $('#uni_modal').modal('show')
            }
        }
    })
}

$(document).ready(function(){
    // default page
    if(sessionStorage.getItem('active_page') == null) {
    sessionStorage.setItem('active_page', 'Dashboard');
    navItemActive('Dashboard');
    }
    activePage();

    // initialize datatables
    // Reference: https://datatables.net/reference/option/dom
    $('.tbl-booked').dataTable({"dom": "frtip", "pageLength": 10});
    $('.tbl-reservation').dataTable({"dom": "frtip", "pageLength": 10});
    $('.tbl-checkout').dataTable({"dom": "frtip", "pageLength": 10});
    $('.tbl-products-offer').dataTable({"dom": "tp", "pageLength": 5});
    $('.tbl-services-offer').dataTable({"dom": "tp", "pageLength": 5});
    $('.tbl-users').dataTable({"dom": "frtip"});

    // initialize editor
    tinymce.init({
        selector: '#txt-editor',
        height: 400,
    });
    
})