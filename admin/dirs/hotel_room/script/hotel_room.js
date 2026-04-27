$(document).ready(function(){
    loadFunctionRoom();
});



function loadFunctionRoom() {
    $.post("dirs/hotel_room/components/main.php", {
    }, function (data){
        $("#load_HotelRooms").html(data);
        loadHotelRooms();
    });
}


// Function show modal to create function room
function addFunctionRoom() {
    $("#mdl-add-functionroom").modal('show');
}


/*Function to show partition of existing function room*/
function createpartition() {
    $("#mdl-partition-rooms").modal('show');
}


