function loadOptions() {
    $.post("dirs/dashboard/components/options/options.php", {
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

