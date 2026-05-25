function loadMetrics() {
    $.post("dirs/dashboard/components/metrics/metrics.php", {
    }, function (data){
        $("#main-content").html(data);
    });
}

function loadDashboard() {
    $.post("dirs/dashboard/dashboard.php", {
    }, function (data){
        $("#main-content").html(data);
    });
}


function loadCPUDevice() {
    $.post("dirs/dashboard/components/cpu/cpu.php", {
    }, function (data){
        $("#main-content").html(data);
    });
}


function loadLeaderBoard() {
    $.post("dirs/dashboard/components/leadboard/leadboard.php", {
    }, function (data){
        $("#main-content").html(data);
    });
}


function loadKpI() {
    $.post("dirs/dashboard/components/kpi/kpi.php", {
    }, function (data){
        $("#main-content").html(data);
    });
}


function loadBooking() {
    $.post("dirs/dashboard/components/booking/booking.php", {
    }, function (data){
        $("#main-content").html(data);
    });
}


function laodHotels() {
    $.post("dirs/dashboard/components/hotels/hotels.php", {
    }, function (data){
        $("#main-content").html(data);
    });
}


function loadTicketsReport() {
    $.post("dirs/dashboard/components/tickets/tickets.php", {
    }, function (data){
        $("#main-content").html(data);
    });
}




