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
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                <div class="p-2 rounded-3 me-3" style="background-color: rgba(191, 155, 48, 0.1);">
                    <i class="bi bi-shield-check text-custom-gold fs-4"></i>
                </div>
                <div>
                    <h5 class="modal-title fw-bold text-dark">System Rules & Guidelines</h5>
                    <p class="text-muted small mb-0">Standard Operating Procedures (SOP) for Event Orders.</p>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mb-0 p-4">
                <div class="input-group input-group-sm bg-light border rounded-pill px-3 py-1 mb-4">
                    <span class="input-group-text bg-transparent border-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control bg-transparent border-0 shadow-none" placeholder="Search for a specific rule or SOP...">
                </div>

                <div class="accordion accordion-flush custom-help-accordion" id="helpAccordion">
                    
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#rule1">
                                <span class="badge bg-gold me-3">01</span> Payment & Receipt Requirements
                            </button>
                        </h2>
                        <div id="rule1" class="accordion-collapse collapse" data-bs-parent="#helpAccordion">
                            <div class="accordion-body bg-light-subtle small">
                                <div class="p-2 border-start border-4 border-success mb-2">
                                    <strong class="text-dark">Verification:</strong> No Event Order is valid without a linked **Official Receipt (OR)** number.
                                </div>
                                <ul class="text-muted">
                                    <li><strong>Downpayment:</strong> 50% must be recorded to confirm venue blocking.</li>
                                    <li><strong>Final Payment:</strong> Must be settled 48 hours prior to event setup.</li>
                                    <li>Staff must verify receipt authenticity via the Accounting Module before "Level 2 Approval."</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 mb-3 shadow-sm rounded-4 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#rule2">
                                <span class="badge bg-gold me-3">02</span> Amendment Submission Policy
                            </button>
                        </h2>
                        <div id="rule2" class="accordion-collapse collapse" data-bs-parent="#helpAccordion">
                            <div class="accordion-body bg-light-subtle small">
                                <p class="text-muted mb-2">Changes to the event setup (pax count, menu, or AV) follow these time-locks:</p>
                                <table class="table table-sm table-bordered bg-white mb-0">
                                    <thead class="bg-light">
                                        <tr class="small">
                                            <th>Timeframe</th>
                                            <th>Required Approval</th>
                                        </tr>
                                    </thead>
                                    <tbody class="small">
                                        <tr>
                                            <td>> 72 Hours</td>
                                            <td>Department Head (Level 1)</td>
                                        </tr>
                                        <tr>
                                            <td>< 24 Hours</td>
                                            <td>Executive Manager (Level 3)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm rounded-4 overflow-hidden">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#rule3">
                                <span class="badge bg-gold me-3">03</span> Digital Approval & Accountability
                            </button>
                        </h2>
                        <div id="rule3" class="accordion-collapse collapse" data-bs-parent="#helpAccordion">
                            <div class="accordion-body bg-light-subtle small">
                                <p class="text-muted">The digital signature on the **Event Order Receipt** serves as the final authority for the Banquet and Kitchen teams.</p>
                                <div class="alert alert-warning border-0 small py-2 mb-0">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i> 
                                    Do not proceed with setup if the EO status is "Draft" or "Pending Payment."
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer border-0 p-4 pt-0">
                <div class="bg-dark rounded-pill w-100 p-2 px-3 d-flex justify-content-between align-items-center">
                    <div class="small text-white-50">
                        <i class="bi bi-headset me-2"></i> Technical Issues? Local: 888
                    </div>
                    <button type="button" class="btn btn-sm btn-gold px-4 rounded-pill text-white fw-bold" data-bs-dismiss="modal">I Understand</button>
                </div>
            </div>
        </div>
    </div>
</div>