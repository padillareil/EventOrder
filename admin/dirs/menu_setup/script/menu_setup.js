$(document).ready(function(){
    loadFoodMenusSetup();
});


function loadFoodMenusSetup() {
    $.post("dirs/menu_setup/components/main.php", {
    }, function (data){
        $("#load_FoodMenus").html(data);
        loadAppetizers();
        loadBeverage();
        loadBreakfast();
        loadDessert();
        loadMainCourse();
        loadPastry();
        loadPasta();
        loadSalad();
        loadSnack();
        loadSoup();
        loadVegie();
    });
}


/*Function Create Appetizer form*/
function addAppetizer() {
    $("#mdl-add-appetizer").modal('show');
    $("#btn-submit-appetizer").removeClass('d-none');
}

/*Function Create Beverage form*/
function addBeverage() {
    $("#mdl-add-beverage").modal('show');
    $("#btn-submit-beverage").removeClass('d-none');
}


/*Function Create Breakfast form*/
function addBreakFast() {
    $("#mdl-add-breakfast").modal('show');
    $("#btn-submit-breakfast").removeClass('d-none');
}


/*Function Create Dessert form*/
function addDessert() {
    $("#mdl-add-dessert").modal('show');
    $("#btn-submit-dessert").removeClass('d-none');
}

/*Function Create Dessert form*/
function adMaincourse() {
    $("#mdl-add-maincourse").modal('show');
    $("#btn-submit-maincourse").removeClass('d-none');
}

/*Function Create Pasta form*/
function addPasta() {
    $("#mdl-add-pasta").modal('show');
    $("#btn-submit-pasta").removeClass('d-none');
}

/*Function Create Pastry form*/
function addPastry() {
    $("#mdl-add-pastry").modal('show');
    $("#btn-submit-pastry").removeClass('d-none');
}

/*Function Create Salad form*/
function addSalads() {
    $("#mdl-add-salad").modal('show');
    $("#btn-submit-salad").removeClass('d-none');
}

/*Function Create Snack form*/
function addSnack() {
    $("#mdl-add-snack").modal('show');
    $("#btn-submit-snack").removeClass('d-none');
}

/*Function Create Soup form*/
function addSoup() {
    $("#mdl-add-soup").modal('show');
    $("#btn-submit-soup").removeClass('d-none');
}

/*Function Create vegetable form*/
function addVegetable() {
    $("#mdl-add-vegetables").modal('show');
    $("#btn-submit-vegetables").removeClass('d-none');
}

/*Function create a Food package for Event*/
function createPackage() {
    $.post("dirs/menu_setup/package_form.php", {
    }, function (data){
        $("#foodpackage_content").html(data);
    });
}


function loadMenuPackage() {
  $.post("dirs/menu_setup/components/food_package.php", {
  }, function (data){
      $("#foodpackage_content").html(data);
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
