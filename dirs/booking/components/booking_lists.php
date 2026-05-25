<div class="container my-2">
    <div class="card border-0 shadow rounded-4 overflow-hidden">
        
        <!-- Header Actions Block with Advanced Tools -->
        <div class="card-body p-4 p-md-5 bg-white border-bottom">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">
                
                <!-- Title Block with Back Navigation -->
                <div class="d-flex align-items-start gap-3">
                    <button type="button" class="btn btn-light text-secondary border rounded-3 p-2 shadow-sm" onclick="loadBooking()" title="Go Back">
                        <i class="bi bi-arrow-left d-flex fs-5"></i>
                    </button>
                    <div>
                        <h5 class="fw-bold text-dark mb-1">List All Events</h5>
                        <p class="text-muted small mb-0">Track and manage event statuses across their entire lifecycle.</p>
                    </div>
                </div>

                <!-- Tools Panel: Search, Sort, Filter, Extra Actions -->
                <div class="d-flex flex-wrap align-items-center gap-2 ms-lg-auto w-100 w-lg-auto justify-content-start justify-content-lg-end">
                                    
                    <!-- Search Input Wrapper (Matches 38px Height) -->
                    <div class="input-group border rounded-3 bg-white px-2 shadow-sm flex-grow-1 flex-sm-grow-0" style="max-width: 240px; min-width: 180px; height: 38px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2 d-flex align-items-center">
                            <i class="bi bi-search text-muted" style="font-size: 0.85rem;"></i>
                        </span>
                        <input type="search" class="form-control form-control-sm bg-transparent border-0 shadow-none py-0 small h-100" id="search-events" placeholder="Search..." style="font-size: 13px;">
                    </div>

                    <!-- Sort by Date Select (Matches 38px Height) -->
                    <div class="position-relative flex-grow-1 flex-sm-grow-0" style="min-width: 160px; height: 38px;">
                        <!-- Icon placement layer -->
                        <i class="bi bi-calendar-event text-secondary position-absolute top-50 start-0 translate-middle-y ms-3" style="z-index: 4; pointer-events: none; font-size: 0.85rem;"></i>
                        
                        <select class="form-select form-select-sm bg-white text-secondary border rounded-3 shadow-sm small fw-medium w-100 h-100"
                                id="sortDateSelect"
                                style="padding-left: 2.25rem !important; padding-right: 2rem !important; font-size: 13px; cursor: pointer;">
                            <option value="latest" selected>Latest Booked</option>
                            <option value="oldest">Oldest Booked</option>
                            <option value="month">Booked this Month</option>
                        </select>
                    </div>

                    <!-- Status Filter Select (Matches 38px Height) -->
                    <div class="position-relative flex-grow-1 flex-sm-grow-0" style="min-width: 150px; height: 38px;">
                        <!-- Icon placement layer -->
                        <i class="bi bi-funnel text-secondary position-absolute top-50 start-0 translate-middle-y ms-3" style="z-index: 4; pointer-events: none; font-size: 0.85rem;"></i>
                        
                        <select class="form-select form-select-sm bg-white text-secondary border rounded-3 shadow-sm small fw-medium w-100 h-100" id="filterStateSelect" style="padding-left: 2.25rem !important; padding-right: 2rem !important; font-size: 13px; cursor: pointer;">
                            <option value="" selected>All</option>
                            <option value="Booked">Booked</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Event Ended">Event Ended</option>
                        </select>
                    </div>  

                    <!-- Extra Operational Utility Action Button (Matches 38px Height) -->
                    <button type="button" class="btn btn-light text-secondary border rounded-3 shadow-sm d-flex align-items-center justify-content-center" title="Refresh" onclick="loadBookingList()" style="height: 38px; width: 38px; padding: 0;">
                        <i class="bi bi-arrow-clockwise fs-6"></i>
                    </button>

                </div>
            </div>
        </div>

        <!-- Master Data Grid Layout -->
        <div class="card-body p-md-5 bg-light-subtle">
            
            <!-- Pagination Alignment Row -->
            <div class="mb-2">
                <nav aria-label="Event order directory page navigation">
                    <ul class="pagination pagination-sm mb-0 gap-1" id="pagination-event-order">
                        <li class="page-item" id="li-prev-order">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-preview-order">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item" id="li-next-order">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-next-order">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                    <div id="page-info-events" class="mt-3 small text-muted"></div>
                </nav>
            </div>
            
            <!-- Table Container Viewport -->
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 55vh;">
                <table class="table table-borderless table-hover align-middle mb-0" style="font-size: 13px;">
                    <thead class="sticky-top bg-white border-bottom align-middle text-secondary font-monospace text-uppercase" style="z-index: 5; height: 52px;">
                        <tr>
                            <th class="fw-bold">Tentative Date</th>
                            <th class="fw-bold">Event Title</th>
                            <th class="fw-bold">Status</th>
                            <th class="fw-bold">Created By</th>
                        </tr>
                    </thead>
                    <tbody id="load_EventOrderLists">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<script>
    var CurrentPage = 1;
    var PageSize = 10;
    var totalPages = 1;
    var isPackageMode = false;
    var selectedItems = [];


    function loadEvents(page = 1) {

        CurrentPage = page;

        var display = $("#load_EventOrderLists");

        display.html(`
            <tr>
                <td colspan="4" class="p-5 text-center text-muted">
                    <div class="spinner-border text-dark"></div>
                    <div class="mt-2">Loading...</div>
                </td>
            </tr>
        `);

        var Search = $("#search-events").val();
        var Sort = $("#sortDateSelect").val();
        var FilterStatus = $("#filterStateSelect").val();

        $.post("dirs/booking/actions/get_eventlist.php", {
            CurrentPage,
            PageSize,
            Search,
            Sort,
            FilterStatus
        }, function (data) {

            let response;

            try {
                response = JSON.parse(data);
            } catch (e) {
                display.html(`
                    <tr>
                        <td colspan="4" class="text-center text-danger p-4">
                            Server Error
                        </td>
                    </tr>
                `);
                return;
            }

            /* SUCCESS */
            if ($.trim(response.isSuccess) === "success") {

                if (response.Data && response.Data.length > 0) {

                    EventsContent(response.Data);

                    totalPages = parseInt(response.Data[0].TotalPages || 1);

                    EventsPaginationUi();
                    EventsPageNumber();

                } else {

                    emptyStateEVents("Try adjusting your filters.");

                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "warning",
                        title: "No Record Found.",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                    });
                }

            }

            /* FAILED FROM SERVER */
            else {

                emptyStateEVents("System failed to fetch data.");

                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "error",
                    title: "Server Error",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });
            }
        });
    }


    function EventsContent(data) {

        const display = $("#load_EventOrderLists");

        if (!data || data.length === 0) {
            showEmptyStateAmentieis("No available.");
            return;
        }

        display.empty();

        data.forEach(ev => {
            let badgeClass = "bg-secondary-subtle text-secondary border border-secondary-subtle";

            switch (ev.StatusBooking) {
            case "Booked":
                    badgeClass = "bg-info-subtle text-info border border-info-subtle";
                    break;

                case "Confirmed":
                    badgeClass = "bg-success-subtle text-success border border-success-subtle";
                    break;

                case "Ongoing":
                    badgeClass = "bg-primary-subtle text-primary border border-primary-subtle";
                    break;

                case "Event Ended":
                    badgeClass = "bg-danger-subtle text-danger border border-danger-subtle";
                    break;

                default:
                    badgeClass = "bg-secondary-subtle text-secondary border border-secondary-subtle";
                    break;
            }

            display.append(`
                <tr style="cursor: pointer;">
                    <td>
                        <div class="text-dark fw-medium">
                            ${ev.EventDateRange}
                        </div>
                    </td>
                    <td>
                        <div class="fw-bold text-dark">
                            ${ev.EventTitle || '—'}
                        </div>

                        <div class="text-muted small" style="font-size: 0.75rem;">
                            ${ev.GuestCompany || '—'}
                        </div>
                    </td>
                    <td>
                        <span class="badge ${badgeClass} rounded-pill fw-semibold">
                            ${ev.StatusBooking || '—'}
                        </span>
                    </td>
                    <td>
                        <p>${ev.PreparedBy || '—'}</p>
                    </td>
                </tr>
            `);
        });
    }



    /*Function for no record of beverages*/
    function emptyStateEVents(message) {
        $("#load_EventOrderLists").html(`
            <tr>
              <td colspan="4" class="p-5 text-center text-muted">
                  <i class="bi bi-card-list text-lg"></i> 
                  <br>
                      No Record Found!
            <div class="small opacity-75">${message}</div>
                  </td>
            </tr>
        `);
    }

    /*Function for no record of beverages*/
    function showEmptyStateAmentieis(message) {
        $("#load_EventOrderLists").html(`
            <tr>
              <td colspan="4" class="p-5 text-center text-muted">
                  <i class="bi bi-card-list text-lg"></i> 
                  <br>
                      No Record Found!
            <div class="small opacity-75">${message}</div>
                  </td>
            </tr>
        `);
    }


    /*Function to count page number page 1 of and so on*/
    function EventsPaginationUi() {
        $("#page-info-events").text("Page " + CurrentPage + " of " + totalPages);
        if (CurrentPage <= 1) {
            $("#li-prev-order").addClass("disabled");
        } else {
            $("#li-prev-order").removeClass("disabled");
        }

        if (CurrentPage >= totalPages) {
            $("#li-next-order").addClass("disabled");
        } else {
            $("#li-next-order").removeClass("disabled");
        }
    }

    /*Function to build list of pagination*/
    function EventsPageNumber() {
        $("#pagination-event-order li.page-number-events").remove();
        let prevLi = $("#li-prev-order");
        let maxVisible = 5;
        let start = Math.max(1, CurrentPage - 2);
        let end = Math.min(totalPages, start + maxVisible - 1);
        if (end - start < maxVisible - 1) {
            start = Math.max(1, end - maxVisible + 1);
        }
        if (start > 1) {
            insertPage(1, prevLi);
            prevLi = prevLi.next();

            if (start > 2) {
                prevLi.after(`<li class="page-item page-number-events disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPage(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-events disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPage(totalPages, prevLi);
        }
        function insertPage(i, ref) {
            let activeClass = (i === CurrentPage) ? "active" : "";

            let li = `
                <li class="page-item page-number-events ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }

    /*search-events*/
    $("#search-events").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadEvents();
        }
    });

      /* Pagination + Fetch Blocked Accounts */
      $("#btn-preview-order").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadEvents(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-order").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadEvents(CurrentPage + 1);
          }
      });



      /*search-filter select*/
      $("#sortDateSelect").on("change", function () {
          loadEvents();
      });

      $("#filterStateSelect").on("change", function () {
          loadEvents();
      });

      $(document).on("click", "#pagination-event-order .page-link[data-page]", function (e) {
          e.preventDefault();
          loadEvents($(this).data("page"));
      });
</script>