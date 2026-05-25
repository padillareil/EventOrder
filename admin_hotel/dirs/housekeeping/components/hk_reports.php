<div class="container col-md-8 my-5">

    <!-- Housekeeping Report Breakdown Header Actions Panel -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        
        <!-- Left Group: Navigation Anchor & Report Reference Identity -->
        <div class="d-flex align-items-center gap-3">
            <!-- Circular Navigation Back Button -->
            <button type="button" class="btn btn-light btn-sm rounded-circle p-0 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px; min-width: 36px;" title="Back to housekeeping logs" onclick="loadHouseKeeping()">
                <i class="bi bi-arrow-left text-secondary fs-5"></i>
            </button>
            
            <!-- Context Text Titles -->
            <div>
                <h5 class="fw-bold text-dark mb-1">Housekeeping Item Report</h5>
                <p class="text-muted small mb-0">Operational Node ID: <span class="font-monospace fw-bold text-dark">#HK-REP-2026-1001</span></p>
            </div>
        </div>
        
        <!-- Right Group: Operational Action Utilities -->
        <div class="d-flex align-items-center gap-2 flex-wrap justify-content-md-end">
            <button type="button" class="btn btn-primary border shadow-sm rounded-3 px-3 py-2 small fw-medium" onclick="window.print()">
                <i class="bi bi-printer me-1.5"></i> Print Summary
            </button>
        </div>

    </div>

    <!-- Single Unified Master Report Card -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-4 p-md-5">
        
        <!-- Section 1: Reporter Identity & Targeted Room Specs -->
        <div class="row g-3 border-bottom pb-4 mb-4">
            <div class="col-12 col-sm-6">
                <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-1">Reporter Accountability Summary</small>
                <div class="fw-bold text-dark mb-0.5">Remo Santos</div>
                <div class="text-muted small">Floor Attendant — Team Alpha (Floors 3-5)</div>
                <div class="text-muted small">Duty Schedule Assignment: Morning Shift</div>
            </div>
            <div class="col-12 col-sm-6 text-sm-end">
                <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-1">Target Room Coordinates</small>
                <div class="fw-bold text-dark mb-0.5">Room 402 (Executive Suite)</div>
                <div class="text-muted small">Physical Location: 4th Floor — West Wing Terminal</div>
                <div class="text-muted small">Current Room Allocation State: Vacant / Departed</div>
            </div>
        </div>

        <!-- Section 2: Core Report Metadata Summary Metrics -->
        <div class="row g-3 mb-4 bg-light rounded-3 p-3 mx-0">
            <div class="col-6 col-md-3">
                <div class="text-secondary small">Report Classification</div>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-0.5 rounded fw-medium">Mini-Bar Consumption</span>
            </div>
            <div class="col-6 col-md-3">
                <div class="text-secondary small">Billing Action Workflow</div>
                <span class="text-danger small fw-bold">Charge to Folio</span>
            </div>
            <div class="col-6 col-md-3">
                <div class="text-secondary small">Verification Pipeline</div>
                <span class="text-success small fw-medium"><i class="bi bi-check-circle me-1"></i>Auto-Posted to PMS</span>
            </div>
            <div class="col-6 col-md-3 text-md-end">
                <div class="text-secondary small">Submission Timestamp</div>
                <span class="text-dark font-monospace small fw-semibold">May 18, 2026 11:24 AM</span>
            </div>
        </div>

        <!-- Section 3: Itemized Inventory Variance Manifest -->
        <div class="mb-4">
            <h6 class="fw-bold text-dark mb-3"><i class="bi bi-box-seam text-secondary me-2"></i>Inventory Variance Ledger</h6>
            
            <div class="table-responsive">
                <table class="table table-hover align-middle border-top mb-0" style="font-size: 13px;">
                    <thead class="table-light font-monospace text-secondary text-uppercase fs-7">
                        <tr>
                            <th>Item Master Code</th>
                            <th>Item Asset Name</th>
                            <th>Reported Category</th>
                            <th class="text-end">Quantity Used</th> 
                            <th class="text-end">Unit Cost</th>
                            <th class="text-end">Aggregate Fee</th>
                        </tr>
                    </thead>
                    <tbody class="text-secondary">
                        <!-- Row Item 1 -->
                        <tr>
                            <td class="font-monospace text-dark fw-medium">#INV-MB-041</td>
                            <td class="fw-semibold text-dark">San Miguel Beer (Can)</td>
                            <td>Mini-Bar Chargeable Item</td>
                            <td class="text-end text-dark font-monospace fw-medium">2 pcs</td>
                            <td class="text-end font-monospace">PHP 140.00</td>
                            <td class="text-end text-dark font-monospace fw-bold">PHP 280.00</td>
                        </tr>
                        <!-- Row Item 2 -->
                        <tr>
                            <td class="font-monospace text-dark fw-medium">#INV-MB-102</td>
                            <td class="fw-semibold text-dark">Piattos Potato Chips (Large)</td>
                            <td>Mini-Bar Chargeable Item</td>
                            <td class="text-end text-dark font-monospace fw-medium">1 pc</td>
                            <td class="text-end font-monospace">PHP 95.00</td>
                            <td class="text-end text-dark font-monospace fw-bold">PHP 95.00</td>
                        </tr>
                        <!-- Row Item 3 -->
                        <tr>
                            <td class="font-monospace text-muted">#INV-AM-002</td>
                            <td class="fw-semibold text-muted">Conditioning Shampoo (Vanity Box)</td>
                            <td>Complimentary Amenity Restock</td>
                            <td class="text-end text-muted font-monospace">4 pcs</td>
                            <td class="text-end font-monospace text-muted">PHP 0.00</td>
                            <td class="text-end text-muted font-monospace">PHP 0.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Section 4: Attendant Remarks & Internal System Directives -->
        <div class="border-top pt-4">
            <h6 class="fw-bold text-dark mb-2">Attendant Operational Notes</h6>
            <div class="p-3 border rounded-3 bg-light-subtle mb-0 text-secondary fs-7 shadow-xs">
                <i class="bi bi-chat-left-text me-2 text-primary"></i>
                "Guest consumed standard mini-bar items located in the mini-refrigerator rack. Restocked placeholders immediately from floor cart inventory module. Bathroom vanity set replenished as per standard operating protocol setup guidelines. No damaged structural room assets observed during clearance."
            </div>
        </div>

    </div>

</div>