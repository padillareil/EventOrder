$(document).ready(function(){
    loadHouseKeeping();
});


function loadHouseKeeping() {
    $.post("dirs/housekeeping/components/main.php", {
    }, function (data){
        $("#loadHouseKeeping_Content").html(data);
    });
}



function viewReportDetails() {
    $.post("dirs/housekeeping/components/hk_reports.php", {
    }, function (data){
        $("#loadHouseKeeping_Content").html(data);
    });
}