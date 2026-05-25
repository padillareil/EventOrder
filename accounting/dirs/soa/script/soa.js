$(document).ready(function(){
    loadStatementOfAccount();
});

function loadStatementOfAccount() {
    $.post("dirs/soa/components/main.php", {
    }, function (data){
        $("#loadStatementofAccount_content").html(data);
    });
}


function loadSampleSoa() {
    $.post("dirs/soa/components/guest_soa.php", {
    }, function (data){
        $("#loadStatementofAccount_content").html(data);
    });
}