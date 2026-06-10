<div class="container-fluid">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Header Actions Block -->
        <div class="card-body bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <h5 class="fw-bold text-dark mb-1">Ingredients</h5>
                    <p class="text-muted small mb-0">Browse available ingredients, pricing, and menu categories.</p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-3 ms-md-auto">
                    <!-- Search Input Wrapper -->
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-event-order" placeholder="Search...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Master Data Grid Layout -->
        <div class="card-body  bg-light-subtle">
            <div class="mb-3 justify-content-end d-flex">
                <nav aria-label="Event order directory page navigation">
                    <ul class="pagination pagination-sm mb-0 gap-1" id="pagination-event-order">
                        <li class="page-item" id="li-prev-order">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-preview-order">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item" id="li-next-order">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-next-order">
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
                            <th class="ps-4 fw-bold" style="width: 120px;">Order ID</th>
                            <th class="fw-bold">Engager</th>
                            <th class="fw-bold">Schedule &  Venue</th>
                            <th class="fw-bold">Setup Configuration</th>
                            <th class="fw-bold text-end">Total Revenue</th>
                            <th class="pe-4 fw-bold text-end" style="width: 160px;">Booking State</th>
                        </tr>
                    </thead>
                    <tbody id="load_EventOrderLists">

                        <!-- Population State Example 1 (Confirmed Event) -->
                        <tr style="cursor: pointer;" onclick="loadEventOrderProfile('#EV-2026-0524')">
                            <td class="ps-4 font-monospace fw-semibold text-primary">#EV-2026-0524</td>
                            <td>
                                <div class="fw-bold text-dark">Eleanor Vance</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Vance Tech Global Industries</div>
                            </td>
                            <td>
                                <div class="text-dark fw-medium">May 24, 2026</div>
                                <div class="text-muted small"><i class="bi bi-geo-alt me-1"></i> Jade Ballroom (Sec. A)</div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">250 Pax Attendance</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Serving Method: Banquet Round</div>
                            </td>
                            <td class="text-end font-monospace fw-bold text-dark">PHP 425,000.00</td>
                            <td class="pe-4 text-end">
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill fw-semibold">Confirmed</span>
                            </td>
                        </tr>

                        <!-- Population State Example 2 (Proposal/Pending Event) -->
                        <tr style="cursor: pointer;" onclick="loadEventOrderProfile('#EV-2026-0712')">
                            <td class="ps-4 font-monospace fw-semibold text-primary">#EV-2026-0712</td>
                            <td>
                                <div class="fw-bold text-dark">Marcus Cheng</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Nexus Financial Group</div>
                            </td>
                            <td>
                                <div class="text-dark fw-medium">July 12, 2026</div>
                                <div class="text-muted small"><i class="bi bi-geo-alt me-1"></i> Ocean Boardroom</div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">35 Pax Attendance</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Serving Method: U-Shape Layout</div>
                            </td>
                            <td class="text-end font-monospace text-dark fw-bold">PHP 68,500.00</td>
                            <td class="pe-4 text-end">
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill fw-semibold">Pencil Booking</span>
                            </td>
                        </tr>

                        <!-- Population State Example 3 (Tentative Lead) -->
                        <tr style="cursor: pointer;" onclick="loadEventOrderProfile('#EV-2026-0805')">
                            <td class="ps-4 font-monospace fw-semibold text-primary">#EV-2026-0805</td>
                            <td>
                                <div class="fw-bold text-dark">Dr. Amanda Reyes</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">St. Luke's Medical Association</div>
                            </td>
                            <td>
                                <div class="text-dark fw-medium">Aug 05, 2026</div>
                                <div class="text-muted small"><i class="bi bi-geo-alt me-1"></i> Roof Deck Garden</div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">120 Pax Attendance</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Serving Method: Cocktail Standup</div>
                            </td>
                            <td class="text-end font-monospace text-dark fw-bold">PHP 185,000.00</td>
                            <td class="pe-4 text-end">
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill fw-semibold">Confirmed</span>
                            </td>
                        </tr>

                        <!-- Empty State View Component (Hidden dynamically behind list evaluation checks) -->
                        <!-- 
                        <tr>
                            <td colspan="6" class="py-5 text-center">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center p-3 text-muted">
                                        <i class="bi bi-calendar-x fs-3"></i>
                                    </div>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">No event orders found</h6>
                                <p class="text-muted small mb-0">No active function pipeline contracts or booking entries match this dataset filter range.</p>
                            </td>
                        </tr>
                        -->

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>