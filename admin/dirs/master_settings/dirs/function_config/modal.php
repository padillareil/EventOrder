<form id="frm-add-function">
    <div class="modal fade" id="mdl-add-function" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">
                            New Function Room
                        </h5>

                        <p class="text-muted small mb-0">
                            Configure function room details and venue setup.
                        </p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Hotel / Property
                                </label>
                                <input type="text" class="form-control rounded-3" name="hotel" id="hotel" required>
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
                                <label class="form-label small fw-bold text-muted">
                                    Function Room Name
                                </label>

                                <input type="text" class="form-control rounded-3" name="function-room" id="function-room" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Wing / Floor
                                </label>

                                <input type="text" class="form-control rounded-3" name="function-wing" id="function-wing">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Venue Type
                                </label>

                                <input type="text" class="form-control rounded-3" name="function-venue" id="function-venue" list="venue-list" required>
                                <datalist id="venue-list">
                                    <option value="Ballroom">
                                    <option value="Conference Room">
                                    <option value="Meeting Room">
                                    <option value="Garden Venue">
                                    <option value="Rooftop">
                                    <option value="Poolside">
                                    <option value="Pavilion">
                                    <option value="Hall">
                                </datalist>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">
                                    Rental Fee
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        ₱
                                    </span>
                                    <input type="text" class="form-control number-format" name="rental-fee" id="rental-fee" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-bold text-muted">
                                    Complete Address / Location
                                </label>
                                <textarea class="form-control rounded-3" rows="2" name="hotel-location" id="hotel-location" required></textarea>
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
                                    Pax Capacity
                                </label>
                                <input type="number" class="form-control rounded-3" name="function-capacity" id="function-capacity" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Chair Capacity
                                </label>
                                <input type="number" class="form-control rounded-3" name="chair-capacity" id="chair-capacity">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Table Capacity
                                </label>
                                <input type="number" class="form-control rounded-3" name="table-capacity" id="table-capacity">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Room Size
                                </label>

                                <div class="input-group">
                                    <input type="number" class="form-control" name="room-size" id="room-size" >
                                    <span class="input-group-text">
                                        sqm
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FOOTER -->
                <div class="modal-footer border-0 px-4 pb-4">
                    <div class="d-flex justify-content-end gap-2 w-100">
                        <button id="btn-submit-function" class="btn btn-success shadow-sm" type="submit">
                            <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-function"></span>
                            <span class="btn-text-function">
                                Save
                            </span>
                        </button>
                        <button class="btn btn-secondary shadow-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-function">
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

    $("#frm-add-function").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-function");
        let $btnCancel = $("#btn-cancel-function");
        let $spinner = $("#btn-spinner-function");
        let $text = $btnSubmit.find(".btn-text-function");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var Property  = $("#hotel").val();
        var Tier  = $("#function-tier").val();
        var Functionroom   = $("#function-room").val();
        var WingFloor  = $("#function-wing").val();
        var VenueType  = $("#function-venue").val();
        var RentalFee  = $("#rental-fee").val();
        var HotelAddress  = $("#hotel-location").val();
        var PaxCapacity  = $("#function-capacity").val();
        var ChairCapacity  = $("#chair-capacity").val();
        var TableCapacity  = $("#table-capacity").val();
        var Roomsize  = $("#room-size").val();

        $.post("dirs/master_settings/dirs/function_config/actions/save_functions.php", {
            Property: Property,
            Tier: Tier,
            Functionroom: Functionroom,
            WingFloor: WingFloor,
            HotelAddress : HotelAddress,
            VenueType: VenueType,
            RentalFee: RentalFee,
            PaxCapacity: PaxCapacity,
            ChairCapacity: ChairCapacity,
            TableCapacity: TableCapacity,
            Roomsize: Roomsize,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $text.text("Create Account");
                $("#frm-add-function")[0].reset();
                $("#mdl-add-function").modal('hide');
                basicFunction_Tier();
                Premium_tier();
                Standard_tier();
                VIP_tier();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Function",
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
<form id="frm-update-function">
    <div class="modal fade" id="mdl-review-function" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <p class="modal-title text-dark"><i class="bi bi-info-circle"></i> Function Info</p>
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
                      <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Wing :</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control-plaintext text-sm" id="func-wing"  readonly>
                      </div>
                    </div>
                    <div class="mb-1 row">
                      <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Venue :</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control-plaintext text-sm" id="func-venue"  readonly>
                      </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Hotel :</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control-plaintext text-sm" id="hotel-rev-name"  readonly>
                        </div>
                    </div>
                    <div class="mb-1 row">
                      <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Address :</label>
                      <div class="col-sm-6">
                        <textarea class="form-control-plaintext text-sm" id="property-address" readonly></textarea>
                      </div>
                    </div>
                    <div class="mb-1 row">
                      <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Function :</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control-plaintext text-sm" id="function-name"  readonly>
                      </div>
                    </div>
                    <div class="mb-1 row">
                      <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Room size :</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control-plaintext text-sm" id="func-room"  readonly>
                      </div>
                    </div>
                     <div class="mb-1 row">
                      <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Rental Fee :</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control-plaintext text-sm" id="func-rent"  readonly>
                      </div>
                    </div>
                    <div class="mb-1 row">
                      <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Pax Capacity :</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control-plaintext text-sm" id="func-pax"  readonly>
                      </div>
                    </div>
                    <div class="mb-1 row">
                      <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Chair Capacity :</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control-plaintext text-sm" id="func-chair"  readonly>
                      </div>
                    </div>
                    <div class="mb-1 row">
                      <label for="arrears" class="col-sm-6 col-form-label text-end text-sm">Table Capacity :</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control-plaintext text-sm" id="func-table"  readonly>
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
                        <button id="btn-update-function" class="btn btn-sm btn-primary" type="button" onclick="mdlFunctionUpdate();">
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
                            <li><a class="dropdown-item" href="#" id="link-available" onclick="setAvailable()">Available</a></li>
                            <li><a class="dropdown-item" href="#" id="link-repair" onclick="setRepair()">Under Maintenance</a></li>
                          </ul>
                        </div>
                        <button id="btn-delete-function" class="btn btn-sm btn-danger shadow-sm" type="button" onclick="functionDelete()">
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
</form>



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
                    <input type="hidden" id="function-upd-id">
                    <div class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Hotel / Property
                                </label>
                                <input type="text" class="form-control rounded-3" name="update-hotel" id="update-hotel" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted mb-1">Tier</label>
                                <select class="form-select rounded-3 py-2 shadow-sm" id="update-function-tier" required>
                                    <option selected disabled></option>
                                    <option value="Basic">Basic</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Premium">Premium</option>
                                    <option value="VIP">VIP</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Function Room Name
                                </label>

                                <input type="text" class="form-control rounded-3" name="update-function-room" id="update-function-room" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Wing / Floor
                                </label>

                                <input type="text" class="form-control rounded-3" name="update-function-wing" id="update-function-wing">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Venue Type
                                </label>

                                <input type="text" class="form-control rounded-3" name="update-function-venue" id="update-function-venue" list="update-venue-list" required>
                                <datalist id="update-venue-list">
                                    <option value="Ballroom">
                                    <option value="Conference Room">
                                    <option value="Meeting Room">
                                    <option value="Garden Venue">
                                    <option value="Rooftop">
                                    <option value="Poolside">
                                    <option value="Pavilion">
                                    <option value="Hall">
                                </datalist>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-muted">
                                    Rental Fee
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        ₱
                                    </span>
                                    <input type="text" class="form-control number-format" name="update-rental-fee" id="update-rental-fee" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-bold text-muted">
                                    Complete Address / Location
                                </label>
                                <textarea class="form-control rounded-3" rows="2" name="update-hotel-location" id="update-hotel-location" required></textarea>
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
                                    Pax Capacity
                                </label>
                                <input type="number" class="form-control rounded-3" name="update-function-capacity" id="update-function-capacity" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Chair Capacity
                                </label>
                                <input type="number" class="form-control rounded-3" name="update-chair-capacity" id="update-chair-capacity">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Table Capacity
                                </label>
                                <input type="number" class="form-control rounded-3" name="update-table-capacity" id="update-table-capacity">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">
                                    Room Size
                                </label>

                                <div class="input-group">
                                    <input type="number" class="form-control" name="update-room-size" id="update-room-size" >
                                    <span class="input-group-text">
                                        sqm
                                    </span>
                                </div>
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

        var DocEntry  = $("#function-upd-id").val();
        var Property  = $("#update-hotel").val();
        var Tier  = $("#update-function-tier").val();
        var Functionroom   = $("#update-function-room").val();
        var WingFloor  = $("#update-function-wing").val();
        var VenueType  = $("#update-function-venue").val();
        var RentalFee  = $("#update-rental-fee").val();
        var HotelAddress  = $("#update-hotel-location").val();
        var PaxCapacity  = $("#update-function-capacity").val();
        var ChairCapacity  = $("#update-chair-capacity").val();
        var TableCapacity  = $("#update-table-capacity").val();
        var Roomsize  = $("#update-room-size").val();

        $.post("dirs/master_settings/dirs/function_config/actions/update_functioninfo.php", {
            DocEntry: DocEntry,
            Property: Property,
            Tier: Tier,
            Functionroom: Functionroom,
            WingFloor: WingFloor,
            HotelAddress : HotelAddress,
            VenueType: VenueType,
            RentalFee: RentalFee,
            PaxCapacity: PaxCapacity,
            ChairCapacity: ChairCapacity,
            TableCapacity: TableCapacity,
            Roomsize: Roomsize,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "success"){
                $text.text("Create Account");
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
                    title: "Function updated",
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