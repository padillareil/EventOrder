<div class="container my-1">
    
    <!-- Header Block -->
    <div class="mb-4">
        <h4 class="fw-bold text-dark mb-1">Dashboard</h4>
        <p class="text-muted small mb-0">Welcome, Jean Lausing.</p>
    </div>

    <!-- Section 2: Main Split Workspace -->
        <div class="row">
            <div class=" col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 bg-white">
                    <div class="card-body p-4 d-flex flex-column gap-2">
                        <h6 class="fw-bold text-dark mb-1">Menus</h6>

                        <button type="button" id="notificationBtn" data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="manual" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow" onclick="loadNewDocuments()">
                            <span>
                                <span class="badge badge-danger me-2" id="number-new-notify"></span>
                                Notifications
                            </span>
                            <i class="bi bi-chevron-right fs-7 text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow" onclick="loadApprovalContent()">
                            <span><i class="bi bi-folder me-2 text-secondary"></i> Approvals</span>
                            <i class="bi bi-chevron-right fs-7 text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow" onclick="loadCalendarEvents()">
                            <span><i class="bi bi-calendar3 me-2 text-primary"></i> Calendar of Events</span>
                            <i class="bi bi-chevron-right fs-7 text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow" onclick="loadStatementofAccount()">
                            <span><i class="bi bi-archive me-2 text-dark"></i> Payments</span>
                            <i class="bi bi-chevron-right fs-7 text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow" onclick="viewAllContracts()">
                            <span><i class="bi bi-archive me-2 text-dark"></i> Event Orders</span>
                            <i class="bi bi-chevron-right fs-7 text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow" onclick="viewAllContracts()">
                            <span><i class="bi bi-archive me-2 text-dark"></i> Event Orders Contract</span>
                            <i class="bi bi-chevron-right fs-7 text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow" onclick="viewAllContracts()">
                            <span><i class="bi bi-archive me-2 text-dark"></i> Billing Statements</span>
                            <i class="bi bi-chevron-right fs-7 text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow" onclick="viewAllCharges()">
                            <span><i class="bi bi-archive me-2 text-dark"></i> Charge Slip</span>
                            <i class="bi bi-chevron-right fs-7 text-muted"></i>
                        </button>

                    </div>
                </div>
            </div>


            <div class="col-lg-8" id="dashboard-display-content"> <!-- Display content -->
                <div class="card border-0 shadow-sm rounded-4 bg-white" >
                    <div class="card-body bg-light-subtle" >
                        <div class="border rounded-3 bg-white shadow-sm w-100 mb-2">
                            <input type="search" class="form-control form-control-lg bg-transparent border-0 shadow-none " id="search-approvals" placeholder="Search...">
                        </div>
                        <div class="mb-1 justify-content-end d-flex">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-sm mb-0" id="pagination-approval">
                                    <li class="page-item" id="li-prev-approval">
                                        <a class="page-link shadow-none" href="#" id="btn-preview-approval">
                                            <i class="bi bi-chevron-left small"></i>
                                        </a>
                                    </li>
                                    <li class="page-item" id="li-next-approval">
                                        <a class="page-link shadow-none" href="#" id="btn-next-approval">
                                            <i class="bi bi-chevron-right small"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="justify-content-end d-flex">
                            <div id="page-info-approval" class="mt-1 small text-muted"></div>
                        </div>
                        <div class="card card-body overflow-auto" style="height: 60vh;">
                            

                        <div class="d-flex flex-column gap-2" id="load_EventApprovalList" ></div>
                        </div>
                    </div>
                </div>
            </div>

           
        </div>
</div>



<!-- Notificaiton sound -->
<audio id="notifySound" preload="auto">
    <source src="../assets/audio/ringtone/ringtone-004.mp3" type="audio/mpeg">
</audio>


<script>
    /*search-srv*/
    $("#search-approvals").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadApproval();
        }
    });

      /* Pagination + Fetch Blocked srvounts */
      $("#btn-preview-approval").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadApproval(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-approval").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadApproval(CurrentPage + 1);
          }
      });

      $(document).on("click", "#pagination-approval .page-link[data-page]", function (e) {
          e.preventDefault();

          loadApproval($(this).data("page"));
      });
</script>

<!-- Style design for badge of pencil code -->
<style>
@keyframes neonMove {
    0% { background-position: 0% 50%; }
    100% { background-position: 300% 50%; }
}

.neon-border {
    position: relative;
    z-index: 0;
    border-radius: 10px;
}

.neon-border::before {
    content: "";
    position: absolute;
    inset: -2px;
    border-radius: 12px;
    background: linear-gradient(90deg,#0d6efd,#6610f2,#0dcaf0,#0d6efd);
    background-size: 300% 300%;
    animation: neonMove 3s linear infinite;
    z-index: -1;
}

.neon-border::after {
    content: "";
    position: absolute;
    inset: 0;
    background: #f8f9fa;
    border-radius: 10px;
    z-index: -1;
}

/* 1. Base state: Prepare the buttons for smooth animations */
.hover-shadow {
    transition: all 0.2s ease-in-out;
    position: relative;
}

/* 2. Hover state: Triggered on desktop hover or while holding a tap */
.hover-shadow:hover {
    background-color: #f8f9fa !important; /* Slight off-white background tint */
    border-color: #ced4da !important;     /* Darkens the border slightly */
    transform: translateY(-2px);          /* Gives a subtle "lift" effect */
    
    /* Elegant, soft drop shadow */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08) !important; 
}

/* 3. Active/Touch state: Immediate feedback when a user taps on a Tablet */
.hover-shadow:active {
    transform: translateY(0);            /* Snaps back down to simulate a physical press */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05) !important; /* Softens the shadow on click */
    background-color: #e9ecef !important; /* Darkens background slightly for visual confirmation */
}



/* New Document entrance */
.approval-enter {
    animation: approvalSlideUp 0.45s ease-out forwards;
}


@keyframes approvalSlideUp {

    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}


</style>