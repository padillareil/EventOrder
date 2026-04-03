<div class="mb-3">
        <label>Event Type</label>
        <select class="form-control">
          <option>Wedding</option>
          <option>Birthday</option>
          <option>Corporate</option>
        </select>
      </div>
      <div class="mb-3">
        <label>Event Date</label>
        <input type="date" class="form-control">
      </div>
      <div class="mb-3">
        <label>No. of Guests</label>
        <input type="number" class="form-control">
      </div>
      <button class="btn btn-secondary" onclick="stepper.previous()">Back</button>
      <button class="btn btn-success" onclick="stepper.next()">Next</button>