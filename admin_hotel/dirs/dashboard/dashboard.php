<div class="container my-5">
    <!-- Header -->
    <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h4 class="fw-bold text-dark mb-1">Front Office Operations</h4>
            <p class="text-muted small mb-0">Welcome back, Admin. Here is what's happening across your properties today.</p>
        </div>
    </div>

    <!-- Section 1: Minimalist Analytics Cards -->
    <div class="row g-3 mb-4">
        <!-- Metric 1 -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-people fs-5"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-medium">In-House Guests</div>
                        <h4 class="fw-bold text-dark mb-0">1,248</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Metric 2 -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-building fs-5"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-medium">Available Halls</div>
                        <h4 class="fw-bold text-dark mb-0">12</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Metric 3 -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-info-subtle text-info rounded-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-calendar2-check fs-5"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-medium">Active Bookings</div>
                        <h4 class="fw-bold text-dark mb-0">34</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Metric 4 -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning-subtle text-warning rounded-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-clock-history fs-5"></i>
                    </div>
                    <div>
                        <div class="text-muted small fw-medium">Pending Approvals</div>
                        <h4 class="fw-bold text-dark mb-0">3</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: Main Content Split -->
    <div class="row g-4">
        <!-- Left Side: Recent Activity Preview -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 bg-white h-100">
                <div class="card-body p-4 border-bottom d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Contract Approvals & Activity</h6>
                        <p class="text-muted small mb-0">Real-time logs of event contracts and administrative actions.</p>
                    </div>
                    <button class="btn btn-light btn-sm text-dark border rounded-3 fw-semibold px-3">View All Logs</button>
                </div>
                <div class="card-body p-4 bg-light-subtle">
                    <div class="d-flex flex-column gap-3">
                        <!-- Activity Item 1 -->
                        <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border">
                            <div class="bg-primary-subtle text-primary rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                <i class="bi bi-person-plus small"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-dark">New Guest Account Profile</div>
                                <div class="text-muted small" style="font-size: 0.8rem;">Admin 'john_doe' created account for Mariah Carey</div>
                            </div>
                            <div class="text-muted small text-end" style="font-size: 0.8rem; min-width: 70px;">Just now</div>
                        </div>
                        <!-- Activity Item 2 -->
                        <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border">
                            <div class="bg-warning-subtle text-warning rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                <i class="bi bi-shield-lock small"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-dark">Password Reset Forced</div>
                                <div class="text-muted small" style="font-size: 0.8rem;">Security policy update triggered on 'The Bistro Veranda' outlet manager</div>
                            </div>
                            <div class="text-muted small text-end" style="font-size: 0.8rem; min-width: 70px;">5 mins ago</div>
                        </div>
                        <!-- Activity Item 3 -->
                        <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border">
                            <div class="bg-success-subtle text-success rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                <i class="bi bi-plus-circle small"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="small fw-bold text-dark">New Property Linked</div>
                                <div class="text-muted small" style="font-size: 0.8rem;">Outlet linked: 'Grand Plaza Resort' &rarr; 'The Bistro Veranda'</div>
                            </div>
                            <div class="text-muted small text-end" style="font-size: 0.8rem; min-width: 70px;">1 hour ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Module Quick Shortcuts -->
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 bg-white h-100">
                <div class="card-body p-4 border-bottom">
                    <h6 class="fw-bold text-dark mb-1">System Management Tools</h6>
                    <p class="text-muted small mb-0">Jump straight into operational modules.</p>
                </div>
                <div class="card-body p-4 d-flex flex-column gap-2">
                    <!-- Action Link 1 -->
                    <a href="#" class="btn btn-light text-start p-3 border rounded-3 fw-semibold d-flex align-items-center justify-content-between text-dark bg-white transition-all" style="transition: transform 0.2s, box-shadow 0.2s;">
                        <span><i class="bi bi-people me-2 text-primary"></i> User Management</span>
                        <i class="bi bi-chevron-right small text-muted"></i>
                    </a>
                    <!-- Action Link 2 -->
                    <a href="#" class="btn btn-light text-start p-3 border rounded-3 fw-semibold d-flex align-items-center justify-content-between text-dark bg-white transition-all" style="transition: transform 0.2s, box-shadow 0.2s;">
                        <span><i class="bi bi-building me-2 text-success"></i> Function Control</span>
                        <i class="bi bi-chevron-right small text-muted"></i>
                    </a>
                    <!-- Action Link 3 -->
                    <a href="#" class="btn btn-light text-start p-3 border rounded-3 fw-semibold d-flex align-items-center justify-content-between text-dark bg-white transition-all" style="transition: transform 0.2s, box-shadow 0.2s;">
                        <span><i class="bi bi-calendar2-week me-2 text-info"></i> View Bookings</span>
                        <i class="bi bi-chevron-right small text-muted"></i>
                    </a>
                    <!-- Action Link 4 -->
                    <a href="#" class="btn btn-light text-start p-3 border rounded-3 fw-semibold d-flex align-items-center justify-content-between text-dark bg-white transition-all" style="transition: transform 0.2s, box-shadow 0.2s;">
                        <span><i class="bi bi-file-earmark-text me-2 text-warning"></i> View Event Contracts</span>
                        <i class="bi bi-chevron-right small text-muted"></i>
                    </a>
                    
                    <!-- Global Settings Button -->
                    <button type="button" class="btn btn-dark text-center p-3 rounded-3 fw-semibold mt-3 shadow-sm border-0" onclick="loadOptions()">
                        <i class="bi bi-gear me-2"></i> Global Settings
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="dirs/dashboard/script/dashboard.js"></script>