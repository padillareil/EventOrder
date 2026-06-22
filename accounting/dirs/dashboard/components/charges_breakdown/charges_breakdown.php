<div class="container">
    <div class="card card-body mb-2 shadow-sm border-0">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 rounded-2">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="btn btn-light btn-sm rounded-circle d-flex align-items-center justify-content-center border shadow-sm" style="width:36px;height:36px;" title="Back to customer list" onclick="viewAllCharges()">

                    <i class="bi bi-arrow-left text-secondary fs-5"></i>
                </button>
                <div>
                    <h6 class="fw-bold text-dark mb-1" id="event-titles">
                    </h6>
                    <div class="d-flex flex-wrap gap-3 small text-muted">
                        <span>
                            Document No:
                            <strong class="text-dark" id="documentnumber"></strong>
                        </span>
                    </div>
                </div>
            </div>
            <input type="hidden" id="docs_numberesad">
            <div class="d-flex flex-wrap justify-content-md-end gap-2">
                <button type="button" class="btn btn-secondary shadow rounded-3 px-3" onclick="printCharges()">
                    <i class="bi bi-printer me-2"></i>
                    Print Charges
                </button>
            </div>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-12 col-lg-12">
            <div class="card border-0 shadow-sm rounded-2 bg-white p-4">
                <div class="row g-3 border-bottom pb-4 mb-4">
                    <div class="col-12 col-sm-12">
                        <small class="text-uppercase tracking-wider text-muted fs-7 d-block mb-1" id="eventdetails">
                        </small>
                        <div class="fw-bold text-dark mb-1" id="guestcompany">
                        </div>
                        <div class="text-muted small" id="gfunction">
                        </div>

                        <div class="text-muted small">
                            Event Date: 
                            <span class="fw-semibold text-dark" id="eventdate">
                            </span>
                        </div>

                        <div class="text-muted small">
                            Person In Charge:
                            <span class="fw-semibold text-dark" id="personincharge">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <h6 class="fw-bold text-dark mb-3">Event Damages & Charges</h6>
                    <div class="justify-content-end d-flex mb-2 mt-2">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm mb-0 gap-1" id="pagination-chargelist">
                                <li class="page-item" id="li-prev-chargelist">
                                    <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-preview-chargelist">
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item" id="li-next-chargelist">
                                    <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-next-chargelist">
                                        <i class="bi bi-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>



                    <div class="table-responsive border overflow-auto" style="height:50vh;">
                        <table class="table table-bordered table-sm table-hover align-middle mb-0" style="font-size:13px;">
                            <thead class="table-secondary">
                                <tr>
                                    <th class="text-nowrap">
                                        <i class="bi bi-clock"></i>
                                    </th>
                                    <th class="text-nowrap">Charge Slip No.</th>
                                    <th>Description</th>
                                    <th class="text-end text-nowrap">Settlement</th>
                                    <th class="text-end text-nowrap">Status</th>
                                </tr>
                            </thead>
                            <tbody id="eventdamge_charges">
                                
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>


<script>

function printCharges() {
    
}

    function cleanDecimal(value) {
        let num = parseFloat(value || 0);

        if (Number.isNaN(num)) {
            return "0";
        }

        return Number.isInteger(num)
            ? num.toLocaleString()
            : num.toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
    }


    var CurrentPage = 1;
    var PageSize = 20;
    var totalPages = 1;
    var isPackageMode = false;
    var selectedItems = [];


    function loadEvent_Charges(page = 1) {
        var DocNum = $("#docs_numberesad").val();
        CurrentPage = page; 
        var srvdisplay = $("#eventdamge_charges");
        srvdisplay.html(`
            <td colspan="5">
                <p>Loading....</p>
            </td>
        `);
        $.post("dirs/dashboard/actions/get_chargelist_list.php", {
            CurrentPage,
            PageSize,
            DocNum
        }, function (data) {
            let response;

            try {
                response = JSON.parse(data);
            } catch (e) {
                srvdisplay.html(`
                    <tr>
                        <td colspan="5" class="text-center py-5">

                            <div class="mb-3">
                                <i class="bi bi-wifi-off fs-1 text-secondary"></i>
                            </div>

                            <h6 class="fw-semibold text-dark mb-1">
                                No Internet Connection
                            </h6>

                            <p class="text-muted small mb-0">
                                Please check your network settings and try again.
                            </p>

                        </td>
                    </tr>
                `);
                return;
            }
            if ($.trim(response.isSuccess) === "success") {
                CharlistContent(response.Data);
                totalPages = (response.Data && response.Data.length > 0)
                    ? parseInt(response.Data[0].TotalPages)
                    : 1;

                    CharlistPaginationUi();
                    CharlistpageNumber();
            } else {
                showEmptyStateCharlist("No Record Found.");
            }
        });
    }



    /*Function to identify if this event has its remaining charges using icons*/
    function getCharlistBadges(active, closed) {
        return `
            <div class="d-flex gap-2">
                <span class="badge text-danger ">
                    ${active || 0} </span> Active

                <span class="badge text-success ">
                     ${closed || 0} </span> Closed
            </div>
        `;

    }

    /*Function to set charges entry status*/
    function getStatusClass(status) {
        switch (status) {
            case "Approved":
                return "text-success";
            case "Rejected":
                return "text-danger";
            default:
                return "text-primary";
        }
    }

    function CharlistContent(data) {

        var srvdisplay = $("#eventdamge_charges");


        if (!data || data.length === 0) {
            showEmptyStateCharlist("No available.");
            return;
        }


        srvdisplay.empty();


        data.forEach(charges => {


            let statusClass = getStatusClass(charges.Status);


            srvdisplay.append(`

                <tr onclick="viewSelectedCharges('${charges.Slip_RefNo}')">
                    <td class="text-nowrap">
                        ${charges.IncidentTime || '--'}
                    </td>
                    <td>
                        <span class="fw-semibold text-dark">
                            ${charges.Slip_RefNo || '--'}
                        </span>
                    </td>
                    <td>
                        ${charges.Inci_Description || '--'}
                    </td>
                    <td class="text-end">
                        PHP ${cleanDecimal(charges.ChargeAmnt || '0')}
                    </td>
                    <td class="text-end fw-semibold ${statusClass}">
                        ${charges.Status || '--'}
                    </td>
                </tr>

            `);

        });
    }




    /*Function for no record of beverages*/
    function showEmptyStateCharlist(message = "No event charges found") {
        $("#eventdamge_charges").html(`
            <tr>
                <td colspan="5" class="text-center py-5">

                    <div class="fw-semibold text-dark mb-1">
                        ${message}
                    </div>

                    <div class="text-muted small">
                        Loading for new charges...
                    </div>

                </td>
            </tr>
        `);
    }

    /*Function for no record of beverages*/
    function showEmptyStateCharlist(message = "No event charges found") {
        $("#eventdamge_charges").html(`
            <tr>
                <td colspan="5" class="text-center py-5">

                    <div class="fw-semibold text-dark mb-1">
                        ${message}
                    </div>

                    <div class="text-muted small">
                        No record found.
                    </div>

                </td>
            </tr>
        `);
    }


    /*Function to count page number page 1 of and so on*/
    function CharlistPaginationUi() {
        $("#page-info-chargelist").text("Page " + CurrentPage + " of " + totalPages);
        if (CurrentPage <= 1) {
            $("#li-prev-chargelist").addClass("disabled");
        } else {
            $("#li-prev-chargelist").removeClass("disabled");
        }

        if (CurrentPage >= totalPages) {
            $("#li-next-chargelist").addClass("disabled");
        } else {
            $("#li-next-chargelist").removeClass("disabled");
        }
    }

    /*Function to build list of pagination*/
    function CharlistpageNumber() {
        $("#pagination-chargelist li.page-number-chargelist").remove();
        let prevLi = $("#li-prev-chargelist");
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
                prevLi.after(`<li class="page-item page-number-chargelist disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPageBreakfast(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-chargelist disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPageBreakfast(totalPages, prevLi);
        }
        function insertPageBreakfast(i, ref) {
            let activeClass = (i === CurrentPage) ? "active" : "";

            let li = `
                <li class="page-item page-number-chargelist ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }

      /* Pagination + Fetch Blocked srvounts */
      $("#btn-preview-chargelist").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadEvent_Charges(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-chargelist").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadEvent_Charges(CurrentPage + 1);
          }
      });

      $(document).on("click", "#pagination-chargelist .page-link[data-page]", function (e) {
          e.preventDefault();

          loadEvent_Charges($(this).data("page"));
      });


</script>