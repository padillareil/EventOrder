<div class="justify-content-end mr-4 d-flex mt-2 gap-2">
	<div class="input-group border bg-light px-3 flex-grow-1" style="max-width: 300px;">
	    <span class="input-group-text bg-transparent border-0 p-0 me-2">
	        <i class="bi bi-search text-muted small"></i>
	    </span>
	    <input type="search" id="search-pastry" class="form-control bg-transparent border-0 small py-2 shadow-none" placeholder="Search...">
	</div>
	<button class="btn btn-primary" type="button" onclick="addPastry()"><i class="bi bi-plus-lg"></i> Add Pastry</button>
</div>

<!-- Load Pastry Content -->
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
	            <tbody class="border-top-0" id="load_Pastry_content">
	            </tbody>
	        </table>
	    </div>
	</div>
	<div class="card-footer">
	    <nav>
	        <ul class="pagination" id="pagination-pastry">
	            <li class="page-item" id="li-prev-pastry">
	                <a class="page-link" href="#" id="btn-preview-pastry">Previous</a>
	            </li>
	            <li class="page-item" id="li-next-pastry">
	                <a class="page-link" href="#" id="btn-next-pastry">Next</a>
	            </li>
	        </ul>
	    </nav>
	    <div id="page-info-pastry" class="mt-3 small text-muted"></div>
	</div>
</div>

<script>
	var CurrentPage = 1;
	var PageSize = 10;
	var totalPages = 1;
	var isPackageMode = false;
	var selectedItems = [];


	function loadPastry(page = 1) {
	    CurrentPage = page; 
	    var display = $("#load_Pastry_content");
	    display.html(`
	            <tr>
		            <td colspan="6" class="p-5 text-center text-muted">
		    			<div class="spinner-border text-dark"></div>
		                <div class="mt-2">Loading...</div>
		    		</td>
	            </tr>
	    `);
	    var Search = $("#search-pastry").val();
	    $.post("dirs/menu_setup/actions/get_pagination_pastry.php", {
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
	            PastryContent(response.Data);
	            totalPages = (response.Data && response.Data.length > 0)
	                ? parseInt(response.Data[0].TotalPages)
	                : 1;

	                PastryPageNumber();
	                PastryPaginationUi();
	        } else {
	            emptyStatePastry("pastry menu was empty.");
	        }
	    });
	}


	function PastryContent(data) {
	    const display = $("#load_Pastry_content");

	    if (!data || data.length === 0) {
	        showEmptyStatePastry("No menu available.");
	        return;
	    }

	    display.empty();

	    data.forEach(pastry => {
	        display.append(`
	           <tr class="pastry-row align-middle" data-value="${pastry.LineNum}">
	               <td class="text-muted fw-medium small">
	                   ${pastry.OrderNumber}
	               </td>

	               <td>
	                   <div class="fw-semibold text-dark">
	                       ${pastry.DishName}
	                   </div>
	               </td>

	               <td class="text-muted text-center small">
	                   ${pastry.Description || '—'}
	               </td>

	               <td class="text-muted text-center small">
	                   ${pastry.Ingredients || '—'}
	               </td>
	        	 	<td class="text-center">
	        	 	    <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer
	        	 	        ${pastry.DishStatus === "Active" ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}"
	        	 	        data-id="${pastry.LineNum}"
	        	 	        data-status="${pastry.DishStatus}">
	        	 	        ${pastry.DishStatus}
	        	 	    </span>
	        	 	</td>

	               <td class="text-center">
	                   <div class="dropdown">
	                       <button class="btn btn-sm btn-icon btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
	                           <i class="bi bi-three-dots-vertical"></i>
	                       </button>

	                       <ul class="dropdown-menu dropdown-menu-end shadow-sm">
	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdleditPastry('${pastry.LineNum}')">  <i class="bi bi-pencil text-primary"></i>  Edit
	                               </a>
	                           </li>
	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2 text-danger"href="#"onclick="removemdlPastry('${pastry.LineNum}')"> <i class="bi bi-trash"></i> Remove
	                               </a>
	                           </li>

	                           <li>
	                               <hr class="dropdown-divider">
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="enablePastry('${pastry.LineNum}')">  <i class="bi bi-toggle-on text-success"></i>  Enable
	                               </a>
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="disablePastry('${pastry.LineNum}')">  <i class="bi bi-toggle-off text-secondary"></i>  Disable
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
	function emptyStatePastry(message) {
	    $("#load_Pastry_content").html(`
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
	function showEmptyStatePastry(message) {
	    $("#load_Pastry_content").html(`
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
	function PastryPaginationUi() {
	    $("#page-info-pastry").text("Page " + CurrentPage + " of " + totalPages);
	    if (CurrentPage <= 1) {
	        $("#li-prev-pastry").addClass("disabled");
	    } else {
	        $("#li-prev-pastry").removeClass("disabled");
	    }
	    if (CurrentPage >= totalPages) {
	        $("#li-next-pastry").addClass("disabled");
	    } else {
	        $("#li-next-pastry").removeClass("disabled");
	    }
	}
	/*Function to build list of pagination*/
	function PastryPageNumber() {
	    $("#pagination-pastry li.page-number-pastry").remove();
	    let prevLi = $("#li-prev-pastry");
	    let maxVisible = 5;
	    let start = Math.max(1, CurrentPage - 2);
	    let end = Math.min(totalPages, start + maxVisible - 1);
	    if (end - start < maxVisible - 1) {
	        start = Math.max(1, end - maxVisible + 1);
	    }
	    if (start > 1) {
	        insertPageMainCourse(1, prevLi);
	        prevLi = prevLi.next();

	        if (start > 2) {
	            prevLi.after(`<li class="page-item page-number-pastry disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	    }
	    for (let i = start; i <= end; i++) {
	        insertPageMainCourse(i, prevLi);
	        prevLi = prevLi.next();
	    }
	    if (end < totalPages) {
	        if (end < totalPages - 1) {
	            prevLi.after(`<li class="page-item page-number-pastry disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	        insertPageMainCourse(totalPages, prevLi);
	    }
	    function insertPageMainCourse(i, ref) {
	        let activeClass = (i === CurrentPage) ? "active" : "";

	        var li = `
	            <li class="page-item page-number-pastry ${activeClass}">
	                <a class="page-link" href="#" data-page="${i}">${i}</a>
	            </li>
	        `;

	        $(li).insertAfter(ref);
	    }
	}

	/*search-dessert*/
	$("#search-pastry").on("keydown", function(e) {
	    if (e.key === "Enter") {
	        loadPastry();
	    }
	});

	  /* Pagination + Fetch Blocked Accounts */
	  $("#btn-preview-pastry").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage > 1) {
	          loadPastry(CurrentPage - 1);
	      }
	  });

	/*Function load all important tags tickets*/
	  $("#btn-next-pastry").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage < totalPages) {
	          loadPastry(CurrentPage + 1);
	      }
	  });

	  /*Function to update details*/
	  function mdleditPastry(LineNum){
	      $("#mdl-add-pastry").modal('show');
	      $("#btn-update-pastry").removeClass('d-none');
	      $("#btn-submit-pastry").addClass('d-none');

	      $.post("dirs/menu_setup/actions/get_menu.php",{
	          LineNum : LineNum
	      },function(data){
	          response = JSON.parse(data);
	          if(jQuery.trim(response.isSuccess) == "success"){
	              $("#pastry-id").val(response.Data.LineNum);
	              $("#pastry-name").val(response.Data.DishName);
	              $("#pastry-description").val(response.Data.Description);
	              $("#pastry-ingredients").val(response.Data.Ingredients);
	          }else{
	              Swal.fire({
	                  icon: 'warning',
	                  title: 'Notice',
	                  text: $.trim(response.Data)
	              });
	          }
	      });
	  }

	  /*Function update pastry details*/
	    $("#btn-update-pastry").on("click", function () {
	        let $btn = $(this);
	        let $spinner = $("#btn-spinner-pastry-upd");
	        let $text = $btn.find(".btn-text-pastry");
	        let $btnCancel = $("#btn-cancel-pastry");
	        let LineNum     = $("#pastry-id").val();
	        let DishName    = $("#pastry-name").val();
	        let Description = $("#pastry-description").val();
	        let Ingredients = $("#pastry-ingredients").val();
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
	                $("#mdl-add-pastry").modal("hide");
	                Swal.fire({
	                    icon: "success",
	                    title: "Success",
	                    text: "Updated successfully",
	                    showConfirmButton: false,
	                    timer: 2000,
	                    timerProgressBar: true
	                });
	                loadPastry(CurrentPage);
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
	    function removemdlPastry(LineNum) {
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
	                removePastry(LineNum);
	            }
	        });
	    }

	    /*Function to remove script*/
	    function removePastry(LineNum){
	        $.post("dirs/menu_setup/actions/delete_menu.php", {
	            LineNum : LineNum
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadPastry(CurrentPage);
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
	    function enablePastry(LineNum){
	      var Status = 'Active';
	        $.post("dirs/menu_setup/actions/update_status.php", {
	            LineNum : LineNum,
	            Status : Status
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadPastry();
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
	    function disablePastry(LineNum){
	      var Status = 'In-Active';
	        $.post("dirs/menu_setup/actions/update_status.php", {
	            LineNum : LineNum,
	            Status : Status
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadPastry(CurrentPage);
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

	    $(document).on("click", "#pagination-pastry .page-link", function(e) {
	        e.preventDefault();
	        var page = $(this).data("page");
	        if (page && page !== CurrentPage) {
	            loadPastry(page);
	        }
	    });
</script>