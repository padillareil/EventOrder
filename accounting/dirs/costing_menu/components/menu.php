<div class="container-fluid">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Header Actions Block -->
        <div class="card-body bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <h5 class="fw-bold text-dark mb-1">Menu</h5>
                    <p class="text-muted small mb-0">Browse available dishes, pricing, and menu categories.</p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-3 ms-md-auto">
                    <!-- Search Input Wrapper -->
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-menu" placeholder="Search...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Master Data Grid Layout -->
        <div class="card-body  bg-secondary-subtle">
            <div class="mb-3 justify-content-end d-flex">
                <nav aria-label="Event order directory page navigation">
                    <ul class="pagination pagination-sm mb-0 gap-1" id="pagination-menu">
                        <li class="page-item" id="li-prev-menu">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-preview-menu">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item" id="li-next-menu">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-next-menu">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="justify-content-end d-flex">
                <div id="page-info-menu" class="mt-1 small text-muted"></div>
            </div>
            
            <!-- Table Container Viewport -->
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 55vh;">
                <table class="table table-bordered table-hover align-middle mb-0" style="font-size: 13px;">
                    <thead class="sticky-top bg-white border-bottom align-middle text-secondary text-uppercase" style="z-index: 5; height: 52px;">
                        <tr>
                            <th class="ps-4 fw-bold" style="width: 120px;">#</th>
                            <th class="fw-bold">Menu</th>
                            <th class="fw-bold" style="width: 200px;">Category</th>
                            <th class="fw-bold" style="width: 200px;">Sub-Category</th>
                            <th class="fw-bold" style="width: 200px;">SRP</th>
                            <th class="fw-bold text-center" style="width: 300px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="load_eventmenus">
                    	
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<script>

    var CurrentPageMenu = 1;
    var PageSizeMenu = 10;
    var totalPagesMenu = 1;


    function loadMenus(page = 1) {
        CurrentPageMenu = page; 
        var display = $("#load_eventmenus");
        display.html(`
                <tr>
                    <td colspan="5" class="p-5 text-center text-muted">
                        <div class="spinner-border text-dark"></div>
                        <div class="mt-2">Loading...</div>
                    </td>
                </tr>
        `);
        var SearchMenu = $("#search-menu").val();
        $.post("dirs/costing_menu/actions/get_menurecipe_list.php", {
            CurrentPageMenu,
            PageSizeMenu,
            SearchMenu
        }, function (data) {
            let response;

            try {
                response = JSON.parse(data);
            } catch (e) {
                display.html(`<div class="text-dark text-center py-4">Server Error</div>`);
                return;
            }
            if ($.trim(response.isSuccess) === "success") {
                MenuListContent(response.Data);
                totalPagesMenu = (response.Data && response.Data.length > 0)
                    ? parseInt(response.Data[0].TotalPages)
                    : 1;

                    MenuPageNumber();
                    MenuPaginationUi();
            } else {
                emptyStateMenu("Quotation List was empty.");
            }
        });
    }


    function MenuListContent(data) {
        const display = $("#load_eventmenus");
        if (!data || data.length === 0) {
            showEmptyStateMenu("No available.");
            return;
        }
        display.empty();

        data.forEach(srv => {
            display.append(`
                <tr data-DocEntry="${srv.DocEntry}">

                    <td class="ps-4 font-monospace fw-semibold text-dark">
                        ${srv.OrderNumber || '--'}
                    </td>

                    <td class="fw-bold text-dark">

                        <div>${srv.Menu || '--'}</div>

                        <div class="text-muted fw-normal">
                            ${srv.Description || '--'}
                        </div>

                    </td>

                    <td class="text-dark fw-medium">
                        ${srv.Category || '--'}
                    </td>
                    <td class="text-dark fw-medium">
                        ${srv.Sub_Category || '--'}
                    </td>

                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light">
                                PHP
                            </span>
                            <input type="text" class="form-control with-comma unit-cost text-end" value="${srv.MenuCost || 0}" disabled>
                        </div>
                    </td>
                    <td class="text-center pe-4">

                        <a href="#" class="btn btn-link text-sm" title="Edit SRP">Update SRP</a>
                        <a href="#" class="btn btn-link text-sm text-danger" title="Delete Menu"> Delete</a>
                        <a href="#" class="btn btn-link text-sm" title="Modify Menu" onclick="modifyMenu('${srv.DocEntry}')"> Modify</a>

                    </td>

                </tr>
            `);
        });
    }


    
    /*Function for no record of beverages*/
    function emptyStateMenu(message) {
        $("#load_eventmenus").html(`
            <li class="d-flex flex-column justify-content-center align-items-center bg-white border rounded-3 p-5 mb-3 shadow-sm text-center">
                <i class="bi bi-card-list fs-1 text-muted mb-3"></i>
                <div class="fs-5 text-dark">No Quotation Available</div>
                <div class="small text-muted mt-1">${message}</div>
            </li>
        `);
    }

    /*Function for no record of beverages*/
    function showEmptyStateMenu(message) {
        $("#load_eventmenus").html(`
            <li class="d-flex flex-column justify-content-center align-items-center bg-white border rounded-3 p-5 mb-3 shadow-sm text-center">
                <i class="bi bi-search fs-1 text-muted mb-3"></i>
                <div class="fs-5 text-dark">No Record Found</div>
                <div class="small text-muted mt-1">${message}</div>

            </li>
        `);
    }


    /*Function to count page number page 1 of and so on*/
    function MenuPaginationUi() {
        $("#page-info-menu").text("Page " + CurrentPageMenu + " of " + totalPagesMenu);
        if (CurrentPageMenu <= 1) {
            $("#li-prev-menu").addClass("disabled");
        } else {
            $("#li-prev-menu").removeClass("disabled");
        }

        if (CurrentPageMenu >= totalPagesMenu) {
            $("#li-next-menu").addClass("disabled");
        } else {
            $("#li-next-menu").removeClass("disabled");
        }
    }


    /*Function to build list of pagination*/
    function MenuPageNumber() {
        $("#pagination-menu li.page-number-menu").remove();
        let prevLi = $("#li-prev-menu");
        let maxVisible = 5;
        let start = Math.max(1, CurrentPageMenu - 2);
        let end = Math.min(totalPagesMenu, start + maxVisible - 1);
        if (end - start < maxVisible - 1) {
            start = Math.max(1, end - maxVisible + 1);
        }
        if (start > 1) {
            insertPageMenu(1, prevLi);
            prevLi = prevLi.next();

            if (start > 2) {
                prevLi.after(`<li class="page-item page-number-menu disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPageMenu(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPagesMenu) {
            if (end < totalPagesMenu - 1) {
                prevLi.after(`<li class="page-item page-number-menu disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPageMenu(totalPagesMenu, prevLi);
        }
        function insertPageMenu(i, ref) {
            let activeClass = (i === CurrentPageMenu) ? "active" : "";

            let li = `
                <li class="page-item page-number-menu ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }

    /*inclusionlist*/
    $("#search-menu").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadMenus();
        }
    });

      /* Pagination + Fetch Blocked Accounts */
      $("#btn-preview-menu").on("click", function(e) {
          e.preventDefault();

          if (CurrentPageMenu > 1) {
              loadMenus(CurrentPageMenu - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-menu").on("click", function(e) {
          e.preventDefault();

          if (CurrentPageMenu < totalPagesMenu) {
              loadMenus(CurrentPageMenu + 1);
          }
      });

      $(document).on("click", "#pagination-menu .page-link", function(e) {
          e.preventDefault();
          var page = $(this).data("page");
          if (page && page !== CurrentPageMenu) {
              loadMenus(page);
          }
      });



</script>