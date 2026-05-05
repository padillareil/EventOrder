$(document).ready(function(){
    loadDashboard();
});

function loadDashboard() {
    $.post("dirs/dashboard/components/main.php", {
    }, function (data){
        $("#load_Dashboard").html(data);
    });
}


/*Function show modal pencil booking form*/
function mdlPencilBook() {
    $("#mdl-pencilbook-form").modal('show');
}