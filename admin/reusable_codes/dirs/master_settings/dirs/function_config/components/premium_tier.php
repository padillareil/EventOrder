<!-- Header & Pagination Row -->
<div class="d-flex justify-content-between align-items-center mb-2">
    <div>
        <h6 class="fw-bold mb-0">Premium Function</h6>
        <p class="text-muted small mb-0">Premium tier function room setup.</p>
    </div>

    <!-- Top-Right Small Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-sm mb-0" id="pagination-premium">
            <li class="page-item" id="li-prev-premium">
                <a class="page-link shadow-none" href="#" id="btn-preview-premium">
                    <i class="bi bi-chevron-left small"></i>
                </a>
            </li>
            <li class="page-item" id="li-next-premium">
                <a class="page-link shadow-none" href="#" id="btn-next-premium">
                    <i class="bi bi-chevron-right small"></i>
                </a>
            </li>
        </ul>
        <div id="page-info-premium" class="mt-3 small text-muted"></div>
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
        <tbody class="border-top-0 small" id="premium_tier_content">
            <!-- Dynamic Content -->
        </tbody>
    </table>
</div>


<script>

    function formatComma(number) {
        if (number == null) return "";
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }


    var premiumCurrentPage = 1;
    var premiumPageSize = 20;
    var premiumTotalPages = 1;

    function Premium_tier(page = 1) {

        premiumCurrentPage = page;

        var display = $("#premium_tier_content");

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
            "dirs/master_settings/dirs/function_config/actions/get_pagination_premium.php",
            {
                premiumCurrentPage,
                premiumPageSize,
                Search
            },
            function (data) {

                let response;

                try {
                    response = JSON.parse(data);
                } catch (e) {
                    display.html(`<div class="text-dark text-center py-4">Server Error</div>`);
                    return;
                }

                if ($.trim(response.isSuccess) === "success") {

                    premiumContent(response.Data);

                    premiumTotalPages =
                        (response.Data && response.Data.length > 0)
                            ? parseInt(response.Data[0].TotalPages)
                            : 1;

                    premiumPaginationUi();
                    premiumPageNumber();

                } else {
                    emptyStatepremium("Premium function was empty.");
                }

            }
        );
    }


    function premiumContent(data) {

        const display = $("#premium_tier_content");

        if (!data || data.length === 0) {
            showEmptyStatePremium("No available.");
            return;
        }

        display.empty();

        data.forEach(premium => {

            display.append(`
                <tr class="align-middle" data-value="${premium.DocEntry}">

                    <td class="text-muted fw-medium">
                        ${premium.OrderNumber}
                    </td>

                    <td class="fw-semibold text-muted text-center">
                        ${premium.RefNumber || '—'}
                    </td>

                    <td class="fw-semibold text-muted text-center">
                        <a href="#" onclick="mdlReview('${premium.DocEntry}')">
                            ${premium.PropertyDisplay || '—'}
                        </a>
                    </td>

                    <td class="fw-semibold text-muted text-center">
                        ${premium.FunctionDisplay || '—'}
                    </td>

                    <td class="fw-semibold text-muted text-center">
                        ₱${formatComma(premium.RentalFee || '0')}
                    </td>

                    <td class="text-center">
                        <span class="badge px-3 py-2 rounded-pill
                            ${premium.SpaceStatus === "Available"
                                ? "bg-success-subtle text-success"
                                : "bg-danger-subtle text-danger"}">
                            ${premium.SpaceStatus}
                        </span>
                    </td>

                </tr>
            `);

        });

    }


    function emptyStatepremium(message) {

        $("#premium_tier_content").html(`
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

    function showEmptyStatePremium(message) {

        $("#premium_tier_content").html(`
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


    function premiumPaginationUi() {

        $("#page-info-premium").text(
            "Page " + premiumCurrentPage + " of " + premiumTotalPages
        );

        $("#li-prev-premium").toggleClass(
            "disabled",
            premiumCurrentPage <= 1
        );

        $("#li-next-premium").toggleClass(
            "disabled",
            premiumCurrentPage >= premiumTotalPages
        );

    }


    function premiumPageNumber() {

        $("#pagination-premium li.page-number-premium").remove();

        let prevLi = $("#li-prev-premium");

        let maxVisible = 5;

        let start = Math.max(1, premiumCurrentPage - 2);
        let end = Math.min(premiumTotalPages, start + maxVisible - 1);

        if (end - start < maxVisible - 1) {
            start = Math.max(1, end - maxVisible + 1);
        }

        if (start > 1) {

            insertPagePremium(1, prevLi);
            prevLi = prevLi.next();

            if (start > 2) {
                prevLi.after(`
                    <li class="page-item page-number-premium disabled">
                        <span class="page-link">...</span>
                    </li>
                `);
                prevLi = prevLi.next();
            }

        }

        for (let i = start; i <= end; i++) {
            insertPagePremium(i, prevLi);
            prevLi = prevLi.next();
        }

        if (end < premiumTotalPages) {

            if (end < premiumTotalPages - 1) {
                prevLi.after(`
                    <li class="page-item page-number-premium disabled">
                        <span class="page-link">...</span>
                    </li>
                `);
                prevLi = prevLi.next();
            }

            insertPagePremium(premiumTotalPages, prevLi);
        }

        function insertPagePremium(i, ref) {

            let activeClass =
                (i === premiumCurrentPage)
                    ? "active"
                    : "";

            let li = `
                <li class="page-item page-number-premium ${activeClass}">
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
            Premium_tier(1);
        }
    });

    $("#btn-preview-premium").on("click", function (e) {
        e.preventDefault();

        if (premiumCurrentPage > 1) {
            Premium_tier(premiumCurrentPage - 1);
        }
    });

    $("#btn-next-premium").on("click", function (e) {
        e.preventDefault();

        if (premiumCurrentPage < premiumTotalPages) {
            Premium_tier(premiumCurrentPage + 1);
        }
    });

    $(document).on("click", "#pagination-premium .page-link[data-page]", function (e) {
        e.preventDefault();

        Premium_tier($(this).data("page"));
    });

</script>