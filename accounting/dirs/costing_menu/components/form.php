<form id="frm-registry">
    <div class="row g-3 bg-secondary shadow-sm">
        <div class="col-md-2">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary-subtle fw-bold">
                    <h6>Item Identity</h6>
                </div>

                <div class="card-body">

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Menu SKU</label>
                        <input type="text" class="form-control form-control-sm border border-secondary" id="itemmenu_code" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Menu Name</label>
                        <input type="text" class="form-control form-control-sm border border-primary" id="menu_name" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1">
                            Menu Category
                        </label>

                        <select class="form-select form-select-sm border border-primary" id="menu_category" required>
                            <option value="">Choose...</option>

                            <option value="Appetizer">Appetizer</option>
                            <option value="Soup">Soup</option>
                            <option value="Salad">Salad</option>
                            <option value="Main_course">Main Course</option>
                            <option value="Side_dish">Side Dish</option>
                            <option value="Dessert">Dessert</option>
                            <option value="Beverage">Beverage</option>
                            <option value="Snack">Snack</option>
                            <option value="Breakfast">Breakfast</option>
                            <option value="Buffet">Buffet Item</option>
                            <option value="Package">Package Menu</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1">
                            Sub-category
                        </label>

                        <select class="form-select form-select-sm border border-primary" id="menu_subcategory" required>
                            <option value="">Choose...</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Yield (Servings)</label>
                        <input type="number" class="form-control form-control-sm border border-primary" id="yield_qty" required>
                    </div>

                    <div>
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Description</label>
                        <textarea class="form-control form-control-sm border border-primary" id="description"></textarea>
                    </div>

                </div>
            </div>
        </div>
        <!-- Cost Analysis -->
        <div class="col-md-2">
            <div class="card shadow-sm">

                <div class="card-header bg-secondary-subtle fw-bold">
                    <h6>Costing</h6>
                </div>

                <div class="card-body">

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Selling Price</label>
                        <input type="text" class="form-control form-control-sm with-comma border border-primary" id="selling_price" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Labor Cost per Dish (Optional)</label>
                        <input type="text" class="form-control form-control-sm with-comma border border-primary" id="labor_cost">
                    </div>

                    <!-- 2. COST PER SERVING -->
                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Cost Per Serving</label>
                        <input type="text" class="form-control form-control-sm border border-secondary with-comma"
                               id="cost-per-serving" readonly>
                    </div>

                    <!-- 3. VAT -->
                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">
                            VAT Rate %
                        </label>

                        <input type="text"
                               class="form-control form-control-sm border border-primary with-comma"
                               id="valueadded_tax">
                    </div>

                    <!-- 4. DISCOUNT -->
                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Discounted %</label>
                        <input type="text" class="form-control form-control-sm border with-comma border-secondary"
                               id="discounted_percentage">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Discounted Price</label>
                        <input type="text" class="form-control form-control-sm border border-secondary"
                               id="discounted_price" readonly>
                    </div>

                    <!-- 5. FINAL PRICE -->
                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Final Price (incl. tax)</label>
                        <input type="text" class="form-control form-control-sm border border-secondary"
                               id="final_price" readonly>
                    </div>

                    <!-- 6. PROFITABILITY -->
                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Gross Profit per Dish</label>
                        <input type="text" class="form-control form-control-sm border border-secondary"
                               id="gross-profit" readonly required>
                    </div>

                    <div>
                        <label class="form-label small text-muted fw-medium mb-1">Food Cost %</label>
                        <input type="text" class="form-control form-control-sm border border-secondary"
                               id="food-cost-percent" readonly>
                    </div>

                </div>

            </div>
        </div>
        <!-- Recipe Formula -->
        <div class="col-md-8">
            <div class="row">
               <div class="col-md-12">
                   <div class="card shadow-sm overflow-auto" style="height: 60vh;">
                       <div class="card-header bg-secondary-subtle">
                           <div class="justify-content-end d-flex">
                               <button type="button" class="btn btn-sm btn-primary shadow px-4 py-2 rounded-3 fw-medium" id="btn-add-ingredient" title="Add Ingredient" onclick="addIngredientForm()">
                                   <i class="bi bi-plus fs-5"></i>Add Item
                               </button>
                           </div>
                       </div>
                       <div class="card-body">
                           <h6>Ingredients Recipe (BOM)</h6>
                           <div class="table-responsive">
                               <table class="table table-sm table-bordered align-middle mb-0">
                                   <thead class="table-secondary text-muted small">
                                       <tr>
                                           <th scope="col" class="text-center">Ingredient</th>
                                           <th scope="col" class="text-center">Qty</th>
                                           <th scope="col" class="text-center" title="Unit of Measurement">UOM</th>
                                           <th scope="col" class="text-center">Unit Cost</th>
                                           <th scope="col" class="text-center">Amount</th>
                                           <th scope="col" class="text-center"></th>
                                       </tr>
                                   </thead>

                                   <tbody id="ingredient-body">

                                       <tr>
                                           <td>
                                               <input type="text" class="form-control border border-primary">
                                           </td>

                                           <td>
                                               <input type="number" class="form-control border border-primary ingredient-qty">
                                           </td>

                                           <td>
                                               <select class="form-select border border-primary  ingredient-unit">
                                                   <option value="kg">kg</option>
                                                   <option value="g">g</option>
                                                   <option value="ml">ml</option>
                                                   <option value="ltr">ltr</option>
                                                   <option value="tbsp">tbsp</option>
                                                   <option value="tsp">tsp</option>
                                                   <option value="pcs">pcs</option>
                                               </select>
                                           </td>

                                           <td>
                                               <input type="text" class="form-control border border-primary ingredient-cost with-comma">
                                           </td>

                                           <td>
                                               <input type="text" class="form-control border border-secondary ingredient-amount with-comma" readonly>
                                           </td>

                                           <td class="text-center">
                                               <a href="#" class="text-danger btn-remove-ingredient">
                                                   <i class="bi bi-trash3"></i>
                                               </a>
                                           </td>
                                       </tr>

                                   </tbody>

                               </table>
                           </div>
                       </div>
                       
                   </div>
                   <div class="card shadow-sm mt-2">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-md-12">
                               <label class="form-label small text-muted fw-medium mb-1">Total Recipe Cost</label>
                               <input type="text" class="form-control form-control-sm border border-secondary" id="total-recipe-cost" readonly required>
                           </div>
                           <div class="col-md-6">
                               <label class="form-label small text-muted fw-medium mb-1">
                                   Prep Time
                               </label>
                               <div class="input-group input-group-sm">
                                   <select class="form-select border border-primary time-hours" id="prep_hours">
                                       <option value="0">0</option>
                                   </select>
                                   <span class="input-group-text">Hour(s)</span>

                                   <select class="form-select border border-primary time-minutes" id="prep_minutes">
                                       <option value="0">0</option>
                                   </select>
                                   <span class="input-group-text">Min(s)</span>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <label class="form-label small text-muted fw-medium mb-1" class="form-label">Cook Time</label>
                               <div class="input-group input-group-sm">
                                   <select class="form-select border border-primary time-hours" id="cooking_hours">
                                       <option value="0">0</option>
                                   </select>
                                   <span class="input-group-text">Hour(s)</span>

                                   <select class="form-select border border-primary time-minutes" id="cooking_minutes">
                                       <option value="0">0</option>
                                   </select>
                                   <span class="input-group-text">Min(s)</span>
                               </div>
                           </div>
                       </div>
                    </div>

                   </div>
               </div>
              
           </div>
        </div>
        <div class="justify-content-end d-flex mt-2 mb-3 gap-2">
            <button type="submit" id="btn-submit-account" class="btn btn-success shadow px-4 py-2 rounded-3 fw-medium">
                <span class="spinner-border spinner-border-sm d-none me-1" id="btn-spinner-account" role="status" aria-hidden="true"></span>
                <span class="btn-text-account">Save</span>
            </button>
            <button type="button" class="btn btn-danger px-4 py-2 rounded-3 fw-medium" id="btn-cancel-account" onclick="loadMenuSetup();">
                Reset
            </button>
            <button type="reset" class="btn btn-light px-4 py-2 rounded-3 fw-medium" onclick="loadCosting()">
                Cancel
            </button>
        </div>
    </div>
</form>


<script>

    $('#valueadded_tax').on('input', function () {

        var value = parseFloat(this.value) || 0;

        if (value > 100) {
            this.value = 100;
        }

        if (value < 0) {
            this.value = 0;
        }

    });


    $(function () {
        $(".time-hours").each(function () {
            for (let i = 1; i <= 12; i++) {
                $(this).append(
                    `<option value="${i}">${i}</option>`
                );
            }
        });
        $(".time-minutes").each(function () {
            for (let i = 1; i <= 59; i++) {
                $(this).append(
                    `<option value="${i}">${i}</option>`
                );
            }
        });

    });


  $("#frm-registry").submit(function (event) {
        event.preventDefault();

        var Menucode = $("#itemmenu_code").val();
        var Menuname = $("#menu_name").val();
        var Category = $("#menu_category").val();
        var SubCat = $("#menu_subcategory").val();
        var Yield = $("#yield_qty").val();
        var Description = $("#description").val();
        var SellingPrice = $("#selling_price").val();

        var LaborCost = $("#labor_cost").val();
        var CostServing = $("#cost-per-serving").val();
        var VAT = $("#valueadded_tax").val();
        var Discounted = $("#discounted_percentage").val();
        var DiscountedPrice = $("#discounted_price").val();
        var FinalPrice = $("#final_price").val();
        var PrepHrs = $("#prep_hours").val();
        var PrepMins = $("#prep_minutes").val();
        var CookHrs = $("#cooking_hours").val();
        var CookMins = $("#cooking_minutes").val();


        var TotalCost = $("#total-recipe-cost").val();
        var GrossProfit = $("#gross-profit").val();
        var FoodCost = $("#food-cost-percent").val();
        let ingredients = [];

        $("#ingredient-body tr").each(function () {

            let item = $(this).find("td:eq(0) input").val();
            let qty = $(this).find(".ingredient-qty").val();
            let unit = $(this).find(".ingredient-unit").val();
            let cost = $(this).find(".ingredient-cost").val();
            let amount = $(this).find(".ingredient-amount").val();

            if (item !== "") {
                ingredients.push({
                    item: item,
                    qty: qty,
                    unit: unit,
                    cost: cost,
                    amount: amount
                });
            }
        });

        /*Validate entry*/
        if (ingredients.length === 0) {
            Swal.fire({
                icon: "warning",
                title: "No Ingredients Added",
                text: "Please setup your ingredient before saving the menu.",
                confirmButtonColor: "#3085d6"
            });
            return false;
        }

        $.post("dirs/costing_menu/actions/save_menuregistry.php", {

            Menucode: Menucode,
            Menuname: Menuname,
            Category: Category,
            SubCat: SubCat,
            Yield: Yield,
            SellingPrice: SellingPrice,
            Description: Description,
            TotalCost: TotalCost,
            CostServing: CostServing,
            GrossProfit: GrossProfit,

            LaborCost: LaborCost,
            CostServing: CostServing,
            VAT: VAT,
            Discounted: Discounted,
            PrepMins: PrepMins,
            FinalPrice: FinalPrice,
            PrepHrs: PrepHrs,
            DiscountedPrice: DiscountedPrice,
            CookHrs: CookHrs,
            CookMins: CookMins,

            FoodCost: FoodCost,
            Ingredients: JSON.stringify(ingredients)

        }, function (data) {

            if ($.trim(data) == "OK") {

                loadMenuSetup();

                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "Successfully registered.",
                    showConfirmButton: false,
                    timer: 2000
                });

            } else {

                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "error",
                    title: data,
                    showConfirmButton: false,
                    timer: 2000
                });

            }
        });
    });






    // Function to add new row of ingredient form
    function addIngredientForm() {
        var template = document.getElementById('ingredient-template');
        var clone = template.content.cloneNode(true);
        document
            .getElementById('ingredient-body')
            .appendChild(clone);
    }

/*Script to delete selected row*/
    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.btn-remove-ingredient');
        if (!btn) return;
        e.preventDefault();
        btn.closest('tr').remove();

    });

/*Choose sub categories*/
    var subCategories = {
        Appetizer: ['Finger Foods', 'Canapés', 'Cold Appetizers', 'Hot Appetizers'],
        Soup: ['Clear Soup', 'Cream Soup', 'Broth Soup'],
        Salad: ['Green Salad', 'Fruit Salad', 'Pasta Salad'],
        Main_course: ['Pork', 'Beef', 'Chicken', 'Seafood', 'Vegetarian', 'Pasta', 'Rice Meal'],
        Side_dish: ['Vegetables', 'Rice', 'Bread'],
        Dessert: ['Cake', 'Pastry', 'Ice Cream', 'Native Dessert'],
        Beverage: ['Coffee', 'Tea', 'Juice', 'Soft Drink', 'Smoothie', 'Milkshake', 'Mocktail', 'Cocktail'],
        Breakfast: ['Filipino', 'American', 'Continental'],
        Buffet: ['Main Dish', 'Side Dish', 'Dessert', 'Beverage'],
        Package: ['Wedding', 'Corporate', 'Birthday', 'Debut']
    };

    document.getElementById('menu_category').addEventListener('change', function () {

        var subCategory = document.getElementById('menu_subcategory');

        subCategory.innerHTML =
            '<option value="">Choose...</option>';

        var items = subCategories[this.value] || [];

        items.forEach(item => {
            subCategory.innerHTML +=
                `<option value="${item}">${item}</option>`;
        });

    });


   function getNumber(id) {
       return parseFloat(
           String(document.getElementById(id)?.value || '0')
               .replace(/,/g, '')
       ) || 0;
   }

   document.addEventListener('input', function (e) {

       const row = e.target.closest('tr');

       // Ingredient row computation
       if (
           row &&
           (
               e.target.classList.contains('ingredient-qty') ||
               e.target.classList.contains('ingredient-cost')
           )
       ) {

           calculateRowAmount(row);
           calculateRecipeTotals();
           calculatePricing();
       }

       // Recompute costing section
       if (
           e.target.id === 'yield_qty' ||
           e.target.id === 'selling_price' ||
           e.target.id === 'labor_cost' ||
           e.target.id === 'discounted_percentage' ||
           e.target.id === 'valueadded_tax'
       ) {
           calculatePricing();
       }
   });

   function calculateRowAmount(row) {

       let qty = parseFloat(
           row.querySelector('.ingredient-qty')?.value || 0
       );

       let cost = parseFloat(
           String(
               row.querySelector('.ingredient-cost')?.value || 0
           ).replace(/,/g, '')
       );

       let amount = qty * cost;

       row.querySelector('.ingredient-amount').value =
           amount.toFixed(2);
   }

   function calculateRecipeTotals() {

       let total = 0;

       document.querySelectorAll('.ingredient-amount').forEach(function (el) {

           total += parseFloat(
               String(el.value || 0).replace(/,/g, '')
           ) || 0;

       });

       document.getElementById('total-recipe-cost').value =
           total.toFixed(2);

       return total;
   }

   function calculatePricing() {

       let totalRecipeCost = calculateRecipeTotals();

       let yieldQty = getNumber('yield_qty');
       let sellingPrice = getNumber('selling_price');
       let laborCost = getNumber('labor_cost');
       let vatRate = getNumber('valueadded_tax');
       let discountPercent = getNumber('discounted_percentage');

       // =========================
       // COST PER SERVING
       // =========================
       let costPerServing =
           yieldQty > 0
               ? totalRecipeCost / yieldQty
               : 0;

       document.getElementById('cost-per-serving').value =
           costPerServing.toFixed(2);

       // =========================
       // ACTUAL COST PER SERVING
       // (Ingredient + Labor)
       // =========================
       let actualCost =
           costPerServing + laborCost;

       // =========================
       // DISCOUNT
       // =========================
       let discountedPrice =
           sellingPrice -
           (sellingPrice * discountPercent / 100);

       document.getElementById('discounted_price').value =
           discountedPrice.toFixed(2);

       // =========================
       // VAT
       // =========================
       let finalPrice =
           discountedPrice +
           (discountedPrice * vatRate / 100);

       document.getElementById('final_price').value =
           finalPrice.toFixed(2);

       // =========================
       // GROSS PROFIT
       // =========================
       let grossProfit =
           finalPrice - actualCost;

       document.getElementById('gross-profit').value =
           grossProfit.toFixed(2);

       // =========================
       // FOOD COST %
       // =========================
       let foodCostPercent =
           finalPrice > 0
               ? (actualCost / finalPrice) * 100
               : 0;

       document.getElementById('food-cost-percent').value =
           foodCostPercent.toFixed(2) + '%';
   }

    /*Function to apply with comma*/
    $(document).on("input", ".with-comma", function () {
        var valuenum = $(this).val();
        valuenum = valuenum.replace(/[^\d.]/g, '');
        let parts = valuenum.split('.');
        if (parts.length > 2) {
            valuenum = parts[0] + '.' + parts.slice(1).join('');
        }
        if (valuenum !== '') {
            let decimal = '';
            if (valuenum.includes('.')) {
                let split = valuenum.split('.');
                valuenum = split[0];
                decimal = '.' + split[1];
            }
            valuenum = Number(valuenum || 0).toLocaleString('en-US') + decimal;
        }
        $(this).val(valuenum);
    });

</script>