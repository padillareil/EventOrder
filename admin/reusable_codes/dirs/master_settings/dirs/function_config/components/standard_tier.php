<!-- Header & Pagination Row -->
<div class="d-flex justify-content-between align-items-center mb-2">
    <div>
        <h6 class="fw-bold mb-0">Standard Function</h6>
        <p class="text-muted small mb-0">Standard tier function room setup.</p>
    </div>

    <!-- Top-Right Small Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-sm mb-0" id="pagination-standard">
            <li class="page-item" id="li-prev-standard">
                <a class="page-link shadow-none" href="#" id="btn-preview-standard">
                    <i class="bi bi-chevron-left small"></i>
                </a>
            </li>
            <li class="page-item" id="li-next-standard">
                <a class="page-link shadow-none" href="#" id="btn-next-standard">
                    <i class="bi bi-chevron-right small"></i>
                </a>
            </li>
        </ul>
        <div id="page-info-standard" class="mt-3 small text-muted"></div>
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
        <tbody class="border-top-0 small" id="standard_tier_content">
            <!-- Dynamic Content -->
        </tbody>
    </table>
</div>



<script>

    function formatComma(number) {
        if (number == null) return "";
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    var StandardCurrentPage = 1;
    var StandardPageSize = 20;
    var standardTotalPages = 1;

    function Standard_tier(page = 1) {
        StandardCurrentPage = page;
        var display = $("#standard_tier_content");
        display.html(`
            <tr>
                <td colspan="6" class="p-5 text-center text-muted">
                    <div class="spinner-border text-dark"></div>
                    <div class="mt-2">Loading...</div>
                </td>
            </tr>
        `);

        var Search = $("#search-general").val();

        $.post(
            "dirs/master_settings/dirs/function_config/actions/get_pagination_standard.php",
            {
                StandardCurrentPage,
                StandardPageSize,
                Search
            },
            function (data) {

                let response;

                try {
                    response = JSON.parse(data);
                } catch (e) {
                    display.html(`
                        <tr>
                            <td colspan="6" class="text-center text-danger p-4">
                                Server Error
                            </td>
                        </tr>
                    `);
                    return;
                }

                if ($.trim(response.isSuccess) === "success") {

                    standardContent(response.Data);

                    standardTotalPages =
                        (response.Data && response.Data.length > 0)
                            ? parseInt(response.Data[0].TotalPages)
                            : 1;

                    standardPaginationUi();
                    standardPageNumber();

                } else {

                    emptyStatestandard("Standard function was empty.");

                }

            }
        );

    }


    function standardContent(data) {
        const display = $("#standard_tier_content");
        if (!data || data.length === 0) {
            showEmptyStateStandard("No available record.");
            return;
        }
        display.empty();
        data.forEach(standard => {
            display.append(`
                <tr class="align-middle" data-value="${standard.DocEntry}">
                    <td class="text-muted fw-medium">
                        ${standard.OrderNumber}
                    </td>
                    <td class="fw-semibold text-muted text-center">
                        ${standard.RefNumber || '—'}
                    </td>

                    <td class="fw-semibold text-muted text-center">
                        <a href="#" onclick="mdlReview('${standard.DocEntry}')">
                            ${standard.PropertyDisplay || '—'}
                        </a>
                    </td>

                    <td class="fw-semibold text-muted text-center">
                        ${standard.FunctionDisplay || '—'}
                    </td>

                    <td class="fw-semibold text-muted text-center">
                        ₱${formatComma(standard.RentalFee || '0')}
                    </td>

                    <td class="text-center">
                        <span class="badge px-3 py-2 rounded-pill
                            ${standard.SpaceStatus === "Available"
                                ? "bg-success-subtle text-success"
                                : "bg-danger-subtle text-danger"}">

                            ${standard.SpaceStatus}

                        </span>
                    </td>

                </tr>
            `);

        });

    }

    function emptyStatestandard(message) {

        $("#standard_tier_content").html(`
            <tr>
                <td colspan="6" class="p-5 text-center text-muted">
                    <i class="bi bi-card-list"></i>
                    <br>
                    No Function Available!
                    <div class="small opacity-75">${message}</div>
                </td>
            </tr>
        `);

    }
    function showEmptyStateStandard(message) {

        $("#standard_tier_content").html(`
            <tr>
                <td colspan="6" class="p-5 text-center text-muted">
                    <i class="bi bi-card-list"></i>
                    <br>
                    No Record Found!
                    <div class="small opacity-75">${message}</div>
                </td>
            </tr>
        `);

    }

    function standardPaginationUi() {

        $("#page-info-standard").text(
            "Page " + StandardCurrentPage + " of " + standardTotalPages
        );

        $("#li-prev-standard").toggleClass(
            "disabled",
            StandardCurrentPage <= 1
        );

        $("#li-next-standard").toggleClass(
            "disabled",
            StandardCurrentPage >= standardTotalPages
        );

    }

    function standardPageNumber() {

        $("#pagination-standard li.page-number-standard").remove();

        let prevLi = $("#li-prev-standard");

        let maxVisible = 5;

        let start = Math.max(
            1,
            StandardCurrentPage - 2
        );

        let end = Math.min(
            standardTotalPages,
            start + maxVisible - 1
        );

        if (end - start < maxVisible - 1) {
            start = Math.max(1, end - maxVisible + 1);
        }

        if (start > 1) {

            insertPageStandard(1, prevLi);

            prevLi = prevLi.next();

            if (start > 2) {

                prevLi.after(`
                    <li class="page-item page-number-standard disabled">
                        <span class="page-link">...</span>
                    </li>
                `);

                prevLi = prevLi.next();

            }

        }

        for (let i = start; i <= end; i++) {

            insertPageStandard(i, prevLi);

            prevLi = prevLi.next();

        }

        if (end < standardTotalPages) {

            if (end < standardTotalPages - 1) {

                prevLi.after(`
                    <li class="page-item page-number-standard disabled">
                        <span class="page-link">...</span>
                    </li>
                `);

                prevLi = prevLi.next();

            }

            insertPageStandard(standardTotalPages, prevLi);

        }

        function insertPageStandard(i, ref) {

            let activeClass =
                (i === StandardCurrentPage)
                ? "active"
                : "";

            let li = `
                <li class="page-item page-number-standard ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">
                        ${i}
                    </a>
                </li>
            `;

            $(li).insertAfter(ref);

        }

    }

    $("#search-general").on("keydown", function (e) {
        if (e.key === "Enter") {
            Standard_tier(1);
        }
    });

    $("#btn-preview-standard").on("click", function (e) {
        e.preventDefault();

        if (StandardCurrentPage > 1) {
            Standard_tier(StandardCurrentPage - 1);
        }
    });

    $("#btn-next-standard").on("click", function (e) {
        e.preventDefault();

        if (StandardCurrentPage < standardTotalPages) {
            Standard_tier(StandardCurrentPage + 1);
        }
    });

    $(document).on("click", "#pagination-standard .page-link[data-page]", function (e) {
        e.preventDefault();

        Standard_tier($(this).data("page"));
    });

</script>