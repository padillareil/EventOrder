<div class="container my-5">
    
    <!-- Header Block -->
    <div class="mb-4">
        <h4 class="fw-bold text-dark mb-1">Contract Approvals Portal</h4>
        <p class="text-muted small mb-0">Review financial terms, audit liability clauses, and execute corporate signatures on pending property contracts.</p>
    </div>

    <!-- Section 1: Business-Focused Analytics Metrics -->
    <div class="row g-3 mb-4">
        <!-- Metric 1: Total Forecasted Gross Revenue -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-graph-up-arrow fs-5"></i>
                    </div>
                    <div>
                        <div class="text-secondary small fw-medium">Forecasted Revenue</div>
                        <h4 class="fw-bold text-dark mb-0">₱184,500</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Metric 2: Confirmed/Approved Billings -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-check2-circle fs-5"></i>
                    </div>
                    <div>
                        <div class="text-secondary small fw-medium">Approved Billings</div>
                        <h4 class="fw-bold text-dark mb-0">₱142,800</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Metric 3: Target Approval Action Volume (Fixed) -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning-subtle text-warning rounded-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-file-earmark-check fs-5"></i>
                    </div>
                    <div>
                        <div class="text-secondary small fw-medium">Awaiting Contract</div>
                        <h4 class="fw-bold text-dark mb-0">12</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Metric 4: Cancelled Revenue Loss Impact -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-x-circle fs-5"></i>
                    </div>
                    <div>
                        <div class="text-secondary small fw-medium">Cancelled Contracts</div>
                        <h4 class="fw-bold text-dark mb-0">4</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: Main Split Workspace -->
    <div class="row g-4">
        
        <!-- Left Side: Clean Ticket Row Queue -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 bg-white h-100">
                
                <!-- Inner Layout Controls Header -->
                <div class="card-body p-4 border-bottom d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3 flex-grow-1 flex-md-grow-0">
                        <div class="input-group border rounded-3 bg-white  shadow-sm" style="max-width: 240px;">
                            <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                                <i class="bi bi-search text-muted" style="font-size: 13px;"></i>
                            </span>
                            <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-approvals" placeholder="Search...">
                        </div>
                    </div>
                </div>

                <!-- Pure Compact Row List Content -->
                <div class="card-body p-3 bg-light-subtle">
                    <div class="d-flex flex-column gap-2" id="load_EventApprovalList">
                        
                        <!-- Contract Row Item 1 -->
                        <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border shadow-xs">
                            <!-- Ticket/BEO Unique Code -->
                            <div class="bg-light border text-secondary font-monospace fw-bold rounded-3 px-3 py-2 text-center" style="min-width: 95px; font-size: 12px;" title="Event Order Number">
                                #EO-9024
                            </div>
                            
                            <!-- Middle Summary Content -->
                            <div class="flex-grow-1">
                                <div class="small fw-semibold text-dark mb-0.5">Tech Summit Keynote & Gala Dinner</div>
                                <div class="text-muted fs-7">Grand Plaza Resort &bull; 250 Pax Banquet Contract submitted by Sales Executive Michael Chang.</div>
                            </div>
                            
                            <!-- Context Direct Actions -->
                            <div class="d-flex gap-1.5 align-items-center">
                                <button type="button" class="btn btn-white border shadow-xs btn-sm rounded-2 fw-medium text-dark px-3" onclick="viewContractDetails(9024)">
                                    View
                                </button>
                            </div>
                        </div>

                        <!-- Contract Row Item 2 -->
                        <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border shadow-xs">
                            <!-- Ticket/BEO Unique Code -->
                            <div class="bg-light border text-secondary font-monospace fw-bold rounded-3 px-3 py-2 text-center" style="min-width: 95px; font-size: 12px;" title="Event Order Number">
                                #EO-8971
                            </div>
                            
                            <!-- Middle Summary Content -->
                            <div class="flex-grow-1">
                                <div class="small fw-semibold text-dark mb-0.5">Goldman Wedding Reception Dinner</div>
                                <div class="text-muted fs-7">Oceanview Pavilion &bull; Premium Beverage Package & Catering Order logged by Sarah Jenkins.</div>
                            </div>
                            
                            <!-- Context Direct Actions -->
                            <div class="d-flex gap-1.5 align-items-center">
                                <button type="button" class="btn btn-white border shadow-xs btn-sm rounded-2 fw-medium text-dark px-3" onclick="viewContractDetails(8971)">
                                    View
                                </button>
                            </div>
                        </div>

                        <!-- Contract Row Item 3 -->
                        <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border shadow-xs">
                            <!-- Ticket/BEO Unique Code -->
                            <div class="bg-light border text-secondary font-monospace fw-bold rounded-3 px-3 py-2 text-center" style="min-width: 95px; font-size: 12px;" title="Event Order Number">
                                #EO-8955
                            </div>
                            
                            <!-- Middle Summary Content -->
                            <div class="flex-grow-1">
                                <div class="small fw-semibold text-dark mb-0.5">Medical Conference Luncheon</div>
                                <div class="text-muted fs-7">Summit Alpine Lodge &bull; Custom Dietary / Halal and Vegan Menu parameters pending audit.</div>
                            </div>
                            
                            <!-- Context Direct Actions -->
                            <div class="d-flex gap-1.5 align-items-center">
                                <button type="button" class="btn btn-white border shadow-xs btn-sm rounded-2 fw-medium text-dark px-3" onclick="viewContractDetails(8955)">
                                    View
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Filter Scope & Management Shortcuts -->
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 bg-white h-100">
                
                <!-- Module Header -->
                <div class="card-body p-4 border-bottom">
                    <h6 class="fw-bold text-dark mb-1">Menus</h6>
                    <p class="text-muted small mb-0">Reconcile property accounts, audit signed files, and track canceled asset values.</p>
                </div>
                
                <!-- Management Actions Body -->
                <div class="card-body p-4 d-flex flex-column gap-2">
                    
                    <!-- Shortcut 1: Calendar of Events -->
                    <button type="button" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow" onclick="loadCalendarEvents()">
                        <span><i class="bi bi-calendar3 me-2 text-primary"></i> Calendar of Events</span>
                        <i class="bi bi-chevron-right fs-7 text-muted"></i>
                    </button>
                    
                    <!-- Shortcut 2: View All Contracts -->
                    <button type="button" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow" onclick="viewAllContracts()">
                        <span><i class="bi bi-file-earmark-text me-2 text-dark"></i> View All Contracts</span>
                        <i class="bi bi-chevron-right fs-7 text-muted"></i>
                    </button>
                    <!-- Primary Accounting Action: Revenue Recognition / Audit Export -->
                    <button class="btn btn-dark text-center p-3 rounded-3 fw-medium mt-2 shadow-sm" type="button" onclick="exportAccountingLedger()">
                        <i class="bi bi-download me-1.5"></i> Export Financial Ledger
                    </button>
                    
                </div>
            </div>
        </div>
        
    </div>
</div>