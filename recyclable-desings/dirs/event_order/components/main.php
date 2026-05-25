<nav class="navbar navbar-expand-lg mb-3 bg-white border-bottom sticky-top py-0 shadow-none">
  <div class="container-fluid">
    <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#toolNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="toolNavbar">
      <ul class="navbar-nav me-auto mb-0 gap-lg-4">
        <li class="nav-item">
          <a class="nav-link custom-nav-link fw-bold text-primary px-0" href="#" onclick="createOrder()">Create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link  text-dark px-0" href="#">Drafts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link  text-dark px-0" href="#">Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link  text-dark px-0" href="#">Filters</a>
        </li>
        <li class="nav-item">
          <a class="nav-link custom-nav-link  text-dark px-0" href="#">Reports</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



    <!-- TABLE AREA -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 sap-table-style">
                <thead>
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Event Description</th>
                        <th>Venue / Room</th>
                        <th>Guest / Company</th>
                        <th>Date</th>
                        <th class="pe-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row: Clickable to trigger modal -->
                    <tr onclick="openOrderDetails('EO-2026-001')" style="cursor: pointer;">
                        <td class="ps-4 text-primary">EO-2026-001</td>
                        <td>
                            <div class="text-dark">Tech Innovators Gala</div>
                            <div class="small text-muted">Template: Corporate Full-Board</div>
                        </td>
                        <td>Grand Ballroom</td>
                        <td>Google Philippines</td>
                        <td>May 10, 2026</td>
                        <td class="pe-4">
                            <span class="sap-status-tag sap-tag-success">Approved</span>
                        </td>
                    </tr>
                    <!-- Example Row: Draft -->
                    <tr onclick="openDraftDetails('DR-009')" style="cursor: pointer;">
                        <td class="ps-4 text-muted">DRAFT-009</td>
                        <td>
                            <div class="text-dark">Wedding Reception: Tan-Garcia</div>
                            <div class="small text-muted">Manual Setup</div>
                        </td>
                        <td>Sky Lounge</td>
                        <td>Maria Tan</td>
                        <td>June 15, 2026</td>
                        <td class="pe-4">
                            <span class="sap-status-tag sap-tag-draft">Draft</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- SAP PAGINATION -->
    <div class="card-footer bg-white border-top-0 py-3 px-4 d-flex justify-content-between align-items-center">
        <span class="small text-muted">Items: 2 / 120</span>
        <div class="btn-group shadow-none">
            <button class="btn btn-light border rounded-0 btn-sm px-3"><i class="bi bi-chevron-left"></i></button>
            <button class="btn btn-light border rounded-0 btn-sm px-3"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>
</div>

<style>
  /* Underline Animation */
  .custom-nav-link {
    position: relative;
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
    margin-bottom: -1px; /* Overlaps with the navbar's border-bottom */
    transition: color 0.2s ease-in-out;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
  }

  .custom-nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 3px;
    bottom: 0;
    left: 0;
    background-color: #bf9b30; /* Professional Blue */
    transition: width 0.3s ease;
  }

  .custom-nav-link:hover::after {
    width: 100%;
  }

  .custom-nav-link:hover {
    color: #bf9b30 !important;
  }

  /* Active State (Example) */
  .custom-nav-link.active::after {
    width: 100%;
  }
</style>