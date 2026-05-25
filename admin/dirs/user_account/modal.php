<form id="frm-add-account">
  <div class="modal fade" id="mdl-add-account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content border-0 shadow-lg rounded-4">
        <div class="modal-header border-0 pt-4 px-4">
          <h5 class="modal-title fw-bold text-dark">Create Account</h5>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="mb-2">
                <label class="form-label small text-muted fw-bold">Username</label>
                <input type="text" class="form-control" id="username" autocomplete="off" required>
              </div>
              <div class="mb-2">
                <label class="form-label small text-muted fw-bold">Password</label>
                <input type="password" class="form-control" autocomplete="off" id="userpassword" required>
              </div>
              <div class="form-check mb-2 ml-4">
                <input class="form-check-input" type="checkbox" id="show-bothpassword">
                <label class="form-check-label" for="show-bothpassword">Show Password</label>
              </div>
              <div class="mb-2">
                <label class="form-label small text-muted fw-bold">Full Name</label>
                <input type="text" class="form-control" autocomplete="off" id="fullname" required>
              </div>
              <div class="mb-2">
                <label class="form-label small text-muted fw-bold">Job Position</label>
                <input type="text" class="form-control" autocomplete="off" id="job_position" required>
              </div>
              <div class="mb-2">
                <label class="form-label small text-muted fw-bold">Hotel</label>
                <input type="text" class="form-control" autocomplete="off" id="hotel" required>
              </div>
              <div class="mb-2">
                <label class="form-label small text-muted fw-bold">Account Type</label>
                <select class="form-select" id="accountype" id="accountype" required>
                  <option disabled selected>Choose...</option>
                  <option value="Accounting">Accounting</option>
                  <option value="Audit">Audit</option>
                  <option value="Hotel Admin">Hotel Admin</option>
                  <option value="Restaurant">Restaurant</option>
                  <option value="Sales Employee">Sales Employee</option>
                  <option value="Function">Function</option>
                </select>
              </div>
          </div>
        </div>
        <div class="modal-footer px-4 pb-4">
          <button id="btn-submit-account" class="btn btn-success px-4 py-2 rounded-3">
            <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-account"></span>
            <span class="btn-text-account">Save</span>
          </button>
          <button class="btn btn-secondary px-4 py-2 rounded-3" type="button" data-bs-dismiss="modal" id="btn-cancel-account">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  $(document).ready(function () {
    $("#show-bothpassword").on("change", function () {
      const type = $(this).is(":checked") ? "text" : "password";
      $("#userpassword").attr("type", type);
    });
  });

    $("#frm-add-account").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-account");
        let $btnCancel = $("#btn-cancel-account");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-account");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var Username  = $("#username").val();
        var Password   = $("#userpassword").val();
        var Fullname  = $("#fullname").val();
        var Position  = $("#job_position").val();
        var Hotel       = $("#hotel").val();
        var AccountType  = $("#accountype").val();


        $.post("dirs/user_account/actions/save_account.php", {
            Username: Username,
            Password: Password,
            Fullname: Fullname,
            Position: Position,
            Hotel: Hotel,
            AccountType: AccountType,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                loadUserAccountManagemnet();
                $text.text("Save");
                $("#frm-add-account")[0].reset();
                $("#mdl-add-account").modal('hide');
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Account added.",
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