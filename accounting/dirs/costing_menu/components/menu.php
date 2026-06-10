<div class="container-fluid">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Header Actions Block -->
        <div class="card-body bg-white border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                <div>
                    <h5 class="fw-bold text-dark mb-1">Menu</h5>
                    <p class="text-muted small mb-0">Browse available dishes, pricing, and menu categories.</p>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-3 ms-md-auto">
                    <!-- Search Input Wrapper -->
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-event-order" placeholder="Search...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Master Data Grid Layout -->
        <div class="card-body  bg-light-subtle">
            <div class="mb-3 justify-content-end d-flex">
                <nav aria-label="Event order directory page navigation">
                    <ul class="pagination pagination-sm mb-0 gap-1" id="pagination-event-order">
                        <li class="page-item" id="li-prev-order">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-preview-order">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item" id="li-next-order">
                            <a class="page-link rounded-3 border shadow-sm px-2 py-1" href="#" id="btn-next-order">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <!-- Table Container Viewport -->
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 55vh;">
                <table class="table table-borderless table-hover align-middle mb-0" style="font-size: 13px;">
                    <thead class="sticky-top bg-white border-bottom align-middle text-secondary text-uppercase" style="z-index: 5; height: 52px;">
                        <tr>
                            <th class="ps-4 fw-bold" style="width: 120px;">#</th>
                            <th class="fw-bold">Menu</th>
                            <th class="fw-bold">Category</th>
                            <th class="fw-bold">Sub-Category</th>
                            <th class="fw-bold">Status</th>
                            <th class="fw-bold">Last Updated</th>
                            <th class="fw-bold text-end">Current Cost</th>
                            <th class="fw-bold text-end">New Cost</th>
                        </tr>
                    </thead>
                    <tbody id="load_MenuList">
                    	<tr>
                    	    <td colspan="8" class="p-5 text-center">
                    	        <div class="d-flex flex-column align-items-center justify-content-center text-muted">
                    	            
                    	            <div class="mb-3">
                    	                <i class="fa fa-inbox fa-3x opacity-50"></i>
                    	            </div>

                    	            <h6 class="fw-semibold mb-1">No records found</h6>

                    	            <p class="small mb-0">
                    	                There is no data available at the moment.
                    	            </p>

                    	        </div>
                    	    </td>
                    	</tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>