$(document).ready(function(){
    loadAmenities();
});



function loadAmenities() {
    $.post("dirs/amenities/components/main.php", {
    }, function (data){
        $("#load_Amenities").html(data);
        loadAmenities();
    });
}



/*Function show modal form*/
function addAmenities() {
    $("#mdl-add-amenites").modal('show');
    $("#btn-submit-amenities").removeClass('d-none');
    $("#btn-update-amenities").addClass('d-none');
    $("#amenites-title").text('New Event Amenities');
    $("#amenites-info").text('Add amenities to master data list');
}


function mdlEditAmenties(Vid){
    $("#mdl-add-amenites").modal('show');
    $("#amenites-title").text('Update Event Amenities');
    $("#amenites-info").text('Update amenities to master data list');
    $("#btn-submit-amenities").addClass('d-none');
    $("#btn-update-amenities").removeClass('d-none');
    $.post("dirs/amenities/actions/get_amenities.php",{
        Vid : Vid
    },function(data){
        response = JSON.parse(data);    
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#amenites-id").val(response.Data.Vid);
            $("#amenities-description").val(response.Data.ItemDescription);
            $("#category-type").val(response.Data.ItemCategory);
            $("#amenities-rentalfee").val(response.Data.RentalFee);
            $("#amenities-corkagefee").val(response.Data.CorkageFee);
            $("#amenities-notes").val(response.Data.Notes);

        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}

