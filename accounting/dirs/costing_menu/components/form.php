<form id="frm-registry">
    <div class="row g-3">

        <!-- Menu Information -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-header fw-bold">
                    Menu Basic Info
                </div>

                <div class="card-body">

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Menu Code</label>
                        <input type="text" class="form-control" id="itemmenu_code">
                    </div>

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Menu Name</label>
                        <input type="text" class="form-control" id="menu_name">
                    </div>

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1">
                            Category
                        </label>

                        <select class="form-select" id="menu_category">
                            <option value="">Choose...</option>

                            <option value="appetizer">Appetizer</option>
                            <option value="soup">Soup</option>
                            <option value="salad">Salad</option>
                            <option value="main_course">Main Course</option>
                            <option value="side_dish">Side Dish</option>
                            <option value="dessert">Dessert</option>
                            <option value="beverage">Beverage</option>
                            <option value="snack">Snack</option>
                            <option value="breakfast">Breakfast</option>
                            <option value="buffet">Buffet Item</option>
                            <option value="package">Package Menu</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1">
                            Sub Category
                        </label>

                        <select class="form-select" id="menu_subcategory">
                            <option value="">Choose...</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Yield (Servings)</label>
                        <input type="number" class="form-control" id="yield_qty">
                    </div>

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Selling Price</label>
                        <input type="text" class="form-control with-comma" id="selling_price">
                    </div>

                    <div>
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label" id="description">Description</label>
                        <textarea class="form-control"></textarea>
                    </div>

                </div>
            </div>
        </div>

        <!-- Recipe Formula -->
        <div class="col-md-6">
            <div class="card shadow-sm overflow-auto" style="height: 50vh;">
                <div class="card-header">
                    <button type="button" class="btn btn-sm btn-primary" id="btn-add-ingredient" title="Add Ingredient" onclick="addIngredientForm()">
                        <i class="bi bi-plus-lg"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0" style="font-size: 14px;">
                            <thead class="table-secondary text-muted small">
                                <tr>
                                    <th colspan="6">
                                        <input type="text" class="form-control form-control-sm" id="ingredient-search" placeholder="Search...">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="text-center">Ingredient</th>
                                    <th scope="col" class="text-center">Qty</th>
                                    <th scope="col" class="text-center">Unit</th>
                                    <th scope="col" class="text-center">Unit Cost</th>
                                    <th scope="col" class="text-center">Amount</th>
                                    <th scope="col" class="text-center"></th>
                                </tr>
                            </thead>

                            <tbody id="ingredient-body">

                                <tr>
                                    <td>
                                        <input type="text" class="form-control">
                                    </td>

                                    <td>
                                        <input type="number" class="form-control ingredient-qty">
                                    </td>

                                    <td>
                                        <select class="form-select  ingredient-unit">
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
                                        <input type="text" class="form-control ingredient-cost with-comma">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control ingredient-amount with-comma" readonly>
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
        </div>

        <!-- Cost Analysis -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-header fw-bold">
                    System Costing
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Total Recipe Cost</label>
                        <input type="text"
                               class="form-control"  id="total-recipe-cost"
                               readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Cost Per Serving</label>
                        <input type="text"
                               class="form-control" id="cost-per-serving"
                               readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Gross Profit</label>
                        <input type="text"
                               class="form-control" id="gross-profit"
                               readonly>
                    </div>

                    <div>
                        <label class="form-label small text-muted fw-medium mb-1">Food Cost %</label>
                        <input type="text"
                               class="form-control"  id="food-cost-percent"
                               readonly>
                    </div>
                </div>
            </div>
        </div>


        <div class="justify-content-end d-flex mt-2 mb-3">
            <button type="submit" id="btn-submit-account" class="btn btn-success shadow px-4 py-2 rounded-3 fw-medium">
                <span class="spinner-border spinner-border-sm d-none me-1" id="btn-spinner-account" role="status" aria-hidden="true"></span>
                <span class="btn-text-account">Save</span>
            </button>
            <button type="reset" class="btn btn-light px-4 py-2 rounded-3 fw-medium" id="btn-cancel-account">
                Cancel
            </button>
        </div>
    </div>
</form>


<script>
    $("#frm-registry").submit(function (event) {
        event.preventDefault();

        var Menucode = $("#itemmenu_code").val();
        var Menuname = $("#menu_name").val();
        var Category = $("#menu_category").val();
        var SubCat = $("#menu_subcategory").val();
        var Yield = $("#yield_qty").val();
        var SellingPrice = $("#selling_price").val();
        var Description = $("#description").val();
        var TotalCost = $("#total-recipe-cost").val();
        var CostServing = $("#cost-per-serving").val();
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
            FoodCost: FoodCost,
            Ingredients: JSON.stringify(ingredients)

        }, function (data) {

            if ($.trim(data) == "OK") {

                loadCosting();

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
                    title: "Error " + data,
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
        appetizer: ['Finger Foods', 'Canapés', 'Cold Appetizers', 'Hot Appetizers'],
        soup: ['Clear Soup', 'Cream Soup', 'Broth Soup'],
        salad: ['Green Salad', 'Fruit Salad', 'Pasta Salad'],
        main_course: ['Pork', 'Beef', 'Chicken', 'Seafood', 'Vegetarian', 'Pasta', 'Rice Meal'],
        side_dish: ['Vegetables', 'Rice', 'Bread'],
        dessert: ['Cake', 'Pastry', 'Ice Cream', 'Native Dessert'],
        beverage: ['Coffee', 'Tea', 'Juice', 'Soft Drink', 'Smoothie', 'Milkshake', 'Mocktail', 'Cocktail'],
        breakfast: ['Filipino', 'American', 'Continental'],
        buffet: ['Main Dish', 'Side Dish', 'Dessert', 'Beverage'],
        package: ['Wedding', 'Corporate', 'Birthday', 'Debut']
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


    document.addEventListener('input', function (e) {

        var row = e.target.closest('tr');

        // =========================
        // 1. ROW COMPUTATION
        // =========================
        if (row && (e.target.classList.contains('ingredient-qty') ||
                    e.target.classList.contains('ingredient-cost'))) {

            var qty = parseFloat(row.querySelector('.ingredient-qty')?.value || 0);
            var cost = parseFloat(row.querySelector('.ingredient-cost')?.value || 0);

            var amount = qty * cost;

            row.querySelector('.ingredient-amount').value =
                amount ? amount.toFixed(2) : '';
        }

        // =========================
        // 2. TOTAL RECIPE COST
        // =========================
        let total = 0;

        document.querySelectorAll('.ingredient-amount').forEach(input => {
            total += parseFloat(input.value || 0);
        });

        document.getElementById('total-recipe-cost').value =
            total.toFixed(2);

        // =========================
        // 3. COST PER SERVING
        // =========================
        var yieldQty = parseFloat(document.getElementById('yield_qty')?.value || 0);

        var costPerServing = yieldQty > 0 ? (total / yieldQty) : 0;

        document.getElementById('cost-per-serving').value =
            costPerServing.toFixed(2);

        // =========================
        // 4. PROFIT CALCULATION
        // =========================
        var sellingPrice = parseFloat(document.getElementById('selling_price')?.value || 0);

        var grossProfit = sellingPrice - costPerServing;

        document.getElementById('gross-profit').value =
            grossProfit.toFixed(2);

        // =========================
        // 5. FOOD COST %
        // =========================
        var foodCostPercent =
            sellingPrice > 0 ? (costPerServing / sellingPrice) * 100 : 0;

        document.getElementById('food-cost-percent').value =
            foodCostPercent.toFixed(2) + '%';

    });


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