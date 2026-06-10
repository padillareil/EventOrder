<div class="container-fluid my-3 px-md-4">
  <form id="frm-add-booking">
    <div class="row g-3">
      
      <div class="col-12 col-md-3 col-lg-2">
        <div class="card border-0 shadow-sm rounded-4 p-3 h-100 bg-white">
          
          <div class="mb-3 ps-2 d-none d-md-block">
            <small class="fw-bold text-dark mb-0">Menu Forms</small>
          </div>
          
          <div class="list-group list-group-flush d-flex flex-row flex-md-column justify-content-between gap-1 border-0 overflow-auto" id="form-pages-menu" role="tablist">
                      
              <button class="list-group-item list-group-item-action active border-0 rounded-3 small py-2 px-1 px-md-3 d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-start text-center text-md-start w-100" id="nav-basic-tab" data-bs-toggle="list" data-bs-target="#page-basic" type="button" role="tab" aria-selected="true">
                <i class="bi bi-grid mb-1 mb-md-0 me-md-2 fs-5 fs-md-6"></i>
                <span style="font-size: 11px; font-weight: 500;" class="text-nowrap">Basic Info</span>
              </button>
              
              <button class="list-group-item list-group-item-action border-0 rounded-3 small py-2 px-1 px-md-3 d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-start text-center text-md-start w-100 d-none" id="nav-arrangement-tab" data-bs-toggle="list" data-bs-target="#page-arrangement" type="button" role="tab" aria-selected="false">
                <i class="bi bi-grid mb-1 mb-md-0 me-md-2 fs-5 fs-md-6"></i>
                <span style="font-size: 11px; font-weight: 500;" class="text-nowrap">Arrangement</span>
              </button>
              
              <button class="list-group-item list-group-item-action border-0 rounded-3 small py-2 px-1 px-md-3 d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-start text-center text-md-start w-100 d-none" id="nav-food-tab" data-bs-toggle="list" data-bs-target="#page-food" type="button" role="tab" aria-selected="false">
                <i class="bi bi-grid mb-1 mb-md-0 me-md-2 fs-5 fs-md-6"></i>
                <span style="font-size: 11px; font-weight: 500;" class="text-nowrap">Food</span>
              </button>
              
              <button class="list-group-item list-group-item-action border-0 rounded-3 small py-2 px-1 px-md-3 d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-start text-center text-md-start w-100 d-none" id="nav-summary-tab" data-bs-toggle="list" data-bs-target="#page-summary" type="button" role="tab" aria-selected="false">
                <i class="bi bi-grid mb-1 mb-md-0 me-md-2 fs-5 fs-md-6"></i>
                <span style="font-size: 11px; font-weight: 500;" class="text-nowrap">Summary</span>
              </button>
              
              <hr class="text-dark fw-bold">
              
              <button class="list-group-item list-group-item-action border-0 rounded-3 small py-2 px-1 px-md-3 d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-start text-center text-md-start w-100" type="button" onclick="loadBookingInbox()">
                <i class="bi bi-archive mb-1 mb-md-0 me-md-2 fs-5 fs-md-6"></i>
                <span style="font-size: 11px; font-weight: 500;" class="text-nowrap">Inbox</span>
              </button>

              <button class="list-group-item list-group-item-action border-0 rounded-3 small py-2 px-1 px-md-3 d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-start text-center text-md-start w-100" type="button" onclick="loadBookingDraft()">
                <i class="bi bi-archive mb-1 mb-md-0 me-md-2 fs-5 fs-md-6"></i>
                <span style="font-size: 11px; font-weight: 500;" class="text-nowrap">Draft</span>
              </button>

              <button class="list-group-item list-group-item-action border-0 rounded-3 small py-2 px-1 px-md-3 d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-start text-center text-md-start w-100" type="button" onclick="loadHome()">
                <i class="bi bi-arrow-left mb-1 mb-md-0 me-md-2 fs-5 fs-md-6"></i>
                <span style="font-size: 11px; font-weight: 500;" class="text-nowrap">Back</span>
              </button>
                          
          </div>
        </div>
      </div>

      <div class="col-12 col-md-8 col-lg-10">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
          
          <div class="card-header border-0 bg-white p-4 pb-0">
            <div class="d-flex align-items-center justify-content-between gap-2">
              <h5 class="fw-bold text-dark mb-0" id="form-title"></h5>
              <div class="d-flex align-items-center gap-2" id="form-button-action">
                <button class="btn btn-sm btn-success shadow px-4 py-2 rounded-3 fw-medium" type="button" onclick="savePencilbooking()" title="Save Pencil Booking">
                  Save
                </button>
                <button class="btn btn-sm btn-primary shadow px-4 py-2 rounded-3 fw-medium" type="button" onclick="savePencilDraft()" title="Save Draft Booking">
                  Draft
                </button>
                <button class="btn btn-light px-4 py-2 rounded-3 text-secondary border fw-medium shadow" type="reset" onclick="clearValidation()">
                  Cancel
                </button>
                <!-- <div class="dropdown">
                  <button type="button" class="btn btn-light d-flex align-items-center justify-content-center fs-5 no-caret" id="fabDropdownMenu" data-bs-toggle="dropdown" aria-expanded="false" title="Actions Menu">
                    <i class="bi bi-list id-fab-icon"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2 rounded-3 mt-2" aria-labelledby="fabDropdownMenu">
                    <li>
                      <button class="dropdown-item rounded-2 py-2 small d-flex align-items-center gap-2" type="button" onclick="savePencilbooking()">
                        <i class="bi bi-check2-circle text-muted fs-6"></i> Save Pencil
                      </button>
                    </li>
                    <li>
                      <button class="dropdown-item rounded-2 py-2 small d-flex align-items-center gap-2" type="button" onclick="savePencilDraft()">
                        <i class="bi bi-check2-circle text-muted fs-6"></i> Save Draft
                      </button>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                      <button class="dropdown-item rounded-2 py-2 small d-flex align-items-center gap-2" type="reset">
                        <i class="bi bi-trash3 text-danger fs-6"></i> Cancel
                      </button>
                    </li>
                  </ul>
                </div> -->
              </div>
            </div>
          </div>     
          
          <div class="card-body p-4 pt-3 tab-content overflow-auto" style="height: 70vh;">
            
            <div class="tab-pane fade show active" id="page-basic" role="tabpanel" aria-labelledby="nav-basic-tab">
             <?php include 'basic_info.php';  ?>
            </div>

            <div class="tab-pane fade" id="page-arrangement" role="tabpanel" aria-labelledby="nav-arrangement-tab">
              <?php include 'arrangement.php';  ?>
            </div>

            <div class="tab-pane fade" id="page-food" role="tabpanel" aria-labelledby="nav-food-tab">
              <?php include 'food_package.php';  ?>
            </div>

            <div class="tab-pane fade" id="page-summary" role="tabpanel" aria-labelledby="nav-summary-tab">
              <?php include 'summary.php';  ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<style>
  /* Dropdown arrow normalization marker configuration */
  .dropdown-toggle.no-caret::after {
    display: none !important;
  }

  /* Micro-interaction transition animation layout */
  .id-fab-icon {
    transition: transform 0.2s ease-in-out;
  }
  .dropdown-toggle.show .id-fab-icon {
    transform: rotate(45deg);
    display: inline-block;
  }

  @media (min-width: 768px) {
    /* Keeps layout locked alongside scrollable inputs on Tablet Landscape displays */
    #form-pages-menu, 
    .custom-action-panel {
      position: sticky;
      top: 1.5rem;
    }
  }
</style>

<script>
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
          $(this).focus();
      }
  });

  /*Function Validators*/
  /* ================================
     VALIDATORS
  ================================ */
  
  /* ================================
     VALIDATORS
  =============================== */
 
 function markInvalid(selector) {
     $(selector).addClass("border border-danger");
 }

 function markValid(selector) {
     $(selector).removeClass("border border-danger");
 }

 function clearValidation() {
     $(".border-danger").removeClass("border border-danger");
 }


 // ================================
 // MODAL ERROR HANDLER (REUSABLE)
 // ================================
 function showModalError(message) {

     $("#payment-modal-message").html(
         `<div class="alert alert-danger mb-0">${message}</div>`
     );

     const modalElement = $("#mdl-payment-booking");

     modalElement.css({
         display: "block",
         opacity: "0",
         transform: "scale(0.92)",
         filter: "blur(4px)",
         transition: "none"
     });

     modalElement.outerWidth();

     modalElement.modal({
         backdrop: "static",
         keyboard: false
     }).modal("show");

     modalElement.css({
         transition: "all 400ms cubic-bezier(0.34, 1.56, 0.64, 1)",
         opacity: "1",
         transform: "scale(1)",
         filter: "blur(0px)"
     });
 }


 // ================================
 // MAIN FUNCTION
 // ================================
 function savePencilbooking() {

     clearValidation();

     // ================================
     // GET VALUES
     // ================================
     const EventTitle      = $("#event_title").val()?.trim();
     const StartDate       = $("#start_date").val();
     const EndDate         = $("#end_date").val();
     const StartTime       = $("#start_time").val();
     const EndTime         = $("#end_time").val();
     const Hotel           = $("#choose_hotel").val();
     const Functions       = $("#choose_functionrooms").val();
     const ExpectedPax     = $("#expecte_pax").val();
     const GuaranteedPax   = $("#guaranteed_pax").val();
     const GuestName       = $("#guest-name").val()?.trim();
     const Company         = $("#guest_company").val()?.trim();
     const MobileNumber    = $("#mobile-number").val()?.trim();
     const Email           = $("#guest_email").val()?.trim();
     const CompanyAddress  = $("#guest_address").val()?.trim();
     const EngagerCategory = $("#engager_category").val()?.trim();

     // ================================
     // REQUIRED FIELD VALIDATION
     // ================================
     const fieldMap = [
         { value: EventTitle, selector: "#event_title" },
         { value: StartDate, selector: "#start_date" },
         { value: EndDate, selector: "#end_date" },
         { value: StartTime, selector: "#start_time" },
         { value: EndTime, selector: "#end_time" },
         { value: Hotel, selector: "#choose_hotel" },
         { value: Functions, selector: "#choose_functionrooms" },
         { value: ExpectedPax, selector: "#expecte_pax" },
         { value: GuaranteedPax, selector: "#guaranteed_pax" },
         { value: GuestName, selector: "#guest-name" },
         { value: MobileNumber, selector: "#mobile-number" },
         { value: Email, selector: "#guest_email" }
     ];

     let hasError = false;

     fieldMap.forEach(f => {
         if (!f.value) {
             markInvalid(f.selector);
             hasError = true;
         } else {
             markValid(f.selector);
         }
     });

     if (hasError) {
         showModalError("Please complete the highlighted fields.");
         return;
     }

     // ================================
     // DATE / TIME VALIDATION
     // ================================
     const startDateTime = new Date(`${StartDate}T${StartTime}`);
     const endDateTime   = new Date(`${EndDate}T${EndTime}`);

     if (endDateTime <= startDateTime) {

         markInvalid("#start_date");
         markInvalid("#end_date");
         markInvalid("#start_time");
         markInvalid("#end_time");

         showModalError("Invalid schedule. Please check date and time setup.");
         return;
     }

     // ================================
     // CLIENT RULES
     // ================================
     const rules = {
         "Regular":   ["#guest-name", "#mobile-number", "#guest_email", "#guest_address"],
         "Private":   ["#guest-name", "#mobile-number", "#guest_email", "#guest_address"],
         "Corporate": ["#guest-name", "#guest_position", "#guest_company", "#mobile-number", "#guest_email", "#guest_address"],
         "Government":["#guest-name", "#guest_position", "#guest_company", "#mobile-number", "#guest_email", "#guest_address"]
     };

     if (!EngagerCategory) {
         showModalError("Please select engager category.");
         return;
     }

     const fieldsToValidate = rules[EngagerCategory] || [];

     let clientError = false;

     fieldsToValidate.forEach(selector => {

         const value = $(selector).val();

         if (!value || value.toString().trim() === "") {
             markInvalid(selector);
             clientError = true;
         } else {
             markValid(selector);
         }

     });

     if (clientError) {
         showModalError("Please complete highlighted client information.");
         return;
     }

     // ================================
     // FREE BOOKING FLOW
     // ================================
     if (EngagerCategory === "Government" || EngagerCategory === "Regular") {
         $("#blocking_fee").val("0.00");
         saveBooking2();
         return;
     }

     // ================================
     // OPEN PAYMENT MODAL
     // ================================
     const modalElement = $("#mdl-payment-booking");

     modalElement.css({
         display: "block",
         opacity: "0",
         transform: "scale(0.92)",
         filter: "blur(4px)",
         transition: "none"
     });

     modalElement.outerWidth();

     modalElement.modal({
         backdrop: "static",
         keyboard: false
     }).modal("show");

     modalElement.css({
         transition: "all 400ms cubic-bezier(0.34, 1.56, 0.64, 1)",
         opacity: "1",
         transform: "scale(1)",
         filter: "blur(0px)"
     });
 }

  function paymenMdlClose(argument) {
      var modalElement = $("#mdl-payment-booking");
      modalElement.css({
          'transition': 'all 300ms cubic-bezier(0.25, 1, 0.5, 1)',
          'opacity': '0',
          'transform': 'scale(0.92)',
          'filter': 'blur(4px)'
      });
      setTimeout(function() {
          modalElement.modal('hide');
          modalElement.css({
              'display': 'none',
              'transition': 'none'
          });
      }, 300); 
  }


  function savePencilDraft() {

      var DraftId          = $("#draft-documentid").val();
      var EventTitle       = $("#event_title").val();
      var StartDate        = $("#start_date").val();
      var EndDate          = $("#end_date").val();
      var StartTime        = $("#start_time").val();
      var EndTime          = $("#end_time").val();
      var Hotel            = $("#choose_hotel").val();
      var Functions        = $("#choose_functionrooms").val();
      var ExpectedPax      = $("#expecte_pax").val();
      var GuaranteedPax    = $("#guaranteed_pax").val();
      var GuestName        = $("#guest-name").val();
      var Company          = $("#guest_company").val();
      var MobileNumber     = $("#mobile-number").val();
      var Email            = $("#guest_email").val();
      var CompanyAddress   = $("#guest_address").val();
      var Position         = $("#job_position").val();
      var EngagerCategory  = $("#engager_category").val();

      if (
          !EventTitle
      ) {
        Swal.fire({
            toast: true,
            position: "top-end",
            icon: "info",
            title: "Empty content.",
            showConfirmButton: false,
            timer: 1500
        });
          return;
      }

      $.post("dirs/booking/actions/save_pencildraft.php", {
          DraftId,
          EventTitle,
          StartDate,
          EndDate,
          StartTime,
          EndTime,
          Hotel,
          Functions,
          ExpectedPax,
          GuaranteedPax,
          GuestName,
          Company,
          MobileNumber,
          Email,
          CompanyAddress,
          Position,
          EngagerCategory
      }, function(data){

          if($.trim(data) === "OK"){
              mdlBookForm2();

              Swal.fire({
                  toast: true,
                  position: "top-end",
                  icon: "success",
                  title: "Saved Draft",
                  showConfirmButton: false,
                  timer: 2000
              });

          } else {
              console.log("Error: " + data);
          }
      });
  }



  
 
</script>

<?php include 'modal.php';  ?>