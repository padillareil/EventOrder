<div class="container my-5">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Header Actions Block -->
        <div class="card-body p-4 p-md-5 bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <h5 class="fw-bold text-dark mb-1">Event Order Booking</h5>
                    <p class="text-muted small mb-0">Track initial pencil space holds, timeline validation queues, and live confirmed block reservations.</p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-3 ms-md-auto">
                    <!-- Search Input Wrapper -->
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-booking" placeholder="Search...">
                    </div>
                    
                    <!-- Primary Booking Action Button -->
                    <button class="btn btn-dark px-3 py-2 rounded-3 fw-medium d-flex shadow-sm" type="button" onclick="mdlReserveSpaceBlock()">
                        <i class="bi bi-plus me-2.5"></i> Pencil Book
                    </button>
                </div>
            </div>
        </div>

        <!-- Master Data Grid Layout Container -->
        <div class="card-body p-2 p-md-5 bg-light-subtle">
            
            <!-- Filter, Nav-Tabs & Pagination Alignment Row -->
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                
                <!-- Nav-Tabs Sorting System Layout (Pencil Hold Priority First) -->
                <ul class="nav nav-pills p-1 bg-white border rounded-3 shadow-sm" id="bookingWorkflowTabs" role="tablist" style="font-size: 13px;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-side-tab btn btn-sm active fw-semibold px-3 py-1.5 rounded-2" 
                                id="tab-waitlist-ledger" data-bs-toggle="pill" data-bs-target="#pane-waitlist" type="button" role="tab" aria-selected="true">
                            <i class="bi bi-pencil me-2.5"></i> Waitlisted
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-side-tab btn btn-sm fw-semibold px-3 py-1.5 rounded-2 ms-1 text-secondary" 
                                id="tab-booked-ledger" data-bs-toggle="pill" data-bs-target="#pane-booked" type="button" role="tab" aria-selected="false">
                            <i class="bi bi-check-circle me-2.5"></i> Confirmed
                        </button>
                    </li>
                </ul>

                <!-- Pagination Quick Controls -->
                <nav aria-label="Booking directory page navigation">
                    <ul class="pagination pagination-sm mb-0 gap-1" id="pagination-booking-node">
                        <li class="page-item">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1 text-dark" href="#">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1 text-dark" href="#">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <!-- Tab Viewport Tab Content Box -->
            <div class="tab-content" id="bookingTabContent">
                
                <!-- PANE 1: PENCIL BOOKINGS / WAITLIST (Default Active Viewport) -->
                <div class="tab-pane fade show active" id="pane-waitlist" role="tabpanel" aria-labelledby="tab-waitlist-ledger" tabindex="0">
                    <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 55vh;">
                        <table class="table table-borderless table-hover align-middle mb-0" style="font-size: 13px;">
                            <thead class="sticky-top bg-white border-bottom align-middle text-secondary font-monospace text-uppercase" style="z-index: 5; height: 52px;">
                                <tr>
                                    <th class="ps-4 fw-bold" style="width: 140px;">Queue ID</th>
                                    <th class="fw-bold">Guest</th>
                                    <th class="fw-bold">Requested Function Space</th>
                                    <th class="fw-bold">Proposed Schedule</th>
                                    <th class="fw-bold text-end">Hold Priority</th>
                                    <th class="pe-4 fw-bold text-end" style="width: 160px;">Validation State</th>
                                </tr>
                            </thead>
                            <tbody id="load_WaitlistedBookings">
                                <tr style="cursor: pointer;" onclick="loadBookingDetails('#BK-2026-9912')">
                                    <td class="ps-4 font-monospace fw-semibold text-secondary">#BK-2026-9912</td>
                                    <td>
                                        <div class="fw-bold text-dark">Regina Alfonso</div>
                                        <div class="text-muted small" style="font-size: 0.75rem;">Alfonso Realty Corp</div>
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark">Jade Ballroom</div>
                                        <div class="text-muted small text-danger"><i class="bi bi-exclamation-triangle-fill me-1"></i> Conflict: Date Overlap</div>
                                    </td>
                                    <td>
                                        <div class="text-dark fw-medium">May 24, 2026</div>
                                        <div class="text-muted small font-monospace text-secondary">18:00 - 23:00</div>
                                    </td>
                                    <td class="text-end font-monospace text-dark fw-bold text-warning">Tier 1 Hold</td>
                                    <td class="pe-4 text-end">
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2.5 py-1.5 rounded-pill fw-semibold">Pencil Hold</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- PANE 2: CONFIRMED BOOKINGS -->
                <div class="tab-pane fade" id="pane-booked" role="tabpanel" aria-labelledby="tab-booked-ledger" tabindex="0">
                    <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 55vh;">
                        <table class="table table-borderless table-hover align-middle mb-0" style="font-size: 13px;">
                            <thead class="sticky-top bg-white border-bottom align-middle text-secondary font-monospace text-uppercase" style="z-index: 5; height: 52px;">
                                <tr>
                                    <th class="ps-4 fw-bold" style="width: 140px;">Booking Ref</th>
                                    <th class="fw-bold">Guest</th>
                                    <th class="fw-bold">Assigned Function Venue</th>
                                    <th class="fw-bold">Target Schedule</th>
                                    <th class="fw-bold text-end">Guaranteed Pax</th>
                                    <th class="pe-4 fw-bold text-end" style="width: 160px;">Calendar State</th>
                                </tr>
                            </thead>
                            <tbody id="load_ConfirmedBookings">
                                <tr style="cursor: pointer;" onclick="loadBookingDetails('#BK-2026-9041')">
                                    <td class="ps-4 font-monospace fw-semibold text-primary">#BK-2026-9041</td>
                                    <td>
                                        <div class="fw-bold text-dark">Eleanor Vance</div>
                                        <div class="text-muted small" style="font-size: 0.75rem;">Vance Tech Global Industries</div>
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark">Jade Ballroom</div>
                                        <div class="text-muted small">Macro Space Segment (Full Room Layout)</div>
                                    </td>
                                    <td>
                                        <div class="text-dark fw-medium">May 24, 2026</div>
                                        <div class="text-muted small font-monospace text-secondary">15:00 - 00:30</div>
                                    </td>
                                    <td class="text-end font-monospace text-dark fw-medium">250 Pax</td>
                                    <td class="pe-4 text-end">
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill fw-semibold">Space Locked</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>