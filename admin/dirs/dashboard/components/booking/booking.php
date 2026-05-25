<div class="container my-5">
    
    <!-- Main Card Wrapper -->
    <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
        
        <!-- Dashboard Header -->
        <div class="card-body p-4 p-md-5 border-bottom">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="btn btn-light btn-sm rounded-circle p-2 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px;" title="Go back" onclick="loadMetrics()">
                    <i class="bi bi-arrow-left text-secondary fs-5"></i>
                </button>
                <div>
                    <h5 class="fw-bold text-dark mb-1">Cross-Property Bookings Log</h5>
                    <p class="text-muted small mb-0">Monitor reservation flows, event scheduling alignments, and booking origins across all properties.</p>
                </div>
            </div>
        </div>

        <!-- Dashboard Content Grid View -->
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

            <!-- Data Display Grid -->
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 60vh;">
                <table class="table table-borderless table-hover align-middle mb-0">
                    <thead class="sticky-top bg-white border-bottom align-middle" style="z-index: 5; height: 52px;">
                        <tr>
                            <th class="ps-4 text-secondary fw-bold fs-7" style="width: 70px;">#</th>
                            <th class="text-secondary fw-bold fs-7">Hotel</th>
                            <th class="text-secondary fw-bold fs-7">Event & Schedule</th>
                            <th class="text-secondary fw-bold fs-7">Booked By</th>
                            <th class="pe-4 text-secondary fw-bold fs-7 text-end" style="width: 140px;">Status</th>
                        </tr>
                    </thead>
                    <tbody id="load_InterHotelBookingLists">

                        <!-- Example Row 1: Confirmed State -->
                        <tr class="border-bottom-light-subtle">
                            <td class="ps-4 text-secondary fw-medium">1</td>
                            <td>
                                <span class="badge bg-light text-dark border px-2.5 py-1.5 rounded-2 fw-medium">
                                    <i class="bi bi-building me-1 text-muted"></i> Grand Plaza Resort
                                </span>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark mb-0.5">Corporate Annual Gala</div>
                                <div class="text-muted fs-7 d-flex align-items-center gap-1">
                                    <i class="bi bi-calendar3"></i> May 24, 2026 &middot; 6:00 PM
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-secondary font-monospace fw-bold small shadow-xs" style="width: 28px; height: 28px; font-size: 11px;">
                                        MC
                                    </div>
                                    <div>
                                        <div class="fw-medium text-dark fs-7">Michael Chang</div>
                                        <span class="text-muted" style="font-size: 11px;">Summit Alpine Desk</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill fs-7 fw-semibold">Confirmed</span>
                            </td>
                        </tr>

                        <!-- Example Row 2: Pending State -->
                        <tr>
                            <td class="ps-4 text-secondary fw-medium">2</td>
                            <td>
                                <span class="badge bg-light text-dark border px-2.5 py-1.5 rounded-2 fw-medium">
                                    <i class="bi bi-building me-1 text-muted"></i> Oceanview Pavilion
                                </span>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark mb-0.5">Wedding Banquet Reception</div>
                                <div class="text-muted fs-7 d-flex align-items-center gap-1">
                                    <i class="bi bi-calendar3"></i> June 12, 2026 &middot; 2:00 PM
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-secondary font-monospace fw-bold small shadow-xs" style="width: 28px; height: 28px; font-size: 11px;">
                                        SJ
                                    </div>
                                    <div>
                                        <div class="fw-medium text-dark fs-7">Sarah Jenkins</div>
                                        <span class="text-muted" style="font-size: 11px;">Grand Plaza Sales</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2.5 py-1.5 rounded-pill fs-7 fw-semibold">Pending Approval</span>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>