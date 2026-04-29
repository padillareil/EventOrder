<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-header bg-white border-0 pt-4 px-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-2">
            <div class="d-flex align-items-center">
                <div class="p-3 rounded-3 me-3" style="background-color: rgba(191, 155, 48, 0.1);">
                    <i class="bi bi-megaphone fs-5 text-custom-gold"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold text-dark">Event Amenities Management</h5>
                    <p class="text-muted small mb-0">Create, organize, and manage hotel event amenities.</p>
                </div>
            </div>
        </div>

        
    </div>

    <div class="card-body p-2">
       <div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-3" id="amenities_content">
           <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
               <div class="row g-3 align-items-center">
                   <div class="col-12 col-md-6 d-flex align-items-center gap-3">
                       <h5 class="fw-bold mb-0">Amenities List</h5>
                   </div>
                   <div class="col-12 col-md-6 d-flex justify-content-md-end">
                       <div class="input-group border mr-2 bg-light px-3 flex-grow-1" style="max-width: 300px;">
                           <span class="input-group-text bg-transparent border-0 p-0 me-2">
                               <i class="bi bi-search text-muted small"></i>
                           </span>
                           <input type="search" class="form-control bg-transparent border-0 small py-2 shadow-none" id="search-amenitieslist" placeholder="Search...">
                       </div>
                       <button class="btn btn-link text-decoration-none text-secondary" type="button" onclick="addAmenities()" title="Setup Event Amenities">
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
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Category</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Rental Fee</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Corkage Fee</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Notes</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Status</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center pe-4">Actions</th>
                           </tr>
                       </thead>
                       <tbody class="border-top-0" id="load_Amenities_content">
                       </tbody>
                   </table>
               </div>
           </div>
           <div class="card-footer">
               <nav>
                   <ul class="pagination" id="pagination-amenities">
                       <li class="page-item" id="li-prev-amenities">
                           <a class="page-link" href="#" id="btn-preview-amenities">Previous</a>
                       </li>
                       <li class="page-item" id="li-next-amenities">
                           <a class="page-link" href="#" id="btn-next-amenities">Next</a>
                       </li>
                   </ul>
               </nav>
               <div id="page-info-amenities" class="mt-3 small text-muted"></div>
           </div>
       </div>
    </div>
</div>


<style>
    .text-custom-gold {
        color: #bf9b30 !important;
    }
</style>



<script>
	 /*Function format with comma*/
  	function formatComma(number) {
	    if (number == null) return "";
	    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
    var CurrentPage = 1;
    var PageSize = 10;
    var totalPages = 1;
    var isPackageMode = false;
    var selectedItems = [];


    function loadAmenitiesPage(page = 1) {
        CurrentPage = page; 
        var display = $("#load_Amenities_content");
        display.html(`
                <tr>
                    <td colspan="8" class="p-5 text-center text-muted">
                        <div class="spinner-border text-dark"></div>
                        <div class="mt-2">Loading...</div>
                    </td>
                </tr>
        `);
        var Search = $("#search-amenitieslist").val();
        $.post("dirs/amenities/actions/get_pagination_amenities.php", {
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
                AmenitiesContent(response.Data);
                totalPages = (response.Data && response.Data.length > 0)
                    ? parseInt(response.Data[0].TotalPages)
                    : 1;

                    AmenitiesPaginationUi();
                    AmenitiesPageNumber();
            } else {
                emptyStateAmenities("venue package was empty.");
            }
        });
    }


    function AmenitiesContent(data) {
        const display = $("#load_Amenities_content");
        if (!data || data.length === 0) {
            showEmptyStateAmentieis("No available.");
            return;
        }
        display.empty();

        data.forEach(acc => {
            display.append(`
               <tr class="beverage-row align-middle" data-value="${acc.Vid}">
                   <td class="text-muted fw-medium small">
                       ${acc.OrderNumber}
                   </td>

                   <td class="fw-semibold text-muted small">
                       ${acc.ItemDescription || '—'}
                   </td>

                    <td class="fw-semibold text-muted small">
                        ${acc.ItemCategory || '—'}
                    </td>
                    <td class="fw-semibold text-muted small">
                        ₱${formatComma(acc.RentalFee || '0')}
                    </td>
                    <td class="fw-semibold text-muted small">
                        ₱${formatComma(acc.CorkageFee || '0')}
                    </td>
	            	<td class="fw-semibold text-muted small">
	            	    ${acc.Notes || '—'}
	            	</td>
                    <td class="text-center">
                        <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer
                            ${acc.ItemStatus === "Active" ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}"
                            data-id="${acc.Vid}"
                            data-status="${acc.ItemStatus}">
                            ${acc.ItemStatus}
                        </span>
                    </td>

            	 <td class="text-center">
                   <div class="dropdown">
                       <button class="btn btn-sm btn-icon btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="function() {}alse">
                           <i class="bi bi-three-dots-vertical"></i>
                       </button>

                       <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdlEditAmenties('${acc.Vid}')">  <i class="bi bi-pencil"></i>  Edit Amenities
                                </a>
                            </li>
                           <li>
                               <a class="dropdown-item d-flex align-items-center gap-2" href="#"onclick="removeAmmenities('${acc.Vid}')"> <i class="bi bi-trash"></i> Remove
                               </a>
                           </li>

                           <li>
                               <hr class="dropdown-divider">
                           </li>

                           <li>
                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="enableAmenities('${acc.Vid}')">  <i class="bi bi-toggle-on text-success"></i>  Enable
                               </a>
                           </li>

                           <li>
                               <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="disableAmenities('${acc.Vid}')">  <i class="bi bi-toggle-off text-danger"></i>  Disable
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
    function emptyStateAmenities(message) {
        $("#load_Amenities_content").html(`
            <tr>
              <td colspan="8" class="p-5 text-center text-muted">
                  <i class="bi bi-card-list text-lg"></i> 
                  <br>
                      No Ammenities Available!
            <div class="small opacity-75">${message}</div>
                  </td>
            </tr>
        `);
    }

    /*Function for no record of beverages*/
    function showEmptyStateAmentieis(message) {
        $("#load_Amenities_content").html(`
            <tr>
              <td colspan="8" class="p-5 text-center text-muted">
                  <i class="bi bi-card-list text-lg"></i> 
                  <br>
                      No Record Found!
            <div class="small opacity-75">${message}</div>
                  </td>
            </tr>
        `);
    }


    /*Function to count page number page 1 of and so on*/
    function AmenitiesPaginationUi() {
        $("#page-info-amenities").text("Page " + CurrentPage + " of " + totalPages);
        if (CurrentPage <= 1) {
            $("#li-prev-amenities").addClass("disabled");
        } else {
            $("#li-prev-amenities").removeClass("disabled");
        }

        if (CurrentPage >= totalPages) {
            $("#li-next-amenities").addClass("disabled");
        } else {
            $("#li-next-amenities").removeClass("disabled");
        }
    }

    /*Function to build list of pagination*/
    function AmenitiesPageNumber() {
        $("#pagination-amenities li.page-number-amenities").remove();
        let prevLi = $("#li-prev-amenities");
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
                prevLi.after(`<li class="page-item page-number-amenities disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPageBreakfast(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-amenities disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPageBreakfast(totalPages, prevLi);
        }
        function insertPageBreakfast(i, ref) {
            let activeClass = (i === CurrentPage) ? "active" : "";

            let li = `
                <li class="page-item page-number-amenities ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }

    /*search-amenitieslist*/
    $("#search-amenitieslist").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadAmenities();
        }
    });

      /* Pagination + Fetch Blocked Accounts */
      $("#btn-preview-amenities").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadAmenities(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-amenities").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadAmenities(CurrentPage + 1);
          }
      });



      /*Function to remove this menu prompt*/
      function removeAmmenities(Vid) {
          Swal.fire({
              title: "Remove this amenities.",
              text: "This amenities will be permanently removed.",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#d33",
              cancelButtonColor: "#6c757d",
              confirmButtonText: "Remove",
              cancelButtonText: "Cancel"
          }).then((result) => {
              if (result.isConfirmed) {
                  removePackage(Vid);
              }
          });
      }

      /*Function to remove script*/
      function removePackage(Vid){
          $.post("dirs/amenities/actions/delete_amenities.php", {
              Vid : Vid
          },function(data){
              if(jQuery.trim(data) == "success"){
                loadAmenities();
                  Swal.fire({
                      icon: "success",
                      title: "Amenities Removed",
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
      function enableAmenities(Vid){
        var Status = 'Active';
          $.post("dirs/amenities/actions/update_amenitiesstatus.php", {
              Vid : Vid,
              Status : Status
          },function(data){
              if(jQuery.trim(data) == "success"){
                  loadAmenities();
                  Swal.fire({
                      icon: "success",
                      title: "Active",
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
      function disableAmenities(Vid){
        var Status = 'In-Active';
          $.post("dirs/amenities/actions/update_amenitiesstatus.php", {
              Vid : Vid,
              Status : Status
          },function(data){
              if(jQuery.trim(data) == "success"){
                  loadAmenities();
                  Swal.fire({
                      icon: "success",
                      title: "In-Active",
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