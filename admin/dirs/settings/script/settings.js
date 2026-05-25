$(document).ready(function(){
    loadSettings();
});


function loadSettings() {
    $.post("dirs/settings/components/main.php", {
    }, function (data){
        $("#loadUserSettings").html(data);
    });
}



function viewAdmins() {
    $.post("dirs/settings/components/admins.php", {
    }, function (data){
        $("#loadUserSettings").html(data);
    });
}