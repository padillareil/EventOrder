<div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-3" id="customservices_content">
    <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-md-6 d-flex align-items-center gap-3">
                <h5 class="fw-bold mb-0">Sub-Contracted Services</h5>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-md-end">
                <div class="input-group border mr-2 bg-light px-3 flex-grow-1" style="max-width: 300px;">
                    <span class="input-group-text bg-transparent border-0 p-0 me-2">
                        <i class="bi bi-search text-muted small"></i>
                    </span>
                    <input type="search" class="form-control bg-transparent border-0 small py-2 shadow-none" id="search-custominclusion" placeholder="Search...">
                </div>
                <button class="btn btn-link text-decoration-none text-secondary" type="button" onclick="addCustomInclusion()" title="Setup Event Custom Inclusion">
                    <i class="bi bi-ui-checks-grid text-lg"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive overflow-auto" style="height: 50vh;">
            <table class="table table-hover align-middle mb-0">
                <thead class="sticky-top bg-white border-bottom" style="z-index: 5;">
                    <tr>
                        <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted" style="width: 80px;">#</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Description</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Vendor</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Category</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Status</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="border-top-0" id="load_CustomInclusion_content">
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <nav>
            <ul class="pagination" id="pagination-custom">
                <li class="page-item" id="li-prev-custom">
                    <a class="page-link" href="#" id="btn-preview-custom">Previous</a>
                </li>
                <li class="page-item" id="li-next-custom">
                    <a class="page-link" href="#" id="btn-next-custom">Next</a>
                </li>
            </ul>
        </nav>
        <div id="page-info-custom" class="mt-3 small text-muted"></div>
    </div>
</div>

<script>
var CurrentPage = 1;
var PageSize = 10;
var totalPages = 1;
var isPackageMode = false;
var selectedItems = [];


function loadCustomInclusion(page = 1) {
    CurrentPage = page; 
    var display = $("#load_CustomInclusion_content");
    display.html(`
            <tr>
                <td colspan="6" class="p-5 text-center text-muted">
                    <div class="spinner-border text-dark"></div>
                    <div class="mt-2">Loading...</div>
                </td>
            </tr>
    `);
    var Search = $("#search-custominclusion").val();
    $.post("dirs/inclusion/actions/get_pagination_custominclusion.php", {
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
            CustomInclusionContent(response.Data);
            totalPages = (response.Data && response.Data.length > 0)
                ? parseInt(response.Data[0].TotalPages)
                : 1;

                CustomPageNumber();
                CustomPaginationUi();
        } else {
            emptyStateCustom("venue package was empty.");
        }
    });
}


function CustomInclusionContent(data) {
    const display = $("#load_CustomInclusion_content");
    if (!data || data.length === 0) {
        showEmptyStateCustom("No available.");
        return;
    }
    display.empty();

    data.forEach(bev => {
        display.append(`
           <tr class="beverage-row align-middle" data-value="${bev.LineNum}">
               <td class="text-muted fw-medium small">
                   ${bev.OrderNumber}
               </td>

               <td class="fw-semibold text-muted small">
                   ${bev.CustomDescription || '—'}
               </td>

                <td class="fw-semibold text-muted small">
                    ${bev.Vendor || '—'}
                </td>

               <td class="fw-semibold text-muted small">
                   ${bev.Category || '—'}
               </td>
                <td class="text-center">
                    <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer
                        ${bev.DocStatus === "Active" ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}"
                        data-id="${bev.LineNum}"
                        data-status="${bev.DocStatus}">
                        ${bev.DocStatus}
                    </span>
                </td>

               <td class="text-center">
                   <div class="dropdown">
                       <button class="btn btn-sm btn-icon btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="function() {}alse">
                           <i class="bi bi-three-dots-vertical"></i>
                       </button>

                       <ul class="dropdown-menu dropdown-menu-end shadow-sm">
				        	<li>
				        	    <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdlViewCustom('${bev.LineNum}')"><i class="bi bi-file-earmark-text"></i> Review Package
				        	    </a>
				        	</li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdlEditCUstom('${bev.LineNum}')">  <i class="bi bi-pencil"></i>  Edit Package
                                </a>
                            </li>
                           <li>
                               <a class="dropdown-item d-flex align-items-center gap-2" href="#"onclick="removemdlCustom('${bev.LineNum}')"> <i class="bi bi-trash"></i> Remove
                               </a>
                           </li>

                           <li>
                               <hr class="dropdown-divider">
                           </li>

                           <li>
                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="enableCustom('${bev.LineNum}')">  <i class="bi bi-toggle-on text-success"></i>  Enable Package
                               </a>
                           </li>

                           <li>
                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="disableCustom('${bev.LineNum}')">  <i class="bi bi-toggle-off text-danger"></i>  Disable Package
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
    $("#load_CustomInclusion_content").html(`
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
    $("#load_CustomInclusion_content").html(`
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
function CustomPaginationUi() {
    $("#page-info-custom").text("Page " + CurrentPage + " of " + totalPages);
    if (CurrentPage <= 1) {
        $("#li-prev-custom").addClass("disabled");
    } else {
        $("#li-prev-custom").removeClass("disabled");
    }

    if (CurrentPage >= totalPages) {
        $("#li-next-custom").addClass("disabled");
    } else {
        $("#li-next-custom").removeClass("disabled");
    }
}


/*Function to build list of pagination*/
function CustomPageNumber() {
    $("#pagination-custom li.page-number-inclusion").remove();
    let prevLi = $("#li-prev-custom");
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
            prevLi.after(`<li class="page-item page-number-inclusion disabled"><span class="page-link">...</span></li>`);
            prevLi = prevLi.next();
        }
    }
    for (let i = start; i <= end; i++) {
        insertPageBreakfast(i, prevLi);
        prevLi = prevLi.next();
    }
    if (end < totalPages) {
        if (end < totalPages - 1) {
            prevLi.after(`<li class="page-item page-number-inclusion disabled"><span class="page-link">...</span></li>`);
            prevLi = prevLi.next();
        }
        insertPageBreakfast(totalPages, prevLi);
    }
    function insertPageBreakfast(i, ref) {
        let activeClass = (i === CurrentPage) ? "active" : "";

        let li = `
            <li class="page-item page-number-inclusion ${activeClass}">
                <a class="page-link" href="#" data-page="${i}">${i}</a>
            </li>
        `;

        $(li).insertAfter(ref);
    }
}

/*inclusionlist*/
$("#search-custominclusion").on("keydown", function(e) {
    if (e.key === "Enter") {
        loadCustomInclusion();
    }
});

  /* Pagination + Fetch Blocked Accounts */
  $("#btn-preview-custom").on("click", function(e) {
      e.preventDefault();

      if (CurrentPage > 1) {
          loadCustomInclusion(CurrentPage - 1);
      }
  });

/*Function load all important tags tickets*/
  $("#btn-next-custom").on("click", function(e) {
      e.preventDefault();

      if (CurrentPage < totalPages) {
          loadCustomInclusion(CurrentPage + 1);
      }
  });


  /*Function to remove this menu prompt*/
  function removemdlCustom(LineNum) {
      Swal.fire({
          title: "Remove this inclusion.",
          text: "This inclusion will be permanently removed.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#6c757d",
          confirmButtonText: "Remove",
          cancelButtonText: "Cancel"
      }).then((result) => {
          if (result.isConfirmed) {
              removePackage(LineNum);
          }
      });
  }

  /*Function to remove script*/
  function removePackage(LineNum){
      $.post("dirs/inclusion/actions/delete_custom.php", {
          LineNum : LineNum
      },function(data){
          if(jQuery.trim(data) == "success"){
            loadCustomServices();
              Swal.fire({
                  icon: "success",
                  title: "Inclusion Removed",
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
  function enableCustom(LineNum){
    var Status = 'Active';
      $.post("dirs/inclusion/actions/update_customstatus.php", {
          LineNum : LineNum,
          Status : Status
      },function(data){
          if(jQuery.trim(data) == "success"){
              loadCustomServices();
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

  /*Function enable menu*/
  function disableCustom(LineNum){
    var Status = 'In-Active';
      $.post("dirs/inclusion/actions/update_customstatus.php", {
          LineNum : LineNum,
          Status : Status
      },function(data){
          if(jQuery.trim(data) == "success"){
              loadCustomServices();
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


$("#frm-add-custom").on("keydown", function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        return false;
    }
});
    /*Function to edit custom inclusion*/ 
  $("#btn-update-custom").on("click", function () {
      let $btnSubmit = $("#btn-update-custom");
      let $spinner = $("#btn-spinner-custom-upd");
      let $text = $btnSubmit.find(".btn-text-custom");
      let $btnClose = $("#btn-cancel-custom");

      var LineNum = $("#custom-id").val();
      var Description  = $("#custom-description").val();
      var Vendor   = $("#custom-vendor").val();
      var Type   = $("#custom-type").val();
      var Category  = $("#category-custom").val();
      var Quantity   = $("#custom-quantity").val();
      var UnitCost  = $("#custom-cost").val();
      var SellingPrice  = $("#custom-price").val();

      $btnSubmit.prop("disabled", true);
      $spinner.removeClass("d-none");
      $text.text("Updating...");
      $btnClose.prop("disabled", true);

      $.post("dirs/inclusion/actions/update_inclusioncustom.php", {

      	  LineNum: LineNum,
          Description: Description,
          Vendor:Vendor,
          Type: Type,
          Category: Category,
          Quantity: Quantity,
          UnitCost: UnitCost,
          SellingPrice: SellingPrice

      }, function (data) {

          $btnSubmit.prop("disabled", false);
          $spinner.addClass("d-none");
          $text.text("Updating...");
          $btnClose.prop("disabled", false);

          if ($.trim(data) === "success") {

              $("#frm-add-custom")[0].reset();
              $("#mdl-add-custom").modal("hide");
              loadCustomServices();

              Swal.fire({
                  toast: true,
                  position: "top-end",
                  icon: "success",
                  title: "Successfully Updated",
                  showConfirmButton: false,
                  timer: 2000
              });

          } else {
              Swal.fire({
                  icon: "error",
                  title: "Oops!",
                  text: data
              });
          }
      });
  });

   /*Function format with comma*/
  	function formatComma(number) {
	    if (number == null) return "";
	    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	  }


/*Function vieww modal summary of Inclusions*/
  function mdlViewCustom(LineNum) {
      $("#mdl-view-custominclusion").modal('show');
      var display = $("#review-custominclusion");

      // Simple Loader
      display.html(`
          <div class="text-center py-5">
              <div class="spinner-border text-warning" role="status"></div>
              <div class="mt-2 text-muted small fw-bold">Fetching Details...</div>
          </div>
      `);

      $.post("dirs/inclusion/actions/get_custominclusiondata.php", {
          LineNum: LineNum
      }, function (data) {
          let response = JSON.parse(data);

          if ($.trim(response.isSuccess) == "success") {
              let item = response.Data;
              
              display.html(`
                  <div class="mb-4 border-bottom pb-3">
                      <h4 class="fw-bold mb-1" style="color: #bf9b30;">${item.CustomDescription}</h4>
                      <p class="text-muted small text-uppercase letter-spacing-1 mb-0">Code: ${item.CustomCode}</p>
                  </div>

                  <div class="mb-4">
                      <label class="form-label small fw-bold text-uppercase opacity-50 mb-3 text-spacing-1">Information</label>
                      
                      <div class="d-flex justify-content-between align-items-center mb-2 p-2 border-start border-3 border-warning bg-light rounded-end">
                          <span class="text-dark fw-medium ps-2">Category</span>
                          <span class="text-muted pe-2">${item.Category}</span>
                      </div>

                      <div class="d-flex justify-content-between align-items-center mb-2 p-2 border-start border-3 border-warning bg-light rounded-end">
                          <span class="text-dark fw-medium ps-2">Vendor</span>
                          <span class="text-muted pe-2">${item.Vendor || 'In-House'}</span>
                      </div>
              			<div class="d-flex justify-content-between align-items-center mb-2 p-2 border-start border-3 border-warning bg-light rounded-end">
              			    <span class="text-dark fw-medium ps-2">Type</span>
              			    <span class="text-muted pe-2">${item.InclusionType || '-'}</span>
              			</div>
		              	<div class="d-flex justify-content-between align-items-center mb-2 p-2 border-start border-3 border-warning bg-light rounded-end">
		              	    <span class="text-dark fw-medium ps-2">Quantity</span>
		              	    <span class="text-muted pe-2">${item.Quantity || '-'}</span>
		              	</div>
                      <div class="d-flex justify-content-between align-items-center mb-2 p-2 border-start border-3 border-warning bg-light rounded-end">
                          <span class="text-dark fw-medium ps-2">Unit Cost</span>
                          <span class="text-muted fw-bold pe-2">₱ ${formatComma(item.UnitCost)}</span>
                      </div>
                  </div>

                  <div class="rounded-4 p-4 text-white shadow-sm mb-3" style="background: linear-gradient(135deg, #bf9b30 0%, #a68525 100%);">
                      <div class="d-flex justify-content-between align-items-center">
                          <div>
                              <p class="mb-0 small opacity-75 text-uppercase fw-bold">Selling Price</p>
                              <h2 class="fw-bold mb-0">₱ ${formatComma(item.SellingPrice)}</h2>
                          </div>
                          <div class="text-end">
                              <i class="bi bi-tag-fill fs-1 opacity-25"></i>
                          </div>
                      </div>
                  </div>
              `);

          } else {
              display.html(`
                  <div class="alert alert-danger rounded-4 d-flex align-items-center" role="alert">
                      <i class="bi bi-exclamation-triangle-fill me-2"></i>
                      <div>Unable to retrieve data.</div>
                  </div>
              `);
          }
      });
  }
</script>
