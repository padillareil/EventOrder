<div class="mb-3">
        <label>Payment Type</label>
        <select class="form-control">
          <option>Downpayment</option>
          <option>Full Payment</option>
        </select>
      </div>
      <div class="mb-3">
        <label>Amount</label>
        <input type="number" class="form-control">
      </div>
      <button class="btn btn-secondary" onclick="stepper.previous()">Back</button>
      <button class="btn btn-success" onclick="stepper.next()">Next</button>