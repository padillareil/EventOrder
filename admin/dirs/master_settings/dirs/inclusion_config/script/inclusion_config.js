$(document).ready(function(){
    loadInclusionsSetup();
});


function loadInclusionsSetup() {
    $.post("dirs/master_settings/dirs/inclusion_config/components/main.php", {
    }, function (data){
        $("#InclusionsConfig_Content").html(data);
       /* basicFunction_Tier();
        Standard_tier();
        Premium_tier();
        VIP_tier();*/
    });
}


/*Function Create inclusion setip form*/
function modalCreate() {
    $("#mdl-add-inclusion").modal('show');
}