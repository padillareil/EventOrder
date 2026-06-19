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



<script>
  



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


    // Open camera
    function openCamera(){

        navigator.mediaDevices.getUserMedia({
            video: {
                facingMode: "environment"
            }
        })
        .then(function(mediaStream){

            stream = mediaStream;

            $("#camera-preview")
                .prop("srcObject", stream)
                .removeClass("d-none");

            $("#photo-preview").addClass("d-none");

            $("#photo-placeholder").hide();

            // show only capture button
            $("#photo-actions").removeClass("d-none");
            $("#btn-capture").removeClass("d-none");
            $("#btn-recapture, #btn-remove-photo").addClass("d-none");

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
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        let ctx = canvas.getContext("2d");
        ctx.drawImage(
            video,
            0,
            0,
            canvas.width,
            canvas.height
        );
        let image = canvas.toDataURL("image/png");
        $("#photo-preview")
            .attr("src", image)
            .removeClass("d-none");
        $("#camera-preview")
            .addClass("d-none");
        if(stream){
            stream.getTracks().forEach(track=>{
                track.stop();
            });

        }

        $("#btn-capture").addClass("d-none");
        $("#btn-recapture, #btn-remove-photo").removeClass("d-none");

    });


    // Recapture
    $("#btn-recapture").click(function(){
        openCamera();
    });


    // Remove
    $("#btn-remove-photo").click(function(){

        $("#photo-preview")
            .attr("src","")
            .addClass("d-none");
        $("#photo-placeholder").show();
        $("#photo-actions").addClass("d-none");
        $("#btn-capture").removeClass("d-none");
        $("#btn-recapture, #btn-remove-photo").addClass("d-none");
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

       const formData = {
           SlipNum      : $("#slipnumber").val(),
           BookigNum    : $("#booking_number").val(),
           EventName    : $("#event_name").val(),
           GuestName    : $("#guest_completename").val(),
           ChargeType   : $("#chargeslip_no").val(),
           IncidentDate : $("#incident_date").val(),
           IncidentTime : $("#inident_time").val(),
           Quantity     : $("#report_quantity").val(),
           Description  : $("#report_description").val(),
           UnitCost     : $("#unit-cost").val(),
           ChargeAmount : $("#charge-amount").val(),
           Evidence     : $("#photo-preview").attr("src") || ""
       };

       showLoading();

       $.post(
           "dirs/dashboard/actions/save_charge_evidence.php",
           formData,
           function(data){
               if($.trim(data) === "OK"){
                   $("#frm-charge-slip")[0].reset();
                   resetPhotoCapture();
                   $("#mld-charge-slip").modal("hide");
                   Swal.fire({
                       toast: true,
                       position: "top-end",
                       icon: "success",
                       title: "Successfully submitted",
                       showConfirmButton: false,
                       timer: 2000
                   });
                   hideLoading();
               }else{
                   hideLoading();
                   Swal.fire({
                       icon: "error",
                       title: "Oops!",
                       text: data
                   });
               }
           }
       ).fail(function(){

           hideLoading();

           Swal.fire({
               icon: "error",
               title: "Connection Error",
               text: "Unable to connect to the server. Please try again."
           });
       });
   });


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