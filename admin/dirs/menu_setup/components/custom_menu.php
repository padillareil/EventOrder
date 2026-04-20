<div class="card mt-2">
	<div class="card-header bg-white border-0 pt-4 px-4 pb-3">
	    <div class="row g-3 align-items-center">
	        <div class="col-12 col-md-6 d-flex align-items-center gap-3">
	            <h5 class="fw-bold mb-0">Custom Menu List</h5>
	        </div>
	        <div class="col-12 col-md-6 d-flex justify-content-md-end">
	            <div class="input-group border mr-2 bg-light px-3 flex-grow-1" style="max-width: 300px;">
	                <span class="input-group-text bg-transparent border-0 p-0 me-2">
	                    <i class="bi bi-search text-muted small"></i>
	                </span>
	                <input type="search" class="form-control bg-transparent border-0 small py-2 shadow-none" id="search-custom_menu" placeholder="Search...">
	            </div>
	            <button class="btn btn-primary" type="button" onclick="addCustomMenu()"><i class="bi bi-plus-lg"></i> Add Custom</button>
	        </div>
	    </div>
	</div>
	<div class="card-body p-0">
	    <div class="table-responsive overflow-auto" style="height: 50vh;">
	        <table class="table table-hover align-middle mb-0">
	            <thead class="sticky-top bg-white border-bottom" style="z-index: 5;">
	                <tr>
	                    <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted" style="width: 80px;">#</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Custom Code</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Menu</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Category</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Description</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Status</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Actions</th>
	                </tr>
	            </thead>
	            <tbody class="border-top-0" id="load_CustomMenu_content">
	            </tbody>
	        </table>
	    </div>
	</div>

	<div class="card-footer">
	    <nav>
	        <ul class="pagination" id="pagination-custommenu">
	            <li class="page-item" id="li-prev-custommenu">
	                <a class="page-link" href="#" id="btn-preview-custommenu">Previous</a>
	            </li>
	            <li class="page-item" id="li-next-custommenu">
	                <a class="page-link" href="#" id="btn-next-custommenu">Next</a>
	            </li>
	        </ul>
	    </nav>
	    <div id="page-info-custommenu" class="mt-3 small text-muted"></div>
	</div>
</div>



<script>
	var CurrentPage = 1;
	var PageSize = 10;
	var totalPages = 1;
	var isPackageMode = false;
	var selectedItems = [];


	function loadCustomMenu(page = 1) {
	    CurrentPage = page; 
	    var display = $("#load_CustomMenu_content");
	    display.html(`
	            <tr>
	                <td colspan="6" class="p-5 text-center text-muted">
	                    <div class="spinner-border text-dark"></div>
	                    <div class="mt-2">Loading...</div>
	                </td>
	            </tr>
	    `);
	    var Search = $("#search-package").val();
	    $.post("dirs/menu_setup/actions/get_pagination_custommenu.php", {
	        CurrentPage,
	        PageSize,
	        Search
	    }, function (data) {
	        let response;

	        try {
	            response = JSON.parse(data);
	        } catch (e) {
	            display.html(`<div class="text-dark text-center py-4">Server Error</div>`);
	            return;
	        }
	        if ($.trim(response.isSuccess) === "success") {
	            CustomMenuContent(response.Data);
	            totalPages = (response.Data && response.Data.length > 0)
	                ? parseInt(response.Data[0].TotalPages)
	                : 1;

	                CustomMenuPaginationUi();
	                CustomMenuPageNumber();
	        } else {
	            emptyStateCustom("venue package was empty.");
	        }
	    });
	}


	function CustomMenuContent(data) {
	    const display = $("#load_CustomMenu_content");
	    if (!data || data.length === 0) {
	        showEmptyStateCustom("No available.");
	        return;
	    }
	    display.empty();

	    data.forEach(custmenu => {
	        display.append(`
	           <tr class="beverage-row align-middle" data-value="${custmenu.Custom_id}">
	               <td class="text-muted fw-medium small">
	                   ${custmenu.OrderNumber}
	               </td>

	               <td class="text-muted text-center small">
	                   ${custmenu.CustomCode || '—'}
	               </td>

	                <td class="text-muted text-center small">
	                    ${custmenu.CustomMenuName || '—'}
	                </td>
	        		<td class="text-muted text-center small">
	        		    ${custmenu.FoodGroup || '—'}
	        		</td>
	        		<td class="text-muted text-center small">
	        		    ${custmenu.Description || '—'}
	        		</td>
	              
	                <td class="text-center">
	                    <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer
	                        ${custmenu.ItemStatus === "Active" ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}"
	                        data-id="${custmenu.Custom_id}"
	                        data-status="${custmenu.ItemStatus}">
	                        ${custmenu.ItemStatus}
	                    </span>
	                </td>

	               <td class="text-center">
	                   <div class="dropdown">
	                       <button class="btn btn-sm btn-icon btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="function() {}alse">
	                           <i class="bi bi-three-dots-vertical"></i>
	                       </button>

	                       <ul class="dropdown-menu dropdown-menu-end shadow-sm">
	                            <li>
	                                <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdlEditCustomM('${custmenu.Custom_id}')">  <i class="bi bi-pencil"></i>  Edit Package
	                                </a>
	                            </li>
	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#"onclick="removemdlCustom('${custmenu.Custom_id}')"> <i class="bi bi-trash"></i> Remove
	                               </a>
	                           </li>

	                           <li>
	                               <hr class="dropdown-divider">
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="enableCustom('${custmenu.Custom_id}')">  <i class="bi bi-toggle-on text-success"></i>  Enable Package
	                               </a>
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="disableCustom('${custmenu.Custom_id}')">  <i class="bi bi-toggle-off text-danger"></i>  Disable Package
	                               </a>
	                           </li>
	                       </ul>
	                   </div>
	               </td>
	           </tr>
	        `);
	    });
	}

	/*Function for no record of beverages*/
	function emptyStateCustom(message) {
	    $("#load_CustomMenu_content").html(`
	        <tr>
	          <td colspan="6" class="p-5 text-center text-muted">
	              <i class="bi bi-card-list text-lg"></i> 
	              <br>
	                  No Venue Package Available!
	        <div class="small opacity-75">${message}</div>
	              </td>
	        </tr>
	    `);
	}

	/*Function for no record of beverages*/
	function showEmptyStateCustom(message) {
	    $("#load_CustomMenu_content").html(`
	        <tr>
	          <td colspan="6" class="p-5 text-center text-muted">
	              <i class="bi bi-card-list text-lg"></i> 
	              <br>
	                  No  Record Found!
	        <div class="small opacity-75">${message}</div>
	              </td>
	        </tr>
	    `);
	}


	/*Function to count page number page 1 of and so on*/
	function CustomMenuPaginationUi() {
	    $("#page-info-custommenu").text("Page " + CurrentPage + " of " + totalPages);
	    if (CurrentPage <= 1) {
	        $("#li-prev-custommenu").addClass("disabled");
	    } else {
	        $("#li-prev-custommenu").removeClass("disabled");
	    }

	    if (CurrentPage >= totalPages) {
	        $("#li-next-custommenu").addClass("disabled");
	    } else {
	        $("#li-next-custommenu").removeClass("disabled");
	    }
	}

	/*Function to build list of pagination*/
	function CustomMenuPageNumber() {
	    $("#pagination-custommenu li.page-number-custommenu").remove();
	    let prevLi = $("#li-prev-custommenu");
	    let maxVisible = 5;
	    let start = Math.max(1, CurrentPage - 2);
	    let end = Math.min(totalPages, start + maxVisible - 1);
	    if (end - start < maxVisible - 1) {
	        start = Math.max(1, end - maxVisible + 1);
	    }
	    if (start > 1) {
	        insertPageBreakfast(1, prevLi);
	        prevLi = prevLi.next();

	        if (start > 2) {
	            prevLi.after(`<li class="page-item page-number-custommenu disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	    }
	    for (let i = start; i <= end; i++) {
	        insertPageBreakfast(i, prevLi);
	        prevLi = prevLi.next();
	    }
	    if (end < totalPages) {
	        if (end < totalPages - 1) {
	            prevLi.after(`<li class="page-item page-number-custommenu disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	        insertPageBreakfast(totalPages, prevLi);
	    }
	    function insertPageBreakfast(i, ref) {
	        let activeClass = (i === CurrentPage) ? "active" : "";

	        let li = `
	            <li class="page-item page-number-custommenu ${activeClass}">
	                <a class="page-link" href="#" data-page="${i}">${i}</a>
	            </li>
	        `;

	        $(li).insertAfter(ref);
	    }
	}

	/*search-package*/
	$("#search-custom_menu").on("keydown", function(e) {
	    if (e.key === "Enter") {
	        loadCustomMenu();
	    }
	});

	  /* Pagination + Fetch Blocked Accounts */
	  $("#btn-preview-custommenu").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage > 1) {
	          loadCustomMenu(CurrentPage - 1);
	      }
	  });

	/*Function load all important tags tickets*/
	  $("#btn-next-custommenu").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage < totalPages) {
	          loadCustomMenu(CurrentPage + 1);
	      }
	  });


	  /*Function update breakfast details*/
	    $("#btn-update-custom").on("click", function () {
	        let $btn = $(this);
	        let $spinner = $("#btn-spinner-custom-upd");
	        let $text = $btn.find(".btn-text-custom");
	        let $btnCancel = $("#btn-cancel-custom");
	        let Custid     = $("#custommenu-id").val();
	        let Category    = $("#item-category").val();
	        let DishName    = $("#custom-name").val();
	        let Description = $("#custom-description").val();
	        let Ingredients = $("#custom-ingredients").val();
	        $btn.prop("disabled", true);
	        $btnCancel.prop("disabled", true);
	        $spinner.removeClass("d-none");
	        $text.text("Updating...");
	        $.post("dirs/menu_setup/actions/update_custommenu.php", {
	            Custid: Custid,
	            Category: Category,
	            DishName: DishName,
	            Description: Description,
	            Ingredients: Ingredients
	        })
	        .done(function (data) {
	            if ($.trim(data) === "success") {
	            	$("#frm-add-customenu")[0].reset();
	                $("#mdl-add-customenu").modal("hide");
	                Swal.fire({
	                    icon: "success",
	                    title: "Success",
	                    text: "Updated successfully",
	                    showConfirmButton: false,
	                    timer: 2000,
	                    timerProgressBar: true
	                });
	                loadCustomMenu();
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

	  /*Function to edit the custom Menu*/
	  function mdlEditCustomM(Custom_id) {
	      $("#mdl-add-customenu").modal('show');
	      $("#btn-submit-custom").addClass('d-none');
	      $("#btn-update-custom").removeClass('d-none');

	      $("#cutommenu-title").text('Update Custom Menu');
	      $("#cutommenu-description").text('Update a special order to custom menu list.');

	      $.post("dirs/menu_setup/actions/get_customMenu.php", {
	          Custom_id: Custom_id
	      }, function(data) {
	          const response = JSON.parse(data);
	          if ($.trim(response.isSuccess) === "success") {
	              $("#custommenu-id").val(response.Data.Custom_id);
	              $("#custom-name").val(response.Data.CustomMenuName);
	              $("#custommenu-code").val(response.Data.CustomCode);
	              $("#custom-description").val(response.Data.Description);
	              $("#custom-ingredients").val(response.Data.Ingredients);
	              loadFoodCategories(response.Data.FoodGroup);
	          } else {
	              console.log($.trim(response.Data));
	          }
	      });
	  }

	  function loadFoodCategories(selectedValue = null) {
	      $.post("dirs/menu_setup/actions/get_foodcategory.php", {}, function(data) {
	          const response = JSON.parse(data);
	          if ($.trim(response.isSuccess) === "success") {
	              const categories = response.Data;
	              $("#item-category").html('<option selected disabled>---</option>');
	              categories.forEach(food => {
	                  $("#item-category").append(
	                      $("<option>", {
	                          value: food.Category,
	                          text: food.Category
	                      })
	                  );
	              });
	              if (selectedValue !== null) {
	                  $("#item-category").val(selectedValue);
	              }
	          } else {
	              alert($.trim(response.Data));
	          }
	      });
	  }

	 $("#btn-cancel-custom").on("click", function () {
	     $("#cutommenu-title").text('New Custom Menu');
	     $("#cutommenu-description").text('Add a special order to custom menu list.');
	 });

	  /*Function to remove this menu prompt*/
	  function removemdlCustom(Custom_id) {
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
	              removeCustomMenu(Custom_id);
	          }
	      });
	  }

	  /*Function to remove script*/
	  function removeCustomMenu(Custom_id){
	      $.post("dirs/menu_setup/actions/delete_custommenu.php", {
	          Custom_id : Custom_id
	      },function(data){
	          if(jQuery.trim(data) == "success"){
	            loadCustomMenu();
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



	  /*Function enable custom menu*/
	  function enableCustom(Custom_id){
	    var Status = 'Active';
	      $.post("dirs/menu_setup/actions/update_status_custom.php", {
	          Custom_id : Custom_id,
	          Status : Status
	      },function(data){
	          if(jQuery.trim(data) == "success"){
	              loadCustomMenu();
	              Swal.fire({
	                  icon: "success",
	                  title: "Package Active",
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

	  /*Function disable custom menu*/
	  function disableCustom(Custom_id){
	    var Status = 'In-Active';
	      $.post("dirs/menu_setup/actions/update_status_custom.php", {
	          Custom_id : Custom_id,
	          Status : Status
	      },function(data){
	          if(jQuery.trim(data) == "success"){
	              loadCustomMenu();
	              Swal.fire({
	                  icon: "success",
	                  title: "Package In-Active",
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

</script>