$(document).ready(function(){
    loadEventOrderMOdule();
});

function loadEventOrderMOdule() {
    $.post("dirs/event_order/components/main.php", {
    }, function (data){
        $("#load_EventOrder").html(data);
    });
}