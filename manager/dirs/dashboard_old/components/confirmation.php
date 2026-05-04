<div class="card overflow-hidden">
    <div class="card-header bg-dark py-3 px-4 border-0">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div class="status-indicator me-3 ripple-animation"></div>
                <div>
                    <h6 class="text-white fw-bold mb-0">EO00000000001</h6>
                    <span class="x-small text-white-50 text-uppercase tracking-widest">Pencil Mode</span>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-outline-light btn-sm rounded-3 border-opacity-25 px-3 tool-btn" title="Print Event Order">
                    <i class="bi bi-printer me-2"></i> <span class="d-none d-md-inline">Print</span>
                </button>
                
                <button class="btn btn-outline-light btn-sm rounded-3 border-opacity-25 px-3 tool-btn" title="Download as PDF">
                    <i class="bi bi-file-earmark-pdf me-2"></i> <span class="d-none d-md-inline">Save PDF</span>
                </button>
                <div class="dropdown">
                    <button class="btn btn-outline-light btn-sm rounded-3 border-opacity-25 px-2" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 mt-2">
                        <li><a class="dropdown-item x-small" href="#"><i class="bi bi-pencil me-2"></i> Edit</a></li>
                        <li><a class="dropdown-item x-small text-danger" href="#"><i class="bi bi-trash me-2"></i> Discard</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="row g-0">
            <div class="col-lg-7 p-4 border-end">
                <div class="mb-4">
                    <h6 class="text-uppercase text-muted x-small fw-bold mb-3 tracking-wider">Event Overview</h6>
                    <div class="p-3 rounded-4 bg-light border border-light-subtle">
                        <div class="row g-3">
                            <div class="col-6">
                                <label class="d-block x-small text-muted text-uppercase mb-1">Guest Name</label>
                                <span class="fw-bold text-dark d-block">Acme Corp - Iloilo Branch</span>
                            </div>
                            <div class="col-6">
                                <label class="d-block x-small text-muted text-uppercase mb-1">Date & Time</label>
                                <span class="fw-bold text-primary d-block">April 15, 2026 | 9AM</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h6 class="text-uppercase text-muted x-small fw-bold mb-3 tracking-wider">Selected Inclusions</h6>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-white text-dark border border-light-subtle rounded-pill px-3 py-2 fw-medium shadow-sm"><i class="bi bi-check2-circle text-success me-1"></i> Beef Main Course</span>
                        <span class="badge bg-white text-dark border border-light-subtle rounded-pill px-3 py-2 fw-medium shadow-sm"><i class="bi bi-check2-circle text-success me-1"></i> Sound System</span>
                        <span class="badge bg-white text-dark border border-light-subtle rounded-pill px-3 py-2 fw-medium shadow-sm"><i class="bi bi-check2-circle text-success me-1"></i> Chafing Dishes</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 p-4 bg-light-subtle">
                <h6 class="text-uppercase text-muted x-small fw-bold mb-3 tracking-wider">Bill Summary</h6>
                <div class="d-grid gap-2 mb-4">
                    <div class="d-flex justify-content-between small"><span class="text-muted">Catering Subtotal</span> <span class="fw-bold">₱ 85,000</span></div>
                    <div class="d-flex justify-content-between small"><span class="text-muted">Venue & Others</span> <span class="fw-bold">₱ 15,000</span></div>
                    <div class="d-flex justify-content-between small border-bottom pb-2"><span class="text-muted">Service Fee</span> <span class="fw-bold">₱ 10,000</span></div>
                    <div class="d-flex justify-content-between align-items-center pt-2">
                        <span class="fw-bold text-dark">TOTAL</span>
                        <h4 class="fw-bold text-primary mb-0">₱ 110,000.00</h4>
                    </div>
                </div>
                
                <div class="p-3 bg-white rounded-4 border border-primary-subtle shadow-sm">
                    <span class="d-block x-small text-muted text-uppercase mb-1">Payment via Bank Transfer</span>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="small fw-bold text-dark">REF: BNK-0918</span>
                        <span class="badge bg-success-subtle text-success px-3">₱ 55,000</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button class="btn btn-link text-decoration-none text-muted fw-semibold" type="button" onclick="stepper.previous()" title="Back to Payment">
            <i class="bi bi-arrow-left"></i> Back
        </button>
        <button class="btn btn-primary px-5 rounded-pill  border-0 bg-gradient-success" type="button">
            Commit <i class="bi bi-check-circle ms-2"></i>
        </button>
    </div>
</div>

<style>
    .x-small { font-size: 0.65rem; }
    .tracking-widest { letter-spacing: 0.2rem; }
    .bg-light-subtle { background-color: #f8fafc !important; }
    .bg-gradient { background: linear-gradient(45deg, #0d6efd, #0099ff); }

    /* Tool Buttons Hover */
    .tool-btn:hover {
        background-color: rgba(255, 255, 255, 0.15) !important;
        border-color: rgba(255, 255, 255, 0.5) !important;
    }

    /* Pulsing Draft Indicator */
    .status-indicator {
        width: 10px;
        height: 10px;
        background-color: #ffc107;
        border-radius: 50%;
        box-shadow: 0 0 0 rgba(255, 193, 7, 0.4);
    }

    .ripple-animation {
        animation: pulse-yellow 2s infinite;
    }

    @keyframes pulse-yellow {
        0% { box-shadow: 0 0 0 0px rgba(255, 193, 7, 0.7); }
        70% { box-shadow: 0 0 0 8px rgba(255, 193, 7, 0); }
        100% { box-shadow: 0 0 0 0px rgba(255, 193, 7, 0); }
    }

    /* Scrollbar */
    .scroll-custom::-webkit-scrollbar { width: 4px; }
    .scroll-custom::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
</style>