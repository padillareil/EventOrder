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





/*Function dipslay proposal for ingredient*/
 var CurrentPageIng = 1;
 var PageSizeing = 20;
 var totalPagesing = 1;
 var isPackageModeing = false;
 var selectedItemsing = [];


 function loadIngredients(page = 1) {
     CurrentPageIng = page; 
     var srvdisplay = $("#load_IngredientsLists");
     srvdisplay.html(`
             <tr>
                 <td colspan="5" class="p-5 text-center text-muted">
                     <div class="spinner-border text-dark"></div>
                     <div class="mt-2">Loading...</div>
                 </td>
             </tr>
     `);
     var Searching = $("#search-ingredients").val();
     $.post("dirs/costing_menu/actions/get_ingredients.php", {
         CurrentPageIng,
         PageSizeing,
         Searching
     }, function (data) {
         let response;

         try {
             response = JSON.parse(data);
         } catch (e) {
             srvdisplay.html(`<div class="text-dark text-center py-4">Server Error</div>`);
             return;
         }
         if ($.trim(response.isSuccess) === "success") {
             IngredientContent(response.Data);
             totalPagesing = (response.Data && response.Data.length > 0)
                 ? parseInt(response.Data[0].TotalPagesing)
                 : 1;

                 IngredientsPaginationUi();
                 IngredientspageNumber();
         } else {
             emptyStateIngredient("No Record Found.");
         }
     });
 }


 function IngredientContent(data) {
     const srvdisplay = $("#load_IngredientsLists");

     if (!data || data.length === 0) {
         showEmptyStateIngredient("No available.");
         return;
     }

     srvdisplay.empty();

     data.forEach((srv, index) => {

         srvdisplay.append(`
             <tr data-index="${index}">

                 <td class="ps-4 font-monospace fw-semibold text-dark">
                     ${srv.OrderNumber || '--'}
                 </td>

                 <td class="fw-bold text-dark">
                     ${srv.Ingredient || '--'}
                 </td>

                 <td class="text-dark fw-medium">
                     ${srv.Item_Uom || '--'}
                 </td>

                 <!-- UNIT COST (EDITABLE) -->
                 <td>
                     <input type="number"
                            class="form-control form-control-sm unit-cost text-end"
                            value="${srv.Unit_Cost || 0}" disabled>
                 </td>

                 <!-- AMOUNT (AUTO CALCULATED BUT EDITABLE IF YOU WANT) -->
                 <td>
                     <input type="number"
                            class="form-control form-control-sm amount text-end"
                            value="${srv.Unit_Amnt || 0}" disabled>
                 </td>

                 <!-- ACTIONS -->
                 <td class="text-end pe-4">

                     <button class="btn btn-sm btn-outline-primary btn-edit">
                         <i class="bi bi-pencil"></i>
                     </button>

                     <button class="btn btn-sm btn-outline-danger btn-delete">
                         <i class="bi bi-trash"></i>
                     </button>

                 </td>

             </tr>
         `);
     });
 }




 /*Function for no record of beverages*/
 function showEmptyStateIngredient(message = "No pending ingredients found") {
     $("#load_IngredientsLists").html(`
     <tr>
         <td colspan="6" class="text-center p-4">
             <div class="fw-semibold text-dark">${message}</div>
             <div class="text-muted small">There are no records to display.</div>
         </td>
     </tr>
     `);
 }

 /*Function for no record of beverages*/
 function showEmptyStateIngredient(message = "No pending ingredients found") {
     $("#load_IngredientsLists").html(`
     <tr>
         <td colspan="6" class="text-center p-4">
             <div class="fw-semibold text-dark">${message}</div>
             <div class="text-muted small">There are no records to display.</div>
         </td>
     </tr>
     `);
 }


 /*Function to count page number page 1 of and so on*/
 function IngredientsPaginationUi() {
     $("#page-info-ingredients").text("Page " + CurrentPageIng + " of " + totalPagesing);
     if (CurrentPageIng <= 1) {
         $("#li-prev-ingredients").addClass("disabled");
     } else {
         $("#li-prev-ingredients").removeClass("disabled");
     }

     if (CurrentPageIng >= totalPagesing) {
         $("#li-next-ingredients").addClass("disabled");
     } else {
         $("#li-next-ingredients").removeClass("disabled");
     }
 }

 /*Function to build list of pagination*/
 function IngredientspageNumber() {
     $("#pagination-ingredients li.page-number-ingredients").remove();
     let prevLi = $("#li-prev-ingredients");
     let maxVisible = 5;
     let start = Math.max(1, CurrentPageIng - 2);
     let end = Math.min(totalPagesing, start + maxVisible - 1);
     if (end - start < maxVisible - 1) {
         start = Math.max(1, end - maxVisible + 1);
     }
     if (start > 1) {
         insertPageIngredient(1, prevLi);
         prevLi = prevLi.next();

         if (start > 2) {
             prevLi.after(`<li class="page-item page-number-ingredients disabled"><span class="page-link">...</span></li>`);
             prevLi = prevLi.next();
         }
     }
     for (let i = start; i <= end; i++) {
         insertPageIngredient(i, prevLi);
         prevLi = prevLi.next();
     }
     if (end < totalPagesing) {
         if (end < totalPagesing - 1) {
             prevLi.after(`<li class="page-item page-number-ingredients disabled"><span class="page-link">...</span></li>`);
             prevLi = prevLi.next();
         }
         insertPageIngredient(totalPagesing, prevLi);
     }
     function insertPageIngredient(i, ref) {
         let activeClass = (i === CurrentPageIng) ? "active" : "";

         let li = `
             <li class="page-item page-number-ingredients ${activeClass}">
                 <a class="page-link" href="#" data-page="${i}">${i}</a>
             </li>
         `;

         $(li).insertAfter(ref);
     }
 }