<h6 class="fw-bold">Equipments Arrangement Setup</h6>
<p class="text-muted small">Setup arrangement for event here.</p>

<div class="row g-3">
 

  <div class="col-12 mt-4">
      <!-- Header with Actions -->
      <div class="d-flex justify-content-between align-items-center mb-3">
          <button class="btn btn-success border px-3 py-2 rounded-3 shadow-sm" type="button" onclick="addCustomEquipment()">
              <i class="bi bi-plus me-2.5"></i> Add Custom
          </button>
      </div>

      <!-- Search Field -->
      <div class="input-group border rounded-3 bg-white px-2 py-2 shadow-sm mb-3">
          <span class="input-group-text bg-transparent border-0 py-0 pe-2 text-muted"><i class="bi bi-search"></i></span>
          <input type="text" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search_arrangements" placeholder="Search arrangements...">
      </div>

      <!-- Arrangements List Container -->
      <div class="list-group list-group-flush" id="arrangement_list_group">
          <!-- Item 1 -->
          <label class="list-group-item px-4 py-3 border border-success selection-row" for="wired-mic">
              <div class="form-check custom-check-success mb-0 d-flex align-items-start gap-3">
                  <input class="form-check-input mt-1" type="checkbox" id="wired-mic">
                  <div class="flex-grow-1">
                      <div class="fw-semibold text-dark lh-1 py-1">
                          Wired Microphone (2 Units)
                      </div>
                      <div class="small text-muted mt-1">
                          Standard dual wired microphone setup suited for stationary podium platforms or panel seating arrangements.
                      </div>
                  </div>
              </div>
          </label>

          <!-- Item 2 -->
          <label class="list-group-item px-4 py-3 border border-success selection-row" for="mic-stand">
              <div class="form-check custom-check-success mb-0 d-flex align-items-start gap-3">
                  <input class="form-check-input mt-1" type="checkbox" id="mic-stand">
                  <div class="flex-grow-1">
                      <div class="fw-semibold text-dark lh-1 py-1 equip_name">
                          1 Microphone with stand
                      </div>
                      <div class="small text-muted mt-1 equip_description">
                          Ideal for individual performers, main keynotes, or dedicated question-and-answer floor queues.
                      </div>
                      <input type="hidden" class="equip_category">
                  </div>
              </div>
          </label>

          <!-- Item 3 -->
          <label class="list-group-item px-4 py-3 border border-success selection-row" for="podium-mic">
              <div class="form-check custom-check-success mb-0 d-flex align-items-start gap-3">
                  <input class="form-check-input mt-1" type="checkbox" id="podium-mic">
                  <div class="flex-grow-1"> 
                      <div class="fw-semibold text-dark lh-1 py-1 equip_name">
                          Podium Microphone (1 Unit)
                      </div>
                      <div class="small text-muted mt-1 equip_description">
                          Recommended if your event includes speeches, award ceremonies, hosting, or formal presentations.
                      </div>
                      <input type="hidden" class="equip_category">
                  </div>
              </div>
          </label>

          <!-- Item 4 -->
          <label class="list-group-item px-4 py-3 border border-success selection-row" for="wide-screen">
              <div class="form-check custom-check-success mb-0 d-flex align-items-start gap-3">
                  <input class="form-check-input mt-1" type="checkbox" id="wide-screen">
                  <div class="flex-grow-1">
                      <div class="fw-semibold text-dark lh-1 py-1 equip_name">
                          Wide Screen
                      </div>
                      <div class="small text-muted mt-1 equip_description">
                          High-definition horizontal display solution optimized for presentations, media reels, or live video feeds.
                      </div>
                      <input type="hidden" class="equip_category">

                  </div>
              </div>
          </label>
          
      </div>
  </div>


</div>



<script>
  $(document).on('input', '.pax-input', function () {
      let value = $(this).val();
      value = value.replace(/\D/g, '');
      value = value.replace(/^0+/, '');
      $(this).val(value);
  });
  $(document).on('keydown', '.pax-input', function (e) {
      if (['e', 'E', '+', '-', '.'].includes(e.key)) {
          e.preventDefault();
      }
  });



  /*Function to search items on arrangements*/
  $(document).ready(function () {
    $('#search_arrangements').on('input', function () {
      const searchTerm = $(this).val().toLowerCase().trim();
      const $listGroup = $('#arrangement_list_group');
      
      // Target all valid equipment rows, skipping the empty state row itself
      const $rows = $listGroup.find('.selection-row').not('#empty-search-state');
      let visibleCount = 0;

      // Filter list items based on text matching
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

      // Toggle the visible empty state UI component
      if (visibleCount === 0 && searchTerm !== "") {
        if ($('#empty-search-state').length === 0) {
          const emptyStateHTML = `
            <div id="empty-search-state" class="text-center py-5 border rounded-3 bg-light text-muted shadow-sm mb-2 animate__animated animate__fadeIn selection-row">
              <div class="mb-2">
                <i class="bi bi-exclamation-circle text-warning fs-2"></i>
              </div>
              <h6 class="fw-bold text-secondary mb-1">No record found.</h6>
              <p class="small mb-0 px-3">We couldn't find anything matching.</p>
            </div>
          `;
          $listGroup.append(emptyStateHTML);
        } else {
          $('#empty-search-state p').html(`We couldn't find anything matching.`);
        }
      } else {
        $('#empty-search-state').remove();
      }
    });
  });
</script>



  <style>
      /* Default: Green stripe is ALWAYS visible */
      .selection-row {
          cursor: pointer;
          transition: all 0.2s ease;
          border-left: 5px solid #28a745 !important; /* Success Green Stripe by Default */
          background-color: #fff;
          border-bottom: 1px solid #f8f9fa;
      }

      /* Hover effect for better interactivity */
      .selection-row:hover {
          background-color: #f8f9fa;
      }

      /* Active State: Background turns green only when checked */
      .selection-row:has(.form-check-input:checked) {
          background-color: #f2faf4 !important; /* Subtle Success Green Background */
      }

      /* Checkbox Styling */
      .custom-check-success .form-check-input {
          width: 1.25rem;
          height: 1.25rem;
          border: 2px solid #28a745; /* Green border for the checkbox itself */
      }

      .custom-check-success .form-check-input:checked {
          background-color: #28a745;
          border-color: #28a745;
      }

      /* Integrated Textarea Styling */
      .others-section {
          background-color: #f8f9fa;
          border-top: 1px solid #eee;
      }

      .others-section textarea {
          border: 1px solid transparent;
          transition: all 0.3s ease;
      }

      .others-section textarea:focus {
          background-color: #fff !important;
          border-color: #28a745 !important;
          box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.1) !important;
      }
</style>



