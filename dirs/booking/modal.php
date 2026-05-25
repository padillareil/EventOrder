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

<form id="frm-confirmation-booking" autocomplete="off" class="needs-validation" novalidate>
  <div class="modal" id="mdl-confirmation-booking" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content border-0 shadow-lg rounded-4">
        
        <div class="modal-header border-bottom px-4 pt-4 pb-3">
          <div>
            <h5 class="modal-title fs-5 fw-bold text-dark">Payment Methods (Demo only)</h5>
            <p class="text-muted small mb-0">Choose one or more payment options to settle the amount.</p>
          </div>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body p-4 position-relative">
          
          <div class="sticky-top bg-white pt-2 pb-3 mb-3 border-bottom" style="top: -24px; z-index: 1020; margin-left: -24px; margin-right: -24px; padding-left: 24px; padding-right: 24px;">
            <div class="row g-3 align-items-end">
              
              <div class="col-12 col-md-4">
                <label class="form-label small text-muted fw-bold mb-1" for="gross-total-paid">Gross Total Paid</label>
                <div class="input-group">
                  <span class="input-group-text bg-light border-end-0 fw-bold text-muted">₱</span>
                  <input type="text" class="form-control border-start-0 fw-semibold text-muted bg-light with-comma" id="gross-total-paid" name="gross-total-paid" value="0.00" readonly>
                </div>
              </div>

              <div class="col-12 col-md-4">
                <label class="form-label small text-muted fw-bold mb-1" for="blocking_fee">Blocking Fee</label>
                <div class="input-group">
                  <span class="input-group-text bg-light border-end-0 fw-bold text-muted">₱</span>
                  <input type="text" class="form-control border-start-0 fw-semibold text-muted bg-light with-comma" id="blocking_fee" name="blocking_fee" value="10,000.00" readonly>
                </div>
              </div>

              <div class="col-12 col-md-4">
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

                <!-- <div class="col-4 col-md-2">
                  <input type="checkbox" name="payment_method" id="pay-installment" value="Installment" class="payment-check-input">
                  <label for="pay-installment" class="payment-method-card mb-0">
                    <i class="bi bi-calendar-range"></i>
                    <span>Terms</span>
                  </label>
                </div> -->

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
                    <input type="text" step="0.01" class="form-control py-2 fw-semibold payment-amount-input with-comma" id="cash_amount" name="cash_amount" placeholder="0.00">
                    <div class="invalid-feedback">Please input the portion paid in cash.</div>
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="cash_received_by">Cashier Name</label>
                    <input type="text" class="form-control py-2" id="cash_received_by" name="cash_received_by">
                    <div class="invalid-feedback">Please state which processing agent verified the cash drops.</div>
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
                      <option value="Asia United Bank"></option>
                      <option value="Philippine Veterans Bank"></option>
                      <option value="Maybank Philippines"></option>
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
                    <datalist id="ph-banks-cards">
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
                      <option value="Asia United Bank"></option>
                      <option value="Philippine Veterans Bank"></option>
                      <option value="Maybank Philippines"></option>
                    </datalist>
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
                </div>
              </div>

              <!-- Digital Online Payment -->
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
                          <input type="radio" name="online_platform" value="GCash" class="provider-radio">
                          <div class="provider-card">
                            <img src="assets/image/logo/digital_banks_logo/gcash.jpeg" class="provider-micro-logo" alt="GCash">
                            <span class="fw-semibold text-dark" style="font-size: 11px;">GCash</span>
                          </div>
                        </label>
                      </div>

                      <div class="col">
                        <label class="position-relative w-100 m-0">
                          <input type="radio" name="online_platform" value="Atome" class="provider-radio">
                          <div class="provider-card">
                            <img src="assets/image/logo/digital_banks_logo/atome.jpeg" class="provider-micro-logo" alt="Atome">
                            <span class="fw-semibold text-dark" style="font-size: 11px;">Atome</span>
                          </div>
                        </label>
                      </div>

                      <div class="col">
                        <label class="position-relative w-100 m-0">
                          <input type="radio" name="online_platform" value="Maya" class="provider-radio">
                          <div class="provider-card">
                            <img src="assets/image/logo/digital_banks_logo/maya.jpeg" class="provider-micro-logo" alt="Maya">
                            <span class="fw-semibold text-dark" style="font-size: 11px;">Maya</span>
                          </div>
                        </label>
                      </div>

                      <div class="col">
                        <label class="position-relative w-100 m-0">
                          <input type="radio" name="online_platform" value="MariBank" class="provider-radio">
                          <div class="provider-card">
                            <img src="assets/image/logo/digital_banks_logo/maribank.jpeg" class="provider-micro-logo" alt="MariBank">
                            <span class="fw-semibold text-dark" style="font-size: 11px;">MariBank</span>
                          </div>
                        </label>
                      </div>

                      <div class="col">
                        <label class="position-relative w-100 m-0">
                          <input type="radio" name="online_platform" value="PayPal" class="provider-radio">
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
                    <input type="text" class="form-control py-2" id="check_issuing_bank" name="check_issuing_bank" list="ph-banks-list">
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
                </div>
              </div>

              <div id="sub-form-terms" class="payment-sub-form-section d-none position-relative card p-3 border mb-3 shadow-sm">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-payment-section" data-target="#pay-installment" aria-label="Close"></button>
                <div class="text-dark fw-bold text-uppercase small font-monospace mb-2"><i class="bi bi-calendar-range text-danger me-1"></i> Installment Terms</div>
                <div class="row g-3">
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="terms_downpayment">Downpayment</label>
                    <select class="form-select py-2 fw-semibold" id="terms_downpayment" name="terms_downpayment">
                      <option value="0">0% </option>
                      <option value="10" selected>10%</option>
                      <option value="20">20%</option>
                      <option value="30">30%</option>
                      <option value="40">40%</option>
                      <option value="50">50%</option>
                    </select>
                  </div>
                  <div class="col-12 col-md-6">
                    <label class="form-label small text-muted fw-bold mb-1" for="terms_duration">Installment Period</label>
                    <select class="form-select py-2" id="terms_duration" name="terms_duration">
                      <option value="" disabled selected>Select...</option>
                      <option value="3 D">3 Days</option>
                      <option value="7 D">7 Days</option>
                      <option value="15 D">15 Days</option>
                      <option value="3 D">30 Days</option>
                      <option value="2 M">2 Months</option>
                      <option value="3 M">3 Months</option>
                    </select>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-12 d-none" id="split-payment-alert">
              <div class="alert alert-warning border-0 shadow-sm rounded-3 p-3 mb-0 d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-triangle-fill fs-5 text-warning"></i>
                <div class="small">
                  <strong>Split Payment Active:</strong> Please split your inputs accurately. The sum of allocations must match your total statement fee.
                </div>
              </div>
            </div>

            <div class="col-12">
              <div id="display-payment-content"></div>
            </div>

          </div>
        </div>

        <div class="modal-footer border-top px-4 py-3 bg-light rounded-bottom-4">
          <button type="submit" id="btn-submit-booking" class="btn btn-success px-4 py-2 fw-semibold rounded-3 shadow-sm d-inline-flex align-items-center gap-2">
            <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-booking" role="status"></span>
            <span class="btn-text-booking">Commit</span>
          </button>
          <button type="button" class="btn btn-light border px-3 py-2 small fw-medium rounded-3 text-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>

      </div>
    </div>
  </div>
</form>

<script>
  /*Script that input comma*/
  $(document).on("input", ".with-comma", function () {

      let input = this;

      let oldValue = input.value;
      let oldCursor = input.selectionStart;

      // count digits before cursor (important fix)
      let digitsBeforeCursor = oldValue
          .slice(0, oldCursor)
          .replace(/[^0-9]/g, '').length;

      // raw number
      let raw = oldValue.replace(/[^0-9.]/g, '');

      let parts = raw.split('.');

      // format integer part
      let intPart = parts[0] || "";
      let formattedInt = intPart.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

      let newValue = parts.length > 1
          ? formattedInt + "." + parts[1]
          : formattedInt;

      input.value = newValue;

      // restore cursor properly
      let newCursor = 0;
      let digitCount = 0;

      while (newCursor < newValue.length && digitCount < digitsBeforeCursor) {
          if (/\d/.test(newValue[newCursor])) {
              digitCount++;
          }
          newCursor++;
      }

      input.setSelectionRange(newCursor, newCursor);
  });


  // Append this inside $(document).ready(function() { ... })
  $(document).on('input', '.payment-amount-input', function() {

      let grossTotalSum = 0;

      $('.payment-sub-form-section:not(.d-none)')
          .find('.payment-amount-input')
          .each(function() {

              let rawValue = $(this).val();

              // remove commas
              rawValue = rawValue.replace(/,/g, '');

              let inputVal = parseFloat(rawValue);

              if (!isNaN(inputVal)) {
                  grossTotalSum += inputVal;
              }

          });

      // format WITH comma + 2 decimals
      let formattedTotal = grossTotalSum.toLocaleString('en-US', {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2
      });

      $('#gross-total-paid').val(formattedTotal);
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

          // Show configuration notice helper box if user targets multiple streams
          if (checkedMethods.length > 1) {
              $('#split-payment-alert').removeClass('d-none');
          } else {
              $('#split-payment-alert').addClass('d-none');
          }

          // --- CASH SECTION ---
          if (checkedMethods.includes('Cash')) {
              $('#sub-form-cash').removeClass('d-none');
              $('#cash_amount, #cash_received_by').attr('required', 'required');
          } else {
              resetSpecificPaymentSection($('#sub-form-cash'));
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
              $('#attachment-filename-log').html('<i class="bi bi-paperclip me-1"></i>No file attached yet.').removeClass('text-success text-danger');
          }

          // --- DEBIT/CREDIT CARD SECTION ---
          if (checkedMethods.includes('Debit/Card')) {
              $('#sub-form-card').removeClass('d-none');
              $('#card_amount, #card_bank, #card_account_name, #card_number, #card_reference_no').attr('required', 'required');
          } else {
              resetSpecificPaymentSection($('#sub-form-card'));
          }

          // --- ONLINE BANKING (E-WALLETS) ---
          if (checkedMethods.includes('Online Banking')) {
              $('#sub-form-online').removeClass('d-none');
              $('#online_amount, #online_account_name, #online_account_number').attr('required', 'required');
              
              // Re-trigger checked bank logic if a radio card was left selected
              const activeRadio = $('.provider-radio:checked');
              if (activeRadio.length) {
                  activeRadio.trigger('change');
              }
          } else {
              resetSpecificPaymentSection($('#sub-form-online'));
              // Explicit fallback cleanups for e-wallet nodes when parent is closed
              $('#display-digitalbank-logos').addClass('d-none').attr('src', '');
              $('#conditional-input-fields').removeClass('d-flex').addClass('d-none');
              $('.provider-radio').prop('checked', false);
          }

          // --- CHECK SECTION ---
          if (checkedMethods.includes('Check')) {
              $('#sub-form-check').removeClass('d-none');
              $('#check_amount, #check_issuing_bank, #check_number, #check_maturity_date').attr('required', 'required');
          } else {
              resetSpecificPaymentSection($('#sub-form-check'));
              $('#check-preview-box').removeClass('has-file').find('.pdf-attached-layout').remove();
              $('#check_attachment_preview').addClass('d-none').attr('src', '');
              $('#check-preview-box').find('.preview-placeholder-text').removeClass('d-none');
              $('#check-filename-log').html('<i class="bi bi-paperclip me-1"></i>No file attached yet.').removeClass('text-success text-danger');
          }

          // --- INSTALLMENT / TERMS SECTION ---
          if (checkedMethods.includes('Installment') || checkedMethods.includes('Terms')) {
              $('#sub-form-terms').removeClass('d-none');
              $('#terms_downpayment, #terms_duration').attr('required', 'required');
          } else {
              resetSpecificPaymentSection($('#sub-form-terms'));
          }

          $('.payment-amount-input').first().trigger('input');
      });

      // FIXED: REUSABLE SEGMENT CLEANER UTILITY FUNCTION
      function resetSpecificPaymentSection(sectionElement) {
          if (!sectionElement.hasClass('d-none')) {
              sectionElement.addClass('d-none');
              sectionElement.find('input, select').removeAttr('required');
              
              // FIX: Added :not(.provider-radio) to prevent clearing your beautiful checkbox system!
              sectionElement.find('input:not([type="file"]):not(.provider-radio), select').val('');
              sectionElement.find('input[type="file"]').val('');
          }
      }
      
      // Form structural submit handle validation intercept sequence
      $('#frm-confirmation-booking').on('submit', function(e) {
          let form = this;
          if (!form.checkValidity()) {
              e.preventDefault();
              e.stopPropagation();
          }
          $(form).addClass('was-validated');
      });

      // UNIFIED CARD RADIO LISTENER
      $(document).on('change', '.provider-radio', function() {
          var selectedProvider = this.value;
          var logoImage = document.getElementById('display-digitalbank-logos');
          var inputFieldsBlock = document.getElementById('conditional-input-fields');

          // Only clear processing info if actively changing fields, avoids clipping setup states
          if ($(this).is(':checked')) {
              document.getElementById('online_amount').value = '';
              document.getElementById('online_account_name').value = '';
              document.getElementById('online_account_number').value = '';
              document.getElementById('online_transaction_number').value = '';
          }

          var logoDirectories = {
              'GCash': 'assets/image/logo/digital_banks_logo/gcash.jpeg',
              'Atome': 'assets/image/logo/digital_banks_logo/atome.jpeg',
              'Maya': 'assets/image/logo/digital_banks_logo/maya.jpeg',
              'MariBank': 'assets/image/logo/digital_banks_logo/maribank.jpeg',
              'PayPal': 'assets/image/logo/digital_banks_logo/paypal.svg'
          };

          if (selectedProvider && logoDirectories[selectedProvider]) {
              logoImage.src = logoDirectories[selectedProvider];
              logoImage.classList.remove('d-none');
              logoImage.classList.add('d-block');

              inputFieldsBlock.classList.remove('d-none');
              inputFieldsBlock.classList.add('d-flex');
          } else {
              logoImage.classList.remove('d-block');
              logoImage.classList.add('d-none');
              logoImage.src = '';

              inputFieldsBlock.classList.remove('d-flex');
              inputFieldsBlock.classList.add('d-none');
          }
      });
  });

  // ==========================================
  // 1. BANK RECEIPT ATTACHMENT PREVIEW ENGINE
  // ==========================================
  $('#bank_attachment_file').on('change', function(e) {
      const file = e.target.files[0];
      const previewBox = $('#receipt-preview-box');
      const previewImg = $('#bank_attachment_preview');
      const placeholder = previewBox.find('.preview-placeholder-text');
      const filenameLog = $('#attachment-filename-log');

      previewBox.find('.pdf-attached-layout').remove();
      previewImg.addClass('d-none').attr('src', '');
      placeholder.removeClass('d-none');
      previewBox.removeClass('has-file');
      filenameLog.html('<i class="bi bi-paperclip me-1"></i>No file attached yet.').removeClass('text-success text-danger');

      if (file) {
          const fileNameString = file.name;

          if (file.type.startsWith('image/')) {
              const reader = new FileReader();
              reader.onload = function(event) {
                  placeholder.addClass('d-none'); 
                  previewImg.attr('src', event.target.result).removeClass('d-none');
                  previewBox.addClass('has-file');
                  filenameLog.html(`<i class="bi bi-check2-circle text-success me-1"></i> ${fileNameString}`).addClass('text-success');
              };
              reader.readAsDataURL(file);
          } else if (file.type === 'application/pdf') {
              placeholder.addClass('d-none');
              previewBox.append(`
                  <div class="pdf-attached-layout p-3">
                      <i class="bi bi-file-earmark-pdf-fill text-danger fs-1 d-block mb-1"></i>
                      <span class="d-block small text-dark fw-bold">PDF Document Secured</span>
                  </div>
              `);
              previewBox.addClass('has-file');
              filenameLog.html(`<i class="bi bi-file-earmark-code text-danger me-1"></i> ${fileNameString}`);
          }
      }
  });

  // ==========================================
  // 2. CHECK SLIP ATTACHMENT PREVIEW ENGINE
  // ==========================================
  $('#check_attachment_file').on('change', function(e) {
      const file = e.target.files[0];
      const previewBox = $('#check-preview-box');
      const previewImg = $('#check_attachment_preview');
      const placeholder = previewBox.find('.preview-placeholder-text');
      const filenameLog = $('#check-filename-log');

      previewBox.find('.pdf-attached-layout').remove();
      previewImg.addClass('d-none').attr('src', '');
      placeholder.removeClass('d-none');
      previewBox.removeClass('has-file');
      filenameLog.html('<i class="bi bi-paperclip me-1"></i>No file attached yet.').removeClass('text-success text-danger');

      if (file) {
          const fileNameString = file.name;

          if (file.type.startsWith('image/')) {
              const reader = new FileReader();
              reader.onload = function(event) {
                  placeholder.addClass('d-none'); 
                  previewImg.attr('src', event.target.result).removeClass('d-none');
                  previewBox.addClass('has-file');
                  filenameLog.html(`<i class="bi bi-check2-circle text-success me-1"></i> ${fileNameString}`).addClass('text-success');
              };
              reader.readAsDataURL(file);
          } else if (file.type === 'application/pdf') {
              placeholder.addClass('d-none');
              previewBox.append(`
                  <div class="pdf-attached-layout p-3">
                      <i class="bi bi-file-earmark-pdf-fill text-danger fs-1 d-block mb-1"></i>
                      <span class="d-block small text-dark fw-bold">PDF Document Secured</span>
                  </div>
              `);
              previewBox.addClass('has-file');
              filenameLog.html(`<i class="bi bi-file-earmark-code text-danger me-1"></i> ${fileNameString}`);
          }
      }
  });

</script>























