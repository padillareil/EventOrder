<div class="container my-2">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        
        <div class="card-body p-4 p-md-5 bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                
                <div class="d-flex align-items-center gap-2">
                    <button type="button"
                            class="btn btn-light btn-sm rounded-circle p-2 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px;" title="Go back"
                            onclick="mdlBookForm2()">
                        <i class="bi bi-arrow-left fs-5"></i>
                    </button>

                    <h5 class="fw-bold text-dark mb-0">Inbox</h5>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-3 ms-md-auto">
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-event-order" placeholder="Search...">
                    </div>
                </div>

            </div>
        </div>

        <div class="card-body p-2 p-md-5 bg-light-subtle">
            <div class="mb-1 justify-content-end d-flex">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0" id="pagination-pencilbook">
                        <li class="page-item" id="li-prev-pencilbook">
                            <a class="page-link shadow-none" href="#" id="btn-preview-pencilbook">
                                <i class="bi bi-chevron-left small"></i>
                            </a>
                        </li>
                        <li class="page-item" id="li-next-pencilbook">
                            <a class="page-link shadow-none" href="#" id="btn-next-pencilbook">
                                <i class="bi bi-chevron-right small"></i>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
                <div class="justify-content-end d-flex">
                    <div id="page-info-pencilbook" class="mt-1 small text-muted"></div>
                </div>
            
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="height: 85vh;">
                <table class="table table-bordered table-hover align-middle mb-0" style="font-size: 13px;">
                    <thead class="sticky-top bg-white border-bottom align-middle text-secondary text-uppercase" style="z-index: 5; height: 52px;">
                        <tr>
                            <th class="ps-4 fw-bold" style="width: 100px;">#</th>
                            <th class="fw-bold">Engager & Event</th>
                            <th class="fw-bold text-center">No. Days</th>
                            <th class="fw-bold text-center" style="width: 140px;">Status</th>
                            <th class="pe-4 fw-bold text-end" style="width: 60px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="load_EventOrderLists">


                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
    var CurrentPage = 1;
    var PageSize = 20;
    var totalPages = 1;
    var isPackageMode = false;
    var selectedItems = [];


    function loadInbox(page = 1) {
        CurrentPage = page; 
        var srvdisplay = $("#load_EventOrderLists");
        srvdisplay.html(`
                <tr>
                    <td colspan="5" class="p-5 text-center text-muted">
                        <div class="spinner-border text-dark"></div>
                        <div class="mt-2">Loading...</div>
                    </td>
                </tr>
        `);
        var Search = $("#search-event-order").val();
        $.post("dirs/booking/actions/get_bookings.php", {
            CurrentPage,
            PageSize,
            Search
        }, function (data) {
            let response;

            try {
                response = JSON.parse(data);
            } catch (e) {
                srvdisplay.html(`<div class="text-dark text-center py-4">Server Error</div>`);
                return;
            }
            if ($.trim(response.isSuccess) === "success") {
                ServiceContent(response.Data);
                totalPages = (response.Data && response.Data.length > 0)
                    ? parseInt(response.Data[0].TotalPages)
                    : 1;

                    BookingsPaginationUi();
                    BookingsageNumber();
            } else {
                emptyStateBookings("No Record Found.");
            }
        });
    }

    /*Function to set status base on the value of DocStatus*/
   function DocumentStatusBadge(status) {

       switch (parseInt(status)) {

           // New
           case 1:
               return `
                   <div class="w-100">
                       <div class="d-flex justify-content-between mb-1">
                           <small class="fw-semibold text-primary">New</small>
                           <small class="text-muted">20%</small>
                       </div>
                       <div class="progress" style="height:8px;">
                           <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                role="progressbar"
                                style="width:20%">
                           </div>
                       </div>
                   </div>
               `;

           // Processing / For Approval
           case 2:
               return `
                   <div class="w-100">
                       <div class="d-flex justify-content-between mb-1">
                           <small class="fw-semibold text-info">Processing</small>
                           <small class="text-muted">60%</small>
                       </div>
                       <div class="progress" style="height:8px;">
                           <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                                role="progressbar"
                                style="width:60%">
                           </div>
                       </div>
                   </div>
               `;

           // Complete
           case 3:
               return `
                   <div class="w-100">
                       <div class="d-flex justify-content-between mb-1">
                           <small class="fw-semibold text-success">Completed</small>
                           <small class="text-muted">100%</small>
                       </div>
                       <div class="progress" style="height:8px;">
                           <div class="progress-bar bg-success"
                                role="progressbar"
                                style="width:100%">
                           </div>
                       </div>
                   </div>
               `;

           default:
               return `
                   <div class="w-100">
                       <div class="d-flex justify-content-between mb-1">
                           <small class="fw-semibold text-secondary">Unknown</small>
                           <small class="text-muted">0%</small>
                       </div>
                       <div class="progress" style="height:8px;">
                           <div class="progress-bar bg-secondary"
                                role="progressbar"
                                style="width:0%">
                           </div>
                       </div>
                   </div>
               `;
       }
   }

   /*Function for event actions*/
   function EventActionDropdown(DocId, status) {

       let items = '';

       status = parseInt(status);

       // =========================
       // STATUS 1 = NEW
       // =========================
       if (status === 1) {

           items += `
               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2"
                         onclick="setupEventPackage('${DocId}')">
                   <i class="bi bi-file-earmark-text text-muted fs-6"></i> Setup Event
                 </button>
               </li>
           `;
       }

       // =========================
       // STATUS 2 = FOR APPROVAL
       // =========================
       else if (status === 2) {

           items += `
               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2">
                   <i class="bi bi-eye text-muted fs-6"></i> View Contract
                 </button>
               </li>

               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2">
                   <i class="bi bi-pencil-square text-muted fs-6"></i> Add Amendment
                 </button>
               </li>

               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2">
                   <i class="bi bi-calendar-week text-muted fs-6"></i> Re-schedule
                 </button>
               </li>

               <li><hr class="dropdown-divider my-1"></li>

               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2">
                   <i class="bi bi-printer text-muted fs-6"></i> Print
                 </button>
               </li>

               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2">
                   <i class="bi bi-download text-muted fs-6"></i> Download PDF
                 </button>
               </li>

               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2">
                   <i class="bi bi-upload text-muted fs-6"></i> Upload Contract
                 </button>
               </li>

               <li><hr class="dropdown-divider my-1"></li>

               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2 text-danger">
                   <i class="bi bi-trash3 fs-6"></i> Cancel Contract
                 </button>
               </li>
           `;
       }

       // =========================
       // STATUS 3 = COMPLETED
       // =========================
       else if (status === 3) {

           items += `
               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2">
                   <i class="bi bi-eye text-muted fs-6"></i> View Contract
                 </button>
               </li>

               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2">
                   <i class="bi bi-pencil-square text-muted fs-6"></i> Add Amendment
                 </button>
               </li>

               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2">
                   <i class="bi bi-cash-coin text-muted fs-6"></i> Add Charges
                 </button>
               </li>

               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2">
                   <i class="bi bi-calendar-check text-muted fs-6"></i> End Event
                 </button>
               </li>

               <li><hr class="dropdown-divider my-1"></li>

               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2">
                   <i class="bi bi-download text-muted fs-6"></i> Download PDF
                 </button>
               </li>

               <li>
                 <button class="dropdown-item py-2 small d-flex align-items-center gap-2">
                   <i class="bi bi-printer text-muted fs-6"></i> Print
                 </button>
               </li>
           `;
       }

       // =========================
       // DEFAULT
       // =========================
       else {
           items += `
               <li>
                 <span class="dropdown-item text-muted small">No actions available</span>
               </li>
           `;
       }

       return `
           <div class="dropdown">
               <button class="btn btn-link text-secondary p-0 border-0" type="button" data-bs-toggle="dropdown">
                   <i class="bi bi-three-dots-vertical fs-6"></i>
               </button>

               <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="font-size: 13px;">
                   ${items}
               </ul>
           </div>
       `;
   }


    function ServiceContent(data) {
        const srvdisplay = $("#load_EventOrderLists");
        if (!data || data.length === 0) {
            showEmptyStateBookings("No available.");
            return;
        }
        srvdisplay.empty();

        data.forEach(srv => {
            srvdisplay.append(`
                <tr style="cursor: pointer;">
                    <td class="ps-4 text-muted">${srv.OrderNumber}</td>
                    <td>
                        <div class="fw-bold text-dark">${srv.EventTitle}</div>
                        <div class="text-muted small" style="font-size: 0.75rem;">${srv.GuestCompany}</div>
                    </td>
                    <td class="text-center fw-bold text-dark">${srv.EventDays}</td>
                    <td class="text-center">
                        ${DocumentStatusBadge(srv.DocStatus)}
                    </td>
                    <td class="pe-4 text-center">
                        ${EventActionDropdown(srv.DocId, srv.DocStatus)}
                    </td>
                </tr>
            `);
        });
    }




    /*Function for no record of beverages*/
    function emptyStateBookings(message) {
        $("#load_EventOrderLists").html(`
            <tr>
                <td colspan="5" class="py-5 text-center">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center">
                            <i class="bi bi-file-earmark-text text-muted fs-3"></i>
                        </div>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">No Record Found.</h6>
                    <p class="text-muted small mb-0">No track of records activities.</p>
                </td>
            </tr>
        `);
    }

    /*Function for no record of beverages*/
    function showEmptyStateBookings(message) {
        $("#load_EventOrderLists").html(`
            <tr>
                <td colspan="5" class="py-5 text-center">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center">
                            <i class="bi bi-file-earmark-text text-muted fs-3"></i>
                        </div>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">No Record Found</h6>
                    <p class="text-muted small mb-0">No track of records activities.</p>
                </td>
            </tr>
        `);
    }


    /*Function to count page number page 1 of and so on*/
    function BookingsPaginationUi() {
        $("#page-info-pencilbook").text("Page " + CurrentPage + " of " + totalPages);
        if (CurrentPage <= 1) {
            $("#li-prev-pencilbook").addClass("disabled");
        } else {
            $("#li-prev-pencilbook").removeClass("disabled");
        }

        if (CurrentPage >= totalPages) {
            $("#li-next-pencilbook").addClass("disabled");
        } else {
            $("#li-next-pencilbook").removeClass("disabled");
        }
    }

    /*Function to build list of pagination*/
    function BookingsageNumber() {
        $("#pagination-pencilbook li.page-number-booking").remove();
        let prevLi = $("#li-prev-pencilbook");
        let maxVisible = 5;
        let start = Math.max(1, CurrentPage - 2);
        let end = Math.min(totalPages, start + maxVisible - 1);
        if (end - start < maxVisible - 1) {
            start = Math.max(1, end - maxVisible + 1);
        }
        if (start > 1) {
            insertPageBreakfast(1, prevLi);
            prevLi = prevLi.next();

            if (start > 2) {
                prevLi.after(`<li class="page-item page-number-booking disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPageBreakfast(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-booking disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPageBreakfast(totalPages, prevLi);
        }
        function insertPageBreakfast(i, ref) {
            let activeClass = (i === CurrentPage) ? "active" : "";

            let li = `
                <li class="page-item page-number-booking ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }

    /*search-srv*/
    $("#search-event-order").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadInbox();
        }
    });

      /* Pagination + Fetch Blocked srvounts */
      $("#btn-preview-pencilbook").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadInbox(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-pencilbook").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadInbox(CurrentPage + 1);
          }
      });

      $(document).on("click", "#pagination-pencilbook .page-link[data-page]", function (e) {
          e.preventDefault();

          loadInbox($(this).data("page"));
      });


      /*Function to format time*/
      function formatTime(timeStr) {
          if (!timeStr) return '';
          const [hours, minutes] = timeStr.split(':');
          const date = new Date();
          date.setHours(parseInt(hours), parseInt(minutes));

          return date.toLocaleTimeString([], {
              hour: 'numeric',
              minute: '2-digit',
              hour12: true
          });
      }

      /*Function to setup package for event and ready for contract*/
      function setupEventPackage(DocId){
          $.post("dirs/booking/actions/get_booking_details.php",{
              DocId : DocId
          },function(data){
              let response = JSON.parse(data);
              if($.trim(response.isSuccess) === "success"){
                  bookingformPakacge(function () {
                  updateArrangementSummary();
                  applyFoodSetupSummary();
                      $("#form-title").text('Booking Form');/*Booking form title*/
                      $("#draft-documentid").val(response.Data.DocId);
                      $("#event_title").val(response.Data.EventTitle).prop('disabled', true);
                      $("#start_date").val(response.Data.EventStartDate).prop('disabled', true);
                      $("#end_date").val(response.Data.EventEndDate).prop('disabled', true);
                      $("#start_time").val(response.Data.TimeStart).prop('disabled', true);
                      $("#end_time").val(response.Data.TimeEnd).prop('disabled', true);
                      $("#choose_hotel").val(response.Data.Booked_Hotel).prop('disabled', true);
                      $("#choose_functionrooms").val(response.Data.FunctionRoom).prop('disabled', true);
                      $("#expecte_pax").val(response.Data.ExpectedPax).prop('disabled', true);
                      $("#guaranteed_pax").val(response.Data.GuaranteedPax).prop('disabled', true);
                      $("#guest-name").val(response.Data.GuestName).prop('disabled', true);
                      $("#guest_company").val(response.Data.GuestCompany).prop('disabled', true);
                      $("#mobile-number").val(response.Data.MobileNumber).prop('disabled', true);
                      $("#guest_email").val(response.Data.Customer_Email).prop('disabled', true);
                      $("#guest_address").val(response.Data.Address).prop('disabled', true);
                      $("#job_position").val(response.Data.JobPosition).prop('disabled', true);
                      $("#engager_category").val(response.Data.GuestType).prop('disabled', true);
                     $("#event-summary-card").html(`
                         <div class="card shadow-sm border-0 rounded-3 bg-white">
                             <div class="card-header bg-info text-white py-3">
                                 <div class="d-flex align-items-center gap-2">
                                     <i class="bi bi-calendar-event fs-5"></i>
                                     <div class="fw-bold text-uppercase small">
                                         Event Summary
                                     </div>
                                 </div>
                             </div>

                             <div class="card-body p-4">

                                 <!-- Title -->
                                 <h5 class="fw-bold text-dark mb-3">
                                     ${response.Data.EventTitle || '--'}
                                 </h5>

                                 <!-- Details Grid -->
                                 <div class="row g-3 small">

                                     <div class="col-12 col-md-6">
                                         <div class="d-flex gap-2">
                                             <i class="bi bi-building text-info"></i>
                                             <div>
                                                 <div class="text-muted">Hotel</div>
                                                 <div class="fw-semibold text-dark">
                                                     ${response.Data.Booked_Hotel || '--'}
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-12 col-md-6">
                                         <div class="d-flex gap-2">
                                             <i class="bi bi-door-open text-info"></i>
                                             <div>
                                                 <div class="text-muted">Function Room</div>
                                                 <div class="fw-semibold text-dark">
                                                     ${response.Data.FunctionRoom || '--'}
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-12 col-md-6">
                                         <div class="d-flex gap-2">
                                             <i class="bi bi-calendar-range text-info"></i>
                                             <div>
                                                 <div class="text-muted">Event Period</div>
                                                 <div class="fw-semibold text-dark">
                                                     ${response.Data.EventDateDisplay || '--'}
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-12 col-md-6">
                                         <div class="d-flex gap-2">
                                             <i class="bi bi-clock text-info"></i>
                                             <div>
                                                 <div class="text-muted">Event Time</div>
                                                 <div class="fw-semibold text-dark">
                                                     ${formatTime(response.Data.TimeStart)} - ${formatTime(response.Data.TimeEnd)}
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-12 col-md-6">
                                         <div class="d-flex gap-2">
                                             <i class="bi bi-people text-info"></i>
                                             <div>
                                                 <div class="text-muted">Expected Pax</div>
                                                 <div class="fw-semibold text-dark">
                                                     ${response.Data.ExpectedPax || '--'}
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-12 col-md-6">
                                         <div class="d-flex gap-2">
                                             <i class="bi bi-person-check text-info"></i>
                                             <div>
                                                 <div class="text-muted">Guaranteed Pax</div>
                                                 <div class="fw-semibold text-dark">
                                                     ${response.Data.GuaranteedPax || '--'}
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     `);

               // ===========================
               // FOOD SETUP
               // ===========================
               let foodHtml = '';

               if (Array.isArray(response.Food) && response.Food.length > 0) {

                   response.Food.forEach(food => {
                       foodHtml += `
                           <label class="list-group-item px-4 py-3 border border-success selection-row selection-food position-relative d-block mb-2 rounded-3 shadow-sm">
                               <div class="form-check custom-check-success mb-0 d-flex align-items-start gap-3 pe-4">
                                   <input class="form-check-input mt-1 shadow-none border-success" type="checkbox" checked>
                                   <div class="flex-grow-1">
                                       <div class="fw-semibold text-dark lh-1 py-1 food_name">
                                           ${food.MenuName || '--'}
                                       </div>
                                       <div class="small text-muted mt-1 food_description">
                                           ${food.MenuDescription || '--'}
                                       </div>
                                       <input type="hidden"
                                              class="food_category"
                                              value="${food.MenuCategory || ''}">
                                   </div>
                               </div>
                           </label>
                       `;
                   });

                   $("#display-pre-setupfood").html(foodHtml).show();

                   // Hide default food options
                   $("#food_list_group > label").hide();

               } else {

                   $("#display-pre-setupfood").empty().hide();

                   // Show default food options
                   $("#food_list_group > label").show();
               }


               // ===========================
               // EQUIPMENT SETUP
               // ===========================
               let equipmentHtml = '';

               if (Array.isArray(response.Equipment) && response.Equipment.length > 0) {

                   response.Equipment.forEach(eq => {
                       equipmentHtml += `
                           <label class="list-group-item px-4 py-3 border border-success selection-row">
                               <div class="form-check custom-check-success mb-0 d-flex align-items-start gap-3">
                                   <input class="form-check-input mt-1" type="checkbox" checked>
                                   <div class="flex-grow-1">
                                       <div class="fw-semibold text-dark lh-1 py-1 equip_name">
                                           ${eq.EqpmentName || '--'}
                                       </div>
                                       <div class="small text-muted mt-1 equip_description">
                                           ${eq.EqpmentDescription || '--'}
                                       </div>
                                       <input type="hidden"
                                              class="equip_category"
                                              value="${eq.EqpmentCategory || ''}">
                                   </div>
                               </div>
                           </label>
                       `;
                   });

                   $("#display-pre-setuparrangment").html(equipmentHtml).show();

                   // Hide default equipment options
                   $("#arrangement_list_group > label").hide();

               } else {

                   $("#display-pre-setuparrangment").empty().hide();

                   // Show default equipment options
                   $("#arrangement_list_group > label").show();
               }


                      
                  });
              } else {
                  console.log(response.Data);
              }
          });
      }

      /*Function display the main content form for re applying */
      function bookingformPakacge(callback) {
          $.post("dirs/booking/form2/main.php", {}, function (data){
              $("#main-content").html(data);
              setTimeout(function() {
                  $("#nav-arrangement-tab").prop('disabled', false);
                  $("#nav-food-tab").prop('disabled', false);
                  $("#nav-summary-tab").prop('disabled', false);
                  $("#form-button-action").html(`
                        <button class="btn btn-sm btn-success shadow px-4 py-2 rounded-3 fw-medium" type="button" onclick="updateConfirmBooking()">
                          Confirm
                        </button>
                        <button class="btn btn-sm btn-primary shadow px-4 py-2 rounded-3 fw-medium" type="button" onclick="saveSetupDraft()">
                          Save Setup
                        </button>
                        <button class="btn btn-light px-4 py-2 rounded-3 text-secondary border fw-medium shadow" type="reset" onclick="loadBookingInbox()">
                          Cancel Setup
                        </button>
                  `);

                  if (typeof callback === "function") {
                      callback();
                  }

              }, 50);
          });
      }
     /* <div class="dropdown">
          <button type="button"
              class="btn btn-light d-flex align-items-center justify-content-center fs-5 no-caret"
              id="fabDropdownMenu"
              data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="bi bi-list"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2 rounded-3 mt-2">
              <li>
                  <button class="dropdown-item rounded-2 py-2 small d-flex align-items-center gap-2" type="button" onclick="updateConfirmBooking()">
                      <i class="bi bi-check2-circle text-muted fs-6"></i>
                      Confirm
                  </button>
              </li>
              <li>
                <button class="dropdown-item rounded-2 py-2 small d-flex align-items-center gap-2" type="button" onclick="saveSetupDraft()">
                    <i class="bi bi-check2-circle text-muted fs-6"></i>
                    Save Setup
                </button>
              </li>
              <li>
                  <button class="dropdown-item rounded-2 py-2 small d-flex align-items-center gap-2" type="button" onclick="loadBookingInbox()">
                      <i class="bi bi-x-circle text-danger fs-6"></i>
                      Cancel Setup
                  </button>
              </li>
          </ul>
      </div>*/
   
/*--------------------------------------------------------------------------------------------------------------------*/
/*Function to auto summary at the summary page to show the total summary of event*/
    function updateArrangementSummary() {
          var summaryArrangment = `
              <div class="card shadow-sm border-0 rounded-3 bg-white">

                  <!-- Header -->
                  <div class="card-header bg-success text-white py-3">
                      <div class="d-flex align-items-center gap-2">
                          <i class="bi bi-gear-fill fs-5"></i>
                          <div class="fw-bold text-uppercase small">
                              Equipment Summary
                          </div>
                      </div>
                  </div>
                  <div class="card-body p-3">
                  <ul class="list-group list-group-flush">
          `;

          var hasSelectedArrangement = false;
          $("#arrangement_list_group input[type='checkbox']:checked").each(function () {
              const row = $(this).closest(".selection-row");
              const title = row.find(".fw-semibold").text().trim();
              const description = row.find(".small.text-muted").text().trim();
              hasSelectedArrangement = true;
              summaryArrangment += `
                  <li class="list-group-item px-0">
                      <div class="fw-semibold">${title}</div>
                      <small class="text-muted">${description}</small>
                  </li>
              `;
          });
          summaryArrangment += `
                      </ul>
                  </div>
              </div>
          `;
          if (!hasSelectedArrangement) {
              summaryArrangment = `
                  <div class="text-center text-muted py-5">
                      <i class="bi bi-gear text-secondary mb-2"></i>
                      <div class="fw-semibold text-dark">
                          No equipments setup
                      </div>
                      <small class="d-block text-muted mt-1">
                          Select items from the list to display them here.
                      </small>
                  </div>
              `;
          }
          $("#arrangemnt-summary-card").html(summaryArrangment);
      }
      $(document).on(
          "change",
          "#arrangement_list_group input[type='checkbox']",
          function () {
              updateArrangementSummary();
          }
      );


/*Function to auto summary at the summary page to show the total summary of event*/
    function applyFoodSetupSummary() {
        var summaryFood = `
            <div class="card shadow-sm border-0 rounded-3 bg-white">
                <div class="card-header bg-warning text-white py-3">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-fork-knife fs-5"></i>
                        <div class="fw-bold text-uppercase small">
                            Food Summary
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                <ul class="list-group list-group-flush">
        `;

        var hasSelectedFood = false;
        $("#food_list_group input[type='checkbox']:checked").each(function () {
            const row = $(this).closest(".selection-food");
            const title = row.find(".fw-semibold").text().trim();
            const description = row.find(".small.text-muted").text().trim();
            hasSelectedFood = true;
            summaryFood += `
                <li class="list-group-item px-0">
                    <div class="fw-semibold">${title}</div>
                    <small class="text-muted">${description}</small>
                </li>
            `;
        });
        summaryFood += `
                    </ul>
                </div>
            </div>
        `;
        if (!hasSelectedFood) {
            summaryFood = `
                <div class="text-center text-muted py-5">
                    <i class="bi bi-gear text-secondary mb-2"></i>
                    <div class="fw-semibold text-dark">
                        No food setup
                    </div>
                    <small class="d-block text-muted mt-1">
                        Select items from the list to display them here.
                    </small>
                </div>
            `;
        }
        $("#food-summary-card").html(summaryFood);
    }
    $(document).on(
        "change",
        "#food_list_group input[type='checkbox']",
        function () {
            applyFoodSetupSummary();
        }
    );



// Function save draft setup of event packages and event equipments
    function saveSetupDraft() {

        var DocumentId = $("#draft-documentid").val();
        var RatePax = $("#rate_perpax").val();
        var PackageCost = $("#package_cost").val();
        var Instruction = $("#instructions").val();

        // =========================
        // EQUIPMENT (CHECKED ONLY)
        // =========================
        var Equipment = [];

        $("#arrangement_list_group input[type='checkbox']:checked").each(function () {

            const row = $(this).closest(".selection-row");

            Equipment.push({
                id: $(this).attr("id"),
                name: row.find(".equip_name").text().trim(),
                category: row.find(".equip_category").text().trim(),
                description: row.find(".equip_description").text().trim()
            });
        });

        // =========================
        // FOOD (CHECKED ONLY)
        // =========================
        var Menu = [];

        $("#food_list_group input[type='checkbox']:checked").each(function () {

            const row = $(this).closest(".selection-food");

            Menu.push({
                id: $(this).attr("id"),
                name: row.find(".food_name").text().trim(),
                category: row.find(".food_category").text().trim(),
                description: row.find(".food_description").text().trim()
            });
        });

        // =========================
        // LOADING
        // =========================
        Swal.fire({
            toast: true,
            position: "top-end",
            icon: "info",
            title: "Saving...",
            showConfirmButton: false,
            timer: 1500
        });

        // =========================
        // POST
        // =========================
        $.post("dirs/booking/actions/save_temporarysetup.php", {

            DocumentId: DocumentId,
            Equipment: JSON.stringify(Equipment),
            Menu: JSON.stringify(Menu),
            RatePax: RatePax,
            PackageCost: PackageCost,
            Instruction: Instruction

        }, function (data) {

            if ($.trim(data) == "success") {

                mdlBookForm2();

                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "Saved",
                    showConfirmButton: false,
                    timer: 2000
                });

            } else {

                Swal.fire({
                    icon: "error",
                    title: "Error: " + data,
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    }



/*Function to save booking and confirmed ready for actual evaluation*/    
    function updateConfirmBooking(){
        var Documentid = $("#draft-documentid").val();
        var RatePax = $("#rate_perpax").val();
        var PackageCost = $("#package_cost").val();
        var Instruction = $("#instructions").val();
        $.post("dirs/booking/actions/update_confirmbooking.php", {
            Documentid : Documentid,
            RatePax: RatePax,
            PackageCost: PackageCost,
            Instruction: Instruction
        }, function(data){
            if($.trim(data) == "success"){
                mdlBookForm2();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "Booking confirmed",
                    showConfirmButton: false,
                    timer: 2000
                });
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Error: " + data,
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    }

</script>