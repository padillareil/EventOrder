$(document).ready(function(){
    loadFoodMenusSetup();
});


function loadFoodMenusSetup() {
    $.post("dirs/menu_setup/components/main.php", {
    }, function (data){
        $("#load_FoodMenus").html(data);
        loadAppetizers();
        loadBeverage();
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
                  text: "Updated successfully"
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
                  text: "successfully."
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
                  text: "successfully."
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
                  text: "successfully."
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
