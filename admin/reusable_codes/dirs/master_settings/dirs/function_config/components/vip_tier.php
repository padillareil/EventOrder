<!-- Header & Pagination Row -->
<div class="d-flex justify-content-between align-items-center mb-2">
    <div>
        <h6 class="fw-bold mb-0">VIP Function</h6>
        <p class="text-muted small mb-0">VIP tier function room setup.</p>
    </div>

    <!-- Top-Right Small Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-sm mb-0" id="pagination-vip">
            <li class="page-item" id="li-prev-vip">
                <a class="page-link shadow-none" href="#" id="btn-preview-vip">
                    <i class="bi bi-chevron-left small"></i>
                </a>
            </li>
            <li class="page-item" id="li-next-vip">
                <a class="page-link shadow-none" href="#" id="btn-next-vip">
                    <i class="bi bi-chevron-right small"></i>
                </a>
            </li>
        </ul>
        <div id="page-info-vip" class="mt-3 small text-muted"></div>
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
        <tbody class="border-top-0 small" id="vip_tier_content">
            <!-- Dynamic Content -->
        </tbody>
    </table>
</div>



<script>

    function formatComma(number) {
        if (number == null) return "";
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }


    var vipCurrentPage = 1;
    var vipPageSize = 20;
    var vipTotalPages = 1;


    function VIP_tier(page = 1) {

        vipCurrentPage = page;

        var display = $("#vip_tier_content");

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
            "dirs/master_settings/dirs/function_config/actions/get_pagination_vip.php",
            {
                vipCurrentPage,
                vipPageSize,
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

                    vipContent(response.Data);

                    vipTotalPages =
                        (response.Data && response.Data.length > 0)
                            ? parseInt(response.Data[0].TotalPages)
                            : 1;

                    vipPaginationUi();
                    vipPageNumber();

                } else {

                    emptyStatevip("VIP function was empty.");

                }

            }
        );

    }


    function vipContent(data) {

        const display = $("#vip_tier_content");

        if (!data || data.length === 0) {
            showEmptyStateVip("No available.");
            return;
        }

        display.empty();

        data.forEach(vip => {

            display.append(`
                <tr class="align-middle" data-value="${vip.DocEntry}">

                    <td class="text-muted fw-medium">
                        ${vip.OrderNumber}
                    </td>

                    <td class="fw-semibold text-muted text-center">
                        ${vip.RefNumber || '—'}
                    </td>

                    <td class="fw-semibold text-muted text-center">
                        <a href="#" onclick="mdlReview('${vip.DocEntry}')">
                            ${vip.PropertyDisplay || '—'}
                        </a>
                    </td>

                    <td class="fw-semibold text-muted text-center">
                        ${vip.FunctionDisplay || '—'}
                    </td>

                    <td class="fw-semibold text-muted text-center">
                        ₱${formatComma(vip.RentalFee || '0')}
                    </td>

                    <td class="text-center">
                        <span class="badge px-3 py-2 rounded-pill
                            ${vip.SpaceStatus === "Available"
                                ? "bg-success-subtle text-success"
                                : "bg-danger-subtle text-danger"}">

                            ${vip.SpaceStatus}

                        </span>
                    </td>

                </tr>
            `);

        });

    }


    function emptyStatevip(message) {

        $("#vip_tier_content").html(`
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

    function showEmptyStateVip(message) {

        $("#vip_tier_content").html(`
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


    function vipPaginationUi() {

        $("#page-info-vip").text(
            "Page " + vipCurrentPage + " of " + vipTotalPages
        );

        $("#li-prev-vip").toggleClass(
            "disabled",
            vipCurrentPage <= 1
        );

        $("#li-next-vip").toggleClass(
            "disabled",
            vipCurrentPage >= vipTotalPages
        );

    }

    

    function vipPageNumber() {

        $("#pagination-vip li.page-number-vip").remove();

        let prevLi = $("#li-prev-vip");

        let maxVisible = 5;

        let start = Math.max(
            1,
            vipCurrentPage - 2
        );

        let end = Math.min(
            vipTotalPages,
            start + maxVisible - 1
        );

        if (end - start < maxVisible - 1) {
            start = Math.max(1, end - maxVisible + 1);
        }

        if (start > 1) {

            insertPageVip(1, prevLi);

            prevLi = prevLi.next();

            if (start > 2) {

                prevLi.after(`
                    <li class="page-item page-number-vip disabled">
                        <span class="page-link">...</span>
                    </li>
                `);

                prevLi = prevLi.next();

            }

        }

        for (let i = start; i <= end; i++) {

            insertPageVip(i, prevLi);

            prevLi = prevLi.next();

        }

        if (end < vipTotalPages) {

            if (end < vipTotalPages - 1) {

                prevLi.after(`
                    <li class="page-item page-number-vip disabled">
                        <span class="page-link">...</span>
                    </li>
                `);

                prevLi = prevLi.next();

            }

            insertPageVip(vipTotalPages, prevLi);

        }

        function insertPageVip(i, ref) {

            let activeClass =
                (i === vipCurrentPage)
                    ? "active"
                    : "";

            let li = `
                <li class="page-item page-number-vip ${activeClass}">
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
            VIP_tier(1);
        }

    });

    $("#btn-preview-vip").on("click", function (e) {

        e.preventDefault();

        if (vipCurrentPage > 1) {
            VIP_tier(vipCurrentPage - 1);
        }

    });

    $("#btn-next-vip").on("click", function (e) {

        e.preventDefault();

        if (vipCurrentPage < vipTotalPages) {
            VIP_tier(vipCurrentPage + 1);
        }

    });

    $(document).on(
        "click",
        "#pagination-vip .page-link[data-page]",
        function (e) {

            e.preventDefault();

            VIP_tier($(this).data("page"));

        }
    );

</script>