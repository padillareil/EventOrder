<div class="container my-5">
    
    <!-- Main Card Wrapper -->
    <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
        
        <!-- Dashboard Header -->
        <div class="card-body p-4 p-md-5 border-bottom">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="btn btn-light btn-sm rounded-circle p-2 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px;" title="Go back" onclick="loadMetrics()">
                    <i class="bi bi-arrow-left text-secondary fs-5"></i>
                </button>
                <div>
                    <h5 class="fw-bold text-dark mb-1">Property Performance Leaderboard</h5>
                    <p class="text-muted small mb-0">Real-time rankings based on guest satisfaction, booking velocity, and KPI fulfillment targets.</p>
                </div>
            </div>
        </div>

        <!-- Dashboard Content View -->
        <div class="card-body p-4 p-md-5 bg-light-subtle">
            
            <!-- Top 3 Performers Row (Podium Layout) -->
            <div class="row g-3 mb-5 align-items-end">
                
                <!-- Rank #2 -->
                <div class="col-12 col-md-4 order-md-1 order-2">
                    <div class="card border border-light shadow-sm rounded-4 bg-white text-center p-4">
                        <div class="mx-auto bg-light rounded-circle d-flex align-items-center justify-content-center mb-3 text-secondary border fw-bold" style="width: 50px; height: 50px;">
                            2
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Oceanview Pavilion</h6>
                        <p class="text-muted small mb-3">Resort & Spa</p>
                        <div class="badge bg-light text-dark border px-2.5 py-1.5 rounded-2 small fw-semibold">
                            94.8 KPI Score
                        </div>
                    </div>
                </div>

                <!-- Rank #1 (Featured Center Highlight) -->
                <div class="col-12 col-md-4 order-md-2 order-1">
                    <div class="card border-primary border-0 shadow rounded-4 bg-white text-center p-4 position-relative overflow-hidden" style="margin-bottom: 10px; border-top: 4px solid #0d6efd !important;">
                        <div class="position-absolute top-0 end-0 p-3 text-warning">
                            <i class="bi bi-trophy-fill fs-5"></i>
                        </div>
                        <div class="mx-auto bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center mb-3 border border-primary-subtle fw-bold fs-5" style="width: 60px; height: 60px;">
                            1
                        </div>
                        <h5 class="fw-bold text-dark mb-1">Grand Plaza Resort</h5>
                        <p class="text-muted small mb-3">Main Property</p>
                        <div class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-2 small fw-bold">
                            98.2 KPI Score
                        </div>
                    </div>
                </div>

                <!-- Rank #3 -->
                <div class="col-12 col-md-4 order-md-3 order-3">
                    <div class="card border border-light shadow-sm rounded-4 bg-white text-center p-4">
                        <div class="mx-auto bg-light rounded-circle d-flex align-items-center justify-content-center mb-3 text-secondary border fw-bold" style="width: 50px; height: 50px;">
                            3
                        </div>
                        <h6 class="fw-bold text-dark mb-1">The Bistro Veranda</h6>
                        <p class="text-muted small mb-3">Boutique Dining</p>
                        <div class="badge bg-light text-dark border px-2.5 py-1.5 rounded-2 small fw-semibold">
                            91.5 KPI Score
                        </div>
                    </div>
                </div>

            </div>

            <!-- Leaderboard Table List (Ranks 4+) -->
            <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover align-middle mb-0">
                            <thead class="bg-white border-bottom align-middle" style="height: 52px;">
                                <tr>
                                    <th class="ps-4 text-uppercase text-secondary fw-bold fs-7" style="width: 80px;">Rank</th>
                                    <th class="text-uppercase text-secondary fw-bold fs-7">Property Name</th>
                                    <th class="text-uppercase text-secondary fw-bold fs-7">Type</th>
                                    <th class="text-uppercase text-secondary fw-bold fs-7 text-end pe-4" style="width: 160px;">Performance</th>
                                </tr>
                            </thead>
                            <tbody id="load_LeaderboardLists">
                                
                                <!-- Rank 4 -->
                                <tr class="border-bottom-light-subtle">
                                    <td class="ps-4 fw-bold text-secondary">#4</td>
                                    <td>
                                        <div class="fw-semibold text-dark">Summit Alpine Lodge</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border px-2 py-1 rounded-2 fw-medium">Hotel</span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <span class="fw-bold text-dark me-2">89.4%</span>
                                        <span class="text-success small"><i class="bi bi-arrow-up-short"></i>0.4</span>
                                    </td>
                                </tr>

                                <!-- Rank 5 -->
                                <tr>
                                    <td class="ps-4 fw-bold text-secondary">#5</td>
                                    <td>
                                        <div class="fw-semibold text-dark">Urban Heights Suites</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border px-2 py-1 rounded-2 fw-medium">Hotel</span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <span class="fw-bold text-dark me-2">87.1%</span>
                                        <span class="text-danger small"><i class="bi bi-arrow-down-short"></i>1.2</span>
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