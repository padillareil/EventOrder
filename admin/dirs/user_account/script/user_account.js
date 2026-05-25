$(document).ready(function(){
    loadUserAccountManagemnet();
});


function loadUserAccountManagemnet() {
    $.post("dirs/user_account/components/main.php", {
    }, function (data){
        $("#laod_UserManagement").html(data);
    });
}


/*Function show modal create user account*/
function mdladdAccount() {
    $("#mdl-add-account").modal('show');
}   