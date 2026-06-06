 <div class="row g-3">
    <h6 class="fw-bold mb-0">Summary Overviews</h6>
    <p class="text-muted small mt-0 mb-2">Display compiled data overview before hitting save.</p>

    <div class="col-12 mb-2 d-flex flex-wrap gap-2">
      <span class="badge rounded-pill bg-info-subtle text-info-emphasis border border-info-subtle px-2.5 py-1.5 small">Event</span>
      <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 small">Equipments</span>
      <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis border border-warning-subtle px-2.5 py-1.5 small">Food</span>
    </div>
   
    <div class="col-md-12">
      <div id="event-summary-card"></div> <!-- Event Details Summary -->
    </div>

    <div class="col-md-12">
      <div id="arrangemnt-summary-card"></div> <!-- arrangement summary card -->
    </div>

    <div class="col-md-12">
        <div id="food-summary-card"></div> <!-- Food summary card -->
    </div>

    <hr class="my-3 text-muted">

    <div class="col-md-6">
      <label class="form-label small text-muted fw-bold mb-1" for="rate_perpax">Rate per Pax</label>
      <div class="input-group shadow-sm w-100">
        <span class="input-group-text py-0 small"> PHP </span>
        <input type="text" class="form-control border-dark shadow-none with-comma py-0 small" id="rate_perpax" autocomplete="off">
      </div>
    </div>

    <div class="col-md-6">
      <label class="form-label small text-muted fw-bold mb-1" for="package_cost">Total Package Cost</label>
      <div class="input-group shadow-sm w-100">
        <span class="input-group-text py-0 small"> PHP </span>
        <input type="text" class="form-control border-dark shadow-none with-comma py-0 small" id="package_cost" autocomplete="off">
      </div>
    </div>

    <div class="col-12">
      <label class="form-label small text-muted fw-bold mb-1" for="instructions">Special Instructions</label>
      <div class="input-group shadow-sm w-100">
        <textarea class="form-control bg-transparent border-dark shadow-none py-0 small" id="instructions" rows="3" autocomplete="off"></textarea>
      </div>
      <small class="text-muted d-block mt-1">This field serves as Internal guidelines for event setup (Guidelines).</small>
    </div>
 </div>

<!-- 
 <script>
   function loadArrangement() {
       $("#page-arrangement").load(
           "dirs/booking/form2/arrangement.php"
       );
   }

 </script> -->