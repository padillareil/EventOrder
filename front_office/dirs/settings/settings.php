<div class="col-md-8 container">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="row g-0">
            <div class="col-md-3 bg-light border-end">
                <div class="p-4">
                    <div class="text-center mb-4">
                        <div class="position-relative d-inline-block">
                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=bf9b30&color=fff&size=100" class="rounded-circle shadow-sm border border-3 border-white" alt="Profile">
                            <span class="position-absolute bottom-0 end-0 bg-success border border-2 border-white rounded-circle p-2" title="Online Status"></span>
                        </div>
                        <h6 class="fw-bold mt-3 mb-1">John Doe</h6>
                        <span class="badge bg-gold-subtle text-gold border border-gold-subtle rounded-pill small">Admin / Exec. Manager</span>
                    </div>
                    
                    <div class="nav flex-column nav-pills gap-2 mt-4" id="v-pills-tab" role="tablist">
                        <button class="nav-link active text-start border-0 py-2 px-3 rounded-3" data-bs-toggle="pill" data-bs-target="#personal-info">
                            <i class="bi bi-person me-2"></i> Profile Details
                        </button>
                        <button class="nav-link text-start border-0 py-2 px-3 rounded-3" data-bs-toggle="pill" data-bs-target="#eo-permissions">
                            <i class="bi bi-shield-lock me-2"></i> EO Permissions
                        </button>
                        <button class="nav-link text-start border-0 py-2 px-3 rounded-3" data-bs-toggle="pill" data-bs-target="#signature-tab">
                            <i class="bi bi-pen me-2"></i> Digital Signature
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-9 bg-white">
                <div class="tab-content p-4 p-md-5">
                    
                    <div class="tab-pane fade show active" id="personal-info">
                        <h5 class="fw-bold mb-4">Account Information</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">EMPLOYEE ID</label>
                                <input type="text" class="form-control bg-light border-0 fw-bold" value="GXI-2026-088" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">DESIGNATION</label>
                                <input type="text" class="form-control bg-light border-0 fw-bold" value="Events Director" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label small fw-bold">EMAIL ADDRESS</label>
                                <input type="email" class="form-control" value="j.doe@grandxing.com">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="eo-permissions">
                        <h5 class="fw-bold mb-2">Event Order Authority</h5>
                        <p class="text-muted small mb-4">Your account is configured with the following approval limits.</p>
                        
                        <div class="list-group list-group-flush border rounded-4 overflow-hidden">
                            <div class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <div>
                                    <div class="fw-bold">Level 1 Approval (Departmental)</div>
                                    <div class="small text-muted">Can approve kitchen and AV setup changes.</div>
                                </div>
                                <i class="bi bi-check-circle-fill text-success fs-5"></i>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center p-3 bg-light-subtle">
                                <div>
                                    <div class="fw-bold">Level 2 Approval (Financial)</div>
                                    <div class="small text-muted">Can approve price amendments up to ₱50,000.</div>
                                </div>
                                <i class="bi bi-check-circle-fill text-success fs-5"></i>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <div>
                                    <div class="fw-bold text-muted">Level 3 Approval (Executive)</div>
                                    <div class="small text-muted">Full override and cancellation authority.</div>
                                </div>
                                <i class="bi bi-lock-fill text-muted"></i>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="signature-tab">
                        <h5 class="fw-bold mb-4">Digital Signature Preview</h5>
                        <div class="p-4 border border-dashed rounded-4 bg-light text-center mb-4">
                            <div class="bg-white d-inline-block p-3 rounded shadow-sm border mb-3">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e6/Signature_of_John_Doe.svg" style="height: 60px; filter: grayscale(1);" alt="Signature">
                            </div>
                            <p class="small text-muted mb-0">This signature will be appended to all **Approved Event Orders** you sign off on.</p>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-dark btn-sm rounded-pill px-3">Update Signature</button>
                            <button class="btn btn-outline-danger btn-sm rounded-pill px-3">Remove</button>
                        </div>
                    </div>

                </div>
                
                <div class="p-4 border-top bg-light d-flex justify-content-end">
                    <button class="btn btn-gold text-white fw-bold px-5 rounded-pill shadow-sm">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

