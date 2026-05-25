<div class="container my-4">
    <!-- Header with Sleek Back Button -->
    <div class="d-flex mb-4 align-items-center gap-3">
        <button type="button" class="btn btn-light btn-sm rounded-circle p-2 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px;" title="Go back to Dashboard" onclick="loadDashboard()">
            <i class="bi bi-arrow-left text-secondary fs-5"></i>
        </button>
        <div>
            <h5 class="fw-bold text-dark mb-1">Global Settings</h5>
            <p class="text-muted small mb-0">Configure system rules, monitor events, security overrides, and financial controls for all properties.</p>
        </div>
    </div>

    <!-- Redesigned Metric Grid: Administrative Settings Categories -->
    <div class="row g-3">
        

        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100" style="cursor: pointer;" onclick="loadFinancialSchemas()">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="bi bi-calendar-range fs-5"></i>
                    </div>
                    <div>
                        <span class="text-muted small fw-medium d-block mb-0">View Calendar of Events</span>
                        <h4 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">Event Calendar</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Financial & Tax Schemas (VAT, Service Charges) -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100" style="cursor: pointer;" onclick="loadFinancialSchemas()">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-info-subtle text-info rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="bi bi-receipt-cutoff fs-5"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-medium d-block mb-0">View Booking Approvals</span>
                        <h4 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">Approval</h4>
                    </div>
                </div>
            </div>
        </div>

       

        



        <!-- 3. Financial & Tax Schemas (VAT, Service Charges) -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100" style="cursor: pointer;" onclick="loadFinancialSchemas()">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-info-subtle text-info rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="bi bi-receipt-cutoff fs-5"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-medium d-block mb-0">View Amendments</span>
                        <h4 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">Amendments</h4>
                    </div>
                </div>
            </div>
        </div>


        <!-- 3. Financial & Tax Schemas (VAT, Service Charges) -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100" style="cursor: pointer;" onclick="loadFinancialSchemas()">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-info-subtle text-info rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="bi bi-receipt-cutoff fs-5"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-medium d-block mb-0">View Event Order Contracts</span>
                        <h4 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">Contracts</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Security & Permissions Override (Pins, Roles) -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100" style="cursor: pointer;" onclick="loadSecurityPermissions()">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="bi bi-file-earmark-text fs-5"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-medium d-block mb-0">Event Policies Settings</span>
                        <h4 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">Hotel Policies</h4>
                    </div>
                </div>
            </div>
        </div>


        <!-- 7. Credit & Cancellation Management (Risk parameters) -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100" style="cursor: pointer;" onclick="loadCreditRiskControls()">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="bi bi-flag fs-5"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-medium d-block mb-0">View Event Charges</span>
                        <h4 class="fw-bold text-dark mb-0" style="font-size: 1.25rem;">Charges Report</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>