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
        <div class="card-body  bg-light-subtle">
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
                            <th class="fw-bold">UOM</th>
                            <th class="fw-bold text-end">Unit Cost</th>
                            <th class="fw-bold text-end">Amount</th>
                            <th class="pe-4 fw-bold text-end" style="width: 160px;">Actions</th>
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
    /*search-srv*/
    $("#search-ingredients").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadIngredients();
        }
    });

      /* Pagination + Fetch Blocked srvounts */
      $("#btn-preview-approval").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadIngredients(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-approval").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadIngredients(CurrentPage + 1);
          }
      });

      $(document).on("click", "#pagination-approval .page-link[data-page]", function (e) {
          e.preventDefault();

          loadIngredients($(this).data("page"));
      });
</script>
