$(document).ready(function(){
    loadApprovalContent();
});



function loadApprovalContent() {
    $.post("dirs/approvals/components/main.php", {
    }, function (data){
        $("#loadApprovals").html(data);
    });
}


function exportAccountingLedger() {
    $("#exportLedgerModal").modal('show');
}