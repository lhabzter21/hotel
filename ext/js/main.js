
if($("#booked_graph")) {
    Highcharts.chart('booked_graph', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monthly Client Booked'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Total Booked'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Lemery',
            data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'Calatagan',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
}

$("#btn_view_booked").click(function() {
    let id = $(this).data('id');
    uni_modal('Booked Details', 'modules/modal/booked_modal_view.php?id='+id)
})

$(document).on('click', '#btn_booked_checkout', function() {
    let id = $(this).data('id1')
    let rid = $(this).data('id2')
    $.ajax({
        url:'ajax.php?action=save_checkout',
        method:'POST',
        data:{
            id: id,
            rid: rid
        },
        success:function(res){
            if(res ==1){
                location.reload()
            }
        }
    })
})

$(document).on('click','#btn_booked_update', function() {
    let frm = $(this).parent().parent().find('form').serialize()

    $.ajax({
        url:'ajax.php?action=save_check_in',
        method:'POST',
        data: frm,
        success:function(resp){
            if(resp > 0 ){
                location.reload()
            }
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
        case "Home": 
            $("#home_content").removeClass('content-body-custom');
            break;
        case "Booked": 
            $("#booked_content").removeClass('content-body-custom');
            break;
        case "Reservation": 
            $("#reservation_content").removeClass('content-body-custom');
            break;
        case "Check Out": 
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
    sessionStorage.setItem('active_page', 'Home');
    navItemActive('Home');
    }
    activePage();

    // initialize datatables
    // Reference: https://datatables.net/reference/option/dom
    $('.tbl-booked').dataTable({"dom": "frtip"});
    $('.tbl-reservation').dataTable({"dom": "frtip"});
    $('.tbl-checkout').dataTable({"dom": "frtip"});
    $('.tbl-products-offer').dataTable({"dom": "tp"});
    $('.tbl-services-offer').dataTable({"dom": "tp"});
    $('.tbl-users').dataTable({"dom": "frtip"});

    // initialize editor
    tinymce.init({
        selector: '#txt-editor',
        height: 400,
    });
    
})