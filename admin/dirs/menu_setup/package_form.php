    <!-- Nav Tools -->
  <nav class="navbar bg-light shadow-lg border-bottom px-3 py-2">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <div class="nav d-flex align-items-center">
        <a href="#" class="nav-link fw-bold px-3 border-end" onclick="loadMenuPackage()">
           Back
        </a>
        <div class="d-flex ms-2">
          <button type="button" class="nav-link link-dark px-3  border-end">
             <i class="bi bi-download me-2"></i> Download Template
          </button>
          <button type="button" class="nav-link link-dark px-3  border-end">
             <i class="bi bi-upload me-2"></i> Upload Template
          </button>
          <button type="button" class="nav-link link-dark px-3  border-end">
             <i class="bi bi-folder2-open me-2"></i> Drafts
          </button>
        </div>
      </div>
    </div>
</nav>


<form id="frm-add-package">
  <div class="card shadow-sm border-0 rounded-4 m-3">
    <div class="card-body px-4 py-4">
      <div class="row g-4">
        <div class="col-md-4">
            <!-- Event Name -->
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark small">Event Name</label>
              <input type="text" class="form-control py-2 px-3 shadow-none" id="event-name" required>
            </div>
            <!-- Engager Category -->
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark small">Engager Category</label>
              <select class="form-select py-2 px-3" id="engager-category" required>
                <option selected value="">Select Category</option>
                <option>Association & Organizations</option>
                <option>Corporate</option>
                <option>Educational Institutions</option>
                <option>Government</option>
                <option>Health Care</option>
                <option>Private Groups</option>
                <option>Tourism & Travel</option>
              </select>
            </div>
            <!-- Per Pax Amount -->
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark small">Per Pax Amount</label>
              <div class="input-group">
                <span class="input-group-text text-muted">₱</span>
                <input type="number" class="form-control py-2 shadow-none" placeholder="0.00" id="per-pax" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark small">Inclusion</label>
              <textarea class="form-control form-control-lg h-100" required id="event-inclusion"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark small">Payment Arrangement</label>
              <textarea class="form-control form-control-lg h-100" required id="event-payment-arrangement"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark small">Note</label>
              <textarea class="form-control form-control-lg h-100" required id="event-note"></textarea>
            </div>
        </div>

        <!-- RIGHT: MODULES -->
        <div class="col-md-8 overflow-auto" style="height: 55vh;">

          <!-- SECTION -->
          <div class="mb-3 border rounded-4">

            <!-- Header -->
            <div class="px-4 pt-3 pb-2 border-bottom bg-light">
              <h6 class="fw-bold mb-0 text-uppercase small">Appetizer</h6>
            </div>

            <!-- List -->
            <div class="list-group list-group-flush">

              <label class="list-group-item px-4 py-3 selection-row">
                <div class="form-check mb-0">
                  <input class="form-check-input me-3" type="checkbox" id="item1">
                  <span class="fw-semibold text-dark">Pandesal</span>
                </div>
              </label>

              <label class="list-group-item px-4 py-3 selection-row">
                <div class="form-check mb-0">
                  <input class="form-check-input me-3" type="checkbox" id="item2">
                  <span class="fw-semibold text-dark">Butter Candy</span>
                </div>
              </label>

              <label class="list-group-item px-4 py-3 selection-row">
                <div class="form-check mb-0">
                  <input class="form-check-input me-3" type="checkbox" id="item3">
                  <span class="fw-semibold text-dark">Bukayo</span>
                </div>
              </label>

              <label class="list-group-item px-4 py-3 selection-row">
                <div class="form-check mb-0">
                  <input class="form-check-input me-3" type="checkbox" id="item4">
                  <span class="fw-semibold text-dark">Bandi</span>
                </div>
              </label>

            </div>
          </div>

          <!-- SECTION -->
          <div class="mb-3 border rounded-4">

            <div class="px-4 pt-3 pb-2 border-bottom bg-light">
              <h6 class="fw-bold mb-0 text-uppercase small">Main Course</h6>
            </div>

            <div class="list-group list-group-flush">
              <label class="list-group-item px-4 py-3 selection-row">
                <div class="form-check mb-0">
                  <input class="form-check-input me-3" type="checkbox" id="item1">
                  <span class="fw-semibold text-dark">Pandesal</span>
                </div>
              </label>

              <label class="list-group-item px-4 py-3 selection-row">
                <div class="form-check mb-0">
                  <input class="form-check-input me-3" type="checkbox" id="item2">
                  <span class="fw-semibold text-dark">Butter Candy</span>
                </div>
              </label>

              <label class="list-group-item px-4 py-3 selection-row">
                <div class="form-check mb-0">
                  <input class="form-check-input me-3" type="checkbox" id="item3">
                  <span class="fw-semibold text-dark">Bukayo</span>
                </div>
              </label>

              <label class="list-group-item px-4 py-3 selection-row">
                <div class="form-check mb-0">
                  <input class="form-check-input me-3" type="checkbox" id="item4">
                  <span class="fw-semibold text-dark">Bandi</span>
                </div>
              </label>
            </div>

          </div>

          <!-- SECTION -->
          <div class="mb-3 border rounded-4">

            <div class="px-4 pt-3 pb-2 border-bottom bg-light">
              <h6 class="fw-bold mb-0 text-uppercase small">Dessert</h6>
            </div>

            <div class="list-group list-group-flush">
              <label class="list-group-item px-4 py-3 selection-row">
                <div class="form-check mb-0">
                  <input class="form-check-input me-3" type="checkbox" id="item1">
                  <span class="fw-semibold text-dark">Pandesal</span>
                </div>
              </label>

              <label class="list-group-item px-4 py-3 selection-row">
                <div class="form-check mb-0">
                  <input class="form-check-input me-3" type="checkbox" id="item2">
                  <span class="fw-semibold text-dark">Butter Candy</span>
                </div>
              </label>

              <label class="list-group-item px-4 py-3 selection-row">
                <div class="form-check mb-0">
                  <input class="form-check-input me-3" type="checkbox" id="item3">
                  <span class="fw-semibold text-dark">Bukayo</span>
                </div>
              </label>

              <label class="list-group-item px-4 py-3 selection-row">
                <div class="form-check mb-0">
                  <input class="form-check-input me-3" type="checkbox" id="item4">
                  <span class="fw-semibold text-dark">Bandi</span>
                </div>
              </label>
            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="card-footer">
        <button id="btn-submit-package" class="btn btn-success shadow-sm" type="submit">
          <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-submit"></span>
          <span class="btn-text-submit">Save</span>
        </button>
        <button id="btn-draft-package" class="btn btn-secondary shadow-sm" type="button">
          <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-draft"></span>
          <span class="btn-text-draft">Draft</span>
        </button>
        <button id="btn-update-package" class="btn btn-success shadow-sm d-none" type="button">
          <span class="btn-text-update">Update</span>
          <span id="btn-spinner-update" class="spinner-border spinner-border-sm ms-2 d-none"></span>
        </button>
        <button id="btn-draft-package" class="btn btn-danger shadow-sm" type="reset">
          <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-draft"></span>
          <span class="btn-text-draft">Clear</span>
        </button>
    </div>
  </div>
</form>



























