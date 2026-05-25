$(document).ready(function(){
    loadFunction();
});


function loadFunction() {
    $.post("dirs/function/components/main.php", {
    }, function (data){
        $("#HotelFunction_Content").html(data);
    });
}


/*Function show modal create user account*/
/*function mdladdAccount() {
    $("#mdl-add-account").modal('show');
}   
*/


function loadFunctionProfile() {
    $.post("dirs/function/components/function_profile.php", {
    }, function (data){
        $("#HotelFunction_Content").html(data); 
    });
}
