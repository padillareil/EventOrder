<form id="frm-add-food">
    <div class="modal fade" id="mdl-add-food" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">
                            New Food Package
                        </h5>

                        <p class="text-muted small mb-0">
                            Configure food package details and venue setup.
                        </p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label small fw-bold text-muted">
                                    Event Type
                                </label>
                                <input type="text" class="form-control rounded-3" name="eventtype" id="eventtype" list="eventtype-list" required>
                                <datalist id="eventtype-list">
                                    <option value="Meeting">
                                    <option value="Wedding">
                                    <option value="Birthday">
                                    <option value="Meeting">
                                    <option value="Christmas Party">
                                    <option value="Anniversary Party">
                                </datalist>
                                <small>Suitable for what kind of event ex.Wedding</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted mb-1">Tier</label>
                                <select class="form-select rounded-3 py-2 shadow-sm" id="function-tier" required>
                                    <option selected disabled></option>
                                    <option value="Basic">Basic</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Premium">Premium</option>
                                    <option value="VIP">VIP</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted mb-1">Service Type</label>
                                <select class="form-select rounded-3 py-2 shadow-sm" id="serving-type" required>
                                    <option selected disabled></option>
                                    <option value="Assisted-Buffet">Assisted-Buffet</option>
                                    <option value="Buffet Service">Buffet Service</option>
                                    <option value="Counter Service">Counter Service</option>
                                    <option value="Full Service">Full Service</option>
                                    <option value="Packed-Meal">Packed-Meal</option>
                                    <option value="Plated">Plated</option>
                                    <option value="Tray Service">Tray Service</option>
                                    <option value="Semi-Assisted Service">Semi-Assisted Service</option>
                                    <option value="Station Service">Station Service</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-muted">
                                    Instruction
                                </label>
                                <textarea class="form-control rounded-3" rows="2" name="food-description" id="food-description" required></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                            Capacity & Size
                        </h6>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    MinPax Capacity
                                </label>
                                <input type="number" class="form-control rounded-3" name="min-pax" id="min-pax" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    MaxPax Capacity
                                </label>
                                <input type="number" class="form-control rounded-3" name="max-pax" id="max-pax">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                            Food Setup
                        </h6>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    AM Snack
                                </label>
                                <input type="number" class="form-control rounded-3" name="am-snack" id="am-snack" required>
                                <!-- <small>Breakfast</small> -->
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    PM Snack
                                </label>
                                <input type="number" class="form-control rounded-3" name="pm-snack" id="pm-snack">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Lunch
                                </label>
                                <input type="number" class="form-control rounded-3" name="lunch" id="lunch">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Dinner
                                </label>
                                <input type="number" class="form-control rounded-3" name="dinner" id="dinner">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Beverage
                                </label>
                                <input type="number" class="form-control rounded-3" name="beverage" id="beverage">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FOOTER -->
                <div class="modal-footer border-0 px-4 pb-4">
                    <div class="d-flex justify-content-end gap-2 w-100">
                        <button id="btn-submit-food" class="btn btn-success shadow-sm" type="submit">
                            <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-food"></span>
                            <span class="btn-text-food">
                                Save
                            </span>
                        </button>
                        <button class="btn btn-secondary shadow-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-food">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    function formatInputNumber(number) {
        if (!number) return "";
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    var inputs = document.querySelectorAll(".number-format");
    inputs.forEach(input => {
        input.addEventListener("input", function (e) {
            let value = e.target.value;
            let numeric = value.replace(/\D/g, "");
            e.target.value = formatInputNumber(numeric);
        });
    });

    $("#frm-add-food").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-food");
        let $btnCancel = $("#btn-cancel-food");
        let $spinner = $("#btn-spinner-food");
        let $text = $btnSubmit.find(".btn-text-food");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var EventType  = $("#eventtype").val();
        var ServiceType  = $("#serving-type").val();
        var Tier  = $("#function-tier").val();
        var Description   = $("#food-description").val();
        var MinPax  = $("#min-pax").val();
        var MaxPax  = $("#max-pax").val();
        var AMSnack  = $("#am-snack").val();
        var PMSnack  = $("#pm-snack").val();
        var Lunch  = $("#lunch").val();
        var Dinner  = $("#dinner").val();
        var Bverage  = $("#beverage").val();

        $.post("dirs/master_settings/dirs/food_config/actions/save_food.php", {
            EventType: EventType,
            ServiceType: ServiceType,
            Tier: Tier,
            Description: Description,
            MinPax: MinPax,
            MaxPax: MaxPax,
            AMSnack : AMSnack,
            PMSnack: PMSnack,
            Lunch: Lunch,
            Dinner: Dinner,
            Bverage: Bverage
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $text.text("Save");
                $("#frm-add-food")[0].reset();
                $("#mdl-add-food").modal('hide');
                basicFunction_Tier();
                Premium_tier();
                Standard_tier();
                VIP_tier();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Food Package",
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

<!-- Modal review and actions -->
<div class="modal fade" id="mdl-review-function" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <p class="modal-title text-dark"><i class="bi bi-info-circle"></i> Food Package Info</p>
            </div>
            <div class="modal-body">
                <input type="hidden" id="function-id">
                <div class="mb-1 row">
                  <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Tier :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control-plaintext text-sm" id="func-tier"  readonly>
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Status :</label>
                  <div class="col-sm-6">
                    <div id="room-status"></div>
                    </div>
                </div>
                <div class="mb-1 row">
                  <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Event Type :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control-plaintext text-sm" id="food-eventtype"  readonly>
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Service Type :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control-plaintext text-sm" id="service-foodtype"  readonly>
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Minimum Pax :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control-plaintext text-sm" id="food-minpax"  readonly>
                  </div>
                </div>
                <div class="mb-1 row">
                    <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Maximum Pax :</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control-plaintext text-sm" id="food-maxpax"  readonly>
                    </div>
                </div>
                <div class="mb-1 row">
                  <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">AM Snack :</label>
                  <div class="col-sm-6">
                    <textarea class="form-control-plaintext text-sm" id="food-amsnack" readonly></textarea>
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">PM Snack :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control-plaintext text-sm" id="food-pmsnack"  readonly>
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Lunch :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control-plaintext text-sm" id="food-lunch"  readonly>
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Dinner :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control-plaintext text-sm" id="food-dinner"  readonly>
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Beverage :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control-plaintext text-sm" id="food-beverage"  readonly>
                  </div>
                </div>
                <div class="mb-1 row">
                  <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Reference Number :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control-plaintext text-sm" id="reference-number"  readonly>
                  </div>
                </div>
            </div>
            <div class="modal-footer border-0 px-4 pb-4">
                <div class="d-flex justify-content-center gap-2 w-100">
                    <button id="btn-update-function" class="btn btn-sm btn-primary" type="button" onclick="mdlFoodUpdate();">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-update"></span>
                        <span class="btn-text-function">
                           <i class="bi bi-pencil-square"></i> Update
                        </span>
                    </button>
                    <div class="dropdown">
                      <button id="btn-status-function" class="btn btn-sm btn-info shadow-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-status"></span>
                        <span class="btn-text-function">
                           <i class="bi bi-check2-circle"></i> Set Status
                        </span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" id="link-available" onclick="setAvailableFood()">Available</a></li>
                        <li><a class="dropdown-item" href="#" id="link-repair" onclick="setRepairFood()">Not Available</a></li>
                      </ul>
                    </div>
                    <button id="btn-delete-function" class="btn btn-sm btn-danger shadow-sm" type="button" onclick="packageDelete()">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-delete"></span>
                        <span class="btn-text-function">
                            <i class="bi bi-trash3"></i> Remove
                        </span>
                    </button>

                    <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-function">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Update Function Details -->
<form id="frm-reupdate-function">
    <div class="modal fade" id="mdl-reupdate-function" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">
                            Update Function Room
                        </h5>

                        <p class="text-muted small mb-0">
                            Configure function room details and venue setup.
                        </p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="food-id-package">
                    <div class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label small fw-bold text-muted">
                                    Event Type
                                </label>
                                <input type="text" class="form-control rounded-3" name="upd-eventtype" id="upd-eventtype" list="upd-eventtype-list" required>
                                <datalist id="upd-eventtype-list">
                                    <option value="Meeting">
                                    <option value="Wedding">
                                    <option value="Birthday">
                                    <option value="Meeting">
                                    <option value="Christmas Party">
                                    <option value="Anniversary Party">
                                </datalist>
                                <small>Suitable for what kind of event ex.Wedding</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted mb-1">Tier</label>
                                <select class="form-select rounded-3 py-2 shadow-sm" id="upd-function-tier" required>
                                    <option selected disabled></option>
                                    <option value="Basic">Basic</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Premium">Premium</option>
                                    <option value="VIP">VIP</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted mb-1">Service Type</label>
                                <select class="form-select rounded-3 py-2 shadow-sm" id="upd-serving-type" required>
                                    <option selected disabled></option>
                                    <option value="Assisted-Buffet">Assisted-Buffet</option>
                                    <option value="Buffet Service">Buffet Service</option>
                                    <option value="Counter Service">Counter Service</option>
                                    <option value="Full Service">Full Service</option>
                                    <option value="Packed-Meal">Packed-Meal</option>
                                    <option value="Plated">Plated</option>
                                    <option value="Tray Service">Tray Service</option>
                                    <option value="Semi-Assisted Service">Semi-Assisted Service</option>
                                    <option value="Station Service">Station Service</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-muted">
                                    Instruction
                                </label>
                                <textarea class="form-control rounded-3" rows="2" name="upd-food-description" id="upd-food-description" required></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                            Capacity & Size
                        </h6>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    MinPax Capacity
                                </label>
                                <input type="number" class="form-control rounded-3" name="upd-min-pax" id="upd-min-pax" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    MaxPax Capacity
                                </label>
                                <input type="number" class="form-control rounded-3" name="upd-max-pax" id="upd-max-pax">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                            Food Setup
                        </h6>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    AM Snack
                                </label>
                                <input type="number" class="form-control rounded-3" name="upd-am-snack" id="upd-am-snack" required>
                                <!-- <small>Breakfast</small> -->
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    PM Snack
                                </label>
                                <input type="number" class="form-control rounded-3" name="upd-pm-snack" id="upd-pm-snack">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Lunch
                                </label>
                                <input type="number" class="form-control rounded-3" name="upd-lunch" id="upd-lunch">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Dinner
                                </label>
                                <input type="number" class="form-control rounded-3" name="upd-dinner" id="upd-dinner">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Beverage
                                </label>
                                <input type="number" class="form-control rounded-3" name="upd-beverage" id="upd-beverage">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FOOTER -->
                <div class="modal-footer border-0 px-4 pb-4">
                    <div class="d-flex justify-content-end gap-2 w-100">
                        <button id="btn-update-function" class="btn btn-primary shadow-sm" type="submit">
                            <span class="btn-text-function-update">
                                Update
                            </span>
                            <span id="btn-spinner" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                        </button>

                        <button class="btn btn-secondary shadow-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $("#frm-reupdate-function").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-update-function");
        let $btnCancel = $("#btn-cancel");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-function-update");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DocEntry  = $("#food-id-package").val();
        var EventType  = $("#upd-eventtype").val();
        var ServiceType  = $("#upd-serving-type").val();
        var Tier  = $("#upd-function-tier").val();
        var Description   = $("#upd-food-description").val();
        var MinPax  = $("#upd-min-pax").val();
        var MaxPax  = $("#upd-max-pax").val();
        var AMSnack  = $("#upd-am-snack").val();
        var PMSnack  = $("#upd-pm-snack").val();
        var Lunch  = $("#upd-lunch").val();
        var Dinner  = $("#upd-dinner").val();
        var Bverage  = $("#upd-beverage").val();

        $.post("dirs/master_settings/dirs/food_config/actions/update_foodinfo.php", {
            DocEntry: DocEntry,
            EventType: EventType,
            ServiceType: ServiceType,
            Tier: Tier,
            Description: Description,
            MinPax: MinPax,
            MaxPax: MaxPax,
            AMSnack : AMSnack,
            PMSnack: PMSnack,
            Lunch: Lunch,
            Dinner: Dinner,
            Bverage: Bverage
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "success"){
                $text.text("Update");
                $("#frm-reupdate-function")[0].reset();
                $("#mdl-reupdate-function").modal('hide');
                basicFunction_Tier();
                Premium_tier();
                Standard_tier();
                VIP_tier();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "Food Setup updated",
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
