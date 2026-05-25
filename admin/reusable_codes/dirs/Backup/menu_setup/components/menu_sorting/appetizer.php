<div class="justify-content-end mr-4 d-flex mt-2 gap-2">
	<div class="input-group border bg-light px-3 flex-grow-1" style="max-width: 300px;">
	    <span class="input-group-text bg-transparent border-0 p-0 me-2">
	        <i class="bi bi-search text-muted small"></i>
	    </span>
	    <input type="search" id="search-appetizers" class="form-control bg-transparent border-0 small py-2 shadow-none" placeholder="Search...">
	</div>
	<button class="btn btn-primary" type="button" onclick="addAppetizer()"><i class="bi bi-plus-lg"></i> Add Appetizer</button>
</div>
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
	            <tbody class="border-top-0" id="load_Appetizers_content">
	            </tbody>
	        </table>
	    </div>
	</div>

	<div class="card-footer">
	    <nav>
	        <ul class="pagination" id="pagination-appetizer">
	            <li class="page-item" id="li-prev-appetizer">
	                <a class="page-link" href="#" id="btn-preview-appetizer">Previous</a>
	            </li>
	            <li class="page-item" id="li-next-appetizer">
	                <a class="page-link" href="#" id="btn-next-appetizer">Next</a>
	            </li>
	        </ul>
	    </nav>
	    <div id="page-info-appetizer" class="mt-3 small text-muted"></div>
	</div>
</div>




<script>
	var CurrentPage = 1;
	var PageSize = 10;
	var totalPages = 1;
	var isPackageMode = false;
	var selectedItems = [];


	function loadAppetizers(page = 1) {
	    CurrentPage = page; 
	    var display = $("#load_Appetizers_content");
	    display.html(`
	            <tr>
		            <td colspan="6" class="p-5 text-center text-muted">
		    			<div class="spinner-border text-dark"></div>
		                <div class="mt-2">Loading...</div>
		    		</td>
	            </tr>
	    `);
	    var Search = $("#search-appetizers").val();
	    $.post("dirs/menu_setup/actions/get_pagination_appetizer.php", {
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
	            AppetizerContent(response.Data);
	            totalPages = (response.Data && response.Data.length > 0)
	                ? parseInt(response.Data[0].TotalPages)
	                : 1;

	                AppetizerPageNumber();
	                AppetizerPaginationUi();
	        } else {
	            emptyStateAppetizer("Appetizers menu was empty.");
	        }
	    });
	}


	function AppetizerContent(data) {
	    const display = $("#load_Appetizers_content");

	    if (!data || data.length === 0) {
	        showEmptyState("No menu available.");
	        return;
	    }

	    display.empty();

	    data.forEach(apptzr => {
	        display.append(`
	           <tr class="appetizer-row align-middle" data-value="${apptzr.LineNum}">
	               <td class="text-muted fw-medium small">
	                   ${apptzr.OrderNumber}
	               </td>

	               <td>
	                   <div class="fw-semibold text-dark">
	                       ${apptzr.DishName}
	                   </div>
	               </td>

	               <td class="text-muted text-center small">
	                   ${apptzr.Description || '—'}
	               </td>

	               <td class="text-muted text-center small">
	                   ${apptzr.Ingredients || '—'}
	               </td>
	        	 	<td class="text-center">
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
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdleditAppetizer('${apptzr.LineNum}')">  <i class="bi bi-pencil text-primary"></i>  Edit
	                               </a>
	                           </li>
	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2 text-danger"href="#"onclick="removemdlAppetizer('${apptzr.LineNum}')"> <i class="bi bi-trash"></i> Remove
	                               </a>
	                           </li>

	                           <li>
	                               <hr class="dropdown-divider">
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="enableAppetizer('${apptzr.LineNum}')">  <i class="bi bi-toggle-on text-success"></i>  Enable
	                               </a>
	                           </li>

	                           <li>
	                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="disableAppetizer('${apptzr.LineNum}')">  <i class="bi bi-toggle-off text-secondary"></i>  Disable
	                               </a>
	                           </li>
	                       </ul>
	                   </div>
	               </td>
	           </tr>
	        `);
	    });
	}

	/*Function for no record of appetizers*/
	function emptyStateAppetizer(message) {
	    $("#load_Appetizers_content").html(`
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

	/*Function for no record of appetizers*/
	function showEmptyState(message) {
	    $("#load_Appetizers_content").html(`
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
	function AppetizerPaginationUi() {
	    $("#page-info-appetizer").text("Page " + CurrentPage + " of " + totalPages);
	    if (CurrentPage <= 1) {
	        $("#li-prev-appetizer").addClass("disabled");
	    } else {
	        $("#li-prev-appetizer").removeClass("disabled");
	    }
	    if (CurrentPage >= totalPages) {
	        $("#li-next-appetizer").addClass("disabled");
	    } else {
	        $("#li-next-appetizer").removeClass("disabled");
	    }
	}
	/*Function to build list of pagination*/
	function AppetizerPageNumber() {
	    $("#pagination-appetizer li.page-number-appetizer").remove();
	    var prevLi = $("#li-prev-appetizer");
	    var maxVisible = 5;
	    var start = Math.max(1, CurrentPage - 2);
	    var end = Math.min(totalPages, start + maxVisible - 1);
	    if (end - start < maxVisible - 1) {
	        start = Math.max(1, end - maxVisible + 1);
	    }
	    if (start > 1) {
	        insertPageAppetizer(1, prevLi);
	        prevLi = prevLi.next();

	        if (start > 2) {
	            prevLi.after(`<li class="page-item page-number-appetizer disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	    }
	    for (var i = start; i <= end; i++) {
	        insertPageAppetizer(i, prevLi);
	        prevLi = prevLi.next();
	    }
	    if (end < totalPages) {
	        if (end < totalPages - 1) {
	            prevLi.after(`<li class="page-item page-number-appetizer disabled"><span class="page-link">...</span></li>`);
	            prevLi = prevLi.next();
	        }
	        insertPageAppetizer(totalPages, prevLi);
	    }
	    function insertPageAppetizer(i, ref) {
	        var activeClass = (i === CurrentPage) ? "active" : "";

	        var li = `
	            <li class="page-item page-number-appetizer ${activeClass}">
	                <a class="page-link" href="#" data-page="${i}">${i}</a>
	            </li>
	        `;

	        $(li).insertAfter(ref);
	    }
	}

	/*Search-appetizer*/
	$("#search-appetizers").on("keydown", function(e) {
	    if (e.key === "Enter") {
	        loadAppetizers();
	    }
	});

	  /* Pagination + Fetch Blocked Accounts */
	  $("#btn-preview-appetizer").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage > 1) {
	          loadAppetizers(CurrentPage - 1);
	      }
	  });

	/*Function load all important tags tickets*/
	  $("#btn-next-appetizer").on("click", function(e) {
	      e.preventDefault();

	      if (CurrentPage < totalPages) {
	          loadAppetizers(CurrentPage + 1);
	      }
	  });


	  $(document).on("click", "#pagination-appetizer .page-link", function(e) {
	      e.preventDefault();

	      var page = $(this).data("page");
	      if (page && page !== CurrentPage) {
	          loadAppetizers(page);
	      }
	  });
</script>





