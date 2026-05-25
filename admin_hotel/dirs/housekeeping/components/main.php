<div class="container my-5">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Header Actions Block -->
        <div class="card-body p-4 bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <h5 class="fw-bold text-dark mb-1">Housekeeping Reports</h5>
                    <p class="text-muted small mb-0">Review sub-item consumption logs, mini-bar deductions, and amenity replenishment reports from floor staff.</p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-3 ms-md-auto">
                    <!-- Search Input -->
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 240px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-hk-report" placeholder="Search...">
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Data Grid Layout -->
        <div class="card-body p-2 p-md-4 bg-light-subtle">
            <div class="justify-content-end d-flex mb-2 mb-2">
                <nav aria-label="Log page navigation">
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
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 50vh;">
                <table class="table table-borderless table-hover align-middle mb-0" style="font-size: 13px;">
                    <thead class="sticky-top bg-white border-bottom align-middle text-secondary font-monospace text-uppercase" style="z-index: 5; height: 48px;">
                        <tr>
                            <th class="ps-4 fw-bold" style="width: 90px;">Room</th>
                            <th class="fw-bold">Reported Items & Variances</th>
                            <th class="fw-bold">Report Type</th>
                            <th class="fw-bold">Submitted By</th>
                            <th class="fw-bold text-end">Timestamp</th>
                            <th class="pe-4 fw-bold text-end" style="width: 150px;">Billing Action</th>
                        </tr>
                    </thead>
                    <tbody id="load_HousekeepingReports">

                        <!-- Example 1: Mini-Bar Consumption (Chargeable) -->
                        <tr style="cursor: pointer;" onclick="viewReportDetails(101)">
                            <td class="ps-4 font-monospace fw-bold text-dark fs-6">402</td>
                            <td>
                                <div class="fw-bold text-dark">2x Softdrinks, 1x Pringles</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Mini-Bar inventory consumed by guest</div>
                            </td>
                            <td>
                                <span class="badge bg-warning-subtle text-warning border px-2 py-1 rounded-2 fw-medium">Mini-Bar Consumption</span>
                            </td>
                            <td>
                                <div class="text-dark fw-medium">Remo Santos</div>
                                <span class="text-muted small" style="font-size: 0.75rem;">Floor 4 Attendant</span>
                            </td>
                            <td class="text-end font-monospace text-muted">Today, 11:24 AM</td>
                            <td class="pe-4 text-end">
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2.5 py-1.5 rounded-pill fw-semibold">Charge to Folio</span>
                            </td>
                        </tr>

                        <!-- Example 2: Amenity Replenishment (Standard Restock) -->
                        <tr style="cursor: pointer;" onclick="viewReportDetails(102)">
                            <td class="ps-4 font-monospace fw-bold text-dark fs-6">314</td>
                            <td>
                                <div class="fw-bold text-dark">4x Bath Gel, 2x Vanity Kits</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Standard complimentary guest replenishment</div>
                            </td>
                            <td>
                                <span class="badge bg-info-subtle text-info border px-2 py-1 rounded-2 fw-medium">Amenity Restock</span>
                            </td>
                            <td>
                                <div class="text-dark fw-medium">Maria Clara</div>
                                <span class="text-muted small" style="font-size: 0.75rem;">Floor 3 Attendant</span>
                            </td>
                            <td class="text-end font-monospace text-muted">Today, 09:15 AM</td>
                            <td class="pe-4 text-end">
                                <span class="badge bg-light text-secondary border px-2.5 py-1.5 rounded-pill fw-semibold">Complimentary</span>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>