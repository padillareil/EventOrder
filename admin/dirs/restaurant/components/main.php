<div class="container col-md-8 my-2">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4 p-md-5 bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <h5 class="fw-bold text-dark mb-1">Restaurant Monitoring</h5>
                    <p class="text-muted small mb-0">Track outlets, monitor operational statuses, and view parent hotel alignments.</p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-3 ms-md-auto">
                    <!-- Search Field -->
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-account" placeholder="Search...">
                    </div>
                    <button class="btn btn-dark px-3 py-2 rounded-3 fw-medium d-flex align-items-center shadow-sm" type="button">
                        <i class="bi bi-plus-lg me-1.5"></i> Add Restaurant
                    </button>
                </div>
            </div>
        </div>

        <!-- Modern Borderless Data Grid Section -->
        <div class="card-body p-2 p-md-5 bg-light-subtle">
            <div class="mt-2 mb-2 justify-content-end d-flex">
                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0 gap-1" id="pagination-basic">
                        <li class="page-item" id="li-prev-basic">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-preview-basic">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item" id="li-next-basic">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-next-basic">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 55vh;">
                <table class="table table-borderless table-hover align-middle mb-0">
                    <thead class="sticky-top bg-white border-bottom align-middle" style="z-index: 5; height: 52px;">
                        <tr>
                            <th class="ps-4 text-uppercase text-secondary fw-bold fs-7" style="width: 80px;">#</th>
                            <th class="text-uppercase text-secondary fw-bold fs-7">Restaurant</th>
                            <th class="text-uppercase text-secondary fw-bold fs-7">Associated Hotel</th>
                            <th class="pe-4 text-uppercase text-secondary fw-bold fs-7" style="width: 140px;">Status</th>
                        </tr>
                    </thead>
                    <tbody id="load_UserAccountLists">

                        <!-- Data Row Template Example (Uncomment to view style presentation) -->
                        <!-- 
                        <tr>
                            <td class="ps-4 text-secondary fw-medium">1</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center border text-secondary" style="width: 36px; height: 36px;">
                                        <i class="bi bi-egg-fried"></i>
                                    </div>
                                    <span class="fw-semibold text-dark">The Bistro Veranda</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border px-2.5 py-1.5 rounded-2 fw-medium">
                                    <i class="bi bi-building me-1 text-muted"></i> Grand Plaza Resort
                                </span>
                            </td>
                            <td class="pe-4"><span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill fs-7 fw-semibold">Open</span></td>
                        </tr>
                        -->

                        <!-- Empty State View -->
                        <tr>
                            <td colspan="4" class="py-5 text-center">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center p-3">
                                        <i class="bi bi-shop text-muted fs-3"></i>
                                    </div>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">No restaurants found</h6>
                                <p class="text-muted small mb-0">Get started by linking your first dining outlet profile.</p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>1