$(document).ready(function(){
    loadDashboard();
});

function loadDashboard() {
    $.post("dirs/dashboard/components/main.php", {
    }, function (data){
        $("#load_Dashboard").html(data);
    });
}