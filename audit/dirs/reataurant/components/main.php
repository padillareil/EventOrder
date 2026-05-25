<div class="card shadow-lg">
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h6 class="fw-bold mb-0 text-dark">Restaurants Operation</h6>
                <p class="text-muted small mb-0">Restaurant controls.</p>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm mb-0" id="pagination-basic">
                    <li class="page-item" id="li-prev-basic">
                        <a class="page-link shadow-none" href="#" id="btn-preview-basic">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item" id="li-next-basic">
                        <a class="page-link shadow-none" href="#" id="btn-next-basic">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
            <!-- Search Bar -->
            <div class="input-group border rounded-2 bg-light px-2 flex-grow-1" style="max-width: 300px;">
                <span class="input-group-text bg-transparent border-0">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input type="search" class="form-control bg-transparent border-0 shadow-none" id="search-account" placeholder="Search...">
            </div>

            <!-- Action Button -->
            <button class="btn btn-success px-3 rounded-2 shadow-sm d-flex align-items-center" type="button">
                <i class="bi bi-plus-lg me-1"></i> Add Account
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive overflow-auto" style="height: 70vh;">
            <table class="table table-hover align-middle mb-0">
                <thead class="sticky-top bg-white border-bottom" style="z-index: 5;">
                    <tr>
                        <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted" style="width: 80px;">#</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Restaurant</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Hotel</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Status</th>
                    </tr>
                </thead>
                <tbody class="border-top-0" id="load_UserAccountLists">

                </tbody>
            </table>
        </div>
    </div>
</div>