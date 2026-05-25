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