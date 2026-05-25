<div class="container my-5">

    <!-- Account Detail Header Actions Panel -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        
        <!-- Left Group: Navigation Anchor & Account Identity Information -->
        <div class="d-flex align-items-center gap-3">
            <!-- Circular Navigation Back Button -->
            <button type="button" class="btn btn-light btn-sm rounded-circle p-0 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px; min-width: 36px;" title="Go back to user directory" onclick="loadUserAccountManagemnet()">
                <i class="bi bi-arrow-left text-secondary fs-5"></i>
            </button>
            
            <!-- Context Text Titles -->
            <div>
                <h5 class="fw-bold text-dark mb-1">User Account Profile & Identity</h5>
                <p class="text-muted small mb-0">System Identifier: <span class="font-monospace fw-bold text-dark">#UID-2026-0412</span></p>
            </div>
        </div>
        
        <!-- Right Group: Security & Access Operational Controls -->
        <div class="d-flex align-items-center gap-2 flex-wrap justify-content-md-end">
            <!-- Contextual Security Action Buttons -->
            <button type="button" class="btn btn-white border shadow text-secondary rounded-3 px-3 py-2 small fw-medium" onclick="triggerPasswordRecovery()">
                <i class="bi bi-shield-lock me-1.5"></i> Recover Password
            </button>
            
            <!-- Block Access (Destructive/Safety state) -->
            <button type="button" id="btn-block-access" class="btn btn-outline-danger border shadow rounded-3 px-3 py-2 small fw-medium" onclick="toggleUserAccess(false)">
                <i class="bi bi-slash-circle me-1.5"></i> Block Access
            </button>
            
            <!-- Allow Access (Activation state) -->
            <button type="button" id="btn-allow-access" class="btn btn-dark shadow rounded-3 px-3 py-2 small fw-medium shadow d-none" onclick="toggleUserAccess(true)">
                <i class="bi bi-check-circle me-1.5"></i> Allow Access
            </button>
            
            <button type="button" class="btn btn-primary shadow rounded-3 px-3 py-2 small fw-medium shadow-sm" onclick="editUserProfileMetrics()">
                <i class="bi bi-pencil-square me-1.5"></i> Modify Profile
            </button>
        </div>

    </div>

    <div class="row g-4">
        <!-- Left Column: Primary User Metadata & Session Assignment Log -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                
                <!-- Profile Coordination Details -->
                <div class="row g-3 border-bottom pb-4 mb-4">
                    <div class="col-12 col-sm-6">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-1">Core Professional Profile</small>
                        <div class="fw-bold text-dark mb-0.5">Sarah Jenkins</div>
                        <div class="text-muted small">Front Desk Operations — Shift Lead Tier 1</div>
                        <div class="text-muted small">Department: Guest Services & Reception</div>
                    </div>
                    <div class="col-12 col-sm-6 text-sm-end">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-1">System Node Assignment</small>
                        <div class="fw-bold text-dark mb-0.5">s.jenkins_frontdesk</div>
                        <div class="text-muted small">Communication Node: s.jenkins@grandplaza.com</div>
                        <div class="text-muted small">Primary Hardware: Terminal Station Desk-03</div>
                    </div>
                </div>

                <!-- Account Authorization & Security Scoping Matrix -->
                <div class="row g-3 mb-4 bg-light rounded-3 p-3 mx-0">
                    <div class="col-6 col-md-3">
                        <div class="text-secondary small">Security Group Role</div>
                        <span class="font-monospace fw-semibold text-dark">#ROLE-CLERK-MAX</span>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-secondary small">Terminal Overwrites</div>
                        <span class="text-dark small fw-medium">Authorized T-2/T-3</span>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="text-secondary small">Access Integrity Status</div>
                        <span class="badge bg-success-subtle text-success border px-2 py-0.5 rounded fs-8 fw-medium">Active & Validated</span>
                    </div>
                    <div class="col-6 col-md-3 text-md-end">
                        <div class="text-secondary small">Account Expiry</div>
                        <span class="text-dark small fw-medium">Dec 31, 2026</span>
                    </div>
                </div>

                <!-- Active Session Security Records Table -->
                <div class="mb-2">
                    <h6 class="fw-bold text-dark mb-3">Recent Sessions & Access Footprints</h6>
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
                                    <th>Access Timeline</th>
                                    <th>Session Reference</th>
                                    <th>Operational Hardware Profile & Core Engine Specs</th>
                                    <th class="text-end">Assigned Subnet IP</th>
                                    <th class="text-end">Verification</th>
                                </tr>
                            </thead>
                            <tbody class="text-secondary">
                                <!-- Row Item 1 -->
                                <tr>
                                    <td class="font-monospace">06:45 - Present</td>
                                    <td class="font-monospace text-dark">#SESS-89240</td>
                                    <td>Win11 Desktop / Chrome Framework — Terminal Station 03 Frontdesk</td>
                                    <td class="text-end text-dark font-monospace">192.168.10.45</td>
                                    <td class="text-end text-success fw-medium">Active Node</td>
                                </tr>
                                <!-- Row Item 2 -->
                                <tr>
                                    <td class="font-monospace">Yesterday 14:02</td>
                                    <td class="font-monospace text-dark">#SESS-89112</td>
                                    <td>iOS Handheld Engine / Mobile Safari — Room Check-In Verification Mode</td>
                                    <td class="text-end text-dark font-monospace">192.168.45.18</td>
                                    <td class="text-end text-muted fw-medium">Terminated</td>
                                </tr>
                                <!-- Row Item 3 -->
                                <tr>
                                    <td class="font-monospace">May 16, 07:01</td>
                                    <td class="font-monospace text-dark">#SESS-88751</td>
                                    <td>Win11 Desktop / Chrome Framework — Terminal Station 03 Frontdesk</td>
                                    <td class="text-end text-dark font-monospace">192.168.10.45</td>
                                    <td class="text-end text-muted fw-medium">Terminated</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- Right Column: Security Vectors & Operational Health Checklists -->
        <div class="col-12 col-lg-4">
            <div class="d-flex flex-column gap-4 h-100">
                
                <!-- Card Component: Access Performance Summary -->
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                    <h6 class="fw-bold text-dark mb-3">Security Access Metrics</h6>
                    
                    <div class="d-flex flex-column gap-2.5 border-bottom pb-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Multi-Factor Authentication:</span>
                            <span class="text-success fw-medium small"><i class="bi bi-shield-check me-1"></i> Enforced (App)</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Last Password Change:</span>
                            <span class="font-monospace text-dark fw-medium">24 Days Ago</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Daily Operations Window:</span>
                            <span class="font-monospace text-dark fw-medium">06:00 - 18:00 PHT</span>
                        </div>
                    </div>

                    <!-- Room Roll-over Schedule Target Display -->
                    <div class="bg-dark text-white rounded-3 p-3 d-flex justify-content-between align-items-center mb-1 shadow-xs">
                        <span class="small fw-medium">Total System Footprint:</span>
                        <span class="font-monospace fw-bold fs-6">412 Sessions Total</span>
                    </div>
                </div>

                <!-- Card Component: Security Milestones & Account Health Indicators -->
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4 flex-grow-1">
                    <h6 class="fw-bold text-dark mb-2">Account Lifespan Health Matrix</h6>
                    <p class="text-muted small mb-3">Monitor configuration completeness index, profile security posture, and access credential aging.</p>
                    
                    <div class="d-flex flex-column gap-3">
                        <!-- Progress Tracking Metric -->
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="small fw-semibold text-secondary">Profile Security Posture</span>
                                <span class="text-primary font-monospace small fw-bold">Optimal Matrix (85%)</span>
                            </div>
                            <div class="progress rounded-pill layout-progress" style="height: 6px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- System Coordination Footnote -->
                        <div class="bg-light border rounded-3 p-2.5 d-flex gap-2.5 align-items-start">
                            <div class="text-muted small" style="font-size: 0.8rem;">
                                <span class="fw-semibold text-dark d-block mb-0.5">Administrative Security Flag</span>
                                Changing roles or blocking access instantly revokes all active cookies, tokens, and active hardware terminal sessions globally.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>