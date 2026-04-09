$(document).ready(function(){
    load_EventOrders();
});



function load_EventOrders() {
    $.post("dirs/eventorder/components/main.php", {
    }, function (data){
        $("#load_EventOrders").html(data);
    });
}


/*Function Modal to apply Ammendment*/
// function addAmmendment() {
//     var modal = document.getElementById('mdl-add-ammendment');
//     var modal = new bootstrap.Modal(modal);
//     modal.show();
// }
