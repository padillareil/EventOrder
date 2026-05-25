<div class="justify-content-end mr-4 d-flex mt-2 gap-2">
	<div class="input-group border bg-light px-3 flex-grow-1" style="max-width: 300px;">
	    <span class="input-group-text bg-transparent border-0 p-0 me-2">
	        <i class="bi bi-search text-muted small"></i>
	    </span>
	    <input type="search" id="search-salad" class="form-control bg-transparent border-0 small py-2 shadow-none" placeholder="Search...">
	</div>
	<button class="btn btn-primary" type="button" onclick="addSalads()"><i class="bi bi-plus-lg"></i> Add Salad</button>
</div>

<!-- Load Salad Content -->
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
	            <tbody class="border-top-0" id="load_Salad_content">
	            </tbody>
	        </table>
	    </div>
	</div>
	<div class="card-footer">
	    <nav>
	        <ul class="pagination" id="pagination-salad">
	            <li class="page-item" id="li-prev-salad">
	                <a class="page-link" href="#" id="btn-preview-salad">Previous</a>
	            </li>
	            <li class="page-item" id="li-next-salad">
	                <a class="page-link" href="#" id="btn-next-salad">Next</a>
	            </li>
	        </ul>
	    </nav>
	    <div id="page-info-salad" class="mt-3 small text-muted"></div>
	</div>
</div>

<script>
	var CurrentPage = 1;
	var PageSize = 10;
	var totalPages = 1;
	var isPackageMode = false;
	var selectedItems = [];


	function loadSalad(page = 1) {
	    CurrentPage = page; 
	    var display = $("#load_Salad_content");
	    display.html(`
	            <tr>
		            <td colspan="6" class="p-5 text-center text-muted">
		    			<div class="spinner-border text-dark"></div>
		                <div class="mt-2">Loading...</div>
		    		</td>
	            </tr>
	    `);
	    var Search = $("#search-salad").val();
	    $.post("dirs/menu_setup/actions/get_pagination_salad.php", {
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
	            SaladContent(response.Data);
	            totalPages = (response.Data && response.Data.length > 0)
	                ? parseInt(response.Data[0].TotalPages)
	                : 1;

	                SaladPageNumber();
	                SaladPaginationUi();
	        } else {
	            emptyStateSalad("salad menu was empty.");
	        }
	    });
	}


	function SaladContent(data) {
	    const display = $("#load_Salad_content");

	    if (!data || data.length === 0) {
	        showEmptyStateSalad("No menu available.");
	        return;
	    }

	    display.empty();

	    data.forEach(salad => {
	        display.append(`
	           <tr class="salad-row align-middle" data-value="${salad.LineNum}">
	               <td class="text-muted fw-medium small">
	                   ${salad.OrderNumber}
	               </td>

	               <td>
	                   <div class="fw-semibold text-dark">
	                       ${salad.DishName}
	                   </div>
	               </td>

	               <td class="text-muted text-center small">
	                   ${salad.Description || '—'}
	               </td>

	               <td class="text-muted text-center small">
	                   ${salad.Ingredients || '—'}
	               </td>
	        	 	<td class="text-center">
	        	 	    <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer
	        	 	        ${salad.DishStatus === "Active" ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}"
	        	 	        data-id="${salad.LineNum}"
	        	 	        data-status="${salad.DishStatus}">
	        	 	        ${salad.DishStatus}
	        	 	    </span>
	        	 	</td>

	               <td class="text-center">
	                   <div class="dropdown">
	                       <button class="btn btn-sm btn-icon btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
	                           <i class="bi bi-three-dots-vertical"></i>
	                       </button>

	                       <ul class="dropdown-menu dropdown-menu-end shadow-sm">
	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdleditSalad('${salad.LineNum}')">  <i class="bi bi-pencil text-primary"></i>  Edit
	                               </a>
	                           </li>
	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2 text-danger"href="#"onclick="removemdlSalad('${salad.LineNum}')"> <i class="bi bi-trash"></i> Remove
	                               </a>
	                           </li>

	                           <li>
	                               <hr class="dropdown-divider">
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="enableSalad('${salad.LineNum}')">  <i class="bi bi-toggle-on text-success"></i>  Enable
	                               </a>
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="disableSalad('${salad.LineNum}')">  <i class="bi bi-toggle-off text-secondary"></i>  Disable
	                               </a>
	                           </li>
	                       </ul>
	                   </div>
	               </td>
	           </tr>
	        `);
	    });
	}

	/*Function for no record of salad*/
	function emptyStateSalad(message) {
	    $("#load_Salad_content").html(`
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

	/*Function for no record of salad*/
	function showEmptyStateSalad(message) {
	    $("#load_Salad_content").html(`
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
	function SaladPaginationUi() {
	    $("#page-info-salad").text("Page " + CurrentPage + " of " + totalPages);
	    if (CurrentPage <= 1) {
	        $("#li-prev-salad").addClass("disabled");
	    } else {
	        $("#li-prev-salad").removeClass("disabled");
	    }
	    if (CurrentPage >= totalPages) {
	        $("#li-next-salad").addClass("disabled");
	    } else {
	        $("#li-next-salad").removeClass("disabled");
	    }
	}
	/*Function to build list of pagination*/
	function SaladPageNumber() {
	    $("#pagination-salad li.page-number-salad").remove();
	    let prevLi = $("#li-prev-salad");
	    let maxVisible = 5;
	    let start = Math.max(1, CurrentPage - 2);
	    let end = Math.min(totalPages, start + maxVisible - 1);
	    if (end - start < maxVisible - 1) {
	        start = Math.max(1, end - maxVisible + 1);
	    }
	    if (start > 1) {
	        insertPageSalad(1, prevLi);
	        prevLi = prevLi.next();

	        if (start > 2) {
	            prevLi.after(`<li class="page-item page-number-salad disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	    }
	    for (let i = start; i <= end; i++) {
	        insertPageSalad(i, prevLi);
	        prevLi = prevLi.next();
	    }
	    if (end < totalPages) {
	        if (end < totalPages - 1) {
	            prevLi.after(`<li class="page-item page-number-salad disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	        insertPageSalad(totalPages, prevLi);
	    }
	    function insertPageSalad(i, ref) {
	        let activeClass = (i === CurrentPage) ? "active" : "";

	        var li = `
	            <li class="page-item page-number-salad ${activeClass}">
	                <a class="page-link" href="#" data-page="${i}">${i}</a>
	            </li>
	        `;

	        $(li).insertAfter(ref);
	    }
	}

	/*search-salad*/
	$("#search-salad").on("keydown", function(e) {
	    if (e.key === "Enter") {
	        loadSalad();
	    }
	});

	  /* Pagination + Fetch Blocked Accounts */
	  $("#btn-preview-salad").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage > 1) {
	          loadSalad(CurrentPage - 1);
	      }
	  });

	/*Function load all important tags tickets*/
	  $("#btn-next-salad").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage < totalPages) {
	          loadSalad(CurrentPage + 1);
	      }
	  });

	  /*Function to update details*/
	  function mdleditSalad(LineNum){
	      $("#mdl-add-salad").modal('show');
	      $("#btn-update-salad").removeClass('d-none');
	      $("#btn-submit-salad").addClass('d-none');

	      $.post("dirs/menu_setup/actions/get_menu.php",{
	          LineNum : LineNum
	      },function(data){
	          response = JSON.parse(data);
	          if(jQuery.trim(response.isSuccess) == "success"){
	              $("#salad-id").val(response.Data.LineNum);
	              $("#salad-name").val(response.Data.DishName);
	              $("#salad-description").val(response.Data.Description);
	              $("#salad-ingredients").val(response.Data.Ingredients);
	          }else{
	              Swal.fire({
	                  icon: 'warning',
	                  title: 'Notice',
	                  text: $.trim(response.Data)
	              });
	          }
	      });
	  }

	  /*Function update salad details*/
	    $("#btn-update-salad").on("click", function () {
	        let $btn = $(this);
	        let $spinner = $("#btn-spinner-salad-upd");
	        let $text = $btn.find(".btn-text-salad");
	        let $btnCancel = $("#btn-cancel-salad");
	        let LineNum     = $("#salad-id").val();
	        let DishName    = $("#salad-name").val();
	        let Description = $("#salad-description").val();
	        let Ingredients = $("#salad-ingredients").val();
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
	                $("#mdl-add-salad").modal("hide");
	                Swal.fire({
	                    icon: "success",
	                    title: "Success",
	                    text: "Updated successfully",
	                    showConfirmButton: false,
	                    timer: 2000,
	                    timerProgressBar: true
	                });
	                loadSalad(CurrentPage);
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
	    function removemdlSalad(LineNum) {
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
	                removePasta(LineNum);
	            }
	        });
	    }

	    /*Function to remove script*/
	    function removePasta(LineNum){
	        $.post("dirs/menu_setup/actions/delete_menu.php", {
	            LineNum : LineNum
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadSalad(CurrentPage);
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
	    function enableSalad(LineNum){
	      var Status = 'Active';
	        $.post("dirs/menu_setup/actions/update_status.php", {
	            LineNum : LineNum,
	            Status : Status
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadSalad();
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
	    function disableSalad(LineNum){
	      var Status = 'In-Active';
	        $.post("dirs/menu_setup/actions/update_status.php", {
	            LineNum : LineNum,
	            Status : Status
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadSalad(CurrentPage);
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

	    $(document).on("click", "#pagination-salad .page-link", function(e) {
	        e.preventDefault();
	        var page = $(this).data("page");
	        if (page && page !== CurrentPage) {
	            loadSalad(page);
	        }
	    });

</script>