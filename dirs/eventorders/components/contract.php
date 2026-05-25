<div class="container my-5">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Header Actions Block -->
        <div class="card-body p-4 p-md-5 bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <!-- Increased container gap to give the back arrow breathing room from the text -->
                    <div class="d-flex align-items-center gap-3 mb-1">
                        <button type="button" class="btn btn-link p-0 text-decoration-none text-secondary d-inline-flex align-items-center" onclick="loadEventOrders()">
                            <i class="bi bi-arrow-left fs-5"></i>
                        </button>
                        <h5 class="fw-bold text-dark mb-0">Event Order</h5>
                    </div>
                    <p class="text-muted small mb-0">Document ID: <span class="font-monospace fw-bold text-primary">#EV-2026-0524</span></p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-3 ms-md-auto">
                    <!-- Workflow State Tag (Increased margin to me-2.5) -->
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-3">
                        <i class="bi bi-check-circle-fill me-2.5"></i> Confirmed
                    </span>
                    
                    <!-- Secondary Utility Actions (Increased margin to me-2.5) -->
                    <button class="btn btn-light border px-3 py-2 rounded-3 shadow-sm" type="button" onclick="window.print()">
                        <i class="bi bi-printer me-2.5"></i> Print
                    </button>
                    
                    <button class="btn btn-dark px-3 py-2 rounded-3 shadow-sm" type="button" onclick="mdlEditEventOrder('#EV-2026-0524')">
                        <i class="bi bi-pencil me-2.5"></i> Edit
                    </button>
                </div>
            </div>
        </div>

        <!-- Master Data Grid Layout -->
        <div class="card-body p-3 p-md-5 bg-light-subtle">
            <div class="row g-4">
                
                <!-- Left Panel: Core Booking Logistics & Corporate Profiling -->
                <div class="col-12 col-lg-5">
                    
                    <!-- Account Profile Summary Sub-Card -->
                    <div class="card border-0 rounded-4 shadow-sm bg-white p-4 mb-4">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-3">Account & Client Entity</small>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center font-monospace fw-bold fs-5" style="width: 48px; height: 48px;">
                                EV
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0">Eleanor Vance</h6>
                                <p class="text-muted small mb-0">Vance Tech Global Industries</p>
                            </div>
                        </div>
                        <hr class="text-muted opacity-25 my-3">
                        <div class="row g-2 text-secondary" style="font-size: 13px;">
                            <div class="col-4 font-monospace text-uppercase fs-7 text-muted">Email:</div>
                            <div class="col-8 text-dark fw-medium">e.vance@vancetech.global</div>
                            <div class="col-4 font-monospace text-uppercase fs-7 text-muted">Contact:</div>
                            <div class="col-8 text-dark font-monospace">+63 (917) 555-0192</div>
                        </div>
                    </div>

                    <!-- Venue Logistics Sub-Card -->
                    <div class="card border-0 rounded-4 shadow-sm bg-white p-4">
                        <small class="text-uppercase tracking-wider text-muted font-monospace fs-7 d-block mb-3">Space Allocation Parameters</small>
                        
                        <div class="mb-3">
                            <label class="font-monospace text-uppercase fs-7 text-muted d-block mb-1">Target Space Hub</label>
                            <div class="fw-bold text-dark"><i class="bi bi-geo-alt text-secondary me-1.5"></i>Jade Ballroom (Sections A & B)</div>
                            <span class="text-muted small">Macro Space Segment Architecture</span>
                        </div>

                        <div class="row g-3" style="font-size: 13px;">
                            <div class="col-6">
                                <label class="font-monospace text-uppercase fs-7 text-muted d-block mb-1">Execution Date</label>
                                <span class="text-dark fw-semibold"><i class="bi bi-calendar3 me-1 text-muted"></i>May 24, 2026</span>
                            </div>
                            <div class="col-6">
                                <label class="font-monospace text-uppercase fs-7 text-muted d-block mb-1">Guaranteed Headcount</label>
                                <span class="text-dark fw-semibold"><i class="bi bi-people me-1 text-muted"></i>250 Pax Block</span>
                            </div>
                            <div class="col-12">
                                <label class="font-monospace text-uppercase fs-7 text-muted d-block mb-1">Operational Time Node Window</label>
                                <span class="text-dark font-monospace fw-medium"><i class="bi bi-clock me-1 text-muted"></i>15:00 - 00:30 (Schedules Locked)</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Panel: Food, Beverage, and Pricing Layout Sheets -->
                <div class="col-12 col-lg-7">
                    
                    <!-- Menu Specifications Module Grid -->
                    <div class="card border-0 rounded-4 shadow-sm bg-white p-4 p-md-5 mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-bold text-dark mb-0">Catering Specification Sheet</h6>
                            <span class="badge bg-light text-dark border px-2.5 py-1 rounded-2 font-monospace text-uppercase fs-7">Package Choice: Premium Platinum</span>
                        </div>

                        <!-- System Serving Format Configuration Banner -->
                        <div class="p-3 bg-light rounded-3 mb-4 d-flex align-items-center justify-content-between" style="font-size: 13px;">
                            <span class="text-secondary fw-medium"><i class="bi bi-layers-half text-primary me-2"></i>System Serving Configuration:</span>
                            <span class="fw-bold text-dark font-monospace text-uppercase">Banquet Round Layout</span>
                        </div>

                        <!-- Categorized Food Program Sections -->
                        <div class="space-y-3" style="font-size: 13px;">
                            <!-- Starters -->
                            <div class="row border-bottom pb-2 mb-2">
                                <div class="col-4 font-monospace text-uppercase fs-7 text-muted fw-medium">Hors d'oeuvres / Soups</div>
                                <div class="col-8 text-dark fw-semibold">
                                    Crispy Pork Belly Truffle Bites, Cream of Wild Mushroom Potage
                                </div>
                            </div>
                            <!-- Main Entrees -->
                            <div class="row border-bottom pb-2 mb-2">
                                <div class="col-4 font-monospace text-uppercase fs-7 text-muted fw-medium">Main Entrée Program</div>
                                <div class="col-8 text-dark fw-semibold">
                                    Slow-Roasted US Angus Beef Ribeye with Peppercorn Glaze, Pan-Seared Atlantic Salmon in Lemon Butter Caper Reduction, Garlic Herbed Rice Node
                                </div>
                            </div>
                            <!-- Dessert Modules -->
                            <div class="row border-bottom pb-2 mb-2">
                                <div class="col-4 font-monospace text-uppercase fs-7 text-muted fw-medium">Dessert Items</div>
                                <div class="col-8 text-dark fw-semibold">
                                    Classic Mango Pavlova with Mint Drops, Salted Caramel Chocolate Decadence Bar
                                </div>
                            </div>
                            <!-- Beverage Lines -->
                            <div class="row">
                                <div class="col-4 font-monospace text-uppercase fs-7 text-muted fw-medium">Beverage Solutions</div>
                                <div class="col-8 text-dark fw-semibold">
                                    Bottomless Artisan Lemongrass Iced Tea, Brewed Mountain Coffee Blend
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Consolidated Commercial Package Invoicing Table Block -->
                    <div class="card border-0 rounded-4 shadow-sm bg-white overflow-hidden">
                        <div class="px-4 pt-4 pb-2">
                            <h6 class="fw-bold text-dark mb-0"><i class="bi bi-wallet2 text-secondary me-2"></i>Itemized Commercial Package Valuation</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-borderless table-sm align-middle mb-0" style="font-size: 13px;">
                                <thead class="table-light font-monospace text-secondary text-uppercase fs-7 border-bottom" style="height: 36px;">
                                    <tr>
                                        <th class="ps-4">Cost Structure Segment</th>
                                        <th class="text-end">Base Calculation Units</th>
                                        <th class="pe-4 text-end">Segment Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody class="text-secondary">
                                    <tr class="border-bottom">
                                        <td class="ps-4 py-2 fw-medium text-dark">Platinum Catered Menu Allocation</td>
                                        <td class="text-end font-monospace">₱1,300.00 × 250 Pax</td>
                                        <td class="pe-4 text-end font-monospace text-dark fw-semibold">₱325,000.00</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="ps-4 py-2 fw-medium text-dark">Jade Ballroom Base Rent / Block Setup</td>
                                        <td class="text-end font-monospace">Flat Allocation Fee</td>
                                        <td class="pe-4 text-end font-monospace text-dark fw-semibold">₱80,000.00</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td class="ps-4 py-2 fw-medium text-dark">Technical Production Integrated AV Bundle</td>
                                        <td class="text-end font-monospace">Standard Stage Package</td>
                                        <td class="pe-4 text-end font-monospace text-dark fw-semibold">₱20,000.00</td>
                                    </tr>
                                    <tr class="table-light">
                                        <td class="ps-4 py-3 fw-bold text-dark">Grand Total</td>
                                        <td></td>
                                        <td class="pe-4 text-end font-monospace text-primary fw-bold fs-6">₱425,000.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>