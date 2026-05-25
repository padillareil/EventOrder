<div class="container col-md-8 my-2">
    <!-- Main Card Wrapper -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Header & Filtering Dashboard Control Area -->
        <div class="card-body p-4 p-md-5 bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start gap-4 mb-4">
                <div>
                    <h5 class="fw-bold text-dark mb-1">User Activity Logs</h5>
                    <p class="text-muted small mb-0">Monitor and audit real-time user session behaviors across the system.</p>
                </div>
                
                <!-- Pagination Control aligned neatly -->
                <nav aria-label="Page navigation" class="ms-md-auto">
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

            <!-- Unified Control Row -->
            <div class="row g-3 align-items-end">
                <!-- Search -->
                <div class="col-12 col-lg-4">
                    <label class="form-label small text-secondary fw-semibold mb-1">Search</label>
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-account" placeholder="Search ...">
                    </div>
                </div>

                <!-- Date Filter From -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small text-secondary fw-semibold mb-1">Period From</label>
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-calendar-event text-muted"></i>
                        </span>
                        <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small text-secondary" id="filterdate-from">
                    </div>
                </div>

                <!-- Date Filter To -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <label class="form-label small text-secondary fw-semibold mb-1">To</label>
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-calendar-event text-muted"></i>
                        </span>
                        <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small text-secondary" id="filterdate-to">
                    </div>
                </div>
            </div>
        </div>

        <!-- Table View Section -->
        <div class="card-body p-4 p-md-5 bg-light-subtle">
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 55vh;">
                <table class="table table-borderless table-hover align-middle mb-0">
                    <thead class="sticky-top bg-white border-bottom align-middle" style="z-index: 5; height: 52px;">
                        <tr>
                            <th class="ps-4 text-secondary fw-bold fs-7" style="width: 80px;">#</th>
                            <th class="text-secondary fw-bold fs-7">Username</th>
                            <th class="text-secondary fw-bold fs-7">Description</th>
                            <th class="text-secondary fw-bold fs-7">Device</th>
                            <th class="pe-4 text-secondary fw-bold fs-7">IP Address</th>
                            <th class="text-secondary fw-bold fs-7">Date</th>
                        </tr>
                    </thead>
                    <tbody id="load_UserAccountLists">

                        <!-- Empty State -->
                        <tr>
                            <td colspan="6" class="py-5 text-center">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center p-3">
                                        <i class="bi bi-clock-history text-muted fs-3"></i>
                                    </div>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">No Record logs found</h6>
                                <p class="text-muted small mb-0">No user logs available.</p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>