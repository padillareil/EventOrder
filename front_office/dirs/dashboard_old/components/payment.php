<div class="card border-0 shadow-lg rounded-4 overflow-hidden">
    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-0 text-dark">Payment Settlement</h5>
                <p class="text-muted small">Select the preferred payment channel for this transaction.</p>
            </div>
            <div class="bg-primary-subtle p-2 rounded-3">
                <i class="bi bi-wallet2 text-primary fs-4"></i>
            </div>
        </div>
        <hr class="mt-2 mb-0 opacity-10">
    </div>

    <div class="card-body px-4 py-4">
        <div class="row g-4">
            
            <div class="col-12 col-lg-7">
                <h6 class=" text-dark x-small fw-bold mb-3 tracking-wider">Available Methods</h6>
                
                <div class="row g-3">
                    <div class="col-6 col-md-4">
                        <label class="payment-card d-block text-center p-3 border rounded-4 transition-all">
                            <input type="radio" name="pay-method" class="d-none" value="cash" checked>
                            <i class="bi bi-cash-coin fs-2 d-block mb-2 text-success"></i>
                            <span class="small fw-bold text-dark">Cash</span>
                        </label>
                    </div>
                    
                    <div class="col-6 col-md-4">
                        <label class="payment-card d-block text-center p-3 border rounded-4 transition-all">
                            <input type="radio" name="pay-method" class="d-none" value="bank">
                            <i class="bi bi-bank fs-2 d-block mb-2 text-primary"></i>
                            <span class="small fw-bold text-dark">Bank Transfer</span>
                        </label>
                    </div>

                    <div class="col-6 col-md-4">
                        <label class="payment-card d-block text-center p-3 border rounded-4 transition-all">
                            <input type="radio" name="pay-method" class="d-none" value="ewallet">
                            <i class="bi bi-phone-vibrate fs-2 d-block mb-2 text-info"></i>
                            <span class="small fw-bold text-dark">E-Wallet</span>
                        </label>
                    </div>

                    <div class="col-6 col-md-4">
                        <label class="payment-card d-block text-center p-3 border rounded-4 transition-all">
                            <input type="radio" name="pay-method" class="d-none" value="cheque">
                            <i class="bi bi-file-earmark-text fs-2 d-block mb-2 text-warning"></i>
                            <span class="small fw-bold text-dark">Cheque</span>
                        </label>
                    </div>

                    <div class="col-6 col-md-4">
                        <label class="payment-card d-block text-center p-3 border rounded-4 transition-all">
                            <input type="radio" name="pay-method" class="d-none" value="card">
                            <i class="bi bi-credit-card-2-front fs-2 d-block mb-2 text-danger"></i>
                            <span class="small fw-bold text-dark">Credit Card</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5 border-start-lg">
                <h6 class=" text-dark x-small fw-bold mb-3 tracking-wider">Transaction Info</h6>
                
                <div class="bg-light p-3 rounded-4 border border-light-subtle">
                    <div class="mb-3">
                        <label class="form-label x-small fw-bold text-muted  mb-1">Reference / OR Number</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-hash"></i></span>
                            <input type="text" class="form-control border-start-0 shadow-sm-focus" placeholder="e.g. REF-102938">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label x-small fw-bold text-muted  mb-1">Amount to be Paid</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-dark fw-bold small">₱</span>
                            <input type="number" class="form-control border-start-0 fw-bold text-primary shadow-sm-focus" value="55000">
                        </div>
                    </div>

                    <div class="mb-0">
                        <label class="form-label x-small fw-bold text-muted  mb-1">Payment Remarks</label>
                        <textarea class="form-control form-control-sm border-light-subtle shadow-sm-focus" rows="2" placeholder="Bank branch, Check date, etc."></textarea>
                    </div>
                </div>

                <div class="mt-3 p-2 bg-success-subtle rounded-3 d-flex align-items-center">
                    <i class="bi bi-shield-check text-success me-2"></i>
                    <span class="x-small fw-bold text-success ">Payment Validation Required</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button class="btn btn-link text-decoration-none text-muted fw-semibold" type="button" onclick="stepper.previous()" title="Back to Pricing">
            <i class="bi bi-arrow-left"></i> Back
        </button>
        <button class="btn btn-primary px-4 rounded-pill shadow-sm" type="button" onclick="stepper.next()" title="Next to Confirmation">
            Continue to Confirmation <i class="bi bi-arrow-right ms-1"></i>
        </button>
    </div>
</div>

<style>
    .payment-card {
        cursor: pointer;
        background-color: #fff;
        border-color: #f1f3f5 !important;
        opacity: 0.7;
    }
    
    .payment-card:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px);
    }

    /* Selection Highlight */
    .payment-card:has(input:checked) {
        border-color: #0d6efd !important;
        background-color: #f0f7ff;
        opacity: 1;
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.15);
    }

    .payment-card:has(input:checked) i {
        transform: scale(1.1);
        transition: transform 0.2s ease;
    }

    .transition-all { transition: all 0.2s ease-in-out; }

    @media (min-width: 992px) {
        .border-start-lg { border-left: 1px solid #f1f1f1 !important; padding-left: 1.5rem !important; }
    }
</style>