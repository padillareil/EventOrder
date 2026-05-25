$(document).ready(function(){
    loadVenueInclusion();
});


function loadVenueInclusion() {
    $.post("dirs/inclusion/components/main.php", {
    }, function (data){
        $("#load_Inclusions").html(data);
        loadInclusionList();
    });
}


/*Function show modal form of inclusion master data list*/
function addInclusion() {
    $("#mdl-add-inclusion").modal('show');
    $("#inclusion-title").text('New Event Inclusion');
    $("#inclusion-info").text('Add a inclusion to master data list.');
    $("#btn-submit-inclusion").removeClass('d-none');
    $("#btn-update-inclusion").addClass('d-none');
    loadInclusionCategory();
}


/*Function inclusion list*/
function loadInclusionCategory() {
    $.post("dirs/inclusion/actions/get_inclusions.php", {}, function(data) {
        const response = JSON.parse(data);
        if ($.trim(response.isSuccess) === "success") {
            const categories = response.Data;
            $("#item-category").html('<option selected disabled>---</option>');
            categories.forEach(inclusions => {
                $("#item-category").append(
                    $("<option>", {
                        value: inclusions.Category,
                        text: inclusions.Category
                    })
                );
            });
        } else {
            console.log($.trim(response.Data));
        }
    });
}

/*Function inclusion list*/
function loadCategoryCustom() {
    $.post("dirs/inclusion/actions/get_inclusions.php", {}, function(data) {
        const response = JSON.parse(data);
        if ($.trim(response.isSuccess) === "success") {
            const categories = response.Data;
            $("#category-custom").html('<option selected disabled>---</option>');
            categories.forEach(inclusions => {
                $("#category-custom").append(
                    $("<option>", {
                        value: inclusions.Category,
                        text: inclusions.Category
                    })
                );
            });
        } else {
            console.log($.trim(response.Data));
        }
    });
}




/*Function to view and edit Inlusions*/
function mdlEditInclusion(LineNum){
    $("#inclusion-title").text('Update Event Inclusion');
    $("#inclusion-info").text('Edit inclusion information.');
    $("#btn-submit-inclusion").addClass('d-none');
    $("#btn-update-inclusion").removeClass('d-none');
    $("#mdl-add-inclusion").modal('show');
    $.post("dirs/inclusion/actions/get_inclusiondata.php",{
        LineNum : LineNum
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#inclusion-id").val(response.Data.LineNum);
            $("#inclusion-description").val(response.Data.InclusionDescription);
            $("#inclusion-type").val(response.Data.InclusionType);
            $("#item-category").val(response.Data.Category);
            $("#inclusion-quantity").val(response.Data.Quantity);
            $("#inclusion-price").val(response.Data.InclusionPrice);
            loadCategory(response.Data.Category);
        }else{
            alert(jQuery.trim(response.Data));
        }
    });
}


/*Function to reset*/
function loadCategory(selectedValue = null) {
    $.post("dirs/inclusion/actions/get_inclusions.php", {}, function(data) {
        const response = JSON.parse(data);
        if ($.trim(response.isSuccess) === "success") {
            const categories = response.Data;
            $("#item-category").html('<option selected disabled>---</option>');
            categories.forEach(inclusions => {
                $("#item-category").append(
                    $("<option>", {
                        value: inclusions.Category,
                        text: inclusions.Category
                    })
                );
            });
            if (selectedValue !== null) {
                $("#item-category").val(selectedValue);
            }
        } else {
            alert($.trim(response.Data));
        }
    });
}



/*Function to show modal custom inclusion*/
function addCustomInclusion() {
    $("#custom-title").text('New Custom Inclusion');
    $("#custom-info").text('Add custom inclusion to sub contracted services list.');
    $("#btn-submit-custom").removeClass('d-none');
    $("#mdl-add-custom").modal('show');
    loadCategoryCustom();
}

/*Function load to custom list*/
function loadCustomServices() {
    $.post("dirs/inclusion/components/custom_list.php", {
    }, function (data){
        $("#customservices_content").html(data);
        loadCustomInclusion();
    });
}




/*Function to view and edit Custom Inlusions*/
function mdlEditCUstom(LineNum){
    $("#custom-title").text('Update Event custom Inclusion');
    $("#custom-info").text('Edit custom inclusion information.');
    $("#btn-submit-custom").addClass('d-none');
    $("#btn-update-custom").removeClass('d-none');
    $("#mdl-add-custom").modal('show');
    $.post("dirs/inclusion/actions/get_custominclusiondata.php",{
        LineNum : LineNum
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#custom-id").val(response.Data.LineNum);
            $("#custom-description").val(response.Data.CustomDescription);
            $("#custom-type").val(response.Data.InclusionType);
            $("#category-custom").val(response.Data.Category);
            $("#custom-quantity").val(response.Data.Quantity);
            $("#custom-vendor").val(response.Data.Vendor);
            $("#custom-cost").val(response.Data.UnitCost);
            $("#custom-price").val(response.Data.SellingPrice);
            loadCategoryCustom(response.Data.Category);
        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}


/*Function to reset*/
function loadCategoryCustom(selectedValue = null) {
    $.post("dirs/inclusion/actions/get_inclusions.php", {}, function(data) {
        const response = JSON.parse(data);
        if ($.trim(response.isSuccess) === "success") {
            const categories = response.Data;
            $("#category-custom").html('<option selected disabled>---</option>');
            categories.forEach(inclusions => {
                $("#category-custom").append(
                    $("<option>", {
                        value: inclusions.Category,
                        text: inclusions.Category
                    })
                );
            });
            if (selectedValue !== null) {
                $("#category-custom").val(selectedValue);
            }
        } else {
            console.log($.trim(response.Data));
        }
    });
}