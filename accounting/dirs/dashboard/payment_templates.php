<template id="template-payment-cash">
  <div id="sub-form-cash"
       class="payment-sub-form-section card border-0 shadow-sm mb-3 position-relative">
    <div class="card-body">
      <div class="d-flex align-items-center mb-4">
        <h6 class="mb-0 fw-bold">Cash Payment</h6>
      </div>
      <div class="border rounded-3 p-3 mb-3">
        <div class="small fw-bold text-muted mb-3">
          Cash Transaction
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Amount Paid
            </label>
            <input type="text" class="form-control fw-semibold payment-amount-input with-comma" id="cash_amount" name="amount">
            <div class="invalid-feedback">
              Please input the amount received.
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Cashier / Received By
            </label>
            <input type="text" class="form-control" id="cash_received_by" name="cash_received_by">
            <div class="invalid-feedback">
              Please indicate who received the payment.
            </div>
          </div>
        </div>
      </div>
      <div class="border rounded-3 p-3">
        <div class="small fw-bold text-muted mb-3">
          Official Receipt
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              OR Number
            </label>
            <input type="text" class="form-control fw-semibold" id="or_number" name="or_number">
          </div>
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              OR Date
            </label>
            <input type="date" class="form-control" id="or_date" name="or_date">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<template id="template-payment-bank">
  <div class="payment-sub-form-section card border-0 shadow-sm mb-3 position-relative">
    <div class="card-body">
      <div class="d-flex align-items-center mb-4">
        <h6 class="mb-0 fw-bold">Bank Transfer</h6>
      </div>
      <div class="border rounded-3 p-3 mb-3">
        <div class="small fw-bold text-muted mb-3">
          Transfer Information
        </div>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label small fw-bold text-muted">
              Amount Paid
            </label>
            <input type="text" class="form-control fw-semibold payment-amount-input with-comma" id="bank_amount" name="amount">
          </div>
          <div class="col-md-4">
            <label class="form-label small fw-bold text-muted">
              Bank
            </label>
            <select class="form-select"  id="bank_destination_name"  name="bank_destination_name">
              <option value="" selected disabled>Choose...</option>
              <option value="BDO Unibank">BDO Unibank</option>
              <option value="Bank of the Philippine Islands">Bank of the Philippine Islands (BPI)</option>
              <option value="Metrobank">Metrobank</option>
              <option value="Land Bank of the Philippines">Land Bank of the Philippines</option>
              <option value="Security Bank Corporation">Security Bank Corporation</option>
              <option value="China Banking Corporation">China Banking Corporation</option>
              <option value="Rizal Commercial Banking Corporation">RCBC</option>
              <option value="UnionBank of the Philippines">UnionBank</option>
              <option value="Philippine National Bank">PNB</option>
              <option value="EastWest Bank">EastWest Bank</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label small fw-bold text-muted">
              Deposit Date
            </label>
            <input type="date" class="form-control" id="bank_deposit_date" name="bank_deposit_date">
          </div>
        </div>
      </div>
      <div class="border rounded-3 p-3 mb-3">
        <div class="small fw-bold text-muted mb-3">
          Account Information
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Account Name
            </label>
            <input type="text" class="form-control" id="bank_account_name" name="bank_account_name">
          </div>
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Account Number
            </label>
            <input type="text" class="form-control" id="bank_account_number" name="bank_account_number">
          </div>
        </div>
      </div>
      <div class="border rounded-3 p-3 mb-3">
        <div class="small fw-bold text-muted mb-3">
          Transaction Reference
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Reference No.
            </label>
            <input type="text" class="form-control" id="bank_reference_no" name="bank_reference_no">
          </div>
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Transaction No.
            </label>
            <input type="text" class="form-control" id="bank_transaction_no" name="bank_transaction_no">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<template id="template-payment-check">
  <div id="sub-form-check" class="payment-sub-form-section card border-0 shadow-sm mb-3 position-relative">
    <div class="card-body">
      <div class="d-flex align-items-center mb-4">
        <h6 class="mb-0 fw-bold">Check Payment</h6>
      </div>
      <div class="border rounded-3 p-3 mb-3">
        <div class="small fw-bold text-muted mb-3">
          Check Information
        </div>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label small fw-bold text-muted">
              Amount Paid
            </label>
            <input type="text" class="form-control fw-semibold payment-amount-input with-comma" id="check_amount" name="amount">
          </div>
          <div class="col-md-4">
            <label class="form-label small fw-bold text-muted">
              Check Number
            </label>
            <input type="text" class="form-control" id="check_number" name="check_number">
          </div>
          <div class="col-md-4">
            <label class="form-label small fw-bold text-muted">
              Check Date
            </label>
            <input type="date" class="form-control" id="check_date" name="check_date">
          </div>
        </div>
      </div>
      <div class="border rounded-3 p-3 mb-3">
        <div class="small fw-bold text-muted mb-3">
          Issuing Account
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Issuing Bank
            </label>
            <select class="form-select" id="check_issuing_bank" name="check_issuing_bank">
              <option value="" selected disabled>Choose...</option>
              <option value="BDO Unibank">BDO Unibank</option>
              <option value="Bank of the Philippine Islands">BPI</option>
              <option value="Metrobank">Metrobank</option>
              <option value="Land Bank of the Philippines">LandBank</option>
              <option value="Security Bank Corporation">Security Bank</option>
              <option value="China Banking Corporation">China Bank</option>
              <option value="Rizal Commercial Banking Corporation">RCBC</option>
              <option value="UnionBank of the Philippines">UnionBank</option>
              <option value="Philippine National Bank">PNB</option>
              <option value="EastWest Bank">EastWest Bank</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Account Name
            </label>
            <input type="text" class="form-control" id="check_accountname" name="check_accountname">
          </div>
        </div>
      </div>
      <div class="border rounded-3 p-3 mb-3">
        <div class="small fw-bold text-muted mb-3">
          Provisional Receipt
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              PR Number
            </label>
            <input type="text" class="form-control" id="check_ornumber" name="check_ornumber">
          </div>
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              PR Date
            </label>
            <input type="date" class="form-control" id="check_ordate" name="check_ordate">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<template id="template-payment-card">
  <div class="payment-sub-form-section card border-0 shadow-sm mb-3 position-relative">
    <div class="card-body">
      <div class="d-flex align-items-center mb-4">
        <h6 class="mb-0 fw-bold">Card Payment</h6>
      </div>
      <div class="border rounded-3 p-3 mb-3">
        <div class="small fw-bold text-muted mb-3">
          Transaction Information
        </div>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Card Type
            </label>
            <select class="form-select" id="cardtype" name="cardtype">
              <option value="" selected disabled>Choose...</option>
              <option value="Visa">Visa</option>
              <option value="Mastercard">Mastercard</option>
              <option value="UnionPay">UnionPay</option>
            </select>
          </div>

          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Amount Paid
            </label>
            <input type="text" class="form-control fw-semibold payment-amount-input with-comma" id="card_amount" name="amount">
          </div>

          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Transaction Date
            </label>
            <input type="date" class="form-control" id="card_transdate" name="card_transdate">
          </div>
        </div>
      </div>

  

      <!-- Cardholder Information -->
      <div class="border rounded-3 p-3 mb-3">
        <div class="small fw-bold text-muted mb-3">
          Cardholder Information
        </div>

        <div class="row g-3">

          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Cardholder Name
            </label>
            <input type="text" class="form-control" id="card_account_name" name="card_account_name">
          </div>

          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              Last 4 Digits
            </label>
            <input type="text" maxlength="4" class="form-control" id="card_lastfourdigits" name="card_lastfourdigits">
          </div>

        </div>
      </div>

      <!-- Receipt Information -->
      <div class="border rounded-3 p-3">
        <div class="small fw-bold text-muted mb-3">
          Official Receipt
        </div>

        <div class="row g-3">

          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              OR Number
            </label>
            <input type="text" class="form-control" id="card_receiptno" name="card_receiptno">
          </div>

          <div class="col-md-6">
            <label class="form-label small fw-bold text-muted">
              OR Date
            </label>
            <input type="date" class="form-control" id="card_receiptdate" name="card_receiptdate">
          </div>

        </div>
      </div>

    </div>
  </div>
</template>


<template id="template-payment-digibank">
  <div class="payment-sub-form-section position-relative card p-3 border mb-3 shadow-sm">
      <div class="text-dark fw-bold small mb-3">
          E-Wallet
      </div>
      <div class="row g-3 align-items-center mb-3">
          <div class="col-12 col-md-9">
              <label class="form-label small text-muted fw-bold">
                  Select Digital Bank
              </label>
              <div class="row g-2">
                  <div class="col">
                      <label class="position-relative w-100 m-0">
                          <input type="checkbox" name="online_platform[]" value="GCash" class="provider-check d-none">
                          <div class="provider-card">
                              <img src="../assets/image/logo/digital_banks_logo/gcash.jpeg" class="provider-micro-logo" alt="GCash">
                              <span class="fw-semibold text-dark" style="font-size:11px;">
                                  GCash
                              </span>
                          </div>
                      </label>
                  </div>

                  <!-- Atome -->
                  <div class="col">
                      <label class="position-relative w-100 m-0">
                          <input type="checkbox" name="online_platform[]" value="Atome" class="provider-check d-none">
                          <div class="provider-card">
                              <img src="../assets/image/logo/digital_banks_logo/atome.jpeg" class="provider-micro-logo">
                              <span class="fw-semibold text-dark" style="font-size:11px;">
                                  Atome
                              </span>
                          </div>
                      </label>
                  </div>

                  <!-- Maya -->
                  <div class="col">
                      <label class="position-relative w-100 m-0">
                          <input type="checkbox" name="online_platform[]" value="Maya" class="provider-check d-none">
                          <div class="provider-card">
                              <img src="../assets/image/logo/digital_banks_logo/maya.jpeg" class="provider-micro-logo">
                              <span class="fw-semibold text-dark" style="font-size:11px;">
                                  Maya
                              </span>
                          </div>
                      </label>
                  </div>

                  <!-- MariBank -->
                  <div class="col">
                      <label class="position-relative w-100 m-0">
                          <input type="checkbox" name="online_platform[]" value="MariBank" class="provider-check d-none">
                          <div class="provider-card">
                              <img src="../assets/image/logo/digital_banks_logo/maribank.jpeg" class="provider-micro-logo">
                              <span class="fw-semibold text-dark" style="font-size:11px;">
                                  MariBank
                              </span>
                          </div>
                      </label>
                  </div>
              </div>
          </div>


          <!-- Selected Logo -->
          <div class="col-12 col-md-3 d-flex justify-content-center">
              <img src="" id="display-digitalbank-logos" class="digital-bank-logo d-none" style="max-height:70px;">
          </div>
      </div>


      <!-- Details -->
      <div id="conditional-input-fields"
          class="row g-3 d-none border-top pt-3">
          <div class="col-md-6">
              <label class="form-label small text-muted fw-bold">
                  Amount Paid
              </label>
              <input type="text" class="form-control fw-semibold payment-amount-input with-comma" id="online_amount" name="amount">
          </div>

          <!-- Account Name -->
          <div class="col-md-6">
              <label class="form-label small text-muted fw-bold">
                  Account Name
              </label>
              <input type="text" class="form-control" id="online_account_name" name="online_account_name">
          </div>

          <!-- Account Number -->
          <div class="col-md-6">
              <label class="form-label small text-muted fw-bold">
                  Account Number / Mobile No.
              </label>
              <input type="text" class="form-control" id="online_account_number" name="online_account_number">
          </div>
          <!-- Reference -->
          <div class="col-md-6">
              <label class="form-label small text-muted fw-bold">
                  Reference Number
              </label>
              <input type="text" class="form-control" id="online_transaction_number" name="online_transaction_number">
          </div>

          <!-- Transaction Date -->
          <div class="col-md-6">
              <label class="form-label small text-muted fw-bold">
                  Transaction Date
              </label>
              <input type="date" class="form-control" id="online_transaction_date" name="online_transaction_date">
          </div>
      </div>
  </div>
</template>













<script>




  $(document).on("change",".provider-check",function(){

      // allow only one selection
      $(".provider-check").not(this).prop("checked",false);


      if($(this).is(":checked")){

          let provider = $(this).val();


          $("#conditional-input-fields")
              .removeClass("d-none");


          // show selected logo
          let logo = "";

          switch(provider){

              case "GCash":
                  logo = "../assets/image/logo/digital_banks_logo/gcash.jpeg";
              break;

              case "Maya":
                  logo = "../assets/image/logo/digital_banks_logo/maya.jpeg";
              break;

              case "Atome":
                  logo = "../assets/image/logo/digital_banks_logo/atome.jpeg";
              break;

              case "MariBank":
                  logo = "../assets/image/logo/digital_banks_logo/maribank.jpeg";
              break;

          }


          $("#display-digitalbank-logos")
              .attr("src",logo)
              .removeClass("d-none");


      }else{


          $("#conditional-input-fields")
              .addClass("d-none");


          $("#display-digitalbank-logos")
              .addClass("d-none")
              .attr("src","");

      }

  });
</script>


