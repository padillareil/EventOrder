<div class="card border-0 shadow-sm rounded-4 bg-white" >
    <div class="card-body bg-light-subtle" >
        <div class="border rounded-3 bg-white shadow-sm w-100 mb-2">
            <input type="search" class="form-control form-control-lg bg-transparent border-0 shadow-none " id="search-notifications" placeholder="Search...">
        </div>
        <div class="mb-1 justify-content-end d-flex">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm mb-0" id="pagination-notifications">
                    <li class="page-item" id="li-prev-notifications">
                        <a class="page-link shadow-none" href="#" id="btn-preview-notifications">
                            <i class="bi bi-chevron-left small"></i>
                        </a>
                    </li>
                    <li class="page-item" id="li-next-notifications">
                        <a class="page-link shadow-none" href="#" id="btn-next-notifications">
                            <i class="bi bi-chevron-right small"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="justify-content-end d-flex">
            <div id="page-info-notifications" class="mt-1 small text-muted"></div>
        </div>
            <div class="card card-body overflow-auto" style="height: 60vh;">
            <div class="d-flex flex-column gap-2" id="load_notification_list" >
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


    function loadNotifications(page = 1) {
        CurrentPage = page; 
        var srvdisplay = $("#load_notification_list");
        srvdisplay.html(`
            <div class="justify-content-center d-flex py-5">
                 <p>Loading....</p>
            </div>
        `);
        var Search = $("#search-notifications").val();
        $.post("dirs/dashboard/actions/get_newdocuments.php", {
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
                NotifyContent(response.Data);
                totalPages = (response.Data && response.Data.length > 0)
                    ? parseInt(response.Data[0].TotalPages)
                    : 1;

                    NotifyPaginationUi();
                    NotifypageNumber();
            } else {
                emptyStateNotify("No Record Found.");
            }
        });
    }


    function NotifyContent(data) {
        const srvdisplay = $("#load_notification_list");
        if (!data || data.length === 0) {
            showEmptyStateNotify("No available.");
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
                                   onclick="reviewNewDocs(${srv.DocId})">
                               View
                           </button>
                       </div>
                   </div>
            `);
        });
    }




    /*Function for no record of beverages*/
    function showEmptyStateNotify(message = "No pending documents found") {
        $("#load_notification_list").html(`
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
    function showEmptyStateNotify(message = "No pending documents found") {
        $("#load_notification_list").html(`
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
    function NotifyPaginationUi() {
        $("#page-info-notifications").text("Page " + CurrentPage + " of " + totalPages);
        if (CurrentPage <= 1) {
            $("#li-prev-notifications").addClass("disabled");
        } else {
            $("#li-prev-notifications").removeClass("disabled");
        }

        if (CurrentPage >= totalPages) {
            $("#li-next-notifications").addClass("disabled");
        } else {
            $("#li-next-notifications").removeClass("disabled");
        }
    }

    /*Function to build list of pagination*/
    function NotifypageNumber() {
        $("#pagination-notifications li.page-number-notifications").remove();
        let prevLi = $("#li-prev-notifications");
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
                prevLi.after(`<li class="page-item page-number-notifications disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPageBreakfast(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-notifications disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPageBreakfast(totalPages, prevLi);
        }
        function insertPageBreakfast(i, ref) {
            let activeClass = (i === CurrentPage) ? "active" : "";

            let li = `
                <li class="page-item page-number-notifications ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }


    /*search-srv*/
    $("#search-notifications").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadNotifications();
        }
    });

      /* Pagination + Fetch Blocked srvounts */
      $("#btn-preview-notifications").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadNotifications(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-notifications").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadNotifications(CurrentPage + 1);
          }
      });

      $(document).on("click", "#pagination-notifications .page-link[data-page]", function (e) {
          e.preventDefault();

          loadNotifications($(this).data("page"));
      });


</script>