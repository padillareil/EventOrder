
<div class="row g-3">
  <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
      
      <div>
          <h6 class="fw-bold mb-1">Food Menu</h6>
          <p class="text-muted small mb-0">Insert food options, dietary styles, and menu selections here.</p>
      </div>

      <div style="min-width: 240px;">
          <label class="form-label small text-muted fw-bold mb-1" for="serving_type">Serving Type (Under Development)</label>
          <select class="form-select bg-transparent shadow-none py-2 px-3 small text-muted rounded-3" id="serving_type" >
              <option value="" disabled selected hidden>Choose...</option>
              <option value="Snacks">Snacks</option>
              <option value="Buffet">Buffet</option>
              <option value="Dinner">Dinner</option>
              <option value="Beverage">Beverage</option>
          </select>
      </div>

  </div>
  <div class="col-12 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button class="btn btn-success text-white px-3 py-2 rounded-3 shadow-sm border-0 small fw-medium" type="button" onclick="addCustomFood()">
            <i class="bi bi-plus-lg me-1"></i> Add Custom
        </button>
    </div>

    <div class="input-group border rounded-3 bg-white px-2 py-2 shadow-sm mb-3">
        <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-search"></i></span>
        <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search_food_items" placeholder="Search menu...">
    </div>

    <div class="list-group list-group-flush" id="food_list_group">

        <div class="list-group list-group-flush" id="display-pre-setupfood"></div>

        
        <label class="list-group-item px-4 py-3 border border-success selection-row selection-food  position-relative d-block mb-2 rounded-3 shadow-sm" for="food-pastries">
            <div class="form-check custom-check-success mb-0 d-flex align-items-start gap-3 pe-4">
                <input class="form-check-input mt-1 shadow-none border-success" type="checkbox" id="food-pastries" value="pastries_platter">
                <div class="flex-grow-1">
                    <div class="fw-semibold text-dark lh-1 py-1 food_name">
                        Assorted Pastries Platter
                    </div>
                    <div class="small text-muted mt-1 food_description">
                        A sweet and savory collection of mini croissants, danishes, muffins, and turn-overs. Perfect for mid-morning sessions.
                    </div>
                    <input type="hidden" class="food_category">
                </div>
            </div>
        </label>

        <label class="list-group-item px-4 py-3 border border-success selection-row selection-food position-relative d-block mb-2 rounded-3 shadow-sm" for="food-buffet-classic">
            <div class="form-check custom-check-success mb-0 d-flex align-items-start gap-3 pe-4">
                <input class="form-check-input mt-1 shadow-none border-success" type="checkbox" id="food-buffet-classic" value="classic_buffet">
                <div class="flex-grow-1">
                    <div class="fw-semibold text-dark lh-1 py-1 food_name">
                        Classic International Buffet
                    </div>
                    <div class="small text-muted mt-1 food_description">
                        Features 2 main courses (beef/chicken), 1 fish option, herbed rice, a seasonal garden salad bar, and assorted mini-desserts.
                    </div>
                    <input type="hidden" class="food_category">
                </div>
            </div>
        </label>

        <label class="list-group-item px-4 py-3 border border-success selection-row selection-food position-relative d-block mb-2 rounded-3 shadow-sm" for="food-drinks-freeflow">
            <div class="form-check custom-check-success mb-0 d-flex align-items-start gap-3 pe-4">
                <input class="form-check-input mt-1 shadow-none border-success" type="checkbox" id="food-drinks-freeflow" value="freeflow_beverages">
                <div class="flex-grow-1">
                    <div class="fw-semibold text-dark lh-1 py-1 food_name">
                        Free-Flow Brewed Coffee & Tea
                    </div>
                    <div class="small text-muted mt-1 food_description">
                        Stationed hot beverage bar accessible throughout the event duration, supplied with milk, creamers, and sweeteners.
                    </div>
                    <input type="hidden" class="food_category">
                </div>
            </div>
        </label>
        
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    // Isolated real-time search logic optimized for food selectors
    $('#search_food_items').on('input', function () {
      const searchTerm = $(this).val().toLowerCase().trim();
      const $listGroup = $('#food_list_group');
      
      const $rows = $listGroup.find('.selection-row').not('#empty-food-search-state');
      let visibleCount = 0;

      $rows.each(function () {
        const itemTitle = $(this).find('.fw-semibold').text().toLowerCase();
        const itemDesc = $(this).find('.small.text-muted').text().toLowerCase();

        if (itemTitle.indexOf(searchTerm) !== -1 || itemDesc.indexOf(searchTerm) !== -1) {
          $(this).attr('style', 'display: block !important');
          visibleCount++;
        } else {
          $(this).attr('style', 'display: none !important');
        }
      });

      // Handle the empty search layout internally
      if (visibleCount === 0 && searchTerm !== "") {
        if ($('#empty-food-search-state').length === 0) {
          const emptyStateHTML = `
            <div id="empty-food-search-state" class="text-center py-5 border rounded-3 bg-light text-muted shadow-sm mb-2 animate__animated animate__fadeIn">
              <div class="mb-2">
                <i class="bi bi-exclamation-circle text-warning fs-2"></i>
              </div>
              <h6 class="fw-bold text-secondary mb-1">No record found.</h6>
              <p class="small mb-0 px-3">We couldn't find any menu matching your description.</p>
            </div>
          `;
          $listGroup.append(emptyStateHTML);
        }
      } else {
        $('#empty-food-search-state').remove();
      }
    });
  });
</script>

<style>
    /* Clean layout styling matching your exact system aesthetics */
    .selection-row {
        cursor: pointer;
        transition: all 0.2s ease;
        border-left: 5px solid #28a745 !important;
        background-color: #fff;
        border-bottom: 1px solid #f8f9fa;
    }

    .selection-row:hover {
        background-color: #f8f9fa;
    }

    .selection-row:has(.form-check-input:checked) {
        background-color: #f2faf4 !important; 
    }

    .custom-check-success .form-check-input {
        width: 1.25rem;
        height: 1.25rem;
        border: 2px solid #28a745;
    }

    .custom-check-success .form-check-input:checked {
        background-color: #28a745;
        border-color: #28a745;
    }
</style>