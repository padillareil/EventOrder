<div class="container my-2">
  <form id="frm-add-booking">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
      
      <!-- Card Header with Actions -->
      <div class="card-header border-0 bg-white p-4 pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2">
          
          <!-- Title Wrapper: Added flex and gap to keep arrow and text perfectly side-by-side -->
          <div class="d-flex align-items-center gap-2">
            <h5 class="fw-bold text-dark mb-0">Pencil Booking</h5>
          </div>
          
          <!-- Header Actions (Restored to rounded-0 to match your unrounded layout preference) -->
          <div class="d-flex align-items-center gap-2">
            <button type="submit" id="btn-submit-booking" class="btn btn-success px-3 py-1.5 rounded-3 small">
              <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-booking" role="status"></span>
              <span class="btn-text-booking">Save</span>
            </button>
            <button class="btn btn-light text-secondary border px-3 py-1.5 rounded-3 small" type="button" id="btn-cancel-booking" onclick="loadHome()">
              Cancel
            </button>
          </div>

        </div>
      </div>      
      <!-- Card Body -->
      <div class="card-body p-4 pt-3">
        <div class="row g-2">
          
          <!-- SECTION 1: EVENT DETAILS -->
          <div class="col-12 mt-2 mb-1">
            <span class="text-uppercase font-monospace tracking-wider text-muted fw-bold" style="font-size: 11px;">Event Parameters</span>
          </div>

          <!-- Event Title -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="event_title">Event Title</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <textarea class="form-control bg-transparent border-0 shadow-none py-0 small" id="event_title" rows="2" autocomplete="off" required></textarea>
            </div>
          </div>

          <!-- Start Date -->
          <div class="col-6">
            <label class="form-label small text-muted fw-bold mb-1" for="start_date">Period Start</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted">
                <i class="bi bi-calendar-event"></i>
              </span>
              <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small" id="start_date" required>
            </div>
          </div>

          <!-- End Date -->
          <div class="col-6">
            <label class="form-label small text-muted fw-bold mb-1" for="end_date">Period End</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted">
                <i class="bi bi-calendar-check"></i>
              </span>
              <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small" id="end_date" required>
            </div>
          </div>

          <!-- SECTION 2: GUEST PROFILE -->
          <div class="col-12 mt-4 mb-1 border-top pt-3">
            <span class="text-uppercase font-monospace tracking-wider text-muted fw-bold" style="font-size: 11px;">Client Profile</span>
          </div>

          <!-- Engager Category Select Block -->
          <div class="col-6">
            <label class="form-label small text-muted fw-bold mb-1" for="engager_category">Engager Category</label>
              <select class="form-select form-select-lg bg-transparent shadow-none py-3 small" id="engager_category" required>
                <option value="" disabled selected hidden>Choose...</option>
                <option value="Corporate Government">Corporate Government</option>
                <option value="Government">Government</option>
                <option value="Corporate Private">Corporate Private</option>
                <option value="Private">Private</option>
                <option value="Personal">Personal</option>
              </select>
          </div>
          
          <!-- Guest Name -->
          <div class="col-6">
            <label class="form-label small text-muted fw-bold mb-1" for="guest-name">Guest (Fullname)</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest-name" autocomplete="off" required>
            </div>
          </div>

          <!-- Job Position -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="job_position">Job Position</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="job_position" autocomplete="off" required>
            </div>
          </div>
          
          <!-- Company -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="guest_company">Company</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest_company" autocomplete="off" required>
            </div>
          </div>

          <!-- Mobile Number -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="mobile-number">Mobile Number</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="mobile-number" autocomplete="off" required>
            </div>
          </div>
          
          <!-- Email -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="guest_email">Email</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <input type="email" class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest_email" autocomplete="off" required>
            </div>
          </div>

          <!-- Address -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="guest_address">Address</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted pt-1 align-self-start"></span>
              <textarea class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest_address" rows="2" autocomplete="off" required></textarea>
            </div>
          </div>
          
          <!-- Other Info -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="other_info">Other Info <span class="fw-normal text-muted">(Max 100 chars)</span></label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted pt-1 align-self-start"></span>
              <textarea class="form-control bg-transparent border-0 shadow-none py-0 small" id="other_info" rows="2" maxlength="100" autocomplete="off"></textarea>
            </div>
          </div>

        </div>
      </div>

    </div>
  </form>
</div>
<script>
  /*Function mobile number setup*/
  $(document).ready(function() {
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
  });

  $("#frm-add-booking").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-booking");
        let $btnCancel = $("#btn-cancel-booking");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-booking");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var Guest  = $("#guest-name").val();
        var Position   = $("#job_position").val();
        var Company  = $("#guest_company").val();
        var MobileNumber  = $("#mobile-number").val();
        var Email       = $("#guest_email").val();
        var Address  = $("#guest_address").val();
        var Otherinfo  = $("#other_info").val();
        var Title  = $("#event_title").val();
        var DateStart  = $("#start_date").val();
        var DateEnd  = $("#end_date").val();
        var Category  = $("#engager_category").val();


        $.post("dirs/booking/actions/save_booking.php", {
            Guest: Guest,
            Position: Position,
            Company: Company,
            MobileNumber: MobileNumber,
            Email: Email,
            Address: Address,
            Otherinfo: Otherinfo,
            Title: Title,
            DateStart: DateStart,
            DateEnd: DateEnd,
            Category: Category,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
              loadHome();
                generateMockCalendarPayloadData();
                $text.text("Save");
                $("#frm-add-booking")[0].reset();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "Pencil Booking success.",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });

            }else{
               Swal.fire({
                 icon: "error",
                 title: "Oops!",
                 text: data,
                 confirmButtonText: "OK"
               });
            }
        });
    });
</script>
