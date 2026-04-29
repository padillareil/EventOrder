<div class="justify-content-end mr-4 d-flex mt-2 gap-2">
	<div class="input-group border bg-light px-3 flex-grow-1" style="max-width: 300px;">
	    <span class="input-group-text bg-transparent border-0 p-0 me-2">
	        <i class="bi bi-search text-muted small"></i>
	    </span>
	    <input type="search" id="search-vegie" class="form-control bg-transparent border-0 small py-2 shadow-none" placeholder="Search...">
	</div>
	<button class="btn btn-primary" type="button" onclick="addVegetable()"><i class="bi bi-plus-lg"></i> Add Vegie</button>
</div>

<!-- Load Vegie Content -->
<div class="card mt-2">
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
	            <tbody class="border-top-0" id="load_Vegie_content">
	            </tbody>
	        </table>
	    </div>
	</div>
	<div class="card-footer">
	    <nav>
	        <ul class="pagination" id="pagination-vegie">
	            <li class="page-item" id="li-prev-vegie">
	                <a class="page-link" href="#" id="btn-preview-vegie">Previous</a>
	            </li>
	            <li class="page-item" id="li-next-vegie">
	                <a class="page-link" href="#" id="btn-next-vegie">Next</a>
	            </li>
	        </ul>
	    </nav>
	    <div id="page-info-vegie" class="mt-3 small text-muted"></div>
	</div>
</div>

<script>
	var CurrentPage = 1;
	var PageSize = 10;
	var totalPages = 1;
	var isPackageMode = false;
	var selectedItems = [];


	function loadVegie(page = 1) {
	    CurrentPage = page; 
	    var display = $("#load_Vegie_content");
	    display.html(`
	            <tr>
		            <td colspan="6" class="p-5 text-center text-muted">
		    			<div class="spinner-border text-dark"></div>
		                <div class="mt-2">Loading...</div>
		    		</td>
	            </tr>
	    `);
	    var Search = $("#search-vegie").val();
	    $.post("dirs/menu_setup/actions/get_pagination_vegie.php", {
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
	            VegieContent(response.Data);
	            totalPages = (response.Data && response.Data.length > 0)
	                ? parseInt(response.Data[0].TotalPages)
	                : 1;

	                VegiePageNumber();
	                VegiePaginationUi();
	        } else {
	            emptyStateVegie("vegie menu was empty.");
	        }
	    });
	}


	function VegieContent(data) {
	    const display = $("#load_Vegie_content");

	    if (!data || data.length === 0) {
	        showEmptyStateVegie("No menu available.");
	        return;
	    }

	    display.empty();

	    data.forEach(vegie => {
	        display.append(`
	           <tr class="vegie-row align-middle" data-value="${vegie.LineNum}">
	               <td class="text-muted fw-medium small">
	                   ${vegie.OrderNumber}
	               </td>

	               <td>
	                   <div class="fw-semibold text-dark">
	                       ${vegie.DishName}
	                   </div>
	               </td>

	               <td class="text-muted text-center small">
	                   ${vegie.Description || '—'}
	               </td>

	               <td class="text-muted text-center small">
	                   ${vegie.Ingredients || '—'}
	               </td>
	        	 	<td class="text-center">
	        	 	    <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer
	        	 	        ${vegie.DishStatus === "Active" ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}"
	        	 	        data-id="${vegie.LineNum}"
	        	 	        data-status="${vegie.DishStatus}">
	        	 	        ${vegie.DishStatus}
	        	 	    </span>
	        	 	</td>

	               <td class="text-center">
	                   <div class="dropdown">
	                       <button class="btn btn-sm btn-icon btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
	                           <i class="bi bi-three-dots-vertical"></i>
	                       </button>

	                       <ul class="dropdown-menu dropdown-menu-end shadow-sm">
	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdleditVegie('${vegie.LineNum}')">  <i class="bi bi-pencil text-primary"></i>  Edit
	                               </a>
	                           </li>
	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2 text-danger"href="#"onclick="removemdlVegie('${vegie.LineNum}')"> <i class="bi bi-trash"></i> Remove
	                               </a>
	                           </li>

	                           <li>
	                               <hr class="dropdown-divider">
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="enableVegie('${vegie.LineNum}')">  <i class="bi bi-toggle-on text-success"></i>  Enable
	                               </a>
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="disableVegie('${vegie.LineNum}')">  <i class="bi bi-toggle-off text-secondary"></i>  Disable
	                               </a>
	                           </li>
	                       </ul>
	                   </div>
	               </td>
	           </tr>
	        `);
	    });
	}

	/*Function for no record of snack*/
	function emptyStateVegie(message) {
	    $("#load_Vegie_content").html(`
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

	/*Function for no record of snack*/
	function showEmptyStateVegie(message) {
	    $("#load_Vegie_content").html(`
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
	function VegiePaginationUi() {
	    $("#page-info-vegie").text("Page " + CurrentPage + " of " + totalPages);
	    if (CurrentPage <= 1) {
	        $("#li-prev-vegie").addClass("disabled");
	    } else {
	        $("#li-prev-vegie").removeClass("disabled");
	    }
	    if (CurrentPage >= totalPages) {
	        $("#li-next-vegie").addClass("disabled");
	    } else {
	        $("#li-next-vegie").removeClass("disabled");
	    }
	}
	/*Function to build list of pagination*/
	function VegiePageNumber() {
	    $("#pagination-vegie li.page-number-vegie").remove();
	    let prevLi = $("#li-prev-vegie");
	    let maxVisible = 5;
	    let start = Math.max(1, CurrentPage - 2);
	    let end = Math.min(totalPages, start + maxVisible - 1);
	    if (end - start < maxVisible - 1) {
	        start = Math.max(1, end - maxVisible + 1);
	    }
	    if (start > 1) {
	        insertPageVegie(1, prevLi);
	        prevLi = prevLi.next();

	        if (start > 2) {
	            prevLi.after(`<li class="page-item page-number-vegie disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	    }
	    for (let i = start; i <= end; i++) {
	        insertPageVegie(i, prevLi);
	        prevLi = prevLi.next();
	    }
	    if (end < totalPages) {
	        if (end < totalPages - 1) {
	            prevLi.after(`<li class="page-item page-number-vegie disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	        insertPageVegie(totalPages, prevLi);
	    }
	    function insertPageVegie(i, ref) {
	        let activeClass = (i === CurrentPage) ? "active" : "";

	        var li = `
	            <li class="page-item page-number-vegie ${activeClass}">
	                <a class="page-link" href="#" data-page="${i}">${i}</a>
	            </li>
	        `;

	        $(li).insertAfter(ref);
	    }
	}

	/*search-soup*/
	$("#search-vegie").on("keydown", function(e) {
	    if (e.key === "Enter") {
	        loadVegie();
	    }
	});

	  /* Pagination + Fetch Blocked Accounts */
	  $("#btn-preview-vegie").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage > 1) {
	          loadVegie(CurrentPage - 1);
	      }
	  });

	/*Function load all important tags tickets*/
	  $("#btn-next-vegie").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage < totalPages) {
	          loadVegie(CurrentPage + 1);
	      }
	  });

	  /*Function to update details*/
	  function mdleditVegie(LineNum){
	      $("#mdl-add-vegetables").modal('show');
	      $("#btn-update-vegie").removeClass('d-none');
	      $("#btn-submit-vegetables").addClass('d-none');

	      $.post("dirs/menu_setup/actions/get_menu.php",{
	          LineNum : LineNum
	      },function(data){
	          response = JSON.parse(data);
	          if(jQuery.trim(response.isSuccess) == "success"){
	              $("#vegie-id").val(response.Data.LineNum);
	              $("#vegetable-name").val(response.Data.DishName);
	              $("#vegetable-description").val(response.Data.Description);
	              $("#vegetable-ingredients").val(response.Data.Ingredients);
	          }else{
	              Swal.fire({
	                  icon: 'warning',
	                  title: 'Notice',
	                  text: $.trim(response.Data)
	              });
	          }
	      });
	  }

	  /*Function update vegie details*/
	    $("#btn-update-vegie").on("click", function () {
	        let $btn = $(this);
	        let $spinner = $("#btn-spinner-vegie-upd");
	        let $text = $btn.find(".btn-text-vegie");
	        let $btnCancel = $("#btn-cancel-vegetables");
	        let LineNum     = $("#vegie-id").val();
	        let DishName    = $("#vegetable-name").val();
	        let Description = $("#vegetable-description").val();
	        let Ingredients = $("#vegetable-ingredients").val();;
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
	                $("#mdl-add-vegetables").modal("hide");
	                Swal.fire({
	                    icon: "success",
	                    title: "Success",
	                    text: "Updated successfully",
	                    showConfirmButton: false,
	                    timer: 2000,
	                    timerProgressBar: true
	                });
	                loadVegie(CurrentPage);
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
	    function removemdlVegie(LineNum) {
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
	                removeVegie(LineNum);
	            }
	        });
	    }

	    /*Function to remove script*/
	    function removeVegie(LineNum){
	        $.post("dirs/menu_setup/actions/delete_menu.php", {
	            LineNum : LineNum
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadVegie(CurrentPage);
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
	    function enableVegie(LineNum){
	      var Status = 'Active';
	        $.post("dirs/menu_setup/actions/update_status.php", {
	            LineNum : LineNum,
	            Status : Status
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadVegie();
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
	    function disableVegie(LineNum){
	      var Status = 'In-Active';
	        $.post("dirs/menu_setup/actions/update_status.php", {
	            LineNum : LineNum,
	            Status : Status
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadVegie(CurrentPage);
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

	    $(document).on("click", "#pagination-vegie .page-link", function(e) {
	        e.preventDefault();
	        var page = $(this).data("page");
	        if (page && page !== CurrentPage) {
	            loadVegie(page);
	        }
	    });
</script>