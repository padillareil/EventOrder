<div class="container my-2">
  <div class="card border-0 shadow-sm rounded-4 mb-3 overflow-hidden">
    <div class="card-body p-0">
      <div class="d-flex align-items-stretch justify-content-between">
        
        <div id="booking-stepper" class="bs-stepper flowchart-stepper w-100">
          <div class="bs-stepper-header" role="tablist" class="d-flex p-0 m-0 border-0">
            
            <!-- <div class="step flowchart-step" data-target="#basic-info-part">
              <button type="button" class="step-trigger bg-primary" role="tab" aria-controls="basic-info-part" id="basic-info-part-trigger">
                <span class="flowchart-label">Basic Info</span>
              </button>
            </div> --> <!-- Default Basic Info -->

            <div class="step flowchart-step" data-target="#basic-info-part">
              <button type="button" class="step-trigger bg-primary d-flex align-items-center justify-content-center" role="tab" aria-controls="basic-info-part" id="basic-info-part-trigger">
                
                <span class="flowchart-label">Basic Info</span>
                
                <span class="badge bg-danger rounded-pill ms-2 d-inline-flex align-items-center gap-1 font-monospace" style="font-size: 10px; letter-spacing: 0.5px; text-transform: uppercase; padding: 3px 6px;">
                Locked
                </span>

              </button>
            </div>

            <div class="step flowchart-step" data-target="#arrangement-part">
              <button type="button" class="step-trigger bg-info" role="tab" aria-controls="arrangement-part" id="arrangement-part-trigger">
                <span class="flowchart-label">Arrangement</span>
              </button>
            </div>

            <div class="step flowchart-step" data-target="#foods-part">
              <button type="button" class="step-trigger bg-success" role="tab" aria-controls="foods-part" id="foods-part-trigger">
                <span class="flowchart-label">Foods</span>
              </button>
            </div>

            <div class="step flowchart-step" data-target="#summary-part">
              <button type="button" class="step-trigger bg-orange" role="tab" aria-controls="summary-part" id="summary-part-trigger">
                <span class="flowchart-label">Summary</span>
              </button>
            </div>

          </div>
        </div>

        <div class="d-flex align-items-center bg-white px-3 border-left">
          <button type="button" class="btn btn-light text-secondary border rounded-3 p-2.5 position-relative" id="btn-inbox-archive" title="View Inbox" style="height: 44px; width: 44px;">
            <i class="fas fa-archive fa-lg"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px; margin-top: 4px; margin-left: -4px;">
              3
            </span>
          </button>
        </div>

      </div>
    </div>
  </div>

  <form id="frm-add-booking">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
      <div class="card-body p-4 pt-3 overflow-auto" style="height: 80vh;">
        <div class="bs-stepper-content p-0">
          
          <div id="basic-info-part" class="content" role="tabpanel" aria-labelledby="basic-info-part-trigger">
            <div class="row g-2">
              <div class="col-12 mt-2 mb-1">
                <span class="text-uppercase font-monospace  tracking-wider text-muted fw-bold" style="font-size: 11px;">Basic Details</span>
              </div>

              <div class="col-12">
                <label class="form-label small text-muted fw-bold mb-1" for="event_title">Event Title</label>
                <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
                  <textarea class="form-control bg-transparent border-0 shadow-none py-0 small" id="event_title" rows="2" autocomplete="off" required></textarea>
                </div>
              </div>

              <div class="col-6">
                <label class="form-label small text-muted fw-bold mb-1" for="start_date">Date Function Start</label>
                <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
                  <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-calendar-event"></i></span>
                  <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small" id="start_date" required>
                </div>
              </div>

              <div class="col-6">
                <label class="form-label small text-muted fw-bold mb-1" for="end_date">Date Function End</label>
                <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
                  <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-calendar-check"></i></span>
                  <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small" id="end_date" required>
                </div>
              </div>

              <div class="col-12 mt-4 mb-1 border-top pt-3">
                <span class="text-uppercase font-monospace tracking-wider text-muted fw-bold" style="font-size: 11px;">Engager Info</span>
              </div>

              <div class="col-6">
                <label class="form-label small text-muted fw-bold mb-1" for="engager_category">Engager Category</label>
                <select class="form-select bg-transparent shadow-none py-2 small" id="engager_category" required>
                  <option value="" disabled selected hidden>Choose...</option>
                  <option value="Corporate Government">Corporate Government</option>
                  <option value="Government">Government</option>
                  <option value="Corporate Private">Corporate Private</option>
                  <option value="Private">Private</option>
                  <option value="Personal">Personal</option>
                </select>
              </div>
              
              <div class="col-6">
                <label class="form-label small text-muted fw-bold mb-1" for="guest-name">Guest (Fullname)</label>
                <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
                  <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest-name" autocomplete="off" required>
                </div>
              </div>

              <div class="col-12">
                <label class="form-label small text-muted fw-bold mb-1" for="job_position">Job Position</label>
                <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
                  <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="job_position" autocomplete="off" required>
                </div>
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
              </div>
              
              <div class="col-6">
                <label class="form-label small text-muted fw-bold mb-1" for="guatanteed_pax">Guaranteed Pax</label>
                <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
                  <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="guatanteed_pax" autocomplete="off" required>
                </div>
              </div>
              <div class="col-6">
                <label class="form-label small text-muted fw-bold mb-1" for="expected_pax">Expected Pax</label>
                <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
                  <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="expected_pax" autocomplete="off" required>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-3">
              <button type="submit" id="btn-submit-booking" class="btn btn-success px-3 py-1.5 rounded-3 small">
                <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-booking" role="status"></span>
                <span class="btn-text-booking">Save</span>
              </button>
              <button class="btn btn-light text-secondary border px-3 py-1.5 rounded-3 small" type="button" id="btn-cancel-booking" onclick="loadHome()">
                Cancel
              </button>
            </div>
          </div>

          <!-- <div id="arrangement-part" class="content" role="tabpanel" aria-labelledby="arrangement-part-trigger">
            <div class="row g-2">
              <div class="col-12 mt-2 mb-1">
                <span class="text-uppercase font-monospace tracking-wider text-muted fw-bold" style="font-size: 11px;">Venue & Seating Arrangements</span>
              </div>
              <div class="col-md-6">
                <label class="form-label small text-muted fw-bold mb-1" for="venue_select">Select Venue</label>
                <select class="form-select bg-transparent shadow-none py-2 small" id="venue_select">
                  <option value="" selected disabled>Select a room...</option>
                  <option value="Grand Ballroom">Grand Ballroom</option>
                  <option value="Conference Hall A">Conference Hall A</option>
                  <option value="Executive Boardroom">Executive Boardroom</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label small text-muted fw-bold mb-1" for="stage_setup">Stage/Theme Setup Style</label>
                <input type="text" class="form-control small py-2 shadow-sm" id="stage_setup" placeholder="e.g., Minimalist Modern, Rustic">
              </div>
            </div>

            <div class="d-flex justify-content-between mt-4 pt-2 border-top">
              <button type="button" class="btn btn-light border px-4 rounded-3 small" onclick="window.stepper.previous()">Previous</button>
              <button type="button" class="btn btn-info text-white px-4 rounded-3 small" onclick="window.stepper.next()">Next Step</button>
            </div>
          </div>

          <div id="foods-part" class="content" role="tabpanel" aria-labelledby="foods-part-trigger">
            <div class="row g-2">
              <div class="col-12 mt-2 mb-1">
                <span class="text-uppercase font-monospace tracking-wider text-muted fw-bold" style="font-size: 11px;">Catering Details</span>
              </div>
              <div class="col-md-6">
                <label class="form-label small text-muted fw-bold mb-1" for="menu_package">Menu Package</label>
                <select class="form-select bg-transparent shadow-none py-2 small" id="menu_package">
                  <option value="" selected disabled>Select Menu Tier...</option>
                  <option value="Premium Buffet">Premium Buffet Pack</option>
                  <option value="Standard Plated">Standard Plated Set</option>
                  <option value="Cocktail / Hors d'oeuvres">Cocktail Options</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label small text-muted fw-bold mb-1" for="dietary_restrictions">Dietary Restrictions / Notes</label>
                <input type="text" class="form-control small py-2 shadow-sm" id="dietary_restrictions" placeholder="e.g., No seafood, Vegetarian option required">
              </div>
            </div>

            <div class="d-flex justify-content-between mt-4 pt-2 border-top">
              <button type="button" class="btn btn-light border px-4 rounded-3 small" onclick="window.stepper.previous()">Previous</button>
              <button type="button" class="btn bg-purple text-white px-4 rounded-3 small" onclick="window.stepper.next()">Next Step</button>
            </div>
          </div>

          <div id="summary-part" class="content" role="tabpanel" aria-labelledby="summary-part-trigger">
            <div class="row g-2">
              <div class="col-12 mt-2 mb-1">
                <span class="text-uppercase font-monospace tracking-wider text-muted fw-bold" style="font-size: 11px;">Final Validation Review</span>
              </div>
              <div class="col-12">
                <div class="p-3 bg-light rounded border text-muted small">
                  <i class="fas fa-info-circle mr-2 text-success"></i> Please cross-examine all step details above before completing validation. You can toggle through layout nodes to correct properties instantly.
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-between mt-4 pt-2 border-top">
              <button type="button" class="btn btn-light border px-4 rounded-3 small" onclick="window.stepper.previous()">Previous</button>
              <span class="text-muted small align-self-center">Ready! Click <strong>Save</strong> at the top header to finalize.</span>
            </div>
          </div> -->

        </div>
      </div>

    </div>
  </form>
</div>

<style>
  /* Container configurations for layout */
  .flowchart-stepper .bs-stepper-header {
    display: flex !important;
    width: 100%;
  }

  /* Clear default bs-stepper graphic configurations */
  .flowchart-stepper .line, 
  .flowchart-stepper .bs-stepper-circle {
    display: none !important;
  }

  /* Structural block for individual flow items */
  .flowchart-step {
    flex: 1;
    margin: 0 !important;
  }

  .flowchart-step .step-trigger {
    display: flex !important;
    align-items: center;
    justify-content: center;
    width: 100% !important;
    height: 54px !important; 
    padding: 0 10px 0 25px !important;
    border: none !important;
    border-radius: 0 !important;
    margin: 0 !important;
    transition: all 0.22s ease-in-out;
    
    /* Geometric clip-path creating standard interlocking chevron styles */
    clip-path: polygon(0% 0%, calc(100% - 10px) 0%, 100% 50%, calc(100% - 10px) 100%, 0% 100%, 10px 50%);
  }

  /* Left boundary adjustments */
  .flowchart-step:first-child .step-trigger {
    padding-left: 10px !important;
    clip-path: polygon(0% 0%, calc(100% - 10px) 0%, 100% 50%, calc(100% - 10px) 100%, 0% 100%);
  }

  /* Right boundary adjustments */
  .flowchart-step:last-child .step-trigger {
    clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%, 10px 50%);
  }

  /* Elevated configuration styling for active steps */
  .flowchart-step.active .step-trigger {
    opacity: 1 !important;
    font-weight: bold;
  }

  /* Font presentation properties */
  .flowchart-label {
    color: #ffffff !important;
    font-weight: 700;
    font-size: 13px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
  }

  .flowchart-step .step-trigger:focus {
    background-color: inherit;
  }
</style>

<script>
  $(document).ready(function() {
      // 1. Initialize BS Stepper Instance
      window.stepper = new Stepper(document.querySelector('#booking-stepper'), {
        linear: false, // Allows flexible manual clicking between pages during validation tests
        animation: true
      });

      // 2. Original Form Validation & Input Sanitization
      $('#mobile-number').on('input keydown paste', function(e) {
          let $input = $(this);
          if (e.type === 'keydown') {
              const allowedKeys = ['Backspace', 'Delete', 'Tab', 'ArrowLeft', 'ArrowRight'];
              if (!allowedKeys.includes(e.key) && isNaN(Number(e.key))) {
                  e.preventDefault();
                  return;
              }
          }
          let val = $input.val().replace(/\D/g, '');
          if (val.length > 0) {
              if (val.charAt(0) !== '0') {
                  val = '0' + val; 
              }
          }
          if (val.length > 1) {
              if (val.charAt(1) !== '9') {
                  val = '09'; 
              }
          }
          if (val.length > 11) {
              val = val.substring(0, 11);
          }
          $input.val(val);
      });

      $('#mobile-number').on('blur', function() {
          let val = $(this).val();
          if (val.length > 0 && val.length < 11) {
              Swal.fire({
                  icon: "info",
                  text: "Please enter a valid 11-digit mobile number.",
                  showConfirmButton: false,
                  timer: 2000,
                  timerProgressBar: true
              });
              $(this).focus();
          }
      });

      // 3. Form Submission Handling
      $("#frm-add-booking").submit(function(event){
          event.preventDefault();
          let $btnSubmit = $("#btn-submit-booking");
          let $btnCancel = $("#btn-cancel-booking");
          let $spinner = $("#btn-spinner-booking"); // Corrected to match element ID up top
          let $text = $btnSubmit.find(".btn-text-booking");
          
          $btnSubmit.prop("disabled", true);
          $btnCancel.prop("disabled", true);
          $spinner.removeClass("d-none");
          $text.text("Saving...");

          // Package attributes
          var payload = {
              Guest: $("#guest-name").val(),
              Position: $("#job_position").val(),
              Company: $("#guest_company").val(),
              MobileNumber: $("#mobile-number").val(),
              Email: $("#guest_email").val(),
              Address: $("#guest_address").val(),
              Otherinfo: $("#other_info").val(),
              Title: $("#event_title").val(),
              DateStart: $("#start_date").val(),
              DateEnd: $("#end_date").val(),
              Category: $("#engager_category").val(),
              Venue: $("#venue_select").val(),
              Setup: $("#stage_setup").val(),
              MenuPackage: $("#menu_package").val(),
              Dietary: $("#dietary_restrictions").val()
          };

          $.post("dirs/booking/actions/save_booking.php", payload, function(data){
              $btnSubmit.prop("disabled", false);
              $btnCancel.prop("disabled", false);
              $spinner.addClass("d-none");
              $text.text("Save");
              
              if($.trim(data) == "OK"){
                  loadHome();
                  if(typeof generateMockCalendarPayloadData === "function") {
                      generateMockCalendarPayloadData();
                  }
                  $("#frm-add-booking")[0].reset();
                  window.stepper.to(1); // Return wizard back to page 1 automatically
                  Swal.fire({
                      toast: true,
                      position: "top-end",
                      icon: "success",
                      title: "Pencil Booking success.",
                      showConfirmButton: false,
                      timer: 2000,
                      timerProgressBar: true
                  });
              } else {
                 Swal.fire({
                     icon: "error",
                     title: "Oops!",
                     text: data,
                     confirmButtonText: "OK"
                 });
              }
          });
      });
  });
</script>