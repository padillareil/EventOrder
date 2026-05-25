<div class="container my-5">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Header Actions Block -->
        <div class="card-body p-4 p-md-5 bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <div class="d-flex align-items-center gap-3 mb-1">
                        <button type="button" class="btn btn-link p-0 text-decoration-none text-secondary d-inline-flex align-items-center" onclick="loadBooking()">
                            <i class="bi bi-arrow-left fs-5"></i>
                        </button>
                        <h5 class="fw-semibold text-dark mb-0">Pencil Booking</h5>
                    </div>
                    <p class="text-muted small mb-0">Queue ID: <span class="font-monospace fw-bold text-primary">#BK-2026-9912</span></p>
                </div>
                
                <!-- Pipeline Action Workflow Buttons -->
                <div class="d-flex gap-3 ms-md-auto">
                    <button class="btn btn-secondary px-3 py-2 rounded-3 shadow" type="button" onclick="mdlReleasePencilHold('#BK-2026-9912')">
                        <i class="bi bi-x"></i> Cancel
                    </button>

                    <button class="btn btn-success px-3 py-2 rounded-3 shadow" type="button" onclick="mdlConvertProcessToConfirmed('#BK-2026-9912')">
                        <i class="bi bi-check-circle"></i> Confirm
                    </button>
                    
                    <button class="btn btn-dark px-3 py-2 rounded-3 shadow" type="button" onclick="mdlEditBookingHold('#BK-2026-9912')">
                        <i class="bi bi-pencil"></i> Edit
                    </button>
                </div>
            </div>
        </div>

        <!-- Master Data Grid Layout -->
        <div class="card-body p-3 p-md-5 bg-light-subtle">
            <div class="row g-4">
                
                <!-- Left Panel: Prospect Logistics & Conflict Parameters -->
                <div class="col-12 col-lg-5">
                    
                    <!-- Account Profile Summary Sub-Card -->
                    <div class="card border-0 rounded-4 shadow-sm bg-white p-4 mb-4">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-3">Prospect Guest Entity</small>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center font-monospace fw-bold fs-5" style="width: 48px; height: 48px;">
                                RA
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0">Regina Alfonso</h6>
                                <p class="text-muted small mb-0">Alfonso Realty Corp</p>
                            </div>
                        </div>
                        <hr class="text-muted opacity-25 my-3">
                        <div class="row g-2 text-secondary" style="font-size: 13px;">
                            <div class="col-4 font-monospace text-uppercase fs-7 text-muted">Email:</div>
                            <div class="col-8 text-dark fw-medium">r.alfonso@alfonsorealty.com</div>
                            <div class="col-4 font-monospace text-uppercase fs-7 text-muted">Contact:</div>
                            <div class="col-8 text-dark font-monospace">+63 (908) 412-8831</div>
                        </div>
                    </div>

                    <!-- Hold Parameters Sub-Card -->
                    <div class="card border-0 rounded-4 shadow-sm bg-white p-4 mb-4">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-3">Space Allocation Parameters</small>
                        
                        <div class="mb-3">
                            <label class="font-monospace text-uppercase fs-7 text-muted d-block mb-1">Requested Space Hub</label>
                            <div class="fw-bold text-dark"><i class="bi bi-geo-alt text-secondary me-1.5"></i>Jade Ballroom (Full Space)</div>
                        </div>

                        <div class="row g-3" style="font-size: 13px;">
                            <div class="col-6">
                                <label class="font-monospace text-uppercase fs-7 text-muted d-block mb-1">Proposed Date</label>
                                <span class="text-dark fw-semibold"><i class="bi bi-calendar3 me-1 text-muted"></i>May 24, 2026</span>
                            </div>
                            <div class="col-6">
                                <label class="font-monospace text-uppercase fs-7 text-muted d-block mb-1">Hold Expiry Warning</label>
                                <span class="text-danger fw-bold"><i class="bi bi-hourglass-bottom me-1"></i>In 48 Hours</span>
                            </div>
                            <div class="col-12">
                                <label class="font-monospace text-uppercase fs-7 text-muted d-block mb-1">Operational Time Node Window</label>
                                <span class="text-dark font-monospace fw-medium"><i class="bi bi-clock me-1 text-muted"></i>18:00 - 23:00</span>
                            </div>
                        </div>
                    </div>

                    <!-- Schedule Conflict Warnings Module -->
                    <div class="card border border-danger-subtle rounded-4 shadow-sm bg-white p-4">
                        <small class="text-uppercase tracking-wider text-danger font-monospace fs-7 d-block mb-2 fw-bold">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i> Operational Block Conflict Detected
                        </small>
                        <p class="text-muted small mb-3">This space contains an overlapping confirmed assignment cell on the selected date window matrix.</p>
                        
                        <div class="p-3 bg-light rounded-3 text-secondary" style="font-size: 13px;">
                            <div class="fw-bold text-dark mb-1">Conflicting Block:</div>
                            <div class="font-monospace small mb-1"><a href="#" onclick="viewConfirmedOrder('#EV-2026-0524')">#EV-2026-0524</a> (Vance Tech)</div>
                            <div class="small text-muted"><i class="bi bi-clock me-1"></i> 15:00 - 00:30 (Space Locked)</div>
                        </div>
                    </div>

                </div>

                <!-- Right Panel: Proposed Package Specs & Option Guidelines -->
                <div class="col-12 col-lg-7">
                    
                    <!-- Catering Package Concept Draft -->
                    <div class="card border-0 rounded-4 shadow-sm bg-white p-4 p-md-5 mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-bold text-dark mb-0">Proposed Catering Setup</h6>
                            <span class="badge bg-light text-dark border px-2.5 py-1 rounded-2 font-monospace text-uppercase fs-7">Target: Gold Buffet Package</span>
                        </div>

                        <!-- System Serving Format Configuration Banner -->
                        <div class="p-3 bg-light rounded-3 mb-4 d-flex align-items-center justify-content-between" style="font-size: 13px;">
                            <span class="text-secondary fw-medium"><i class="bi bi-layers-half text-primary me-2"></i>Target Serving Configuration:</span>
                            <span class="fw-bold text-dark font-monospace text-uppercase">Platter Serving System</span>
                        </div>

                        <!-- Categorized Food Program Sections -->
                        <div class="space-y-3" style="font-size: 13px;">
                            <div class="row border-bottom pb-2 mb-2">
                                <div class="col-4 font-monospace text-uppercase fs-7 text-muted fw-medium">Hors d'oeuvres / Soups</div>
                                <div class="col-8 text-dark fw-semibold text-muted italic">Draft Pending: Client reviewing appetizer selections</div>
                            </div>
                            <div class="row border-bottom pb-2 mb-2">
                                <div class="col-4 font-monospace text-uppercase fs-7 text-muted fw-medium">Main Entrée Program</div>
                                <div class="col-8 text-dark fw-semibold">
                                    Braised Beef Pot Roast, Herb-Crusted Chicken Fillet, Baked Fish Platter, Steamed Jasmine Rice Node
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 font-monospace text-uppercase fs-7 text-muted fw-medium">Beverage Solutions</div>
                                <div class="col-8 text-dark fw-semibold">
                                    Bottomless Red Iced Tea Solution
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Est Valuation Estimation -->
                    <div class="card border-0 rounded-4 shadow-sm bg-white overflow-hidden">
                        <!-- Component Table Context Header Header -->
                        <div class="px-4 pt-4 pb-3 d-flex justify-content-between align-items-center border-bottom bg-white">
                            <div>
                                <h6 class="fw-bold text-dark mb-0">
                                    <i class="bi bi-receipt-cutoff text-secondary me-2.5"></i> Estimation
                                </h6>
                            </div>
                        </div>

                        <!-- Enhanced Data Table Grid Structure -->
                        <div class="table-responsive">
                            <table class="table table-hover table-striped-columns align-middle mb-0" style="font-size: 13px;">
                                <thead class="table-light text-secondary font-monospace text-uppercase border-bottom" style="height: 42px; font-size: 11px;">
                                    <tr>
                                        <th class="ps-4 fw-bold" style="width: 45%;">Cost structure allocation</th>
                                        <th class="text-center fw-bold" style="width: 30%;">Calculation Metrics</th>
                                        <th class="pe-4 text-end fw-bold" style="width: 25%;">Subtotal (PHP)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Itemized Cost Allocation Cell 1 -->
                                    <tr>
                                        <td class="ps-4 py-3">
                                            <div class="fw-bold text-dark">Gold Menu Quotation Model</div>
                                            <div class="text-muted small" style="font-size: 0.75rem;">Standard Buffet Catering Package Plane</div>
                                        </td>
                                        <td class="text-center font-monospace text-secondary">
                                            ₱1,000.00 <span class="text-muted small">×</span> 180 Pax
                                        </td>
                                        <td class="pe-4 text-end font-monospace text-dark fw-semibold">
                                            ₱180,000.00
                                        </td>
                                    </tr>

                                    <!-- Itemized Cost Allocation Cell 2 -->
                                    <tr>
                                        <td class="ps-4 py-3">
                                            <div class="fw-bold text-dark">Jade Ballroom Base Rent</div>
                                            <div class="text-muted small" style="font-size: 0.75rem;">Fixed Structural Block Setup Operational Fee</div>
                                        </td>
                                        <td class="text-center font-monospace text-muted small">
                                            Flat Allocation Unit
                                        </td>
                                        <td class="pe-4 text-end font-monospace text-dark fw-semibold">
                                            ₱80,000.00
                                        </td>
                                    </tr>

                                    <!-- Consolidated Calculation Total Aggregate State Block -->
                                    <tr class="table-dark border-top border-dark-subtle">
                                        <td class="ps-4 py-3" colspan="2">
                                            <div class="fw-bold text-white mb-0">Estimated Contract Value</div>
                                        </td>
                                        <td class="pe-4 text-end align-middle font-monospace text-warning fw-bold fs-6">
                                            ₱260,000.00
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
</div>