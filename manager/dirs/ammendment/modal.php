<form id="frm-add-ammendment">
    <div class="modal fade" id="mdl-add-ammendment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div class="p-2 rounded-3 me-3" style="background-color: rgba(191, 155, 48, 0.1);">
                        <i class="bi bi-file-earmark-diff text-custom-gold fs-4"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Amendment</h5>
                        <p class="text-muted small mb-0">Fill out the details below to request a change to the event order.</p>
                    </div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <div class="row g-4">
                        <div class="col-md-4 border-end">
                            <h6 class="fw-bold mb-3 text-uppercase small text-muted">Reference Details</h6>
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Event Order (EO) Number</label>
                                <input type="text" class="form-control border-2 border-primary" placeholder="e.g. EO-2023-001" style="font-size: 0.9rem;">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Department / Category</label>
                                <select class="form-select border-2 border-primary">
                                    <option selected disabled>Select Category</option>
                                    <option>Kitchen / Catering</option>
                                    <option>Audio Visual (AV)</option>
                                    <option>Banquet Services</option>
                                    <option>Housekeeping</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Date of Request</label>
                                <input type="date" class="form-control border-primary border">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <h6 class="fw-bold mb-3 text-uppercase small text-muted">Amendment Details</h6>
                            
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label class="form-label small fw-bold">Function (Event Title)</label>
                                    <input type="text" class="form-control border border-primary" placeholder="Enter event name">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold">Guaranteed Pax</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0"><i class="bi bi-people"></i></span>
                                        <input type="number" class="form-control border border-primary" value="0">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold">Function Rooms</label>
                                    <div class="p-3 border border-dashed rounded-3 bg-light-subtle">
                                        <div class="row g-2">
                                            <div class="col-md-8">
                                                <input type="text" class="form-control border border-primary" placeholder="Room Name (e.g. Grand Ballroom)">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control border border-primary" placeholder="Room No.">
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-primary w-100"><i class="bi bi-plus-lg"></i></button>
                                            </div>
                                        </div>
                                        <div id="room-tags" class="mt-2 d-flex flex-wrap gap-2">
                                            <span class="badge bg-white border text-dark fw-medium p-2 rounded-2">
                                                Emerald 1 (Room 102) <i class="bi bi-x ms-1 text-danger cursor-pointer"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold">Details of Amendment</label>
                                    <textarea class="form-control border border border-primary" rows="4" placeholder="Describe the specific changes required..."></textarea>
                                </div>
                                
                                <div class="col-12">
                                    <div class="alert alert-warning border-0 small mb-0 d-flex align-items-center">
                                        <i class="bi bi-exclamation-triangle me-2"></i>
                                        <span><strong>Note:</strong> This amendment will undergo the standard approval process before implementation.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-danger fw-semibold shadow-lg text-decoration-none me-auto" data-bs-dismiss="modal">
                        <i class="bi bi-trash"></i> Discard
                    </button>
                    
                    <button id="btn-draft" class="btn px-4 py-2 fw-semibold btn-light border shadow-lg" type="button"> 
                        Save Draft
                    </button>
                    <button id="btn-submit" class="btn px-5 py-2 fw-bold btn-success text-white shadow-lg shadow-sm" type="button"> 
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<style>
  /* Custom Gold Theme */
  .text-custom-gold {
      color: #bf9b30 !important;
  }

  .btn-gold {
      background: linear-gradient(135deg, #bf9b30 0%, #a68525 100%);
      border: none;
      transition: all 0.3s ease;
  }

  .btn-gold:hover {
      box-shadow: 0 5px 15px rgba(191, 155, 48, 0.4);
      transform: translateY(-1px);
  }


  /* Background refinement for modal body */
  .bg-light-subtle {
      background-color: #fbfbfc !important;
  }

  .cursor-pointer {
      cursor: pointer;
  }
</style>