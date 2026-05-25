<div class="justify-content-end mr-4 d-flex mt-2 gap-2">
	<div class="input-group border bg-light px-3 flex-grow-1" style="max-width: 300px;">
	    <span class="input-group-text bg-transparent border-0 p-0 me-2">
	        <i class="bi bi-search text-muted small"></i>
	    </span>
	    <input type="search" id="search-pasta" class="form-control bg-transparent border-0 small py-2 shadow-none" placeholder="Search...">
	</div>
	<button class="btn btn-primary" type="button" onclick="addPasta()"><i class="bi bi-plus-lg"></i> Add Pasta</button>
</div>

<!-- Load Pasta Content -->
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
	            <tbody class="border-top-0" id="load_Pasta_content">
	            </tbody>
	        </table>
	    </div>
	</div>
	<div class="card-footer">
	    <nav>
	        <ul class="pagination" id="pagination-pasta">
	            <li class="page-item" id="li-prev-pasta">
	                <a class="page-link" href="#" id="btn-preview-pasta">Previous</a>
	            </li>
	            <li class="page-item" id="li-next-pasta">
	                <a class="page-link" href="#" id="btn-next-pasta">Next</a>
	            </li>
	        </ul>
	    </nav>
	    <div id="page-info-pasta" class="mt-3 small text-muted"></div>
	</div>
</div>

<script>
	var CurrentPage = 1;
	var PageSize = 10;
	var totalPages = 1;
	var isPackageMode = false;
	var selectedItems = [];


	function loadPasta(page = 1) {
	    CurrentPage = page; 
	    var display = $("#load_Pasta_content");
	    display.html(`
	            <tr>
		            <td colspan="6" class="p-5 text-center text-muted">
		    			<div class="spinner-border text-dark"></div>
		                <div class="mt-2">Loading...</div>
		    		</td>
	            </tr>
	    `);
	    var Search = $("#search-pastry").val();
	    $.post("dirs/menu_setup/actions/get_pagination_pasta.php", {
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
	            PastaContent(response.Data);
	            totalPages = (response.Data && response.Data.length > 0)
	                ? parseInt(response.Data[0].TotalPages)
	                : 1;

	                PastaPageNumber();
	                PastaPaginationUi();
	        } else {
	            emptyStatePasta("pasta menu was empty.");
	        }
	    });
	}


	function PastaContent(data) {
	    const display = $("#load_Pasta_content");

	    if (!data || data.length === 0) {
	        showEmptyStatePasta("No menu available.");
	        return;
	    }

	    display.empty();

	    data.forEach(pasta => {
	        display.append(`
	           <tr class="pasta-row align-middle" data-value="${pasta.LineNum}">
	               <td class="text-muted fw-medium small">
	                   ${pasta.OrderNumber}
	               </td>

	               <td>
	                   <div class="fw-semibold text-dark">
	                       ${pasta.DishName}
	                   </div>
	               </td>

	               <td class="text-muted text-center small">
	                   ${pasta.Description || '—'}
	               </td>

	               <td class="text-muted text-center small">
	                   ${pasta.Ingredients || '—'}
	               </td>
	        	 	<td class="text-center">
	        	 	    <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer
	        	 	        ${pasta.DishStatus === "Active" ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}"
	        	 	        data-id="${pasta.LineNum}"
	        	 	        data-status="${pasta.DishStatus}">
	        	 	        ${pasta.DishStatus}
	        	 	    </span>
	        	 	</td>

	               <td class="text-center">
	                   <div class="dropdown">
	                       <button class="btn btn-sm btn-icon btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
	                           <i class="bi bi-three-dots-vertical"></i>
	                       </button>

	                       <ul class="dropdown-menu dropdown-menu-end shadow-sm">
	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdleditPasta('${pasta.LineNum}')">  <i class="bi bi-pencil text-primary"></i>  Edit
	                               </a>
	                           </li>
	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2 text-danger"href="#"onclick="removemdlPasta('${pasta.LineNum}')"> <i class="bi bi-trash"></i> Remove
	                               </a>
	                           </li>

	                           <li>
	                               <hr class="dropdown-divider">
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="enablePasta('${pasta.LineNum}')">  <i class="bi bi-toggle-on text-success"></i>  Enable
	                               </a>
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="disablePasta('${pasta.LineNum}')">  <i class="bi bi-toggle-off text-secondary"></i>  Disable
	                               </a>
	                           </li>
	                       </ul>
	                   </div>
	               </td>
	           </tr>
	        `);
	    });
	}

	/*Function for no record of pasta*/
	function emptyStatePasta(message) {
	    $("#load_Pasta_content").html(`
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

	/*Function for no record of pasta*/
	function showEmptyStatePasta(message) {
	    $("#load_Pasta_content").html(`
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
	function PastaPaginationUi() {
	    $("#page-info-pasta").text("Page " + CurrentPage + " of " + totalPages);
	    if (CurrentPage <= 1) {
	        $("#li-prev-pasta").addClass("disabled");
	    } else {
	        $("#li-prev-pasta").removeClass("disabled");
	    }
	    if (CurrentPage >= totalPages) {
	        $("#li-next-pasta").addClass("disabled");
	    } else {
	        $("#li-next-pasta").removeClass("disabled");
	    }
	}
	/*Function to build list of pagination*/
	function PastaPageNumber() {
	    $("#pagination-pasta li.page-number-pasta").remove();
	    let prevLi = $("#li-prev-pasta");
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
	            prevLi.after(`<li class="page-item page-number-pasta disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	    }
	    for (let i = start; i <= end; i++) {
	        insertPageMainCourse(i, prevLi);
	        prevLi = prevLi.next();
	    }
	    if (end < totalPages) {
	        if (end < totalPages - 1) {
	            prevLi.after(`<li class="page-item page-number-pasta disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	        insertPageMainCourse(totalPages, prevLi);
	    }
	    function insertPageMainCourse(i, ref) {
	        let activeClass = (i === CurrentPage) ? "active" : "";

	        var li = `
	            <li class="page-item page-number-pasta ${activeClass}">
	                <a class="page-link" href="#" data-page="${i}">${i}</a>
	            </li>
	        `;

	        $(li).insertAfter(ref);
	    }
	}

	/*search-dessert*/
	$("#search-pasta").on("keydown", function(e) {
	    if (e.key === "Enter") {
	        loadPasta();
	    }
	});

	  /* Pagination + Fetch Blocked Accounts */
	  $("#btn-preview-pasta").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage > 1) {
	          loadPasta(CurrentPage - 1);
	      }
	  });

	/*Function load all important tags tickets*/
	  $("#btn-next-pasta").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage < totalPages) {
	          loadPasta(CurrentPage + 1);
	      }
	  });

	  /*Function to update details*/
	  function mdleditPasta(LineNum){
	      $("#mdl-add-pasta").modal('show');
	      $("#btn-update-pasta").removeClass('d-none');
	      $("#btn-submit-pasta").addClass('d-none');

	      $.post("dirs/menu_setup/actions/get_menu.php",{
	          LineNum : LineNum
	      },function(data){
	          response = JSON.parse(data);
	          if(jQuery.trim(response.isSuccess) == "success"){
	              $("#pasta-id").val(response.Data.LineNum);
	              $("#pasta-name").val(response.Data.DishName);
	              $("#pasta-description").val(response.Data.Description);
	              $("#pasta-ingredients").val(response.Data.Ingredients);
	          }else{
	              Swal.fire({
	                  icon: 'warning',
	                  title: 'Notice',
	                  text: $.trim(response.Data)
	              });
	          }
	      });
	  }

	  /*Function update pasta details*/
	    $("#btn-update-pasta").on("click", function () {
	        let $btn = $(this);
	        let $spinner = $("#btn-spinner-pasta-upd");
	        let $text = $btn.find(".btn-text-pasta");
	        let $btnCancel = $("#btn-cancel-pasta");
	        let LineNum     = $("#pasta-id").val();
	        let DishName    = $("#pasta-name").val();
	        let Description = $("#pasta-description").val();
	        let Ingredients =  $("#pasta-ingredients").val();
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
	                $("#mdl-add-pasta").modal("hide");
	                Swal.fire({
	                    icon: "success",
	                    title: "Success",
	                    text: "Updated successfully",
	                    showConfirmButton: false,
	                    timer: 2000,
	                    timerProgressBar: true
	                });
	                loadPasta(CurrentPage);
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
	    function removemdlPasta(LineNum) {
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
	                loadPasta(CurrentPage);
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
	    function enablePasta(LineNum){
	      var Status = 'Active';
	        $.post("dirs/menu_setup/actions/update_status.php", {
	            LineNum : LineNum,
	            Status : Status
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadPasta();
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
	    function disablePasta(LineNum){
	      var Status = 'In-Active';
	        $.post("dirs/menu_setup/actions/update_status.php", {
	            LineNum : LineNum,
	            Status : Status
	        },function(data){
	            if(jQuery.trim(data) == "success"){
	                loadPasta(CurrentPage);
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

	    $(document).on("click", "#pagination-pasta .page-link", function(e) {
	        e.preventDefault();
	        var page = $(this).data("page");
	        if (page && page !== CurrentPage) {
	            loadPasta(page);
	        }
	    });

</script>