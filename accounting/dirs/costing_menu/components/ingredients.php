<div class="container-fluid">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Header Actions Block -->
        <div class="card-body bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <h5 class="fw-bold text-dark mb-1">Ingredients</h5>
                    <p class="text-muted small mb-0">Browse available ingredients, pricing, and menu categories.</p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-3 ms-md-auto">
                    <!-- Search Input Wrapper -->
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-ingredients" placeholder="Search...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Master Data Grid Layout -->
        <div class="card-body  bg-secondary-subtle">
            <div class="mb-3 justify-content-end d-flex">
                <nav aria-label="Event order directory page navigation">
                    <ul class="pagination pagination-sm mb-0 gap-1" id="pagination-ingredients">
                        <li class="page-item" id="li-prev-ingredients">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-preview-ingredients">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item" id="li-next-ingredients">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-next-ingredients">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="justify-content-end d-flex">
                <div id="page-info-ingredients" class="mt-1 small text-muted"></div>
            </div>
            
            <!-- Table Container Viewport -->
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 55vh;">
                <table class="table table-bordered table-hover align-middle mb-0" style="font-size: 13px;">
                    <thead class="sticky-top bg-white border-bottom align-middle text-secondary text-uppercase" style="z-index: 5; height: 52px;">
                        <tr>
                            <th class="ps-4 fw-bold" style="width: 120px;">#</th>
                            <th class="fw-bold">Ingredient</th>
                            <th class="fw-bold text-center" style="width: 200px;">UOM</th>
                            <th class="fw-bold text-center" style="width: 200px;">Unit Cost</th>
                            <th class="fw-bold text-center" style="width: 200px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="load_IngredientsLists">
                      

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<script>
        var CurrentPage = 1;
        var PageSize = 10;
        var totalPages = 1;
        var isPackageMode = false;
        var selectedItems = [];


        function loadIngredients(page = 1) {
            CurrentPage = page; 
            var display = $("#load_IngredientsLists");
            display.html(`
                    <tr>
                        <td colspan="5" class="p-5 text-center text-muted">
                            <div class="spinner-border text-dark"></div>
                            <div class="mt-2">Loading...</div>
                        </td>
                    </tr>
            `);
            var Search = $("#search-ingredients").val();
            $.post("dirs/costing_menu/actions/get_ingredients.php", {
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
                    IngredientsListContent(response.Data);
                    totalPages = (response.Data && response.Data.length > 0)
                        ? parseInt(response.Data[0].TotalPages)
                        : 1;

                        IngredientsPageNumber();
                        IngredientsPaginationUi();
                } else {
                    emptyStateIngredients("Quotation List was empty.");
                }
            });
        }


        function IngredientsListContent(data) {
            const display = $("#load_IngredientsLists");
            if (!data || data.length === 0) {
                showEmptyStateIngredients("No available.");
                return;
            }
            display.empty();

            data.forEach(srv => {
                display.append(`
                    <tr data-DocEntry="${srv.DocEntry}">

                        <td class="ps-4 font-monospace fw-semibold text-dark">
                            ${srv.OrderNumber || '--'}
                        </td>

                        <td class="fw-bold text-dark">
                            ${srv.Ingredient || '--'}
                        </td>

                        <td class="text-dark fw-medium text-center">
                            ${srv.Item_Uom || '--'}
                        </td>

                        <td>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light">
                                    PHP
                                </span>
                                <input type="text" class="form-control with-comma unit-cost text-end" value="${srv.Unit_Cost || 0}" disabled>
                            </div>
                        </td>
                        <td class="text-center pe-4">

                            <button class="btn btn-sm btn-outline-primary btn-edit" title="Adjust Ingredient Cost">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </td>

                    </tr>
                `);
            });
        }


        
        /*Function for no record of beverages*/
        function emptyStateIngredients(message) {
            $("#load_IngredientsLists").html(`
                <li class="d-flex flex-column justify-content-center align-items-center bg-white border rounded-3 p-5 mb-3 shadow-sm text-center">
                    <i class="bi bi-card-list fs-1 text-muted mb-3"></i>
                    <div class="fs-5 text-dark">No Quotation Available</div>
                    <div class="small text-muted mt-1">${message}</div>
                </li>
            `);
        }

        /*Function for no record of beverages*/
        function showEmptyStateIngredients(message) {
            $("#load_IngredientsLists").html(`
                <li class="d-flex flex-column justify-content-center align-items-center bg-white border rounded-3 p-5 mb-3 shadow-sm text-center">
                    <i class="bi bi-search fs-1 text-muted mb-3"></i>
                    <div class="fs-5 text-dark">No Record Found</div>
                    <div class="small text-muted mt-1">${message}</div>

                </li>
            `);
        }


        /*Function to count page number page 1 of and so on*/
        function IngredientsPaginationUi() {
            $("#page-info-ingredients").text("Page " + CurrentPage + " of " + totalPages);
            if (CurrentPage <= 1) {
                $("#li-prev-ingredients").addClass("disabled");
            } else {
                $("#li-prev-ingredients").removeClass("disabled");
            }

            if (CurrentPage >= totalPages) {
                $("#li-next-ingredients").addClass("disabled");
            } else {
                $("#li-next-ingredients").removeClass("disabled");
            }
        }


        /*Function to build list of pagination*/
        function IngredientsPageNumber() {
            $("#pagination-ingredients li.page-number-ingredients").remove();
            let prevLi = $("#li-prev-ingredients");
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
                    prevLi.after(`<li class="page-item page-number-ingredients disabled"><span class="page-link">...</span></li>`);
                    prevLi = prevLi.next();
                }
            }
            for (let i = start; i <= end; i++) {
                insertPageBreakfast(i, prevLi);
                prevLi = prevLi.next();
            }
            if (end < totalPages) {
                if (end < totalPages - 1) {
                    prevLi.after(`<li class="page-item page-number-ingredients disabled"><span class="page-link">...</span></li>`);
                    prevLi = prevLi.next();
                }
                insertPageBreakfast(totalPages, prevLi);
            }
            function insertPageBreakfast(i, ref) {
                let activeClass = (i === CurrentPage) ? "active" : "";

                let li = `
                    <li class="page-item page-number-ingredients ${activeClass}">
                        <a class="page-link" href="#" data-page="${i}">${i}</a>
                    </li>
                `;

                $(li).insertAfter(ref);
            }
        }

        /*inclusionlist*/
        $("#search-ingredients").on("keydown", function(e) {
            if (e.key === "Enter") {
                loadIngredients();
            }
        });

          /* Pagination + Fetch Blocked Accounts */
          $("#btn-preview-ingredients").on("click", function(e) {
              e.preventDefault();

              if (CurrentPage > 1) {
                  loadIngredients(CurrentPage - 1);
              }
          });

        /*Function load all important tags tickets*/
          $("#btn-next-ingredients").on("click", function(e) {
              e.preventDefault();

              if (CurrentPage < totalPages) {
                  loadIngredients(CurrentPage + 1);
              }
          });

          $("#select-branch").on("change", function() {
              CurrentPage = 1;
              const branch = $(this).val();
              loadIngredients(CurrentPage, branch);
          });


          $(document).on("click", "#pagination-ingredients .page-link", function(e) {
              e.preventDefault();
              var page = $(this).data("page");
              if (page && page !== CurrentPage) {
                  loadIngredients(page);
              }
          });



        /*Function to edit by row the input field of ingredients*/
          function editrowTable(button) {

              var row = $(button).closest("tr");
              var unitCost = row.find(".unit-cost");

              var isDisabled = unitCost.prop("disabled");

              // =========================
              // ENTER EDIT MODE
              // =========================
              if (isDisabled) {

                  unitCost.prop("disabled", false)
                          .addClass("border-primary shadow-sm");

                  $(button)
                      .removeClass("btn-outline-primary")
                      .addClass("btn-outline-success")
                      .html('<i class="bi bi-check-lg"></i>');

                  unitCost.focus();

              }

              // =========================
              // SAVE MODE
              // =========================
              else {

                  var DocEntry = row.data("docentry");
                  var UnitCost = unitCost.val();

                  // optional validation
                  if (UnitCost === "" || parseFloat(UnitCost) <= 0) {
                      Swal.fire({
                          icon: "warning",
                          title: "Invalid Unit Cost"
                      });
                      unitCost.focus();
                      return;
                  }

                  // lock UI immediately to prevent spam click
                  $(button).prop("disabled", true);

                  checkIngredientUpdate(DocEntry, UnitCost, button, row);
              }
          }

          $(document).on("click", ".btn-edit", function () {
              editrowTable(this);
          });




            /*Decision before it submitted*/
          function checkIngredientUpdate(DocEntry, UnitCost, button) {

              // ❗ GUARD CONDITION (NO DocEntry → DO NOTHING)
              if (!DocEntry || DocEntry === "" || DocEntry === null || DocEntry === undefined) {
                  return;
              }

              var row = $(button).closest("tr");
              var unitCostInput = row.find(".unit-cost");

              $.post("dirs/costing_menu/actions/get_priceupdate.php", {
                  DocEntry: DocEntry
              }, function (data) {

                  let response = JSON.parse(data);

                  if ($.trim(response.isSuccess) === "success") {

                      Swal.fire({
                          icon: "info",
                          title: "Already Updated",
                          text: "This ingredient has already been updated this month. Do you want to proceed?",
                          showCancelButton: true,
                          confirmButtonText: "Proceed",
                          cancelButtonText: "Cancel"
                      }).then((result) => {

                          if (result.isConfirmed) {

                              saveIngredient(DocEntry, UnitCost, button);

                          } else {

                              // RESET INPUT STATE
                              unitCostInput.prop("disabled", true)
                                  .removeClass("border-primary shadow-sm");

                              // RESTORE BUTTON
                              $(button)
                                  .prop("disabled", false)
                                  .removeClass("btn-outline-success")
                                  .addClass("btn-outline-primary")
                                  .html('<i class="bi bi-pencil"></i>');
                          }

                      });

                  } else {

                      saveIngredient(DocEntry, UnitCost, button);
                  }

              }).fail(function () {
                  Swal.fire({
                      icon: "error",
                      title: "Connection Error"
                  });
              });
          }


            /*Function to update price of the ingredients*/
            function saveIngredient(DocEntry, UnitCost, button) {
                var $btn = $(button);
                $btn.prop("disabled", true);
                var originalHtml = $btn.html();
                $btn.html(`
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                `);

                $.post(
                    "dirs/costing_menu/actions/update_ingredient.php",
                    {
                        DocEntry: DocEntry,
                        UnitCost: UnitCost
                    },
                    function (response) {
                        if ($.trim(response) === "success") {

                            var row = $btn.closest("tr");
                            row.find(".unit-cost")
                               .prop("disabled", true)
                               .removeClass("border-primary shadow-sm");
                            $btn
                                .removeClass("btn-outline-success")
                                .addClass("btn-outline-primary")
                                .html('<i class="bi bi-pencil"></i>');
                                loadIngredients();
                            Swal.fire({
                                icon: "success",
                                title: "Saved",
                                timer: 1500,
                                showConfirmButton: false
                            });

                        }
                        $btn.prop("disabled", false);
                        $btn.html(originalHtml);

                    }
                ).fail(function () {
                    Swal.fire({
                        icon: "error",
                        title: "Connection Error"
                    });
                    $btn.prop("disabled", false);
                    $btn.html(originalHtml);

                });

            }

</script>


