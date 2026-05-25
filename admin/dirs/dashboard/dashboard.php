<div class="container my-5">
    <div class="mb-4">
        <h4 class="fw-bold text-dark mb-1">System Overview</h4>
        <p class="text-muted small mb-0">Welcome back, Admin. Here is what's happening across your properties today.</p>
    </div>

    <!-- Section 1: Minimalist Analytics Cards -->
    <div class="row g-3 mb-4">
        <!-- Metric 1 -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-people fs-5"></i>
                    </div>
                    <div>
                        <div class="text-secondary small fw-medium">Total Users</div>
                        <h4 class="fw-bold text-dark mb-0">1,248</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Metric 2 -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-building fs-5"></i>
                    </div>
                    <div>
                        <div class="text-secondary small fw-medium">Active Hotels</div>
                        <h4 class="fw-bold text-dark mb-0">12</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Metric 3 -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning-subtle text-warning rounded-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-shop fs-5"></i>
                    </div>
                    <div>
                        <div class="text-secondary small fw-medium">Restaurants</div>
                        <h4 class="fw-bold text-dark mb-0">34</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Metric 4 -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-shield-check fs-5"></i>
                    </div>
                    <div>
                        <div class="text-secondary small fw-medium">System Health</div>
                        <h4 class="fw-bold text-dark mb-0">99.9%</h4>
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
                        <h6 class="fw-bold text-dark mb-1">Live Activity Feed</h6>
                        <p class="text-muted small mb-0">Real-time logs from system administrators.</p>
                    </div>
                    <button class="btn btn-light btn-sm text-secondary border rounded-3 fw-medium px-3">View All</button>
                </div>
                <div class="card-body p-4 bg-light-subtle">
                    <!-- Modern Clean Timeline List -->
                    <div class="d-flex flex-column gap-3">
                        <!-- Activity Item 1 -->
                        <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border shadow-xs">
                            <div class="bg-light rounded-circle p-2 text-secondary"><i class="bi bi-person-plus"></i></div>
                            <div class="flex-grow-1">
                                <div class="small fw-semibold text-dark">New User Account Created</div>
                                <div class="text-muted fs-7">Admin 'john_doe' created account for Mariah Carey</div>
                            </div>
                            <div class="text-muted small fs-7 text-end">Just now</div>
                        </div>
                        <!-- Activity Item 2 -->
                        <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border shadow-xs">
                            <div class="bg-light rounded-circle p-2 text-secondary"><i class="bi bi-shield-lock"></i></div>
                            <div class="flex-grow-1">
                                <div class="small fw-semibold text-dark">Password Reset Forced</div>
                                <div class="text-muted fs-7">Security policy update triggered on 'The Bistro Veranda' outlet manager</div>
                            </div>
                            <div class="text-muted small fs-7 text-end">5 mins ago</div>
                        </div>
                        <!-- Activity Item 3 -->
                        <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border shadow-xs">
                            <div class="bg-light rounded-circle p-2 text-secondary"><i class="bi bi-plus-circle"></i></div>
                            <div class="flex-grow-1">
                                <div class="small fw-semibold text-dark">New Restaurant Linked</div>
                                <div class="text-muted fs-7">Outlined linked: 'Grand Plaza Resort' &rarr; 'The Bistro Veranda'</div>
                            </div>
                            <div class="text-muted small fs-7 text-end">1 hour ago</div>
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
                    <p class="text-muted small mb-0">Jump straight into monitoring modules.</p>
                </div>
                <div class="card-body p-4 d-flex flex-column gap-2">
                    <!-- Action Link 1 -->
                    <a href="#" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow">
                        <span><i class="bi bi-people me-2 text-dark"></i> User Management</span>
                        <i class="bi bi-chevron-right fs-7 text-muted"></i>
                    </a>
                    <!-- Action Link 2 -->
                    <a href="#" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow">
                        <span><i class="bi bi-building me-2 text-dark"></i> Hotel Control</span>
                        <i class="bi bi-chevron-right fs-7 text-muted"></i>
                    </a>
                    <!-- Action Link 3 -->
                    <a href="#" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow">
                        <span><i class="bi bi-shop me-2 text-dark"></i> Restaurant Monitoring</span>
                        <i class="bi bi-chevron-right fs-7 text-muted"></i>
                    </a>
                    <!-- Action Link 4 -->
                    <a href="#" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow">
                        <span><i class="bi bi-clock-history me-2 text-dark"></i> View System Audit Logs</span>
                        <i class="bi bi-chevron-right fs-7 text-muted"></i>
                    </a>
                    <!-- Action Link 5 -->
                    <a href="#" class="btn btn-dark text-center p-3 rounded-3 fw-medium mt-2 shadow-sm" onclick="loadMetrics()">
                        <i class="bi bi-gear me-1"></i> Global Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

























<script src="dirs/dashboard/script/dashboard.js"></script>