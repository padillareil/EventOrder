<div class="card shadow-sm">
  <!-- Header: Event & Guest Type Info -->
  <div class="card-header bg-light">
    <div class="row g-3">
      <div class="col-12 col-md-3">
        <label for="event-number-series" class="form-label small">Event Order Number</label>
        <input type="text" class="form-control form-control-sm" id="event-number-series" value="EO00000000001" readonly>
      </div>
      <div class="col-12 col-md-3">
        <label for="transaction-number" class="form-label small">Transaction Number</label>
        <input type="text" class="form-control form-control-sm" id="transaction-number" value="TR00000000001" readonly>
      </div>
      <div class="col-12 col-md-3">
        <label for="type-guest" class="form-label small">Guest Type</label>
        <select class="form-select form-select-sm" id="type-guest">
          <option value="Walk-in">Walk-in</option>
          <option value="High Priority">High Priority</option>
          <option value="Repeat Customer">Repeat Customer</option>
        </select>
      </div>
      <div class="col-12 col-md-3">
        <label for="guest-category" class="form-label small">Guest Category</label>
        <select class="form-select form-select-sm" id="guest-category">
          <option value="Regular">Regular</option>
          <option value="VIP">VIP</option>
          <option value="Corporate">Corporate</option>
          <option value="Government">Government</option>
        </select>
      </div>
    </div>
  </div>

  <!-- Body: Guest Information -->
  <div class="card-body">
    <p class="text-muted mb-3">Guest Information</p>

    <!-- Name & Contact Section -->
    <div class="row g-3">
      <div class="col-12 col-md-4">
        <div class="mb-2">
          <label for="guest-firstname" class="form-label small">First Name</label>
          <input type="text" class="form-control form-control-sm" id="guest-firstname" autocomplete="off">
        </div>
        <div class="mb-2">
          <label for="guest-middlename" class="form-label small">Middle Name</label>
          <input type="text" class="form-control form-control-sm" id="guest-middlename" autocomplete="off">
        </div>
        <div class="mb-2">
          <label for="guest-lastname" class="form-label small">Last Name</label>
          <input type="text" class="form-control form-control-sm" id="guest-lastname" autocomplete="off">
        </div>
        <div class="mb-2">
          <label for="guest-suffix" class="form-label small">Suffix</label>
          <input class="form-control form-control-sm" list="suffix-list" id="guest-suffix" autocomplete="off" placeholder="---">
          <datalist id="suffix-list">
            <option value="Jr.">
            <option value="Sr.">
            <option value="II">
            <option value="III">
            <option value="IV">
            <option value="V">
            <option value="N/A">
          </datalist>
        </div>
        <div class="mb-2">
          <label for="guest-contactperson" class="form-label small">Contact Person</label>
          <input type="text" class="form-control form-control-sm" id="guest-contactperson">
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="mb-2">
          <label for="guest-email" class="form-label small">Email Address</label>
          <input type="email" class="form-control form-control-sm" id="guest-email">
        </div>
        <div class="mb-2">
          <label for="guest-phonenumber" class="form-label small">Phone Number</label>
          <input type="text" class="form-control form-control-sm" id="guest-phonenumber">
        </div>
        <div class="mb-2">
          <label for="guest-homeaddress" class="form-label small">Address</label>
          <input type="text" class="form-control form-control-sm" id="guest-homeaddress">
        </div>
        <div class="mb-2">
          <label for="guest-city" class="form-label small">City</label>
          <input type="text" class="form-control form-control-sm" id="guest-city">
        </div>
        <div class="mb-2">
          <label for="guest-province" class="form-label small">Province</label>
          <input type="text" class="form-control form-control-sm" id="guest-province">
        </div>
        <div class="mb-2">
          <label for="guest-zipcode" class="form-label small">Zip Code</label>
          <input type="text" class="form-control form-control-sm" id="guest-zipcode">
        </div>
      </div>


      <div class="col-12 col-md-4">
        <div class="mb-2">
          <label for="guest-tinumber" class="form-label small">TIN ID</label>
          <input type="text" class="form-control form-control-sm" id="guest-tinumber">
        </div>
        <div class="mb-2">
          <label for="guest-facebook" class="form-label small">Facebook <small class="text-muted">(Optional)</small></label>
          <input type="text" class="form-control form-control-sm" id="guest-facebook">
        </div>
        <div class="mb-2">
          <label for="guest-messenger" class="form-label small">Messenger <small class="text-muted">(Optional)</small></label>
          <input type="text" class="form-control form-control-sm" id="guest-messenger">
        </div>
        <div class="mb-2">
          <label for="guest-viber" class="form-label small">Viber <small class="text-muted">(Optional)</small></label>
          <input type="text" class="form-control form-control-sm" id="guest-viber">
        </div>
      </div>
    </div>
      
    
  </div>

  <!-- Footer: Action -->
  <div class="card-footer text-end">
    <button class="btn btn-sm text-white" type="button" id="stepper" onclick="stepper.next()" style="background-color: #bf9b30;">
      Next <i class="bi bi-chevron-right"></i>
    </button>
  </div>
</div>