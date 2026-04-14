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
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-appetizer">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
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
                loadFoodMenusSetup();

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
<form id="frm-add-beverages">
    <div class="modal fade" id="mdl-add-beverages" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">New Beverage</h5>
                        <p class="text-muted small mb-0">Add beverage to menu list.</p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <div class="row">
                        <div class="mb-4">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Beverage Name</label>
                            <input type="text" class="form-control" name="beverages-name" required>
                        </div>
                        <div class="mt-3 mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control h-100" name="beverages-description" rows="2" id="beverages-description" required></textarea>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger shadow-sm" type="reset" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button id="btn-submit" class="btn btn-success shadow-sm" type="submit"> 
                         Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


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
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Breakfast Name</label>
                            <input type="text" class="form-control" name="breakfast-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="breakfast-description" rows="3" id="breakfast-description" required></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="breakfast-ingredients" rows="3" id="breakfast-ingredients" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger shadow-sm" type="reset" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button id="btn-submit" class="btn btn-success shadow-sm" type="submit"> 
                         Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


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
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Dessert Name</label>
                            <input type="text" class="form-control" name="dessert-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="dessert-description" rows="3" id="dessert-description" required></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="dessert-ingredients" rows="3" id="dessert-ingredients" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger shadow-sm" type="reset" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button id="btn-submit" class="btn btn-success shadow-sm" type="submit"> 
                         Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

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
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Course Name</label>
                            <input type="text" class="form-control" name="main-course-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Primary Protein</label>
                            <select class="form-select" name="main-course-protein">
                                <option selected value=""></option>
                                <option value="Beef">Beef</option>
                                <option value="Pork">Pork</option>
                                <option value="Chicken">Chicken</option>
                                <option value="Seafood">Seafood/Fish</option>
                                <option value="Vegetarian">Vegetarian</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="main-course-description" rows="3" required></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="main-course-ingredients" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger shadow-sm" type="reset" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button id="btn-submit" class="btn btn-success shadow-sm" type="submit"> 
                         Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

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
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Pastry Name</label>
                            <input type="text" class="form-control" name="pastry-name" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="pastry-description" rows="2"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="pastry-ingredients" rows="2" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger shadow-sm" type="reset" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button id="btn-submit" class="btn btn-success shadow-sm" type="submit"> 
                         Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


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
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Pasta Name</label>
                            <input type="text" class="form-control" name="pasta-name" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="pasta-description" rows="2"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="pasta-ingredients" rows="2" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger shadow-sm" type="reset" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button id="btn-submit" class="btn btn-success shadow-sm" type="submit"> 
                         Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

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
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Salad Name</label>
                            <input type="text" class="form-control" name="salad-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="salad-description" rows="2"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="salad-ingredients" rows="2" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger shadow-sm" type="reset" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button id="btn-submit" class="btn btn-success shadow-sm" type="submit"> 
                         Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

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
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Snack Name</label>
                            <input type="text" class="form-control" name="snack-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="snack-description" rows="2"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="snack-ingredients" rows="2" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger shadow-sm" type="reset" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button id="btn-submit" class="btn btn-success shadow-sm" type="submit"> 
                         Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

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
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Soup Name</label>
                            <input type="text" class="form-control" name="soup-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="soup-description" rows="2"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="soup-ingredients" rows="2" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger shadow-sm" type="reset" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button id="btn-submit" class="btn btn-success shadow-sm" type="submit"> 
                         Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

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
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Vegetable Name</label>
                            <input type="text" class="form-control" name="vegetable-name" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control" name="vegetable-description" rows="2"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Main Ingredients</label>
                            <textarea class="form-control" name="vegetable-ingredients" rows="2" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger shadow-sm" type="reset" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button id="btn-submit" class="btn btn-success shadow-sm" type="submit"> 
                         Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>