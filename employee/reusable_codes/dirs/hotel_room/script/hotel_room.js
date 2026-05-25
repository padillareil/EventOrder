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
function createpartition(Function_id){
    $("#mdl-partition-rooms").modal('show');
    $.post("dirs/hotel_room/actions/get_functionroom.php",{
        Function_id : Function_id
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#functionroom-display-id").val(response.Data.Function_id);
            $("#functionroom-title-table").text(response.Data.FunctionName);
            loadFunctionRoom__Partition();
        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}

 /*Function format with comma*/
function formatComma(number) {
    if (number == null) return "";
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


/*Function show selected room for edit*/
function editRoom(LineNum){
    $("#mdl-partition-addrooms").modal('show');
    $.post("dirs/hotel_room/actions/get_partitionroom.php",{
        LineNum : LineNum
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#partition-title").text('Update Room Partition');
            $("#partition-id").val(response.Data.LineNum);
            $("#paritionroom-name").val(response.Data.RoomName);
            $("#paritionroom-capacity").val(response.Data.MaxCapacity);
            $("#unit-of-measurement-partition").val(response.Data.Uom);
            $("#paritionroom-rentalfee").val(formatComma(response.Data.RentalFee));
            $("#btn-submit-parition").addClass('d-none');      // hide submit button
            $("#btn-submit-parition").prop('disabled', true);  // disable it
            $("#btn-update-parition").removeClass('d-none');   // show update button
        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}



/*Function edit Function room*/
function mdlEditFunctionRoom(Function_id){
    $("#mdl-add-functionroom").modal('show');
    $.post("dirs/hotel_room/actions/get_functionroom.php",{
        Function_id : Function_id
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#functionroom-title").text('Update Function Room');
            $("#functionroom-info").text('Update hotel function details.');
            $("#btn-submit-functionroom").addClass('d-none');      // hide submit button
            $("#btn-submit-functionroom").prop('disabled', false);  // disable it
            $("#btn-update-functionroom").removeClass('d-none'); 

            $("#functionroom-id").val(response.Data.Function_id);
            $("#functionroom-name").val(response.Data.FunctionName);
            $("#functionroom-hotelwing").val(response.Data.HotelWing);
            $("#functionroom-floorlvl").val(response.Data.FloorLevel);
            $("#functionroom-maxcapacity").val(response.Data.MaxCapacity);
            $("#unit-of-measurement").val(response.Data.UoM);
            $("#functionroom-price").val(formatComma(response.Data.RentalFee));
            $("#functionroom-note").val(response.Data.Notes);
        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}

