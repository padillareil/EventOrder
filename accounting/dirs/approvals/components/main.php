<div class="container my-1">
    
    <!-- Header Block -->
    <div class="mb-4">
        <h4 class="fw-bold text-dark mb-1">Contract Approvals Portal</h4>
        <p class="text-muted small mb-0">Review financial terms, audit liability clauses, and execute corporate signatures on pending property contracts.</p>
    </div>

    <!-- Section 1: Business-Focused Analytics Metrics -->
    <div class="row g-3 mb-4">
        <!-- Metric 1: Total Forecasted Gross Revenue -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-graph-up-arrow fs-5"></i>
                    </div>
                    <div>
                        <div class="text-secondary small fw-medium">Forecasted Revenue</div>
                        <h4 class="fw-bold text-dark mb-0">₱184,500</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Metric 2: Confirmed/Approved Billings -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-check2-circle fs-5"></i>
                    </div>
                    <div>
                        <div class="text-secondary small fw-medium">Approved Billings</div>
                        <h4 class="fw-bold text-dark mb-0">₱142,800</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Metric 3: Target Approval Action Volume (Fixed) -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-warning-subtle text-warning rounded-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-file-earmark-check fs-5"></i>
                    </div>
                    <div>
                        <div class="text-secondary small fw-medium">Awaiting Contract</div>
                        <h4 class="fw-bold text-dark mb-0">12</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Metric 4: Cancelled Revenue Loss Impact -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-danger-subtle text-danger rounded-3 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="bi bi-x-circle fs-5"></i>
                    </div>
                    <div>
                        <div class="text-secondary small fw-medium">Cancelled Contracts</div>
                        <h4 class="fw-bold text-dark mb-0">4</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: Main Split Workspace -->
        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 bg-white h-100">
                    <div class="card-body bg-light-subtle">
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
                        <div class="d-flex flex-column gap-2" id="load_EventApprovalList">
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 bg-white h-100">
                    
                    <div class="card-body p-4 border-bottom">
                        <h6 class="fw-bold text-dark mb-1">Menus</h6>
                        <p class="text-muted small mb-0">Reconcile property accounts, audit signed files, and track canceled asset values.</p>
                    </div>
                    
                    <div class="card-body p-4 d-flex flex-column gap-2">
                        
                        <button type="button" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow" onclick="loadCalendarEvents()">
                            <span><i class="bi bi-calendar3 me-2 text-primary"></i> Calendar of Events</span>
                            <i class="bi bi-chevron-right fs-7 text-muted"></i>
                        </button>
                        
                        <button type="button" class="btn btn-light text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary bg-white hover-shadow" onclick="viewAllContracts()">
                            <span><i class="bi bi-file-earmark-text me-2 text-dark"></i> View All Contracts</span>
                            <i class="bi bi-chevron-right fs-7 text-muted"></i>
                        </button>
                        
                        <button class="btn btn-dark text-center p-3 rounded-3 fw-medium mt-2 shadow-sm" type="button" onclick="exportAccountingLedger()">
                            <i class="bi bi-download me-1.5"></i> Export Financial Ledger
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
</div>



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
</style>