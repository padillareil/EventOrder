$(document).ready(function(){
    load_AccountSettings();
});



function load_AccountSettings() {
    $.post("dirs/settings/components/main.php", {
    }, function (data){
        $("#load_AccountSettings").html(data);
    });
}
