<form id="frm-update-record">

    <input type="hidden" id="menu-id"><!-- Menu id -->
    <div class="row g-3 bg-secondary shadow-sm">
        <div class="col-md-2">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary-subtle fw-bold">
                    <h6>Menu Identity</h6>
                </div>

                <div class="card-body">

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Menu SKU</label>
                        <input type="text" class="form-control form-control-sm border border-secondary" id="itemmenu_code_edt" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Menu Name</label>
                        <input type="text" class="form-control form-control-sm" id="menu_name_edt" readonly>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Menu Category</label>
                        <input type="text" class="form-control form-control-sm" id="menu_category_edt" readonly>
                    </div>
                  
                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Sub-category</label>
                        <input type="text" class="form-control form-control-sm" id="menu_subcategory_edt" readonly>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Yield (Servings)</label>
                        <input type="number" class="form-control form-control-sm border border-primary" id="yield_qty_edt" required>
                    </div>

                    <div>
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Description</label>
                        <textarea class="form-control form-control-sm border border-primary" id="description_edt"></textarea>
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
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light">
                                PHP
                            </span>
                            <input type="text" class="form-control form-control-sm with-comma border border-primary" id="selling_price_edt" required>
                        </div>
                    </div>


                    <div class="mb-2">
                        <label class="form-label small text-muted fw-medium mb-1" class="form-label">Labor Cost per Dish (Optional)</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light">
                                PHP
                            </span>
                            <input type="text" class="form-control form-control-sm with-comma border border-primary" id="labor_cost_edt" required>
                        </div>
                    </div>

                    <!-- 2. COST PER SERVING -->
                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Cost Per Serving</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light">
                                PHP
                            </span>
                            <input type="text" class="form-control form-control-sm border with-comma" id="cost-per-serving_edt" readonly>
                        </div>
                    </div>

                    <!-- 3. VAT -->
                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">
                            VAT Rate %
                        </label>

                        <input type="text"
                               class="form-control form-control-sm border border-primary with-comma"
                               id="valueadded_tax_edt">
                    </div>

                    <!-- 4. DISCOUNT -->
                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Discounted %</label>
                        <input type="text" class="form-control form-control-sm border with-comma border-primary"
                               id="discounted_percentage_edt">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Cost Per Serving</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light">
                                PHP
                            </span>
                            <input type="text" class="form-control form-control-sm border" id="discounted_price_edt" readonly>
                        </div>
                    </div>

                    <!-- 5. FINAL PRICE -->
                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Final Price (incl. tax)</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light">
                                PHP
                            </span>
                            <input type="text" class="form-control form-control-sm border" id="final_price_edt" readonly>
                        </div>
                    </div>

                    <!-- 6. PROFITABILITY -->
                    <div class="mb-3">
                        <label class="form-label small text-muted fw-medium mb-1">Gross Profit per Dish</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light">
                                PHP
                            </span>
                            <input type="text" class="form-control form-control-sm border" id="gross-profit_edt" readonly>
                        </div>
                    </div>

                    <div>
                        <label class="form-label small text-muted fw-medium mb-1">Food Cost %</label>
                        <input type="text" class="form-control form-control-sm border"
                               id="food-cost-percent_edt" readonly>
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
                               <button type="button" class="btn btn-sm btn-primary shadow px-4 py-2 rounded-3 fw-medium" id="btn-add-ingredient_edt" title="Add Ingredient" onclick="addIngredientEdit()">
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

                                   <tbody id="ingredient-body_edt">

                                       <tr>
                                           <td>
                                               <input type="text" class="form-control border border-primary">
                                           </td>

                                           <td>
                                               <input type="number" class="form-control border border-primary ingredient-qty_edt">
                                           </td>

                                           <td>
                                               <select class="form-select border border-primary  ingredient-unit_edt">
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
                                               <div class="input-group input-group-sm">
                                                   <span class="input-group-text bg-light">
                                                       PHP
                                                   </span>
                                                   <input type="text" class="form-control border border-primary ingredient-cost_edt with-comma">
                                               </div>
                                           </td>

                                           <td>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text bg-light">
                                                        PHP
                                                    </span>
                                                    <input type="text" class="form-control border border-secondary ingredient-amount_edt with-comma" readonly>
                                                </div>
                                           </td>

                                           <td class="text-center">
                                               <a href="#" class="text-danger  btn-remove-ingredient_edt">
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
                               <div class="input-group input-group-sm">
                                   <span class="input-group-text bg-light">
                                       PHP
                                   </span>
                                <input type="text" class="form-control form-control-sm border border-secondary" id="total-recipe-cost_edt" readonly required>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <label class="form-label small text-muted fw-medium mb-1">
                                   Prep Time
                               </label>
                               <div class="input-group input-group-sm">
                                   <select class="form-select border border-primary time-hours" id="prep_hours_edt">
                                       <option value="0">0</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="5">5</option>
                                       <option value="6">6</option>
                                       <option value="7">7</option>
                                       <option value="8">8</option>
                                       <option value="9">9</option>
                                       <option value="10">10</option>
                                       <option value="11">11</option>
                                       <option value="12">12</option>
                                   </select>
                                   <span class="input-group-text">Hour(s)</span>

                                   <select class="form-select border border-primary time-minutes" id="prep_minutes_edt">
                                       <option value="0">0</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="5">5</option>
                                       <option value="6">6</option>
                                       <option value="7">7</option>
                                       <option value="8">8</option>
                                       <option value="9">9</option>
                                       <option value="10">10</option>
                                       <option value="11">11</option>
                                       <option value="12">12</option>
                                       <option value="13">13</option>
                                       <option value="14">14</option>
                                       <option value="15">15</option>
                                       <option value="16">16</option>
                                       <option value="17">17</option>
                                       <option value="18">18</option>
                                       <option value="19">19</option>
                                       <option value="20">20</option>
                                       <option value="21">21</option>
                                       <option value="22">22</option>
                                       <option value="23">23</option>
                                       <option value="24">24</option>
                                       <option value="25">25</option>
                                       <option value="26">26</option>
                                       <option value="27">27</option>
                                       <option value="28">28</option>
                                       <option value="29">29</option>
                                       <option value="30">30</option>
                                       <option value="31">31</option>
                                       <option value="32">32</option>
                                       <option value="33">33</option>
                                       <option value="34">34</option>
                                       <option value="35">35</option>
                                       <option value="36">36</option>
                                       <option value="37">37</option>
                                       <option value="38">38</option>
                                       <option value="39">39</option>
                                       <option value="40">40</option>
                                       <option value="41">41</option>
                                       <option value="42">42</option>
                                       <option value="43">43</option>
                                       <option value="44">44</option>
                                       <option value="45">45</option>
                                       <option value="46">46</option>
                                       <option value="47">47</option>
                                       <option value="48">48</option>
                                       <option value="49">49</option>
                                       <option value="50">50</option>
                                       <option value="51">51</option>
                                       <option value="52">52</option>
                                       <option value="53">53</option>
                                       <option value="54">54</option>
                                       <option value="55">55</option>
                                       <option value="56">56</option>
                                       <option value="57">57</option>
                                       <option value="58">58</option>
                                       <option value="59">59</option>
                                   </select>
                                   <span class="input-group-text">Min(s)</span>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <label class="form-label small text-muted fw-medium mb-1" class="form-label">Cook Time</label>
                               <div class="input-group input-group-sm">
                                   <select class="form-select border border-primary time-hours" id="cooking_hours_edt">
                                       <option value="0">0</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="5">5</option>
                                       <option value="6">6</option>
                                       <option value="7">7</option>
                                       <option value="8">8</option>
                                       <option value="9">9</option>
                                       <option value="10">10</option>
                                       <option value="11">11</option>
                                       <option value="12">12</option>
                                   </select>
                                   <span class="input-group-text">Hour(s)</span>

                                   <select class="form-select border border-primary time-minutes" id="cooking_minutes_edt">
                                       <option value="0">0</option>
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="5">5</option>
                                       <option value="6">6</option>
                                       <option value="7">7</option>
                                       <option value="8">8</option>
                                       <option value="9">9</option>
                                       <option value="10">10</option>
                                       <option value="11">11</option>
                                       <option value="12">12</option>
                                       <option value="13">13</option>
                                       <option value="14">14</option>
                                       <option value="15">15</option>
                                       <option value="16">16</option>
                                       <option value="17">17</option>
                                       <option value="18">18</option>
                                       <option value="19">19</option>
                                       <option value="20">20</option>
                                       <option value="21">21</option>
                                       <option value="22">22</option>
                                       <option value="23">23</option>
                                       <option value="24">24</option>
                                       <option value="25">25</option>
                                       <option value="26">26</option>
                                       <option value="27">27</option>
                                       <option value="28">28</option>
                                       <option value="29">29</option>
                                       <option value="30">30</option>
                                       <option value="31">31</option>
                                       <option value="32">32</option>
                                       <option value="33">33</option>
                                       <option value="34">34</option>
                                       <option value="35">35</option>
                                       <option value="36">36</option>
                                       <option value="37">37</option>
                                       <option value="38">38</option>
                                       <option value="39">39</option>
                                       <option value="40">40</option>
                                       <option value="41">41</option>
                                       <option value="42">42</option>
                                       <option value="43">43</option>
                                       <option value="44">44</option>
                                       <option value="45">45</option>
                                       <option value="46">46</option>
                                       <option value="47">47</option>
                                       <option value="48">48</option>
                                       <option value="49">49</option>
                                       <option value="50">50</option>
                                       <option value="51">51</option>
                                       <option value="52">52</option>
                                       <option value="53">53</option>
                                       <option value="54">54</option>
                                       <option value="55">55</option>
                                       <option value="56">56</option>
                                       <option value="57">57</option>
                                       <option value="58">58</option>
                                       <option value="59">59</option>
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
                <span class="btn-text-account">Save Changes</span>
            </button>
            <button type="reset" class="btn btn-light px-4 py-2 rounded-3 fw-medium" onclick="returnForm1()">
                Cancel
            </button>
        </div>
    </div>
</form>





<script>
    
        // Function to add new row of ingredient form
        function addIngredientEdit() {
            var template = document.getElementById('ingredient-template_edit');
            var clone = template.content.cloneNode(true);
            document
                .getElementById('ingredient-body_edt')
                .prepend(clone);
        }

    /*Script to delete selected row*/
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-remove-ingredient_edt');
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

        document.getElementById('menu_category_edt').addEventListener('change', function () {

            var subCategory = document.getElementById('menu_subcategory_edt');

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
                   e.target.classList.contains('ingredient-qty_edt') ||
                   e.target.classList.contains('ingredient-cost_edt')
               )
           ) {

               calculateRowAmount(row);
               calculateRecipeTotals();
               calculatePricing();
           }

           // Recompute costing section
           if (
               e.target.id === 'yield_qty_edt' ||
               e.target.id === 'selling_price_edt' ||
               e.target.id === 'labor_cost_edt' ||
               e.target.id === 'discounted_percentage_edt' ||
               e.target.id === 'valueadded_tax_edt'
           ) {
               calculatePricing();
           }
       });


       $(document).on("click", ".btn-remove-ingredient_edt", function () {

           $(this).closest("tr").remove();

           // IMPORTANT: recalculate after DOM change
           calculateRecipeTotals();
           calculatePricing();

       });

       function calculateRowAmount(row) {

           let qty = parseFloat(
               row.querySelector('.ingredient-qty_edt')?.value || 0
           );

           let cost = parseFloat(
               String(
                   row.querySelector('.ingredient-cost_edt')?.value || 0
               ).replace(/,/g, '')
           );

           let amount = qty * cost;

           row.querySelector('.ingredient-amount_edt').value =
               amount.toFixed(2);
       }

       function calculateRecipeTotals() {

           let total = 0;

           document.querySelectorAll('.ingredient-amount_edt').forEach(function (el) {

               total += parseFloat(
                   String(el.value || 0).replace(/,/g, '')
               ) || 0;

           });

           document.getElementById('total-recipe-cost_edt').value =
               total.toFixed(2);

           return total;
       }

       function calculatePricing() {

           let totalRecipeCost = calculateRecipeTotals();

           let yieldQty = getNumber('yield_qty_edt');
           let sellingPrice = getNumber('selling_price_edt');
           let laborCost = getNumber('labor_cost_edt');
           let vatRate = getNumber('valueadded_tax_edt');
           let discountPercent = getNumber('discounted_percentage_edt');

           // =========================
           // COST PER SERVING
           // =========================
           let costPerServing =
               yieldQty > 0
                   ? totalRecipeCost / yieldQty
                   : 0;

           document.getElementById('cost-per-serving_edt').value =
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

           document.getElementById('discounted_price_edt').value =
               discountedPrice.toFixed(2);

           // =========================
           // VAT
           // =========================
           let finalPrice =
               discountedPrice +
               (discountedPrice * vatRate / 100);

           document.getElementById('final_price_edt').value =
               finalPrice.toFixed(2);

           // =========================
           // GROSS PROFIT
           // =========================
           let grossProfit =
               finalPrice - actualCost;

           let grossProfitEl = document.getElementById('gross-profit_edt');

           grossProfitEl.value = grossProfit.toFixed(2);

           // =========================
           // BORDER COLOR CONDITION
           // =========================
           if (grossProfit < 0) {
               grossProfitEl.classList.add("border-danger");
               grossProfitEl.classList.remove("border-success");
           } else {
               grossProfitEl.classList.remove("border-danger");
               grossProfitEl.classList.add("border-success");
           }

           // =========================
           // FOOD COST %
           // =========================
           let foodCostPercent =
               finalPrice > 0
                   ? (actualCost / finalPrice) * 100
                   : 0;

           document.getElementById('food-cost-percent_edt').value =
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