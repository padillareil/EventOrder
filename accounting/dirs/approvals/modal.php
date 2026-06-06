<!-- Financial Ledger Export Setup Modal Component -->
<div class="modal fade" id="exportLedgerModal" tabindex="-1" aria-labelledby="exportLedgerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            
            <!-- Modal Header -->
            <div class="modal-header border-bottom p-4">
                <div class="d-flex align-items-center gap-2.5">
                    <div>
                        <h6 class="modal-title fw-bold text-dark mb-0" id="exportLedgerModalLabel">Export Financial Ledger</h6>
                        <small class="text-muted">Generate auditable accounting records for external ERP sync.</small>
                    </div>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Content Parameters -->
            <div class="modal-body p-4 bg-light-subtle">
                <form id="ledgerExportForm">
                    
                    <!-- Parameter 2: Date Scope Window Selection -->
                    <div class="mb-3">
                        <label for="exportDateRange" class="form-label small fw-semibold text-dark">Date Range Filter</label>
                        <select class="form-select border rounded-3 p-2.5 small bg-white shadow-xs" id="exportDateRange">
                            <option value="today" selected>Current Day Transactions (Today)</option>
                            <option value="current_month">Current Billing Cycle (Month-to-Date)</option>
                            <option value="previous_month">Previous Closed Period (Last Month)</option>
                            <option value="custom">Custom Date Range Range...</option>
                        </select>
                    </div>

                    <!-- Parameter 3: System Data Included Checkboxes -->
                    <div class="mb-1">
                        <label class="form-label small fw-semibold text-dark d-block">Data Scopes Included</label>
                        
                        <div class="form-check form-checked-dark mb-2">
                            <input class="form-check-input border shadow-xs" type="checkbox" id="includeRevenue" checked>
                            <label class="form-check-label small text-secondary" for="includeRevenue">
                                Approved Base Revenue Breakdown <span class="text-muted font-monospace fs-7">($142,800)</span>
                            </label>
                        </div>
                        
                        <div class="form-check form-checked-dark mb-2">
                            <input class="form-check-input border shadow-xs" type="checkbox" id="includeDeposits" checked>
                            <label class="form-check-label small text-secondary" for="includeDeposits">
                                Escrow Ledger & Guaranteed Deposits Received
                            </label>
                        </div>

                        <div class="form-check form-checked-dark mb-0">
                            <input class="form-check-input border shadow-xs" type="checkbox" id="includeCancellations" checked>
                            <label class="form-check-label small text-secondary" for="includeCancellations">
                                Cancellation Penalties & Forfeited Revenue Logs
                            </label>
                        </div>
                    </div>

                </form>
            </div>

            <!-- Modal Bottom Processing Sub-Footer -->
            <div class="modal-footer p-3 border-top bg-white d-flex justify-content-between align-items-center">
                <span class="text-muted font-monospace" style="font-size: 11px;">READY: ~42 RECORDS</span>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-light border px-3 py-2 small fw-medium rounded-3 text-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success px-3 py-2 small fw-medium rounded-3 shadow-sm" onclick="processExportDownload()">
                        <i class="bi bi-file-earmark-arrow-down me-1"></i> Download
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="mld-review-booking" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4 border-0 shadow">

            <!-- HEADER -->
            <div class="modal-header row">
                <div class="text-center mb-2">
                    <h6 class="fw-bold text-uppercase mb-1 text-dark text-center mb-1">
                        <i>Function Contract</i>
                    </h6>
                </div>
                <div class="text-center mb-2">
                   <small class="text-muted">Agreement between GRAND XING IMPERIAL HOTEL hereinafter called "HOTEL" and "Client" named hereinafter</small>
                </div>
                <div class="text-center mb-2">
                   <small class="text-muted" id="pencil-code"> #12312</small>
                </div>
            </div>

            <!-- BODY -->
            <div class="modal-body bg-light-subtle p-4">
                <div class="card border-0 shadow-sm rounded-4 mb-1">
                    <div class="card-body p-2">
                        <div class="row g-3">

                            <!-- CLIENT -->
                            <div class="col-md-8">
                                <div class="text-muted small">Client Name /Event Title</div>
                                <div class="fw-semibold text-dark">
                                    BIRTHDAY (ANGELINE AMARACO)
                                </div>
                            </div>

                            <!-- ADDRESS -->
                            <div class="col-md-4">
                                <div class="text-muted small">Address</div>
                                <div class="fw-semibold text-dark">
                                    Iloilo City
                                </div>
                            </div>

                            <!-- VENUE -->
                            <div class="col-md-8">
                                <div class="text-muted small">Venue</div>
                                <div class="fw-semibold text-dark">
                                    Grand Xing Hotel - Jade
                                </div>
                            </div>

                            <!-- DATE -->
                            <div class="col-md-4">
                                <div class="text-muted small">Function Date</div>
                                <div class="fw-semibold text-dark">
                                    Feb 23–24, 2026
                                </div>
                            </div>

                            <!-- TIME -->
                            <div class="col-md-8">
                                <div class="text-muted small">Time</div>
                                <div class="fw-semibold text-dark">
                                    11:00 AM – 3:00 PM
                                </div>
                            </div>

                            <!-- FUNCTION TYPE -->
                            <div class="col-md-4">
                                <div class="text-muted small">Function Type</div>
                                <div class="fw-semibold text-dark">
                                    Socials
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- FINANCIAL SUMMARY -->
                <div class="card border-0 shadow-sm rounded-4 mb-1">
                    <div class="card-body p-2">

                        <h6 class="fw-bold text-dark mb-3">Financial Summary</h6>

                        <div class="row g-3">

                            <div class="col-md-4">
                                <div class="text-muted small">Guaranteed Pax</div>
                                <div class="fw-semibold">50 Pax</div>
                            </div>

                           <!--  <div class="col-md-4">
                                <div class="text-muted small">Rate per Pax</div>
                                <div class="fw-semibold">PHP 630.00</div>
                            </div> -->

                            <div class="col-md-4">
                                <div class="text-muted small">Total Cost</div>
                                <div class="fw-bold text-dark fs-6">
                                    PHP 31,500.00
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="text-muted small">Billing Arrangement</div>
                                <div class="fw-semibold">
                                    Cash before Function
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Breakdown of Package -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3">
                    <div class="card-header bg-white border-bottom-0 pt-3 pb-2 px-3">
                        <h6 class="fw-bold text-dark mb-0 d-flex align-items-center">
                            Food and Venue Package
                        </h6>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle mb-0" style="font-size: 14px;">
                            <thead class="table-secondary text-muted small">
                                <tr>
                                    <th scope="col" class="ps-3">Particular</th>
                                    <th scope="col" class="text-center">Rate/Day</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col" class="text-end pe-3">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-3 fw-medium text-dark">Assisted Buffet</td>
                                    <td class="text-end text-secondary">PHP 600.00</td>
                                    <td class="text-center text-secondary">50</td>
                                    <td class="text-end pe-3 fw-semibold text-dark">PHP 30,000.00</td>
                                </tr>
                                <tr>
                                    <td class="ps-3 fw-medium text-dark">
                                        Flowing Coffee (Instant)
                                    </td>
                                    <td class="text-end text-secondary">PHP 1,500.00</td>
                                    <td class="text-center text-secondary">1</td>
                                    <td class="text-end pe-3 fw-semibold text-dark">PHP 1,500.00</td>
                                </tr>
                                
                                <tr class="table-light-subtle border-top fw-bold">
                                    <td colspan="3" class="text-center text-dark text-uppercase tracking-wider">Total Package:</td>
                                    <td class="text-end pe-3 text-success fs-6">PHP 31,500.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- Package Inclusions-->
               <div class="card border-0 shadow-sm rounded-4 mb-3">
                   <div class="card-body p-4">

                       <div class="d-flex align-items-center mb-3">
                           <i class="bi bi-box-seam text-primary me-2 fs-5"></i>
                           <h6 class="fw-bold text-uppercase mb-0">
                               Package Inclusions
                           </h6>
                       </div>

                       <p class="text-muted small mb-3">
                           Complimentary use of the function venue together with the following setup and amenities:
                       </p>

                       <div class="row g-2">

                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Banquet Setup – Round Tables (12 Seats)</span>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Table Runner – Gold</span>
                               </div>
                           </div>

                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Table Cloth – Cream</span>
                               </div>
                           </div>

                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Chair Cover – Gold</span>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Table Napkin</span>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>PA System and Microphones</span>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Fee Wifi Access During Event</span>
                               </div>
                           </div>

                       </div>

                   </div>
               </div>

               


               <div class="card border-0 shadow-sm rounded-4 mb-3">
                   <div class="card-body p-4">

                       <div class="d-flex align-items-center mb-3">
                           <i class="bi bi-list text-primary me-2 fs-5"></i>
                           <h6 class="fw-bold text-uppercase mb-0">
                               Menus
                           </h6>
                       </div>
                       <div class="row g-2">

                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Cream of Cauliflower Soup</span>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Fish Fillet in Tartar Sauce</span>
                               </div>
                           </div>

                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Rosemary herbed chicked</span>
                               </div>
                           </div>

                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Beef with Brocolli</span>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Stir - Fry Noodles</span>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Steamed Rice</span>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Lemon Creme Brule</span>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="d-flex align-items-start gap-2">
                                   <i class="bi bi-check text-success mt-1"></i>
                                   <span>Soda in a Glass</span>
                               </div>
                           </div>

                       </div>

                   </div>
               </div>

               <div class="card border-0 shadow-sm rounded-4 mb-3">
                   <div class="card-body p-4">
                       <div class="row g-3">

                           <div class="col-md-6">
                               <div class="text-muted small">Prepared By</div>
                               <div class="fw-semibold text-dark">
                                  Camille Prada
                               </div>
                           </div>


                           <div class="col-md-6">
                               <div class="text-muted small">Assigned Outlet</div>
                               <div class="fw-semibold text-dark">
                                   Grand Xing Imperial Hotel
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="text-muted small">Position</div>
                               <div class="fw-semibold text-dark">
                                   Sales Manager
                               </div>
                           </div>

                           <div class="col-md-6">
                               <div class="text-muted small">Date Created</div>
                               <div class="fw-semibold text-dark">
                                   June 4, 2026 2:45 PM
                               </div>
                           </div>

                       </div>

                   </div>
               </div>

            </div>

            <!-- FOOTER -->
            <div class="modal-footer px-4 pb-4">
                <button id="btn-edit-account" class="btn btn-primary shadow px-4 py-2 rounded-3" onclick="modifyCost()">
                  <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-account"></span>
                  <span class="btn-text-account">Adjust Cost</span>
                </button>
              <button id="btn-submit-account" class="btn btn-success shadow px-4 py-2 rounded-3">
                <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-account"></span>
                <span class="btn-text-account">Approve</span>
              </button>
              <button id="btn-reject-account" class="btn btn-danger shadow px-4 py-2 rounded-3">
                <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-account"></span>
                <span class="btn-text-account">Reject</span>
              </button>
              <button class="btn btn-light px-4 py-2 rounded-3" type="button" data-bs-dismiss="modal" id="btn-cancel-account">
                Cancel
              </button>
            </div>

        </div>
    </div>
</div>



<!-- Modal for adjustment of cost and rate per pax -->

<form id="frm-mod-cost">
    <div class="modal fade" id="mld-modify-costing" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">

                <div class="modal-header border-bottom px-4 py-3 align-items-center justify-content-between">
                    <h6 class="modal-title fw-bold text-dark mb-0 tracking-wider">
                        Cost Adjustment
                    </h6>
                </div>

                <div class="modal-body bg-light-subtle p-4">
                    
                    <div class="card border-0 shadow-sm rounded-3 bg-white p-3 mb-3">
                        <h6 class="fw-bold text-secondary mb-3 small text-uppercase tracking-wide border-bottom pb-2">
                            Original
                        </h6>
                        <div class="row g-3">
                            <div class="col-6 col-md-4">
                                <span class="text-muted d-block small mb-0">Rate / Day</span>
                                <span class="fw-semibold text-dark">PHP 600.00</span>
                            </div>
                            <div class="col-6 col-md-4">
                                <span class="text-muted d-block small mb-0">Discounted Amount</span>
                                <span class="fw-semibold text-dark">PHP 0.00</span>
                            </div>
                            <div class="col-12 col-md-4">
                                <span class="text-muted d-block small mb-0">Total Baseline</span>
                                <span class="fw-bold text-dark fs-6">PHP 31,500.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-3 bg-white p-3">
                        <h6 class="fw-bold text-primary mb-3 small text-uppercase tracking-wide border-bottom pb-2">
                            Adjustment Modifiers
                        </h6>
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label for="new-rate" class="form-label small text-muted fw-medium mb-1">New Rate / Day</label>
                                <div class="input-group shadow-sm rounded-3">
                                    <span class="input-group-text bg-light text-muted border-end-0 small">PHP</span>
                                    <input type="number" step="0.01" id="new-rate" name="new-rate" class="form-control ps-1 fw-medium text-dark" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="new-totalcost" class="form-label small text-muted fw-medium mb-1">New Total Cost</label>
                                <div class="input-group shadow-sm rounded-3">
                                    <span class="input-group-text bg-light text-muted border-end-0 small">PHP</span>
                                    <input type="number" step="0.01" id="new-totalcost" name="new-totalcost" class="form-control ps-1 fw-bold text-success" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="apply-discount" class="form-label small text-muted fw-medium mb-1">Apply Discount Rate</label>
                                <div class="input-group shadow-sm rounded-3">
                                    <input type="number" step="0.01" id="apply-discount" name="apply-discount" class="form-control text-end pe-1 fw-medium text-dark" placeholder="0.00" required>
                                    <span class="input-group-text bg-light text-muted border-start-0 small">%</span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="new-discountedamount" class="form-label small text-muted fw-medium mb-1">Resulting Discount Amount</label>
                                <div class="input-group shadow-sm rounded-3">
                                    <span class="input-group-text bg-light text-muted border-end-0 small">PHP</span>
                                    <input type="number" step="0.01" id="new-discountedamount" name="new-discountedamount" class="form-control ps-1 fw-medium text-dark" required>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <label for="modify-remarks" class="form-label small text-muted fw-medium mb-1">
                                    Modification Remarks <span class="text-danger">*</span>
                                </label>
                                <textarea id="modify-remarks" name="modify-remarks" class="form-control shadow-sm rounded-3 text-dark bg-light-subtle h-100"required></textarea>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer bg-white px-4 py-3 border-top justify-content-end gap-2">
                    <button type="submit" id="btn-submit-account" class="btn btn-success shadow px-4 py-2 rounded-3 fw-medium">
                        <span class="spinner-border spinner-border-sm d-none me-1" id="btn-spinner-account" role="status" aria-hidden="true"></span>
                        <span class="btn-text-account">Save</span>
                    </button>
                    <button type="button" class="btn btn-light px-4 py-2 rounded-3 fw-medium" data-bs-dismiss="modal" id="btn-cancel-account">
                        Cancel
                    </button>
                </div>

            </div>
        </div>
    </div>
</form>