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
                    <h5 class="fw-bold text-dark mb-1">Sales Force KPI Dashboard</h5>
                    <p class="text-muted small mb-0">Track and monitor executive sales targets, conversion efficiencies, and closed revenue metrics.</p>
                </div>
            </div>
        </div>

        <!-- Dashboard Content View -->
        <div class="card-body p-4 p-md-5 bg-light-subtle">
            
            <!-- Top 3 Sales Executives (Podium Highlights) -->
            <div class="row g-3 mb-5 align-items-end">
                
                <!-- Rank #2 -->
                <div class="col-12 col-md-4 order-md-1 order-2">
                    <div class="card border border-light shadow-sm rounded-4 bg-white text-center p-4">
                        <div class="mx-auto bg-light text-secondary rounded-circle d-flex align-items-center justify-content-center mb-2 border fw-bold" style="width: 46px; height: 46px;">
                            2
                        </div>
                        <h6 class="fw-bold text-dark mb-0">Sarah Jenkins</h6>
                        <p class="text-muted small mb-3">Enterprise Sales</p>
                        <div class="text-dark fw-bold mb-1">$48,250</div>
                        <span class="badge bg-light text-success border px-2 py-1 rounded-2 small fw-semibold">
                            104% of Target
                        </span>
                    </div>
                </div>

                <!-- Rank #1 (Featured Center Highlight) -->
                <div class="col-12 col-md-4 order-md-2 order-1">
                    <div class="card border-0 shadow rounded-4 bg-white text-center p-4 position-relative overflow-hidden" style="margin-bottom: 12px; border-top: 4px solid #0d6efd !important;">
                        <div class="position-absolute top-0 end-0 p-3 text-warning">
                            <i class="bi bi-star-fill fs-6"></i>
                        </div>
                        <div class="mx-auto bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center mb-2 border border-primary-subtle fw-bold fs-5" style="width: 56px; height: 56px;">
                            1
                        </div>
                        <h5 class="fw-bold text-dark mb-0">Michael Chang</h5>
                        <p class="text-muted small mb-3">Senior Accounts Lead</p>
                        <div class="text-primary fw-bold fs-5 mb-1">$62,400</div>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 rounded-2 small fw-bold">
                            122% of Target
                        </span>
                    </div>
                </div>

                <!-- Rank #3 -->
                <div class="col-12 col-md-4 order-md-3 order-3">
                    <div class="card border border-light shadow-sm rounded-4 bg-white text-center p-4">
                        <div class="mx-auto bg-light text-secondary rounded-circle d-flex align-items-center justify-content-center mb-2 border fw-bold" style="width: 46px; height: 46px;">
                            3
                        </div>
                        <h6 class="fw-bold text-dark mb-0">David Ross</h6>
                        <p class="text-muted small mb-3">Regional Executive</p>
                        <div class="text-dark fw-bold mb-1">$41,900</div>
                        <span class="badge bg-light text-dark border px-2 py-1 rounded-2 small fw-semibold">
                            98% of Target
                        </span>
                    </div>
                </div>

            </div>

            <!-- Detailed Salesperson KPI Grid Table -->
            <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover align-middle mb-0">
                            <thead class="bg-white border-bottom align-middle" style="height: 52px;">
                                <tr>
                                    <th class="ps-4  text-secondary fw-bold fs-7" style="width: 80px;">Rank</th>
                                    <th class=" text-secondary fw-bold fs-7">Salesperson</th>
                                    <th class=" text-secondary fw-bold fs-7">Revenue Closed</th>
                                    <th class=" text-secondary fw-bold fs-7">Deals</th>
                                    <th class=" text-secondary fw-bold fs-7" style="width: 200px;">Conversion Rate</th>
                                    <th class=" text-secondary fw-bold fs-7 text-end pe-4" style="width: 150px;">Target Status</th>
                                </tr>
                            </thead>
                            <tbody id="load_KPIPerformanceLists">
                                
                                <!-- Example Row 1 -->
                                <tr class="border-bottom-light-subtle">
                                    <td class="ps-4 fw-bold text-secondary">#4</td>
                                    <td>
                                        <div class="fw-semibold text-dark">Emma Watson</div>
                                        <div class="text-muted fs-7">Hotel Corporate Packages</div>
                                    </td>
                                    <td><span class="fw-semibold text-dark">$38,500</span></td>
                                    <td><span class="text-secondary small">14 Closed</span></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="small text-secondary" style="min-width: 32px;">24%</span>
                                            <div class="progress rounded-pill bg-light border flex-grow-1" style="height: 6px;">
                                                <div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: 24%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-4">
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-pill fs-7 fw-semibold">92% Met</span>
                                    </td>
                                </tr>

                                <!-- Example Row 2 -->
                                <tr>
                                    <td class="ps-4 fw-bold text-secondary">#5</td>
                                    <td>
                                        <div class="fw-semibold text-dark">James Anderson</div>
                                        <div class="text-muted fs-7">Restaurant Group Bookings</div>
                                    </td>
                                    <td><span class="fw-semibold text-dark">$29,100</span></td>
                                    <td><span class="text-secondary small">9 Closed</span></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="small text-secondary" style="min-width: 32px;">18%</span>
                                            <div class="progress rounded-pill bg-light border flex-grow-1" style="height: 6px;">
                                                <div class="progress-bar bg-warning rounded-pill" role="progressbar" style="width: 18%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-4">
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 rounded-pill fs-7 fw-semibold">74% Behind</span>
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