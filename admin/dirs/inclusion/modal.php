<!-- Modal Inclusion Form -->
<form id="frm-add-inclusion">
    <div class="modal fade" id="mdl-add-inclusion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="inclusion-title">New Event Inclusion</h5>
                        <p class="text-muted small mb-0" id="inclusion-info">Add a inclusion to master data list.</p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="inclusion-id">
                    <div class="row g-3">
                        

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control bg-light" name="inclusion-description" id="inclusion-description" rows="2" maxlength="500" required></textarea>
                            <div class="form-text small">Max 500 Characters.</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Inclusion Type</label>
                            <select class="form-select py-2 px-3" id="inclusion-type" required>
                                <option selected disabled>---</option>
                                <option value="Fixed">Fixed</option>
                                <option value="Optional">Optional</option>


                            </select>
                        </div>
                        <div class="mb-2">
                          <label class="form-label fw-bold text-uppercase text-muted small">Category</label>
                          <select class="form-select py-2 px-3" id="item-category" required>
                          </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Quantity</label>
                            <input type="number" class="form-control" name="inclusion-quantity" id="inclusion-quantity" required>
                        </div>

                        <div class="mb-2">
                          <label class="form-label fw-semibold text-dark small">Price</label>
                          <div class="input-group">
                            <span class="input-group-text text-muted">₱</span>
                            <input type="number" id="inclusion-price" class="form-control py-2 shadow-none" placeholder="0.00" required>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-inclusion" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-inclusion"></span>
                       <span class="btn-text-inclusion">Save</span>
                     </button>
                     <button id="btn-update-inclusion" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-inclusion">Update</span>
                       <span id="btn-spinner-inclusion-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-inclusion">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-inclusion").on("click", function() {
        $("#btn-update-inclusion").addClass('d-none');
    });

    $("#frm-add-inclusion").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-inclusion");
        let $btnCancel = $("#btn-cancel-inclusion");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-inclusion");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var Description  = $("#inclusion-description").val();
        var Type   = $("#inclusion-type").val();
        var Category  = $("#item-category").val();
        var Quantity   = $("#inclusion-quantity").val();
        var Price  = $("#inclusion-price").val();

        $.post("dirs/inclusion/actions/save_inclusion.php", {
            Description: Description,
            Type: Type,
            Category: Category,
            Quantity: Quantity,
            Price: Price
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-inclusion")[0].reset();
                $("#mdl-add-inclusion").modal('hide');
                // loadinclusions(CurrentPage - 1);
                loadVenueInclusion();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Event Inclusion",
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

<!-- Inclusion View Details review content only-->
<div class="modal fade" id="mdl-view-inclusion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-start">
                <div>
                    <h5 class="modal-title fw-bold text-dark mb-0">Inclusion Summary</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="review-inclusion">
            </div>
           
        </div>
    </div>
</div>



<!-- Modal Inclusion Form -->
<form id="frm-add-custom">
    <div class="modal fade" id="mdl-add-custom" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="custom-title">New Custom Inclusion</h5>
                        <p class="text-muted small mb-0" id="custom-info">Add custom inclusion to sub contracted services list.</p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="custom-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold small text-muted text-uppercase">Description</label>
                            <textarea class="form-control" name="custom-description" id="custom-description" rows="2" required></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-muted text-uppercase">Vendor / Supplier</label>
                            <input type="text" class="form-control" id="custom-vendor" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-muted text-uppercase">Inclusion Type</label>
                            <select class="form-select" id="custom-type" required>
                                <option selected disabled value="">---</option>
                                <option value="Fixed">Fixed</option>
                                <option value="Optional">Optional</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-muted text-uppercase">Category</label>
                            <select class="form-select" id="category-custom" required>
                                </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-muted text-uppercase">Quantity</label>
                            <input type="number" class="form-control" id="custom-quantity" value="1" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-muted text-uppercase">Unit Cost</label>
                            <div class="input-group">
                                <span class="input-group-text">₱</span>
                                <input type="number" id="custom-cost" class="form-control" placeholder="0.00">
                            </div>
                            <div class="form-text mt-1" style="font-size: 0.75rem;">Hotel's cost from vendor</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-muted text-uppercase">Selling Price</label>
                            <div class="input-group">
                                <span class="input-group-text">₱</span>
                                <input type="number" id="custom-price" class="form-control" placeholder="0.00" required>
                            </div>
                            <small>Amount charged to client</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-custom" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-custom"></span>
                       <span class="btn-text-custom">Save</span>
                     </button>
                     <button id="btn-update-custom" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-custom">Update</span>
                       <span id="btn-spinner-custom-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-custom">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-custom").on("click", function() {
        $("#btn-update-custom").addClass('d-none');
    });

    $("#frm-add-custom").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-custom");
        let $btnCancel = $("#btn-cancel-custom");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-custom");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var Description  = $("#custom-description").val();
        var Vendor   = $("#custom-vendor").val();
        var Type   = $("#custom-type").val();
        var Category  = $("#category-custom").val();
        var Quantity   = $("#custom-quantity").val();
        var UnitCost  = $("#custom-cost").val();
        var SellingPrice  = $("#custom-price").val();


        $.post("dirs/inclusion/actions/save_custom_inclusion.php", {
            Description: Description,
            Vendor:Vendor,
            Type: Type,
            Category: Category,
            Quantity: Quantity,
            UnitCost: UnitCost,
            SellingPrice: SellingPrice
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-custom")[0].reset();
                $("#mdl-add-custom").modal('hide');
                loadCustomServices();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Custom Inclusion",
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


<!-- Custom Inclusion review Details review content only-->
<div class="modal fade" id="mdl-view-custominclusion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-start">
                <div>
                    <h5 class="modal-title fw-bold text-dark mb-0">Sub-Contracted Summary</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="review-custominclusion">
            </div>
           
        </div>
    </div>
</div>