$(document).ready(function(){
    loadFoodMenusSetup();
});


function loadFoodMenusSetup() {
    $.post("dirs/menu_setup/components/main.php", {
    }, function (data){
        $("#load_FoodMenus").html(data);
        loadMenuPackageTemplate();
        loadAppetizers();
        loadCustomMenu();
    });
}


/*Function Create Appetizer form*/
function addAppetizer() {
    $("#mdl-add-appetizer").modal('show');
    $("#btn-submit-appetizer").removeClass('d-none');
    $("#btn-cancel-appetizer").click();
}

$("#frm-add-appetizer").on("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        return false;
    }
});

/*Function Create Beverage form*/
function addBeverage() {
    $("#mdl-add-beverage").modal('show');
    $("#btn-submit-beverage").removeClass('d-none');
    $("#btn-cancel-beverage").click();
}

$("#frm-add-beverage").on("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        return false;
    }
});


/*Function Create Breakfast form*/
function addBreakFast() {
    $("#mdl-add-breakfast").modal('show');
    $("#btn-submit-breakfast").removeClass('d-none');
    $("#btn-cancel-breakfast").click();
}

$("#frm-add-breakfast").on("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        return false;
    }
});


/*Function Create Dessert form*/
function addDessert() {
    $("#mdl-add-dessert").modal('show');
    $("#btn-submit-dessert").removeClass('d-none');
    $("#btn-cancel-dessert").click();

}

$("#frm-add-dessert").on("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        return false;
    }
});

/*Function Create Dessert form*/
function adMaincourse() {
    $("#mdl-add-maincourse").modal('show');
    $("#btn-submit-maincourse").removeClass('d-none');
    $("#btn-cancel-maincourse").click();
}

$("#frm-add-maincourse").on("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        return false;
    }
});


/*Function Create Pasta form*/
function addPasta() {
    $("#mdl-add-pasta").modal('show');
    $("#btn-submit-pasta").removeClass('d-none');
    $("#btn-cancel-pasta").click();
}

$("#frm-add-pasta").on("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        return false;
    }
});


/*Function Create Pastry form*/
function addPastry() {
    $("#mdl-add-pastry").modal('show');
    $("#btn-submit-pastry").removeClass('d-none');
    $("#btn-cancel-pastry").click();
}

$("#frm-add-pastry").on("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        return false;
    }
});

/*Function Create Salad form*/
function addSalads() {
    $("#mdl-add-salad").modal('show');
    $("#btn-submit-salad").removeClass('d-none');
    $("#btn-cancel-salad").click();
}

$("#frm-add-salad").on("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        return false;
    }
});

/*Function Create Snack form*/
function addSnack() {
    $("#mdl-add-snack").modal('show');
    $("#btn-submit-snack").removeClass('d-none');
    $("#btn-cancel-snack").click();
}

$("#frm-add-snack").on("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        return false;
    }
});

/*Function Create Soup form*/
function addSoup() {
    $("#mdl-add-soup").modal('show');
    $("#btn-submit-soup").removeClass('d-none');
    $("#btn-cancel-soup").click();
}

$("#frm-add-soup").on("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        return false;
    }
});

/*Function Create vegetable form*/
function addVegetable() {
    $("#mdl-add-vegetables").modal('show');
    $("#btn-submit-vegetables").removeClass('d-none')
    $("#btn-cancel-vegetables").click();
}

$("#frm-add-vegetables").on("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        return false;
    }
});


function loadMenuPackage() {
  $.post("dirs/menu_setup/components/food_package.php", {
  }, function (data){
      $("#foodpackage_content").html(data);
      loadMenuPackageTemplate();
  });
}

/*Function to load on custom menu*/
function loadCustomMenu() {
  $.post("dirs/menu_setup/components/custom_menu.php", {
  }, function (data){
      $("#foodpackage_content").html(data);
      loadCustomMenu();
  });
}

/*Function to add Custom Menu Modal*/
function addCustomMenu() {
    $("#btn-submit-custom").removeClass('d-none');
    $("#btn-update-custom").addClass('d-none');
    $("#mdl-add-customenu").modal('show');
    $("#cutommenu-title").text('New Custom Menu');
    $("#cutommenu-description").text('Add a special order to custom menu list.');
    loadFoodCategories(); // no selected value
}


/*Appetizers------------aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa*/

/*Function to update details*/
function mdleditAppetizer(LineNum){
    $("#mdl-add-appetizer").modal('show');
    $("#btn-update-appetizer").removeClass('d-none');
    $("#btn-submit-appetizer").addClass('d-none');

    $.post("dirs/menu_setup/actions/get_menu.php",{
        LineNum : LineNum
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#appetizer-id").val(response.Data.LineNum);
            $("#appetizer-name").val(response.Data.DishName);
            $("#appetizer-description").val(response.Data.Description);
            $("#appetizer-ingredients").val(response.Data.Ingredients);
        }else{
            Swal.fire({
                icon: 'warning',
                title: 'Notice',
                text: $.trim(response.Data)
            });
        }
    });
}

/*Function update Appetizer details*/
  $("#btn-update-appetizer").on("click", function () {
      let $btn = $(this);
      let $spinner = $("#btn-spinner-appetizer-upd");
      let $text = $btn.find(".btn-text-appetizer");
      let $btnCancel = $("#btn-cancel-appetizer");
      let LineNum     = $("#appetizer-id").val();
      let DishName    = $("#appetizer-name").val();
      let Description = $("#appetizer-description").val();
      let Ingredients = $("#appetizer-ingredients").val();
      $btn.prop("disabled", true);
      $btnCancel.prop("disabled", true);
      $spinner.removeClass("d-none");
      $text.text("Updating...");
      $.post("dirs/menu_setup/actions/update_menu.php", {
          LineNum: LineNum,
          DishName: DishName,
          Description: Description,
          Ingredients: Ingredients
      })
      .done(function (data) {
          if ($.trim(data) === "success") {
              $("#mdl-add-appetizer").modal("hide");
              Swal.fire({
                  icon: "success",
                  title: "Success",
                  text: "Updated successfully",
                  showConfirmButton: false,
                  timer: 2000,
                  timerProgressBar: true
              });
              loadAppetizers(CurrentPage);
          } else {
              Swal.fire({
                  icon: "error",
                  title: "Oops!",
                  text: data
              });
          }

      })
      .fail(function () {

          Swal.fire({
              icon: "error",
              title: "Error",
              text: "Server error occurred"
          });

      })
      .always(function () {
          $btn.prop("disabled", false);
          $btnCancel.prop("disabled", false);
          $spinner.addClass("d-none");
          $text.text("Update");

      });

  });

  /*Function to remove this menu prompt*/
  function removemdlAppetizer(LineNum) {
      Swal.fire({
          title: "Remove this menu.",
          text: "This menu will be permanently removed.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#6c757d",
          confirmButtonText: "Remove",
          cancelButtonText: "Cancel"
      }).then((result) => {
          if (result.isConfirmed) {
              removeAppetizer(LineNum);
          }
      });
  }

  /*Function to remove script*/
  function removeAppetizer(LineNum){
      $.post("dirs/menu_setup/actions/delete_menu.php", {
          LineNum : LineNum
      },function(data){
          if(jQuery.trim(data) == "success"){
              loadAppetizers(CurrentPage);
              Swal.fire({
                  icon: "success",
                  title: "Menu Removed",
                  text: "successfully.",
                  showConfirmButton: false,
                  timer: 2000,
                  timerProgressBar: true
              });  
          }else{
               Swal.fire({
                  icon: "error",
                  title: "Oops!",
                  text: data
              });
          }
      });
  }

  /*Function enable menu*/
  function enableAppetizer(LineNum){
    var Status = 'Active';
      $.post("dirs/menu_setup/actions/update_status.php", {
          LineNum : LineNum,
          Status : Status
      },function(data){
          if(jQuery.trim(data) == "success"){
              loadAppetizers(CurrentPage);
              Swal.fire({
                  icon: "success",
                  title: "Menu Active",
                  text: "successfully.",
                  showConfirmButton: false,
                  timer: 2000,
                  timerProgressBar: true
              });  
          }else{
               Swal.fire({
                  icon: "error",
                  title: "Oops!",
                  text: data
              });
          }
      });
  }

  /*Function enable menu*/
  function disableAppetizer(LineNum){
    var Status = 'In-Active';
      $.post("dirs/menu_setup/actions/update_status.php", {
          LineNum : LineNum,
          Status : Status
      },function(data){
          if(jQuery.trim(data) == "success"){
              loadAppetizers(CurrentPage);
              Swal.fire({
                  icon: "success",
                  title: "Menu In-Active",
                  text: "successfully.",
                  showConfirmButton: false,
                  timer: 2000,
                  timerProgressBar: true
              });  
          }else{
               Swal.fire({
                  icon: "error",
                  title: "Oops!",
                  text: data
              });
          }
      });
  }

  /*Appetizers------------aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa*/

/*Checkbox List of Menus for Creating a Venu Package*/
  function loadMenuList() {
    showLoaderMenulist();
    $.ajax({
      url: "dirs/menu_setup/actions/get_package_menulist.php",
      type: "POST",
      data: {},
      timeout: 8000,
      success: function (data) {
        try {
          const response = JSON.parse(data);
          if ($.trim(response.isSuccess) === "success") {
            let menus = response.Data;
            menus.sort((a, b) => {
              return a.DishGroup.localeCompare(b.DishGroup) || a.DishName.localeCompare(b.DishName);
            });
            let html = "";
            let currentGroup = null;
            menus.forEach(item => {
              const isInactive = item.DishStatus === "In-Active";
              if (currentGroup !== item.DishGroup) {
                if (currentGroup !== null) {
                  html += `</div></div>`;
                }
                html += `
                  <div class="mb-3 border rounded-4">

                    <div class="px-4 pt-3 pb-2 border-bottom bg-success text-white">
                      <h6 class="fw-bold mb-0 text-uppercase small">
                        ${item.DishGroup}
                      </h6>
                    </div>
                    <div class="list-group list-group-flush">
                `;
                currentGroup = item.DishGroup;
              }
              html += `
                <label class="list-group-item px-4 py-3 selection-row ${isInactive ? 'inactive-item' : ''}">
                  <div class="form-check mb-0">
                    <input class="form-check-input border border-primary me-3" type="checkbox" name="menu-variant" value="${item.LineNum}"
                      ${isInactive ? "disabled" : ""}>
                    <span class="fw-semibold text-dark ${isInactive ? 'text-muted text-decoration-line-through' : ''}">
                      ${item.DishName}
                    </span>
                  </div>
                </label>
              `;
            });
            if (currentGroup !== null) {
              html += `</div></div>`;
            }
            $("#food-event-menulist").html(html);
          } else {
            showErrorMenuList();
          }
        } catch (e) {
          showErrorMenuList();
        }
      },
      error: function () {
        showErrorMenuList();
      }
    });
  }

/*Function loader for prepareing*/
  function showLoaderMenulist() {
    $("#food-event-menulist").html(`
      <div class="d-flex flex-column align-items-center justify-content-center py-5 text-muted">
        <div class="spinner-border text-dark mb-3" role="status"></div>
        <div class="small">Loading menu...</div>
      </div>
    `);
  }

  function showErrorMenuList() {
    $("#food-event-menulist").html(`
      <div class="text-center py-5 text-muted">
        <i class="bi bi-wifi-off fs-4 mb-3"></i>
        <div class="fw-semibold">Slow Network</div>
        <div class="small mb-3">Please reload again</div>
        <button class="btn btn-link" onclick="loadMenuList()">
          <i class="bi bi-arrow-clockwise text-dark me-1"></i>
        </button>
      </div>
    `);
  }

  /*Function Count total package created*/
  function totalPackage() {
      $.post("dirs/menu_setup/actions/get_menupackage_count.php", {}, function (data) {
          let response = JSON.parse(data);
          if ($.trim(response.isSuccess) === "success") {
              let total = response.Data.TotalPackage;
              $("#total-package-created").text(total + " Total");
          } else {
              console.log($.trim(response.Data));
          }
      });
  }

  
  /*Function to create Venue Package*/
  function addPackage() {
      $("#mdl-add-package").modal('show');
      const display = $("#food_categories_display");
      display.html(`
          <div class="text-center p-4 text-muted">
              <div class="spinner-border text-dark"></div>
              <div class="mt-2">Loading categories...</div>
          </div>
      `);
      $("#package-title").text('New Food Package');
      $("#package-description").text('Add package setup to food package list.');
      $("#btn-submit-package").removeClass('d-none');
      $("#btn-update-package").addClass('d-none');
      $.post("dirs/menu_setup/actions/get_foodcategory.php", {}, function (data) {
          let response;
          try {
              response = JSON.parse(data);
          } catch (e) {
              display.html(`<div class="text-danger text-center">Server Error</div>`);
              return;
          }
          if ($.trim(response.isSuccess) === "success") {
            $("#package-number").val(response.PackageCode.PKGNumber);
              let categories = response.Data;
              if (!categories || categories.length === 0) {
                  display.html(`<div class="text-muted text-center">No categories found</div>`);
                  return;
              }
              let html = `<div class="row g-2">`;
              categories.forEach(cat => {
                  let id = `cat-${cat.Mid}`;
                  html += `
                      <div class="row align-items-center mb-2 category-row">
                          <div class="col">
                              <div class="form-check d-flex align-items-center">
                                  <input type="checkbox" id="${id}" class="form-check-input category-checkbox me-2" name="" value="${cat.Category}">
                                  <label for="${id}" class="form-check-label mb-0">
                                      ${cat.Category}
                                  </label>
                              </div>
                          </div>
                          <div class="col-auto">
                              <div class="quantity-wrapper d-none">
                                  <input type="number" class="form-control form-control-sm category-qty" style="width: 80px;" placeholder="0" min="1">
                              </div>
                          </div>
                      </div>
                  `;
              });
              html += `</div>`;
              display.html(html);
          } else {
              display.html(`<div class="text-danger text-center">${response.Data}</div>`);
          }
      });
  }





