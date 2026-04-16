<!-- Modal Appetizer Form -->
<form id="frm-add-appetizer">
    <div class="modal fade" id="mdl-add-appetizer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Appetizer</h5>
                        <p class="text-muted small mb-0">Add a appetizer to menu list.</p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="appetizer-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Dish Name</label>
                            <input type="text" class="form-control" name="appetizer-name" id="appetizer-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control bg-light" name="appetizer-description" id="appetizer-description" rows="2" maxlength="200" required></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control bg-light" name="appetizer-ingredients" id="appetizer-ingredients" rows="2"  maxlength="200" required></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-appetizer" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-appetizer"></span>
                       <span class="btn-text-appetizer">Save</span>
                     </button>
                     <button id="btn-update-appetizer" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-appetizer">Update</span>
                       <span id="btn-spinner-appetizer-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-appetizer">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-appetizer").on("click", function() {
        $("#btn-update-appetizer").addClass('d-none');
    });

    $("#frm-add-appetizer").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-appetizer");
        let $btnCancel = $("#btn-cancel-appetizer");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-appetizer");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DishName  = $("#appetizer-name").val();
        var Description   = $("#appetizer-description").val();
        var Ingredient  = $("#appetizer-ingredients").val();

        $.post("dirs/menu_setup/actions/save_appetizer.php", {
            DishName: DishName,
            Description: Description,
            Ingredient: Ingredient,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-appetizer")[0].reset();
                $("#mdl-add-appetizer").modal('hide');
                loadAppetizers(CurrentPage - 1);
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Appetizer Menu",
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




<!-- Modal Beverages Form -->
<form id="frm-add-beverage">
    <div class="modal fade" id="mdl-add-beverage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Beverage</h5>
                        <p class="text-muted small mb-0">Add beverage to menu list.</p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="beverage-id">
                    <div class="row">
                        <div class="mb-4">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Beverage Name</label>
                            <input type="text" class="form-control" name="beverage-name" id="beverage-name" required>
                        </div>
                        <div class="mt-3 mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control h-100" name="beverage-description" rows="2" id="beverage-description" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-beverage" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-beverage"></span>
                       <span class="btn-text-beverage">Save</span>
                     </button>
                     <button id="btn-update-beverage" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-beverage">Update</span>
                       <span id="btn-spinner-beverage-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-beverage">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-beverage").on("click", function() {
        $("#btn-update-beverage").addClass('d-none');
    });

    $("#frm-add-beverage").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-beverage");
        let $btnCancel = $("#btn-cancel-beverage");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-beverage");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DishName  = $("#beverage-name").val();
        var Description   = $("#beverage-description").val();
        var Ingredient  = null;

        $.post("dirs/menu_setup/actions/save_beverage.php", {
            DishName: DishName,
            Description: Description,
            Ingredient: Ingredient,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-beverage")[0].reset();
                $("#mdl-add-beverage").modal('hide');
               loadBeverage(CurrentPage);
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Beverage Menu",
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

<!-- Modal Breakfast Form -->
<form id="frm-add-breakfast">
    <div class="modal fade" id="mdl-add-breakfast" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Breakfast</h5>
                        <p class="text-muted small mb-0">Add breakfast to menu list.</p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="breakfast-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Breakfast Name</label>
                            <input type="text" class="form-control" name="breakfast-name" id="breakfast-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="breakfast-description" rows="3" id="breakfast-description" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="breakfast-ingredients" rows="3" id="breakfast-ingredients" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-breakfast" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-breakfast"></span>
                       <span class="btn-text-breakfast">Save</span>
                     </button>
                     <button id="btn-update-breakfast" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-breakfast">Update</span>
                       <span id="btn-spinner-breakfast-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-breakfast">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-breakfast").on("click", function() {
        $("#btn-update-breakfast").addClass('d-none');
    });
    


    $("#frm-add-breakfast").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-breakfast");
        let $btnCancel = $("#btn-cancel-breakfast");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-breakfast");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DishName  = $("#breakfast-name").val();
        var Description   = $("#breakfast-description").val();
        var Ingredient  = $("#breakfast-ingredients").val();

        $.post("dirs/menu_setup/actions/save_breakfast.php", {
            DishName: DishName,
            Description: Description,
            Ingredient: Ingredient,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-breakfast")[0].reset();
                $("#mdl-add-breakfast").modal('hide');
                loadBreakfast(CurrentPage);
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Break Fast Menu",
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


<!-- Modal Dessert Form -->
<form id="frm-add-dessert">
    <div class="modal fade" id="mdl-add-dessert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Dessert</h5>
                        <p class="text-muted small mb-0">Add dessert to menu list.</p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="dessert-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Dessert Name</label>
                            <input type="text" class="form-control" name="dessert-name" id="dessert-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="dessert-description" rows="3" id="dessert-description" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="dessert-ingredients" rows="3" id="dessert-ingredients" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-dessert" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-dessert"></span>
                       <span class="btn-text-dessert">Save</span>
                     </button>
                     <button id="btn-update-dessert" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-dessert">Update</span>
                       <span id="btn-spinner-dessert-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-dessert">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-dessert").on("click", function() {
        $("#btn-update-dessert").addClass('d-none');
    });


    $("#frm-add-dessert").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-dessert");
        let $btnCancel = $("#btn-cancel-dessert");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-dessert");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DishName  = $("#dessert-name").val();
        var Description   = $("#dessert-description").val();
        var Ingredient  = $("#dessert-ingredients").val();

        $.post("dirs/menu_setup/actions/save_dessert.php", {
            DishName: DishName,
            Description: Description,
            Ingredient: Ingredient,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-dessert")[0].reset();
                $("#mdl-add-dessert").modal('hide');
                loadDessert(CurrentPage);
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Dessert Menu",
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


<!-- Modal Main Course Form -->
<form id="frm-add-maincourse">
    <div class="modal fade" id="mdl-add-maincourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Main Course</h5>
                        <p class="text-muted small mb-0">Add Main course to menu list.</p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="maincourse-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Course Name</label>
                            <input type="text" class="form-control" name="main-course-name" id="main-course-name" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="main-course-description" id="main-course-description" rows="3" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="main-course-ingredients" id="main-course-ingredients" rows="3" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-maincourse" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-maincourse"></span>
                       <span class="btn-text-maincourse">Save</span>
                     </button>
                     <button id="btn-update-maincourse" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-maincourse">Update</span>
                       <span id="btn-spinner-maincourse-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-maincourse">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-maincourse").on("click", function() {
        $("#btn-update-maincourse").addClass('d-none');
    });


    $("#frm-add-maincourse").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-maincourse");
        let $btnCancel = $("#btn-cancel-maincourse");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-maincourse");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DishName  = $("#maincourse-name").val();
        var Description   = $("#maincourse-description").val();
        var Ingredient  = $("#maincourse-ingredients").val();

        $.post("dirs/menu_setup/actions/save_maincourse.php", {
            DishName: DishName,
            Description: Description,
            Ingredient: Ingredient,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-maincourse")[0].reset();
                $("#mdl-add-maincourse").modal('hide');
                loadMainCourse(CurrentPage);
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Main Course Menu",
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



<!-- Modal Pastry Form -->
<form id="frm-add-pastry">
    <div class="modal fade" id="mdl-add-pastry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Pastry</h5>
                        <p class="text-muted small mb-0">Add pastry to menu list.</p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="pastry-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Pastry Name</label>
                            <input type="text" class="form-control" name="pastry-name" id="pastry-name" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="pastry-description" id="pastry-description" rows="2" maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="pastry-ingredients" id="pastry-ingredients" rows="2" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-pastry" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-pastry"></span>
                       <span class="btn-text-pastry">Save</span>
                     </button>
                     <button id="btn-update-pastry" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-pastry">Update</span>
                       <span id="btn-spinner-pastry-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-pastry">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-pastry").on("click", function() {
        $("#btn-update-pastry").addClass('d-none');
    });


    $("#frm-add-pastry").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-pastry");
        let $btnCancel = $("#btn-cancel-pastry");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-pastry");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DishName  = $("#pastry-name").val();
        var Description   = $("#pastry-description").val();
        var Ingredient  = $("#pastry-ingredients").val();

        $.post("dirs/menu_setup/actions/save_pastry.php", {
            DishName: DishName,
            Description: Description,
            Ingredient: Ingredient,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-pastry")[0].reset();
                $("#mdl-add-pastry").modal('hide');
                loadPastry(CurrentPage);
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Pastry Menu",
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


<!-- Modal Pasta Form -->
<form id="frm-add-pasta">
    <div class="modal fade" id="mdl-add-pasta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Pasta</h5>
                        <p class="text-muted small mb-0">Add pasta to menu list.</p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="pasta-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Pasta Name</label>
                            <input type="text" class="form-control" name="pasta-name" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="pasta-description" rows="2" maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="pasta-ingredients" rows="2" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-pasta" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-pasta"></span>
                       <span class="btn-text-pasta">Save</span>
                     </button>
                     <button id="btn-update-pasta" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-pasta">Update</span>
                       <span id="btn-spinner-pasta-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-pasta">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-pasta").on("click", function() {
        $("#btn-update-pasta").addClass('d-none');
    });


    $("#frm-add-pasta").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-pasta");
        let $btnCancel = $("#btn-cancel-pasta");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-pasta");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DishName  = $("#pasta-name").val();
        var Description   = $("#pasta-description").val();
        var Ingredient  = $("#pasta-ingredients").val();

        $.post("dirs/menu_setup/actions/save_pasta.php", {
            DishName: DishName,
            Description: Description,
            Ingredient: Ingredient,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-pasta")[0].reset();
                $("#mdl-add-pasta").modal('hide');
                loadPasta(CurrentPage);
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Pasta Menu",
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


<!-- Modal Salads Form -->
<form id="frm-add-salad">
    <div class="modal fade" id="mdl-add-salad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Salad</h5>
                        <p class="text-muted small mb-0">Add salad to menu list.</p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="salad-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Salad Name</label>
                            <input type="text" class="form-control" name="salad-name" id="salad-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="salad-description" id="salad-description" rows="2" maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="salad-ingredients" id="salad-ingredients" rows="2" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-salad" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-salad"></span>
                       <span class="btn-text-salad">Save</span>
                     </button>
                     <button id="btn-update-salad" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-salad">Update</span>
                       <span id="btn-spinner-salad-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-salad">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-salad").on("click", function() {
        $("#btn-update-salad").addClass('d-none');
    });


    $("#frm-add-salad").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-salad");
        let $btnCancel = $("#btn-cancel-salad");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-salad");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DishName  = $("#salad-name").val();
        var Description   = $("#salad-description").val();
        var Ingredient  = $("#salad-ingredients").val();

        $.post("dirs/menu_setup/actions/save_salad.php", {
            DishName: DishName,
            Description: Description,
            Ingredient: Ingredient,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-salad")[0].reset();
                $("#mdl-add-salad").modal('hide');
                loadSalad(CurrentPage);
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Salad Menu",
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

<!-- Modal Snack Form -->
<form id="frm-add-snack">
    <div class="modal fade" id="mdl-add-snack" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Snack</h5>
                        <p class="text-muted small mb-0">Add snack to menu list.</p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="snack-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Snack Name</label>
                            <input type="text" class="form-control" name="snack-name" id="snack-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="snack-description" id="snack-description" rows="2" maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="snack-ingredients" id="snack-ingredients" rows="2" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-snack" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-snack"></span>
                       <span class="btn-text-snack">Save</span>
                     </button>
                     <button id="btn-update-snack" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-snack">Update</span>
                       <span id="btn-spinner-snack-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-snack">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-snack").on("click", function() {
        $("#btn-update-snack").addClass('d-none');
    });


    $("#frm-add-snack").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-snack");
        let $btnCancel = $("#btn-cancel-snack");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-snack");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DishName  = $("#snack-name").val();
        var Description   = $("#snack-description").val();
        var Ingredient  = $("#snack-ingredients").val();

        $.post("dirs/menu_setup/actions/save_snack.php", {
            DishName: DishName,
            Description: Description,
            Ingredient: Ingredient,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-snack")[0].reset();
                $("#mdl-add-snack").modal('hide');
                loadSnack(CurrentPage);
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Snack Menu",
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

<!-- Modal Soup Form -->
<form id="frm-add-soup">
    <div class="modal fade" id="mdl-add-soup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Soup</h5>
                        <p class="text-muted small mb-0">Add soup to menu list.</p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="soup-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Soup Name</label>
                            <input type="text" class="form-control" name="soup-name" id="soup-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="soup-description" id="soup-description" rows="2" maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="soup-ingredients" id="soup-ingredients" rows="2" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-soup" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-soup"></span>
                       <span class="btn-text-soup">Save</span>
                     </button>
                     <button id="btn-update-soup" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-soup">Update</span>
                       <span id="btn-spinner-soup-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-soup">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-soup").on("click", function() {
        $("#btn-update-soup").addClass('d-none');
    });



    $("#frm-add-soup").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-soup");
        let $btnCancel = $("#btn-cancel-soup");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-soup");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DishName  = $("#soup-name").val();
        var Description   = $("#soup-description").val();
        var Ingredient  = $("#soup-ingredients").val();

        $.post("dirs/menu_setup/actions/save_soup.php", {
            DishName: DishName,
            Description: Description,
            Ingredient: Ingredient,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-soup")[0].reset();
                $("#mdl-add-soup").modal('hide');
                loadSoup(CurrentPage);
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Soup Menu",
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
<!-- Modal Soup Form -->
<form id="frm-add-vegetables">
    <div class="modal fade" id="mdl-add-vegetables" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Vegie Menu</h5>
                        <p class="text-muted small mb-0">Add vegetable to menu list.</p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="vegie-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Vegetable Name</label>
                            <input type="text" class="form-control" name="vegetable-name" id="vegetable-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="vegetable-description" id="vegetable-description" rows="2" maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="vegetable-ingredients" id="vegetable-ingredients" rows="2" required maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>
                    </div>
                </div>
               <div class="modal-footer">
                   <div class="justify-content-end d-flex gap-2">
                    <button id="btn-submit-vegetables" class="btn btn-success shadow-sm" type="submit">
                      <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-vegetables"></span>
                      <span class="btn-text-vegetables">Save</span>
                    </button>
                    <button id="btn-update-vegie" class="btn btn-success shadow-sm d-none" type="button">
                      <span class="btn-text-vegie">Update</span>
                      <span id="btn-spinner-vegie-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                    </button>
                     <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-vegetables">Cancel</button>
                   </div>
               </div>
            </div>
        </div>
    </div>
</form>

<script>
    /*Function remove update button when closing*/
    $("#btn-cancel-vegie").on("click", function() {
        $("#btn-update-vegie").addClass('d-none');
    });


    $("#frm-add-vegetables").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-vegetable");
        let $btnCancel = $("#btn-cancel-vegetable");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-vegetable");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DishName  = $("#vegetable-name").val();
        var Description   = $("#vegetable-description").val();
        var Ingredient  = $("#vegetable-ingredients").val();

        $.post("dirs/menu_setup/actions/save_vegetables.php", {
            DishName: DishName,
            Description: Description,
            Ingredient: Ingredient,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-vegetables")[0].reset();
                $("#mdl-add-vegetables").modal('hide');
                loadVegie(CurrentPage);
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Vegie Menu",
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