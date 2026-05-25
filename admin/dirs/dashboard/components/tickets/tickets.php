<div class="container my-5">
    
    <!-- Main Component Wrapper -->
    <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
        
        <!-- Dashboard Header -->
        <div class="card-body p-4 p-md-5 border-bottom">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="btn btn-light btn-sm rounded-circle p-2 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px;" title="Go back" onclick="loadMetrics()">
                    <i class="bi bi-arrow-left text-secondary fs-5"></i>
                </button>
                <div>
                    <h5 class="fw-bold text-dark mb-1">Ticket Reports</h5>
                    <p class="text-muted small mb-0">Review and act on active cross-property catering transmissions.</p>
                </div>
            </div>
        </div>


        <!-- Streamlined Row List View -->
        <div class="card-body p-4 p-md-5 bg-light-subtle">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                
                <!-- Search Field Input -->
                <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 280px;">
                    <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-account" placeholder="Search...">
                </div>
                
                <!-- Pagination Controls -->
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0 gap-1" id="pagination-basic">
                        <li class="page-item" id="li-prev-basic">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-preview-basic">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item" id="li-next-basic">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-next-basic">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
            <div class="d-flex flex-column gap-2" id="load_CateringTicketList">

                <!-- Ticket Row 1 -->
                <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border shadow-xs">
                    <!-- Pure Ticket Number Box -->
                    <div class="bg-light border text-secondary font-monospace fw-bold rounded-3 px-3 py-2 text-center" style="min-width: 90px; font-size: 13px;">
                        #4092
                    </div>
                    
                    <!-- Content Area -->
                    <div class="flex-grow-1">
                        <div class="small fw-semibold text-dark mb-0.5">VIP Banquet Menu Adjustment</div>
                        <div class="text-muted fs-7">Emma Watson requested 35x Filet Mignon Premium Sets for Grand Plaza Ballroom B.</div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="d-flex gap-1.5 align-items-center">
                        <button type="button" class="btn btn-light btn-sm border px-2.5 py-1 text-success rounded-2" title="Approve Request" onclick="approveTicket(4092)">
                            <i class="bi bi-check-lg"></i>
                        </button>
                        <button type="button" class="btn btn-white border shadow-xs btn-sm rounded-2 fw-medium text-dark px-3" onclick="viewTicketDetails(4092)">
                            View
                        </button>
                    </div>
                </div>

                <!-- Ticket Row 2 -->
                <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border shadow-xs">
                    <!-- Pure Ticket Number Box -->
                    <div class="bg-light border text-secondary font-monospace fw-bold rounded-3 px-3 py-2 text-center" style="min-width: 90px; font-size: 13px;">
                        #4088
                    </div>
                    
                    <!-- Content Area -->
                    <div class="flex-grow-1">
                        <div class="small fw-semibold text-dark mb-0.5">Mixology Cocktail Bar Setup</div>
                        <div class="text-muted fs-7">James Anderson initialized an open bar setup configuration layout for Oceanview Sky Deck.</div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="d-flex gap-1.5 align-items-center">
                        <button type="button" class="btn btn-light btn-sm border px-2.5 py-1 text-secondary rounded-2" title="Mark Completed" onclick="completeTicket(4088)">
                            <i class="bi bi-flag-fill" style="font-size: 11px;"></i>
                        </button>
                        <button type="button" class="btn btn-white border shadow-xs btn-sm rounded-2 fw-medium text-dark px-3" onclick="viewTicketDetails(4088)">
                            View
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>