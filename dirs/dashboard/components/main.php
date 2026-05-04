<!-- Navbar: Modern Glass-look using Bootstrap Utilities -->
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top py-3 mb-4 shadow-sm">
  <div class="container-fluid px-lg-5">
    <a class="navbar-brand fw-bold fs-4 text-primary" href="#">
      <i class="bi bi-intersect me-2"></i>SalesHub
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 fw-semibold">
        <li class="nav-item"><a class="nav-link active text-primary" href="#">Overview</a></li>
        <li class="nav-item"><a class="nav-link text-secondary" href="#">Bookings</a></li>
        <li class="nav-item"><a class="nav-link text-secondary" href="#">Drafts</a></li>
        <li class="nav-item"><a class="nav-link text-secondary" href="#">Performance</a></li>
      </ul>
      <div class="d-flex align-items-center">
        <span class="badge rounded-pill bg-light text-dark border p-2 px-3 fw-normal">
          <i class="bi bi-person-circle me-2"></i>Sales Team A
        </span>
      </div>
    </div>
  </div>
</nav>

<div class="container-fluid px-lg-5">
  <!-- Metrics Row: Using shadows and border-0 for a "floating" app feel -->
  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="card border-0 shadow-sm rounded-4 p-3">
        <div class="d-flex align-items-center">
          <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3">
            <i class="bi bi-people text-primary fs-4"></i>
          </div>
          <div>
            <p class="text-muted small mb-0 fw-bold text-uppercase">Engagers</p>
            <h3 class="fw-bold mb-0">41,410</h3>
            <small class="text-success fw-semibold"><i class="bi bi-arrow-up"></i> 70%</small>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 shadow-sm rounded-4 p-3">
        <div class="d-flex align-items-center">
          <div class="bg-warning bg-opacity-10 p-3 rounded-3 me-3">
            <i class="bi bi-file-earmark-text text-warning fs-4"></i>
          </div>
          <div>
            <p class="text-muted small mb-0 fw-bold text-uppercase">Event Orders</p>
            <h3 class="fw-bold mb-0">1,284</h3>
            <small class="text-warning fw-semibold"><i class="bi bi-dash"></i> Stable</small>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 shadow-sm rounded-4 p-3">
        <div class="d-flex align-items-center">
          <div class="bg-success bg-opacity-10 p-3 rounded-3 me-3">
            <i class="bi bi-calendar-check text-success fs-4"></i>
          </div>
          <div>
            <p class="text-muted small mb-0 fw-bold text-uppercase">Bookings</p>
            <h3 class="fw-bold mb-0">856</h3>
            <small class="text-success fw-semibold"><i class="bi bi-arrow-up"></i> 12%</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Grid Workspace -->
  <div class="row g-4">
    <!-- Left Column: Primary Calendar Display -->
    <div class="col-lg-8">
      <div class="card border-0 shadow-sm rounded-4 overflow-hidden" style="height: 65vh;">
        <div class="card-header bg-white py-3 border-bottom-0">
          <div class="input-group input-group-lg border rounded-3 overflow-hidden">
            <span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted"></i></span>
            <input type="search" class="form-control border-0 bg-white" placeholder="Search orders, clients, or venues...">
          </div>
        </div>
        <div class="card-body bg-light bg-opacity-50 d-flex align-items-center justify-content-center border-top">
           <div class="text-center">
             <i class="bi bi-calendar3 display-1 text-muted opacity-25"></i>
             <p class="text-muted mt-3">Event Order Calendar View</p>
           </div>
        </div>
      </div>
    </div>

    <!-- Right Column: Sidebar Feed -->
    <div class="col-lg-4">
      <div class="card border-0 shadow-sm rounded-4" style="height: 65vh;">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
          <h5 class="fw-bold mb-0">Notification Feed</h5>
          <a href="#" class="btn btn-link btn-sm text-decoration-none fw-bold">View All</a>
        </div>
        <div class="card-body p-0 overflow-auto">
          <!-- Notification List Items -->
          <div class="list-group list-group-flush">
            
            <div class="list-group-item p-4 border-0 border-bottom">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Approved</span>
                <small class="text-muted">EO-2026-001</small>
              </div>
              <h6 class="fw-bold mb-1">Tech Innovators Gala</h6>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt me-1"></i> Grand Ballroom</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="small fw-semibold text-dark">Google Philippines</span>
                <span class="small text-muted">May 10</span>
              </div>
            </div>

            <div class="list-group-item p-4 border-0 border-bottom bg-light bg-opacity-50">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill">Draft</span>
                <small class="text-muted">DR-009</small>
              </div>
              <h6 class="fw-bold mb-1">Wedding: Tan-Garcia</h6>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt me-1"></i> Sky Lounge</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="small fw-semibold text-dark">Maria Tan</span>
                <span class="small text-muted">June 15</span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>