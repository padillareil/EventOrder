<div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-3">
    <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-md-6 d-flex align-items-center gap-3">
                <h5 class="fw-bold mb-0">Active Accounts</h5>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-md-end">
                <div class="input-group border mr-2 bg-light px-3 flex-grow-1" style="max-width: 300px;">
                    <span class="input-group-text bg-transparent border-0 p-0 me-2">
                        <i class="bi bi-search text-muted small"></i>
                    </span>
                    <input type="search" class="form-control bg-transparent border-0 small py-2 shadow-none" id="search-activeuser" placeholder="Search...">
                </div>
                <button class="btn btn-link text-decoration-none text-secondary" type="button" onclick="addAccount()" title="Create New Account">
                    <i class="bi bi-ui-checks-grid text-lg"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive overflow-auto" style="height: 50vh;">
            <table class="table table-hover align-middle mb-0">
                <thead class="sticky-top bg-white border-bottom" style="z-index: 5;">
                    <tr>
                        <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted" style="width: 80px;">#</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Username</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Role</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Fullname</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Position</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Status</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="border-top-0" id="load_ActiveUsers_content">
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <nav>
            <ul class="pagination" id="pagination-activeuser">
                <li class="page-item" id="li-prev-activeuser">
                    <a class="page-link" href="#" id="btn-preview-activeuser">Previous</a>
                </li>
                <li class="page-item" id="li-next-activeuser">
                    <a class="page-link" href="#" id="btn-next-activeuser">Next</a>
                </li>
            </ul>
        </nav>
        <div id="page-info-activeuser" class="mt-3 small text-muted"></div>
    </div>
</div>