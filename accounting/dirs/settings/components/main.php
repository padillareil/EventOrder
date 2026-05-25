<div class="container my-5">
    <!-- Main Wrapper -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Section 1: Account Settings Profile & Security -->
        <div class="card-body p-4 p-md-5 border-bottom bg-white">
            <h4 class="fw-bold text-dark mb-4">Account Settings</h4>
            
            <div class="row g-4">
                <!-- Profile Picture Column -->
                <div class="col-10 col-sm-4 col-md-3 col-lg-2 mx-auto text-center">
                    <div class="position-relative d-inline-block mb-3">
                        <!-- Profile Image Placeholder -->
                        <div class="bg-light rounded-circle border d-flex align-items-center justify-content-center shadow-sm mx-auto overflow-hidden" style="width: 120px; height: 120px;">
                            <img id="avatar-preview-profile" src="../assets/image/uploads/noimage.avif" class="w-100 h-100 object-fit-cover skeleton-avatar" alt="Profile Image">
                        </div>
                    </div>
                    <div>
                        <button id="btn-upload" class="btn btn-outline-primary btn-sm px-3 rounded-pill" onclick="modalProfile()">
                            <i class="bi bi-camera me-1"></i> Upload Profile
                        </button>
                    </div>
                </div>

                <!-- Security Form Column -->
                <div class="col-12 col-md-9 col-lg-10">
                    <form id="frm-update-security">
                        <h5 class="fw-semibold text-dark mb-3">Update Password</h5>
                        
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label small text-secondary fw-semibold mb-1">New Password</label>
                                <input type="password" class="form-control rounded-3 py-2 userpassword" id="new-password" autocomplete="off" required>
                                <div class="form-text text-muted fs-7">Create a strong password for account security.</div>
                            </div>
                            
                            <div class="col-12 col-md-6">
                                <label class="form-label small text-secondary fw-semibold mb-1">Confirm Password</label>
                                <input type="password" class="form-control rounded-3 py-2 userpassword" id="confirm-password" autocomplete="off" required>
                                <div class="form-text text-muted fs-7">Ensure both passwords are match.</div>
                            </div>
                            <div class="form-check mb-2 ml-3">
                              <input class="form-check-input" type="checkbox" id="show-bothpassword">
                              <label class="form-check-label" for="show-bothpassword">Show Password</label>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex align-items-center gap-2 mt-4 justify-content-end">
                            <button type="reset" class="btn btn-light px-4 py-2 rounded-3 text-secondary border fw-medium shadow" id="btn-cancel-account">
                                Cancel
                            </button>
                            <button id="btn-submit-account" type="submit" class="btn btn-primary px-4 py-2 rounded-3 fw-medium">
                                <span class="spinner-border spinner-border-sm d-none me-1" id="btn-spinner-account"></span>
                                <span class="btn-text-account">Save Changes</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="card-body p-4 p-md-5 bg-light-subtle">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-4">
                <div>
                    <h5 class="fw-semibold text-dark mb-1">Activity Logs</h5>
                    <p class="text-muted small mb-0">Monitor recent activity records.</p>
                </div>
                
                <!-- Table Controls Container -->
                <div class="d-flex align-items-center gap-2">
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-account" placeholder="Search...">
                    </div>
                    
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm mb-0" id="pagination-account">
                            <li class="page-item" id="li-prev-account">
                                <a class="page-link shadow-none" href="#" id="btn-preview-account">
                                    <i class="bi bi-chevron-left small"></i>
                                </a>
                            </li>
                            <li class="page-item" id="li-next-account">
                                <a class="page-link shadow-none" href="#" id="btn-next-account">
                                    <i class="bi bi-chevron-right small"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>

            <div id="page-info-account" class="mt-3 small text-muted"></div>


            <!-- Modern Table Design -->

            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 50vh;">
                <table class="table table-borderless table-hover align-middle mb-0">
                    <thead class="sticky-top bg-white border-bottom align-middle" style="z-index: 5; height: 50px;">
                        <tr>
                            <th class="ps-4 text-secondary fw-bold fs-7" style="width: 80px;">#</th>
                            <th class="text-secondary fw-bold fs-7">Description</th>
                            <th class="text-secondary fw-bold fs-7">Device</th>
                            <th class="pe-4 text-secondary fw-bold fs-7">IP Address</th>
                            <th class="pe-4 text-secondary fw-bold fs-7">Browser</th>
                            <th class="pe-4 text-secondary fw-bold fs-7">Date</th>
                        </tr>
                    </thead>
                    <tbody id="load_UserAccountLists">

                        <!-- Empty State -->
                        <tr>
                            <td colspan="6" class="py-5 text-center">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center">
                                        <i class="bi bi-clock-history text-muted fs-3"></i>
                                    </div>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">No activity history</h6>
                                <p class="text-muted small mb-0">This profile has no registered system activities.</p>
                            </td>
                        </tr>

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


    function loadActivityLogs_user(page = 1) {
        CurrentPage = page; 
        var srvdisplay = $("#load_UserAccountLists");
        srvdisplay.html(`
                <tr>
                    <td colspan="6" class="p-5 text-center text-muted">
                        <div class="spinner-border text-dark"></div>
                        <div class="mt-2">Loading...</div>
                    </td>
                </tr>
        `);
        var Search = $("#search-account").val();
        $.post("dirs/settings/actions/get_footprint.php", {
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

                    ServicePaginationUi();
                    ServicePageNumber();
            } else {
                emptyStateService("No Record Found.");
            }
        });
    }


    function ServiceContent(data) {
        const srvdisplay = $("#load_UserAccountLists");
        if (!data || data.length === 0) {
            showEmptyStateService("No available.");
            return;
        }
        srvdisplay.empty();

        data.forEach(srv => {
            srvdisplay.append(`
               <tr class="align-middle">
                   <td>${srv.OrderNumber}</td>
                   <td class="text-danger font-monospace">
                    <small>"${srv.Description}"</small>
                   </td>
                    <td>
                         <small class="text-muted font-monospace"> ${srv.DeviceName}</small>
                    </td>
                   <td>${srv.IP_Address}</td>
                   <td>
                        <small class="text-muted font-monospace"> ${srv.Browser}</small>
                   </td>
                   <td><small class="font-monospace">${srv.DocDate}</small></td>
               </tr>
            `);
        });
    }




    /*Function for no record of beverages*/
    function emptyStateService(message) {
        $("#load_UserAccountLists").html(`
            <tr>
                <td colspan="6" class="py-5 text-center">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center">
                            <i class="bi bi-clock-history text-muted fs-3"></i>
                        </div>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">No activity history</h6>
                    <p class="text-muted small mb-0">This profile has no registered system activities.</p>
                </td>
            </tr>
        `);
    }

    /*Function for no record of beverages*/
    function showEmptyStateService(message) {
        $("#load_UserAccountLists").html(`
            <tr>
                <td colspan="6" class="py-5 text-center">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center">
                            <i class="bi bi-clock-history text-muted fs-3"></i>
                        </div>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">No activity history</h6>
                    <p class="text-muted small mb-0">This profile has no registered system activities.</p>
                </td>
            </tr>
        `);
    }


    /*Function to count page number page 1 of and so on*/
    function ServicePaginationUi() {
        $("#page-info-account").text("Page " + CurrentPage + " of " + totalPages);
        if (CurrentPage <= 1) {
            $("#li-prev-account").addClass("disabled");
        } else {
            $("#li-prev-account").removeClass("disabled");
        }

        if (CurrentPage >= totalPages) {
            $("#li-next-account").addClass("disabled");
        } else {
            $("#li-next-account").removeClass("disabled");
        }
    }

    /*Function to build list of pagination*/
    function ServicePageNumber() {
        $("#pagination-account li.page-number-account").remove();
        let prevLi = $("#li-prev-account");
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
                prevLi.after(`<li class="page-item page-number-account disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPageBreakfast(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-account disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPageBreakfast(totalPages, prevLi);
        }
        function insertPageBreakfast(i, ref) {
            let activeClass = (i === CurrentPage) ? "active" : "";

            let li = `
                <li class="page-item page-number-account ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }

    /*search-srv*/
    $("#search-account").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadActivityLogs_user();
        }
    });

      /* Pagination + Fetch Blocked srvounts */
      $("#btn-preview-account").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadActivityLogs_user(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-account").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadActivityLogs_user(CurrentPage + 1);
          }
      });

      $(document).on("click", "#pagination-account .page-link[data-page]", function (e) {
          e.preventDefault();

          loadActivityLogs_user($(this).data("page"));
      });




    $(document).ready(function () {
      $("#show-bothpassword").on("change", function () {
        const type = $(this).is(":checked") ? "text" : "password";
        $(".userpassword").attr("type", type);
      });
    });


/*
   $("#frm-update-security").submit(function(event){
       event.preventDefault();

       var ConfirmPassword = $("#confirm-password").val().trim();
       var NewPassword = $("#new-password").val().trim();
       var Location = 

       if(NewPassword !== ConfirmPassword){
           Swal.fire({
               icon: "warning",
               title: "Password Mismatch"
           });
           return;
       }


       if(NewPassword.length < 8){
           Swal.fire({
               icon: "warning",
               title: "Weak Password",
               text: "Password must be at least 8 characters."
           });
           return;
       }


       let uniqueChars = new Set(NewPassword);

       if(uniqueChars.size < 4){
           Swal.fire({
               icon: "warning",
               title: "Weak Password",
               text: "Password must contain more unique characters."
           });
           return;
       }

       let $btnSubmit = $("#btn-submit-account");
       let $btnCancel = $("#btn-cancel-account");
       let $spinner = $("#btn-spinner");
       let $text = $btnSubmit.find(".btn-text-account");

       $btnSubmit.prop("disabled", true);
       $btnCancel.prop("disabled", true);

       $spinner.removeClass("d-none");
       $text.text("Saving...");

       $.post("dirs/settings/actions/update_password.php", {
           ConfirmPassword: ConfirmPassword
       }, function(data){

           $btnSubmit.prop("disabled", false);
           $btnCancel.prop("disabled", false);

           $spinner.addClass("d-none");
           $text.text("Save");

           if($.trim(data) == "success"){

               $("#frm-update-security")[0].reset();

               loadSettings();

               Swal.fire({
                   icon: "success",
                   title: "Password Updated",
                   text: "New password updated.",
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

   });*/

    $("#frm-update-security").submit(function(event){
        event.preventDefault();

        var ConfirmPassword = $("#confirm-password").val().trim();
        var NewPassword = $("#new-password").val().trim();

        /* Validate Password Match */
        if(NewPassword !== ConfirmPassword){
            Swal.fire({
                icon: "warning",
                title: "Password Mismatch"
            });
            return;
        }

        /* Validate Minimum 8 Characters */
        if(NewPassword.length < 8){
            Swal.fire({
                icon: "warning",
                title: "Weak Password",
                text: "Password must be at least 8 characters."
            });
            return;
        }

        /* Validate Unique Characters */
        let uniqueChars = new Set(NewPassword);

        if(uniqueChars.size < 4){
            Swal.fire({
                icon: "warning",
                title: "Weak Password",
                text: "Password must contain more unique characters."
            });
            return;
        }

        /* Loading UI */
        let $btnSubmit = $("#btn-submit-account");
        let $btnCancel = $("#btn-cancel-account");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-account");

        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        /* =========================
           GET GEO LOCATION FIRST
        ========================= */
        if (navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(function(position){

                let Location = 
                    position.coords.latitude + "," + 
                    position.coords.longitude;

                sendRequest(Location);

            }, function(error){

                /* fallback if user denies */
                let Location = "Location denied / unavailable";

                sendRequest(Location);

            });

        } else {
            sendRequest("Geolocation not supported");
        }

        /* =========================
           SEND REQUEST FUNCTION
        ========================= */
        function sendRequest(Location){

            $.post("dirs/settings/actions/update_password.php", {
                ConfirmPassword: ConfirmPassword,
                Location: Location
            }, function(data){

                $btnSubmit.prop("disabled", false);
                $btnCancel.prop("disabled", false);

                $spinner.addClass("d-none");
                $text.text("Save");

                if($.trim(data) == "success"){

                    $("#frm-update-security")[0].reset();

                    loadSettings();

                    Swal.fire({
                        icon: "success",
                        title: "Password Updated",
                        text: "New password updated.",
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

        }

    });

   /*function to show profile picture*/
   $(document).on("click", "#avatar-preview-profile", function(){
       let imageSrc = $(this).attr("src");
       Swal.fire({
           imageUrl: imageSrc,
           imageAlt: "Profile Image",
           showConfirmButton: false,
           showCloseButton: false,
           width: 500,
           background: "#fff",
           customClass: {
               popup: 'rounded-4 shadow'
           }
       });

   });
</script>

<style>
    .skeleton-avatar {
        position: relative;
        overflow: hidden;
        background: #e9ecef;
    }

    .skeleton-avatar::before {
        content: '';
        position: absolute;
        top: 0;
        left: -150px;
        width: 150px;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,0.6),
            transparent
        );
        animation: skeleton-loading 1.2s infinite;
    }

    @keyframes skeleton-loading {
        100% {
            left: 100%;
        }
    }
</style>