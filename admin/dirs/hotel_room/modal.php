<!-- Modal Hotel Form -->
<form id="frm-add-functionroom">
    <div class="modal fade" id="mdl-add-functionroom" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="functionroom-title">New Function Room</h5>
                        <p class="text-muted small mb-0" id="functionroom-info">Add a hotel function room to master data list.</p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="functionroom-id">
                    <div class="row g-3">
                        <div class="mb-2">
                          <label class="form-label fw-bold text-uppercase text-muted small">Function Room</label>
                          <input type="text" class="form-control" name="functionroom-name" id="functionroom-name" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Hotel Wing</label>
                            <input type="text" class="form-control" name="functionroom-hotelwing" id="functionroom-hotelwing" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Floor Level</label>
                            <input type="text" class="form-control" name="functionroom-floorlvl" id="functionroom-floorlvl" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">
                                    Max Capacity
                                </label>
                                <input type="number" class="form-control" name="functionroom-maxcapacity" id="functionroom-maxcapacity" required
                                >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">
                                    Unit of Measurement
                                </label>
                                <select class="form-select" id="unit-of-measurement" required>
                                    <option value="" disabled selected>---</option>
                                    <option value="Pax">Pax</option>
                                    <option value="Seats">Seats</option>
                                    <option value="Tables">Tables</option>
                                    <option value="Sqm">Square Meters</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2">
                          <label class="form-label fw-semibold text-dark small">Rental Fee</label>
                          <div class="input-group">
                            <span class="input-group-text text-muted">₱</span>
                            <input type="number" id="functionroom-price" class="form-control py-2 shadow-none" placeholder="0.00" required>
                          </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Note</label>
                            <textarea class="form-control" id="functionroom-note" name="functionroom-note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-functionroom" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-functionroom"></span>
                       <span class="btn-text-functionroom">Save</span>
                     </button>
                     <button id="btn-update-functionroom" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-functionroom">Update</span>
                       <span id="btn-spinner-functionroom-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-functionroom">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $("#frm-add-functionroom").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-functionroom");
        let $btnCancel = $("#btn-cancel-functionroom");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-functionroom");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var Functionroom  = $("#functionroom-name").val();
        var Wing   = $("#functionroom-hotelwing").val();
        var FloorLvl  = $("#functionroom-floorlvl").val();
        var Capacity  = $("#functionroom-maxcapacity").val();
        var Uom  = $("#unit-of-measurement").val();
        var RentalFee  = $("#functionroom-price").val();
        var Note  = $("#functionroom-note").val();


        $.post("dirs/hotel_room/actions/save_hotel_room.php", {
            Functionroom: Functionroom,
            Wing: Wing,
            FloorLvl: FloorLvl,
            Capacity: Capacity,
            Uom: Uom,
            RentalFee: RentalFee,
            Note: Note,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $text.text("Create Function Room");
                $("#frm-add-functionroom")[0].reset();
                $("#mdl-add-functionroom").modal('hide');
                loadFunctionRoom();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Function room added.",
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


<!-- Modal Hotel Function Partition rooms -->
    <div class="modal fade" id="mdl-partition-rooms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="functionroom-title">Jade Ballroom</h5>
                        <p class="text-muted small mb-0" id="functionroom-info">Partition room lists.</p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="table-responsive overflow-auto" style="height: 50vh;">
                               <table class="table table-hover align-middle mb-0">
                                   <thead class="sticky-top bg-white border-bottom" style="z-index: 5;">
                                       <tr>
                                           <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted" style="width: 80px;">#</th>
                                           <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Room</th>
                                           <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Wing</th>
                                           <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Floor</th>
                                           <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Capacity</th>
                                           <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Rent Fee</th>
                                           <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center pe-4">Actions</th>
                                       </tr>
                                   </thead>
                                   <tbody class="border-top-0" id="load_PArtition_rooms">
                                    <tr>
                                        <td class="ps-4 fw-semibold">1</td>
                                        <td>Jade 2A</td>
                                        <td>East Wing</td>
                                        <td>2nd Floor</td>
                                        <td>120 Pax</td>
                                        <td>₱35,000.00</td>
                                        <td class="text-center pe-4">
                                            <button class="btn btn-link me-1" type="button" title="Edit"aria-label="Edit"><i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button class="btn btn-link" type="button"  title="Delete"aria-label="Delete"><i class="bi bi-trash text-danger"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="ps-4 fw-semibold">2</td>
                                        <td>Jade 2B</td>
                                        <td>East Wing</td>
                                        <td>2nd Floor</td>
                                        <td>120 Pax</td>
                                        <td>₱35,000.00</td>
                                        <td class="text-center pe-4">
                                            <button class="btn btn-link me-1" type="button" title="Edit"aria-label="Edit"><i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button class="btn btn-link" type="button"  title="Delete"aria-label="Delete"><i class="bi bi-trash text-danger"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="ps-4 fw-semibold">3</td>
                                        <td>Jade 2C</td>
                                        <td>East Wing</td>
                                        <td>2nd Floor</td>
                                        <td>60 Pax</td>
                                        <td>₱20,000.00</td>
                                        <td class="text-center pe-4">
                                            <button class="btn btn-link me-1" type="button" title="Edit"aria-label="Edit"><i class="bi bi-pencil-square"></i>
                                            </button>

                                            <button class="btn btn-link" type="button"  title="Delete"aria-label="Delete"><i class="bi bi-trash text-danger"></i>
                                            </button>
                                        </td>
                                    </tr>
                                   </tbody>
                               </table>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-submit-account" class="btn btn-success btn-lg rounded-3 fs-6 shadow-sm py-2" type="button" onclick="addParition()">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-account"></span>
                        <span class="btn-text-account">Create Partition</span>
                    </button>
                    <button id="btn-cancel-functionroom" class="btn btn-secondary btn-lg rounded-3 fs-6 shadow-sm py-2" type="button" data-bs-dismiss="modal">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-account"></span>
                        <span class="btn-text-account">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        /*Function add room partiion*/
        function addParition() {
            $("#mdl-partition-addrooms").modal('show');
        }
    </script>


<!-- Modal to add partition for specific function room -->
<form id="frm-add-parition">
    <div class="modal fade" id="mdl-partition-addrooms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="functionroom-title">Add New Partition Room</h5>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <div class="mb-2">
                      <label class="form-label fw-bold text-uppercase text-muted small">Room</label>
                      <input type="text" class="form-control" name="paritionroom-name" id="paritionroom-name" required>
                    </div>
                    <div class="mb-2">
                      <label class="form-label fw-bold text-uppercase text-muted small">Floor</label>
                      <input type="text" class="form-control" name="paritionroom-floor" id="paritionroom-floor" required>
                    </div>
                    <div class="mb-2">
                      <label class="form-label fw-bold text-uppercase text-muted small">Max Capacity</label>
                      <input type="text" class="form-control" name="paritionroom-capacity" id="paritionroom-capacity" required>
                    </div>
                    <div class="mb-2">
                      <label class="form-label fw-bold text-uppercase text-muted small">Rental Fee</label>
                      <input type="number" class="form-control" name="paritionroom-rentalfee" id="paritionroom-rentalfee" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-submit-account" class="btn btn-success btn-lg rounded-3 fs-6 shadow-sm py-2" type="button" onclick="addParition()">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-account"></span>
                        <span class="btn-text-account">Save</span>
                    </button>
                    <button id="btn-update-account" class="btn btn-success btn-lg rounded-3 d-none fs-6 shadow-sm py-2" type="button">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-account"></span>
                        <span class="btn-text-account">Update</span>
                    </button>
                    <button id="btn-cancel-functionroom" class="btn btn-secondary btn-lg rounded-3 fs-6 shadow-sm py-2" type="button" data-bs-dismiss="modal">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-account"></span>
                        <span class="btn-text-account">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>