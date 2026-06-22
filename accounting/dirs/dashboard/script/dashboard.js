$(document).ready(function(){
    loadApprovalContent();
});





/*Function Display All New Request Notifications*/
function loadNotification() {
    $.post("dirs/dashboard/components/notification/notification.php", {
    }, function (data){
        $("#dashboard-display-content").html(data);
    });
}


// ================================
// Load Approval Content
// ================================
function skeletonDashboard() {
    const template = document.getElementById("skeleton-dashboard");
    $("#loadApprovals").html(template.innerHTML);
}

function loadApprovalContent() {
    skeletonDashboard();
    $.post("dirs/dashboard/components/main.php", {}, function (data) {
        let result = $.trim(data);
        setTimeout(function () {
            if (!result) return;
            $("#loadApprovals")
                .hide()
                .html(result)
                .fadeIn(300, function () {
                    loadApproval();
                    NotifyLoader();
                    InitNotificationSound();
                });
        }, 300);
    }).fail(function () {
        skeletonDashboard();
    });

}






// ================================
// Notification Polling
// ================================
// production: 300000 (5 minutes)
setInterval(NotifyLoader,300000);



var lastCount = null;


function NotifyLoader(){
    $.post("dirs/dashboard/actions/get_notify.php",{},
        function(data){
            let response = JSON.parse(data);
            if($.trim(response.isSuccess) === "success"){
                let count = parseInt(
                    response.Data.Notification || 0
                );

                // first load only
                if(lastCount === null){

                    lastCount = count;

                }

                $("#number-new-notify")
                    .text(count);
                if(count > 0){
                    $("#number-new-notify")
                        .removeClass("d-none");
                    // only new incoming notification
                    if(count > lastCount){
                        $("#number-new-notify")
                            .addClass(
                              "animate__animated animate__heartBeat"
                            );
                        setTimeout(function(){
                            $("#number-new-notify")
                                .removeClass(
                                  "animate__animated animate__heartBeat"
                                );

                        },1000);

                        ShowNotificationPopover(count);
                        NotificationRingtone();
                        loadApproval();
                    }

                }else{
                    $("#number-new-notify")
                        .text("0")
                        .addClass("d-none");
                }
                // update count after processing
                lastCount = count;
            }
        }
    );

}



// ================================
// Bootstrap Popover
// ================================
function ShowNotificationPopover(count) {

    let documentText = count == 1 
        ? "document" 
        : "documents";


    Swal.fire({
        toast: true,
        position: "top-end",
        icon: "info",
        title: "New Approval Document",
        html: `
            <small>
                ${count} ${documentText} waiting for review
            </small>
        `,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });

}






// ================================
// Mark Notification Received
// ================================


function NotifyReceived(latestDocId){
    $.post("dirs/dashboard/actions/update_notifyme.php",
        {
            LatestDocId:latestDocId
        },

        function(data){
            if($.trim(data)!="success"){
                console.log(data);
            }
        }
    );
}





// ================================
// Start Notification System
// ================================
$(document).ready(function(){
    InitNotificationSound(function(){
        NotifyLoader();
        setInterval(NotifyLoader,300);
    });
});



// ================================
// Notification Sound
// ================================
var audioUnlocked = false;


function InitNotificationSound(){
    var sound = document.getElementById("notifySound");
    if(!sound){
        console.log("Sound element missing");
        return;
    }
    $(document).one(
        "click keydown touchstart",
        function(){
            sound.play()
            .then(function(){
                sound.pause();
                sound.currentTime = 0;
                audioUnlocked = true;
                console.log("Notification sound enabled");
            })
            .catch(function(err){
                console.log(err);

            });
        }
    );
}







function NotificationRingtone(){
    var sound =
        document.getElementById("notifySound");
    if(!audioUnlocked){
        console.log(
            "Audio not enabled yet"
        );
        return;
    }
    if(sound){
        sound.currentTime = 0;
        sound.play()
        .catch(function(err){
            console.log(
                "Audio error",
                err
            );
        });
    }
}




// ================================
// Load New Documents for Review
// ================================
function skeletonNotification() {
    const template = document.getElementById("skeleton-notification");
    $("#dashboard-display-content").html(template.innerHTML);
}

function loadNewDocuments() {
    skeletonNotification();
    $.post("dirs/dashboard/components/newdocuments/newdocuments.php", {}, function (data) {
        let result = $.trim(data);
        setTimeout(function () {
            if (!result) return;
            $("#dashboard-display-content")
                .hide()
                .html(result)
                .fadeIn(300, function () {
                    loadNotifications();
                });
        }, 300);
    }).fail(function () {
        skeletonNotification();
    });

}



// ================================
// Update isNotify if the selected document is already been viewed
// ================================
function reviewNewDocs(DocId){
    $.post("dirs/dashboard/actions/update_notifydocs.php",
        {
            DocId:DocId
        },
        function(data){
            if($.trim(data)!="success"){
                console.log(data);
            }
        }
    );
}






// ================================
// Load Payments Content
// ================================
function skeletonPaymentes() {
    const template = document.getElementById("skeleton-payments");
    $("#loadApprovals").html(template.innerHTML);
}

function loadStatementofAccount() {
    skeletonPaymentes();
    $.post("dirs/dashboard/components/soa_docs/soa_docs.php", {}, function (data) {
        let result = $.trim(data);
        setTimeout(function () {
            if (!result) return;
            $("#loadApprovals")
                .hide()
                .html(result)
                .fadeIn(300, function () {
                    loadPaymentTransactions();
                });
        }, 300);
    }).fail(function () {
        skeletonPaymentes();
    });

}




/*Function to show for SOA only*/
// function reviewCustomerRecord(docEntry) {

//     window.open(
//         'customer_record.php?DocEntry=' + docEntry,
//         'CustomerRecord_' + Date.now(),
//         'width=900,height=600,resizable=yes,scrollbars=yes'
//     );

// }


/*Function to apply charge slip with reference number*/
function applyChargeSlip(){
    $.post("dirs/dashboard/actions/get_slip_refnumber.php",{
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#slip_refnumber").val(response.Data.SlipNumber);
            $("#slipnumber").val(response.Data.SlipNumber);
           $("#mld-charge-slip").modal('show');
        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}

/*Function to validate booking adn auto fill*/
$("#booking_number").on("change", function(){
    var BookingNum = $("#booking_number").val();
    $.post("dirs/dashboard/actions/get_bookingdetails.php", {
        BookingNum: BookingNum
    }, function(data){
        response = JSON.parse(data);
        if($.trim(response.isSuccess) == "success"){
            $("#event_name").val(response.Data.EventName);
            $("#error_message").addClass("d-none");

        }else{
            $("#event_name").val("");
            $("#error_message").removeClass("d-none");
            console.log($.trim(response.Data));
        }
    });
});


/*Function computation Damage*/
function computeDamageChargeAmount(){
    let qty = parseFloat($("#report_quantity").val()) || 0;
    let unitCost = $("#unit-cost").val()
        .replace(/,/g, ''); // remove comma
    unitCost = parseFloat(unitCost) || 0;
    let total = qty * unitCost;
    $("#charge-amount").val(
        total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        })
    );
}


// Auto compute while typing
$("#report_quantity, #unit-cost").on("input", function(){
    computeDamageChargeAmount();
});



// ================================
// Load Other Charges Records to Apply and Review
// ================================
function viewAllCharges() {
    skeletonNotification();
    $.post("dirs/dashboard/components/eventcharges/eventcharges.php", {}, function (data) {
        let result = $.trim(data);
        setTimeout(function () {
            if (!result) return;
            $("#dashboard-display-content")
                .hide()
                .html(result)
                .fadeIn(300, function () {
                    loadEventCharges();
                });
        }, 300);
    }).fail(function () {
        skeletonNotification();
    });

}



// ================================
// Load Charges Breakdown for Review
// ================================
function skeletonCharges() {
    const template = document.getElementById("skeleton-charges");
    $("#dashboard-display-content").html(template.innerHTML);
}

function breakdownCharges(BookingNum) {
    skeletonCharges();
    $.post("dirs/dashboard/components/charges_breakdown/charges_breakdown.php", {}, function (html) {
        let result = $.trim(html);
        setTimeout(function () {
            if (!result) return;
            $("#dashboard-display-content")
                .hide()
                .html(result)
                .fadeIn(300, function () {
                    loadEventCharges_header(BookingNum);
                });
        }, 300);
    }).fail(function () {
        skeletonCharges();
    });

}




/*Function show modal charges(Single)*/
function viewSelectedCharges(Slip_RefNo){
    $.post("dirs/dashboard/actions/get_selectedcharges.php",{
        Slip_RefNo : Slip_RefNo
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#mdl-view-charges").modal('show');
            $("#r_slipnomber").val(response.Data.Slip_RefNo);
            $("#r_eventname").text(response.Data.EventName);
            $("#r_guest").text(response.Data.Guest);
            $("#r_chargetype").text(response.Data.ChargeType);
            $("#r_incidate").text(response.Data.IncidentDate);
            $("#r_quantity").text(response.Data.Quantity);
            $("#r_description").text(response.Data.Inci_Description);
            $("#r_unicost").text(response.Data.UnitCost);
            $("#r_amont").text(response.Data.ChargeAmount);
            $("#submitby").text(response.Data.SubmmitedBy);
            $("#werkposition").text(response.Data.WorkPosition);
            if(response.Data.Proof && response.Data.Proof !== ""){

                $("#r_evidence_proof_preview")
                    .attr(
                        "src",
                        "../" + response.Data.Proof
                    )
                    .removeClass("d-none");


                $("#evidence-empty")
                    .addClass("d-none");


            }else{

                $("#r_evidence_proof_preview")
                    .attr("src","")
                    .addClass("d-none");


                $("#evidence-empty")
                    .removeClass("d-none");

            }
        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}


// Function to reject the charge with remakrs modal
function mldReject() {
    $("#mdl-reject-charges").modal('show');
    $("#mdl-view-charges").modal('hide');

}






// ================================
// Fetch Event Header Data
// ================================
function loadEventCharges_header(BookingNum) {
    $.post("dirs/dashboard/actions/get_eventcharges_header.php", {
        BookingNum: BookingNum
    }, function(data) {
        let response = JSON.parse(data);
        if ($.trim(response.isSuccess) == "success") {
            $("#event-titles").text(response.Data.EventTitle);
            $("#gfunction").text(response.Data.FunctionRoom);
            let eventDate = formatEventDate(
                response.Data.EventStartDate,
                response.Data.EventEndDate
            );
            $("#eventdate").text(eventDate);
            $("#personincharge").text(response.Data.GuestName);
            $("#documentnumber").text(response.Data.DocumentNumber);
            $("#docs_numberesad").val(response.Data.DocumentNumber);
            $("#guestcompany").text(response.Data.GuestCompany);
        loadEvent_Charges();
            
        } else {
            console.log(response.Data);

        }

    });
}


/*Function to format date*/
function formatEventDate(startDate, endDate) {
    if (!startDate || !endDate) {
        return "";
    }
    let start = new Date(startDate);
    let end = new Date(endDate);
    let options = {
        month: "short",
        day: "numeric",
        year: "numeric"
    };
    let startFormatted = start.toLocaleDateString("en-US", options);
    let endFormatted = end.toLocaleDateString("en-US", options);
    // Same date
    if (startDate === endDate || start.getTime() === end.getTime()) {
        return startFormatted;
    }
    // Different dates
    let startMonth = start.toLocaleDateString("en-US", { month: "short" });
    let endMonth = end.toLocaleDateString("en-US", { month: "short" });

    // Same month
    if (start.getMonth() === end.getMonth() &&
        start.getFullYear() === end.getFullYear()) {

        return `${startMonth} ${start.getDate()} - ${end.getDate()}, ${end.getFullYear()}`;
    }
    // Different month/year
    return `${startFormatted} - ${endFormatted}`;
}











/*Function dipslay proposal for approval*/
 var CurrentPage = 1;
 var PageSize = 20;
 var totalPages = 1;
 var isPackageMode = false;
 var selectedItems = [];

 var ApprovalFirstLoad = true;

 function loadApproval(page = 1) {
     CurrentPage = page; 
     var srvdisplay = $("#load_EventApprovalList");
     srvdisplay.html(`
        <div class="justify-content-center d-flex py-5">
             <p>Loading....</p>
        </div>
     `);
     var Search = $("#search-approvals").val();
     $.post("dirs/dashboard/actions/get_forapproval_list.php", {
         CurrentPage,
         PageSize,
         Search
     }, function (data) {
         let response;

         try {
             response = JSON.parse(data);
         } catch (e) {
             srvdisplay.html(`
               <div class="d-flex justify-content-center py-5">
                   <div class="text-center">
                       <div class="mb-3">
                           <i class="bi bi-wifi-off fs-1 text-secondary"></i>
                       </div>
                       <h6 class="fw-semibold text-dark mb-1">
                           No Internet Connection
                       </h6>
                       <p class="text-muted small mb-0">
                           Please check your network settings and try again.
                       </p>
                   </div>
               </div>
             `);
             return;
         }
         if ($.trim(response.isSuccess) === "success") {
             ApprovalContent(response.Data);
             totalPages = (response.Data && response.Data.length > 0)
                 ? parseInt(response.Data[0].TotalPages)
                 : 1;

                 ApprovalPaginationUi();
                 ApprovalpageNumber();

                 if(ApprovalFirstLoad){

                        ApprovalFadeIn();

                        ApprovalFirstLoad = false;

                    }

         } else {
             emptyStateApproval("No Record Found.");
         }
     });
 }

 function ApprovalFadeIn(){

     $("#load_EventApprovalList")
         .hide()
         .fadeIn(500);

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
             <div class="approval-enter d-flex align-items-center gap-3 bg-white p-3 rounded-3 border shadow-xs">
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
 function showEmptyStateApproval(message = "No pending documents found") {
     $("#load_EventApprovalList").html(`
         <div class="d-flex align-items-center  bg-white p-3 rounded-3">
             <div class="text-center bg-white p-4 rounded-3 w-100" style="max-width: 600px;">
                 <div class="fw-semibold text-dark mb-1">
                     ${message}
                 </div>
                 <div class="text-muted small">
                     Loading for new documents...
                 </div>
             </div>
         </div>
     `);
 }

 /*Function for no record of beverages*/
 function showEmptyStateApproval(message = "No pending documents found") {
     $("#load_EventApprovalList").html(`
         <div class="d-flex align-items-center bg-white p-3 rounded-3">
             <div class="text-center bg-white p-4 rounded-3 w-100" style="max-width: 600px;">
                 <div class="fw-semibold text-dark mb-1">
                     ${message}
                 </div>
                 <div class="text-muted small">
                     No record found.
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


/*Comma formater for number amount*/
 $(document).on("input", ".with-comma", function () {
     var valuenum = $(this).val();
     valuenum = valuenum.replace(/[^\d.]/g, '');
     let parts = valuenum.split('.');
     if (parts.length > 2) {
         valuenum = parts[0] + '.' + parts.slice(1).join('');
     }
     if (valuenum !== '') {
         let decimal = '';
         if (valuenum.includes('.')) {
             let split = valuenum.split('.');
             valuenum = split[0];
             decimal = '.' + split[1];
         }
         valuenum = Number(valuenum || 0).toLocaleString('en-US') + decimal;
     }
     $(this).val(valuenum);
 });




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