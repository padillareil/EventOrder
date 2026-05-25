<div class="container col-md-8 my-5">

    <!-- Guest Profile Breakdown Header Actions Panel -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        
        <!-- Left Group: Navigation Anchor & Guest Profile Identity -->
        <div class="d-flex align-items-center gap-3">
            <!-- Circular Navigation Back Button -->
            <button type="button" class="btn btn-light btn-sm rounded-circle p-0 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px; min-width: 36px;" title="Back to guest records" onclick="loadGuests()">
                <i class="bi bi-arrow-left text-secondary fs-5"></i>
            </button>
            
            <!-- Context Text Titles -->
            <div>
                <h5 class="fw-bold text-dark mb-1">Guest Profile</h5>
                <p class="text-muted small mb-0">Profile Reference File: <span class="font-monospace fw-bold text-dark">#GUST-2026-9041</span></p>
            </div>
        </div>
        
        <!-- Right Group: Operational Action Utilities -->
        <div class="d-flex align-items-center gap-2 flex-wrap justify-content-md-end">
            <button type="button" class="btn btn-primary border shadow-sm rounded-3 px-3 py-2 small fw-medium" onclick="window.print()">
                <i class="bi bi-printer me-1.5"></i> Print Summary
            </button>
        </div>

    </div>

    <div class="row g-4">
        <!-- Left Column: Primary Guest Profile Metadata & Venue Booking Manifest -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                
                <!-- Guest Core Demographics Profiles -->
                <div class="row g-3 border-bottom pb-4 mb-4">
                    <div class="col-12 col-sm-6">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-1">Personal Identity Summary</small>
                        <div class="fw-bold text-dark mb-0.5">Eleanor Vance</div>
                        <div class="text-muted small">Managing Director — Vance Tech Global Industries</div>
                        <div class="text-muted small">Primary Direct Line: +1 (555) 234-5678</div>
                    </div>
                    <div class="col-12 col-sm-6 text-sm-end">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-1">Corporate & Billing Configuration</small>
                        <div class="fw-bold text-dark mb-0.5">Vance Tech Corp Account</div>
                        <div class="text-muted small">Billing Mode: Direct Bill Matrix (CCA)</div>
                        <div class="text-muted small">Contact Node: accounts.receivable@vancetech.io</div>
                    </div>
                </div>

                <!-- Strategic Guest Metrics Block -->
                <div class="row g-3 mb-4 bg-light rounded-3 p-3 mx-0">
                    <div class="col-6 col-md-3">
                        <div class="text-secondary small">Corporate Contract</div>
                        <span class="font-monospace fw-semibold text-dark">#CORP-VANCE-77</span>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-secondary small">Current Folio State</div>
                        <span class="text-danger small fw-bold">₱,420.50 Unsettled</span>
                    </div>
                    <div class="col-6 col-md-3 text-md-end">
                        <div class="text-secondary small">Profile Creation</div>
                        <span class="text-dark small fw-medium">March 14, 2024</span>
                    </div>
                </div>

                <!-- Booked Functions & Events Manifest Table -->
                <div class="mb-2">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-3">
                        <div>
                            <h6 class="fw-bold text-dark mb-0">Property Event Manifest</h6>
                            <p class="text-muted fs-7 mb-0">Registered event history hosted explicitly at <span class="fw-semibold text-dark">Grand Plaza Resort & Spa</span></p>
                        </div>
                        <nav aria-label="Component page navigation" class="ms-auto">
                            <ul class="pagination pagination-sm mb-0 gap-1">
                                <li class="page-item">
                                    <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#">
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#">
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
                                    <th>Schedule Window</th>
                                    <th>Event Ref ID</th>
                                    <th>Allocated Venue Hall & Structural Layout</th>
                                    <th class="text-end">Pax Block</th>
                                    <th class="text-end">Event Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-secondary">
                                <!-- Row Item 1 -->
                                <tr>
                                    <td class="font-monospace text-dark fw-medium">May 24, 2026<br><small class="text-muted">15:00 - 00:30</small></td>
                                    <td class="font-monospace text-primary fw-bold">#EV-2026-0524</td>
                                    <td>
                                        <div class="fw-semibold text-dark">Vance Tech Keynote & Gala Dinner</div>
                                        <div class="small text-muted">Grand Ballroom — Section A & B (Banquet Round Layout)</div>
                                    </td>
                                    <td class="text-end text-dark font-monospace fw-medium">250 Pax</td>
                                    <td class="text-end">
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-0.5 rounded fs-8 fw-medium">Confirmed</span>
                                    </td>
                                </tr>
                                <!-- Row Item 2 -->
                                <tr>
                                    <td class="font-monospace text-dark fw-medium">July 12, 2026<br><small class="text-muted">09:00 - 17:00</small></td>
                                    <td class="font-monospace text-primary fw-bold">#EV-2026-0712</td>
                                    <td>
                                        <div class="fw-semibold text-dark">Executive Strategy Q3 Workshop</div>
                                        <div class="small text-muted">Ocean View Boardroom (U-Shape Boardroom Layout)</div>
                                    </td>
                                    <td class="text-end text-dark font-monospace fw-medium">35 Pax</td>
                                    <td class="text-end">
                                        <span class="badge bg-info-subtle text-info border border-info-subtle px-2 py-0.5 rounded fs-8 fw-medium">Advised</span>
                                    </td>
                                </tr>
                                <!-- Row Item 3 -->
                                <tr>
                                    <td class="font-monospace text-muted">Nov 18, 2025<br><small class="text-muted">18:00 - 22:00</small></td>
                                    <td class="font-monospace text-secondary">#EV-2025-8812</td>
                                    <td>
                                        <div class="fw-semibold text-muted">Vance Anniversary Cocktail Lounge</div>
                                        <div class="small text-muted">Plaza Roof Deck Garden (Cocktail Standup Layout)</div>
                                    </td>
                                    <td class="text-end text-muted font-monospace">180 Pax</td>
                                    <td class="text-end">
                                        <span class="badge bg-light text-muted border px-2 py-0.5 rounded fs-8 fw-medium">Completed</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- Right Column: Resource Requirements Summary & Preference Profiles -->
        <div class="col-12 col-lg-4">
            <div class="d-flex flex-column gap-4 h-100">
                
                <!-- Card Component: Profile Strategic Metrics Summary -->
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                    <h6 class="fw-bold text-dark mb-3">Lifetime Value Matrix</h6>
                    
                    <div class="d-flex flex-column gap-2.5 border-bottom pb-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Total Rooms Night Stays:</span>
                            <span class="text-dark fw-semibold small">42 Active Nights</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Functions Hosted to Date:</span>
                            <span class="font-monospace text-dark fw-semibold">12 Event Modules</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Aggregate Net Spend:</span>
                            <span class="font-monospace text-success fw-bold">₱28,640.00 PHP</span>
                        </div>
                    </div>

                    <!-- Room Roll-over Schedule Target Display -->
                    <div class="bg-dark text-white rounded-3 p-3 d-flex justify-content-between align-items-center mb-1 shadow-xs">
                        <span class="small fw-medium">Profile Integrity Metric:</span>
                        <span class="font-monospace fw-bold fs-6 text-success">Good Account</span>
                    </div>
                </div>

                <!-- Card Component: Guest Accommodations & Custom Preferences -->
                

            </div>
        </div>
    </div>

</div>