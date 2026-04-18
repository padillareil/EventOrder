$(document).ready(function(){
    loadFoodMenusSetup();
});


function loadFoodMenusSetup() {
    $.post("dirs/menu_setup/components/main.php", {
    }, function (data){
        $("#load_FoodMenus").html(data);
        loadMenuPackageTemplate();
        loadAppetizers();
    });
}


/*Function Create Appetizer form*/
function addAppetizer() {
    $("#mdl-add-appetizer").modal('show');
    $("#btn-submit-appetizer").removeClass('d-none');
    $("#btn-cancel-appetizer").click();
}

/*Function Create Beverage form*/
function addBeverage() {
    $("#mdl-add-beverage").modal('show');
    $("#btn-submit-beverage").removeClass('d-none');
    $("#btn-cancel-beverage").click();
}


/*Function Create Breakfast form*/
function addBreakFast() {
    $("#mdl-add-breakfast").modal('show');
    $("#btn-submit-breakfast").removeClass('d-none');
    $("#btn-cancel-breakfast").click();
}


/*Function Create Dessert form*/
function addDessert() {
    $("#mdl-add-dessert").modal('show');
    $("#btn-submit-dessert").removeClass('d-none');
    $("#btn-cancel-dessert").click();

}

/*Function Create Dessert form*/
function adMaincourse() {
    $("#mdl-add-maincourse").modal('show');
    $("#btn-submit-maincourse").removeClass('d-none');
    $("#btn-cancel-maincourse").click();
}

/*Function Create Pasta form*/
function addPasta() {
    $("#mdl-add-pasta").modal('show');
    $("#btn-submit-pasta").removeClass('d-none');
    $("#btn-cancel-pasta").click();
}

/*Function Create Pastry form*/
function addPastry() {
    $("#mdl-add-pastry").modal('show');
    $("#btn-submit-pastry").removeClass('d-none');
    $("#btn-cancel-pastry").click();
}

/*Function Create Salad form*/
function addSalads() {
    $("#mdl-add-salad").modal('show');
    $("#btn-submit-salad").removeClass('d-none');
    $("#btn-cancel-salad").click();
}

/*Function Create Snack form*/
function addSnack() {
    $("#mdl-add-snack").modal('show');
    $("#btn-submit-snack").removeClass('d-none');
    $("#btn-cancel-snack").click();
}

/*Function Create Soup form*/
function addSoup() {
    $("#mdl-add-soup").modal('show');
    $("#btn-submit-soup").removeClass('d-none');
    $("#btn-cancel-soup").click();
}

/*Function Create vegetable form*/
function addVegetable() {
    $("#mdl-add-vegetables").modal('show');
    $("#btn-submit-vegetables").removeClass('d-none')
    $("#btn-cancel-vegetables").click();
}

/*Function create a Food package for Event*/
function createPackage() {
    $.post("dirs/menu_setup/package_form.php", {
    }, function (data){
        $("#foodpackage_content").html(data);
      loadMenuList();
      loadMenuPackageTemplate();
    });
}


function loadMenuPackage() {
  $.post("dirs/menu_setup/components/food_package.php", {
  }, function (data){
      $("#foodpackage_content").html(data);
      loadMenuPackageTemplate();
  });
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