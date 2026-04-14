$(document).ready(function(){
    loadFoodMenusSetup();
});


function loadFoodMenusSetup() {
    $.post("dirs/menu_setup/components/main.php", {
    }, function (data){
        $("#load_FoodMenus").html(data);

        loadAppetizers();
    });
}


/*Function Create Appetizer form*/
function addAppetizer() {
    $("#mdl-add-appetizer").modal('show');
}

/*Function Create Beverage form*/
function addBeverage() {
    $("#mdl-add-beverage").modal('show');
}


/*Function Create Breakfast form*/
function addBreakFast() {
    $("#mdl-add-breakfast").modal('show');
}


/*Function Create Dessert form*/
function addDessert() {
    $("#mdl-add-dessert").modal('show');
}

/*Function Create Dessert form*/
function adMaincourse() {
    $("#mdl-add-maincourse").modal('show');
}

/*Function Create Pasta form*/
function addPasta() {
    $("#mdl-add-pasta").modal('show');
}

/*Function Create Pastry form*/
function addPastry() {
    $("#mdl-add-pastry").modal('show');
}

/*Function Create Salad form*/
function addSalads() {
    $("#mdl-add-salad").modal('show');
}

/*Function Create Snack form*/
function addSnack() {
    $("#mdl-add-snack").modal('show');
}

/*Function Create Soup form*/
function addSoup() {
    $("#mdl-add-soup").modal('show');
}

/*Function Create vegetable form*/
function addVegetable() {
    $("#mdl-add-vegetables").modal('show');
}



