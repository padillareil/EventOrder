<div class="row">
    <div class="col-md-12">
        <div class="d-flex align-items-center mb-3">
            <span class="badge rounded-pill me-2 bg-danger">1</span>
            <h6 class="fw-bold mb-0 tracking-wide text-uppercase">Event Information</h6>
        </div>
        
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label fw-semibold text-secondary">Function (Event Title)</label>
                <input type="text" class="form-control form-control-lg border-primary shadow-none fs-6" placeholder="Enter event name..." required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold text-secondary">Date Start</label>
                <input type="date" id="date-start" name="date-start" class="form-control border-primary shadow-none" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold text-secondary">Date End</label>
                <input type="date" id="date-end" name="date-end" class="form-control border-primary shadow-none" required>
            </div>
           
            <div class="col-md-6">
                <label class="form-label fw-semibold text-secondary">Time Start</label>
                <input type="time" id="time-start" name="time-start" class="form-control border-primary shadow-none" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold text-secondary">Time End</label>
                <input type="time" id="time-end" name="time-end" class="form-control border-primary shadow-none" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold text-secondary">Day</label>
                <select class="form-select border-primary shadow-none">
                    <option selected value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold text-secondary">Booking Category</label>
                <select class="form-select border-primary shadow-none">
                  <option selected value="">Choose...</option>
                  <option value="walk_in">Walk-in</option>
                  <option value="phone">Phone</option>
                  <option value="online">Online</option>
                  <option value="referral">Referral</option>
                  <option value="event">Event / Seminar</option>
                  <option value="corporate">Corporate</option>
                  <option value="internal">Internal (Employee / Owner)</option>
                  <option value="returning">Returning Client</option>
                  <option value="other">Other</option>
                </select>
            </div>
            <div class="col-md-12">
                <label class="form-label fw-semibold text-secondary">Type of Function</label>
                <input type="text" class="form-control form-control-lg border-primary shadow-none fs-6" placeholder="Seminar">
            </div>

            <div class="col-12 mt-4">
                <h6 class="fw-bold mb-3 tracking-wide text-uppercase">Attendance</h6>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Guaranteed (Pax)</label>
                            <input type="number" class="form-control border-primary" value="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Expected (Pax)</label>
                            <input type="number" class="form-control border-primary" value="0">
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4">
                <div class="d-flex align-items-center mb-4">
                    <span class="badge rounded-pill me-2 bg-danger">2</span>
                    <h6 class="fw-bold mb-0 tracking-wide text-uppercase">Engager Information</h6>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label fw-semibold text-secondary">Person in Charge</label>
                        <input type="text" class="form-control border-primary shadow-sm" placeholder="Full name">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label fw-semibold text-secondary">Contact Number</label>
                        <input type="text" class="form-control border-primary shadow-sm" placeholder="+63 000 000 000">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label fw-semibold text-secondary">Address</label>
                        <textarea class="form-control border-primary shadow-sm" rows="2"></textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label fw-semibold text-secondary">Email</label>
                        <input type="email" class="form-control border-primary shadow-sm" placeholder="gx@grandxing.com">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Rate (per Pax)</label>
                        <div class="input-group">
                            <span class="input-group-text">₱</span>
                            <input type="text" class="form-control border-primary shadow-none" value="0">
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>

</div>


