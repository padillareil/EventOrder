<div class="container my-5">
    <!-- Main Card Wrapper -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4 p-md-5 bg-white">
            
            <!-- Header Section -->
            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-4">
                <div class="d-flex align-items-center gap-3">
                    <!-- Navigational Back Button disguised as a sleek utility button -->
                    <button type="button" class="btn btn-light btn-sm rounded-circle p-2 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px;" title="Go back" onclick="loadSettings()">
                        <i class="bi bi-arrow-left text-secondary fs-5"></i>
                    </button>
                    <div>
                        <h5 class="fw-bold text-dark mb-1">System Administrators</h5>
                        <p class="text-muted small mb-0">Manage admins access configurations, and account privileges.</p>
                    </div>
                </div>
                
                <!-- Table Controls Container -->
                <div class="d-flex align-items-center gap-2">
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-account" placeholder="Search...">
                    </div>
                    
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
            </div>

            <!-- Modern Table Design -->
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 55vh;">
                <table class="table table-borderless table-hover align-middle mb-0">
                    <thead class="sticky-top bg-white border-bottom align-middle" style="z-index: 5; height: 52px;">
                        <tr>
                            <th class="ps-4  text-secondary fw-bold fs-7" style="width: 80px;">#</th>
                            <th class=" text-secondary fw-bold fs-7">Username</th>
                            <th class=" text-secondary fw-bold fs-7" style="width: 150px;">Status</th>
                            <th class="pe-4  text-secondary fw-bold fs-7 text-end" style="width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="load_UserAccountLists">
                        
                        <!-- Sample Row Template (Uncomment when rendering data) -->
                        <!-- 
                        <tr>
                            <td class="ps-4 text-secondary fw-medium">1</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center border text-secondary" style="width: 32px; height: 32px; font-size: 0.85rem;">
                                        JD
                                    </div>
                                    <span class="fw-semibold text-dark">john_doe</span>
                                </div>
                            </td>
                            <td><span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill fs-7 fw-semibold">Active</span></td>
                            <td class="pe-4 text-end">
                                <button type="button" class="btn btn-light btn-sm rounded-2 p-1 border text-secondary me-1"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-light btn-sm rounded-2 p-1 border text-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr> 
                        -->

                        <!-- Empty State Container -->
                        <tr>
                            <td colspan="4" class="py-5 text-center">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center text-secondary">
                                        <i class="bi bi-people text-muted fs-3"></i>
                                    </div>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">No administrators found</h6>
                                <p class="text-muted small mb-0">There are no registered system administrators.</p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>