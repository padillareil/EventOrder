<!-- Modal Create Account Form -->
<form id="frm-add-account">
    <div class="modal fade" id="mdl-add-account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="modal-title fw-bold text-dark">Account Registration</h5>
                            <p class="text-muted small mb-0">Fill in the details to create a new access account.</p>
                        </div>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="appetizer-id">
                    
                    <div class="d-flex flex-column gap-3">
                        
                        <div>
                            <label class="form-label small fw-bold text-uppercase text-muted mb-1">Username</label>
                            <div class="input-group border rounded-3 overflow-hidden">
                                <span class="input-group-text border-0 bg-light"><i class="bi bi-at text-muted"></i></span>
                                <input type="text" class="form-control border-0 shadow-none py-2" name="user-name" id="user-name" required maxlength="100">
                            </div>
                        </div>

                        <div>
                            <label class="form-label small fw-bold text-uppercase text-muted mb-1">Password</label>
                            <div class="input-group border rounded-3 overflow-hidden">
                                <input type="password" class="form-control border-0 shadow-none py-2" name="user-password" id="user-password" required maxlength="100">
                                <span class="input-group-text border-0 bg-light" style="cursor:pointer;">
                                    <i class="bi bi-eye text-muted" id="togglePassword"></i>
                                </span>
                            </div>
                        </div>

                        <hr class="my-2 opacity-50">

                        <div>
                            <label class="form-label small fw-bold text-uppercase text-muted mb-1">Fullname</label>
                            <input type="text" class="form-control rounded-3 py-2" name="user-fullname" id="user-fullname" required>
                        </div>

                        <div>
                            <label class="form-label small fw-bold text-uppercase text-muted mb-1">Position</label>
                            <input type="text" class="form-control rounded-3 py-2" name="user-position" id="user-position" required>
                        </div>

                        <div>
                            <label class="form-label small fw-bold text-uppercase text-muted mb-1">Account Role</label>
                            <select class="form-select rounded-3 py-2 shadow-sm" id="user-accountrole" required>
                                <option selected disabled value="">---</option>
                                <option value="Admin">System Admin</option>
                                <option value="Audit">Audit</option>
                                <option value="Accounting Admin">Accounting Admin</option>
                                <option value="Account Manager">Account Manager</option>
                                <option value="Accounting Staff">Accounting Staff</option>
                                <option value="Banquet Coordinator">Banquet Coordinator</option>
                                <option value="Billing Officer">Billing Officer</option>
                                <option value="Event Coordinator">Event Coordinator</option>
                                <option value="Housekeeping">Housekeeping</option>
                                <option value="Operation Manager">Operation Manager</option>
                                <option value="Sales Manager">Sales Manager</option>
                                <option value="Sales Executive">Sales Executive</option>
                                <option value="Reservation Officer">Reservation Officer</option>
                                <option value="Production">Production</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="modal-footer border-0 p-4 pt-0">
                        <button id="btn-submit-account" class="btn btn-success btn-lg rounded-3 fs-6 shadow-sm py-2" type="submit">
                            <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-account"></span>
                            <span class="btn-text-account">Create Account</span>
                        </button>
                        
                        <button id="btn-update-account" class="btn btn-success btn-lg rounded-3 fs-6 shadow-sm py-2 d-none" type="button">
                            <span class="btn-text-account">Update Account</span>
                            <span id="btn-spinner-account-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                        </button>

                        <button class="btn btn-light text-muted btn-sm border-0 mt-1" data-bs-dismiss="modal" type="reset" id="btn-cancel-account">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $("#togglePassword").on("click", function () {
        const input = $("#user-password");
        const type = input.attr("type") === "password" ? "text" : "password";
        input.attr("type", type);
        $(this).toggleClass("bi-eye bi-eye-slash");
    });
    /*Function remove update button when closing*/
    $("#btn-cancel-account").on("click", function() {
        $("#btn-update-account").addClass('d-none');
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

        var Username  = $("#user-name").val();
        var Password   = $("#user-password").val();
        var Fullname  = $("#user-fullname").val();
        var Position  = $("#user-position").val();
        var Role  = $("#user-accountrole").val();

        $.post("dirs/useraccounts/actions/save_account.php", {
            Username: Username,
            Password: Password,
            Fullname: Fullname,
            Position: Position,
            Role: Role,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $text.text("Create Account");
                $("#frm-add-account")[0].reset();
                $("#mdl-add-account").modal('hide');
                loadUserAccounts();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New User Account",
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



<!-- Modal View and Apply User account Settings Form -->
<form id="frm-account-settings">
    <div class="modal fade" id="mdl-account-settings" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg">
                
                <div class="modal-header border-0 pt-4 px-4 pb-0">
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h5 class="modal-title fw-bolder text-dark">Account Calibration</h5>
                            <button type="button" class="btn-close small" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <p class="text-muted small">Manage user identity and system-wide access permissions.</p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="account-id">

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="pe-md-3">
                                <label class="section-label">General Information</label>
                                
                                <div class="mb-3">
                                    <label class="input-label text-muted">Full name</label>
                                    <input type="text" class="form-control minimal-input" id="sett-fullname"  required>
                                </div>

                                <div class="mb-3">
                                    <label class="input-label text-muted">Usercode</label>
                                    <input type="text" class="form-control minimal-input fw-bold" id="sett-usercode" >
                                </div>
                                <div class="mb-3">
                                    <label class="input-label text-muted">Username</label>
                                    <input type="text" class="form-control minimal-input" id="sett-username" required>
                                </div>

                                <div class="mb-3">
                                    <label class="input-label text-muted">Position</label>
                                    <input type="text" class="form-control minimal-input" id="sett-position">
                                </div>

                                <button class="btn btn-link" type="button" id="btn-action-change">Edit</button>
                            </div>
                        </div>

                        <div class="col-md-6 border-start">
                            <div class="ps-md-3">
                                <label class="section-label">Account Level</label>
                                
                                <div class="access-scroll-zone">
                                    <div class="access-item">
                                        <div class="form-check custom-check">
                                            <input class="form-check-input" type="checkbox" id="role-admin" value="Admin">
                                            <label class="form-check-label ms-2" for="role-admin">System Administrator</label>
                                        </div>
                                    </div>

                                    <div class="access-item">
                                        <div class="form-check custom-check">
                                            <input class="form-check-input" type="checkbox" id="role-audit" value="Audit">
                                            <label class="form-check-label ms-2" for="role-audit">Audit</label>
                                        </div>
                                    </div>

                                    <div class="access-item">
                                        <div class="form-check custom-check">
                                            <input class="form-check-input" type="checkbox" id="role-accounting" value="Accounting Admin">
                                            <label class="form-check-label ms-2" for="role-accounting">Accounting Admin</label>
                                        </div>
                                    </div>

                                    <div class="access-item">
                                        <div class="form-check custom-check">
                                            <input class="form-check-input" type="checkbox" id="role-sales" value="Sales Manager">
                                            <label class="form-check-label ms-2" for="role-sales">Sales Manager</label>
                                        </div>
                                    </div>

                                    <div class="access-item">
                                        <div class="form-check custom-check">
                                            <input class="form-check-input" type="checkbox" id="role-reservation" value="Reservation Officer">
                                            <label class="form-check-label ms-2" for="role-reservation">Reservation Officer</label>
                                        </div>
                                    </div>

                                    <div class="access-item">
                                        <div class="form-check custom-check">
                                            <input class="form-check-input" type="checkbox" id="role-event" value="Event Coordinator">
                                            <label class="form-check-label ms-2" for="role-event">Event Coordinator</label>
                                        </div>
                                    </div>

                                    <div class="access-item">
                                        <div class="form-check custom-check">
                                            <input class="form-check-input" type="checkbox" id="role-production" value="Production">
                                            <label class="form-check-label ms-2" for="role-production">Production</label>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-6 border-start">
                            <div class="ps-md-3">
                                <label class="section-label">System Access</label>
                                
                                <div class="access-scroll-zone">
                                    <div class="access-item">
                                        <div class="form-check custom-check">
                                            <input class="form-check-input" type="checkbox" id="role-admin" value="Admin">
                                            <label class="form-check-label ms-2" for="role-admin">Block</label>
                                        </div>
                                    </div>

                                    <div class="access-item">
                                        <div class="form-check custom-check">
                                            <input class="form-check-input" type="checkbox" id="role-audit" value="Audit">
                                            <label class="form-check-label ms-2" for="role-audit">Unblock</label>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 p-4 bg-light bg-opacity-50">
                    <button class="btn btn-link text-muted text-decoration-none small me-auto" data-bs-dismiss="modal">Cancel</button>
                    <button id="btn-update-account" class="btn btn-success px-4 py-2 rounded-3 shadow-sm" type="button">
                        <span class="btn-text-account">Apply Changes</span>
                        <span id="btn-spinner-account-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

