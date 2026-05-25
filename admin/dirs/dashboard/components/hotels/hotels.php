<div class="container my-5">
    <!-- Main Card Wrapper -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4 p-md-5 border-bottom">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="btn btn-light btn-sm rounded-circle p-2 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px;" title="Go back" onclick="loadMetrics()">
                    <i class="bi bi-arrow-left text-secondary fs-5"></i>
                </button>
                <div>
                    <h5 class="fw-bold text-dark mb-1">Hotel Property Control</h5>
                    <p class="text-muted small mb-0">Manage core hotel properties, track regional locations, and view system module distributions.</p>
                </div>
            </div>
        </div>

        <!-- Modern Borderless Data Grid Section -->
        <div class="card-body p-4 p-md-5 bg-light-subtle">
            <!-- Action Tool Belt: Search & Navigation Controls -->
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                
                <!-- Search Field Input -->
                <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 280px;">
                    <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-account" placeholder="Search...">
                </div>
                
                <!-- Pagination Controls -->
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
                            <th class="ps-4 text-secondary fw-bold fs-7" style="width: 80px;">#</th>
                            <th class="text-secondary fw-bold fs-7">Hotel</th>
                            <th class="text-secondary fw-bold fs-7">Assigned Staff</th>
                            <th class="text-secondary fw-bold fs-7">Linked Outlets</th>
                            <th class="pe-4 text-secondary fw-bold fs-7 text-end" style="width: 140px;">Status</th>
                        </tr>
                    </thead>
                    <tbody id="load_HotelLists">

                        <!-- Example Row 1 -->
                        <tr class="border-bottom-light-subtle">
                            <td class="ps-4 text-secondary fw-medium">1</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center border text-secondary shadow-xs" style="width: 38px; height: 38px;">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-dark d-block mb-0.5">Grand Xing Imperial</span>
                                        <span class="text-muted fs-7"><i class="bi bi-geo-alt me-1"></i>Miami, FL</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="fw-medium text-dark">14 Accounts</span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border px-2.5 py-1.5 rounded-2 fw-medium">
                                    <i class="bi bi-shop me-1 text-muted"></i> 4 Restaurants
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill fs-7 fw-semibold">Active</span>
                            </td>
                        </tr>

                        <!-- Example Row 2 -->
                        <tr>
                            <td class="ps-4 text-secondary fw-medium">2</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center border text-secondary shadow-xs" style="width: 38px; height: 38px;">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-dark d-block mb-0.5">Madison Hotel</span>
                                        <span class="text-muted fs-7"><i class="bi bi-geo-alt me-1"></i>Malibu, CA</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="fw-medium text-dark">8 Accounts</span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border px-2.5 py-1.5 rounded-2 fw-medium">
                                    <i class="bi bi-shop me-1 text-muted"></i> 2 Restaurants
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill fs-7 fw-semibold">Active</span>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>