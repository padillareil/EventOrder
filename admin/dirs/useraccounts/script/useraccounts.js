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
function accountSettings() {
    $("#mdl-account-settings").modal('show');
}
