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
          
          <div class="d-flex gap-2">
            <button type="submit" id="btn-submit-booking" class="btn btn-sm btn-primary shadow px-4 py-2 rounded-3 fw-medium">
              <span class="spinner-border spinner-border-sm d-none me-2" id="btn-spinner-booking" role="status"></span>
              <span class="btn-text-booking"> Save Changes</span>
            </button>
            <button class="btn btn-sm shadow px-4 py-2 rounded-3 fw-medium btn-primary" type="button" id="btn-undo-booking" onclick="undoBooking()">
              Undo
            </button>
            <button class="btn btn-sm shadow px-4 py-2 rounded-3 fw-medium btn-success" type="button" id="btn-confirm-booking" onclick="modalPayment()">
             Confirm
            </button>
            <button class="btn btn-light px-4 py-2 rounded-3 text-secondary border fw-medium shadow" type="button" id="btn-cancel-booking" onclick="loadHome()">
              Cancel
            </button>

          </div>
                   <!-- Header Action Dropdown (Hamburger Style) -->
          <!-- <div class="dropdown">
            <button class="btn btn-light border p-2 rounded-3" type="button" id="bookingActionsDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Actions">
              <i class="bi bi-list fs-5 d-block"></i>
            </button>
            
            <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3" aria-labelledby="bookingActionsDropdown">
              <li>
                <button type="submit" id="btn-submit-booking" class="dropdown-item py-2 fw-semibold">
                  <span class="spinner-border spinner-border-sm d-none me-2" id="btn-spinner-booking" role="status"></span>
                  <span class="btn-text-booking"><i class="bi bi-check2-circle"></i> Save Changes</span>
                </button>
              </li>
              <li>
                <button class="dropdown-item" type="button" id="btn-undo-booking" onclick="undoBooking()">
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
          </div> -->

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
            <label class="form-label small text-muted fw-bold mb-1" for="start_date_edit">Period Start</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted">
                <i class="bi bi-calendar-event"></i>
              </span>
              <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small" id="start_date_edit" required>
            </div>
          </div>
         
          <div class="col-6">
            <label class="form-label small text-muted fw-bold mb-1" for="end_date_edit">Period End</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted">
                <i class="bi bi-calendar-check"></i>
              </span>
              <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small" id="end_date_edit" required>
            </div>
          </div>

          <div class="col-6">
            <label class="form-label small text-muted fw-bold mb-1" for="start_time_edit">Time Start</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-clock"></i></span>
              <input type="time" class="form-control bg-transparent border-0 shadow-none py-0 small" id="start_time_edit" required>
            </div>
          </div>

          <div class="col-6">
            <label class="form-label small text-muted fw-bold mb-1" for="end_time_edit">Time End</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-clock-history"></i></span>
              <input type="time" class="form-control bg-transparent border-0 shadow-none py-0 small" id="end_time_edit" required>
            </div>
          </div>

          <div class="col-md-6">
            <label class="form-label small text-muted fw-bold mb-1" for="choose_hotel_edit">Hotels</label>
            <select class="form-select form-select-lg bg-transparent shadow-none py-3 small" id="choose_hotel_edit" required>
              <option value="" disabled selected hidden>Choose...</option>
              <option value="Grand Xing Imperial">Grand Xing Imperial</option>
              <option value="Madison">Madison</option>
              <option value="Grandium">Grandium</option>
            </select>
          </div>  

          <div class="col-md-6">
            <label class="form-label small text-muted fw-bold mb-1" for="choose_functionrooms_edit">Function Rooms</label>
            <select class="form-select form-select-lg bg-transparent shadow-none py-3 small" id="choose_functionrooms_edit" required>
              <option value="" disabled selected hidden>Choose...</option>
              <option value="Jade Ballroom">Jade Ballroom</option>
              <option value="Ruby Ballroom">Ruby Ballroom</option>
              <option value="Pearl Ballroom">Pearl Ballroom</option>
            </select>
          </div> 

          <div class="col-md-6">
            <label class="form-label small text-muted fw-bold mb-1" for="expecte_pax_edit">Expected Pax</label>
            <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-people-fill"></i></span>
              <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small pax-input" id="expecte_pax_edit" required>
            </div>
          </div>
            
          <div class="col-md-6">
            <label class="form-label small text-muted fw-bold mb-1" for="guaranteed_pax_edit">Guaranteed Pax</label>
            <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-people-fill"></i></span>
              <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small pax-input" id="guaranteed_pax_edit" required>
            </div>
          </div>


          <!-- SECTION 2: GUEST PROFILE -->
          <div class="col-12 mt-4 mb-1 border-top pt-3">
            <span class="text-uppercase font-monospace tracking-wider text-muted fw-bold" style="font-size: 11px;">Client Profile</span>
          </div>

          <!-- Engager Category Select Block -->
          <div class="col-6">
            <label class="form-label small text-muted fw-bold mb-1" for="engager_category_edit">Engager Category</label>
            <select class="form-select form-select-lg bg-transparent shadow-none py-3 small" id="engager_category_edit" required>
              <option value="Regular" selected>Regular</option>
              <option value="Corporate Government">Corporate Government</option>
              <option value="Government">Government</option>
              <option value="Corporate Private">Corporate Private</option>
              <option value="Private">Private</option>
            </select>
          </div>
          
          
          
          <!-- Guest Name -->
          <div class="col-6">
            <label class="form-label small text-muted fw-bold mb-1" for="guest-name_edit">Person in Charge</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest-name_edit" autocomplete="off" required>
            </div>
            <span class="text-danger">*</span>
              <small class="text-muted">Please enter the full name of the person in charge.</small>
          </div>

          <!-- Job Position -->
          <div class="col-12">
            <label class="form-label small text-muted fw-bold mb-1" for="job_position_edit">Job Position</label>
            <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
              <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"></span>
              <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="job_position_edit" autocomplete="off">
            </div>
            <span class="text-danger">*</span>
            <small class="text-muted">This field is optional.</small>
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

          
          <!-- Other Info -->
          <div class="col-12">
              <label class="form-label small text-muted fw-bold mb-1" for="guest_address">Address</label>
              <div class="input-group border rounded-0 bg-white px-2 py-1 shadow-sm w-100">
                <textarea class="form-control bg-transparent border-0 shadow-none py-0 small" id="guest_address_edit" rows="2" autocomplete="off" required></textarea>
              </div>
              <span class="text-danger">*</span>
              <small class="text-muted">Please enter the complete address of the company.</small>
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

  /*Function Validators*/
  function markInvalid(selector) {
      $(selector).addClass("is-invalid");
  }

  function markValid(selector) {
      $(selector).removeClass("is-invalid");
  }



  $("#frm-edit-booking").submit(function (e) {

    e.preventDefault();

    Swal.fire({
        title: "Update Booking",
        text: "Do you want to save the changes?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Save",
        cancelButtonText: "Cancel"
    }).then((result) => {

        if (!result.isConfirmed) return;

        // =========================
        // FORM VALUES
        // =========================

        var data = {
            DocId          : $("#booking-id").val(),
            Guest          : $("#guest-name_edit").val().trim(),
            Position       : $("#job_position_edit").val().trim(),
            Company        : $("#guest_company_edit").val().trim(),
            MobileNumber   : $("#mobile-number_edit").val().trim(),
            Email          : $("#guest_email_edit").val().trim(),
            Address        : $("#guest_address_edit").val().trim(),

            Title          : $("#event_title_edit").val().trim(),
            DateStart      : $("#start_date_edit").val(),
            DateEnd        : $("#end_date_edit").val(),
            StartTime      : $("#start_time_edit").val(),
            EndTime        : $("#end_time_edit").val(),

            Hotel          : $("#choose_hotel_edit").val(),
            FunctionRoom   : $("#choose_functionrooms_edit").val(),

            ExpectedPax    : $("#expecte_pax_edit").val(),
            GuaranteedPax  : $("#guaranteed_pax_edit").val(),

            Category       : $("#engager_category_edit").val()
        };

        // =========================
        // REQUIRED FIELDS
        // =========================

        const requiredFields = [
            { value: data.Title,         selector: "#event_title_edit" },
            { value: data.DateStart,     selector: "#start_date_edit" },
            { value: data.DateEnd,       selector: "#end_date_edit" },
            { value: data.StartTime,     selector: "#start_time_edit" },
            { value: data.EndTime,       selector: "#end_time_edit" },
            { value: data.Hotel,         selector: "#choose_hotel_edit" },
            { value: data.FunctionRoom,  selector: "#choose_functionrooms_edit" },
            { value: data.ExpectedPax,   selector: "#expecte_pax_edit" },
            { value: data.GuaranteedPax, selector: "#guaranteed_pax_edit" }
        ];

        let hasError = false;

        requiredFields.forEach(field => {

            if (!field.value) {
                markInvalid(field.selector);
                hasError = true;
            } else {
                markValid(field.selector);
            }

        });

        if (hasError) {
            Swal.fire({
                icon: "warning",
                title: "Incomplete Form",
                text: "Please complete the highlighted fields."
            });
            return;
        }

        // =========================
        // DATE/TIME VALIDATION
        // =========================

        const startDateTime = new Date(`${data.DateStart} ${data.StartTime}`);
        const endDateTime   = new Date(`${data.DateEnd} ${data.EndTime}`);

        if (endDateTime <= startDateTime) {

            [
                "#start_date_edit",
                "#end_date_edit",
                "#start_time_edit",
                "#end_time_edit"
            ].forEach(markInvalid);

            Swal.fire({
                icon: "error",
                title: "Invalid Schedule",
                text: "End date/time must be later than start date/time."
            });

            return;
        }

        // =========================
        // CLIENT VALIDATION
        // =========================

        let clientFields = [];

        switch (data.Category) {

            case "Regular":
            case "Private":

                clientFields = [
                    { value: data.Guest,        selector: "#guest-name_edit" },
                    { value: data.MobileNumber, selector: "#mobile-number_edit" },
                    { value: data.Email,        selector: "#guest_email_edit" },
                    { value: data.Address,      selector: "#guest_address_edit" }
                ];

                break;

            case "Corporate Government":
            case "Government":
            case "Corporate Private":

                clientFields = [
                    { value: data.Guest,        selector: "#guest-name_edit" },
                    { value: data.Position,     selector: "#job_position_edit" },
                    { value: data.Company,      selector: "#guest_company_edit" },
                    { value: data.MobileNumber, selector: "#mobile-number_edit" },
                    { value: data.Email,        selector: "#guest_email_edit" },
                    { value: data.Address,      selector: "#guest_address_edit" }
                ];

                break;

            default:

                Swal.fire({
                    icon: "error",
                    title: "Invalid Category",
                    text: "Please select a valid engager category."
                });

                return;
        }

        let clientError = false;

        clientFields.forEach(field => {

            if (!field.value) {
                markInvalid(field.selector);
                clientError = true;
            } else {
                markValid(field.selector);
            }

        });

        if (clientError) {

            Swal.fire({
                icon: "warning",
                title: "Incomplete Client Information",
                text: "Please complete the required client details."
            });

            return;
        }

        // =========================
        // LOADING STATE
        // =========================

        const $btnSubmit = $("#btn-submit-booking");
        const $btnCancel = $("#btn-cancel-booking");
        const $spinner   = $("#btn-spinner");
        const $text      = $btnSubmit.find(".btn-text-booking");

        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);

        $spinner.removeClass("d-none");
        $text.text("Saving...");

         $.post(
             "dirs/booking/actions/update_booking.php",
             data,
             function(response) {

                 $btnSubmit.prop("disabled", false);
                 $btnCancel.prop("disabled", false);

                 $spinner.addClass("d-none");
                 $text.text("Save Changes");

                 if ($.trim(response) === "success") {

                     loadHome();
                     generateMockCalendarPayloadData();

                     $("#frm-edit-booking")[0].reset();

                     Swal.fire({
                         toast: true,
                         position: "top-end",
                         icon: "success",
                         title: "Update successfully.",
                         showConfirmButton: false,
                         timer: 2000,
                         timerProgressBar: true
                     });

                 } else {

                     Swal.fire({
                         icon: "error",
                         title: "Oops!",
                         text: response
                     });

                 }

             }
         );

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
