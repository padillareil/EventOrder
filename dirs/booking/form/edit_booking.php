<div class="container my-2">
  <form id="frm-edit-booking">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
      

      <input type="hidden" id="booking-id"><!-- Row Number booking -->
      <!-- Card Header with Actions -->
      <!-- Card Header with Actions -->
      <div class="card-header border-0 bg-white p-4 pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2">
          
          <!-- Title Wrapper -->
          <div class="d-flex align-items-center gap-2">
            <h5 class="fw-bold text-dark mb-0">Edit Pencil Booking</h5>
          </div>
          
          <!-- Header Action Dropdown (Hamburger Style) -->
          <div class="dropdown">
            <button class="btn btn-light border p-2 rounded-3" type="button" id="bookingActionsDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Actions">
              <!-- Bootstrap Icons Hamburger (bi-list) -->
              <i class="bi bi-list fs-5 d-block"></i>
            </button>
            
            <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3" aria-labelledby="bookingActionsDropdown">
              <li>
                <!-- Form Submission Button styled as a dropdown item -->
                <button type="submit" id="btn-submit-booking" class="dropdown-item py-2 fw-semibold">
                  <span class="spinner-border spinner-border-sm d-none me-2" id="btn-spinner-booking" role="status"></span>
                  <span class="btn-text-booking"><i class="bi bi-check2-circle"></i> Save Changes</span>
                </button>
              </li>
              <li>
                <button class="dropdown-item py-2" type="button" id="btn-undo-booking" onclick="undoBooking()">
                 <i class="bi bi-arrow-counterclockwise"></i> Undo
                </button>
              </li>
              <li id="list-booking">
                <button class="dropdown-item py-2" type="button" id="btn-confirm-booking" onclick="update_BookingConfirmed()">
                 <i class="bi bi-check2-circle"></i> Book Event
                </button>
              </li>
              <li id="list-confirmed">
                <button class="dropdown-item py-2" type="button" id="btn-confirm-booking" onclick="modalPayment()">
                 <i class="bi bi-check2-circle"></i> Confirm
                </button>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <button class="dropdown-item py-2 text-danger" type="button" id="btn-cancel-booking" onclick="loadHome()">
                  Cancel
                </button>
              </li>
            </ul>
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
            <label class="form-label small text-muted fw-bold mb-1" for="event_title_edit">Event Title</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <textarea class="form-control bg-transparent border-0 shadow-none py-0 small" id="event_title_edit" rows="2" autocomplete="off" required></textarea>
            </div>
          </div>

          <!-- Start Date with Reschedule Label -->
          <div class="col-6">
            <label class="form-label small text-muted fw-bold mb-1" for="start_date_edit">Reschedule Start</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted">
                <i class="bi bi-calendar-event"></i>
              </span>
              <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small" id="start_date_edit" required>
            </div>
          </div>

          <!-- End Date with Reschedule Label -->
          <div class="col-6">
            <label class="form-label small text-muted fw-bold mb-1" for="end_date_edit">Reschedule End</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted">
                <i class="bi bi-calendar-check"></i>
              </span>
              <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small" id="end_date_edit" required>
            </div>
          </div>

          <!-- SECTION 2: GUEST PROFILE -->
          <div class="col-12 mt-4 mb-1 border-top pt-3">
            <span class="text-uppercase font-monospace tracking-wider text-muted fw-bold" style="font-size: 11px;">Client Profile</span>
          </div>

          <!-- Engager Category Select Block -->
          <div class="col-6">
            <label class="form-label small text-muted fw-bold mb-1" for="engager_category">Engager Category</label>
              <select class="form-select form-select-lg bg-transparent shadow-none py-3 small" id="engager_category_edit" required>
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
            <label class="form-label small text-muted fw-bold mb-1" for="guest-name_edit">Guest (Fullname)</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest-name_edit" autocomplete="off" required>
            </div>
          </div>

          <!-- Job Position -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="job_position_edit">Job Position</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="job_position_edit" autocomplete="off" required>
            </div>
          </div>
          
          <!-- Company -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="guest_company_edit">Company</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest_company_edit" autocomplete="off" required>
            </div>
          </div>

          <!-- Mobile Number -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="mobile-number_edit">Mobile Number</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="mobile-number_edit" autocomplete="off" required>
            </div>
          </div>
          
          <!-- Email -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="guest_email_edit">Email</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <input type="email" class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest_email_edit" autocomplete="off" required>
            </div>
          </div>

          <!-- Address -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="guest_address_edit">Address</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted pt-1 align-self-start"></span>
              <textarea class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest_address_edit" rows="2" autocomplete="off" required></textarea>
            </div>
          </div>
          
          <!-- Other Info -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="other_info_edit">Other Info <span class="fw-normal text-muted">(Max 100 chars)</span></label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted pt-1 align-self-start"></span>
              <textarea class="form-control bg-transparent border-0 shadow-none py-0 small" id="other_info_edit" rows="2" maxlength="100" autocomplete="off"></textarea>
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
      $('#mobile-number_edit').on('input keydown paste', function(e) {
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

      $('#mobile-number_edit').on('blur', function() {
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

  $("#frm-edit-booking").submit(function(event){

      event.preventDefault();

      Swal.fire({
          title: "Update Booking",
          text: "Do you want to save the changes?",
          icon: "question",
          showCancelButton: true,
          confirmButtonText: "Save",
          cancelButtonText: "Cancel",
          reverseButtons: false,
          focusCancel: true
      }).then((result) => {

          /* Cancel */
          if (!result.isConfirmed) {
              return;
          }

          let $btnSubmit = $("#btn-submit-booking");
          let $btnCancel = $("#btn-cancel-booking");
          let $spinner = $("#btn-spinner");
          let $text = $btnSubmit.find(".btn-text-booking");

          $btnSubmit.prop("disabled", true);
          $btnCancel.prop("disabled", true);

          $spinner.removeClass("d-none");
          $text.text("Saving...");

          var DocId          = $("#booking-id").val();
          var Guest          = $("#guest-name_edit").val();
          var Position       = $("#job_position_edit").val();
          var Company        = $("#guest_company_edit").val();
          var MobileNumber   = $("#mobile-number_edit").val();
          var Email          = $("#guest_email_edit").val();
          var Address        = $("#guest_address_edit").val();
          var Otherinfo      = $("#other_info_edit").val();
          var Title          = $("#event_title_edit").val();
          var DateStart      = $("#start_date_edit").val();
          var DateEnd        = $("#end_date_edit").val();
          var Category       = $("#engager_category_edit").val();

          $.post("dirs/booking/actions/update_booking.php", {

              DocId: DocId,
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
              Category: Category

          }, function(data){

              $btnSubmit.prop("disabled", false);
              $btnCancel.prop("disabled", false);

              $spinner.addClass("d-none");
              $text.text("Save Changes");

              if($.trim(data) == "success"){

                  loadHome();

                  generateMockCalendarPayloadData();

                  $("#frm-edit-booking")[0].reset();

                  Swal.fire({
                      toast: true,
                      position: "top-end",
                      icon: "success",
                      title: "Booking updated successfully.",
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



/*Function to confirmed booking*/
  function update_BookingConfirmed() {
      Swal.fire({
          title: "Confirm Booking",
          text: "Do you want to book this event?",
          icon: "question",
          showCancelButton: true,
          confirmButtonText: "Confirm",
          cancelButtonText: "Cancel",
          reverseButtons: false,
          focusCancel: true
      }).then((result) => {

          if (!result.isConfirmed) return;

          var DocId        = $("#booking-id").val();
          var Guest        = $("#guest-name_edit").val();
          var Position     = $("#job_position_edit").val();
          var Company      = $("#guest_company_edit").val();
          var MobileNumber = $("#mobile-number_edit").val();
          var Email        = $("#guest_email_edit").val();
          var Address      = $("#guest_address_edit").val();
          var Otherinfo    = $("#other_info_edit").val();
          var Title        = $("#event_title_edit").val();
          var DateStart    = $("#start_date_edit").val();
          var DateEnd      = $("#end_date_edit").val();
          var Category     = $("#engager_category_edit").val();

          /* =========================
             VALIDATION SECTION
          ========================== */

          if (!DocId || !Guest || !Title || !DateStart || !DateEnd || !Category) {
              Swal.fire({
                  icon: "warning",
                  title: "Missing Fields",
                  text: "Please complete all required fields before confirming."
              });
              return;
          }

          if (DateStart > DateEnd) {
              Swal.fire({
                  icon: "warning",
                  title: "Invalid Date Range",
                  text: "Start date cannot be later than end date."
              });
              return;
          }

          /* =========================
             AJAX REQUEST
          ========================== */

          $.post("dirs/booking/actions/update_confirmation.php", {
              DocId: DocId,
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
              Category: Category
          }, function(data) {

              if ($.trim(data) === "success") {

                  loadHome();
                  generateMockCalendarPayloadData();
                  $("#frm-edit-booking")[0].reset();

                  Swal.fire({
                      toast: true,
                      position: "top-end",
                      icon: "success",
                      title: "Booking save.",
                      showConfirmButton: false,
                      timer: 2000,
                      timerProgressBar: true
                  });

              } else {

                  Swal.fire({
                      icon: "error",
                      title: "Oops!",
                      text: data
                  });

              }

          });

      });
  }


  /*Function to confirmed booking*/
    function undoBooking() {
        Swal.fire({
            title: "Undo Booking",
            text: "Do you want to undo this booking?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "Cancel",
            reverseButtons: false,
            focusCancel: true
        }).then((result) => {

            if (!result.isConfirmed) return;

            var DocId        = $("#booking-id").val();

            $.post("dirs/booking/actions/update_undobooking.php", {
                DocId: DocId
               
            }, function(data) {

                if ($.trim(data) === "success") {

                    loadHome();
                    generateMockCalendarPayloadData();
                    $("#frm-edit-booking")[0].reset();

                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        title: "Booking undo.",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                    });

                } else {

                    Swal.fire({
                        icon: "error",
                        title: "Oops!",
                        text: data
                    });

                }

            });

        });
    }

    /*Function Confirmation of booking*/

    function modalPayment() {
      $("#mdl-confirmation-booking").modal('show');
    }

    // function update_BookingConfimation() {
    //     Swal.fire({
    //         title: "Confirmed Booking",
    //         text: "Do you want to confirm this event?",
    //         icon: "question",
    //         showCancelButton: true,
    //         confirmButtonText: "Confirm",
    //         cancelButtonText: "Cancel",
    //         reverseButtons: false,
    //         focusCancel: true
    //     }).then((result) => {

    //         if (!result.isConfirmed) return;

    //         var DocId        = $("#booking-id").val();
    //         var Guest        = $("#guest-name_edit").val();
    //         var Position     = $("#job_position_edit").val();
    //         var Company      = $("#guest_company_edit").val();
    //         var MobileNumber = $("#mobile-number_edit").val();
    //         var Email        = $("#guest_email_edit").val();
    //         var Address      = $("#guest_address_edit").val();
    //         var Otherinfo    = $("#other_info_edit").val();
    //         var Title        = $("#event_title_edit").val();
    //         var DateStart    = $("#start_date_edit").val();
    //         var DateEnd      = $("#end_date_edit").val();
    //         var Category     = $("#engager_category_edit").val();

    //         /* =========================
    //            VALIDATION SECTION
    //         ========================== */

    //         if (!DocId || !Guest || !Title || !DateStart || !DateEnd || !Category) {
    //             Swal.fire({
    //                 icon: "warning",
    //                 title: "Missing Fields",
    //                 text: "Please complete all required fields before confirming."
    //             });
    //             return;
    //         }

    //         if (DateStart > DateEnd) {
    //             Swal.fire({
    //                 icon: "warning",
    //                 title: "Invalid Date Range",
    //                 text: "Start date cannot be later than end date."
    //             });
    //             return;
    //         }

    //         /* =========================
    //            AJAX REQUEST
    //         ========================== */

    //         $.post("dirs/booking/actions/update_confirmbooking.php", {
    //             DocId: DocId,
    //             Guest: Guest,
    //             Position: Position,
    //             Company: Company,
    //             MobileNumber: MobileNumber,
    //             Email: Email,
    //             Address: Address,
    //             Otherinfo: Otherinfo,
    //             Title: Title,
    //             DateStart: DateStart,
    //             DateEnd: DateEnd,
    //             Category: Category
    //         }, function(data) {

    //             if ($.trim(data) === "success") {

    //                 loadHome();
    //                 generateMockCalendarPayloadData();
    //                 $("#frm-edit-booking")[0].reset();

    //                 Swal.fire({
    //                     toast: true,
    //                     position: "top-end",
    //                     icon: "success",
    //                     title: "Booking confirmed.",
    //                     showConfirmButton: false,
    //                     timer: 2000,
    //                     timerProgressBar: true
    //                 });

    //             } else {

    //                 Swal.fire({
    //                     icon: "error",
    //                     title: "Oops!",
    //                     text: data
    //                 });

    //             }

    //         });

    //     });
    // }



</script>
