<div class="container my-5">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Header Actions Block -->
        <div class="card-body p-4 p-md-5 bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <h5 class="fw-bold text-dark mb-1">Guest Profiles & Master Records</h5>
                    <p class="text-muted small mb-0">Manage guest identity records, active stay allocations, loyalty tiers, and aggregate property accounts.</p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-3 ms-md-auto">
                    <!-- Search Input Wrapper -->
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-guest" placeholder="Search...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Master Data Grid Layout -->
        <div class="card-body p-2 p-md-5 bg-light-subtle">
            
            <!-- Filter & Pagination Alignment Row -->
            <div class="mb-3 justify-content-end d-flex">
                <nav aria-label="Guest directory page navigation">
                    <ul class="pagination pagination-sm mb-0 gap-1" id="pagination-guest">
                        <li class="page-item" id="li-prev-guest">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-preview-guest">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item" id="li-next-guest">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-next-guest">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <!-- Table Container Viewport -->
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 55vh;">
                <table class="table table-borderless table-hover align-middle mb-0" style="font-size: 13px;">
                    <thead class="sticky-top bg-white border-bottom align-middle text-secondary font-monospace text-uppercase" style="z-index: 5; height: 52px;">
                        <tr>
                            <th class="ps-4 fw-bold" style="width: 80px;">ID</th>
                            <th class="fw-bold">Guest Identity</th>
                            <th class="fw-bold">Contact Node</th>
                            <th class="fw-bold text-end">Folio Balance</th>
                            <th class="pe-4 fw-bold text-end" style="width: 140px;">Profile Status</th>
                        </tr>
                    </thead>
                    <tbody id="load_GuestAccountLists">

                        <!-- Population State Example 1 (VIP Active Stay) -->
                        <tr style="cursor: pointer;"  onclick="loadGuestProfile()">
                            <td class="ps-4 font-monospace fw-medium text-secondary">#09841</td>
                            <td>
                                <div class="fw-bold text-dark">Eleanor Vance</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Passport: *******4219</div>
                            </td>
                            <td>
                                <div class="text-dark">e.vance@vancetech.io</div>
                                <div class="text-muted small">+1 (555) 234-5678</div>
                            </td>
                            <td class="text-end font-monospace fw-bold text-dark">$1,420.50</td>
                            <td class="pe-4 text-end">
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill fw-semibold">In-House</span>
                            </td>
                        </tr>

                        <!-- Population State Example 2 (Standard Arriving Today) -->
                        <tr style="cursor: pointer;" onclick="loadGuestProfile()">
                            <td class="ps-4 font-monospace fw-medium text-secondary">#09842</td>
                            <td>
                                <div class="fw-bold text-dark">Marcus Thorne</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">National ID Verified</div>
                            </td>
                            <td>
                                <div class="text-dark">marcus.t@outlook.com</div>
                                <div class="text-muted small">+63 917 123 4567</div>
                            </td>
                            <td class="text-end font-monospace text-muted">$0.00</td>
                            <td class="pe-4 text-end">
                                <span class="badge bg-info-subtle text-info border border-info-subtle px-2.5 py-1.5 rounded-pill fw-semibold">Expected</span>
                            </td>
                        </tr>

                        <!-- Empty State View Component (Hidden dynamically behind list evaluation checks) -->
                        <!-- 
                        <tr>
                            <td colspan="7" class="py-5 text-center">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center p-3 text-muted">
                                        <i class="bi bi-person-badge fs-3"></i>
                                    </div>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">No master guest records found</h6>
                                <p class="text-muted small mb-0">No profile signatures found matching the current global query parameter configuration.</p>
                            </td>
                        </tr>
                        -->

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>