<div class="container my-5">

    <!-- SOA Header Actions Panel -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        
        <!-- Left Group: Navigation Anchor & Identity Information -->
        <div class="d-flex align-items-center gap-3">
            <!-- Circular Navigation Back Button -->
            <button type="button" class="btn btn-light btn-sm rounded-circle p-0 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px; min-width: 36px;" title="Go back to master account list" onclick="loadStatementOfAccount()">
                <i class="bi bi-arrow-left text-secondary fs-5"></i>
            </button>
            
            <!-- Context Text Titles -->
            <div>
                <h5 class="fw-bold text-dark mb-1">Statement of Account (SOA)</h5>
                <p class="text-muted small mb-0">Folio Reference: <span class="font-monospace fw-bold text-dark">#SOA-2026-0924</span></p>
            </div>
        </div>
        
        <!-- Right Group: Financial Action Utilities -->
        <div class="d-flex align-items-center gap-2 justify-content-md-end">
            <button type="button" class="btn btn-white border shadow text-secondary rounded-3 px-3 py-2 small fw-medium" onclick="window.print()">
                <i class="bi bi-printer me-1.5"></i> Print Statement
            </button>
            <button type="button" class="btn btn-success shadow rounded-3 px-3 py-2 small fw-medium shadow-sm" onclick="processFinalSettlement()">
                <i class="bi bi-credit-card me-1.5"></i> Post Settlement
            </button>
        </div>

    </div>

    <div class="row g-4">
        <!-- Left Column: Master Invoice Profile & Itemized Transaction Ledger -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                
                <!-- Entity Billing Profiles -->
                <div class="row g-3 border-bottom pb-4 mb-4">
                    <div class="col-12 col-sm-6">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-1">Property Remit To</small>
                        <div class="fw-bold text-dark mb-0.5">Grand Plaza Resort & Spa</div>
                        <div class="text-muted small">Financial Accounts Receivable Dept.</div>
                        <div class="text-muted small">ledger@grandplazaresort.com</div>
                    </div>
                    <div class="col-12 col-sm-6 text-sm-end">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-1">Bill To Client Account</small>
                        <div class="fw-bold text-dark mb-0.5">Tech Summit Corporate Group</div>
                        <div class="text-muted small">Attn: Accounts Payable / Michael Chang</div>
                        <div class="text-muted small">Tax ID: RE-902441-X</div>
                    </div>
                </div>

                <!-- Event Reference Metadata Metadata Grid -->
                <div class="row g-3 mb-4 bg-light rounded-3 p-3 mx-0">
                    <div class="col-6 col-md-3">
                        <div class="text-secondary small">Master Contract</div>
                        <span class="font-monospace fw-semibold text-dark">#CT-9024</span>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-secondary small">Event Date Scope</div>
                        <span class="text-dark small fw-medium">May 15-16, 2026</span>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-secondary small">Folio Status</div>
                        <span class="badge bg-info-subtle text-info border px-2 py-0.5 rounded fs-8 fw-medium">Pending Settlement</span>
                    </div>
                    <div class="col-6 col-md-3 text-md-end">
                        <div class="text-secondary small">Statement Date</div>
                        <span class="text-dark small fw-medium">May 16, 2026</span>
                    </div>
                </div>

                <!-- Itemized Transaction Ledger Table -->
                <div class="mb-2">
                    <h6 class="fw-bold text-dark mb-3">Transaction Ledger</h6>
                    <div class="justify-content-end d-flex mb-2 mt-2">
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
                    <div class="table-responsive">
                        <table class="table table-hover align-middle border-top mb-0" style="font-size: 13px;">
                            <thead class="table-light font-monospace text-secondary text-uppercase fs-7">
                                <tr>
                                    <th>Posting Date</th>
                                    <th> Reference Code</th>
                                    <th>Description</th>
                                    <th class="text-end">Charges</th>
                                    <th class="text-end">Credits</th>
                                </tr>
                            </thead>
                            <tbody class="text-secondary">
                                <!-- Row Item 1 -->
                                <tr>
                                    <td class="font-monospace">2026-05-15</td>
                                    <td class="font-monospace text-dark">#REV-ROOMS</td>
                                    <td>Corporate Group Room Block Corporate Commitments (50 Nights)</td>
                                    <td class="text-end text-dark font-monospace">₱12,500.00</td>
                                    <td class="text-end text-muted font-monospace">-</td>
                                </tr>
                                <!-- Row Item 2 -->
                                <tr>
                                    <td class="font-monospace">2026-05-15</td>
                                    <td class="font-monospace text-dark">#DEP-ESCROW</td>
                                    <td>Initial Advance Deposit Guarantee Account Credit Wire</td>
                                    <td class="text-end text-muted font-monospace">-</td>
                                    <td class="text-end text-success font-monospace">(₱15,000.00)</td>
                                </tr>
                                <!-- Row Item 3 -->
                                <tr>
                                    <td class="font-monospace">2026-05-16</td>
                                    <td class="font-monospace text-dark">#REV-BANQ</td>
                                    <td>Main Ballroom Keynote Venue Rental Fee</td>
                                    <td class="text-end text-dark font-monospace">₱15,000.00</td>
                                    <td class="text-end text-muted font-monospace">-</td>
                                </tr>
                                <!-- Row Item 4 -->
                                <tr>
                                    <td class="font-monospace">2026-05-16</td>
                                    <td class="font-monospace text-dark">#REV-CATER</td>
                                    <td>Gala Dinner Banquet Food Plating Operations (250 Pax)</td>
                                    <td class="text-end text-dark font-monospace">₱13,200.00</td>
                                    <td class="text-end text-muted font-monospace">-</td>
                                </tr>
                                <!-- Row Item 5 -->
                                <tr>
                                    <td class="font-monospace">2026-05-16</td>
                                    <td class="font-monospace text-dark">#REV-AVSRV</td>
                                    <td>Premium Production Staging Audio/Visual Systems Allocation</td>
                                    <td class="text-end text-dark font-monospace">₱1,800.00</td>
                                    <td class="text-end text-muted font-monospace">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- Right Column: Financial Balances Summary & Aging Profiles -->
        <div class="col-12 col-lg-4">
            <div class="d-flex flex-column gap-4 h-100">
                
                <!-- Card Component: Financial Summary Matrix -->
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                    <h6 class="fw-bold text-dark mb-3">Folio Financial Balancing Matrix</h6>
                    
                    <div class="d-flex flex-column gap-2.5 border-bottom pb-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Gross Posted Charges:</span>
                            <span class="font-monospace text-dark fw-medium">₱42,500.00</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Service Charges & Service Fees (10%):</span>
                            <span class="font-monospace text-dark fw-medium">₱4,250.00</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Applied Guarantees / Credits:</span>
                            <span class="font-monospace text-success fw-medium">(₱15,000.00)</span>
                        </div>
                    </div>

                    <!-- Net Outstanding Balance Target Display -->
                    <div class="bg-dark text-white rounded-3 p-3 d-flex justify-content-between align-items-center mb-1 shadow-xs">
                        <span class="small fw-medium">Net Amount Due:</span>
                        <span class="font-monospace fw-bold fs-5">₱31,750.00</span>
                    </div>
                </div>

                <!-- Card Component: Client Credit Risk / Collection Status -->
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4 flex-grow-1">
                    <h6 class="fw-bold text-dark mb-2">Account Aging & Risk Profile</h6>
                    <p class="text-muted small mb-3">Track collection windows relative to checkout verification timestamps.</p>
                    
                    <div class="d-flex flex-column gap-3">
                        <!-- Progress Tracking Metric -->
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="small fw-semibold text-secondary">Aging Status</span>
                                <span class="text-primary font-monospace small fw-bold">Current Cycle (0-30 Days)</span>
                            </div>
                            <div class="progress rounded-pill style-progress" style="height: 6px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- System Audit Log Flag Footnote -->
                        <div class="bg-light border rounded-3 p-2.5 d-flex gap-2.5 align-items-start">
                            <div class="text-muted fs-7">
                                <span class="fw-semibold text-dark d-block mb-0.5">Master Terms: Net 30 Window</span>
                                Balance is eligible for direct bank invoice routing or authorized credit card processing files.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>