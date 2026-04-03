$(document).ready(function(){
    load_Dashboard();
});


function load_Dashboard() {
    $.post("dirs/dashboard/components/main.php", {
    }, function (data){
        $("#load_Home_dashboard").html(data);
    });
}
