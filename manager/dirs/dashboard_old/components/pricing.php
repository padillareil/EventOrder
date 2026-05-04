<div class="card border-0 shadow-lg rounded-4 overflow-hidden">
    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-0 text-dark">Pricing Configuration</h5>
                <p class="text-muted small">Manually define event costs and apply adjustments.</p>
            </div>
            <div class="bg-primary-subtle p-2 rounded-3">
                <i class="bi bi-calculator text-primary fs-4"></i>
            </div>
        </div>
        <hr class="mt-2 mb-0 opacity-10">
    </div>

    <div class="card-body px-4 py-4 scroll-custom" style="max-height: 65vh; overflow-y: auto;">
        <div class="row g-4">
            
            <div class="col-12 col-lg-4">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary-subtle p-2 rounded-3 me-2"><i class="bi bi-people text-primary"></i></div>
                    <h6 class="text-uppercase text-dark x-small fw-bold mb-0 tracking-wider">Catering Costs</h6>
                </div>
                
                <div class="p-3 rounded-4 bg-light-subtle border border-light-subtle mb-3">
                    <div class="mb-3">
                        <label class="form-label x-small fw-bold text-muted mb-1">Guaranteed Pax</label>
                        <input type="number" class="form-control fw-bold shadow-sm-focus" id="calc-pax" value="100">
                    </div>
                    <div class="mb-3">
                        <label class="form-label x-small fw-bold text-muted mb-1">Rate Per Head</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted small">₱</span>
                            <input type="number" class="form-control border-start-0 fw-bold text-primary shadow-sm-focus" id="calc-rate" value="850">
                        </div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label x-small fw-bold text-muted mb-1">Catering Discount</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control border-end-0 shadow-sm-focus" id="calc-discount" value="0">
                            <span class="input-group-text bg-white border-start-0 text-muted">% Off</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 border-start-lg">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-info-subtle p-2 rounded-3 me-2"><i class="bi bi-building-gear text-info"></i></div>
                    <h6 class= text-dark x-small fw-bold mb-0 tracking-wider">Fixed Assets</h6>
                </div>
                
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label x-small fw-bold text-muted mb-1">Venue Rental</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white border-end-0 text-muted small">₱</span>
                            <input type="number" class="form-control border-start-0 shadow-sm-focus" id="calc-venue" value="15000">
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label x-small fw-bold text-muted mb-1">Equipment Add-ons</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white border-end-0 text-muted small">₱</span>
                            <input type="number" class="form-control border-start-0 shadow-sm-focus" id="calc-equip" value="0">
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label x-small fw-bold text-muted mb-1">Service Charge</label>
                        <div class="input-group input-group-sm">
                            <input type="number" class="form-control border-end-0 shadow-sm-focus" id="calc-service" value="10">
                            <span class="input-group-text bg-white border-start-0 text-muted">%</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="checkbox" id="tax-inclusive" checked>
                            <label class="form-check-label x-small fw-bold text-muted" for="tax-inclusive">VAT INCLUSIVE (12%)</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 border-start-lg">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-dark p-2 rounded-3 me-2"><i class="bi bi-receipt text-white"></i></div>
                    <h6 class= text-dark x-small fw-bold mb-0 tracking-wider">Live Breakdown</h6>
                </div>
                
                <div class="receipt-container p-3 rounded-4 bg-dark text-white shadow-lg">
                    <div class="receipt-item d-flex justify-content-between mb-2">
                        <span class="x-small opacity-50">Subtotal Catering</span>
                        <span class="small fw-semibold" id="sum-catering">₱ 85,000.00</span>
                    </div>
                    <div class="receipt-item d-flex justify-content-between mb-2">
                        <span class="x-small opacity-50">Fixed Fees</span>
                        <span class="small fw-semibold" id="sum-fixed">₱ 15,000.00</span>
                    </div>
                    <div class="receipt-item d-flex justify-content-between mb-2 border-bottom border-secondary pb-2">
                        <span class="x-small opacity-50">Service Fee</span>
                        <span class="small fw-semibold text-warning" id="sum-service">+ ₱ 10,000.00</span>
                    </div>
                    
                    <div class="pt-3 mb-3">
                        <span class="x-small fw-bold text-info tracking-widest d-block mb-1">Total Contract Price</span>
                        <h2 class="mb-0 fw-bold text-info" id="sum-grand">₱ 110,000.00</h2>
                    </div>

                    <div class="p-2 rounded-3 bg-white bg-opacity-10 border border-white border-opacity-10">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="x-small fw-bold text-danger-emphasis">50% Reservation</span>
                            <span class="small fw-bold text-white" id="sum-downpayment">₱ 55,000.00</span>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-dark btn-sm  rounded-3 border-secondary x-small fw-bold py-2">
                        <i class="bi bi-printer me-2"></i> Print Quotation Preview
                    </button>
                    <button class="btn btn-success btn-sm  rounded-3 border-secondary x-small fw-bold py-2">
                        <i class="bi bi-check-circle me-2"></i> Finalize Order
                    </button>
                </div>
            </div>

        </div>
    </div>

      <div class="card-footer">
            <button class="btn btn-link text-decoration-none text-muted fw-semibold" type="button" onclick="stepper.previous()" title="Back to Venue Package">
                 <i class="bi bi-arrow-left"></i> Back
            </button>
            <button class="btn btn-primary px-4 rounded-pill shadow-sm" type="button" onclick="stepper.next()" title="Next to Payment">
                 Continue to Payment <i class="bi bi-arrow-right ms-1"></i>
            </button>
      </div>
</div>

<!-- <style>
    .x-small { font-size: 0.65rem; }
    .tracking-widest { letter-spacing: 0.15rem; }
    .bg-light-subtle { background-color: #f8fafc !important; }
    .bg-dark { background-color: #121417 !important; }
    .text-info { color: #3abff8 !important; }
    
    .receipt-container {
        position: relative;
        overflow: hidden;
    }

    /* Decorative Receipt Edge */
    .receipt-container::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background-image: linear-gradient(135deg, #121417 25%, transparent 25%), 
                          linear-gradient(225deg, #121417 25%, transparent 25%);
        background-size: 8px 8px;
        background-repeat: repeat-x;
    }

    .shadow-sm-focus:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
    }

    @media (min-width: 992px) {
        .border-start-lg { border-left: 1px solid #f1f5f9 !important; padding-left: 1.5rem !important; }
    }
</style> -->