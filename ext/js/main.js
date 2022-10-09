
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

    if(active_page === 'Home') { $("#home_content").removeClass('content-body-custom'); } 
    if(active_page === 'Booked') { $("#booked_content").removeClass('content-body-custom'); } 
    if(active_page === 'Reservation') { $("#reservation_content").removeClass('content-body-custom'); } 
    if(active_page === 'Check Out') { $("#checkout_content").removeClass('content-body-custom'); } 
    if(active_page === 'Services Offer') { $("#services_content").removeClass('content-body-custom'); } 
    if(active_page === 'Products Offer') { $("#products_content").removeClass('content-body-custom'); } 
    if(active_page === 'Users') { $("#users_content").removeClass('content-body-custom'); } 
    if(active_page === 'Site Settings') { $("#site_setting_content").removeClass('content-body-custom'); } 

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

function format(d) {
    return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td>Full name:</td>' +
        '<td>' +
        d.ref_no +
        '</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Extension number:</td>' +
        '<td>' +
        d.ref_no +
        '</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Extra info:</td>' +
        '<td>And any further details here (images etc)...</td>' +
        '</tr>' +
        '</table>'
    );
}

$(document).ready(function(){
    // default page
    if(sessionStorage.getItem('active_page') == null) {
    sessionStorage.setItem('active_page', 'Home');
    navItemActive('Home');
    }
    activePage();

    // initialize datatables
    $('.tbl-booked').dataTable()
    $('.tbl-reservation').dataTable()
    $('.tbl-checkout').dataTable()
    
})