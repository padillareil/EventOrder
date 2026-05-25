$(document).ready(function(){
    loadEventOrders();
});


function loadEventOrders() {
    $.post("dirs/eventorders/components/main.php", {
    }, function (data){
        $("#loadEventOrders_content").html(data);
    });
}



function loadEventOrderProfile() {
    $.post("dirs/eventorders/components/contract.php", {
    }, function (data){
        $("#loadEventOrders_content").html(data); 
    });
}



/*Function show booking form*/
function mdlBookForm() {
    $("#mdl-booking-form").modal('show');
}