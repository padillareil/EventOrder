<div class="justify-content-end mr-4 d-flex mt-2 gap-2">
	<div class="input-group border bg-light px-3 flex-grow-1" style="max-width: 300px;">
	    <span class="input-group-text bg-transparent border-0 p-0 me-2">
	        <i class="bi bi-search text-muted small"></i>
	    </span>
	    <input type="search" id="search-beverage" class="form-control bg-transparent border-0 small py-2 shadow-none" placeholder="Search...">
	</div>
	<button class="btn btn-primary" type="button" onclick="addBeverage()"><i class="bi bi-plus-lg"></i> Add Beverage</button>
</div>

<!-- Load beverages Content -->
<div class="card">
	<div class="card-body p-0">
	    <div class="table-responsive overflow-auto" style="height: 50vh;">
	        <table class="table table-hover align-middle mb-0">
	            <thead class="sticky-top bg-white border-bottom" style="z-index: 5;">
	                <tr>
	                    <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted" style="width: 80px;">#</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Menu Name</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Description</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Ingredient</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Status</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Actions</th>
	                </tr>
	            </thead>
	            <tbody class="border-top-0" id="load_Beverage_content">
	            </tbody>
	        </table>
	    </div>
	</div>

	<div class="card-footer">
	    <nav>
	        <ul class="pagination" id="pagination-beverage">
	            <li class="page-item" id="li-prev">
	                <a class="page-link" href="#" id="btn-preview-beverage">Previous</a>
	            </li>
	            <li class="page-item" id="li-next">
	                <a class="page-link" href="#" id="btn-next-beverage">Next</a>
	            </li>
	        </ul>
	    </nav>
	    <div id="page-info-beverage" class="mt-3 small text-muted"></div>
	</div>
</div>

<script>
	var CurrentPage = 1;
	var PageSize = 10;
	var totalPages = 1;
	var isPackageMode = false;
	var selectedItems = [];


	function loadBeverage(page = 1) {
	    CurrentPage = page; 
	    var display = $("#load_Beverage_content");
	    display.html(`
	            <tr>
		            <td colspan="6" class="p-5 text-center text-muted">
		    			<div class="spinner-border text-dark"></div>
		                <div class="mt-2">Loading...</div>
		    		</td>
	            </tr>
	    `);
	    var Search = $("#search-beverage").val();
	    $.post("dirs/menu_setup/actions/get_pagination_beverage.php", {
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
	            BeverageContent(response.Data);
	            totalPages = (response.Data && response.Data.length > 0)
	                ? parseInt(response.Data[0].TotalPages)
	                : 1;

	                BeveragePageNumber();
	                BeveragePaginationUi();
	        } else {
	            emptyStateBeverage("beverages menu was empty.");
	        }
	    });
	}


	function BeverageContent(data) {
	    const display = $("#load_Beverage_content");

	    if (!data || data.length === 0) {
	        showEmptyStateBeverage("No menu available.");
	        return;
	    }

	    display.empty();

	    data.forEach(apptzr => {
	        display.append(`
	           <tr class="beverage-row align-middle" data-value="${apptzr.LineNum}">
	               <td class="text-muted fw-medium small">
	                   ${apptzr.OrderNumber}
	               </td>

	               <td>
	                   <div class="fw-semibold text-dark">
	                       ${apptzr.DishName}
	                   </div>
	               </td>

	               <td class="text-muted small">
	                   ${apptzr.Description || '—'}
	               </td>

	               <td class="text-muted small">
	                   ${apptzr.Ingredients || '—'}
	               </td>
	        	 	<td>
	        	 	    <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer
	        	 	        ${apptzr.DishStatus === "Active" ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}"
	        	 	        data-id="${apptzr.LineNum}"
	        	 	        data-status="${apptzr.DishStatus}">
	        	 	        ${apptzr.DishStatus}
	        	 	    </span>
	        	 	</td>

	               <td class="text-center">
	                   <div class="dropdown">
	                       <button class="btn btn-sm btn-icon btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
	                           <i class="bi bi-three-dots-vertical"></i>
	                       </button>

	                       <ul class="dropdown-menu dropdown-menu-end shadow-sm">
	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdleditBeverage('${apptzr.LineNum}')">  <i class="bi bi-pencil text-primary"></i>  Edit
	                               </a>
	                           </li>
	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2 text-danger"href="#"onclick="removemdlBeverage('${apptzr.LineNum}')"> <i class="bi bi-trash"></i> Remove
	                               </a>
	                           </li>

	                           <li>
	                               <hr class="dropdown-divider">
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="enableBeverage('${apptzr.LineNum}')">  <i class="bi bi-toggle-on text-success"></i>  Enable
	                               </a>
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="disableBeverage('${apptzr.LineNum}')">  <i class="bi bi-toggle-off text-secondary"></i>  Disable
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
	function emptyStateBeverage(message) {
	    $("#load_Beverage_content").html(`
	        <tr>
	          <td colspan="6" class="p-5 text-center text-muted">
	              <i class="bi bi-card-list"></i> 
	              <br>
	                  No Menu Available!
	    	<div class="small opacity-75">${message}</div>
	              </td>
	        </tr>
	    `);
	}

	/*Function for no record of beverages*/
	function showEmptyStateBeverage(message) {
	    $("#load_Beverage_content").html(`
	        <tr>
	          <td colspan="6" class="p-5 text-center text-muted">
	              <i class="bi bi-card-list"></i> 
	              <br>
	                  No Menu Available!
	    	<div class="small opacity-75">${message}</div>
	              </td>
	        </tr>
	    `);
	}


	/*Function to count page number page 1 of and so on*/
	function BeveragePaginationUi() {
	    $("#page-info-beverage").text("Page " + CurrentPage + " of " + totalPages);
	    if (CurrentPage <= 1) {
	        $("#li-prev").addClass("disabled");
	    } else {
	        $("#li-prev").removeClass("disabled");
	    }
	    if (CurrentPage >= totalPages) {
	        $("#li-next").addClass("disabled");
	    } else {
	        $("#li-next").removeClass("disabled");
	    }
	}
	/*Function to build list of pagination*/
	function BeveragePageNumber() {
	    $("#pagination-beverage li.page-number-beverage").remove();
	    let prevLi = $("#li-prev");
	    let maxVisible = 5;
	    let start = Math.max(1, CurrentPage - 2);
	    let end = Math.min(totalPages, start + maxVisible - 1);
	    if (end - start < maxVisible - 1) {
	        start = Math.max(1, end - maxVisible + 1);
	    }
	    if (start > 1) {
	        insertPage(1, prevLi);
	        prevLi = prevLi.next();

	        if (start > 2) {
	            prevLi.after(`<li class="page-item page-number-beverage disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	    }
	    for (let i = start; i <= end; i++) {
	        insertPage(i, prevLi);
	        prevLi = prevLi.next();
	    }
	    if (end < totalPages) {
	        if (end < totalPages - 1) {
	            prevLi.after(`<li class="page-item page-number-beverage disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	        insertPage(totalPages, prevLi);
	    }
	    function insertPage(i, ref) {
	        let activeClass = (i === CurrentPage) ? "active" : "";

	        let li = `
	            <li class="page-item page-number-beverage ${activeClass}">
	                <a class="page-link" href="#" data-page="${i}">${i}</a>
	            </li>
	        `;

	        $(li).insertAfter(ref);
	    }
	}

	/*Search-beverage*/
	$("#search-beverage").on("keydown", function(e) {
	    if (e.key === "Enter") {
	        loadBeverage();
	    }
	});

	  /* Pagination + Fetch Blocked Accounts */
	  $("#btn-preview-beverage").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage > 1) {
	          loadBeverage(CurrentPage - 1);
	      }
	  });

	/*Function load all important tags tickets*/
	  $("#btn-next-beverage").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage < totalPages) {
	          loadBeverage(CurrentPage + 1);
	      }
	  });

	  /*Function to update details*/
	  function mdleditBeverage(LineNum){
	      $("#mdl-add-beverage").modal('show');
	      $("#btn-update-beverage").removeClass('d-none');
	      $("#btn-submit-beverage").addClass('d-none');

	      $.post("dirs/menu_setup/actions/get_menu.php",{
	          LineNum : LineNum
	      },function(data){
	          response = JSON.parse(data);
	          if(jQuery.trim(response.isSuccess) == "success"){
	              $("#beverage-id").val(response.Data.LineNum);
	              $("#beverage-name").val(response.Data.DishName);
	              $("#beverage-description").val(response.Data.Description);
	              $("#beverage-ingredients").val(response.Data.Ingredients);
	          }else{
	              Swal.fire({
	                  icon: 'warning',
	                  title: 'Notice',
	                  text: $.trim(response.Data)
	              });
	          }
	      });
	  }

	  /*Function update beverage details*/
	    $("#btn-update-beverage").on("click", function () {
	        let $btn = $(this);
	        let $spinner = $("#btn-spinner-beverage-upd");
	        let $text = $btn.find(".btn-text-beverage");
	        let $btnCancel = $("#btn-cancel-beverage");
	        let LineNum     = $("#beverage-id").val();
	        let DishName    = $("#beverage-name").val();
	        let Description = $("#beverage-description").val();
	        let Ingredients = null;
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
	                $("#mdl-add-beverage").modal("hide");
	                Swal.fire({
	                    icon: "success",
	                    title: "Success",
	                    text: "Updated successfully"
	                });
	                loadBeverage(CurrentPage);
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
	    function removemdlBeverage(LineNum) {
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
	                removebeverage(LineNum);
	            }
	        });
	    }

	    /*Function to remove script*/
	    function removebeverage(LineNum){
	        $.post("dirs/menu_setup/actions/delete_menu.php", {
	            LineNum : LineNum
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadBeverage(CurrentPage);
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
	    function enableBeverage(LineNum){
	      var Status = 'Active';
	        $.post("dirs/menu_setup/actions/update_status.php", {
	            LineNum : LineNum,
	            Status : Status
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadBeverage();
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
	    function disableBeverage(LineNum){
	      var Status = 'In-Active';
	        $.post("dirs/menu_setup/actions/update_status.php", {
	            LineNum : LineNum,
	            Status : Status
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadBeverage(CurrentPage);
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

</script>