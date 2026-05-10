$(document).ready(function(){
    loadConfigRooms();
});


function loadConfigRooms() {
    $.post("dirs/master_settings/dirs/function_config/components/main.php", {
    }, function (data){
        $("#FunctionConfig_Content").html(data);
        basicFunction_Tier();
        Standard_tier();
       Premium_tier();
       /* VIP_tier();*/
    });
}


/*Function Modal Form Create Room Setup*/
function modalCreate() {
    $("#mdl-add-function").modal('show');
}


/*Funciton Refresh Display*/
function refreshPage() {
   basicFunction_Tier();
   Premium_tier();
   Standard_tier();
   VIP_tier();
}


function mdlReview(argument) {
}


function mdlReview(DocEntry){
    $.post("dirs/master_settings/dirs/function_config/actions/get_function.php",{
        DocEntry : DocEntry
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#mdl-review-function").modal('show');
            $("#function-id").val(response.Data.DocEntry);
            $("#Address").text(response.Data.RefNumber);
            let status = response.Data.SpaceStatus;
            let badgeClass =
                status === "Available"
                    ? "bg-success-subtle text-success"
                    : "bg-danger-subtle text-danger";

            $("#room-status").html(`
                <span class="badge px-3 py-2 rounded-pill ${badgeClass}">
                    ${status}
                </span>
            `);
            if (status === "Available") {
                $("#link-available").addClass("disabled");
                $("#link-repair").removeClass("disabled");

            } else {

                $("#link-repair").addClass("disabled");
                $("#link-available").removeClass("disabled");

            }
            $("#reference-number").val(response.Data.RefNumber);
            $("#hotel-rev-name").val(response.Data.Property);
            $("#property-address").val(response.Data.PropertyAddress);
            $("#func-tier").val(response.Data.FunctionTier);
            $("#function-name").val(response.Data.FunctionName);
            $("#func-wing").val(response.Data.Wing);
            $("#func-venue").val(response.Data.Venue);
            $("#func-rent").val('₱ ' + formatComma(response.Data.RentalFee));
            $("#func-pax").val(response.Data.PaxCapacity);
            $("#func-chair").val(response.Data.ChairCapacity);
            $("#func-table").val(response.Data.TableCapacity);
            $("#func-room").val(response.Data.RoomSize + ' ' + 'sqm');

        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}

/*Function to revtrieved function details for update*/
function mdlFunctionUpdate(){
    $("#mdl-review-function").modal('hide');    
    var DocEntry = $("#function-id").val();
    $.post("dirs/master_settings/dirs/function_config/actions/get_function.php",{
        DocEntry : DocEntry
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#mdl-reupdate-function").modal('show');
            $("#function-upd-id").val(response.Data.DocEntry);
            $("#update-hotel").val(response.Data.Property);
            $("#update-hotel-location").val(response.Data.PropertyAddress);
            $("#update-function-tier").val(response.Data.FunctionTier);
            $("#update-function-room").val(response.Data.FunctionName);
            $("#update-function-wing").val(response.Data.Wing);
            $("#update-function-venue").val(response.Data.Venue);
            $("#update-rental-fee").val(formatComma(response.Data.RentalFee));
            $("#update-function-capacity").val(response.Data.PaxCapacity);
            $("#update-chair-capacity").val(response.Data.ChairCapacity);
            $("#update-table-capacity").val(response.Data.TableCapacity);
            $("#update-room-size").val(response.Data.RoomSize);

        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}

/*Function to remove this record*/
function functionDelete() {
    Swal.fire({
        title: "Remove this function.",
        text: "This will be permanently removed.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Remove",
        cancelButtonText: "Cancel"
    }).then((result) => {
        if (result.isConfirmed) {
            removeFunction();
        }
    });
}

/*Function to remove script*/
function removeFunction(){
    var DocEntry = $("#function-id").val();
    $.post("dirs/master_settings/dirs/function_config/actions/delete_function.php", {
        DocEntry : DocEntry
    },function(data){
        if(jQuery.trim(data) == "success"){
          basicFunction_Tier();
          Premium_tier();
          Standard_tier();
          VIP_tier();
          $("#mdl-review-function").modal('hide');
           Swal.fire({
               toast: true,
               position: "top-end",
               icon: "success",
               title: "Function removed.",
               showConfirmButton: false,
               timer: 2000,
               timerProgressBar: true
           }); 
        }else{
             Swal.fire({
                icon: "error",
                title: "Oops!",
                text: data
            });
        }
    });
}

/*Function to set status Available of Function*/
function setAvailable(){
    var DocEntry = $("#function-id").val();
    var DocStatus = 'Available';
    $.post("dirs/master_settings/dirs/function_config/actions/update_statusfunction.php", {
        DocEntry : DocEntry,
        DocStatus : DocStatus
    },function(data){
        if(jQuery.trim(data) == "success"){
          basicFunction_Tier();
          $("#mdl-review-function").modal('hide');
          Premium_tier();
          Standard_tier();
          VIP_tier();
           Swal.fire({
               toast: true,
               position: "top-end",
               icon: "success",
               title: "Status Changed.",
               showConfirmButton: false,
               timer: 2000,
               timerProgressBar: true
           }); 
        }else{
             Swal.fire({
                icon: "error",
                title: "Oops!",
                text: data
            });
        }
    });
}

/*Function to set status repair of Function*/
function setRepair(){
    var DocEntry = $("#function-id").val();
    var DocStatus = 'Maintenance';
    $.post("dirs/master_settings/dirs/function_config/actions/update_statusfunction.php", {
        DocEntry : DocEntry,
        DocStatus : DocStatus
    },function(data){
        if(jQuery.trim(data) == "success"){
          basicFunction_Tier();
          Premium_tier();
          Standard_tier();
          VIP_tier();
          $("#mdl-review-function").modal('hide');
           Swal.fire({
               toast: true,
               position: "top-end",
               icon: "success",
               title: "Status Changed.",
               showConfirmButton: false,
               timer: 2000,
               timerProgressBar: true
           }); 
        }else{
             Swal.fire({
                icon: "error",
                title: "Oops!",
                text: data
            });
        }
    });
}




