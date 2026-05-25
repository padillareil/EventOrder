function loadViewEnvent() {
    $.post("dirs/booking/components/event_details.php", {
    }, function (data){
        $("#main-content").html(data);
    });
}

function loadBookingHome() {
    $.post("dirs/booking/booking.php", {
    }, function (data){
        $("#main-content").html(data);
    });
}
