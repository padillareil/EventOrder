<div class="container my-5">

    <!-- Event Detail Header Actions Panel -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        
        <!-- Left Group: Navigation Anchor & Identity Information -->
        <div class="d-flex align-items-center gap-3">
            <!-- Circular Navigation Back Button -->
            <button type="button" class="btn btn-light btn-sm rounded-circle p-0 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px; min-width: 36px;" title="Go back to bookings list" onclick="loadBookingHome()">
                <i class="bi bi-arrow-left text-secondary fs-5"></i>
            </button>
            
            <!-- Context Text Titles -->
            <div>
                <h5 class="fw-bold text-dark mb-1">Event Operational Breakdown</h5>
                <p class="text-muted small mb-0">Booking Reference: <span class="font-monospace fw-bold text-dark">#EV-2026-0524</span></p>
            </div>
        </div>
        
        <!-- Right Group: Operational Action Utilities -->
        <div class="d-flex align-items-center gap-2 justify-content-md-end">
            <button type="button" class="btn btn-white border shadow text-secondary rounded-3 px-3 py-2 small fw-medium" onclick="window.print()">
                <i class="bi bi-printer me-1.5"></i> Print
            </button>
            <button type="button" class="btn btn-primary shadow rounded-3 px-3 py-2 small fw-medium shadow-sm" onclick="editEventAssignment()">
                <i class="bi bi-pencil-square me-1.5"></i> Modify Schedule
            </button>
        </div>

    </div>

    <div class="row g-4">
        <!-- Left Column: Primary Event Metadata & Detailed Component Manifest -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                
                <!-- Entity Coordination Profiles -->
                <div class="row g-3 border-bottom pb-4 mb-4">
                    <div class="col-12 col-sm-6">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-1">Venue Assignment & Host</small>
                        <div class="fw-bold text-dark mb-0.5">Grand Plaza Resort & Spa</div>
                        <div class="text-muted small">Grand Ballroom — Main Hall Section A & B</div>
                        <div class="text-muted small">Duty Coordinator: Event Services Management</div>
                    </div>
                    <div class="col-12 col-sm-6 text-sm-end">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-1">Client Entity Profile</small>
                        <div class="fw-bold text-dark mb-0.5">Tech Summit Corporate Group</div>
                        <div class="text-muted small">Primary Organizer: Michael Chang</div>
                        <div class="text-muted small">Contact Node: m.chang@techsummit.org</div>
                    </div>
                </div>

                <!-- Event Reference Logistic Scope Grid -->
                <div class="row g-3 mb-4 bg-light rounded-3 p-3 mx-0">
                    <div class="col-6 col-md-3">
                        <div class="text-secondary small">Associated Contract</div>
                        <span class="font-monospace fw-semibold text-dark">#CT-9024</span>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-secondary small">Guaranteed Pax Count</div>
                        <span class="text-dark small fw-medium">250 Confirmed Guests</span>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-secondary small">Logistic Status</div>
                        <span class="badge bg-success-subtle text-success border px-2 py-0.5 rounded fs-8 fw-medium">Confirmed & Advised</span>
                    </div>
                    <div class="col-6 col-md-3 text-md-end">
                        <div class="text-secondary small">Target Event Date</div>
                        <span class="text-dark small fw-medium">May 24, 2026</span>
                    </div>
                </div>

                <!-- Component Manifest Log Table -->
                <div class="mb-2">
                    <h6 class="fw-bold text-dark mb-3">Operational Manifest & Asset Allocation</h6>
                    <div class="justify-content-end d-flex mb-2 mt-2">
                        <nav aria-label="Component page navigation">
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
                                    <th>Timeline Window</th>
                                    <th>Asset Class</th>
                                    <th>Service Description & Operational Specifications</th>
                                    <th class="text-end">Assigned Units</th>
                                    <th class="text-end">Setup Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-secondary">
                                <!-- Row Item 1 -->
                                <tr>
                                    <td class="font-monospace">15:00 - 17:00</td>
                                    <td class="font-monospace text-dark">#LOG-SETUP</td>
                                    <td>Main Stage Carpentry, Keynote Backdrop Installation & Podiums</td>
                                    <td class="text-end text-dark font-monospace">1 Stage Box</td>
                                    <td class="text-end text-success fw-medium">Ready</td>
                                </tr>
                                <!-- Row Item 2 -->
                                <tr>
                                    <td class="font-monospace">17:00 - 18:00</td>
                                    <td class="font-monospace text-dark">#AV-TESTING</td>
                                    <td>Premium Production Staging Audio/Visual Sound Check & Luminaire Testing</td>
                                    <td class="text-end text-dark font-monospace">1 Array Rig</td>
                                    <td class="text-end text-warning fw-medium">In Progress</td>
                                </tr>
                                <!-- Row Item 3 -->
                                <tr>
                                    <td class="font-monospace">18:00 - 21:00</td>
                                    <td class="font-monospace text-dark">#FB-PLATING</td>
                                    <td>Gala Dinner Banquet Food Plating Operations — Multi-Course Premium Menu</td>
                                    <td class="text-end text-dark font-monospace">250 Covers</td>
                                    <td class="text-end text-muted font-monospace">Staged</td>
                                </tr>
                                <!-- Row Item 4 -->
                                <tr>
                                    <td class="font-monospace">18:00 - 23:00</td>
                                    <td class="font-monospace text-dark">#FB-BEVERAGE</td>
                                    <td>Open Lounge Beverage Station & Bar Concierge Setup (Premium Spirits)</td>
                                    <td class="text-end text-dark font-monospace">2 Stations</td>
                                    <td class="text-end text-muted font-monospace">Staged</td>
                                </tr>
                                <!-- Row Item 5 -->
                                <tr>
                                    <td class="font-monospace">23:00 - 00:30</td>
                                    <td class="font-monospace text-dark">#LOG-STRIKE</td>
                                    <td>Event Space Teardown, Asset Roll-out, and Housekeeping Turnaround Cycle</td>
                                    <td class="text-end text-dark font-monospace">Full Hall</td>
                                    <td class="text-end text-muted font-monospace">Scheduled</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- Right Column: Resource Requirements Summary & Housekeeping Timelines -->
        <div class="col-12 col-lg-4">
            <div class="d-flex flex-column gap-4 h-100">
                
                <!-- Card Component: Space Analytics Summary -->
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                    <h6 class="fw-bold text-dark mb-3">Resource Deployment Vector</h6>
                    
                    <div class="d-flex flex-column gap-2.5 border-bottom pb-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Floor Plan Style:</span>
                            <span class="text-dark fw-medium small">Round Table Banquet</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Required Staff Deployment:</span>
                            <span class="font-monospace text-dark fw-medium">32 Personnel</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Power Grid Allocation:</span>
                            <span class="font-monospace text-dark fw-medium">Dedicated 60A Three-Phase</span>
                        </div>
                    </div>

                    <!-- Room Roll-over Schedule Target Display -->
                    <div class="bg-dark text-white rounded-3 p-3 d-flex justify-content-between align-items-center mb-1 shadow-xs">
                        <span class="small fw-medium">Total Block Duration:</span>
                        <span class="font-monospace fw-bold fs-6">9.5 Hours Total</span>
                    </div>
                </div>

                <!-- Card Component: Operations Checklist & Progress Timeline -->
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4 flex-grow-1">
                    <h6 class="fw-bold text-dark mb-2">Space Preparation Milestone</h6>
                    <p class="text-muted small mb-3">Track completion status of structural setup procedures prior to client ingress.</p>
                    
                    <div class="d-flex flex-column gap-3">
                        <!-- Progress Tracking Metric -->
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="small fw-semibold text-secondary">Turnaround Status</span>
                                <span class="text-primary font-monospace small fw-bold">Stage 2: AV Sync (65%)</span>
                            </div>
                            <div class="progress rounded-pill layout-progress" style="height: 6px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- System Coordination Footnote -->
                        <div class="bg-light border rounded-3 p-2.5 d-flex gap-2.5 align-items-start">
                            <div class="text-muted small" style="font-size: 0.8rem;">
                                <span class="fw-semibold text-dark d-block mb-0.5">Critical Milestone Dependency</span>
                                Final catering confirmation window must lock within 2 hours of dinner service initialization timestamps.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>