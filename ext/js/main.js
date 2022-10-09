
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
    $(".content-main div").each(function(){
    $(this).addClass('content-body')
    })

    if(active_page === 'Home') { $("#home_content").removeClass('content-body'); } 
    if(active_page === 'Booked') { $("#booked_content").removeClass('content-body'); } 
    if(active_page === 'Reservation') { $("#reservation_content").removeClass('content-body'); } 
    if(active_page === 'Check Out') { $("#checkout_content").removeClass('content-body'); } 
    if(active_page === 'Services Offer') { $("#services_content").removeClass('content-body'); } 
    if(active_page === 'Products Offer') { $("#products_content").removeClass('content-body'); } 
    if(active_page === 'Users') { $("#users_content").removeClass('content-body'); } 
    if(active_page === 'Site Settings') { $("#site_setting_content").removeClass('content-body'); } 

    navItemActive(active_page);

}

function navItemActive(nav_name) {

    $('.navbar-nav .nav-item').each(function() {
    $(this).removeClass('active')
    })

    $('.nav-item a span').each(function() {
    if($(this).text() === nav_name) {
        $(this).parent().parent().addClass('active')
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
})