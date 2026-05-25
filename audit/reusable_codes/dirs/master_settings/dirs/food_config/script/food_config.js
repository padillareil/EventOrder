$(document).ready(function(){
    loadFoodConfig();
});


function loadFoodConfig() {
    $.post("dirs/master_settings/dirs/food_config/components/main.php", {
    }, function (data){
        $("#FoodConfig_Content").html(data);
        basicFunction_Tier();
        Standard_tier();
        Premium_tier();
        VIP_tier();
    });
}


/*Function show modal form for adding food package setup*/
function modalCreate() {
    $("#mdl-add-food").modal('show');
}


/*Function for refresh package setup button*/
function refreshPage() {
    basicFunction_Tier();
    Standard_tier();
    Premium_tier();
    VIP_tier();
}


/*Function to review food package*/
function mdlReview(DocEntry){
    $.post("dirs/master_settings/dirs/food_config/actions/get_food.php",{
        DocEntry : DocEntry
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#mdl-review-function").modal('show');
            $("#function-id").val(response.Data.DocEntry);
            let status = response.Data.PackageStatus;
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
            $("#food-beverage").val(response.Data.Beverage);
            $("#food-dinner").val(response.Data.Dinner);
            $("#food-lunch").val(response.Data.Lunch);
            $("#food-pmsnack").val(response.Data.PMSnack);
            $("#food-amsnack").val(response.Data.AMSnack);
            $("#food-maxpax").val(response.Data.MaxPax);
            $("#food-minpax").val(response.Data.MinPax);
            $("#food-eventtype").val(response.Data.EventType);
            $("#func-tier").val(response.Data.Tier);
            $("#service-foodtype").val(response.Data.ServingType);
        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}



/*Function to revtrieved function details for update*/
function mdlFoodUpdate(){
    $("#mdl-review-function").modal('hide');    
    var DocEntry = $("#function-id").val();
    $.post("dirs/master_settings/dirs/food_config/actions/get_food.php",{
        DocEntry : DocEntry
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#mdl-reupdate-function").modal('show');
            $("#food-id-package").val(response.Data.DocEntry);
            $("#upd-beverage").val(response.Data.Beverage);
            $("#upd-dinner").val(response.Data.Dinner);
            $("#upd-lunch").val(response.Data.Lunch);
            $("#upd-pm-snack").val(response.Data.PMSnack);
            $("#upd-am-snack").val(response.Data.AMSnack);
            $("#upd-max-pax").val(response.Data.MaxPax);
            $("#upd-min-pax").val(response.Data.MinPax);
            $("#upd-eventtype").val(response.Data.EventType);
            $("#upd-food-description").val(response.Data.Description);
            $("#upd-function-tier").val(response.Data.Tier);
            $("#upd-serving-type").val(response.Data.ServingType);


        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}



/*Function to remove this record*/
function packageDelete() {
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
            removeFoodPackage();
        }
    });
}

/*Function to remove script*/
function removeFoodPackage(){
    var DocEntry = $("#function-id").val();
    $.post("dirs/master_settings/dirs/food_config/actions/delete_function.php", {
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




/*Function to set status Available of food*/
function setAvailableFood(){
    var DocEntry = $("#function-id").val();
    var DocStatus = 'Available';
    $.post("dirs/master_settings/dirs/food_config/actions/update_statusfood.php", {
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

/*Function to set status repair of food*/
function setRepairFood(){
    var DocEntry = $("#function-id").val();
    var DocStatus = 'Maintenance';
    $.post("dirs/master_settings/dirs/food_config/actions/update_statusfood.php", {
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
