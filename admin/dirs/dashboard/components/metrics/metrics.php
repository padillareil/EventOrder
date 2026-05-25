<div class="container my-4">
    <div class="d-flex mb-4 align-items-center gap-3">
        <!-- Navigational Back Button disguised as a sleek utility button -->
        <button type="button" class="btn btn-light btn-sm rounded-circle p-2 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px;" title="Go back" onclick="loadDashboard()">
            <i class="bi bi-arrow-left text-secondary fs-5"></i>
        </button>
        <div>
            <h5 class="fw-bold text-dark mb-1">System Metrics & Performance</h5>
            <p class="text-muted small mb-0">Live monitoring data across platform modules and server health parameters.</p>
        </div>
    </div>

    <!-- Redesigned Metric Grid -->
    <div class="row g-3">
        
        <!-- 1. Users -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="bi bi-people-fill fs-5"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-medium d-block mb-0">Total Users</span>
                        <h4 class="fw-bold text-dark mb-0">1,240</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Hotels -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100" onclick="laodHotels()">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="bi bi-building-fill fs-5"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-medium d-block mb-0">Active Hotels</span>
                        <h4 class="fw-bold text-dark mb-0 text-truncate">48</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. KPIs -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100" onclick="loadKpI()">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning-subtle text-warning rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="bi bi-lightning-charge-fill fs-5"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-medium d-block mb-0">Target KPIs</span>
                        <h4 class="fw-bold text-dark mb-0">94.2<span class="fs-6 fw-medium text-muted ms-1">%</span></h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Bookings -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100" onclick="loadBooking()">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-info-subtle text-info rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="bi bi-calendar-check-fill fs-5"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-medium d-block mb-0">New Bookings</span>
                        <h4 class="fw-bold text-dark mb-0">385</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. Technical Tickets -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100" onclick="loadTicketsReport()">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="bi bi-ticket-detailed-fill fs-5"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-medium d-block mb-0">Open Tickets</span>
                        <h4 class="fw-bold text-dark mb-0">12</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. Leaderboard -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100" onclick="loadLeaderBoard()">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-purple-subtle text-purple rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px; background-color: #f3e8ff; color: #9333ea;">
                        <i class="bi bi-trophy-fill fs-5"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-medium d-block mb-0">Leaderboard</span>
                        <h4 class="fw-bold text-dark mb-0">Rank #1</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- 7. CPU Traffic -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3 h-100" onclick="loadCPUDevice()">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-secondary-subtle text-secondary rounded-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 44px; height: 44px;">
                        <i class="bi bi-cpu-fill fs-5"></i>
                    </div>
                    <div>
                        <span class="text-secondary small fw-medium d-block mb-0">CPU Load</span>
                        <h4 class="fw-bold text-dark mb-0">24<span class="fs-6 fw-medium text-muted ms-1">%</span></h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>