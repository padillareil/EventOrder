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

        var DishName  = $("#main-course-name").val();
        var Description   = $("#main-course-description").val();
        var Ingredient  = $("#main-course-ingredients").val();

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
                            <input type="text" class="form-control" name="pasta-name" id="pasta-name" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="pasta-description" id="pasta-description" rows="2" maxlength="200"></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="pasta-ingredients" id="pasta-ingredients" rows="2" required maxlength="200"></textarea>
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


<!-- Modal to Create Package -->
<form id="frm-add-venuepackage">
    <div class="modal fade" id="mdl-add-package" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="package-title">New Venue Package</h5>
                        <p class="text-muted small mb-0" id="package-description">Add package setup to package list.</p>
                    </div>
                </div>
                <div class="modal-body p-4">
                    <input type="hidden" id="package_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                 <label class="form-label fw-semibold text-dark small">Package No.</label>
                                 <input type="text" class="form-control py-2 px-3 shadow-none" id="package-number" readonly>
                            </div>
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-dark small">Package Name (Package-Alias)</label>
                              <input type="text" class="form-control py-2 px-3 shadow-none" id="package-name" required maxlength="50">
                            </div>
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-dark small">Package Category</label>
                              <select class="form-select py-2 px-3" id="event-category" required>
                                <option selected value="">Select Category</option>
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
                              <select class="form-select py-2 px-3" id="event-tier" required>
                                <option selected value="">Select Tier</option>
                                <option value="Standard">Standard</option>
                                <option value="Basic">Basic</option>
                                <option value="Premium">Premium</option>
                              </select>
                            </div>
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-dark small">Maximum Pax</label>
                              <div class="input-group">
                                <span class="input-group-text text-muted">
                                    <i class="bi bi-people"></i>
                                </span>
                                <input type="number" id="pax-maximum" class="form-control py-2 shadow-none" placeholder="0" required>
                              </div>
                            </div>
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-dark small">Minimum Pax</label>
                              <div class="input-group">
                                <span class="input-group-text text-muted">
                                    <i class="bi bi-people"></i>
                                </span>
                                <input type="text" id="pax-minimum" class="form-control py-2 shadow-none" placeholder="0" required>
                              </div>
                            </div>
                            <div class="mb-2">
                              <label class="form-label fw-semibold text-dark small">Base Rate Per Pax</label>
                              <div class="input-group">
                                <span class="input-group-text text-muted">₱</span>
                                <input type="text" id="pax-amount" class="form-control py-2 shadow-none number-format" placeholder="0.00" required>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                  <label class="form-label fw-semibold text-dark small">Maximum Budget</label>
                                  <div class="input-group">
                                    <span class="input-group-text text-muted">₱</span>
                                    <input type="text" id="pax-maximumbudget" class="form-control py-2 shadow-none number-format" placeholder="0" required>
                                  </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                  <label class="form-label fw-semibold text-dark small">Minimum Budget</label>
                                  <div class="input-group">
                                    <span class="input-group-text text-muted">₱</span>
                                    <input type="text" id="pax-minimumbudget" class="form-control py-2 shadow-none number-format" placeholder="0" required>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 overflow-auto" style="height: 50vh;">
                            <small class="text-center fw-semibold text-dark">Food Quantity Setup</small>
                            <div id="food_categories_display" class="mt-3"></div>
                        </div>
                        <div class="col-md-6 overflow-auto" style="height: 50vh;">
                            <small class="text-center fw-semibold text-dark">Inclusions Setup</small>
                            <div id="inclusion_display" class="mt-3"></div>
                        </div>
                        <div class="col-md-6 overflow-auto" style="height: 50vh;">
                            <small class="text-center fw-semibold text-dark">Venue Setup</small>
                            <div id="hotel_room_display" class="mt-3"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-package" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-package"></span>
                       <span class="btn-text-package">Save</span>
                     </button>
                     <button id="btn-update-package" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-package">Update</span>
                       <span id="btn-spinner-package-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-package">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    /*Function formating input cannot enter text but number with comma only*/
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



    $("#frm-add-venuepackage").on("keydown", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
            return false;
        }
    });
    // Function to show the input field of checked food Category
    $(document).on("change", ".category-checkbox", function () {
        let row = $(this).closest(".category-row");
        let qtyBox = row.find(".quantity-wrapper");
        let input = row.find(".category-qty");
        if ($(this).is(":checked")) {
            qtyBox.removeClass("d-none");
            input.val(1).focus();
        } else {
            qtyBox.addClass("d-none");
            input.val(""); 
        }
    });


    /*Function create a Venue Package*/
    $("#frm-add-venuepackage").submit(function (event) {
        event.preventDefault();
        var $btnSubmit = $("#btn-submit-package");
        var $spinner = $("#btn-spinner-submit-package");
        var $text = $btnSubmit.find(".btn-text-package");
        var $btnClear = $("#btn-cancel-package");

        var EventName = $("#package-name").val();
        var Category = $("#event-category").val();
        var PaxAmount = $("#pax-amount").val();
        var FoodCategory = [];
        $(".category-row").each(function () {
            let checkbox = $(this).find(".category-checkbox");
            let qty = $(this).find(".category-qty").val();
            if (checkbox.is(":checked")) {
                FoodCategory.push({
                    Mid: checkbox.val(),
                    Quantity: qty ? parseInt(qty) : 1
                });
            }
        });

        if (FoodCategory.length === 0) {
            Swal.fire({
                icon: "warning",
                title: "No Menu selected",
                text: "Please setup category before saving."
            });
            return;
        }

        $btnSubmit.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");
        $btnClear.prop("disabled", true);

        $.post("dirs/menu_setup/actions/save_create_package.php", {
            EventName: EventName,
            Category: Category,
            PaxAmount: PaxAmount,
            FoodCategory: JSON.stringify(FoodCategory)
        }, function (data) {
            $btnSubmit.prop("disabled", false);
            $btnClear.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if ($.trim(data) == "OK") {
                $("#frm-add-venuepackage")[0].reset();
                $("#mdl-add-package").modal('hide');
                loadMenuPackage();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Venue Package",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });

            } else {
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


<!-- Package View Details review content only-->
<div class="modal fade" id="mdl-view-package" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-start">
                <div>
                    <h5 class="modal-title fw-bold text-dark mb-0">Package Summary</h5>
                    # <small id="package-code"></small> 
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="review-package">
            </div>
           
        </div>
    </div>
</div>


<!-- Modal add Custom Menu -->
<form id="frm-add-customenu">
    <div class="modal fade" id="mdl-add-customenu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="cutommenu-title">New Custom Menu</h5>
                        <p class="text-muted small mb-0" id="cutommenu-description">Add a special order to custom menu list.</p>
                        <p class="d-none text-muted" id="custommenu-code"></p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="custommenu-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Menu Name</label>
                            <input type="text" class="form-control" name="custom-name" id="custom-name" required maxlength="100">
                        </div>

                        <div class="mb-2">
                          <label class="form-label fw-bold text-uppercase text-muted small">Category</label>
                          <select class="form-select py-2 px-3" id="item-category" required>
                          </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control bg-light" name="custom-description" id="custom-description" rows="2" maxlength="200" required></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control bg-light" name="custom-ingredients" id="custom-ingredients" rows="2"  maxlength="200" required></textarea>
                            <div class="form-text small">Max 200 Characters.</div>
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
    $("#frm-add-customenu").on("keydown", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
            return false;
        }
    });
    
    /*Function remove update button when closing*/
    $("#btn-cancel-custom").on("click", function() {
        $("#btn-update-custom").addClass('d-none');
    });

    $("#frm-add-customenu").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-custom");
        let $btnCancel = $("#btn-cancel-custom");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-custom");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var DishName  = $("#custom-name").val();
        var Category  = $("#item-category").val();
        var Description   = $("#custom-description").val();
        var Ingredient  = $("#custom-ingredients").val();

        $.post("dirs/menu_setup/actions/save_custommenu.php", {
            DishName: DishName,
            Category: Category,
            Description: Description,
            Ingredient: Ingredient,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $("#frm-add-customenu")[0].reset();
                $("#mdl-add-customenu").modal('hide');
                loadCustomMenu();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Custom Menu",
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


