$(document).ready(function(){
    loadApprovalContent();
});



function loadApprovalContent() {
    $.post("dirs/approvals/components/main.php", {
    }, function (data){
        $("#loadApprovals").html(data);
        loadApproval();
    });
}


function exportAccountingLedger() {
    $("#exportLedgerModal").modal('show');
}

/*Function dipslay proposal for approval*/
 var CurrentPage = 1;
 var PageSize = 20;
 var totalPages = 1;
 var isPackageMode = false;
 var selectedItems = [];


 function loadApproval(page = 1) {
     CurrentPage = page; 
     var srvdisplay = $("#load_EventApprovalList");
     srvdisplay.html(`
             <tr>
                 <td colspan="5" class="p-5 text-center text-muted">
                     <div class="spinner-border text-dark"></div>
                     <div class="mt-2">Loading...</div>
                 </td>
             </tr>
     `);
     var Search = $("#search-approvals").val();
     $.post("dirs/approvals/actions/get_forapproval_list.php", {
         CurrentPage,
         PageSize,
         Search
     }, function (data) {
         let response;

         try {
             response = JSON.parse(data);
         } catch (e) {
             srvdisplay.html(`<div class="text-dark text-center py-4">Server Error</div>`);
             return;
         }
         if ($.trim(response.isSuccess) === "success") {
             ApprovalContent(response.Data);
             totalPages = (response.Data && response.Data.length > 0)
                 ? parseInt(response.Data[0].TotalPages)
                 : 1;

                 ApprovalPaginationUi();
                 ApprovalpageNumber();
         } else {
             emptyStateApproval("No Record Found.");
         }
     });
 }


 function ApprovalContent(data) {
     const srvdisplay = $("#load_EventApprovalList");
     if (!data || data.length === 0) {
         showEmptyStateApproval("No available.");
         return;
     }
     srvdisplay.empty();

     data.forEach(srv => {
         srvdisplay.append(`
             <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border shadow-xs">
                    <div class="neon-border text-secondary font-monospace fw-bold rounded-3 px-3 py-2 text-center"
                         style="min-width: 95px; font-size: 12px;"
                         title="Event Order Number">
                        ${srv.PencilCode || '--'}
                    </div>
                    <div class="flex-grow-1">
                        <div class="small fw-semibold text-dark mb-1">
                            ${srv.EventTitle || '--'}
                        </div>
                        <div class="text-muted fs-7">
                            ${srv.GuestCompany || '--'}
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="small text-muted">
                            Proposed by: <span class="fw-semibold">${srv.PreparedBy || '--'}</span>
                        </div>
                        <div class="small text-muted">
                            Position: <span class="fw-semibold">${srv.SalesPosition || '--'}</span>
                        </div>
                    </div>
                    <div class="d-flex gap-1 align-items-center">
                        <button type="button"
                                class="btn btn-white border shadow-xs btn-sm rounded-2 fw-medium text-dark px-3"
                                onclick="viewContractDetails(${srv.DocId})">
                            View
                        </button>
                    </div>
                </div>
         `);
     });
 }




 /*Function for no record of beverages*/
 function showEmptyStateApproval(message = "No pending approvals found") {
     $("#load_EventApprovalList").html(`
         <div class="d-flex align-items-center  bg-white p-3 rounded-3">
             <div class="text-center bg-white p-4 rounded-3 w-100" style="max-width: 600px;">
                 <div class="fw-semibold text-dark mb-1">
                     ${message}
                 </div>
                 <div class="text-muted small">
                     Loading for new approvals...
                 </div>
             </div>
         </div>
     `);
 }

 /*Function for no record of beverages*/
 function showEmptyStateApproval(message = "No pending approvals found") {
     $("#load_EventApprovalList").html(`
         <div class="d-flex align-items-center bg-white p-3 rounded-3">
             <div class="text-center bg-white p-4 rounded-3 w-100" style="max-width: 600px;">
                 <div class="fw-semibold text-dark mb-1">
                     ${message}
                 </div>
                 <div class="text-muted small">
                     There are no records to display at the moment.
                 </div>
             </div>
         </div>
     `);
 }


 /*Function to count page number page 1 of and so on*/
 function ApprovalPaginationUi() {
     $("#page-info-approval").text("Page " + CurrentPage + " of " + totalPages);
     if (CurrentPage <= 1) {
         $("#li-prev-approval").addClass("disabled");
     } else {
         $("#li-prev-approval").removeClass("disabled");
     }

     if (CurrentPage >= totalPages) {
         $("#li-next-approval").addClass("disabled");
     } else {
         $("#li-next-approval").removeClass("disabled");
     }
 }

 /*Function to build list of pagination*/
 function ApprovalpageNumber() {
     $("#pagination-approval li.page-number-approval").remove();
     let prevLi = $("#li-prev-approval");
     let maxVisible = 5;
     let start = Math.max(1, CurrentPage - 2);
     let end = Math.min(totalPages, start + maxVisible - 1);
     if (end - start < maxVisible - 1) {
         start = Math.max(1, end - maxVisible + 1);
     }
     if (start > 1) {
         insertPageBreakfast(1, prevLi);
         prevLi = prevLi.next();

         if (start > 2) {
             prevLi.after(`<li class="page-item page-number-approval disabled"><span class="page-link">...</span></li>`);
             prevLi = prevLi.next();
         }
     }
     for (let i = start; i <= end; i++) {
         insertPageBreakfast(i, prevLi);
         prevLi = prevLi.next();
     }
     if (end < totalPages) {
         if (end < totalPages - 1) {
             prevLi.after(`<li class="page-item page-number-approval disabled"><span class="page-link">...</span></li>`);
             prevLi = prevLi.next();
         }
         insertPageBreakfast(totalPages, prevLi);
     }
     function insertPageBreakfast(i, ref) {
         let activeClass = (i === CurrentPage) ? "active" : "";

         let li = `
             <li class="page-item page-number-approval ${activeClass}">
                 <a class="page-link" href="#" data-page="${i}">${i}</a>
             </li>
         `;

         $(li).insertAfter(ref);
     }
 }




// Function show details of approval documents
function viewContractDetails(DocId){
    // $.post("dirs/approvals/actions/get_approvaldocs.php",{
    //     DocId : DocId
    // },function(data){
    //     response = JSON.parse(data);
    //     if(jQuery.trim(response.isSuccess) == "success"){
    //         $("#StudentName").val(response.Data.StudentName);
    //         $("#Address").val(response.Data.Address);
    //         $("#Age").val(response.Data.Age);
    //         $("#Status").val(response.Data.Status);
    //     }else{
    //         alert(jQuery.trim(response.Data));
    //     }
    // });
    $("#mld-review-booking").modal('show');
}


function modifyCost() {
    $("#mld-modify-costing").modal('show');
}