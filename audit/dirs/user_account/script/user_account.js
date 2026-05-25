$(document).ready(function(){
    loadUserAccountManagemnet();
});


function loadUserAccountManagemnet() {
    $.post("dirs/user_account/components/main.php", {
    }, function (data){
        $("#laod_UserManagement").html(data);
    });
}
