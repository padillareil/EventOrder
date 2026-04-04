<div class="card shadow-sm">
  <!-- Header: Event & Guest Type Info -->
  <div class="card-header bg-light">
    <div class="row g-3">
      <div class="col-12 col-md-3">
        <label for="event-number-series" class="form-label small">EO No.</label>
        <input type="text" class="form-control form-control-sm" id="event-number-series" value="EO00000000001" readonly>
      </div>
     <!--  <div class="col-12 col-md-3">
        <label for="transaction-number" class="form-label small">Transaction Number</label>
        <input type="text" class="form-control form-control-sm" id="transaction-number" value="TR00000000001" readonly>
      </div> -->
      <div class="col-12 col-md-3">
        <label for="type-guest" class="form-label small">Guest Type</label>
        <select class="form-select form-select-sm" id="type-guest">
          <option value="Walk-in">Walk-in</option>
          <option value="High Priority">High Priority</option>
          <option value="Repeat Customer">Repeat Customer</option>
        </select>
      </div>
      <div class="col-12 col-md-3">
        <label for="guest-category" class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Guest Category</label>
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
  <div class="card-body overscroll-auto" style="height: 50vh;">
    <div class="row g-3" >
      <div class="col-12 col-md-4" id="guest-form-container">
        
      </div>

      <div class="col-12 col-md-4">
        <div class="mb-2">
          <label for="guest-email" class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Email Address</label>
          <input type="email" class="form-control form-control-sm" id="guest-email" autocomplete="off">
        </div>
        <div class="mb-2">
          <label for="guest-phonenumber" class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Phone Number</label>
          <input type="text" class="form-control form-control-sm" id="guest-phonenumber" autocomplete="off">
        </div>
        <div class="mb-2">
          <label for="guest-homeaddress" class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Address</label>
          <input type="text" class="form-control form-control-sm" id="guest-homeaddress" autocomplete="off">
        </div>
        <div class="mb-2">
          <label for="guest-province" class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Province</label>
          <input type="text" class="form-control form-control-sm" id="guest-province" autocomplete="off">
        </div>
        <div class="row">
          <div class="col-md-6 mb-2">
            <label for="guest-city" class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> City</label>
            <input type="text" class="form-control form-control-sm" id="guest-city" autocomplete="off">
          </div>
          <div class=" col-md-6 mb-2">
            <label for="guest-zipcode" class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Zip Code</label>
            <input type="text" class="form-control form-control-sm" id="guest-zipcode" autocomplete="off">
          </div>
        </div>
      </div>


      <div class="col-12 col-md-4">
        <div class="mb-2">
          <label for="guest-tinumber" class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> TIN</label>
          <input type="text" class="form-control form-control-sm" id="guest-tinumber" autocomplete="off">
        </div>
        <div class="mb-2">
          <label for="guest-facebook" class="form-label small">Facebook <small class="text-muted">(Optional)</small></label>
          <input type="text" class="form-control form-control-sm" id="guest-facebook" autocomplete="off">
        </div>
        <div class="mb-2">
          <label for="guest-messenger" class="form-label small">Messenger <small class="text-muted">(Optional)</small></label>
          <input type="text" class="form-control form-control-sm" id="guest-messenger" autocomplete="off">
        </div>
        <div class="mb-2">
          <label for="guest-viber" class="form-label small">Viber <small class="text-muted">(Optional)</small></label>
          <input type="text" class="form-control form-control-sm" id="guest-viber" autocomplete="off">
        </div>
        <div class="mb-2">
          <label for="guest-others" class="form-label small">Remarks <small class="text-muted">(Optional)</small></label>
          <textarea class="form-control" id="guest-others" name="guest-others"></textarea>
        </div>
      </div>

    </div>
  </div>


  <div class="card-footer">
      <button class="btn btn-outline-primary btn-sm" type="button" onclick="stepper.next()">Next</button>
  </div>
  
</div>


<script>
    $("#guest-category").on("change", function () {
      var category = $(this).val();
      $("#guest-form-container").html(guestForms[category] || guestForms["Regular"]);
    });
    // Initialize on page load
    $("#guest-category").trigger("change");
    /*Tin number Auto format script*/
      $(document).ready(function () {
          $(document).on("input", "#guest-tinumber", function () {
              let val = $(this).val().replace(/[^0-9]/g, "");
              if (val.length > 12) {
                  val = val.substring(0, 12);
              }
              let formatted = val.match(/.{1,3}/g)?.join("-") || "";
              $(this).val(formatted);
          });
      });

</script>
