<div class="container my-5">
    <!-- Main Wrapper -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        
        <!-- Section 1: Account Settings Profile & Security -->
        <div class="card-body p-4 p-md-5 border-bottom bg-white">
            <h4 class="fw-bold text-dark mb-4">Account Settings</h4>
            
            <div class="row g-4">
                <!-- Profile Picture Column -->
                <div class="col-10 col-sm-4 col-md-3 col-lg-2 mx-auto text-center">
                    <div class="position-relative d-inline-block mb-3">
                        <!-- Profile Image Placeholder -->
                        <div class="bg-light rounded-circle border d-flex align-items-center justify-content-center shadow-sm mx-auto" style="width: 120px; height: 120px;">
                            <i class="bi bi-person text-muted fs-1"></i>
                        </div>
                    </div>
                    <div>
                        <button id="btn-upload" class="btn btn-outline-primary btn-sm px-3 rounded-pill">
                            <i class="bi bi-camera me-1"></i> Upload Profile
                        </button>
                    </div>
                </div>

                <!-- Security Form Column -->
                <div class="col-12 col-md-9 col-lg-10">
                    <form id="frm-update-security">
                        <h5 class="fw-semibold text-dark mb-3">Update Password</h5>
                        
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label small text-secondary fw-semibold mb-1">New Password</label>
                                <input type="password" class="form-control rounded-3 py-2" id="new-password" autocomplete="off" required>
                                <div class="form-text text-muted fs-7">Create a strong password for account security.</div>
                            </div>
                            
                            <div class="col-12 col-md-6">
                                <label class="form-label small text-secondary fw-semibold mb-1">Confirm Password</label>
                                <input type="password" class="form-control rounded-3 py-2" id="confirm-password" autocomplete="off" required>
                                <div class="form-text text-muted fs-7">Ensure both passwords are match.</div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex align-items-center gap-2 mt-4 justify-content-end">
                            <button type="button" class="btn btn-light px-4 py-2 rounded-3 text-secondary border fw-medium shadow" id="btn-cancel-account">
                                Cancel
                            </button>
                            <button id="btn-submit-account" type="submit" class="btn btn-primary px-4 py-2 rounded-3 fw-medium">
                                <span class="spinner-border spinner-border-sm d-none me-1" id="btn-spinner-account"></span>
                                <span class="btn-text-account">Save Changes</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Section 2: User Activity Logs -->
        <div class="card-body p-4 p-md-5 bg-light-subtle">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-4">
                <div>
                    <h5 class="fw-semibold text-dark mb-1">Activity Logs</h5>
                    <p class="text-muted small mb-0">Monitor recent activity records associated with your profile.</p>
                </div>
                
                <!-- Table Controls Container -->
                <div class="d-flex align-items-center gap-2">
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-account" placeholder="Search logs...">
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
            <div class="table-responsive bg-white rounded-4 border shadow-sm" style="max-height: 50vh;">
                <table class="table table-borderless table-hover align-middle mb-0">
                    <thead class="sticky-top bg-white border-bottom align-middle" style="z-index: 5; height: 50px;">
                        <tr>
                            <th class="ps-4 text-secondary fw-bold fs-7" style="width: 80px;">#</th>
                            <th class="text-secondary fw-bold fs-7">Username</th>
                            <th class="text-secondary fw-bold fs-7">Description</th>
                            <th class="text-secondary fw-bold fs-7">Device</th>
                            <th class="pe-4 text-secondary fw-bold fs-7">IP Address</th>
                            <th class="pe-4 text-secondary fw-bold fs-7">Date</th>
                        </tr>
                    </thead>
                    <tbody id="load_UserAccountLists">

                        <!-- Empty State -->
                        <tr>
                            <td colspan="6" class="py-5 text-center">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center">
                                        <i class="bi bi-clock-history text-muted fs-3"></i>
                                    </div>
                                </div>
                                <h6 class="fw-bold text-dark mb-1">No activity history</h6>
                                <p class="text-muted small mb-0">This profile has no registered system activities.</p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>