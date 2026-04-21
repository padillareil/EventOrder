$(document).ready(function(){
    loadUserAccounts();
});


function loadUserAccounts() {
    $.post("dirs/useraccounts/components/main.php", {
    }, function (data){
        $("#load_UserAccounts").html(data);
    });
}