<div class="justify-content-end mr-4 d-flex mt-2 gap-2">
	<div class="input-group border bg-light px-3 flex-grow-1" style="max-width: 300px;">
	    <span class="input-group-text bg-transparent border-0 p-0 me-2">
	        <i class="bi bi-search text-muted small"></i>
	    </span>
	    <input type="search" id="search-appetizers" class="form-control bg-transparent border-0 small py-2 shadow-none" placeholder="Search...">
	</div>
	<button class="btn btn-primary" type="button" onclick="addAppetizer()"><i class="bi bi-plus-lg"></i> Add Appetizer</button>
</div>

<!-- Load Appetizers Content -->
<div class="row mt-3">
	<div id="load_Appetizers_content">
	</div>
</div>



<style>
    /* Base Card */
    .selection-card {
        border: 1px solid #e9ecef !important;
        background-color: #ffffff;
        cursor: pointer;
        transition: all 0.25s ease-in-out;
    }

    /* Hover State */
    .selection-card:hover {
        background-color: #f8f9fa !important;
        transform: translateY(-3px);
    }

    /* THE SUCCESS STATE (When Checked) */
    .btn-check:checked + .selection-card {
        background-color: #f1fdf7 !important; /* Very light success green */
        border-color: #198754 !important;      /* Bootstrap Success Green */
        box-shadow: 0 4px 12px rgba(25, 135, 84, 0.15) !important;
    }

    /* Text and Icon Logic */
    .check-icon { display: none; }
    .btn-check:checked + .selection-card .check-icon { display: block; }
    .btn-check:checked + .selection-card .uncheck-icon { display: none; }

    /* Change item name to green when selected */
    .btn-check:checked + .selection-card .item-name {
        color: #198754 !important;
    }
    .selection-card {
        transition: all 0.25s ease, transform 0.2s ease;
    }
</style>

<script>
	var CurrentPage = 1;
	var PageSize = 20;
	var totalPages = 1;
	var isPackageMode = false;
	var selectedItems = [];


	function loadAppetizers() {
	    var display = $("#load_Appetizers_content");

	    display.html(`
	        <div class="text-center py-5 text-muted">
	            <div class="spinner-border text-danger"></div>
	            <div class="mt-2">Loading...</div>
	        </div>
	    `);

	    var Search = $("#search-appetizers").val();

	    $.post("dirs/menu_setup/actions/get_appetizers.php", {
	        CurrentPage,
	        PageSize,
	        Search
	    }, function (data) {

	        let response;

	        try {
	            response = JSON.parse(data);
	        } catch (e) {
	            display.html(`<div class="text-danger text-center py-4">Server Error</div>`);
	            return;
	        }

	        if ($.trim(response.isSuccess) === "success") {

	            AppetizerContent(response.Data);

	            totalPages = (response.Data && response.Data.length > 0)
	                ? parseInt(response.Data[0].TotalPages)
	                : 1;

	           /* PageNumberAppetizer();
	            PaginationAppetizer();*/

	        } else {

	            emptyStateAppetizer("Appetizers menu was empty.");

	        }

	    });
	}


	function AppetizerContent(data) {
	    const display = $("#load_Appetizers_content");

	    if (!data || data.length === 0) {
	        showEmptyState("Click 'Add Appetizer' to create menu.");
	        return;
	    }

	    display.html(`<div class="row g-3" id="appetizer-grid"></div>`);
	    const grid = $("#appetizer-grid");

	    data.forEach(apptzr => {

	        const checkboxId = "apptzr_" + apptzr.ID;

	        grid.append(`
	            <div class="col-md-4 col-lg-3">
	                
	                <input type="checkbox" 
	                       class="btn-check appetizer-checkbox"
	                       id="${checkboxId}"
	                       value="${apptzr.ID}"
	                       autocomplete="off">

	                <label for="${checkboxId}" 
	                       class="btn btn-outline-light d-flex align-items-center p-3 rounded-4 border w-100 h-100 transition-all shadow-sm selection-card">

	                    <div class="custom-check-indicator me-3">
	                        <i class="bi bi-check-circle-fill fs-5 text-success check-icon"></i>
	                        <i class="bi bi-circle fs-5 text-muted uncheck-icon"></i>
	                    </div>

	                    <div class="text-start">
	                        <span class="fw-bold text-dark d-block mb-0 item-name">
	                            ${apptzr.DishName}
	                        </span>
	                        <small class="text-muted">
	                            ${apptzr.Description || 'No description'}
	                        </small>
	                    </div>

	                </label>
	            </div>
	        `);
	    });
	}

	


	function emptyStateAppetizer(message) {
	    $("#load_Appetizers_content").html(`
	        <div class="d-flex flex-column align-items-center text-muted py-5">
	            <div class="mb-3" style="font-size: 40px; opacity: .35;">
	                <i class="bi bi-card-list"></i>
	            </div>
	            <div class="fw-semibold">No Menu Available.</div>
	            <div class="small opacity-75">${message}</div>
	        </div>
	    `);
	}


	$(document).on("change", ".appetizer-checkbox", function () {
	    const id = $(this).val();
	    const card = $(this).closest(".appetizer-card");

	    if (this.checked) {
	        if (!selectedItems.includes(id)) {
	            selectedItems.push(id);
	        }
	        card.addClass("selected");
	    } else {
	        selectedItems = selectedItems.filter(x => x != id);
	        card.removeClass("selected");
	    }

	    updatePackageBar();
	});

	function updatePackageBar() {
	    if (isPackageMode && selectedItems.length > 0) {
	        $("#package-bar").removeClass("d-none");
	        $("#selected-count").text(selectedItems.length);
	    } else {
	        $("#package-bar").addClass("d-none");
	    }
	}


/*pAgination*/
	$(document).on("click", ".page-link", function (e) {
	    e.preventDefault();
	    CurrentPage = parseInt($(this).data("page"));
	    loadAppetizers();
	});

	$("#btn-preview").on("click", function () {
	    if (CurrentPage > 1) {
	        CurrentPage--;
	        loadAppetizers();
	    }
	});

	$("#btn-next").on("click", function () {
	    if (CurrentPage < totalPages) {
	        CurrentPage++;
	        loadAppetizers();
	    }
	});
</script>


<style>
	.appetizer-card {
	    cursor: pointer;
	    transition: 0.2s ease;
	}

	.appetizer-card:hover {
	    transform: scale(1.02);
	}

	.appetizer-card.selected {
	    border: 2px solid #0d6efd;
	    background: #f0f7ff;
	}
</style>