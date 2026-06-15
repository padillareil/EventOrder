$(document).ready(function(){
    loadCosting();
});



/*Skeleton Fallback if system interupted or error loading page*/
function showSkeletonDashboard() {
    const template = document.getElementById("sekeleton-dashboard");
    $("#loadCosting_content").html(template.innerHTML);
}

function loadCosting() {
    showSkeletonDashboard();
    $.post("dirs/costing_menu/components/main.php", {}, function (data) {
        let result = $.trim(data);
        setTimeout(function () {
            if (!result) return;
            $("#loadCosting_content")
                .hide()
                .html(result)
                .fadeIn(500);
        }, 500);
    }).fail(function () {
        showSkeletonDashboard();
    });

}


/*Function load food form*/
function showSkeletonFood() {
    const template = document.getElementById("skeleton-food-form");
    $("#loadCosting_content").html(template.innerHTML);
}

function loadMenuSetup() {
    showSkeletonFood();
    $.post("dirs/costing_menu/components/menu_main.php", {}, function (data) {
        let result = $.trim(data);
        setTimeout(function () {
            if (!result) return;
            $("#loadCosting_content")
                .hide()
                .html(result)
                .fadeIn(500);
    loadItemSKU();
    loadMenus();
    loadIngredients();
        }, 500);

    }).fail(function () {
        showSkeletonFood();
    });

}


/*Function to show menucode*/
function loadItemSKU(){
    $.post("dirs/costing_menu/actions/get_itemcode.php",{
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#itemmenu_code").val(response.Data.ItemStockKeepingUnit).prop("disabled", true);
        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}








/*Function load edit form*/
function modifyMenu(DocEntry) {

    showSkeletonFood();

    $.post("dirs/costing_menu/components/form_ingredient_edit.php", {}, function (data) {

        let result = $.trim(data);

        setTimeout(function () {

            if (!result) return;

            $("#loadCosting_content")
                .hide()
                .html(result)
                .fadeIn(500);

            // Pass DocEntry here
            loadMenuEdit(DocEntry);

        }, 500);

    }).fail(function () {
        showSkeletonFood();
    });

}

/*Function to clean display decimal*/
function cleanDecimal(value) {
    let num = parseFloat(value || 0);
    return Number.isInteger(num) ? num : num.toFixed(2);
}


/*Function retrive menu details*/
function loadMenuEdit(DocEntry){
    $.post("dirs/costing_menu/actions/get_menurecipe.php",{
        DocEntry : DocEntry
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#itemmenu_code_edt").val(response.Data.ItemSKU).prop("disabled", true);
            $("#menu-id").val(response.Data.DocId);
            $("#menu_name_edt").val(response.Data.Recipe_Name);
            $("#menu_category_edt").val(response.Data.Category);
            $("#menu_subcategory_edt").val(response.Data.Sub_Category);
            $("#yield_qty_edt").val(response.Data.Serving_Yield);
            $("#description_edt").val(response.Data.Description);
            $("#selling_price_edt").val(cleanDecimal(response.Data.SRP));
            $("#labor_cost_edt").val(cleanDecimal(response.Data.Labor_Cost));
            $("#cost-per-serving_edt").val(response.Data.CostPer_Serving);
            $("#valueadded_tax_edt").val(cleanDecimal(response.Data.Vat_Rate));
            $("#discounted_percentage_edt").val(response.Data.Status);
            $("#discounted_price_edt").val(cleanDecimal(response.Data.Discounted_Amnt));
            $("#final_price_edt").val(response.Data.Price_wTax);
            $("#gross-profit_edt").val(response.Data.GrossProfit_perDish);
            $("#food-cost-percent_edt").val(response.Data.FoodCost);
            $("#total-recipe-cost_edt").val(response.Data.TotalCost);
            $("#prep_hours_edt").val(response.Data.PrepTime_Hrs);
            $("#prep_minutes_edt").val(response.Data.PrepTime_Mins);
            $("#cooking_hours_edt").val(response.Data.CookTime_Hrs);
            $("#cooking_minutes_edt").val(response.Data.CookTime_Mins);
            $("#ingredient-body_edt").empty();
            $.each(response.Ingredients, function(index, item){
                $("#ingredient-body_edt").append(`
                    <tr>
                        <td>
                            <input type="hidden" class="ingredient-id" value="${item.DocEntry || 0}">
                            <input type="text"
                                class="form-control border border-primary ingredient-name_edt"
                                value="${item.Ingredient || ''}">
                        </td>
                        <td>
                            <input type="number"
                                class="form-control border border-primary ingredient-qty_edt"
                                value="${item.Item_Quantiy || 0}">
                        </td>
                        <td>
                            <select class="form-select border border-primary ingredient-unit_edt">
                                <option value="kg" ${item.Item_Uom == 'kg' ? 'selected' : ''}>kg</option>
                                <option value="g" ${item.Item_Uom == 'g' ? 'selected' : ''}>g</option>
                                <option value="ml" ${item.Item_Uom == 'ml' ? 'selected' : ''}>ml</option>
                                <option value="ltr" ${item.Item_Uom == 'ltr' ? 'selected' : ''}>ltr</option>
                                <option value="tbsp" ${item.Item_Uom == 'tbsp' ? 'selected' : ''}>tbsp</option>
                                <option value="tsp" ${item.Item_Uom == 'tsp' ? 'selected' : ''}>tsp</option>
                                <option value="pcs" ${item.Item_Uom == 'pcs' ? 'selected' : ''}>pcs</option>
                            </select>
                        </td>
                        <td>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light">
                                    PHP
                                </span>
                                <input type="text" class="form-control with-comma border border-primary ingredient-cost_edt" value="${cleanDecimal(item.Unit_Cost || 0)}">
                            </div>
                        </td>
                        <td>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light">
                                    PHP
                                </span>
                                <input type="text" class="form-control with-comma border border-primary ingredient-amount_edt" value="${cleanDecimal(item.Unit_Amnt || 0)}">
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="#" class="text-danger btn-remove-ingredient_edt" onclick="removeIngredient('${item.DocEntry}')">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>
                    </tr>
                `);
            });

        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}





/*Function cancel return to menu tables*/
function returnForm1() {
    loadMenuSetup();
}


/*Function to remove ingredient item*/
function removeIngredient(DocEntry) {
    $.post("dirs/costing_menu/actions/update_ingredientstatus.php", {
        DocEntry   : DocEntry
    }, function(data) {
        if(jQuery.trim(data) === "success") {
        } else {
            console.log(data);
        }
    });
}

