<div class="container my-5">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Header Actions Block -->
        <div class="card-body p-4 p-md-5 bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <h5 class="fw-bold text-dark mb-1">Function Master Records</h5>
                    <p class="text-muted small mb-0">Configure primary hotel venue hubs and sub-partition parameters.</p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-3 ms-md-auto">
                    <!-- Search Input Wrapper -->
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-venue" placeholder="Search...">
                    </div>
                    
                    <!-- Add Function Master Action Button -->
                    <button class="btn btn-dark px-3 py-2 rounded-3 fw-medium d-flex align-items-center shadow-sm" type="button" onclick="mdlAddFunctionSpace()">
                        <i class="bi bi-plus me-1.5"></i> Add Function
                    </button>
                </div>
            </div>
        </div>

        <!-- Master Data Grid Layout -->
        <div class="card-body p-2 p-md-5 bg-light-subtle">
            
            <!-- Filter & Pagination Alignment Row -->
            <div class="mb-3 justify-content-end d-flex">
                <nav aria-label="Venue directory page navigation">
                    <ul class="pagination pagination-sm mb-0 gap-1" id="pagination-venue">
                        <li class="page-item" id="li-prev-venue">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-preview-venue">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item" id="li-next-venue">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-next-venue">
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
                            <th class="ps-4 fw-bold" style="width: 100px;">Asset ID</th>
                            <th class="fw-bold">Main Function Hall</th>
                            <th class="fw-bold">Structural Blueprint</th>
                            <th class="fw-bold">Max Capacity</th>
                            <th class="fw-bold text-end">Base Rent / Block</th>
                            <th class="pe-4 fw-bold text-end" style="width: 160px;">Operational Status</th>
                        </tr>
                    </thead>
                    <tbody id="load_FunctionVenueLists">

                        <!-- Population State Example 1 (Jade Ballroom) -->
                        <tr style="cursor: pointer;" onclick="loadFunctionProfile('#VEN-MNH-01')">
                            <td class="ps-4 font-monospace fw-medium text-secondary">#VEN-MNH01</td>
                            <td>
                                <div class="fw-bold text-dark">Jade Ballroom</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Macro Space Cell (Zones A + B)</div>
                            </td>
                            <td>
                                <div class="text-dark">24,000 sq. ft. Total Floor</div>
                                <div class="text-muted small"><i class="bi bi-layers-half me-1"></i> 2 Acoustic Sub-Partitions</div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">800 Pax Max</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Optimized: Banquet Round</div>
                            </td>
                            <td class="text-end font-monospace fw-bold text-dark">PHP 120,000.00</td>
                            <td class="pe-4 text-end">
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill fw-semibold">Online & Available</span>
                            </td>
                        </tr>

                        <!-- Population State Example 2 (Pearl Ballroom) -->
                        <tr style="cursor: pointer;" onclick="loadFunctionProfile('#VEN-MNH-02')">
                            <td class="ps-4 font-monospace fw-medium text-secondary">#VEN-MNH02</td>
                            <td>
                                <div class="fw-bold text-dark">Pearl Ballroom</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Compact Hall Node</div>
                            </td>
                            <td>
                                <div class="text-dark">12,000 sq. ft. Total Floor</div>
                                <div class="text-muted small text-muted"><i class="bi bi-slash-circle me-1"></i> Standalone No Partitions</div>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">350 Pax Max</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">Optimized: Theater Setup</div>
                            </td>
                            <td class="text-end font-monospace text-dark fw-bold">PHP 75,000.00</td>
                            <td class="pe-4 text-end">
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2.5 py-1.5 rounded-pill fw-semibold">In Transition</span>
                            </td>
                        </tr>

                        <!-- Empty State View Component (Hidden dynamically behind list evaluation checks) -->
                        <!-- 
                        <tr>
                            <td colspan="6" class="py-5 text-center">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center p-3 text-muted">
                                        <i class="bi bi-building-gear fs-3"></i>
                                    </div>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">No master function records found</h6>
                                <p class="text-muted small mb-0">No active macro or micro function architectural allocations are loaded in this property cell.</p>
                            </td>
                        </tr>
                        -->

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>