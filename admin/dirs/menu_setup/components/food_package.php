<div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-3" id="foodpackage_content">
    <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-md-6 d-flex align-items-center gap-3">
                <h5 class="fw-bold mb-0">Package List</h5>
                <span class="badge rounded-pill bg-light text-dark border fw-medium px-3" id="total-package-created"></span>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-md-end">
                <div class="input-group border mr-2 bg-light px-3 flex-grow-1" style="max-width: 300px;">
                    <span class="input-group-text bg-transparent border-0 p-0 me-2">
                        <i class="bi bi-search text-muted small"></i>
                    </span>
                    <input type="search" class="form-control bg-transparent border-0 small py-2 shadow-none" id="search-package" placeholder="Search...">
                </div>
                <button class="btn btn-link text-decoration-none text-secondary" type="button" onclick="createPackage()" title="Setup Event Food Package">
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
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Package Code</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Event Type</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Category</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Status</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="border-top-0" id="load_Package_Menu_content">
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <nav>
            <ul class="pagination" id="pagination-packages">
                <li class="page-item" id="li-prev-packages">
                    <a class="page-link" href="#" id="btn-preview-packages">Previous</a>
                </li>
                <li class="page-item" id="li-next-packages">
                    <a class="page-link" href="#" id="btn-next-packages">Next</a>
                </li>
            </ul>
        </nav>
        <div id="page-info-packages" class="mt-3 small text-muted"></div>
    </div>
</div>



<script>
    var CurrentPage = 1;
    var PageSize = 10;
    var totalPages = 1;
    var isPackageMode = false;
    var selectedItems = [];


    function loadMenuPackageTemplate(page = 1) {
        CurrentPage = page; 
        var display = $("#load_Package_Menu_content");
        display.html(`
                <tr>
                    <td colspan="6" class="p-5 text-center text-muted">
                        <div class="spinner-border text-dark"></div>
                        <div class="mt-2">Loading...</div>
                    </td>
                </tr>
        `);
        var Search = $("#search-package").val();
        $.post("dirs/menu_setup/actions/get_pagination_packagemenu.php", {
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
                totalPackage();
                PackageMenuContent(response.Data);
                totalPages = (response.Data && response.Data.length > 0)
                    ? parseInt(response.Data[0].TotalPages)
                    : 1;

                    PkgMenuPageNumber();
                    PkgMenuPaginationUi();
            } else {
                emptyStatePkgMenu("package menu was empty.");
            }
        });
    }


    function PackageMenuContent(data) {
        const display = $("#load_Package_Menu_content");

        if (!data || data.length === 0) {
            showEmptyStatePkgMenu("No available.");
            return;
        }

        display.empty();

        data.forEach(bev => {
            display.append(`
               <tr class="beverage-row align-middle" data-value="${bev.DocEntry}">
                   <td class="text-muted fw-medium small">
                       ${bev.DocEntry}
                   </td>

                   <td class="text-muted text-center small">
                       ${bev.BuffetNum_tmp || '—'}
                   </td>

                    <td class="text-muted text-center small">
                        ${bev.EventName || '—'}
                    </td>

                   <td class="text-muted text-center small">
                       ${bev.EngagerType || '—'}
                   </td>
                    <td class="text-center">
                        <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer
                            ${bev.BuffStatus === "Active" ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}"
                            data-id="${bev.DocEntry}"
                            data-status="${bev.BuffStatus}">
                            ${bev.BuffStatus}
                        </span>
                    </td>

                   <td class="text-center">
                       <div class="dropdown">
                           <button class="btn btn-sm btn-icon btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                               <i class="bi bi-three-dots-vertical"></i>
                           </button>

                           <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                               <li>
                                   <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdlViewPackage('${bev.DocEntry}')">  <i class="bi bi-file-earmark-text"></i>  Review Package
                                   </a>
                               </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdlEditPackage('${bev.DocEntry}')">  <i class="bi bi-pencil"></i>  Edit Package
                                    </a>
                                </li>
                               <li>
                                   <a class="dropdown-item d-flex align-items-center gap-2" href="#"onclick="removemdlPackage('${bev.DocEntry}')"> <i class="bi bi-trash"></i> Remove
                                   </a>
                               </li>

                               <li>
                                   <hr class="dropdown-divider">
                               </li>

                               <li>
                                   <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="enablePackage('${bev.DocEntry}')">  <i class="bi bi-toggle-on text-success"></i>  Enable Package
                                   </a>
                               </li>

                               <li>
                                   <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="disablePackage('${bev.DocEntry}')">  <i class="bi bi-toggle-off text-danger"></i>  Disable Package
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
    function emptyStatePkgMenu(message) {
        $("#load_Package_Menu_content").html(`
            <tr>
              <td colspan="6" class="p-5 text-center text-muted">
                  <i class="bi bi-card-list text-lg"></i> 
                  <br>
                      No Menu Package Available!
            <div class="small opacity-75">${message}</div>
                  </td>
            </tr>
        `);
    }

    /*Function for no record of beverages*/
    function showEmptyStatePkgMenu(message) {
        $("#load_Package_Menu_content").html(`
            <tr>
              <td colspan="6" class="p-5 text-center text-muted">
                  <i class="bi bi-card-list text-lg"></i> 
                  <br>
                      No Menu Package Available!
            <div class="small opacity-75">${message}</div>
                  </td>
            </tr>
        `);
    }


    /*Function to count page number page 1 of and so on*/
    function PkgMenuPaginationUi() {
        $("#pagination-packages").text("Page " + CurrentPage + " of " + totalPages);
        if (CurrentPage <= 1) {
            $("#li-prev-packages").addClass("disabled");
        } else {
            $("#li-prev-packages").removeClass("disabled");
        }
        if (CurrentPage >= totalPages) {
            $("#li-next-packages").addClass("disabled");
        } else {
            $("#li-next-packages").removeClass("disabled");
        }
    }
    /*Function to build list of pagination*/
    function PkgMenuPageNumber() {
        $("#pagination-packages li.page-number-packages").remove();
        let prevLi = $("#li-prev-packages");
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
                prevLi.after(`<li class="page-item page-number-packages disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPageBreakfast(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-packages disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPageBreakfast(totalPages, prevLi);
        }
        function insertPageBreakfast(i, ref) {
            let activeClass = (i === CurrentPage) ? "active" : "";

            let li = `
                <li class="page-item page-number-packages ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }

    /*search-package*/
    $("#search-package").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadMenuPackageTemplate();
        }
    });

      /* Pagination + Fetch Blocked Accounts */
      $("#btn-preview-packages").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadMenuPackageTemplate(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-packages").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadMenuPackageTemplate(CurrentPage + 1);
          }
      });


      function mdlViewPackage() {
          $("#mdl-view-package").modal('show');
      }



      /*Function to remove this menu prompt*/
      function removemdlPackage(DocEntry) {
          Swal.fire({
              title: "Remove this package.",
              text: "This package will be permanently removed.",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#d33",
              cancelButtonColor: "#6c757d",
              confirmButtonText: "Remove",
              cancelButtonText: "Cancel"
          }).then((result) => {
              if (result.isConfirmed) {
                  removePackage(DocEntry);
              }
          });
      }

      /*Function to remove script*/
      function removePackage(DocEntry){
          $.post("dirs/menu_setup/actions/delete_package.php", {
              DocEntry : DocEntry
          },function(data){
              if(jQuery.trim(data) == "success"){
                loadMenuPackage();
                  Swal.fire({
                      icon: "success",
                      title: "Package Removed",
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
      function enablePackage(DocEntry){
        var Status = 'Active';
          $.post("dirs/menu_setup/actions/update_status_package.php", {
              DocEntry : DocEntry,
              Status : Status
          },function(data){
              if(jQuery.trim(data) == "success"){
                  loadMenuPackage();
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
      function disablePackage(DocEntry){
        var Status = 'In-Active';
          $.post("dirs/menu_setup/actions/update_status_package.php", {
              DocEntry : DocEntry,
              Status : Status
          },function(data){
              if(jQuery.trim(data) == "success"){
                  loadMenuPackage();
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

