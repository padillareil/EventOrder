<form id="form-custom-equipment" onsubmit="return false;">
  <div class="modal fade" id="mdl-custom-equipment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4">
        
        <div class="modal-header border-0 pt-4 px-4 pb-2">
          <h5 class="modal-title fw-bold text-dark">Add Custom Equipment</h5>
          <button type="button" class="btn-close shadow-none small" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4 py-2">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label small text-muted fw-bold mb-1" for="custom_equipment_title">Equipment Name</label>
              <input type="text" class="form-control shadow-none py-1 small" id="custom_equipment_title" autocomplete="off" required>
            </div>
            <div class="col-12">
              <label class="form-label small text-muted fw-bold mb-1" for="equipment_description">Equipment Description</label>
              <textarea class="form-control border rounded-3 shadow-sm p-3 small text-muted bg-white" id="equipment_description" rows="3" maxlength="100" placeholder="Describe the specs..."></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer border-0 px-4 pb-4 pt-3 d-flex justify-content-end gap-2">
          <button type="button" id="add-custom-equipment" class="btn btn-success text-white px-4 py-2 rounded-3 small fw-medium shadow-sm">
            Done
          </button>
          <button type="button" class="btn btn-light text-muted border px-4 py-2 rounded-3 small fw-medium" data-bs-dismiss="modal">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  $(document).ready(function () {
      $('#add-custom-equipment').on('click', function (e) {
        e.preventDefault(); 
        const $titleInput = $('#custom_equipment_title');
        const $descInput = $('#equipment_description');
        const $equipmentForm = $('#form-custom-equipment');
        const $displayContainer = $('#arrangement_list_group');
        const $modalElement = $('#mdl-custom-equipment');
        const titleValue = $.trim($titleInput.val());
        const descValue = $.trim($descInput.val());
        if (titleValue === "") {
          $titleInput.addClass('is-invalid');
          $titleInput.focus();
          return;
        } else {
          $titleInput.removeClass('is-invalid');
        }
        const uniqueId = 'custom_eq_' + Date.now();
        const newItemHTML = `
          <label class="list-group-item px-4 py-3 border border-success selection-row position-relative d-block mb-2 rounded-3 shadow-sm" id="container_${uniqueId}" for="${uniqueId}">
              <div class="form-check custom-check-success mb-0 d-flex align-items-start gap-3 pe-4">
                  <input class="form-check-input mt-1 shadow-none border-success" type="checkbox" id="${uniqueId}" value="${titleValue.replace(/\s+/g, '_').toLowerCase()}" checked style="width: 20px; height: 20px;">
                  <div class="flex-grow-1">
                      <div class="fw-semibold text-dark lh-1 py-1 equip_name">
                          ${titleValue}
                      </div>
                      ${descValue !== "" ? `<div class="small text-muted mt-1 equip_description">${descValue}</div>` : ''}
                  </div>
                      <input type="hidden" class="equip_category" value="Solid">
              </div>
              <div class="position-absolute top-0 end-0 p-3">
                <button type="button" class="btn btn-lg btn-link text-danger p-0 border-0 shadow-none remove-custom-item-btn" data-target="${uniqueId}" title="Delete entry">
                  <i class="bi bi-trash3-fill fs-6"></i>
                </button>
              </div>
          </label>
        `;
        $displayContainer.prepend(newItemHTML);
        updateArrangementSummary(); 
        if ($equipmentForm.length) {
          $equipmentForm[0].reset(); 
        }
        $modalElement.modal('hide');
      });
      $('#arrangement_list_group').on('click', '.remove-custom-item-btn', function (e) {
        e.preventDefault(); // Prevents checkbox state from toggling on row click
        const targetId = $(this).attr('data-target');
        const $itemRow = $('#container_' + targetId);
        if ($itemRow.length) {
          $itemRow.css({
            'opacity': '0',
            'transform': 'scale(0.95)',
            'transition': 'all 0.2s ease'
          });
          setTimeout(function() {
            $itemRow.remove();
            updateArrangementSummary();
          }, 200);
        }
      });
  });
</script>


<!-- food modal -->
<form id="form-custom-food" onsubmit="return false;">
  <div class="modal fade" id="mdl-custom-food" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4">
        
        <div class="modal-header border-0 pt-4 px-4 pb-2">
          <h5 class="modal-title fw-bold text-dark">Add Custom Menu</h5>
          <button type="button" class="btn-close shadow-none small" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body px-4 py-2">
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label small text-muted fw-bold mb-1" for="custom_food_title">Menu Name</label>
              <input type="text" class="form-control shadow-none py-1 small" id="custom_food_title" autocomplete="off" required>
            </div>
            <div class="col-12">
              <label class="form-label small text-muted fw-bold mb-1" for="food_description">Menu Description</label>
              <textarea class="form-control border rounded-3 shadow-sm p-3 small text-muted bg-white" id="food_description" rows="3" maxlength="100" placeholder="Describe food menu..."></textarea>
            </div>
          </div>
        </div>

        <div class="modal-footer border-0 px-4 pb-4 pt-3 d-flex justify-content-end gap-2">
          <button type="button" id="add-custom-food" class="btn btn-success text-white px-4 py-2 rounded-3 small fw-medium shadow-sm">
            Done
          </button>
          <button type="button" class="btn btn-light px-4 py-2 rounded-3 text-secondary border fw-medium shadow" data-bs-dismiss="modal">
            Cancel
          </button>
        </div>

      </div>
    </div>
  </div>
</form>

<script>
  $(document).ready(function () {
      $('#add-custom-food').on('click', function (e) {
        e.preventDefault(); 
        
        const $titleInput = $('#custom_food_title');
        const $descInput = $('#food_description');
        const $foodForm = $('#form-custom-food');
        const $displayContainer = $('#food_list_group');
        const $modalElement = $('#mdl-custom-food');
        
        const titleValue = $.trim($titleInput.val());
        const descValue = $.trim($descInput.val());
        
        // Validation Check
        if (titleValue === "") {
          $titleInput.addClass('is-invalid');
          $titleInput.focus();
          return;
        } else {
          $titleInput.removeClass('is-invalid');
        }
        
        // FIXED: Changed identity tag from custom_eq_ to custom_food_
        const uniqueId = 'custom_food_' + Date.now();
        
        const newItemHTML = `
          <label class="list-group-item px-4 py-3 border border-success selection-food position-relative d-block mb-2 rounded-3 shadow-sm" id="container_${uniqueId}" for="${uniqueId}">
              <div class="form-check custom-check-success mb-0 d-flex align-items-start gap-3 pe-4">
                  <input class="form-check-input mt-1 shadow-none border-success" type="checkbox" id="${uniqueId}" value="${titleValue.replace(/\s+/g, '_').toLowerCase()}" checked style="width: 20px; height: 20px;">
                  <div class="flex-grow-1">
                      <div class="fw-semibold text-dark lh-1 py-1 food_name">
                          ${titleValue}
                      </div>
                      ${descValue !== "" ? `<div class="small text-muted mt-1 food_description">${descValue}</div>` : ''}
                  </div>
                      <input type="hidden" class="food_category" value="Solid">
              </div>
              <div class="position-absolute top-0 end-0 p-3">
                <button type="button" class="btn btn-lg btn-link text-danger p-0 border-0 shadow-none remove-custom-food-btn" data-target="${uniqueId}" title="Delete entry">
                  <i class="bi bi-trash3-fill fs-6"></i>
                </button>
              </div>
          </label>
        `;
        
        // Prepend to top of container nicely
        $displayContainer.prepend(newItemHTML);
        applyFoodSetupSummary();
        
        // FIXED: Swapped out undefined '$equipmentForm' referencing with correct '$foodForm' hook
        if ($foodForm.length) {
          $foodForm[0].reset(); 
        }
        
        // Cleanly dismiss the modal
        $modalElement.modal('hide');
      });

      // Event Delegation for Deletion 
      $('#food_list_group').on('click', '.remove-custom-food-btn', function (e) {
        e.preventDefault(); 
        
        const targetId = $(this).attr('data-target');
        const $itemRow = $('#container_' + targetId);
        
        if ($itemRow.length) {
          $itemRow.css({
            'opacity': '0',
            'transform': 'scale(0.95)',
            'transition': 'all 0.2s ease'
          });
          setTimeout(function() {
            $itemRow.remove();
            applyFoodSetupSummary();
          }, 200);
        }
      });
  });
</script>






<style>
  /* VISUAL PAYMENT METHOD SELECTION CARDS */
  .payment-method-card {
    border: 2px solid #dee2e6;
    border-radius: 12px;
    padding: 14px;
    cursor: pointer;
    text-align: center;
    transition: all 0.2s ease-in-out;
    background-color: #f8f9fa;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    user-select: none;
  }

  .payment-method-card i {
    font-size: 1.5rem;
    margin-bottom: 6px;
    color: #6c757d;
    transition: color 0.2s ease-in-out;
  }

  .payment-method-card span {
    font-size: 0.8rem;
    font-weight: 600;
    color: #495057;
  }

  /* HIDDEN CHECKBOX INPUTS UNDER THE CARDS */
  .payment-check-input {
    position: absolute;
    opacity: 0;
    pointer-events: none;
  }

  /* SELECTED STATE STYLE CHANGES (MULTI-SELECT COMPATIBLE) */
  .payment-check-input:checked + .payment-method-card {
    border-color: #198754; /* Success Green Theme */
    background-color: rgba(25, 135, 84, 0.04);
  }

  .payment-check-input:checked + .payment-method-card i {
    color: #198754;
  }

  .payment-check-input:checked + .payment-method-card span {
    color: #198754;
  }

  /* COMPACT CUSTOM LAYOUT EXTENSION FOR CONDITIONAL INLINE BLOCKS */
  .payment-sub-form-section {
    background-color: #f8f9fa;
    border: 1px dashed #dee2e6;
    border-radius: 8px;
    padding: 16px;
    margin-top: 12px;
  }
  
  .payment-sub-form-section h6 {
    font-size: 0.85rem;
    letter-spacing: 0.5px;
  }

  /* ENHANCE SEGMENT CONTAINERS FOR ABSOLUTE ELEMENT MANAGEMENT */
  .payment-sub-form-section.position-relative {
    padding-top: 8px !important;
  }

  /* PRINTS SAFE BUFFER ZONES SO TITLES NEVER MERGE OVER LAP WITH X BUTTONS */
  .payment-sub-form-section .font-monospace.mb-2 {
    padding-right: 35px !important;
  }

  /* MODERN DRAG-AND-DROP BROKEN LINE ZONE CONTAINER */
  .modern-dropzone-wrapper {
    width: 100%;
    min-height: 200px; /* Starting size when empty */
    height: auto;      /* Allows container to grow/shrink with the image size */
    border: 2px dashed #cbd5e1;
    border-radius: 12px;
    background-color: #ffffff;
    cursor: pointer;
    position: relative;
    transition: border-color 0.2s ease-in-out, background-color 0.2s ease-in-out;
    
    /* Centers placeholder text when empty */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  /* HOVER EFFECT SETUP */
  .modern-dropzone-wrapper:hover {
    border-color: #0d6efd;
    background-color: rgba(13, 110, 253, 0.02);
  }

  /* MORPHS INTO A SOLID BOX WHEN A FILE IS UPLOADED */
  .modern-dropzone-wrapper.has-file {
    border-style: solid;
    border-color: #198754; 
    padding: 0; /* Clear padding so the image meets the borders cleanly */
  }

  /* THE NATURAL ADAPTIVE IMAGE ENGINE */
  .modern-dropzone-wrapper .modern-preview-img {
    display: block;
    max-width: 100%;   /* Prevents the image from overflowing your bootstrap column width */
    height: auto;      /* Keeps the exact true aspect ratio of the photo */
    border-radius: 10px; /* Matches the parent container rounding nicely */
  }

  /* SAFE CENTERED RENDER EXTENSION FOR STANDARD DIRECT PDF DROPS */
  .modern-dropzone-wrapper .pdf-attached-layout {
    padding: 20px;
  }

  .tiny-text {
    font-size: 0.72rem !important;
  }

  .filename-metadata-tray {
    font-size: 0.78rem;
    display: flex;
    align-items: center;
  }

  /* Controls the responsive footprint of your brand logo layouts */
  .provider-radio {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
  }

  /* Modern Visual Card Base Style */
  .provider-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: #ffffff;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 12px 8px;
    cursor: pointer;
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    height: 85px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.01);
  }

  /* Micro-interactions when tapping/hovering */
  .provider-card:hover {
    border-color: #ced4da;
    transform: translateY(-1px);
  }

  /* Premium Selected State Accent */
  .provider-radio:checked + .provider-card {
    border-color: #0d6efd;
    background-color: #f8faff;
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.08);
  }

  /* Embedded Micro Logo Constraints */
  .provider-micro-logo {
    height: 28px;
    max-width: 90%;
    object-fit: contain;
    margin-bottom: 4px;
  }

  /* Master Hero Preview Logo on the right side */
  .digital-bank-logo {
    width: 100%;
    max-width: 140px;
    height: 50px;
    object-fit: contain;
    animation: smoothFadeIn 0.2s ease-out;
  }

  @keyframes smoothFadeIn {
    from { opacity: 0; transform: scale(0.96); }
    to { opacity: 1; transform: scale(1); }
  }

  /* Responsive optimizations for shorter tablet views */
  @media screen and (max-height: 600px) {
    .provider-card { height: 75px; padding: 8px 4px; }
    .digital-bank-logo { height: 38px; }
  }
</style>

<form id="frm-payment-booking" autocomplete="off" class="needs-validation" novalidate>
  <div class="modal" id="mdl-payment-booking" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content border-0 shadow-lg rounded-4">
        
        <div class="modal-header border-bottom px-4 pt-4 pb-3">
          <div>
            <h5 class="modal-title fs-5 fw-bold text-dark">Blocking Payment</h5>
            <p class="text-muted small mb-0">Choose one or more payment options to settle the amount.</p>
          </div>
        </div>

        <div class="modal-body p-4 position-relative">
          
          <div class="sticky-top bg-white pt-2 pb-3 mb-3 border-bottom" style="top: -24px; z-index: 1020; margin-left: -24px; margin-right: -24px; padding-left: 24px; padding-right: 24px;">
            <div class="row g-3 align-items-end">
              <div class="col-12 col-md-6">
                <label class="form-label small text-muted fw-bold mb-1" for="blocking_fee">Blocking Fee</label>
                <div class="input-group">
                  <span class="input-group-text bg-light border-end-0 fw-bold text-muted">₱</span>
                  <input type="text" class="form-control border-start-0 fw-semibold text-muted bg-light with-comma" id="blocking_fee" name="blocking_fee" value="10,000.00" readonly>
                </div>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label small text-muted fw-bold mb-1" for="payment_date">Received Date</label>
                <input type="date" class="form-control text-muted fw-medium" id="payment_date" name="payment_date" required>
              </div>

            </div>

            <div class="mt-3">
              <label class="form-label small text-muted fw-bold mb-2">Select Payment Method(s)</label>
              <div class="row g-2">
                
                <div class="col-4 col-md-2">
                  <input type="checkbox" name="payment_method" id="pay-cash" value="Cash" class="payment-check-input" checked>
                  <label for="pay-cash" class="payment-method-card mb-0">
                    <i class="bi bi-cash-stack"></i>
                    <span>Cash</span>
                  </label>
                </div>

                <div class="col-4 col-md-2">
                  <input type="checkbox" name="payment_method" id="pay-bank" value="Bank Transfer" class="payment-check-input">
                  <label for="pay-bank" class="payment-method-card mb-0">
                    <i class="bi bi-bank"></i>
                    <span>Bank</span>
                  </label>
                </div>

                <div class="col-4 col-md-2">
                  <input type="checkbox" name="payment_method" id="pay-check" value="Check" class="payment-check-input">
                  <label for="pay-check" class="payment-method-card mb-0">
                    <i class="bi bi-card-heading"></i>
                    <span>Check</span>
                  </label>
                </div>

                <div class="col-4 col-md-2">
                  <input type="checkbox" name="payment_method" id="pay-card" value="Debit/Card" class="payment-check-input">
                  <label for="pay-card" class="payment-method-card mb-0">
                    <i class="bi bi-credit-card"></i>
                    <span>Card</span>
                  </label>
                </div>

                <div class="col-4 col-md-2">
                  <input type="checkbox" name="payment_method" id="pay-online" value="Online Banking" class="payment-check-input">
                  <label for="pay-online" class="payment-method-card mb-0">
                    <i class="bi bi-globe"></i>
                    <span>Online</span>
                  </label>
                </div>

                

              </div>
            </div>
          </div>

          <div class="row g-3 pt-2">
            <div class="col-12">
              
              <div id="sub-form-cash" class="payment-sub-form-section position-relative card p-3 border mb-3 shadow-sm">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-payment-section" data-target="#pay-cash" aria-label="Close"></button>
                <div class="text-dark fw-bold text-uppercase small font-monospace mb-2"><i class="bi bi-cash-stack text-success me-1"></i> Cash</div>
                <div class="row g-3">
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="cash_amount">Cash Amount</label>
                    <input type="text" class="form-control py-2 fw-semibold payment-amount-input with-comma" id="cash_amount" name="cash_amount" placeholder="0.00">
                    <div class="invalid-feedback">Please input the portion paid in cash.</div>
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="cash_received_by">Cashier Name</label>
                    <input type="text" class="form-control py-2" id="cash_received_by" name="cash_received_by">
                    <div class="invalid-feedback">Please state which processing agent verified the cash drops.</div>
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="or_date">OR Date</label>
                    <input type="date" class="form-control py-2 fw-semibold" id="or_date" name="or_date">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="or_number">OR Number</label>
                    <input type="number" class="form-control py-2 fw-semibold" id="or_number" name="or_number">
                  </div>
                  <div class="col-12">
                    <label class="form-label small text-muted fw-bold mb-1" for="cash_remarks">
                        Remarks
                    </label>
                    <textarea class="form-control bg-transparent shadow-none py-0 small" name="payment_remarks" id="cash_remarks" placeholder="Remarks..." rows="2" autocomplete="off"></textarea>
                  </div>
                </div>
              </div>

              <div id="sub-form-bank-wire" class="payment-sub-form-section d-none position-relative card p-3 border mb-3 shadow-sm">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-payment-section" data-target="#pay-bank" aria-label="Close"></button>
                <div class="text-dark fw-bold text-uppercase small font-monospace mb-2"><i class="bi bi-bank text-primary me-1"></i> Bank Transfer Details</div>
                <div class="row g-3">
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="bank_amount">Transfer Amount</label>
                    <input type="text" class="form-control py-2 fw-semibold payment-amount-input with-comma" id="bank_amount" name="bank_amount" placeholder="0.00">
                    <div class="invalid-feedback">Please input the amount transferred.</div>
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="bank_destination_name">Bank</label>
                    <input type="text" class="form-control py-2" id="bank_destination_name" name="bank_destination_name" list="ph-banks-transfer">
                    <datalist id="ph-banks-transfer">
                      <option value="BDO Unibank"></option>
                      <option value="Bank of the Philippine Islands"></option>
                      <option value="Metrobank"></option>
                      <option value="Land Bank of the Philippines"></option>
                      <option value="Security Bank Corporation"></option>
                      <option value="China Banking Corporation"></option>
                      <option value="Rizal Commercial Banking Corporation"></option>
                      <option value="UnionBank of the Philippines"></option>
                      <option value="Philippine National Bank"></option>
                      <option value="EastWest Bank"></option>
                    </datalist>
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="bank_account_name">Account Name</label>
                    <input type="text" class="form-control py-2" id="bank_account_name" name="bank_account_name">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="bank_account_number">Account Number</label>
                    <input type="text" class="form-control py-2 font-monospace" id="bank_account_number" name="bank_account_number">
                  </div>
                  <div class="col-12 col-md-12">
                    <label class="form-label small text-muted fw-bold mb-1" for="bank_reference_no">Reference No.</label>
                    <input type="text" class="form-control py-2 font-monospace text-uppercase" id="bank_reference_no" name="bank_reference_no">
                  </div>
                  <div class="col-12 col-md-12">
                    <label class="form-label small text-muted fw-bold mb-1">Upload Receipt Slip</label>
                    <label id="receipt-preview-box" for="bank_attachment_file" class="modern-dropzone-wrapper text-center d-flex flex-column align-items-center justify-content-center">
                      <input type="file" class="d-none" id="bank_attachment_file" name="bank_attachment_file" accept="image/png, image/jpeg, image/jpg, application/pdf">
                      <div class="preview-placeholder-text p-3">
                        <i class="bi bi-cloud-arrow-up text-primary fs-2 mb-1 d-block"></i>
                        <span class="d-block small fw-bold text-dark">Click to upload photo</span>
                      </div>
                      <img src="" alt="Live Receipt Preview" class="modern-preview-img d-none" id="bank_attachment_preview">
                    </label>
                    <div class="filename-metadata-tray small text-muted font-monospace text-truncate mt-1 px-1" id="attachment-filename-log">
                      <i class="bi bi-paperclip me-1"></i>No file attached yet.
                    </div>
                  </div>
                  <div class="col-12">
                    <label class="form-label small text-muted fw-bold mb-1" for="banktransfer_remarks">
                        Remarks
                    </label>
                    <textarea class="form-control bg-transparent shadow-none py-0 small" name="payment_remarks" id="banktransfer_remarks" placeholder="Remarks..." rows="2" autocomplete="off"></textarea>
                  </div>
                </div>
              </div>

              <div id="sub-form-card" class="payment-sub-form-section d-none position-relative card p-3 border mb-3 shadow-sm">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-payment-section" data-target="#pay-card" aria-label="Close"></button>
                <div class="text-dark fw-bold text-uppercase small font-monospace mb-2"><i class="bi bi-credit-card text-info me-1"></i> Card Payment Details</div>
                <div class="row g-3">
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="card_amount">Amount Paid</label>
                    <input type="text" class="form-control py-2 fw-semibold payment-amount-input with-comma" id="card_amount" name="card_amount" placeholder="0.00">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="card_bank">Bank</label>
                    <input type="text" class="form-control py-2" id="card_bank" name="card_bank" list="ph-banks-cards">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="card_account_name">Cardholder Name</label>
                    <input type="text" class="form-control py-2" id="card_account_name" name="card_account_name">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="card_number">Card Number (Last 4 digits)</label>
                    <input type="text" maxlength="4" class="form-control py-2 font-monospace" id="card_number" name="card_number">
                  </div>
                  <div class="col-12 col-md-12">
                    <label class="form-label small text-muted fw-bold mb-1" for="card_reference_no">Reference No.</label>
                    <input type="text" class="form-control py-2 font-monospace text-uppercase" id="card_reference_no" name="card_reference_no">
                  </div>
                  <div class="col-12">
                    <label class="form-label small text-muted fw-bold mb-1" for="card_remarks">
                        Remarks
                    </label>
                    <textarea class="form-control bg-transparent shadow-none py-0 small" name="payment_remarks" id="card_remarks" placeholder="Remarks..." rows="2" autocomplete="off"></textarea>
                  </div>
                </div>
              </div>

              <div id="sub-form-online" class="payment-sub-form-section d-none position-relative card p-3 border mb-3 shadow-sm">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-payment-section" data-target="#pay-online" aria-label="Close"></button>
                <div class="text-dark fw-bold text-uppercase small font-monospace mb-3">
                  <i class="bi bi-globe text-warning me-1"></i> Online E-Wallet
                </div>
                
                <div class="row g-3 align-items-center mb-2">
                  <div class="col-12 col-md-9">
                    <div class="row g-2">
                      <div class="col">
                        <label class="position-relative w-100 m-0">
                          <input type="radio" name="online_platform" value="GCash" class="provider-radio" value="GCash">
                          <div class="provider-card">
                            <img src="assets/image/logo/digital_banks_logo/gcash.jpeg" class="provider-micro-logo" alt="GCash">
                            <span class="fw-semibold text-dark" style="font-size: 11px;">GCash</span>
                          </div>
                        </label>
                      </div>
                      <div class="col">
                        <label class="position-relative w-100 m-0">
                          <input type="radio" name="online_platform" value="Atome" class="provider-radio" value="Atome">
                          <div class="provider-card">
                            <img src="assets/image/logo/digital_banks_logo/atome.jpeg" class="provider-micro-logo" alt="Atome">
                            <span class="fw-semibold text-dark" style="font-size: 11px;">Atome</span>
                          </div>
                        </label>
                      </div>
                      <div class="col">
                        <label class="position-relative w-100 m-0">
                          <input type="radio" name="online_platform" value="Maya" class="provider-radio" value="Maya">
                          <div class="provider-card">
                            <img src="assets/image/logo/digital_banks_logo/maya.jpeg" class="provider-micro-logo" alt="Maya">
                            <span class="fw-semibold text-dark" style="font-size: 11px;">Maya</span>
                          </div>
                        </label>
                      </div>
                      <div class="col">
                        <label class="position-relative w-100 m-0">
                          <input type="radio" name="online_platform" value="MariBank" class="provider-radio" value="MariBank">
                          <div class="provider-card">
                            <img src="assets/image/logo/digital_banks_logo/maribank.jpeg" class="provider-micro-logo" alt="MariBank">
                            <span class="fw-semibold text-dark" style="font-size: 11px;">MariBank</span>
                          </div>
                        </label>
                      </div>
                      <div class="col">
                        <label class="position-relative w-100 m-0">
                          <input type="radio" name="online_platform" value="PayPal" class="provider-radio" value="PayPal">
                          <div class="provider-card">
                            <img src="assets/image/logo/digital_banks_logo/paypal.svg" class="provider-micro-logo" alt="PayPal">
                            <span class="fw-semibold text-dark" style="font-size: 11px;">PayPal</span>
                          </div>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-3 d-flex align-items-center justify-content-center pt-md-4" style="min-height: 85px;">
                    <img src="" id="display-digitalbank-logos" class="digital-bank-logo d-none" alt="Selected Bank Logo">
                  </div>
                </div>

                <div id="conditional-input-fields" class="row g-3 d-none border-top pt-3 mt-1">
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="online_amount">Amount Paid</label>
                    <input type="text" class="form-control py-2 fw-semibold payment-amount-input with-comma" id="online_amount" name="online_amount" placeholder="0.00">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="online_account_name">Account Name</label>
                    <input type="text" class="form-control py-2" id="online_account_name" name="online_account_name">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="online_account_number">Account Number</label>
                    <input type="text" class="form-control py-2 font-monospace" id="online_account_number" name="online_account_number">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="online_transaction_number">Reference Number</label>
                    <input type="text" class="form-control py-2 font-monospace" id="online_transaction_number" name="online_transaction_number">
                  </div>
                  <div class="col-12">
                    <label class="form-label small text-muted fw-bold mb-1" for="online_remarks">
                        Remarks
                    </label>
                    <textarea class="form-control bg-transparent shadow-none py-0 small" name="payment_remarks" id="online_remarks" placeholder="Remarks..." rows="2" autocomplete="off"></textarea>
                  </div>
                </div>
              </div>

              <div id="sub-form-check" class="payment-sub-form-section d-none position-relative card p-3 border mb-3 shadow-sm">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-payment-section" data-target="#pay-check" aria-label="Close"></button>
                <div class="text-dark fw-bold text-uppercase small font-monospace mb-2"><i class="bi bi-card-heading text-secondary me-1"></i> Check Details</div>
                <div class="row g-3">
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="check_amount">Check Amount</label>
                    <input type="text" class="form-control py-2 fw-semibold payment-amount-input with-comma" id="check_amount" name="check_amount" placeholder="0.00">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="check_issuing_bank">Bank</label>
                    <input type="text" class="form-control py-2" id="check_issuing_bank" name="check_issuing_bank" list="ph-banks-transfer">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="check_number">Check Reference Number</label>
                    <input type="text" class="form-control py-2 font-monospace" id="check_number" name="check_number">
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="check_maturity_date">Post-Date</label>
                    <input type="date" class="form-control py-2 text-muted fw-medium" id="check_maturity_date" name="check_maturity_date">
                  </div>
                  <div class="col-12 col-md-12">
                    <label class="form-label small text-muted fw-bold mb-1">Upload Check Slip</label>
                    <label id="check-preview-box" for="check_attachment_file" class="modern-dropzone-wrapper text-center d-flex flex-column align-items-center justify-content-center">
                      <input type="file" class="d-none" id="check_attachment_file" name="check_attachment_file" accept="image/png, image/jpeg, image/jpg, application/pdf">
                      <div class="preview-placeholder-text p-3">
                        <i class="bi bi-cloud-arrow-up text-primary fs-2 mb-1 d-block"></i>
                        <span class="d-block small fw-bold text-dark">Click to upload photo</span>
                      </div>
                      <img src="" alt="Live Check Preview" class="modern-preview-img d-none" id="check_attachment_preview">
                    </label>
                    <div class="filename-metadata-tray small text-muted font-monospace text-truncate mt-1 px-1" id="check-filename-log">
                      <i class="bi bi-paperclip me-1"></i>No file attached yet.
                    </div>
                  </div>
                  <div class="col-12">
                    <label class="form-label small text-muted fw-bold mb-1" for="check_remarks">
                        Remarks
                    </label>
                    <textarea class="form-control bg-transparent shadow-none py-0 small" name="payment_remarks" id="check_remarks" placeholder="Remarks..." rows="2" autocomplete="off"></textarea>
                  </div>
                </div>
              </div>

              

            </div>
          </div>
          
        </div> 
        <div class="modal-footer border-top px-4 py-3 bg-light rounded-bottom-4">
          <button type="button" id="btn-submit-booking" class="btn btn-success px-4 py-2 fw-semibold rounded-3 shadow-sm d-inline-flex align-items-center gap-2" onclick="saveBlockingPayment()">
            <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-booking" role="status"></span>
            <span class="btn-text-booking">Commit</span>
          </button>
          <button type="reset" id="btn-cancel-booking" class="btn btn-light px-4 py-2 rounded-3 text-secondary border fw-medium shadow" data-bs-dismiss="modal">Cancel</button>
        </div>


      </div>
    </div>
  </div>
</form>




<script>

  /*Function to apply with comma*/
  $(document).on("input", ".with-comma", function () {
      var valuenum = $(this).val();
      valuenum = valuenum.replace(/[^\d.]/g, '');
      let parts = valuenum.split('.');
      if (parts.length > 2) {
          valuenum = parts[0] + '.' + parts.slice(1).join('');
      }
      if (valuenum !== '') {
          let decimal = '';
          if (valuenum.includes('.')) {
              let split = valuenum.split('.');
              valuenum = split[0];
              decimal = '.' + split[1];
          }
          valuenum = Number(valuenum || 0).toLocaleString('en-US') + decimal;
      }
      $(this).val(valuenum);
  });

  $(document).ready(function() {
      // Set default payment date timestamp values
      $('#payment_date').val(new Date().toISOString().slice(0, 10));

      // REUSABLE UPPER-RIGHT SECTION DISMISS CLOSE BUTTON CONTROLLER
      $(document).on('click', '.remove-payment-section', function() {
          const targetCheckboxSelector = $(this).data('target'); 
          const checkboxElement = $(targetCheckboxSelector);
          if (checkboxElement.length) {
              checkboxElement.prop('checked', false).trigger('change');
          }
      });

      // Helper function to handle structured resetting
      function resetSpecificPaymentSection($section) {
          $section.addClass('d-none');
          $section.find('input').val('').removeAttr('required');
          $section.find('input[type="radio"]').prop('checked', false);
      }

      // Handle interactive multi-select combinations engine
      $('input[name="payment_method"]').on('change', function() {
          let checkedMethods = [];
          $('input[name="payment_method"]:checked').each(function() {
              checkedMethods.push($(this).val());
          });

          // Fail-safe protection: if user unchecks everything, auto-recheck Cash
          if (checkedMethods.length === 0) {
              $('#pay-cash').prop('checked', true).trigger('change');
              return;
          }

          // --- CASH SECTION ---
          if (checkedMethods.includes('Cash')) {
              $('#sub-form-cash').removeClass('d-none');
              $('#cash_amount, #cash_received_by').attr('required', 'required');
          } else {
              resetSpecificPaymentSection($('#sub-form-cash'));
          }

          // --- OTHERS SECTION ---
          if (checkedMethods.includes('Other Payment')) {
              $('#sub-form-other').removeClass('d-none');
              $('#tinnumber, #payees_name').attr('required', 'required');
          } else {
              resetSpecificPaymentSection($('#sub-form-other'));
          }

          // --- BANK TRANSFER SECTION ---
          if (checkedMethods.includes('Bank Transfer')) {
              $('#sub-form-bank-wire').removeClass('d-none');
              $('#bank_amount, #bank_destination_name, #bank_account_name, #bank_account_number, #bank_reference_no').attr('required', 'required');
          } else {
              resetSpecificPaymentSection($('#sub-form-bank-wire'));
              $('#receipt-preview-box').removeClass('has-file').find('.pdf-attached-layout').remove();
              $('#bank_attachment_preview').addClass('d-none').attr('src', '');
              $('#receipt-preview-box').find('.preview-placeholder-text').removeClass('d-none');
              $('#attachment-filename-log').html('<i class="bi bi-paperclip me-1"></i>No file attached yet.').removeClass('text-success');
          }

          // --- DEBIT/CREDIT CARD SECTION ---
          if (checkedMethods.includes('Debit/Card')) {
              $('#sub-form-card').removeClass('d-none');
              $('#card_amount, #card_bank, #card_account_name, #card_number, #card_reference_no').attr('required', 'required');
          } else {
              resetSpecificPaymentSection($('#sub-form-card'));
          }

          // --- ONLINE E-WALLET SECTION ---
          if (checkedMethods.includes('Online Banking')) {
              $('#sub-form-online').removeClass('d-none');
          } else {
              resetSpecificPaymentSection($('#sub-form-online'));
              $('#conditional-input-fields').addClass('d-none');
              $('#display-digitalbank-logos').addClass('d-none').attr('src', '');
          }
          
          // --- CHECK DETAILS SECTION ---
          if (checkedMethods.includes('Check')) {
              $('#sub-form-check').removeClass('d-none');
              $('#check_amount, #check_issuing_bank, #check_number, #check_maturity_date').attr('required', 'required');
          } else {
              resetSpecificPaymentSection($('#sub-form-check'));
              $('#check-preview-box').removeClass('has-file').find('.pdf-attached-layout').remove();
              $('#check_attachment_preview').addClass('d-none').attr('src', '');
              $('#check-preview-box').find('.preview-placeholder-text').removeClass('d-none');
              $('#check-filename-log').html('<i class="bi bi-paperclip me-1"></i>No file attached yet.').removeClass('text-success');
          }
      });

      // Show sub-form details when choosing e-wallet vendors
      $('input[name="online_platform"]').on('change', function() {
          const selectedVendor = $(this).val();
          $('#conditional-input-fields').removeClass('d-none');
          $('#online_amount, #online_account_name, #online_transaction_number').attr('required', 'required');
          
          // Mimic modern visual feedback engine using your standard image containers
          let logoSrc = "";
          if(selectedVendor === "GCash") logoSrc = "assets/image/logo/digital_banks_logo/gcash.jpeg";
          if(selectedVendor === "Atome") logoSrc = "assets/image/logo/digital_banks_logo/atome.jpeg";
          if(selectedVendor === "Maya") logoSrc = "assets/image/logo/digital_banks_logo/maya.jpeg";
          if(selectedVendor === "MariBank") logoSrc = "assets/image/logo/digital_banks_logo/maribank.jpeg";
          if(selectedVendor === "PayPal") logoSrc = "assets/image/logo/digital_banks_logo/paypal.svg";
          
          if(logoSrc !== "") {
              $('#display-digitalbank-logos').attr('src', logoSrc).removeClass('d-none');
          }
      });

      // --- THE FILE ATTACHMENT & LIVE IMAGE PREVIEW ENGINE ---
      function handleFileAttachment(inputElement, previewBoxId, previewImgId, logTrayId) {
          const file = inputElement.files[0];
          const $previewBox = $(previewBoxId);
          const $previewImg = $(previewImgId);
          const $logTray = $(logTrayId);

          // Clear any customized legacy layout styles if re-uploaded
          $previewBox.removeClass('has-file').find('.pdf-attached-layout').remove();
          $previewImg.addClass('d-none').attr('src', '');
          $previewBox.find('.preview-placeholder-text').removeClass('d-none');

          if (!file) {
              $logTray.html('<i class="bi bi-paperclip me-1"></i>No file attached yet.').removeClass('text-success');
              return;
          }

          // Write File Meta Info
          $logTray.html(`<i class="bi bi-check-circle-fill me-1"></i>${file.name} (${(file.size / 1024).toFixed(1)} KB)`).addClass('text-success');
          $previewBox.addClass('has-file');
          $previewBox.find('.preview-placeholder-text').addClass('d-none');

          // Process Image Preview Render Engine
          if (file.type.startsWith('image/')) {
              const reader = new FileReader();
              reader.onload = function(e) {
                  $previewImg.attr('src', e.target.value || e.target.result).removeClass('d-none');
              };
              reader.readAsDataURL(file);
          } 
          // Structural layout support if the file uploaded is a PDF document
          else if (file.type === 'application/pdf') {
              $previewBox.append(`
                  <div class="pdf-attached-layout text-center p-3">
                      <i class="bi bi-file-earmark-pdf-fill text-danger fs-1 d-block mb-1"></i>
                      <span class="small fw-semibold text-muted d-block text-truncate" style="max-width: 200px;">${file.name}</span>
                  </div>
              `);
          }
      }

      // Wire up target action listeners to file input elements
      $('#bank_attachment_file').on('change', function() {
          handleFileAttachment(this, '#receipt-preview-box', '#bank_attachment_preview', '#attachment-filename-log');
      });

      $('#check_attachment_file').on('change', function() {
          handleFileAttachment(this, '#check-preview-box', '#check_attachment_preview', '#check-filename-log');
      });
  });




/*Funcion create pencil booking with blocking fee*/
function saveBlockingPayment() {
    let $btnSubmit = $("#btn-submit-booking");
    let $btnCancel = $("#btn-cancel-booking");
    let $spinner = $("#btn-spinner");
    let $text = $btnSubmit.find(".btn-text-booking");

    function showLoading() {
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");
    }

    function hideLoading() {
        $btnSubmit.prop("disabled", false);
        $btnCancel.prop("disabled", false);
        $spinner.addClass("d-none");
        $text.text("Commit");
    }

    // =========================
    // REQUIRED FIELDS CHECK
    // =========================
    var requiredFields = [
        { value: $("#event_title").val(), label: "Event Title" },
        { value: $("#blocking_fee").val(), label: "Blocking Fee" },
        { value: $("#start_date").val(), label: "Start Date" },
        { value: $("#end_date").val(), label: "End Date" },
        { value: $("#start_time").val(), label: "Start Time" },
        { value: $("#end_time").val(), label: "End Time" },
        { value: $("#choose_hotel").val(), label: "Hotel" },
        { value: $("#choose_functionrooms").val(), label: "Function Room" },
        { value: $("#expecte_pax").val(), label: "Expected Pax" },
        { value: $("#guaranteed_pax").val(), label: "Guaranteed Pax" },
        { value: $("#guest-name").val(), label: "Guest Name" },
        { value: $("#guest_company").val(), label: "Company" },
        { value: $("#mobile-number").val(), label: "Mobile Number" },
        { value: $("#guest_email").val(), label: "Email" },
        { value: $("#guest_address").val(), label: "Address" },
        { value: $("#engager_category").val(), label: "Client Type" }

    ];

    for (let f of requiredFields) {
        if ($.trim(f.value) === "") {
            Swal.fire({
                icon: "warning",
                title: "Missing Field",
                text: f.label + " is required."
            });
            return;
        }
    }

    showLoading();

    var blockingFee = parseFloat($("#blocking_fee").val().replace(/,/g, '')) || 0;
    var totalPayment = 0;

    if (
        !$("#pay-cash").is(":checked") &&
        !$("#pay-bank").is(":checked") &&
        !$("#pay-check").is(":checked") &&
        !$("#pay-card").is(":checked") &&
        !$("#pay-online").is(":checked")
    ) {
        hideLoading();
        Swal.fire({
            icon: "warning",
            title: "Payment Required",
            text: "Please select at least one payment method."
        });
        return;
    }

    
    var payments = [];
    var formData = new FormData();

    // =========================
    // CASH
    // =========================
    if ($("#pay-cash").is(":checked")) {

        if (
            $("#cash_amount").val() === "" ||
            $("#cash_received_by").val() === "" ||
            $("#or_date").val() === "" ||
            $("#or_number").val() === "" ||
            $("#cash_remarks").val() === ""
        ) {
            hideLoading();
            Swal.fire({
                icon: "warning",
                title: "Cash Payment",
                text: "Complete all cash payment details."
            });
            return;
        }

        let amount = parseFloat($("#cash_amount").val().replace(/,/g, '')) || 0;
        totalPayment += amount;

        payments.push({
            type: "Cash",
            amount: amount,
            cashier: $("#cash_received_by").val(),
            or_date: $("#or_date").val(),
            or_number: $("#or_number").val(),
            remarks: $("#cash_remarks").val()
        });
    }

    // =========================
    // BANK
    // =========================
    if ($("#pay-bank").is(":checked")) {

        if (
            $("#bank_amount").val() === "" ||
            $("#bank_destination_name").val() === "" ||
            $("#bank_account_name").val() === "" ||
            $("#bank_account_number").val() === "" ||
            $("#bank_reference_no").val() === "" ||
            $("#banktransfer_remarks").val() === ""
        ) {
            hideLoading();
            Swal.fire({
                icon: "warning",
                title: "Bank Transfer",
                text: "Complete all bank transfer details."
            });
            return;
        }

        let amount = parseFloat($("#bank_amount").val().replace(/,/g, '')) || 0;
        totalPayment += amount;

        payments.push({
            type: "Bank Transfer",
            amount: amount,
            bank: $("#bank_destination_name").val(),
            account_name: $("#bank_account_name").val(),
            account_number: $("#bank_account_number").val(),
            reference_no: $("#bank_reference_no").val(),
            remarks: $("#banktransfer_remarks").val()
        });

        if ($("#bank_attachment_file")[0].files.length > 0) {
            formData.append("bank_attachment_file", $("#bank_attachment_file")[0].files[0]);
        }
    }

    // =========================
    // CHECK
    // =========================
    if ($("#pay-check").is(":checked")) {

        if (
            $("#check_amount").val() === "" ||
            $("#check_issuing_bank").val() === "" ||
            $("#check_number").val() === "" ||
            $("#check_maturity_date").val() === "" ||
            $("#check_remarks").val() === ""
        ) {
            hideLoading();
            Swal.fire({
                icon: "warning",
                title: "Check Payment",
                text: "Complete all check details."
            });
            return;
        }

        let amount = parseFloat($("#check_amount").val().replace(/,/g, '')) || 0;
        totalPayment += amount;

        payments.push({
            type: "Check",
            amount: amount,
            bank: $("#check_issuing_bank").val(),
            check_number: $("#check_number").val(),
            maturity_date: $("#check_maturity_date").val(),
            reference_no: $("#check_number").val(),
            remarks: $("#check_remarks").val()
        });

        if ($("#check_attachment_file")[0].files.length > 0) {
            formData.append("check_attachment_file", $("#check_attachment_file")[0].files[0]);
        }
    }

    // =========================
    // CARD
    // =========================
    if ($("#pay-card").is(":checked")) {

        if (
            $("#card_amount").val() === "" ||
            $("#card_bank").val() === "" ||
            $("#card_account_name").val() === "" ||
            $("#card_number").val() === "" ||
            $("#card_reference_no").val() === "" ||
            $("#card_remarks").val() === ""
        ) {
            hideLoading();
            Swal.fire({
                icon: "warning",
                title: "Card Payment",
                text: "Complete all card details."
            });
            return;
        }

        let amount = parseFloat($("#card_amount").val().replace(/,/g, '')) || 0;
        totalPayment += amount;

        payments.push({
            type: "Card",
            amount: amount,
            bank: $("#card_bank").val(),
            account_name: $("#card_account_name").val(),
            card_number: $("#card_number").val(),
            reference_no: $("#card_reference_no").val(),
            remarks: $("#card_remarks").val()
        });
    }

    // =========================
    // ONLINE
    // =========================
    if ($("#pay-online").is(":checked")) {

        let platform = $("input[name='online_platform']:checked").val() || "";

        let amountVal = $("#online_amount").val().replace(/,/g, '');
        let amount = parseFloat(amountVal) || 0;

        if (
            amountVal === "" ||
            $("#online_account_name").val().trim() === "" ||
            $("#online_account_number").val().trim() === "" ||
            $("#online_transaction_number").val().trim() === "" ||
            $("#online_remarks").val().trim() === "" ||
            platform === ""
        ) {
            hideLoading();
            Swal.fire({
                icon: "warning",
                title: "Online Payment",
                text: "Complete all online payment details."
            });
            return;
        }

        totalPayment += amount;

        payments.push({
            type: "Online",
            amount: amount,
            bank: platform,
            platform: platform,
            account_name: $("#online_account_name").val(),
            account_number: $("#online_account_number").val(),
            reference_no: $("#online_transaction_number").val(),
            remarks: $("#online_remarks").val()
        });
    }

    formData.append("EventTitle", $("#event_title").val());
    formData.append("BlockingFee", $("#blocking_fee").val());
    formData.append("StartDate", $("#start_date").val());
    formData.append("EndDate", $("#end_date").val());
    formData.append("StartTime", $("#start_time").val());
    formData.append("EndTime", $("#end_time").val());
    formData.append("Hotel", $("#choose_hotel").val());
    formData.append("Functions", $("#choose_functionrooms").val());
    formData.append("ExpectedPax", $("#expecte_pax").val());
    formData.append("GuaranteedPax", $("#guaranteed_pax").val());
    formData.append("GuestName", $("#guest-name").val());
    formData.append("Company", $("#guest_company").val());
    formData.append("MobileNumber", $("#mobile-number").val());
    formData.append("Email", $("#guest_email").val());
    formData.append("CompanyAddress", $("#guest_address").val());
    formData.append("Position", $("#job_position").val());
    formData.append("EngagerCategory", $("#engager_category").val());
    formData.append("Draftid", $("#draft-documentid").val());
    formData.append("payments", JSON.stringify(payments));

    $.ajax({
        url: "dirs/booking/actions/save_pencilbooking.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        success: function (data) {
            hideLoading();

            if ($.trim(data) === "OK") {
                $("#mdl-payment-booking").modal("hide");
                mdlBookForm2();

                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "Successfully Reserved",
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
        },

        error: function (xhr) {
            hideLoading();
            console.log(xhr.responseText);
        }
    });
}






function saveBooking2() {

    // =========================
    // UI LOADING (optional but recommended)
    // =========================
    var $btnSubmit = $("#btn-submit-booking");
    var $btnCancel = $("#btn-cancel-booking");
    var $spinner = $("#btn-spinner");
    var $text = $btnSubmit.find(".btn-text-booking");

    function showLoading() {
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");
    }

    function hideLoading() {
        $btnSubmit.prop("disabled", false);
        $btnCancel.prop("disabled", false);
        $spinner.addClass("d-none");
        $text.text("Commit");
    }

    showLoading();

    // =========================
    // REQUIRED FIELDS
    // =========================
    const fields = [
        { value: $("#event_title").val(), label: "Event Title" },
        { value: $("#start_date").val(), label: "Start Date" },
        { value: $("#end_date").val(), label: "End Date" },
        { value: $("#start_time").val(), label: "Start Time" },
        { value: $("#end_time").val(), label: "End Time" },
        { value: $("#choose_hotel").val(), label: "Hotel" },
        { value: $("#choose_functionrooms").val(), label: "Function Room" },
        { value: $("#expecte_pax").val(), label: "Expected Pax" },
        { value: $("#guaranteed_pax").val(), label: "Guaranteed Pax" },
        { value: $("#guest-name").val(), label: "Guest Name" },
        { value: $("#mobile-number").val(), label: "Mobile Number" },
        { value: $("#guest_email").val(), label: "Email" },
        { value: $("#guest_address").val(), label: "Address" },
        { value: $("#engager_category").val(), label: "Client Type" }
    ];

    for (let f of fields) {
        if (!f.value || $.trim(f.value) === "") {
            hideLoading();
            Swal.fire({
                icon: "warning",
                title: "Missing Field",
                text: f.label + " is required."
            });
            return;
        }
    }

    // =========================
    // FORM DATA INIT
    // =========================
    var formData = new FormData();
    var payments = []; // IMPORTANT FIX

    // =========================
    // APPEND DATA
    // =========================
    formData.append("EventTitle", $("#event_title").val());
    formData.append("BlockingFee", $("#blocking_fee").val());
    formData.append("StartDate", $("#start_date").val());
    formData.append("EndDate", $("#end_date").val());
    formData.append("StartTime", $("#start_time").val());
    formData.append("EndTime", $("#end_time").val());
    formData.append("Hotel", $("#choose_hotel").val());
    formData.append("Functions", $("#choose_functionrooms").val());
    formData.append("ExpectedPax", $("#expecte_pax").val());
    formData.append("GuaranteedPax", $("#guaranteed_pax").val());
    formData.append("GuestName", $("#guest-name").val());
    formData.append("Company", $("#guest_company").val());
    formData.append("MobileNumber", $("#mobile-number").val());
    formData.append("Email", $("#guest_email").val());
    formData.append("CompanyAddress", $("#guest_address").val());
    formData.append("Position", $("#job_position").val());
    formData.append("EngagerCategory", $("#engager_category").val());
    formData.append("Draftid", $("#draft-documentid").val());
    formData.append("payments", JSON.stringify(payments));

    // =========================
    // AJAX SUBMIT
    // =========================
    $.ajax({
        url: "dirs/booking/actions/save_pencilbooking.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        success: function (data) {
            hideLoading();

            if ($.trim(data) === "OK") {
                mdlBookForm2();

                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "Successfully Reserved",
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
        },

        error: function (xhr) {
            hideLoading();
            console.log(xhr.responseText);
        }
    });
}
</script>