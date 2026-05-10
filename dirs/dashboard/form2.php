<form id="frm-add-booking">
    <div class="modal fade" id="mdl-form-2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content border-0 shadow-lg rounded-4">
                    <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                        <div>
                            <h5 class="modal-title fw-bold text-dark">Pencil Booking (Form 2)</h5>
                            <p class="text-muted small mb-0">Fill in the event details to reserve a slot.</p>
                        </div>
                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            
                            <!-- SECTION: BUDGET & INITIAL FILTERING -->
                            <div class="col-12">
                                <div class="p-3 border rounded shadow-sm mb-2" style="background-color: #f8f9fa;">
                                    <label class="form-label fw-bold text-primary">Estimated Budget (PHP)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary text-white">₱</span>
                                        <input type="number" class="form-control form-control-lg fw-bold" id="est-budget" placeholder="0.00" required>
                                    </div>
                                    <div class="form-text small">This budget will be used to suggest available packages and menus.</div>
                                </div>
                            </div>

                            <!-- SECTION: REFERENCE & TYPE -->
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-muted">Form No.</label>
                                <input type="text" class="form-control" id="booking-number" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-muted">Event Type</label>
                                <select class="form-select" id="function-type" required>
                                    <option value="" selected disabled>Select Type...</option>
                                    <option value="Associations Event">Associations Event</option>
                                    <option value="Organization Event">Organization Event</option>
                                    <option value="Corporate Event">Corporate Event</option>
                                    <option value="Educational Event">Educational Event</option>
                                    <option value="Government Event">Government Event</option>
                                    <option value="Private Event">Private Event</option>
                                    <option value="Health Care Event">Health Care Event</option>
                                    <option value="Travel Tour Event">Travel Tour Event</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-muted">Package Tier</label>
                                <select class="form-select" id="package-tier" required>
                                    <option value="Basic">Basic</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>

                            <div class="col-12 mt-3 mb-1">
                                <h6 class="text-secondary fw-bold border-bottom pb-2">Customer Information</h6>
                            </div>

                            <!-- SECTION: CUSTOMER DETAILS -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label small fw-bold text-muted">Person in Charge</label>
                                <input type="text" class="form-control" id="customer-fullname" autocomplete="off" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label small fw-bold text-muted">Company</label>
                                <input type="text" class="form-control" id="customer-company" autocomplete="off" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label small fw-bold text-muted">Job Position (Optional)</label>
                                <input type="text" class="form-control" id="customer-jobposition" autocomplete="off">
                            </div>  
                            <div class="col-md-6 mb-2">
                                <label class="form-label small fw-bold text-muted">Address</label>
                                <input type="text" class="form-control" id="customer-address" autocomplete="off" required>
                            </div> 
                            <div class="col-md-4 mb-2">
                                <label class="form-label small fw-bold text-muted">Mobile Number</label>
                                <input type="text" class="form-control" id="customer-contactnumber" autocomplete="off" required>
                            </div>  
                            <div class="col-md-4 mb-2">
                                <label class="form-label small fw-bold text-muted">Email Address</label>
                                <input type="email" class="form-control" id="customer-emailaddress" autocomplete="off">
                            </div>    
                            <div class="col-md-4 mb-2">
                                <label class="form-label small fw-bold text-muted">Messenger</label>
                                <input type="text" class="form-control" id="customer-messenger" autocomplete="off">
                            </div>

                            <div class="col-12 mt-3 mb-1">
                                <h6 class="text-secondary fw-bold border-bottom pb-2">Event Logistics</h6>
                            </div>

                            <!-- SECTION: FUNCTION DETAILS -->
                            <div class="col-md-12 mb-2">
                                <label class="form-label small fw-bold text-muted">Name of Function</label>
                                <textarea class="form-control" id="event-name" required autocomplete="off" style="height: 60px;"></textarea>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label small fw-bold text-muted">Date (Start to End)</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="event-date-start" required>
                                    <input type="date" class="form-control" id="event-date-end" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label small fw-bold text-muted">Time (Start to End)</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" id="event-time-start" required>
                                    <input type="time" class="form-control" id="event-time-end" required>
                                </div>
                            </div>

                            <!-- SECTION: PAX COUNT -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label small fw-bold text-muted">Guaranteed Pax</label>
                                <input type="number" class="form-control border-success" id="guaranteed-pax" autocomplete="off" required>
                            </div> 
                            <div class="col-md-6 mb-2">
                                <label class="form-label small fw-bold text-muted">Expected Pax</label>
                                <input type="number" class="form-control border-info" id="expected-pax" autocomplete="off" required>
                            </div> 

                        </div>
                    </div>
                    <div class="modal-footer bg-light border-0 py-3">
                        <button class="btn btn-dark px-4 shadow-lg" type="button" onclick="loadForm2()">Next</button>
                    </div>
                </div>
            </div>
        </div>
</form>