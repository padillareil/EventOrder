<div class="card border-0 shadow-lg rounded-4 overflow-hidden mt-2">
    <div class="card-header bg-white border-0 pt-4 px-4">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-md-4">
                <div class="input-group border px-3 py-1 bg-light">
                    <span class="input-group-text bg-transparent border-0"><i class="bi bi-search text-muted small"></i></span>
                    <input type="search" class="form-control bg-transparent border-0 small" placeholder="Search event or file...">
                </div>
            </div>

            <div class="col-12 col-md-8 d-flex justify-content-md-end align-items-center gap-2">
                <div class="d-flex align-items-center bg-light border px-3 py-1">
                    <span class="small text-muted me-2">From</span>
                    <input type="date" class="form-control form-control-sm bg-transparent border-0 fw-medium p-0" style="width: 110px; font-size: 0.8rem;">
                    <span class="mx-2 text-muted">|</span>
                    <span class="small text-muted me-2">To</span>
                    <input type="date" class="form-control form-control-sm bg-transparent border-0 fw-medium p-0" style="width: 110px; font-size: 0.8rem;">
                </div>
                <button class="btn btn-light border-0 p-2" type="button" title="Refresh">
                    <i class="bi bi-arrow-clockwise text-primary"></i>
                </button>
                <button class="btn bg-secondary-subtle border-0 p-2" type="button" title="Draft Amendments">
                    <i class="bi bi-pencil-square"></i> Draft
                </button>
            </div>
        </div>
    </div>

    <div class="card-body p-0" style="height: 55vh; overflow-y: auto;">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="bg-light sticky-top">
                    <tr>
                        <th class="ps-4 border-0 text-uppercase small fw-bold text-muted">#</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted">Amendment Details</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted">Timeline</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted">Progress</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted">Prepared By</th>
                        <th class="border-0 text-uppercase small fw-bold text-muted text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    <tr>
                        <td class="ps-4">
                            <span class="fw-bold text-dark">#AM-002</span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">LGU Seminar Venue Update</div>
                            <div class="small text-muted"><i class="bi bi-geo-alt me-1"></i>Emerald 1 & 2 (Combined)</div>
                        </td>
                        <td>
                            <div class="fw-medium small text-dark">Oct 28, 2023</div>
                            <div class="text-muted" style="font-size: 0.75rem;">Last updated 2h ago</div>
                        </td>
                        <td>
                            <div class="d-flex flex-column" style="width: 140px;">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-2 py-1" style="font-size: 0.7rem;">
                                        Front Office
                                    </span>
                                    <span class="small fw-bold text-primary" style="font-size: 0.75rem;">20%</span>
                                </div>
                                <div class="progress" style="height: 6px; background-color: #f0f0f0;">
                                    <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" 
                                         role="progressbar" 
                                         style="width: 20%" 
                                         aria-valuenow="65" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2 fw-bold" style="width: 32px; height: 32px; font-size: 11px;">CT</div>
                                <span class="small fw-medium">Cath Talaron</span>
                            </div>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-light border rounded-pill px-3">View</button>
                        </td>
                    </tr>

                    <tr>
                        <td class="ps-4">
                            <span class="fw-bold text-dark">#AM-001</span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">Revised Catering Menu</div>
                            <div class="small text-muted"><i class="bi bi-egg-fried me-1"></i>60th Anniversary Gala</div>
                        </td>
                        <td>
                            <div class="fw-medium small text-dark">Oct 30, 2023</div>
                            <div class="text-muted" style="font-size: 0.75rem;">Last updated 1d ago</div>
                        </td>
                        <td>
                            <div class="d-flex flex-column" style="width: 140px;">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="badge rounded-pill bg-warning-subtle text-warning border border-warning-subtle px-2 py-1" style="font-size: 0.7rem;">
                                        Accounting
                                    </span>
                                    <span class="small fw-bold text-warning" style="font-size: 0.75rem;">65%</span>
                                </div>
                                <div class="progress" style="height: 6px; background-color: #f0f0f0;">
                                    <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" 
                                         role="progressbar" 
                                         style="width: 65%" 
                                         aria-valuenow="65" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-2 fw-bold" style="width: 32px; height: 32px; font-size: 11px;">RP</div>
                                <span class="small fw-medium">Reil Padilla</span>
                            </div>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-light border rounded-pill px-3">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer bg-white border-0 py-3 px-4">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
            <div class="text-muted order-2 order-md-1 small">
                Showing <span class="fw-bold text-dark">1</span> to <span class="fw-bold text-dark">10</span> of 24
            </div>
            <nav class="order-1 order-md-2">
                <ul class="pagination pagination-sm mb-0 gap-1">
                    <li class="page-item disabled"><a class="page-link border-0 rounded-circle" href="#"><i class="bi bi-chevron-left"></i></a></li>
                    <li class="page-item active"><a class="page-link border-0 rounded-circle shadow-sm bg-primary" href="#">1</a></li>
                    <li class="page-item"><a class="page-link border-0 rounded-circle bg-transparent text-dark" href="#">2</a></li>
                    <li class="page-item"><a class="page-link border-0 rounded-circle bg-light text-primary" href="#"><i class="bi bi-chevron-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>