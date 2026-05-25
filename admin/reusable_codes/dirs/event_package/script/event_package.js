$(document).ready(function(){
    loadEventPackages();
});



function loadEventPackages() {
    $.post("dirs/event_package/components/main.php", {
    }, function (data){
        $("#load_EventPackage").html(data);
    });
}


// Function show modal event package form
function addMenuPackage(){
    $("#menupkg-title").text('New Event Package');
    $("#menupkg-info").text('Add event package to list.');
    $("#mdl-add-menupackage").modal('show');
    $.post("dirs/event_package/actions/get_eventcode.php",{
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#packagemenunumber").val(response.Data.EventCode);
        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}