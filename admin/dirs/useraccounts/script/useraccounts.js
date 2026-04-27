$(document).ready(function(){
    loadUserAccounts();
});


function loadUserAccounts() {
    $.post("dirs/useraccounts/components/main.php", {
    }, function (data){
        $("#load_UserAccounts").html(data);
        loadActiveUsers();
    });
}

/*FUnction modal to add new account*/
function addAccount() {
    $("#mdl-add-account").modal('show');
}

/*Function show modal account settings control*/
function accountSettings(Uid){
    $("#mdl-account-settings").modal('show');
    $("#account-loading").removeClass("d-none");
    $("#account-content").addClass("d-none");
    $("#sett-fullname, #sett-usercode, #sett-username, #sett-position").val("");
    $(".form-check-input").prop("checked", false);

    $.post("dirs/useraccounts/actions/get_useraccount.php", {
        Uid: Uid
    }, function(data){

        let response = JSON.parse(data);

        if ($.trim(response.isSuccess) === "success") {
            $("#account-id").val(response.Data.Uid);
            $("#sett-fullname").val(response.Data.Fullname);
            $("#sett-usercode").val(response.Data.UsrCode);
            $("#sett-username").val(response.Data.Username);
            $("#sett-position").val(response.Data.Position);
            let roles = response.Data.Role;

            if (typeof roles === "string") {
                roles = roles.split(",");
            }

            roles = roles.map(r => r.trim());
            $(".form-check-input").each(function () {
                let value = $(this).val();
                if (roles.includes(value)) {
                    $(this).prop("checked", true);
                }
            });
            $("#sys-block, #sys-unblock").prop("checked", false);
            if (response.Data.SysAccess == 1) {
                $("#sys-unblock").prop("checked", true);
            } else {
                $("#sys-block").prop("checked", true);
            }
            $("#account-loading").addClass("d-none");
            $("#account-content").removeClass("d-none");

        } else {
            console.log($.trim(response.Data));

            $("#account-loading").addClass("d-none");
            $("#account-content").removeClass("d-none");
        }
    });
}

function deleteAccount() {

    var Uid = $("#account-id").val();

    Swal.fire({
        title: "Are you sure?",
        text: "This account will be permanently deleted.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel"
    }).then((result) => {

        if (result.isConfirmed) {

            // 🔥 SHOW SPINNER
            $("#btn-update-delete").prop("disabled", true);
            $("#btn-spinner-delete-upd").removeClass("d-none");

            $.post("dirs/useraccounts/actions/delete_account.php", {
                Uid: Uid
            }, function(data) {

                // 🔥 HIDE SPINNER
                $("#btn-update-delete").prop("disabled", false);
                $("#btn-spinner-delete-upd").addClass("d-none");

                if ($.trim(data) === "success") {
                    loadUserAccounts();
                    $("#mdl-account-settings").modal('hide');
                    $("#frm-account-settings")[0].reset();

                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        title: "Account Deleted",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                    });

                } else {

                    Swal.fire({
                        icon: "error",
                        title: "Delete Failed",
                        text: data
                    });
                }

            });

        }
    });
}



/*Function to update user password*/
function mdlNewPassword() {
    $("#mdl-update-password").modal('show');
}

