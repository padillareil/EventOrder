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
                <button class="btn btn-link text-decoration-none text-secondary" type="button" onclick="addPackage()" title="Setup Event Food Package">
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
                emptyStatePkgMenu("venue package was empty.");
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
               <tr class="beverage-row align-middle" data-value="${bev.DocEntry}" ondblclick="mdlViewPackage('${bev.DocEntry}')">
                   <td class="text-muted fw-medium small">
                       ${bev.OrderNumber}
                   </td>

                   <td class="text-muted text-center small">
                       ${bev.VenPkg_Code || '—'}
                   </td>

                    <td class="text-muted text-center small">
                        ${bev.PackageName || '—'}
                    </td>

                   <td class="text-muted text-center small">
                       ${bev.PackageCategory || '—'}
                   </td>
                    <td class="text-center">
                        <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer
                            ${bev.PackageStatus === "Active" ? "bg-success-subtle text-success" : "bg-danger-subtle text-danger"}"
                            data-id="${bev.DocEntry}"
                            data-status="${bev.PackageStatus}">
                            ${bev.PackageStatus}
                        </span>
                    </td>

                   <td class="text-center">
                       <div class="dropdown">
                           <button class="btn btn-sm btn-icon btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="function() {}alse">
                               <i class="bi bi-three-dots-vertical"></i>
                           </button>

                           <ul class="dropdown-menu dropdown-menu-end shadow-sm">
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
                      No Venue Package Available!
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
                      No  Record Found!
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



    /*Function to edit package*/
    function mdlEditPackage(DocEntry) {
        $("#mdl-add-package").modal('show');
        $("#btn-submit-package").addClass("d-none");
        $("#btn-update-package").removeClass("d-none");
        $("#package-title").text('Update Venue Package');
        $("#btn-submit-package").addClass('d-none');
        $("#package-description").text('Update package setup to package list.');
        const display = $("#food_categories_display");
        display.html(`
            <div class="text-center p-4 text-muted">
                <div class="spinner-border text-dark"></div>
                <div class="mt-2">Loading...</div>
            </div>
        `);
        $.post("dirs/menu_setup/actions/get_summaryheader.php", {
            DocEntry: DocEntry
        }, function (data) {
            let response = JSON.parse(data);
            if ($.trim(response.isSuccess) === "success") {
                let header = response.Data;
                $("#package_id").val(header.DocEntry);
                $("#package-number").val(header.VenPkg_Code);
                $("#package-name").val(header.PackageName);
                $("#event-category").val(header.PackageCategory);
                $("#pax-amount").val(header.PaxAmount);
                $.post("dirs/menu_setup/actions/get_editcategory.php", {
                    PackageCode: header.VenPkg_Code
                }, function (foodData) {
                    let foodResponse = JSON.parse(foodData);
                    if ($.trim(foodResponse.isSuccess) === "success") {
                        let existingFoods = foodResponse.Data;
                        loadCategoriesForEdit(existingFoods);
                    } else {
                        display.html(`<div class="text-danger text-center">${foodResponse.Data}</div>`);
                    }
                });
            } else {
                display.html(`<div class="text-danger text-center">${response.Data}</div>`);
            }
        });
    }
/*Function to display for edit package*/
   function loadCategoriesForEdit(existingFoods) {
       const display = $("#food_categories_display");
       $.post("dirs/menu_setup/actions/get_foodcategory.php", {}, function (data) {
           let response = JSON.parse(data);
           if ($.trim(response.isSuccess) === "success") {
               let categories = response.Data;
               let foodMap = {};
               existingFoods.forEach(item => {
                   foodMap[item.FoodGroup] = item.SetupQty;
               });
               let html = `<div class="row g-2">`;
               categories.forEach(cat => {
                   let id = `cat-${cat.Mid}`;
                   let isChecked = foodMap[cat.Category] !== undefined;
                   let qty = isChecked ? foodMap[cat.Category] : "";
                   html += `
                       <div class="row align-items-center mb-2 editcategory-row">
                           <div class="col">
                               <div class="form-check d-flex align-items-center">

                                   <input  type="checkbox" id="${id}" class="form-check-input editcategory-checkbox me-2" name="edit-menus" value="${cat.Category}" ${isChecked ? "checked" : ""}
                                   >

                                   <label for="${id}" class="form-check-label mb-0">
                                       ${cat.Category}
                                   </label>

                               </div>
                           </div>

                           <div class="col-auto">
                               <div class="quantity-wrapper ${isChecked ? "" : "d-none"}">
                                   <input type="number" class="form-control form-control-sm editcategory-qty" style="width: 80px;" value="${qty}" min="1">
                               </div>
                           </div>
                       </div>
                   `;
               });
               html += `</div>`;
               display.html(html);
           } else {
               display.html(`<div class="text-danger text-center">${response.Data}</div>`);
           }
       });
   }

/*Function to apply edit */
   $(document).on("change", ".editcategory-checkbox", function () {
       let row = $(this).closest(".editcategory-row");
       let qtyBox = row.find(".quantity-wrapper");
       if ($(this).is(":checked")) {
           qtyBox.removeClass("d-none");
           let input = row.find(".editcategory-qty");
           if (!input.val()) {
               input.val(1);
           }
       } else {
           qtyBox.addClass("d-none");
           row.find(".editcategory-qty").val("");
       }
   });
     /*Function to apply edit package*/ 
   $("#btn-update-package").on("click", function () {

       let $btnSubmit = $("#btn-update-package");
       let $spinner = $("#btn-spinner-package-upd");
       let $text = $btnSubmit.find(".btn-text-package");
       let $btnClose = $("#btn-cancel-package");

       let PackageCode = $("#package-number").val();
       let EventName = $("#package-name").val();
       let PackageCategory = $("#event-category").val();
       let PaxAmount = $("#pax-amount").val();

       let Menus = [];

       $(".editcategory-row").each(function () {

           let checkbox = $(this).find(".editcategory-checkbox");

           if (checkbox.is(":checked")) {

               Menus.push({
                   Category: checkbox.val(),
                   Qty: $(this).find(".editcategory-qty").val() || 1
               });
           }
       });

       if (Menus.length === 0) {
           Swal.fire({
               icon: "warning",
               title: "No Menu Selected",
               text: "Please select at least one category."
           });
           return;
       }

       $btnSubmit.prop("disabled", true);
       $spinner.removeClass("d-none");
       $text.text("Updating...");
       $btnClose.prop("disabled", true);

       $.post("dirs/menu_setup/actions/update_packagesetup.php", {

           PackageCode: PackageCode,
           EventName: EventName,
           PackageCategory: PackageCategory,
           PaxAmount: PaxAmount,

           // 🔥 IMPORTANT FIX
           FoodCategory: JSON.stringify(Menus)

       }, function (data) {

           $btnSubmit.prop("disabled", false);
           $spinner.addClass("d-none");
           $text.text("Update");
           $btnClose.prop("disabled", false);

           if ($.trim(data) === "OK") {

               $("#frm-add-venuepackage")[0].reset();
               $("#mdl-add-package").modal("hide");

               loadMenuPackageTemplate();

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
       
      /*Function show modal Event package Summary*/
      function mdlViewPackage(DocEntry) {
          $("#mdl-view-package").modal('show');
          var display = $("#review-package");
          display.html(`
              <div class="text-center py-5">
                  <div class="spinner-border text-warning" role="status"></div>
                  <div class="mt-2 text-muted small fw-bold text-uppercase">Fetching Details...</div>
              </div>
          `);
          $.post("dirs/menu_setup/actions/get_pkgsummary.php", {
              DocEntry: DocEntry
          }, function (data) {
              let response = JSON.parse(data);
              if ($.trim(response.isSuccess) == "success") {
                  let header = response.Header;
                  let foods = response.Foods;

                  $("#package-code").text(header.VenPkg_Code);

                  // Grouping Logic
                  let grouped = {};
                  foods.forEach(item => {
                      if (!grouped[item.FoodGroup]) grouped[item.FoodGroup] = 0;
                      grouped[item.FoodGroup] += parseInt(item.SetupQty);
                  });

                  let foodList = "";
                  let totalItems = 0;
                  Object.keys(grouped).forEach(group => {
                      foodList += `
                          <div class="d-flex justify-content-between align-items-center mb-2 p-2 border-start border-3 border-warning bg-light rounded-end">
                              <span class="text-dark fw-medium ps-2">${group}</span>
                              <span class="badge bg-success-subtle text-success px-1 py-2 rounded-pill toggle-status cursor-pointer border ">${grouped[group]}</span>
                          </div>`;
                      totalItems += grouped[group];
                  });
                  display.html(`
                      <div class="mb-4 border-bottom pb-3">
                          <h4 class="fw-bold mb-1" style="color: #bf9b30;">${header.PackageName}</h4>
                          <div class="d-flex align-items-center">
                              <p class="text-muted small text-uppercase letter-spacing-1">${header.PackageCategory}</p>
                          </div>
                      </div>
                      <div class="mb-4">
                          <label class="form-label small fw-bold text-uppercase opacity-50 mb-3 text-spacing-1">Menu Setup</label>
                          ${foodList || '<div class="text-muted text-center small py-3 italic">No items configured</div>'}
                      </div>
                      <div class="rounded-4 p-4 text-white shadow-sm mb-3" style="background: linear-gradient(135deg, #bf9b30 0%, #a68525 100%);">
                          <div class="d-flex justify-content-between align-items-center">
                              <div>
                                  <p class="mb-0 small opacity-75 text-uppercase fw-bold">Rate Per Pax</p>
                                  <h2 class="fw-bold mb-0">₱ ${Number(header.PaxAmount).toLocaleString()}</h2>
                              </div>
                              <div class="text-end">
                                  <i class="bi bi-people-fill fs-1 opacity-25"></i>
                              </div>
                          </div>
                      </div>
                  `);

              } else {
                  display.html(`
                      <div class="alert alert-danger rounded-4 d-flex align-items-center" role="alert">
                          <i class="bi bi-exclamation-triangle-fill me-2"></i>
                          <div>Unable to retrieve package data.</div>
                      </div>
                  `);
              }
          });
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

