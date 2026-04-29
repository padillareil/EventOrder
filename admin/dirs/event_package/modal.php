<form id="frm-add-menupackage">
    <div class="modal fade" id="mdl-add-menupackage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="menupkg-title">New Event Package</h5>
                        <p class="text-muted small mb-0" id="menupkg-info">Add event package to list.</p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="menupkg-id">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label class="form-label fw-semibold text-dark small">Event Package No.</label>
                                <input type="text" class="form-control py-2 px-3 shadow-none" id="packagemenunumber" readonly>
                            </div>
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-dark small">Event Name (Package-Alias)</label>
                              <input type="text" class="form-control py-2 px-3 shadow-none" id="menupkg-name" required maxlength="50" autocomplete="off">
                              <small class="form-label">50 Maximum Characters</small>
                            </div>
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-dark small">Event Type</label>
                              <select class="form-select py-2 px-3" id="menupkg-category" required>
                                <option selected value="">---</option>
                                <option value="Associations Event">Associations Event</option>
                                <option value="Organization Event">Organization Event</option>
                                <option value="Corporate Event">Corporate Event</option>
                                <option value="Educational Event">Educational Event</option>
                                <option value="Government Event">Government Event</option>
                                <option value="Private Event">Private Event</option>
                                <option value="Health Care Event">Health Care Event</option>
                                <option value="Travel Tour Event">Travel Tour Event</option>
                              </select>
                            </div>
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-dark small">Package Tier</label>
                              <select class="form-select py-2 px-3" id="menupkg-packagetier" required>
                                <option selected value="Standard">Standard</option>
                                <option value="Basic">Basic</option>
                                <option value="Premium">Premium</option>
                              </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                      <label class="form-label fw-semibold text-dark small">Maximum Pax</label>
                                      <div class="input-group">
                                        <span class="input-group-text text-muted">₱</span>
                                        <input type="number" id="menupkg-pax-maximum" class="form-control py-2 shadow-none" placeholder="0" required>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                      <label class="form-label fw-semibold text-dark small">Minimum Pax</label>
                                      <div class="input-group">
                                        <span class="input-group-text text-muted">₱</span>
                                        <input type="number" id="menupkg-pax-minimum" class="form-control py-2 shadow-none" placeholder="0" required>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-dark small">Base Rate Per Pax</label>
                              <div class="input-group">
                                <span class="input-group-text text-muted">₱</span>
                                <input type="text" id="menupkg-pax-amount" class="form-control py-2 shadow-none number-format" placeholder="" required>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                      <label class="form-label fw-semibold text-dark small">Max. Budget</label>
                                      <div class="input-group">
                                        <span class="input-group-text text-muted">₱</span>
                                        <input type="text" id="menupkg-budget-maximum" class="form-control py-2 shadow-none" placeholder="0" required>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                      <label class="form-label fw-semibold text-dark small">Min. Budget</label>
                                      <div class="input-group">
                                        <span class="input-group-text text-muted">₱</span>
                                        <input type="text" id="menupkg-budget-minimum" class="form-control py-2 shadow-none" placeholder="0" required>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-dark small">Description</label>
                              <textarea class="form-control" id="menupkg-description" name="menupkg-description" maxlength="100" autocomplete="off"></textarea>
                              <small class="form-label">100 Maximum Characters</small>
                            </div>
                        </div>


                        <!-- Selection of food, Inclusiion, Venue quantity setup -->
                        <div class="col-md-6">
                            <div class="accordion accordion-flush" id="setupAccordion">

                                <!-- Food -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFood" onclick="openFoodSetup()">
                                            Food Package
                                        </button>
                                    </h2>

                                    <!-- ✅ removed data-bs-parent -->
                                    <div id="collapseFood" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                           <div class="small-box bg-dark shadow-sm cursor-pointer" id="food-package" onclick="openFoodSetup()">
                                               <div class="inner">
                                                   <h4 id="food_total_types">0</h4>
                                                   <p class="mb-0">Total Food Package</p>
                                                   <small>Tap to view cart and modify</small>
                                               </div>
                                               <div class="icon">
                                                   <i class="fas fa-box" id="cart-icon"></i>
                                               </div>
                                           </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Inclusion -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInclusion">
                                            Inclusion Package
                                        </button>
                                    </h2>

                                    <!-- ✅ removed data-bs-parent -->
                                    <div id="collapseInclusion" class="accordion-collapse collapse">
                                        <div class="accordion-body"> 
                                            <div class="col-12 mb-3">
                                                <div class="small-box bg-dark shadow-sm cursor-pointer">
                                                    <div class="inner">
                                                        <h4 id="food_total_types">26</h4>
                                                        <p class="mb-0">Total Inclusion Package</p>
                                                        <small>Tap to view cart and modify</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-box"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Venue -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVenue">
                                             Venue Package
                                        </button>
                                    </h2>

                                    <!-- ✅ removed data-bs-parent -->
                                    <div id="collapseVenue" class="accordion-collapse collapse">
                                        <div class="accordion-body"> <div class="overflow-auto" style="max-height: 40vh;">
                                            <div class="col-12 mb-3">
                                                <div class="small-box bg-dark shadow-sm cursor-pointer">
                                                    <div class="inner">
                                                        <h4 id="food_total_types">26</h4>
                                                        <p class="mb-0">Total Venue Package</p>
                                                        <small>Tap to view cart and modify</small>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-box"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>



                        
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-amenities" class="btn btn-success rounded-3 fs-6 shadow-sm py-2" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-amenities"></span>
                       <span class="btn-text-amenities">Save Setup</span>
                     </button>
                     <button id="btn-update-amenities" class="btn btn-success rounded-3 fs-6 shadow-sm py-2 d-none" type="button">
                       <span class="btn-text-amenities">Update</span>
                       <span id="btn-spinner-amenities-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  rounded-3 fs-6 shadow-sm py-2 btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-amenities">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $("#frm-add-menupackage").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-menupkg");
        let $btnCancel = $("#btn-cancel-menupkg");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-menupkg");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var Description  = $("#amenities-description").val();
        var Category   = $("#category-type").val();
        var Rental  = $("#amenities-rentalfee").val();
        var Corkage  = $("#amenities-corkagefee").val();
        var Notes  = $("#amenities-notes").val();

        $.post("dirs/amenities/actions/save_amenities.php", {
            Description: Description,
            Category: Category,
            Rental: Rental,
            Corkage: Corkage,
            Notes: Notes,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $text.text("Create Account");
                $("#frm-add-menupackage")[0].reset();
                $("#mdl-add-menupackage").modal('hide');
                loadAmenities();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Amenities added.",
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


      /*Function to edit inclusion*/ 
    $("#btn-update-amenities").on("click", function () {
        let $btnSubmit = $("#btn-update-amenities");
        let $spinner = $("#btn-spinner-amenities-upd");
        let $text = $btnSubmit.find(".btn-text-amenities");
        let $btnClose = $("#btn-cancel-amenities");

        var Vid = $("#menupkg-id").val();
        var Description = $("#amenities-description").val();
        var Category = $("#category-type").val();
        var Rental = $("#amenities-rentalfee").val();
        var Corkage = $("#amenities-corkagefee").val();
        var Note = $("#amenities-notes").val();


        $btnSubmit.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Updating...");
        $btnClose.prop("disabled", true);

        $.post("dirs/amenities/actions/update_menupkg.php", {

            Vid: Vid,
            Description: Description,
            Category: Category,
            Rental: Rental, 
            Corkage: Corkage,
            Note: Note,

        }, function (data) {

            $btnSubmit.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Updating...");
            $btnClose.prop("disabled", false);

            if ($.trim(data) === "success") {
                $text.text("Update");
                $("#frm-add-menupackage")[0].reset();
                $("#mdl-add-menupackage").modal("hide");
                loadAmenities();

                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "Successfully Updated",
                    showConfirmButton: false,
                    timer: 2000
                });

            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops!",
                    text: data
                });
            }
        });
    });

    /*Function show Food Package List*/
    function openFoodSetup() {
        const el = document.getElementById('mdl-menupackage-list');
        const offcanvas = new bootstrap.Offcanvas(el);
        offcanvas.show();
    }
</script>


