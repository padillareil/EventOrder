$(document).ready(function(){
    loadProfileImage();
    loadSettings();
});


function loadSettings() {
    $.post("dirs/settings/components/main.php", {
    }, function (data){
        $("#loadUserSettings").html(data);
        loadActivityLogs_user();
        loadProfileImage();

    });
}



function viewAdmins() {
    $.post("dirs/settings/components/admins.php", {
    }, function (data){
        $("#loadUserSettings").html(data);
    });
}

function modalProfile() {
    $("#mdl-upload-profile").modal('show');
}


/*load Profile Image*/
function loadProfileImage(){
    $("#profile-wrapper").addClass("skeleton-avatar");
    $("#avatar-preview-profile").addClass("d-none");
    $.post("dirs/settings/actions/get_profile.php", {}, function(data){
        let response;
        try{
            response = JSON.parse(data);
        }catch(e){
            console.error("Invalid JSON Response", data);
            setDefaultProfile();
            return;
        }
        if ($.trim(response.isSuccess) === "success") {
            if (
                response.Data &&
                response.Data.AccProfile &&
                response.Data.AccProfile.trim() !== ""
            ) {
                $("#avatar-preview-profile") .attr("src","data:image/jpeg;base64," + response.Data.AccProfile
                    );

            } else {
                $("#avatar-preview-profile").attr("src","../assets/image/uploads/noimage.avif"
                    );
            }
        } else {
            setDefaultProfile();
            Swal.fire({
                icon: "error",
                title: "Oops!",
                text: response.Data
            });

        }

    });
    $("#avatar-preview-profile").on("load", function(){
        $("#profile-wrapper").removeClass("skeleton-avatar");
        $(this).removeClass("d-none");
    });

}

/* Default Fallback */
function setDefaultProfile(){
    $("#avatar-preview-profile").attr("src", "../assets/image/uploads/noimage.avif");
    $("#profile-wrapper").removeClass("skeleton-avatar");
    $("#avatar-preview-profile").removeClass("d-none");
}