<div class="card border-0 shadow-sm rounded-4 bg-white" >
    <div class="card-body bg-light-subtle" >
        <div class="mb-1 justify-content-end d-flex">
            <button type="button" class="btn btn-primary shadow px-4 py-2 rounded-3 fw-medium" onclick="applyChargeSlip()">
                Apply Charges
            </button>
        </div>
        <div class="border rounded-3 bg-white shadow-sm w-100 mb-2">
            <input type="search" class="form-control form-control-lg bg-transparent border-0 shadow-none " id="search-eventcharges" placeholder="Search...">
        </div>
        <div class="mb-1 justify-content-end d-flex">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm mb-0" id="pagination-eventcharges">
                    <li class="page-item" id="li-prev-eventcharges">
                        <a class="page-link shadow-none" href="#" id="btn-preview-eventcharges">
                            <i class="bi bi-chevron-left small"></i>
                        </a>
                    </li>
                    <li class="page-item" id="li-next-eventcharges">
                        <a class="page-link shadow-none" href="#" id="btn-next-eventcharges">
                            <i class="bi bi-chevron-right small"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="justify-content-end d-flex">
            <div id="page-info-eventcharges" class="mt-1 small text-muted"></div>
        </div>
            <div class="card card-body overflow-auto" style="height: 60vh;">
            <div class="d-flex flex-column gap-2" id="load_eventcharges" >
            </div>
        </div>
    </div>
</div>

<script>
    var CurrentPage = 1;
    var PageSize = 20;
    var totalPages = 1;
    var isPackageMode = false;
    var selectedItems = [];


    function loadEventCharges(page = 1) {
        CurrentPage = page; 
        var srvdisplay = $("#load_eventcharges");
        srvdisplay.html(`
            <div class="justify-content-center d-flex py-5">
                 <p>Loading....</p>
            </div>
        `);
        var Search = $("#search-eventcharges").val();
        $.post("dirs/dashboard/actions/get_eventcharges.php", {
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
                ECContent(response.Data);
                totalPages = (response.Data && response.Data.length > 0)
                    ? parseInt(response.Data[0].TotalPages)
                    : 1;

                    ECPaginationUi();
                    ECpageNumber();
            } else {
                emptyStateEC("No Record Found.");
            }
        });
    }


/*Function to identify if this event has its remaining charges*/
    function getChargeStatusIcon(active) {
        if (parseInt(active || 0) === 0) {
            return `
                <i class="bi bi-check-circle text-success fs-3"
                   title="No Active Charges"></i>
            `;
        }
        return `
            <i class="bi bi-clock-history text-primary fs-3"
               title="Active Charges"></i>
        `;
    }


    /*Function to identify if this event has its remaining charges using icons*/
    function getChargeBadges(active, closed) {
        return `
            <div class="d-flex gap-2">
                <span class="badge text-danger ">
                    ${active || 0} </span> Active

                <span class="badge text-success ">
                     ${closed || 0} </span> Closed
            </div>
        `;

    }

    /*Function Date setter automatic*/
    function getEventDate(startDate, endDate) {
        if (!startDate && !endDate) {
            return '--';
        }
        if (startDate === endDate) {
            return `
                <i class="bi bi-calendar-event me-1"></i>
                ${startDate}
            `;

        }
        return `
            <i class="bi bi-calendar-range me-1"></i>
            ${startDate} 
            <span class="mx-1">to</span> 
            ${endDate}
        `;
    }


    function ECContent(data) {
        var srvdisplay = $("#load_eventcharges");

        if (!data || data.length === 0) {
            showEmptyStateEC("No available.");
            return;
        }
        srvdisplay.empty();
        data.forEach(charges => {
            srvdisplay.append(`
                <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border shadow-sm">
                    <div class="text-center" style="min-width:60px;">
                        ${getChargeStatusIcon(charges.ActiveCharges)}
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="fw-semibold text-dark">
                                ${charges.EventTitle || '--'}
                            </span>
                        </div>
                        <div class="small text-muted">
                            ${getEventDate(
                                charges.EventStartDate,
                                charges.EventEndDate
                            )}
                        </div>
                    </div>
                    <div class="text-end">
                        ${getChargeBadges(
                            charges.ActiveCharges,
                            charges.ClosedCharges
                        )}
                    </div>
                </div>
            `);

        });
    }

   




    /*Function for no record of beverages*/
    function showEmptyStateEC(message = "No event charges found") {
        $("#load_eventcharges").html(`
            <div class="d-flex align-items-center  bg-white p-3 rounded-3">
                <div class="text-center bg-white p-4 rounded-3 w-100" style="max-width: 600px;">
                    <div class="fw-semibold text-dark mb-1">
                        ${message}
                    </div>
                    <div class="text-muted small">
                        Loading for new charges...
                    </div>
                </div>
            </div>
        `);
    }

    /*Function for no record of beverages*/
    function showEmptyStateEC(message = "No event charges found") {
        $("#load_eventcharges").html(`
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
    function ECPaginationUi() {
        $("#page-info-eventcharges").text("Page " + CurrentPage + " of " + totalPages);
        if (CurrentPage <= 1) {
            $("#li-prev-eventcharges").addClass("disabled");
        } else {
            $("#li-prev-eventcharges").removeClass("disabled");
        }

        if (CurrentPage >= totalPages) {
            $("#li-next-eventcharges").addClass("disabled");
        } else {
            $("#li-next-eventcharges").removeClass("disabled");
        }
    }

    /*Function to build list of pagination*/
    function ECpageNumber() {
        $("#pagination-eventcharges li.page-number-eventcharges").remove();
        let prevLi = $("#li-prev-eventcharges");
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
                prevLi.after(`<li class="page-item page-number-eventcharges disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPageBreakfast(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-eventcharges disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPageBreakfast(totalPages, prevLi);
        }
        function insertPageBreakfast(i, ref) {
            let activeClass = (i === CurrentPage) ? "active" : "";

            let li = `
                <li class="page-item page-number-eventcharges ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }


    /*search-srv*/
    $("#search-eventcharges").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadEventCharges();
        }
    });

      /* Pagination + Fetch Blocked srvounts */
      $("#btn-preview-eventcharges").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadEventCharges(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-eventcharges").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadEventCharges(CurrentPage + 1);
          }
      });

      $(document).on("click", "#pagination-eventcharges .page-link[data-page]", function (e) {
          e.preventDefault();

          loadEventCharges($(this).data("page"));
      });


</script>