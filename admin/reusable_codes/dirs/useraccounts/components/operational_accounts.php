.<div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-3">
    <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-md-6 d-flex align-items-center gap-3">
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-md-end">
                <div class="input-group border mr-2 bg-light px-3 flex-grow-1" style="max-width: 300px;">
                    <span class="input-group-text bg-transparent border-0 p-0 me-2">
                        <i class="bi bi-search text-muted small"></i>
                    </span>
                    <input type="search" class="form-control bg-transparent border-0 small py-2 shadow-none" id="search-activeuser" placeholder="Search...">
                </div>
                <button class="btn btn-link text-decoration-none text-secondary" type="button" onclick="addAccount()" title="Create New Account">
                    <i class="bi bi-ui-checks-grid text-lg"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive overflow-auto" style="height: 50vh;">
            <table class="table table-hover align-middle mb-0">
                <thead class="sticky-top bg-white border-bottom" style="z-index: 5;">
                    <tr>
                        <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted" style="width: 80px;">#</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Username</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">System Role</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Fullname</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Position</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Status</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="border-top-0" id="load_ActiveUsers_content">
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <nav>
            <ul class="pagination" id="pagination-activeuser">
                <li class="page-item" id="li-prev-activeuser">
                    <a class="page-link" href="#" id="btn-preview-activeuser">Previous</a>
                </li>
                <li class="page-item" id="li-next-activeuser">
                    <a class="page-link" href="#" id="btn-next-activeuser">Next</a>
                </li>
            </ul>
        </nav>
        <div id="page-info-activeuser" class="mt-3 small text-muted"></div>
    </div>
</div>

<script>
    var CurrentPage = 1;
    var PageSize = 10;
    var totalPages = 1;
    var isPackageMode = false;
    var selectedItems = [];


    function loadActiveUsers(page = 1) {
        CurrentPage = page; 
        var display = $("#load_ActiveUsers_content");
        display.html(`
                <tr>
                    <td colspan="7" class="p-5 text-center text-muted">
                        <div class="spinner-border text-dark"></div>
                        <div class="mt-2">Loading...</div>
                    </td>
                </tr>
        `);
        var Search = $("#search-activeuser").val();
        $.post("dirs/useraccounts/actions/get_pagination_active.php", {
            CurrentPage,
            PageSize,
            Search
        }, function (data) {
            let response;

            try {
                response = JSON.parse(data);
            } catch (e) {
                display.html(`<div class="text-dark text-center py-4">Server Error</div>`);
                return;
            }
            if ($.trim(response.isSuccess) === "success") {
                AccountsContent(response.Data);
                totalPages = (response.Data && response.Data.length > 0)
                    ? parseInt(response.Data[0].TotalPages)
                    : 1;

                    AccountsPaginationUi();
                    AccountsPageNumber();
            } else {
                emptyStateAccounts("venue package was empty.");
            }
        });
    }


    function AccountsContent(data) {
        const display = $("#load_ActiveUsers_content");
        if (!data || data.length === 0) {
            showEmptyStateAccounts("No available.");
            return;
        }
        display.empty();

        data.forEach(acc => {
            display.append(`
               <tr class="beverage-row align-middle" data-value="${acc.Uid}">
                   <td class="text-muted fw-medium small">
                       ${acc.OrderNumber}
                   </td>

                   <td class="fw-semibold text-muted small">
                       ${acc.Username || '—'}
                   </td>

                    <td class="fw-semibold text-muted small">
                        ${acc.Role || '—'}
                    </td>
                    <td class="fw-semibold text-muted small">
                        ${acc.Fullname || '—'}
                    </td>
                    <td class="fw-semibold text-muted small">
                        ${acc.Position || '—'}
                    </td>
                  
                    <td class="text-center">
                        <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer
                            ${acc.AccStatus === "Active" ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}"
                            data-id="${acc.Uid}"
                            data-status="${acc.AccStatus}">
                            ${acc.AccStatus}
                        </span>
                    </td>

                   <td class="text-center">
                        <button class="btn btn-sm bi bi-gear" type="button" onclick="accountSettings(${acc.Uid})">
                        </button>
                   </td>
               </tr>
            `);
        });
    }




    /*Function for no record of beverages*/
    function emptyStateAccounts(message) {
        $("#load_ActiveUsers_content").html(`
            <tr>
              <td colspan="7" class="p-5 text-center text-muted">
                  <i class="bi bi-card-list text-lg"></i> 
                  <br>
                      No Accounts Available!
            <div class="small opacity-75">${message}</div>
                  </td>
            </tr>
        `);
    }

    /*Function for no record of beverages*/
    function showEmptyStateAccounts(message) {
        $("#load_ActiveUsers_content").html(`
            <tr>
              <td colspan="7" class="p-5 text-center text-muted">
                  <i class="bi bi-card-list text-lg"></i> 
                  <br>
                      No Record Found!
            <div class="small opacity-75">${message}</div>
                  </td>
            </tr>
        `);
    }


    /*Function to count page number page 1 of and so on*/
    function AccountsPaginationUi() {
        $("#page-info-activeuser").text("Page " + CurrentPage + " of " + totalPages);
        if (CurrentPage <= 1) {
            $("#li-prev-activeuser").addClass("disabled");
        } else {
            $("#li-prev-activeuser").removeClass("disabled");
        }

        if (CurrentPage >= totalPages) {
            $("#li-next-activeuser").addClass("disabled");
        } else {
            $("#li-next-activeuser").removeClass("disabled");
        }
    }

    /*Function to build list of pagination*/
    function AccountsPageNumber() {
        $("#pagination-activeuser li.page-number-activeuser").remove();
        let prevLi = $("#li-prev-activeuser");
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
                prevLi.after(`<li class="page-item page-number-activeuser disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPageBreakfast(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-activeuser disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPageBreakfast(totalPages, prevLi);
        }
        function insertPageBreakfast(i, ref) {
            let activeClass = (i === CurrentPage) ? "active" : "";

            let li = `
                <li class="page-item page-number-activeuser ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }

    /*search-activeuser*/
    $("#search-activeuser").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadActiveUsers();
        }
    });

      /* Pagination + Fetch Blocked Accounts */
      $("#btn-preview-activeuser").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadActiveUsers(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-activeuser").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadActiveUsers(CurrentPage + 1);
          }
      });
</script>