<div class="card border-0">
    <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
            <div>
                <h5 class="fw-bold mb-0 text-dark">Guest</h5>
                <p class="text-muted small">Initialize tracking and classify guest category.</p>
            </div>

        <div class="p-3 rounded-4 bg-light border border-light-subtle mb-3">
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="event-number-series" class="form-label x-small fw-bold text-muted mb-1">EO Number</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-white border-end-0 text-primary"><i class="bi bi-hash"></i></span>
                        <input type="text" class="form-control border-start-0 fw-bold shadow-sm-focus" id="event-number-series" value="EO00000000001">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="type-guest" class="form-label x-small fw-bold text-muted mb-1">Guest Type</label>
                    <select class="form-select form-select-sm border-light-subtle shadow-sm-focus" id="type-guest">
                        <option value="Walk-in">Walk-in</option>
                        <option value="High Priority">High Priority</option>
                        <option value="Repeat Customer">Repeat Customer</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="guest-category" class="form-label x-small fw-bold text-muted mb-1">Guest Category</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-white border-end-0 text-success"><i class="bi bi-shield-check"></i></span>
                        <select class="form-select border-start-0 shadow-sm-focus" id="guest-category">
                            <option value="Regular">Regular</option>
                            <option value="VIP">VIP</option>
                            <option value="Corporate">Corporate</option>
                            <option value="Government">Government</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-2 mb-0 opacity-10">
    </div>

    <div class="card-body px-4 py-4 scroll-custom" style="max-height: 60vh; overflow-y: auto;">
        <div class="row g-4">
            
            <div class="col-12 col-lg-4">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary-subtle p-2 rounded-3 me-2"><i class="bi bi-person text-primary"></i></div>
                    <h6 class="text-dark x-small fw-bold mb-0 tracking-wider">Identity Details</h6>
                </div>
                <div id="guest-form-container" class="px-1"></div>
            </div>

            <div class="col-12 col-lg-4 border-start-lg">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-info-subtle p-2 rounded-3 me-2"><i class="bi bi-geo-alt text-info"></i></div>
                    <h6 class="text-dark x-small fw-bold mb-0 tracking-wider">Contact & Location</h6>
                </div>
                <div class="row g-2">
                    <div class="col-12">
                        <label class="form-label x-small fw-semibold text-muted mb-1">Email Address</label>
                        <input type="email" class="form-control form-control-sm border-light-subtle shadow-sm-focus" id="guest-email" placeholder="name@email.com">
                    </div>
                    <div class="col-12">
                        <label class="form-label x-small fw-semibold text-muted mb-1">Phone Number</label>
                        <input type="text" class="form-control form-control-sm border-light-subtle shadow-sm-focus" id="guest-phonenumber" placeholder="09XX-XXX-XXXX">
                    </div>
                    <div class="col-12 mt-2">
                        <label class="form-label x-small fw-semibold text-muted mb-1">Full Address</label>
                        <input type="text" class="form-control form-control-sm border-light-subtle shadow-sm-focus" id="guest-homeaddress">
                    </div>
                    <div class="col-7">
                        <label class="form-label x-small fw-semibold text-muted mb-1">City / Province</label>
                        <input type="text" class="form-control form-control-sm border-light-subtle shadow-sm-focus" id="guest-city">
                    </div>
                    <div class="col-5">
                        <label class="form-label x-small fw-semibold text-muted mb-1">Zip Code</label>
                        <input type="text" class="form-control form-control-sm border-light-subtle shadow-sm-focus" id="guest-zipcode">
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 border-start-lg">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-success-subtle p-2 rounded-3 me-2"><i class="bi bi-credit-card text-success"></i></div>
                    <h6 class="text-dark x-small fw-bold mb-0 tracking-wider">Billing & Remarks</h6>
                </div>
                <div class="row g-2">
                    <div class="col-12 mb-3">
                        <label class="form-label x-small fw-bold mb-1">TIN</label>
                        <input type="text" class="form-control form-control-sm subtle shadow-sm-focus" id="guest-tinumber" placeholder="000-000-000-000">
                    </div>
                    <div class="col-6">
                        <label class="form-label x-small fw-semibold text-muted mb-1">Facebook</label>
                        <input type="text" class="form-control form-control-sm border-light-subtle shadow-sm-focus" id="guest-facebook">
                    </div>
                    <div class="col-6">
                        <label class="form-label x-small fw-semibold text-muted mb-1">Viber</label>
                        <input type="text" class="form-control form-control-sm border-light-subtle shadow-sm-focus" id="guest-viber">
                    </div>
                    <div class="col-12 mt-2">
                        <label class="form-label x-small fw-semibold text-muted mb-1">General Remarks</label>
                        <textarea class="form-control border-light-subtle shadow-sm-focus" id="guest-others" rows="3" placeholder="Notes..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button class="btn btn-primary px-4 rounded-pill shadow-sm" type="button" onclick="stepper.next()" title="Next to Event Details">
           Next to Event <i class="bi bi-arrow-right ms-1"></i>
        </button>
    </div>
</div>


<script>
    $("#guest-category").on("change", function () {
      var category = $(this).val();
      $("#guest-form-container").html(guestForms[category] || guestForms["Regular"]);
    });
    // Initialize on page load
    $("#guest-category").trigger("change");
    /*Tin number Auto format script*/
      $(document).ready(function () {
          $(document).on("input", "#guest-tinumber", function () {
              let val = $(this).val().replace(/[^0-9]/g, "");
              if (val.length > 12) {
                  val = val.substring(0, 12);
              }
              let formatted = val.match(/.{1,3}/g)?.join("-") || "";
              $(this).val(formatted);
          });
      });

</script>
