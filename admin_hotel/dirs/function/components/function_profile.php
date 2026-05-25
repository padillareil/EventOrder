<div class="container col-md-10 my-5">

    <!-- Function Profile Header Panel -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        
        <!-- Left Group: Navigation Anchor & Asset Reference -->
        <div class="d-flex align-items-center gap-3">
            <!-- Circular Navigation Back Button -->
            <button type="button" class="btn btn-light btn-sm rounded-circle p-0 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px; min-width: 36px;" title="Back to venue list" onclick="loadFunction()">
                <i class="bi bi-arrow-left text-secondary fs-5"></i>
            </button>
            
            <!-- Context Text Titles -->
            <div>
                <h5 class="fw-bold text-dark mb-1">Main Function Hall Profile</h5>
                <p class="text-muted small mb-0">Structural Node Reference: <span class="font-monospace fw-bold text-dark">#VEN-MNH-01</span></p>
            </div>
        </div>
        
        <!-- Right Group: Operational Utilities -->
        <div class="d-flex align-items-center gap-2 flex-wrap justify-content-md-end">
            
            <button type="button" class="btn btn-outline-dark border shadow-sm rounded-3 px-3 py-2 small fw-medium" onclick="mdlEditMainHallSpecs()">
                <i class="bi bi-sliders me-1.5"></i> Adjust Base Specs
            </button>
            <button type="button" class="btn btn-primary shadow rounded-3 px-3 py-2 small fw-medium shadow-sm" onclick="mdlAddSubPartition()">
                <i class="bi bi-plus-lg me-1.5"></i> Add Sub-Partition
            </button>
        </div>

    </div>

    <div class="row g-4">
        <!-- Left Column: Master Hall Metrics & Sub-Function Partitions Log -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                
                <!-- Main Function Hall Macro Details -->
                <div class="row g-3 border-bottom pb-4 mb-4">
                    <div class="col-12 col-sm-6">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-1">Macro Structural Identity</small>
                        <div class="fw-bold text-dark mb-0.5">Grand Emperor Ballroom</div>
                        <div class="text-muted small">Total Open Layout Volumetric Floor: 24,000 sq. ft.</div>
                        <div class="text-muted small">Operable Sound Wall System: STC 55 Acoustic Rated</div>
                    </div>
                    <div class="col-12 col-sm-6 text-sm-end">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-1">Combined Combined Rules</small>
                        <div class="fw-bold text-dark mb-0.5">Full Hall Consolidation Rate</div>
                        <div class="text-muted small font-monospace fw-semibold text-primary">PHP 120,000.00 / Block Event</div>
                        <div class="text-muted small">Combined Maximum Capacity: 800 Pax Max</div>
                    </div>
                </div>

                <!-- Sub-Function Spatial Matrix & Partition Ledger -->
                <div class="mb-2">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-3">
                        <div>
                            <h6 class="fw-bold text-dark mb-0">Isolated Sub-Function Partitions</h6>
                            <p class="text-muted fs-7 mb-0">Individual modular zones, localized rental tiers, and optimized pax thresholds.</p>
                        </div>
                        <nav aria-label="Component page navigation" class="ms-auto">
                            <ul class="pagination pagination-sm mb-0 gap-1">
                                <li class="page-item"><a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#"><i class="bi bi-chevron-left"></i></a></li>
                                <li class="page-item"><a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#"><i class="bi bi-chevron-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle border-top mb-0" style="font-size: 13px;">
                            <thead class="table-light font-monospace text-secondary text-uppercase fs-7">
                                <tr>
                                    <th>Partition Node Name</th>
                                    <th>Acoustic Area Size</th>
                                    <th>Target Pax Range</th>
                                    <th class="text-end">Base Rental Fee</th>
                                    <th class="text-end">Overtime / Hr</th>
                                    <th class="text-end">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-secondary">
                                <!-- Partition Item 1 -->
                                <tr>
                                    <td>
                                        <div class="fw-bold text-dark">Ballroom Section Alpha (Left Wing)</div>
                                        <span class="font-monospace text-muted fs-8">#PART-MNH01-A</span>
                                    </td>
                                    <td class="font-monospace text-dark">8,000 sq ft<br><small class="text-muted">Dedicated Exit A</small></td>
                                    <td>
                                        <div class="fw-semibold text-dark">100 - 200 Pax</div>
                                        <small class="text-muted">Layout Optimization: Banquet</small>
                                    </td>
                                    <td class="text-end text-dark font-monospace fw-bold">PHP 45,000.00</td>
                                    <td class="text-end text-muted font-monospace">PHP 4,500.00</td>
                                    <td class="text-end">
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-0.5 rounded fs-8 fw-medium">Available Standalone</span>
                                    </td>
                                </tr>
                                <!-- Partition Item 2 -->
                                <tr>
                                    <td>
                                        <div class="fw-bold text-dark">Ballroom Section Bravo (Center Core)</div>
                                        <span class="font-monospace text-muted fs-8">#PART-MNH01-B</span>
                                    </td>
                                    <td class="font-monospace text-dark">8,000 sq ft<br><small class="text-muted">Main Stage Ingress</small></td>
                                    <td>
                                        <div class="fw-semibold text-dark">100 - 200 Pax</div>
                                        <small class="text-muted">Layout Optimization: Theater</small>
                                    </td>
                                    <td class="text-end text-dark font-monospace fw-bold">PHP 45,000.00</td>
                                    <td class="text-end text-muted font-monospace">PHP 4,500.00</td>
                                    <td class="text-end">
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-0.5 rounded fs-8 fw-medium">Locked in Macro-Block</span>
                                    </td>
                                </tr>
                                <!-- Partition Item 3 -->
                                <tr>
                                    <td>
                                        <div class="fw-bold text-dark">Ballroom Section Charlie (Right Wing)</div>
                                        <span class="font-monospace text-muted fs-8">#PART-MNH01-C</span>
                                    </td>
                                    <td class="font-monospace text-muted">8,000 sq ft<br><small class="text-muted">Dedicated Exit C</small></td>
                                    <td>
                                        <div class="fw-semibold text-muted">100 - 150 Pax</div>
                                        <small class="text-muted">Layout Optimization: Cocktail</small>
                                    </td>
                                    <td class="text-end text-dark font-monospace fw-bold">PHP 35,000.00</td>
                                    <td class="text-end text-muted font-monospace">PHP 3,500.00</td>
                                    <td class="text-end">
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-0.5 rounded fs-8 fw-medium">Available Standalone</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- Right Column: Operational Allocation Dependencies -->
        <div class="col-12 col-lg-4">
            <div class="d-flex flex-column gap-4 h-100">
                
                <!-- Card Component: Partitioning Controls Status -->
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4">
                    <h6 class="fw-bold text-dark mb-3">Live Structural Deployment</h6>
                    
                    <div class="d-flex flex-column gap-2.5 border-bottom pb-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Active Divider Configuration:</span>
                            <span class="text-dark fw-bold small">Split-Mode [A | B+C]</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Aggregated AirCon Zones:</span>
                            <span class="font-monospace text-primary fw-medium small">3 Distinct Automations</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary small">Logistics Track Safety Lock:</span>
                            <span class="badge bg-success-subtle text-success border px-2 py-0.5 rounded fs-8 fw-medium">Engaged & Safe</span>
                        </div>
                    </div>

                    <!-- Macro Asset Performance Target -->
                    <div class="bg-dark text-white rounded-3 p-3 d-flex justify-content-between align-items-center mb-1 shadow-xs">
                        <span class="small fw-medium">Max Asset Yield Strategy:</span>
                        <span class="font-monospace fw-bold fs-6 text-success">Multi-Book Optimization</span>
                    </div>
                </div>

                

            </div>
        </div>
    </div>

</div>