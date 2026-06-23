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
              <button class="btn btn-sm shadow px-4 py-2 rounded-3 fw-medium" type="button" data-bs-dismiss="modal" id="btn-cancel-account">
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


<!-- Modal Charge Slip form -->
<form id="frm-charge-slip">
    <div class="modal fade" id="mld-charge-slip" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exportLedgerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom p-4">
                    <div class="d-flex align-items-center gap-2.5">
                        <div>
                            <h6 class="modal-title fw-bold text-dark mb-0" id="exportLedgerModalLabel">Charge Slip Form</h6>
                        </div>
                    </div>
                </div>
                <div class="modal-body p-4">
                        <div class="card border-0 shadow-sm mb-1">
                            <div class="card-body">
                                <div class="row g-3">
                                    <input type="hidden" id="slipnumber">
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted">
                                            Charge Slip No.
                                        </label>
                                        <input type="text" class="form-control" readonly id="slip_refnumber">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted">
                                            Booking No.
                                        </label>
                                        <input type="text" class="form-control" required id="booking_number">
                                        <span id="error_message" class="alert alert-danger d-none">Invalid booking number.</span>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label small text-muted">
                                            Event Name
                                        </label>
                                        <input type="text" class="form-control" readonly required id="event_name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label small text-muted">
                                            Guest (Complete name)
                                        </label>
                                        <input type="text" class="form-control" id="guest_completename" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted">
                                            Charge Type
                                        </label>
                                        <select class="form-select" id="chargeslip_no" required>
                                            <option value="">Choose...</option>
                                            <option value="Damage">Damage</option>
                                            <option value="Overtime">Overtime</option>
                                            <option value="Additional Guest">Additional Guest</option>
                                            <option value="Cleaning Fee">Cleaning Fee</option>
                                            <option value="Lost Item">Lost Item</option>
                                            <option value="Miscellaneous">Miscellaneous</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small text-muted">
                                            Incident Date
                                        </label>
                                        <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" readonly id="incident_date" required> 
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small text-muted">
                                            Incident Time
                                        </label>
                                        <input type="time" class="form-control" id="inident_time" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted">
                                            Quantity
                                        </label>
                                        <input type="number" class="form-control" value="1" id="report_quantity" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class=   "form-label small text-muted">
                                            Description
                                        </label>
                                        <textarea class="form-control" rows="3" placeholder="Description..." id="report_description" required></textarea>
                                    </div>

                                   
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted">Unit Cost</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                PHP
                                            </span>
                                            <input type="text" class="form-control with-comma" id="unit-cost" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small text-muted">Charge Amount</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                PHP
                                            </span>
                                            <input type="text" class="form-control with-comma" id="charge-amount" required readonly>
                                        </div>
                                    </div>
                                   
                                  <!--  <div class="col-md-12">
                                       <label class="form-label small text-muted">
                                           Evidence / Damage Photo (Optional)
                                       </label>

                                       <input type="file" id="damage-photo" accept="image/*" capture="environment" hidden>

                                       <div id="photo-container"
                                            class="border rounded-3 bg-light text-center p-4 cursor-pointer">

                                           <div id="photo-placeholder">
                                               <i class="bi bi-camera-fill fs-1 text-secondary"></i>
                                               <div class="mt-2 fw-semibold">
                                                   Tap to Capture Photo
                                               </div>
                                               <small class="text-muted">
                                                   Take a picture of the damage or incident
                                               </small>
                                           </div>

                                           <img id="photo-preview"
                                                class="img-fluid rounded d-none"
                                                style="max-height:300px;">
                                       </div>

                                       <div class="mt-2 d-none text-center" id="photo-actions">
                                           <button type="button" class="btn btn-primary btn-sm" id="btn-recapture">
                                               <i class="bi bi-camera"></i>
                                               Re-Capture
                                           </button>

                                           <button type="button" class="btn btn-danger btn-sm" id="btn-remove-photo">
                                               <i class="bi bi-trash"></i>
                                               Remove
                                           </button>
                                       </div>
                                   </div> -->

                                   <div id="photo-container" class="border rounded p-3 text-center">
                                       <video id="camera-preview" autoplay playsinline class="w-100 d-none"></video>
                                       <img id="photo-preview" class="img-fluid d-none">
                                       <div id="photo-placeholder" class="py-5 text-center">
                                           <div class="mb-3">
                                               <i class="bi bi-camera-fill fs-1 text-secondary"></i>
                                           </div>
                                           <div class="fw-semibold text-dark">
                                               Tap to Capture Photo
                                           </div>
                                           <small class="text-muted d-block mt-1">
                                               Take a picture of the damage or incident
                                           </small>

                                       </div>
                                   </div>
                                    <input type="file" id="evidence_proof" name="evidence_proof" class="d-none">
                                   <canvas id="photo-canvas" class="d-none"></canvas>
                                   <div id="photo-actions" class="d-none mt-2 text-center">
                                       <button type="button" class="btn btn-warning" id="btn-recapture">
                                           Recapture
                                       </button>

                                       <button type="button" class="btn btn-danger" id="btn-remove-photo">
                                           Remove
                                       </button>

                                       <button type="button" class="btn btn-success" id="btn-capture">
                                           Capture
                                       </button>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer bg-white px-4 py-3 border-top justify-content-end gap-2">
                    <button type="submit" id="btn-submit-slip" class="btn btn-success shadow px-4 py-2 rounded-3 fw-medium">
                        <span class="spinner-border spinner-border-sm d-none me-1" id="btn-spinner-slip" role="status" aria-hidden="true"></span>
                        <span class="btn-text-slip">Submit</span>
                    </button>
                    <button type="button" class="btn btn-light px-4 shadow py-2 rounded-3 fw-medium" data-bs-dismiss="modal" id="btn-cancel-slip">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Modal Review Charge Slip -->
<div class="modal fade" id="mdl-view-charges" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exportLedgerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-bottom p-4">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="row g-3 border-bottom pb-4 mb-4">
                            <div class="col-12 col-sm-12">
                                <small class="text-uppercase tracking-wider text-muted fs-7 d-block mb-1" id="r_eventname">
                                </small>
                                <div class="fw-bold text-dark mb-1" id="r_guest">
                                </div>
                                <div class="text-muted small" id="r_chargetype">
                                </div>
                                <div class="text-muted small">
                                    Incident Date: 
                                    <span class="fw-semibold text-dark" id="r_incidate">
                                    </span>
                                </div>
                                <input type="hidden" id="r_slipnomber">
                                <input type="hidden" id="r_chargeamount">
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Description</th>
                                            <th class="text-center">Qty</th>
                                            <th width="150" class="text-end">Unit Cost</th>
                                            <th width="150" class="text-end">Settlement</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="r_description">
                                            </td>
                                            <td class="text-center" id="r_quantity">
                                            </td>
                                            <td class="text-end" id="r_unicost">
                                            </td>
                                            <td class="text-end" id="r_amont">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="card border-0 shadow-sm">
                        <div class="card evidence-card mb-2">
                            <div class="evidence-empty" id="evidence-empty">
                                <div class="evidence-icon">
                                    <i class="bi bi-image"></i>
                                </div>

                                <h6 class="mb-1">No Proof Evidence</h6>
                                <small>
                                    No attached image or document was provided.
                                </small>
                            </div>
                            <img  src="#"  id="r_evidence_proof_preview" class="evidence-preview d-none">
                        </div>
                        <div class="row g-3">

                            <!-- Prepared Information -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <h6 class="mb-0 fw-semibold">
                                                Prepared by
                                            </h6>
                                        </div>
                                        <h6 class="fw-semibold mb-1" id="submitby">
                                        </h6>
                                        <small class="text-muted" id="werkposition">
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- Processed Information -->
                            <div class="col-md-6" id="rejected-chargeslip">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <h6 class="mb-0 fw-semibold">
                                                Processed by
                                            </h6>
                                        </div>
                                        <h6 class="fw-semibold mb-1" id="processedby">
                                        </h6>
                                        <small class="text-muted d-block mb-3" id="procposition">
                                        </small>
                                        <div class="border-top pt-3">
                                            <small class="text-muted d-block mb-1">
                                                Remarks
                                            </small>
                                            <p id="r_remarks"class="mb-0 text-danger fw-semibold"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white px-4 py-3 border-top justify-content-end gap-2" id="slip-action-buttons">
                    <button type="button" class="btn btn-secondary shadow px-4 py-2 rounded-3 fw-medium">
                        <i class="bi bi-printer"></i> Print
                    </button>
                    <button type="button" class="btn btn-success shadow px-4 py-2 rounded-3 fw-medium" onclick="mdalPayment()">
                        Approve
                    </button>
                    <button type="button" class="btn btn-danger shadow px-4 py-2 rounded-3 fw-medium" onclick="mldReject()">
                        Reject
                    </button>
                </div>
            </div>
        </div>
    </div>

<!-- Modal rejct charges application -->
<form id="frm-reject-slip">
<div class="modal fade" id="mdl-reject-charges" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exportLedgerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <input type="hidden" id="slipnumber_rjct">
                    <div class="text-center mb-4">
                        <div class="mb-3">
                            <i class="bi bi-exclamation-triangle-fill text-danger fs-1"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Reject Charge Slip</h5>
                        <p class="text-muted mb-0">
                            Please provide a reason for rejecting this charge slip.
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Remarks
                        </label>
                        <textarea class="form-control" maxlength="100" id="remarks-reject" rows="5" placeholder="Description..." required></textarea>
                        <div class="form-text">
                            100 Max Character.
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white px-4 py-3 border-top justify-content-end gap-2">
                    <button type="submit" id="btn-submit-rejcharge" class="btn btn-success shadow px-4 py-2 rounded-3">
                      <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-rejcharge"></span>
                      <span class="btn-text-rejcharge">Save</span>
                    </button>
                    <button type="button" id="btn-cancel-rejcharge" class="btn btn-secondary shadow px-4 py-2 rounded-3 fw-medium" data-bs-dismiss="modal" aria-label="Close">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

<script>


    $("#frm-reject-slip").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-rejcharge");
        let $btnCancel = $("#btn-cancel-rejcharge");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-rejcharge");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var SlipNom  = $("#slipnumber_rjct").val();
        var Remarks   = $("#remarks-reject").val();

        $.post("dirs/dashboard/actions/update_rejectcharge.php", {
            SlipNom: SlipNom,
            Remarks: Remarks
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "success"){
                loadEvent_Charges();
                $text.text("Save");
                $("#frm-reject-slip")[0].reset();
                $("#mdl-reject-charges").modal('hide');
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "Charge rejected.",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });

            }else{
               Swal.fire({
                 icon: "error",
                 title: "Oops!",
                 text: data,
                 confirmButtonText: "OK"
               });
               $("#mdl-reject-charges").modal('hide');

            }
        });
    });
  
    /*Function to show again then view charges modal */
    $("#btn-rej-cancel").on('click', function () {
        $("#mdl-view-charges").modal('show');
    });



    /*Function to apply with comma*/
    $(document).on("input", ".with-comma", function () {
        var valuenum = $(this).val();
        valuenum = valuenum.replace(/[^\d.]/g, '');
        let parts = valuenum.split('.');
        if (parts.length > 2) {
            valuenum = parts[0] + '.' + parts.slice(1).join('');
        }
        if (valuenum !== '') {
            let decimal = '';
            if (valuenum.includes('.')) {
                let split = valuenum.split('.');
                valuenum = split[0];
                decimal = '.' + split[1];
            }
            valuenum = Number(valuenum || 0).toLocaleString('en-US') + decimal;
        }
        $(this).val(valuenum);
    });


    // $("#photo-container").click(function () {
    //     $("#damage-photo").trigger("click");
    // });

    // $("#btn-recapture").click(function () {
    //     $("#damage-photo").trigger("click");
    // });

    // $("#damage-photo").change(function (e) {

    //     const file = e.target.files[0];

    //     if (!file) return;

    //     const reader = new FileReader();

    //     reader.onload = function (event) {

    //         $("#photo-preview")
    //             .attr("src", event.target.result)
    //             .removeClass("d-none");

    //         $("#photo-placeholder").hide();

    //         $("#photo-actions").removeClass("d-none");
    //     };

    //     reader.readAsDataURL(file);
    // });

    // $("#btn-remove-photo").click(function () {

    //     $("#damage-photo").val("");

    //     $("#photo-preview")
    //         .attr("src", "")
    //         .addClass("d-none");

    //     $("#photo-placeholder").show();

    //     $("#photo-actions").addClass("d-none");
    // });

    var stream;


    // create FileList from file
    function createFileList(file){

        let dataTransfer = new DataTransfer();

        dataTransfer.items.add(file);

        return dataTransfer.files;

    }



    // Open camera
    function openCamera(){

        navigator.mediaDevices.getUserMedia({
            video:{
                facingMode:"environment"
            }
        })
        .then(function(mediaStream){

            stream = mediaStream;

            $("#camera-preview")
                .prop("srcObject", stream)
                .removeClass("d-none");


            $("#photo-preview")
                .addClass("d-none");


            $("#photo-placeholder").hide();


            $("#photo-actions").removeClass("d-none");

            $("#btn-capture").removeClass("d-none");

            $("#btn-recapture,#btn-remove-photo")
                .addClass("d-none");


        })
        .catch(function(error){

            alert("Camera permission denied.");
            console.log(error);

        });

    }



    // open camera
    $("#photo-container").click(function(){

        openCamera();

    });





    // Capture
    $("#btn-capture").click(function(e){

        e.stopPropagation();


        let video = document.getElementById("camera-preview");

        let canvas = document.getElementById("photo-canvas");


        canvas.width  = video.videoWidth;

        canvas.height = video.videoHeight;


        let ctx = canvas.getContext("2d");


        ctx.drawImage(
            video,
            0,
            0,
            canvas.width,
            canvas.height
        );



        // convert canvas to real file
        canvas.toBlob(function(blob){


            let filename = "evidence_" + Date.now() + ".png";


            let file = new File(
                [blob],
                filename,
                {
                    type:"image/png"
                }
            );



            // preview
            let previewURL = URL.createObjectURL(file);


            $("#photo-preview")
                .attr("src",previewURL)
                .removeClass("d-none");



            // store file into input
            $("#evidence_proof")[0].files = createFileList(file);



        },"image/png");





        $("#camera-preview")
            .addClass("d-none");



        if(stream){

            stream.getTracks().forEach(track=>{
                track.stop();
            });

        }



        $("#btn-capture")
            .addClass("d-none");


        $("#btn-recapture,#btn-remove-photo")
            .removeClass("d-none");


    });






    // Recapture
    $("#btn-recapture").click(function(){


        // clear old file
        $("#evidence_proof").val("");


        openCamera();


    });






    // Remove
    $("#btn-remove-photo").click(function(){


        $("#photo-preview")
            .attr("src","")
            .addClass("d-none");



        // clear uploaded file
        $("#evidence_proof").val("");



        $("#photo-placeholder").show();


        $("#photo-actions")
            .addClass("d-none");


        $("#btn-capture")
            .removeClass("d-none");


        $("#btn-recapture,#btn-remove-photo")
            .addClass("d-none");



        if(stream){

            stream.getTracks().forEach(track=>{
                track.stop();
            });

        }


    });

/*Submit Application form for damage and evidence*/
   $("#frm-charge-slip").submit(function(event){

       event.preventDefault();


       let $btnSubmit = $("#btn-submit-slip");
       let $btnCancel = $("#btn-cancel-slip");
       let $spinner = $("#btn-spinner-slip");
       let $text = $btnSubmit.find(".btn-text-slip");


       function showLoading() {
           $btnSubmit.prop("disabled", true);
           $btnCancel.prop("disabled", true);
           $spinner.removeClass("d-none");
           $text.text("Saving...");
       }


       function hideLoading() {
           $btnSubmit.prop("disabled", false);
           $btnCancel.prop("disabled", false);
           $spinner.addClass("d-none");
           $text.text("Submit");
       }



       // use FormData
       var formData = new FormData();


       formData.append(
           "SlipNum",
           $("#slipnumber").val()
       );

       formData.append(
           "BookigNum",
           $("#booking_number").val()
       );

       formData.append(
           "EventName",
           $("#event_name").val()
       );

       formData.append(
           "GuestName",
           $("#guest_completename").val()
       );

       formData.append(
           "ChargeType",
           $("#chargeslip_no").val()
       );

       formData.append(
           "IncidentDate",
           $("#incident_date").val()
       );

       formData.append(
           "IncidentTime",
           $("#inident_time").val()
       );

       formData.append(
           "Quantity",
           $("#report_quantity").val()
       );

       formData.append(
           "Description",
           $("#report_description").val()
       );

       formData.append(
           "UnitCost",
           $("#unit-cost").val()
       );

       formData.append(
           "ChargeAmount",
           $("#charge-amount").val()
       );



       // attach captured image
       if($("#evidence_proof")[0].files.length > 0){

           formData.append(
               "Evidence",
               $("#evidence_proof")[0].files[0]
           );

       }



       showLoading();

       $.ajax({

           url: "dirs/dashboard/actions/save_charge_evidence.php",

           type: "POST",

           data: formData,

           contentType: false,

           processData: false,


           success:function(data){

               if($.trim(data) === "OK"){

                   $("#frm-charge-slip")[0].reset();

                   loadEventCharges();

                   resetPhotoCapture();

                   $("#mld-charge-slip").modal("hide");


                   Swal.fire({
                       toast:true,
                       position:"top-end",
                       icon:"success",
                       title:"Successfully submitted",
                       showConfirmButton:false,
                       timer:2000
                   });


                   hideLoading();


               }else{


                   hideLoading();


                   Swal.fire({
                       icon:"error",
                       title:"Oops!",
                       text:data
                   });


               }

           },


           error:function(xhr){


               hideLoading();


               Swal.fire({
                   icon:"error",
                   title:"Connection Error",
                   text:"Unable to connect to the server. Please try again."
               });


               console.log(xhr.responseText);

           }

       });
       })



    function resetPhotoCapture() {
        $("#photo-preview")
            .attr("src", "")
            .addClass("d-none");

        $("#camera-preview")
            .addClass("d-none")
            .prop("srcObject", null);

        $("#photo-placeholder").show();

        $("#photo-actions").addClass("d-none");

        $("#btn-capture").removeClass("d-none");
        $("#btn-recapture, #btn-remove-photo").addClass("d-none");

        if (typeof stream !== "undefined" && stream) {
            stream.getTracks().forEach(track => track.stop());
            stream = null;
        }
    }

</script>

<style>
    .evidence-card {
        min-height: 250px;
        border: 1px dashed #dee2e6;
        overflow: hidden;
        background: #fafafa;
    }


    .evidence-empty {
        height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #6c757d;
        text-align: center;
        padding: 20px;
    }


    .evidence-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: #f1f3f5;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
    }


    .evidence-icon i {
        font-size: 35px;
        color: #adb5bd;
    }


    .evidence-preview{
        width:100%;
        height:auto;
        object-fit:cover;
        border-radius:10px;
    }
    #photo-container {
        cursor: pointer;
        min-height: 250px;
        border: 2px dashed #dee2e6;
        background: #f8f9fa;
        transition: .2s ease;
    }

    #photo-container:hover {
        background: #f1f3f5;
    }
</style>


<style>
  /* VISUAL PAYMENT METHOD SELECTION CARDS */
  .payment-method-card {
    border: 2px solid #dee2e6;
    border-radius: 12px;
    padding: 14px;
    cursor: pointer;
    text-align: center;
    transition: all 0.2s ease-in-out;
    background-color: #f8f9fa;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    user-select: none;
  }

  .payment-method-card i {
    font-size: 1.5rem;
    margin-bottom: 6px;
    color: #6c757d;
    transition: color 0.2s ease-in-out;
  }

  .payment-method-card span {
    font-size: 0.8rem;
    font-weight: 600;
    color: #495057;
  }

  /* HIDDEN CHECKBOX INPUTS UNDER THE CARDS */
  .payment-check-input {
    position: absolute;
    opacity: 0;
    pointer-events: none;
  }

  /* SELECTED STATE STYLE CHANGES (MULTI-SELECT COMPATIBLE) */
  .payment-check-input:checked + .payment-method-card {
    border-color: #198754; /* Success Green Theme */
    background-color: rgba(25, 135, 84, 0.04);
  }

  .payment-check-input:checked + .payment-method-card i {
    color: #198754;
  }

  .payment-check-input:checked + .payment-method-card span {
    color: #198754;
  }

  /* COMPACT CUSTOM LAYOUT EXTENSION FOR CONDITIONAL INLINE BLOCKS */
  .payment-sub-form-section {
    background-color: #f8f9fa;
    border: 1px dashed #dee2e6;
    border-radius: 8px;
    padding: 16px;
    margin-top: 12px;
  }
  
  .payment-sub-form-section h6 {
    font-size: 0.85rem;
    letter-spacing: 0.5px;
  }

  /* ENHANCE SEGMENT CONTAINERS FOR ABSOLUTE ELEMENT MANAGEMENT */
  .payment-sub-form-section.position-relative {
    padding-top: 8px !important;
  }

  /* PRINTS SAFE BUFFER ZONES SO TITLES NEVER MERGE OVER LAP WITH X BUTTONS */
  .payment-sub-form-section .font-monospace.mb-2 {
    padding-right: 35px !important;
  }

  /* MODERN DRAG-AND-DROP BROKEN LINE ZONE CONTAINER */
  .modern-dropzone-wrapper {
    width: 100%;
    min-height: 200px; /* Starting size when empty */
    height: auto;      /* Allows container to grow/shrink with the image size */
    border: 2px dashed #cbd5e1;
    border-radius: 12px;
    background-color: #ffffff;
    cursor: pointer;
    position: relative;
    transition: border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
    
    /* Centers placeholder text when empty */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  /* HOVER EFFECT SETUP */
  .modern-dropzone-wrapper:hover {
    border-color: #0d6efd;
    background-color: rgba(13, 110, 253, 0.02);
  }

  /* MORPHS INTO A SOLID BOX WHEN A FILE IS UPLOADED */
  .modern-dropzone-wrapper.has-file {
    border-style: solid;
    border-color: #198754; 
    padding: 0; /* Clear padding so the image meets the borders cleanly */
  }

  /* THE NATURAL ADAPTIVE IMAGE ENGINE */
  .modern-dropzone-wrapper .modern-preview-img {
    display: block;
    max-width: 100%;   /* Prevents the image from overflowing your bootstrap column width */
    height: auto;      /* Keeps the exact true aspect ratio of the photo */
    border-radius: 10px; /* Matches the parent container rounding nicely */
  }

  /* SAFE CENTERED RENDER EXTENSION FOR STANDARD DIRECT PDF DROPS */
  .modern-dropzone-wrapper .pdf-attached-layout {
    padding: 20px;
  }

  .tiny-text {
    font-size: 0.72rem !important;
  }

  .filename-metadata-tray {
    font-size: 0.78rem;
    display: flex;
    align-items: center;
  }

  /* Controls the responsive footprint of your brand logo layouts */
  .provider-radio {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
  }

  /* Modern Visual Card Base Style */
  .provider-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: #ffffff;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 12px 8px;
    cursor: pointer;
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    height: 85px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.01);
  }

  /* Micro-interactions when tapping/hovering */
  .provider-card:hover {
    border-color: #ced4da;
    transform: translateY(-1px);
  }

  /* Premium Selected State Accent */
  .provider-radio:checked + .provider-card {
    border-color: #0d6efd;
    background-color: #f8faff;
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.08);
  }

  /* Embedded Micro Logo Constraints */
  .provider-micro-logo {
    height: 28px;
    max-width: 90%;
    object-fit: contain;
    margin-bottom: 4px;
  }

  /* Master Hero Preview Logo on the right side */
  .digital-bank-logo {
    width: 100%;
    max-width: 140px;
    height: 50px;
    object-fit: contain;
    animation: smoothFadeIn 0.2s ease-out;
  }

  @keyframes smoothFadeIn {
    from { opacity: 0; transform: scale(0.96); }
    to { opacity: 1; transform: scale(1); }
  }

  /* Responsive optimizations for shorter tablet views */
  @media screen and (max-height: 600px) {
    .provider-card { height: 75px; padding: 8px 4px; }
    .digital-bank-logo { height: 38px; }
  }
</style>

<form id="frm-confirmation-booking" autocomplete="off" class="needs-validation" novalidate>
  <div class="modal fade" id="mdl-payment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content border-0 shadow-lg rounded-4">
        
        <div class="modal-header border-bottom px-4 pt-4 pb-3">
          <div>
            <h5 class="modal-title fs-5 fw-bold text-dark">Payment</h5>
            <p class="text-muted small mb-0">Choose one or more payment options to settle the amount.</p>
          </div>
        </div>

        <div class="modal-body p-4 position-relative">
          
          <div class="sticky-top bg-white pt-2 pb-3 mb-3 border-bottom" style="top: -24px; z-index: 1020; margin-left: -24px; margin-right: -24px; padding-left: 24px; padding-right: 24px;">
            <div class="row g-3 align-items-end">
              
              <div class="col-12 col-md-12">
                <label class="form-label small text-muted fw-bold mb-1" for="gross-total-paid">Total Amount Received</label>
                <div class="input-group">
                  <span class="input-group-text bg-light border-end-0 fw-bold text-muted">PHP</span>
                  <input type="text" class="form-control border-start-0 fw-semibold text-muted bg-light with-comma" id="gross-total-paid" name="gross-total-paid">
                </div>
              </div>
            </div>

            <div class="mt-3">
              <label class="form-label small text-muted fw-bold mb-2">Select Payment Method(s)</label>
              <div class="row g-2 align-items-center">
                
                <div class="col-4 col-md-2">
                  <input type="checkbox" name="payment_method" id="pay-cash" value="Cash" class="payment-check-input" checked>
                  <label for="pay-cash" class="payment-method-card mb-0">
                    <i class="bi bi-cash-stack"></i>
                    <span>Cash</span>
                  </label>
                </div>

                <div class="col-4 col-md-2">
                  <input type="checkbox" name="payment_method" id="pay-bank" value="Bank Transfer" class="payment-check-input">
                  <label for="pay-bank" class="payment-method-card mb-0">
                    <i class="bi bi-bank"></i>
                    <span>Bank</span>
                  </label>
                </div>

                <div class="col-4 col-md-2">
                  <input type="checkbox" name="payment_method" id="pay-check" value="Check" class="payment-check-input">
                  <label for="pay-check" class="payment-method-card mb-0">
                    <i class="bi bi-card-heading"></i>
                    <span>Check</span>
                  </label>
                </div>

                <div class="col-4 col-md-2">
                  <input type="checkbox" name="payment_method" id="pay-card" value="Debit/Card" class="payment-check-input">
                  <label for="pay-card" class="payment-method-card mb-0">
                    <i class="bi bi-credit-card"></i>
                    <span>Card</span>
                  </label>
                </div>

                <div class="col-4 col-md-2">
                  <input type="checkbox" name="payment_method" id="pay-online" value="Online Banking" class="payment-check-input">
                  <label for="pay-online" class="payment-method-card mb-0">
                    <i class="bi bi-globe"></i>
                    <span>E-Wallet</span>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <div class="row g-3 pt-2">
            <div id="payment-forms"></div>
          </div>
          
        </div> 
        <div class="modal-footer border-top px-4 py-3 bg-light rounded-bottom-4">
          <button type="button" id="btn-submit-booking" class="btn btn-success px-4 py-2 fw-semibold rounded-3 shadow-sm d-inline-flex align-items-center gap-2" onclick="mdlapplyPayment()">
            <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-booking" role="status"></span>
            <span class="btn-text-booking">Proceed</span>
          </button>
          <button type="button" class="btn btn-light border px-3 py-2 small fw-medium rounded-3 text-secondary" data-bs-target="#mdl-view-charges" data-bs-toggle="modal">Cancel</button>
        </div>


      </div>
    </div>
  </div>
</form>

<script>
    $(document).ready(function () {
        loadPaymentTemplates();
        calculateGrossTotalPaid();

    });

    /*Function to switch and add type of payment method*/
    $(document).on("change", ".payment-check-input", function () {
        loadPaymentTemplates();
    });
  
  function loadPaymentTemplates() {
      const templates = {
          "Cash": "#template-payment-cash",
          "Bank Transfer": "#template-payment-bank",
          "Check": "#template-payment-check",
          "Debit/Card": "#template-payment-card",
          "Online Banking": "#template-payment-digibank"
      };

      // Load Cash by default
      $(document).ready(function () {

          if ($("#payment-Cash").length === 0) {
              $("#payment-forms").append(
                  `<div id="payment-Cash">
                      ${$(templates["Cash"]).html()}
                  </div>`
              );
          }

          // Optional: check the Cash checkbox automatically
          $('.payment-check-input[value="Cash"]').prop('checked', true);
      });

      $(document).on("change", ".payment-check-input", function () {

          const paymentType = $(this).val();

          // Prevent Cash from being removed
          if (paymentType === "Cash") {
              $(this).prop("checked", true);
              return;
          }

          const sectionId = "payment-" + paymentType.replace(/[^a-zA-Z0-9]/g, "");

          if ($(this).is(":checked")) {

              if ($("#" + sectionId).length === 0) {
                  $("#payment-forms").append(
                      `<div id="${sectionId}">
                          ${$(templates[paymentType]).html()}
                      </div>`
                  );
              }

          } else {
              $("#" + sectionId).remove();
          }

          calculateGrossTotalPaid();
      });
  }


  /*Function payment validation*/
  function validatePaymentUsage(argument) {
      // body...
  }



 function calculateGrossTotalPaid() {
     let total = 0;

     $('input[name="amount"]').each(function () {
         let value = ($(this).val() || '').replace(/,/g, '');
         total += parseFloat(value) || 0;
     });

     $('#gross-total-paid').val(
         total.toLocaleString('en-US', {
             minimumFractionDigits: 2,
             maximumFractionDigits: 2
         })
     );
 }

 $(document).on('input', 'input[name="amount"]', function () {
     calculateGrossTotalPaid();
 });



/*Tommorow update for applying payment*/
  function mdlapplyPayment(){
      var SlipNo = $("#r_slipnomber").val();
      var ChargeAmount = $("#r_chargeamount").val();






      $.post("dirs/dashboard/actions/update_apply_payment.php", {
          SlipNo : SlipNo,
      }, function(data){
          if($.trim(data) == "OK"){
              $("#mdl-payment").modal('hide')
              $("#modal-add-student").modal("hide");
              loadEvent_Charges();
          }else{
              console.log("Error: " + data);
          }
      });
  }

</script>




