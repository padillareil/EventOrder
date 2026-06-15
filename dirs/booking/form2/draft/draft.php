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

                    <h5 class="fw-bold text-dark mb-0">Draft</h5>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-3 ms-md-auto">
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-draft-event" placeholder="Search...">
                    </div>
                </div>

            </div>
        </div>

        <div class="card-body p-2 p-md-5 bg-light-subtle">
            
            <div class="mb-1 justify-content-end d-flex">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0" id="pagination-draft">
                        <li class="page-item" id="li-prev-draft">
                            <a class="page-link shadow-none" href="#" id="btn-preview-draft">
                                <i class="bi bi-chevron-left small"></i>
                            </a>
                        </li>
                        <li class="page-item" id="li-next-draft">
                            <a class="page-link shadow-none" href="#" id="btn-next-draft">
                                <i class="bi bi-chevron-right small"></i>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
                <div class="justify-content-end d-flex">
                    <div id="page-info-draft" class="mt-1 small text-muted"></div>
                </div>
            
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="height: 85vh;">
                <table class="table table-bordered table-hover align-middle mb-0" style="font-size: 13px;">
                    <thead class="sticky-top bg-white border-bottom align-middle text-secondary text-uppercase" style="z-index: 5; height: 52px;">
                        <tr>
                            <th class="ps-4 fw-bold" style="width: 100px;">#</th>
                            <th class="fw-bold">Engager & Event</th>
                            <th class="fw-bold text-center">No. Days</th>
                            <th class="pe-4 fw-bold text-end" style="width: 60px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="load_DraftEvents">


                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
    var CurrentPageDraft = 1;
    var PageSizeDraft = 20;
    var totalPages = 1;
    var isPackageModeDraft = false;
    var selectedItemsDraft = [];


    function loadDrafts(page = 1) {
        CurrentPageDraft = page; 
        var srvdisplay = $("#load_DraftEvents");
        srvdisplay.html(`
                <tr>
                    <td colspan="4" class="p-5 text-center text-muted">
                        <div class="spinner-border text-dark"></div>
                        <div class="mt-2">Loading...</div>
                    </td>
                </tr>
        `);
        var Search = $("#search-draft-event").val();
        $.post("dirs/booking/actions/get_draftsbookings.php", {
            CurrentPageDraft,
            PageSizeDraft,
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
                DraftContent(response.Data);
                totalPages = (response.Data && response.Data.length > 0)
                    ? parseInt(response.Data[0].TotalPages)
                    : 1;

                    DraftPaginationUi();
                    DraftpageNumber();
            } else {
                emptyStateDraft("No Record Found.");
            }
        });
    }


    function DraftContent(data) {
        const srvdisplay = $("#load_DraftEvents");
        if (!data || data.length === 0) {
            showEmptyStateDraft("No available.");
            return;
        }
        srvdisplay.empty();

        data.forEach(srv => {
            srvdisplay.append(`
                <tr style="cursor: pointer;">
                    <td class="ps-4 text-muted">${srv.OrderNumber}</td>
                    <td>
                        <div class="fw-bold text-dark">${srv.EventTitle}</div>
                        <div class="text-muted small" style="font-size: 0.75rem;">${srv.Company}</div>
                    </td>
                    <td class="text-center fw-bold text-dark">${srv.EventDays}</td>
                    <td class="pe-4 text-center">
                        <div class="dropdown">
                            <button class="btn btn-link text-secondary p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical fs-6"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="font-size: 13px;">
                                <li>
                                  <button class="dropdown-item rounded-2 py-2 small d-flex align-items-center gap-2" type="button" onclick="openDraft('${srv.DocId}')">
                                    <i class="bi bi-arrow-repeat  text-muted fs-6"></i> Continue
                                  </button>
                                </li>
                                <li>
                                  <button class="dropdown-item rounded-2 py-2 small d-flex align-items-center gap-2" type="button" onclick="deleteDraft('${srv.DocId}', this)">
                                    <i class="bi bi-trash3 text-danger fs-6"></i> Delete
                                  </button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            `);
        });
    }




    /*Function for no record of beverages*/
    function emptyStateDraft(message) {
        $("#load_DraftEvents").html(`
            <tr>
                <td colspan="4" class="py-5 text-center">
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
    function showEmptyStateDraft(message) {
        $("#load_DraftEvents").html(`
            <tr>
                <td colspan="4" class="py-5 text-center">
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
    function DraftPaginationUi() {
        $("#page-info-draft").text("Page " + CurrentPageDraft + " of " + totalPages);
        if (CurrentPageDraft <= 1) {
            $("#li-prev-draft").addClass("disabled");
        } else {
            $("#li-prev-draft").removeClass("disabled");
        }

        if (CurrentPageDraft >= totalPages) {
            $("#li-next-draft").addClass("disabled");
        } else {
            $("#li-next-draft").removeClass("disabled");
        }
    }

    /*Function to build list of pagination*/
    function DraftpageNumber() {
        $("#pagination-draft li.page-number-draft").remove();
        let prevLi = $("#li-prev-draft");
        let maxVisible = 5;
        let start = Math.max(1, CurrentPageDraft - 2);
        let end = Math.min(totalPages, start + maxVisible - 1);
        if (end - start < maxVisible - 1) {
            start = Math.max(1, end - maxVisible + 1);
        }
        if (start > 1) {
            insertPageBreakfast(1, prevLi);
            prevLi = prevLi.next();

            if (start > 2) {
                prevLi.after(`<li class="page-item page-number-draft disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPageBreakfast(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-draft disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPageBreakfast(totalPages, prevLi);
        }
        function insertPageBreakfast(i, ref) {
            let activeClass = (i === CurrentPageDraft) ? "active" : "";

            let li = `
                <li class="page-item page-number-draft ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }

    /*search-srv*/
    $("#search-draft-event").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadDrafts();
        }
    });

      /* Pagination + Fetch Blocked srvounts */
      $("#btn-preview-draft").on("click", function(e) {
          e.preventDefault();

          if (CurrentPageDraft > 1) {
              loadDrafts(CurrentPageDraft - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-draft").on("click", function(e) {
          e.preventDefault();

          if (CurrentPageDraft < totalPages) {
              loadDrafts(CurrentPageDraft + 1);
          }
      });

      $(document).on("click", "#pagination-draft .page-link[data-page]", function (e) {
          e.preventDefault();

          loadDrafts($(this).data("page"));
      });


      /*Function to delete Draft record*/
      function deleteDraft(DocId, btn) {
          let row = $(btn).closest("tr");
          row.addClass("draft-row");
          Swal.fire({
              title: "Delete Draft?",
              text: "This action cannot be undone.",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#dc3545",
              confirmButtonText: "Delete",
              cancelButtonText: "Cancel"
          }).then((result) => {

              if (result.isConfirmed) {
                  row.addClass("deleting");
                  setTimeout(() => {
                      $.post("dirs/booking/actions/update_documentdelete.php", {
                          DocId: DocId
                      }, function(data) {
                          if ($.trim(data) === "success") {
                              row.remove(); 
                              Swal.fire({
                                  toast: true,
                                  position: "top-end",
                                  icon: "success",
                                  title: "Deleted",
                                  showConfirmButton: false,
                                  timer: 1500
                              });
                              loadDrafts(CurrentPageDraft);
                          } else {
                              row.removeClass("deleting");
                          }
                      });

                  }, 200); 
              }
          });
      }

      /*Function Re apply Draft form form 2*/
      function openDraft(DocId){
          $.post("dirs/booking/actions/get_draftsdetails.php",{
              DocId : DocId
          },function(data){
              let response = JSON.parse(data);
              if($.trim(response.isSuccess) === "success"){
                  bookingform(function () {
                      $("#form-title").text('Pencil Booking Form');/*Booking form title*/
                      $("#draft-documentid").val(response.Data.DocId);
                      $("#event_title").val(response.Data.EventTitle);
                      $("#start_date").val(response.Data.PeriodStart);
                      $("#end_date").val(response.Data.PeriodEnd);
                      $("#start_time").val(response.Data.TimeStart);
                      $("#end_time").val(response.Data.TimeEnd);
                      $("#choose_hotel").val(response.Data.Hotel);
                      $("#choose_functionrooms").val(response.Data.Function_Room);
                      $("#expecte_pax").val(response.Data.ExpectedPax);
                      $("#guaranteed_pax").val(response.Data.GuranteedPax);
                      $("#guest-name").val(response.Data.Person_incharge);
                      $("#guest_company").val(response.Data.Company);
                      $("#mobile-number").val(response.Data.MobileNumber);
                      $("#mobile-number2").val(response.Data.MobileNumber2);
                      $("#mobile-number3").val(response.Data.MobileNumber3);
                      $("#guest_email").val(response.Data.Email);
                      $("#guest_address").val(response.Data.Address);
                      $("#job_position").val(response.Data.JobPosition);
                      $("#engager_category").val(response.Data.EngagerCategory);
                  });
              } else {
                  console.log(response.Data);
              }
          });
      }

      /*Function display the main content form for re applying */
      function bookingform(callback) {
          $.post("dirs/booking/form2/main.php", {}, function (data){
              $("#main-content").html(data);
              setTimeout(function() {
                  $("#nav-arrangement-tab").prop('disabled', true);
                  $("#nav-food-tab").prop('disabled', true);
                  $("#nav-summary-tab").prop('disabled', true);

                  if (typeof callback === "function") {
                      callback();
                  }
              }, 50);
          });
      }





</script>


<!-- For animation of delete -->

<style>
   .draft-row {
       transition: all 220ms cubic-bezier(0.2, 0.8, 0.2, 1);
       position: relative;
   }

   /* Hover lift effect (Grab-like feel) */
   .draft-row:hover {
       transform: translateY(-2px);
       box-shadow: 0 6px 18px rgba(0,0,0,0.08);
       background-color: #f5f7fa;
   }

   /* Click delete animation */
   .draft-row.deleting {
       transform: translateX(-40px) scale(0.98);
       opacity: 0;
       height: 0 !important;
       padding-top: 0 !important;
       padding-bottom: 0 !important;
       overflow: hidden;
   }
</style>