$(document).ready(function(){
    load_Notifications();
    
});


function load_Notifications() {
    $.post("dirs/notifications/components/main.php", {
    }, function (data){
        $("#load_Notifications").html(data);
    });
}
