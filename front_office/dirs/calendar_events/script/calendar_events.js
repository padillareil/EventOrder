$(document).ready(function(){
    loadCalendar_Events();
});


function loadCalendar_Events() {
    $.post("dirs/calendar_events/components/main.php", {
    }, function (data){
        $("#load_CalendarEvents").html(data);
    });
}


function addEO() {
    var modal = document.getElementById('mdl-add-eventoder');
    var modal = new bootstrap.Modal(modal);
    modal.show();
}

