<div class="row g-2">
  <div class="col-12">
    <label class="form-label small text-muted fw-bold mb-1" for="event_title">Title of Event</label>
    <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
      <textarea class="form-control bg-transparent border-0 shadow-none py-0 small" id="event_title" rows="2" autocomplete="off" required></textarea>
    </div>
  </div>    

  <input type="hidden" id="draft-documentid"> <!-- Draft Document Id for reapplying only -->

  <div class="col-6">
    <label class="form-label small text-muted fw-bold mb-1" for="start_date">Period Start</label>
    <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
      <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-calendar-event"></i></span>
      <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small" id="start_date" required>
    </div>
  </div>

  <div class="col-6">
    <label class="form-label small text-muted fw-bold mb-1" for="end_date">Period End</label>
    <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
      <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-calendar-check"></i></span>
      <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small" id="end_date" required>
    </div>
  </div>
    
  <div class="col-6">
    <label class="form-label small text-muted fw-bold mb-1" for="start_time">Time Start</label>
    <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
      <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-clock"></i></span>
      <input type="time" class="form-control bg-transparent border-0 shadow-none py-0 small" id="start_time" required>
    </div>
  </div>

  <div class="col-6">
    <label class="form-label small text-muted fw-bold mb-1" for="end_time">Time End</label>
    <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
      <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-clock-history"></i></span>
      <input type="time" class="form-control bg-transparent border-0 shadow-none py-0 small" id="end_time" required>
    </div>
  </div>
  <div class="col-md-6">
    <label class="form-label small text-muted fw-bold mb-1" for="choose_hotel">Hotels</label>
    <select class="form-select form-select-lg bg-transparent shadow-none py-3 small" id="choose_hotel" required>
      <option value="" disabled selected hidden>Choose...</option>
      <option value="Grand Xing Imperial">Grand Xing Imperial</option>
      <option value="Madison">Madison</option>
      <option value="Grandium">Grandium</option>
    </select>
  </div>  

  <div class="col-md-6">
    <label class="form-label small text-muted fw-bold mb-1" for="choose_functionrooms">Function Rooms</label>
    <select class="form-select form-select-lg bg-transparent shadow-none py-3 small" id="choose_functionrooms" required>
      <option value="" disabled selected hidden>Choose...</option>
      <option value="Jade Ballroom">Jade Ballroom</option>
      <option value="Ruby Ballroom">Ruby Ballroom</option>
      <option value="Pearl Ballroom">Pearl Ballroom</option>
    </select>
  </div> 

  <div class="col-md-6">
    <label class="form-label small text-muted fw-bold mb-1" for="expecte_pax">Expected Pax</label>
    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm w-100">
      <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-people-fill"></i></span>
      <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small pax-input" id="expecte_pax" required>
    </div>
  </div>
    
  <div class="col-md-6">
    <label class="form-label small text-muted fw-bold mb-1" for="guaranteed_pax">Guaranteed Pax</label>
    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm w-100">
      <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-people-fill"></i></span>
      <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small pax-input" id="guaranteed_pax" required>
    </div>
  </div>

  <div class="col-12 mt-4 mb-1 border-top pt-3">
    <span class="text-uppercase tracking-wider text-muted fw-bold" style="font-size: 11px;">Client Profile</span>
  </div>

  <div class="col-6">
    <label class="form-label small text-muted fw-bold mb-1" for="engager_category">Engager Category</label>
    <select class="form-select form-select-lg bg-transparent shadow-none py-3 small" id="engager_category" required>
      <option value="Regular" selected>Regular</option>
      <option value="Corporate Government">Corporate Government</option>
      <option value="Government">Government</option>
      <option value="Corporate Private">Corporate Private</option>
      <option value="Private">Private</option>
    </select>
  </div>
                
  <div class="col-6">
    <label class="form-label small text-muted fw-bold mb-1" for="guest-name">Person in Charge</label>
    <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
      <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest-name" autocomplete="off" required>
    </div>
    <span class="text-danger">*</span>
      <small class="text-muted">Please enter the full name of the person in charge.</small>
  </div>

  <div class="col-12">
    <label class="form-label small text-muted fw-bold mb-1" for="job_position">Job Position</label>
    <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
      <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="job_position" autocomplete="off">
    </div>
    <span class="text-danger">*</span>
    <small class="text-muted">This field is optional.</small>
  </div>
                
  <div class="col-12">
    <label class="form-label small text-muted fw-bold mb-1" for="guest_company">Company</label>
    <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
      <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest_company" autocomplete="off" required>
    </div>
  </div>

  <div class="col-12">
    <label class="form-label small text-muted fw-bold mb-1" for="mobile-number">Mobile Number</label>
    <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
      <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="mobile-number" placeholder="09XXXXXXXXX" autocomplete="off" required>
    </div>
  </div>
                
  <div class="col-12">
    <label class="form-label small text-muted fw-bold mb-1" for="guest_email">Email</label>
    <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
      <input type="email" class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest_email" autocomplete="off" required>
    </div>
  </div>

  <div class="col-12">
    <label class="form-label small text-muted fw-bold mb-1" for="guest_address">Address</label>
    <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
      <textarea class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest_address" rows="2" autocomplete="off" required></textarea>
    </div>
    <span class="text-danger">*</span>
    <small class="text-muted">Please enter the complete address of the company.</small>
  </div>
</div>

<script>

  /*Cannot set date after*/
  $(document).ready(function () {
      let today = new Date();
      let yyyy = today.getFullYear();
      let mm = String(today.getMonth() + 1).padStart(2, '0');
      let dd = String(today.getDate()).padStart(2, '0');
      let minDate = `${yyyy}-${mm}-${dd}`;
      $("#start_date").attr("min", minDate);
      $("#end_date").attr("min", minDate);
  });
</script>