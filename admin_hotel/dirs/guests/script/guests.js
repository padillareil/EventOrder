$(document).ready(function(){
    loadGuests();
});


function loadGuests() {
    $.post("dirs/guests/components/main.php", {
    }, function (data){
        $("#loadGuestsContent").html(data);
    });
}


/*Function show modal create user account*/
/*function mdladdAccount() {
    $("#mdl-add-account").modal('show');
}   
*/


function loadGuestProfile() {
    $.post("dirs/guests/components/guest_profile.php", {
    }, function (data){
        $("#loadGuestsContent").html(data);
    });
}
