<!-- Header & Pagination Row -->
<div class="d-flex justify-content-between align-items-center mb-2">
    <div>
        <h6 class="fw-bold mb-0">Basic Function</h6>
        <p class="text-muted small mb-0">Basic tier function room setup.</p>
    </div>

    <!-- Top-Right Small Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-sm mb-0" id="pagination-basic">
            <li class="page-item" id="li-prev-basic">
                <a class="page-link shadow-none" href="#" id="btn-preview-basic">
                    <i class="bi bi-chevron-left small"></i>
                </a>
            </li>
            <li class="page-item" id="li-next-basic">
                <a class="page-link shadow-none" href="#" id="btn-next-basic">
                    <i class="bi bi-chevron-right small"></i>
                </a>
            </li>
        </ul>
        <div id="page-info-basic" class="mt-3 small text-muted"></div>
    </nav>
</div>

<!-- Small Condensed Table -->
<div class="table-responsive overscroll-auto" style="height: 50vh;">
    <table class="table table-sm table-bordered table-hover align-middle mb-0 border">
        <thead class="border-bottom">
            <tr>
                <th class="ps-3 py-2 text-uppercase text-bold" style="width: 50px; font-size: 0.75rem;">#</th>
                <th class="py-2 text-uppercase text-bold small text-center">Ref No.</th>
                <th class="py-2 text-uppercase text-bold small text-center">Hotel</th>
                <th class="py-2 text-uppercase text-bold small text-center">Function Detail</th>
                <th class="py-2 text-uppercase text-bold small text-center">Rental Fee</th>
                <th class="py-2 text-uppercase text-bold small text-center">Status</th>
            </tr>
        </thead>
        <tbody class="border-top-0 small" id="basic_tier_content">
            <!-- Dynamic Content -->
        </tbody>
    </table>
</div>



<script>
    function formatComma(number) {
        if (number == null) return "";
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }


    var BasicCurrentPage = 1;
    var BasicPageSize = 1;
    var totalPages = 1;
    var isPackageMode = false;
    var selectedItems = [];


    function basicFunction_Tier(page = 1) {
        BasicCurrentPage = page; 
        var basicdisplay = $("#basic_tier_content");
        basicdisplay.html(`
                <tr>
                    <td colspan="6" class="p-5 text-center text-muted">
                        <div class="spinner-border text-dark"></div>
                        <div class="mt-2">Loading...</div>
                    </td>
                </tr>
        `);
        var Search = $("#search-general").val();
        $.post("dirs/master_settings/dirs/function_config/actions/get_pagination_basic.php", {
            BasicCurrentPage,
            BasicPageSize,
            Search
        }, function (data) {
            let response;

            try {
                response = JSON.parse(data);
            } catch (e) {
                basicdisplay.html(`<div class="text-dark text-center py-4">Server Error</div>`);
                return;
            }
            if ($.trim(response.isSuccess) === "success") {
                BasicContent(response.Data);
                totalPages = (response.Data && response.Data.length > 0)
                    ? parseInt(response.Data[0].TotalPages)
                    : 1;

                    BasicPaginationUi();
                    BasicPageNumber();
            } else {
                emptyStatebasic("basic function was empty.");
            }
        });
    }


    function BasicContent(data) {
        const basicdisplay = $("#basic_tier_content");
        if (!data || data.length === 0) {
            showEmptyStateBasic("No available.");
            return;
        }
        basicdisplay.empty();

        data.forEach(basic => {
            basicdisplay.append(`
               <tr class="align-middle" data-value="${basic.DocEntry}">
                   <td class="text-muted fw-medium">
                       ${basic.OrderNumber}
                   </td>

                   <td class="fw-semibold text-muted text-center">
                       ${basic.RefNumber || '—'}
                   </td>

                    <td class="fw-semibold text-muted text-center">
                       <a href="#" onclick="mdlReview('${basic.DocEntry}')"> ${basic.PropertyDisplay || '—'}</a>
                    </td>
                    <td class="fw-semibold text-muted  text-center">
                        ${basic.FunctionDisplay  || '—'}
                    </td>

                    <td class="fw-semibold text-muted  text-center">
                        ₱${formatComma(basic.RentalFee || '0')}
                    </td>

                    <td class="text-center">
                        <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer
                            ${basic.SpaceStatus === "Available" ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}"
                            data-id="${basic.DocEntry}"
                            data-status="${basic.SpaceStatus}">
                            ${basic.SpaceStatus}
                        </span>
                    </td>
               </tr>
            `);
        });
    }




    /*Function for no record of beverages*/
    function emptyStatebasic(message) {
        $("#basic_tier_content").html(`
            <tr>
              <td colspan="6" class="p-5 text-center text-muted">
                  <i class="bi bi-card-list text-lg"></i> 
                  <br>
                      No Function Available!
            <div class="small opacity-75">${message}</div>
                  </td>
            </tr>
        `);
    }

    /*Function for no record of beverages*/
    function showEmptyStateBasic(message) {
        $("#basic_tier_content").html(`
            <tr>
              <td colspan="6" class="p-5 text-center text-muted">
                  <i class="bi bi-card-list text-lg"></i> 
                  <br>
                      No Record Found!
            <div class="small opacity-75">${message}</div>
                  </td>
            </tr>
        `);
    }


    /*Function to count page number page 1 of and so on*/
    function BasicPaginationUi() {
        $("#page-info-basic").text("Page " + BasicCurrentPage + " of " + totalPages);
        if (BasicCurrentPage <= 1) {
            $("#li-prev-basic").addClass("disabled");
        } else {
            $("#li-prev-basic").removeClass("disabled");
        }

        if (BasicCurrentPage >= totalPages) {
            $("#li-next-basic").addClass("disabled");
        } else {
            $("#li-next-basic").removeClass("disabled");
        }
    }

    /*Function to build list of pagination*/
    function BasicPageNumber() {
        $("#pagination-basic li.page-number-amenities").remove();
        let prevLi = $("#li-prev-basic");
        let maxVisible = 5;
        let start = Math.max(1, BasicCurrentPage - 2);
        let end = Math.min(totalPages, start + maxVisible - 1);
        if (end - start < maxVisible - 1) {
            start = Math.max(1, end - maxVisible + 1);
        }
        if (start > 1) {
            insertPageBreakfast(1, prevLi);
            prevLi = prevLi.next();

            if (start > 2) {
                prevLi.after(`<li class="page-item page-number-amenities disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPageBreakfast(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-amenities disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPageBreakfast(totalPages, prevLi);
        }
        function insertPageBreakfast(i, ref) {
            let activeClass = (i === BasicCurrentPage) ? "active" : "";

            let li = `
                <li class="page-item page-number-amenities ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }

    /*search-basic*/
    $("#search-general").on("keydown", function(e) {
        if (e.key === "Enter") {
            basicFunction_Tier();
        }
    });

      /* Pagination + Fetch Blocked basicounts */
      $("#btn-preview-basic").on("click", function(e) {
          e.preventDefault();

          if (BasicCurrentPage > 1) {
              basicFunction_Tier(BasicCurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-basic").on("click", function(e) {
          e.preventDefault();

          if (BasicCurrentPage < totalPages) {
              basicFunction_Tier(BasicCurrentPage + 1);
          }
      });

      $(document).on("click", "#pagination-basic .page-link[data-page]", function (e) {
          e.preventDefault();

          basicFunction_Tier($(this).data("page"));
      });
  </script>
