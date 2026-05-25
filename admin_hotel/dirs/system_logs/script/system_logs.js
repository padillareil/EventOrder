$(document).ready(function(){
    loadSystemLogs();
});

function loadSystemLogs() {
    $.post("dirs/system_logs/components/main.php", {
    }, function (data){
        $("#loadsystem_logs").html(data);
    });
}