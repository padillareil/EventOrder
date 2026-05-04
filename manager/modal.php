<div id="gen-spinner" hidden>
  <div class="d-flex justify-content-center" hidden>
    <div class="spinner-border" role="status">
      <span class="visually-hidden"></span>
    </div>
  </div>
</div>
<div id="gen-btn-spinner" class="justify-content-center" hidden>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    <span class="visually-hidden"></span>
</div>
<script>
  function gen_spinner(spinnersize, spinnerclass){
    $("#gen-spinner").find("div[name='spinner-holder']")
    .removeClass("text-primary")
    .removeClass("text-secondary")
    .removeClass("text-success")
    .removeClass("text-danger")
    .removeClass("text-warning")
    .removeClass("text-info")
    .removeClass("text-light")
    .removeClass("text-dark")
    .removeClass("spinner-border-xs")
    .removeClass("spinner-border-sm")
    .removeClass("spinner-border-md")
    .removeClass("spinner-border-lg")
    .removeClass("spinner-border-xl")
    $("#gen-spinner").find("div[name='spinner-holder']")
    .addClass(spinnersize)
    .addClass(spinnerclass);
    return $("#gen-spinner").html();
  }
  function gen_btn_spinner(spinnersize, spinnerclass){
    $("#gen-btn-spinner").find("div[name='spinner-holder']")
    .removeClass("text-primary")
    .removeClass("text-secondary")
    .removeClass("text-success")
    .removeClass("text-danger")
    .removeClass("text-warning")
    .removeClass("text-info")
    .removeClass("text-light")
    .removeClass("text-dark")
    .removeClass("spinner-border-xs")
    .removeClass("spinner-border-sm")
    .removeClass("spinner-border-md")
    .removeClass("spinner-border-lg")
    .removeClass("spinner-border-xl")
    $("#gen-btn-spinner").find("div[name='spinner-holder']")
    .addClass(spinnersize)
    .addClass(spinnerclass);
    return $("#gen-btn-spinner").html();
  }


  

/*Setup Account*/
  $(document).ready(function(){
      var Setup = $("#setup-user").val();
      if (Setup == 'NO') {
        $("#modal-setup-account").modal("show");
      }else{
        $("#modal-setup-account").modal("hide");
      }
  });
  
  $(document).ready(function() {
      $("#showpass").on("click", function () {
          const input = $("#user-newpassword");
          const type = input.attr("type") === "password" ? "text" : "password";
          input.attr("type", type);
          $(this).toggleClass("bi-eye bi-eye-slash");
      });
  });




</script>


<!-- Modal Setup Account -->
<!-- <form id="frm-acc-setup">
  <div class="modal fade" id="modal-setup-account" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="mt-2 mb-3 text-center">
            <h1 class="display-8 fs-5">Account Setup</h1>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="user-fullname" id="user-fullname" class="form-control" required>
            <label for="user-fullname">Fullname</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="user-position" id="user-position" class="form-control" required>
            <label for="user-position">Position</label>
          </div>
          <div class="form-floating mb-3 position-relative">
            <input type="password" name="user-newpassword" id="user-newpassword" class="form-control"  required>
            <label for="user-newpassword">Password</label>
            <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3" 
               id="showpass" style="cursor: pointer;"></i>
          </div>
          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-success py-2">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  $("#frm-acc-setup").submit(function(event){
    event.preventDefault();
      var Fullname  = $("#user-fullname").val();
      var Position  = $("#user-position").val();
      var Password  = $("#user-newpassword").val();

      $.post("actions/update_setup.php", {
          Fullname  : Fullname,
          Position  : Position,
          Password  : Password
      }, function(data){
          if($.trim(data) == "success"){
            $("#modal-setup-account").modal('hide');
          }else{
              alert("Error: " + data);
          }
      });
  })
</script> -->



<!-- Logout Modal Dialogue -->
<div class="modal fade" id="mdl-logout-dialogue" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content border-0 rounded-4 shadow">
      <div class="modal-body text-center p-4">
        <div class="mb-3">
          <i class="bi bi-exclamation-circle text-warning" style="font-size: 50px;"></i>
        </div>
        <h6 class="mb-4">Are you sure you want to leave?</h6>
        <div class="d-flex justify-content-center gap-2">
          <button type="button" class="btn text-white fw-semibold" style="background-color: #bf9b30;" id="btn-logout" onclick="logout()">
              <span id="logout-text">Logout</span>
              <span id="logout-spinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-dark fw-semibold" data-bs-dismiss="modal" id="btn-cancel">
              Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Help Instructions for Event Order System -->
<div class="modal fade" id="mdl-help" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-0">
            <div class="modal-header border-0 pt-4 px-4 pb-0">
                <div class="w-100 border-bottom pb-3">
                    <h4 class="fw-bold m-0" style="letter-spacing: -0.5px;">System Guide & FAQ</h4>
                    <!-- <p class="text-muted small mb-0 text-uppercase" style="letter-spacing: 1px;">Standard Operating Procedures • Event Order Management</p> -->
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <div class="mb-5">
                <div class="input-group border px-3 py-1 bg-light">
                   <span class="input-group-text bg-transparent border-0"><i class="bi bi-search text-muted small"></i></span>
                   <input type="search" class="form-control bg-transparent border-0 small" placeholder="What's in your mind...">
               </div>
                </div>

                <div class="mb-5">
                    <h6 class="fw-bold text-uppercase border-start border-3 border-dark ps-2 mb-4" style="font-size: 0.8rem; letter-spacing: 1px;">The Event Order Lifecycle</h6>
                    
                    <div class="row g-4">
                        <div class="col-md-3">
                            <p class="fw-bold m-0" style="font-size: 0.75rem;">[ STEP 01 ]</p>
                            <p class="fw-bold text-dark mb-1">Creation</p>
                            <p class="small text-muted">Draft the EO with tentative pax and venue. System status: <span class="text-dark fw-bold">DRAFT</span>.</p>
                        </div>
                        <div class="col-md-3 border-start">
                            <p class="fw-bold m-0" style="font-size: 0.75rem;">[ STEP 02 ]</p>
                            <p class="fw-bold text-dark mb-1">Downpayment</p>
                            <p class="small text-muted">Apply the 50% deposit receipt. Status moves to <span class="text-dark fw-bold">PENDING APPROVAL</span>.</p>
                        </div>
                        <div class="col-md-3 border-start">
                            <p class="fw-bold m-0" style="font-size: 0.75rem;">[ STEP 03 ]</p>
                            <p class="fw-bold text-dark mb-1">Verification</p>
                            <p class="small text-muted">Manager reviews floor plan and menu. Status moves to <span class="text-dark fw-bold">APPROVED</span>.</p>
                        </div>
                        <div class="col-md-3 border-start">
                            <p class="fw-bold m-0" style="font-size: 0.75rem;">[ STEP 04 ]</p>
                            <p class="fw-bold text-dark mb-1">Execution</p>
                            <p class="small text-muted">Final EO is printed for Kitchen/Banquet. No further edits allowed without Amendment.</p>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase border-start border-3 border-dark ps-2 mb-4" style="font-size: 0.8rem; letter-spacing: 1px;">Frequently Asked Questions</h6>
                    
                    <div class="accordion accordion-flush" id="faqAccordion">
                        
                        <div class="accordion-item border-bottom">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed px-0 py-3 fw-bold bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Can I edit an Event Order after it has been "Approved"?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body px-0 py-2 small text-muted">
                                    No direct edits are allowed on approved EOs. You must use the <strong class="text-dark">"Add Amendment"</strong> feature. This creates a version history (Rev 1, Rev 2) so all departments are aware of the changes.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-bottom">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed px-0 py-3 fw-bold bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    What happens if the client fails to settle the balance 48 hours before?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body px-0 py-2 small text-muted">
                                    The system will flag the EO as <strong class="text-danger">OVERDUE</strong>. Banquet and Kitchen are advised not to pull ingredients or setup furniture until the Sales Manager provides a financial override.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-bottom">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed px-0 py-3 fw-bold bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    How do I recover my account if the automated reset fails?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body px-0 py-2 small text-muted">
                                    If you cannot access your recovery email, you must send a formal request to the <strong class="text-dark">System Administrator</strong>. 
                                    <br><br>
                                    Your email must include a <strong class="text-dark">specific reason</strong> for the manual override (e.g., *Device Theft/Loss, 2FA De-synchronization, or Personnel Transfer*). For security compliance, manual resets require an identity verification voucher from your Department Head.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-bottom">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed px-0 py-3 fw-bold bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    Why can't I change my Designation or Employee ID myself?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body px-0 py-2 small text-muted">
                                    Designations and Employee IDs are tied to your <strong class="text-dark">Authority Levels</strong>. These are locked to prevent unauthorized approval escalations. Please contact System Administration for any departmental transfers.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-bottom">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed px-0 py-3 fw-bold bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                    What is the difference between Level 1 and Level 2 Authority?
                                </button>
                            </h2>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body px-0 py-2 small text-muted">
                                    <strong class="text-dark">Level 1</strong> is for operational setup (Menu/Venue). <strong class="text-dark">Level 2</strong> is for financial decisions (Discounts/Pricing). If your account only has Level 1, you can draft an EO but cannot "Finalize" it if the price has been modified.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-bottom">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed px-0 py-3 fw-bold bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    How do I link a receipt from a different department?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body px-0 py-2 small text-muted">
                                    Use the "External Receipt" field under the Payment tab. Input the OR number and the issuing department (e.g., Front Office or F&B Outlet) for cross-referencing.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-footer border-top p-4 d-flex justify-content-between align-items-center">
                <div class="text-muted">
                    <span class="fw-bold text-dark">System Support:</span> call 09306460704 • granxingimperialhoteladmin@gmail.com
                </div>
                <div>
                    <button type="button" class="btn btn-outline-dark rounded-0 px-4 py-2 small fw-bold text-uppercase" data-bs-dismiss="modal" style="letter-spacing: 1px;">Close Manual</button>
                    <button type="button" class="btn btn-dark rounded-0 px-4 py-2 small fw-bold text-uppercase" style="letter-spacing: 1px;">Print SOP</button>
                </div>
            </div>
        </div>
    </div>
</div>