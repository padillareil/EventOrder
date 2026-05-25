<!-- Form Wrapper -->
<form id="frm-add-inclusion">
    <div class="modal fade" id="mdl-add-inclusion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4">
                
                <!-- HEADER -->
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Inclusion Package</h5>
                        <p class="text-muted small mb-0">Configure inclusion package details for event setup.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body p-4">
                    <!-- Basic Information Section -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted">Event Type</label>
                            <input type="text" class="form-control rounded-3" name="eventtype" id="eventtype" list="eventtype-list" placeholder="e.g. Wedding" required>
                            <datalist id="eventtype-list">
                                <option value="Meeting">
                                <option value="Wedding">
                                <option value="Birthday">
                                <option value="Christmas Party">
                                <option value="Anniversary Party">
                            </datalist>
                        </div>
                        
                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-muted">Tier</label>
                            <select class="form-select rounded-3" name="function-tier" id="function-tier" required>
                                <option selected disabled></option>
                                <option value="Basic">Basic</option>
                                <option value="Standard">Standard</option>
                                <option value="Premium">Premium</option>
                                <option value="VIP">VIP</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-muted">Total Cost</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">₱</span>
                                <input type="text" class="form-control rounded-3 border-start-0 number-format" name="total-packagecost" id="total-packagecost" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Special Instructions</label>
                            <textarea class="form-control rounded-3" rows="2" name="package-description" id="package-description" placeholder="Any specific setup instructions..." required></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Terms & Conditions</label>
                            <textarea class="form-control rounded-3" rows="2" name="terms-condition" id="terms-condition" required></textarea>
                        </div>
                    </div>

                    <!-- Dynamic Inclusions Section -->
                    <div class="border-top pt-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-bold text-dark mb-0">Items & Inclusions</h6>
                            <button class="btn btn-sm btn-primary shadow-sm" type="button" onclick="addInclusion()">
                                <i class="bi bi-plus-lg"></i> Add Item
                            </button>
                        </div>

                        <!-- Scrollable Container for Widgets -->
                        <div class="overflow-auto px-1" style="max-height: 40vh; min-height: 100px;">
                            <div id="display-package-inclusions" class="d-grid gap-2">
                                <!-- Dynamic rows appear here -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FOOTER -->
                <div class="modal-footer border-0 px-4 pb-4">
                    <button id="btn-submit-package" class="btn btn-success shadow-sm px-4" type="submit">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-package"></span>
                        <span class="btn-text-package">Save</span>
                    </button>
                    <button class="btn btn-secondary shadow-sm px-4" data-bs-dismiss="modal" type="reset" id="btn-cancel-package">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Widget Template -->
<template id="inclusion-row-template">
    <div class="card border-0 shadow-sm p-2 bg-light inclusion-item animate__animated animate__fadeInUp">
        <div class="row g-2 align-items-center">
            <div class="col-md-8">
                <input type="text" name="inclusion_description[]" class="form-control form-control-sm border-primary" required>
            </div>
            <div class="col-md-3">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-transparent border-0 text-muted">Qty</span>
                    <input type="number" name="inclusion_qty[]" class="form-control border-primary" value="1" required>
                </div>
            </div>
            <div class="col-md-1 text-end">
                <button type="button" class="btn btn-link text-danger p-0" onclick="removeInclusion(this)">
                    <i class="bi bi-trash3"></i>
                </button>
            </div>
        </div>
    </div>
</template>




<script>

    // Function to add a new inclusion widget
    function addInclusion() {
        const template = document.getElementById('inclusion-row-template');
        const displayContainer = document.getElementById('display-package-inclusions');
        
        // Clone and append
        const clone = template.content.cloneNode(true);
        displayContainer.appendChild(clone);
    }

    // Function to remove the specific widget
    function removeInclusion(button) {
        // Finds the closest parent with the class 'inclusion-item' and removes it
        const row = button.closest('.inclusion-item');
        if (row) {
            row.remove();
        }
    }

    // Initial call to add one row on page load (Optional)
    window.onload = function() {
        addInclusion();
    };

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

    $("#frm-add-inclusion").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-package");
        let $btnCancel = $("#btn-cancel-package");
        let $spinner = $("#btn-spinner-package");
        let $text = $btnSubmit.find(".btn-text-package");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var EventType  = $("#eventtype").val();
        var Tier  = $("#function-tier").val();
        var Description   = $("#package-description").val();
        var Cost  = $("#total-packagecost").val();
        var Terms  = $("#terms-condition").val();
        var Inclusion = [];
        var Qty = [];

        $("input[name='inclusion_description[]']").each(function () {
            Inclusion.push($(this).val());
        });

        $("input[name='inclusion_qty[]']").each(function () {
            Qty.push($(this).val());
        });


        $.post("dirs/master_settings/dirs/inclusion_config/actions/save_inclusion.php", {
            EventType: EventType,
            Tier: Tier,
            Description: Description,
            Cost: Cost,
            Terms: Terms,
            Inclusion: Inclusion,
            Qty: Qty
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $text.text("Save");
                $("#frm-add-inclusion")[0].reset();
                $("#mdl-add-inclusion").modal('hide');
                basicFunction_Tier();
                Premium_tier();
                Standard_tier();
                VIP_tier();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Inclusion Package",
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
