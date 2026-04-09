<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-header bg-white border-0 pt-4 px-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start gap-3 mb-4">
            <div class="d-flex align-items-center">
                <div class="p-3 rounded-3 me-3" style="background-color: rgba(191, 155, 48, 0.1);">
                    <i class="bi bi-file-earmark-spreadsheet fs-5 text-custom-gold"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold text-dark">Event Orders Master Record</h5>
                    <p class="text-muted small mb-0">Generate reports and export event data to Excel.</p>
                </div>
            </div>

            <div class="d-flex gap-2">
                <div class="dropdown">
                    <button class="btn btn-success shadow-lg px-3 dropdown-toggle fw-semibold" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-file-earmark-excel me-1"></i> Export Report
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-spreadsheet me-2"></i>Export (CSV)</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-spreadsheet me-2"></i>Export (XLSX)</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check me-2"></i>Generate Summary</a></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-file-pdf me-2"></i>Export PDF</a></li>
                    </ul>
                </div>
                <button class="btn btn-primary px-3 text-white fw-bold shadow-lg" onclick="addEventOrder()">
                    <i class="bi bi-plus-lg me-1"></i> Create EO
                </button>
            </div>
        </div>

        <div class="bg-light p-3 rounded-4 mb-2">
            <div class="row g-2 align-items-center">
                <div class="col-md-3">
                    <div class="input-group input-group-sm bg-white border rounded-3 px-2 d-flex align-items-center" style="height: 38px;">
                        <span class="input-group-text bg-transparent border-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" class="form-control border-0 bg-transparent shadow-none" placeholder="Search EO#, Client..." style="font-size: 0.85rem;">
                    </div>
                </div>

                <div class="col-md-2">
                    <select class="form-select form-select-sm border bg-white shadow-none rounded-3 px-3" style="height: 38px; font-size: 0.85rem;">
                        <option selected>All Status</option>
                        <option>Confirmed</option>
                        <option>Tentative</option>
                        <option>Completed</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <div class="d-flex align-items-center bg-white border rounded-3 px-3 shadow-none" style="height: 38px;">
                        <span class="small text-muted me-2" style="font-size: 0.75rem; white-space: nowrap;">Period</span>
                        <input type="date" class="form-control form-control-sm border-0 p-0 bg-transparent shadow-none" style="font-size: 0.85rem;">
                        <span class="mx-2 text-muted">-</span>
                        <input type="date" class="form-control form-control-sm border-0 p-0 bg-transparent shadow-none" style="font-size: 0.85rem;">
                    </div>
                </div>

                <div class="col-md-3 d-flex gap-1 justify-content-md-end">
                    <button class="btn btn-sm btn-gold text-white px-3 fw-bold rounded-3" style="height: 38px; min-width: 100px;">
                        Apply Filters
                    </button>
                    <button class="btn btn-sm btn-light border px-3 fw-semibold rounded-3" style="height: 38px;">
                        Clear
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive" style="max-height: 500px;">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="bg-white sticky-top border-bottom">
                    <tr>
                        <th class="ps-4 py-3 text-muted small fw-bold">EO NUMBER</th>
                        <th class="py-3 text-muted small fw-bold">CLIENT / EVENT</th>
                        <th class="py-3 text-muted small fw-bold">SCHEDULE</th>
                        <th class="py-3 text-muted small fw-bold">REVENUE</th>
                        <th class="py-3 text-muted small fw-bold text-center">STATUS</th>
                        <th class="py-3 text-muted small fw-bold text-end pe-4">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 fw-bold text-primary">EO-10024</td>
                        <td>
                            <div class="fw-bold">Tech Global Summit 2026</div>
                            <div class="text-muted small">Contact: Maria Santos</div>
                        </td>
                        <td>
                            <div class="small fw-medium">April 15, 2026</div>
                            <div class="text-muted" style="font-size: 0.7rem;">3 Days • Grand Ballroom</div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">₱ 125,400.00</div>
                            <div class="text-success small" style="font-size: 0.7rem;">Paid Full</div>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">Confirmed</span>
                        </td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-light rounded-circle" title="View Details"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-light rounded-circle" title="Edit EO"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-light rounded-circle text-success" title="Download Excel"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 fw-bold text-primary">EO-10023</td>
                        <td>
                            <div class="fw-bold">Gomez-Reyes Wedding</div>
                            <div class="text-muted small">Contact: Roberto Gomez</div>
                        </td>
                        <td>
                            <div class="small fw-medium">June 20, 2026</div>
                            <div class="text-muted" style="font-size: 0.7rem;">1 Day • Emerald Hall</div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">₱ 85,000.00</div>
                            <div class="text-primary small d-flex align-items-center" style="font-size: 0.7rem;">
                                <i class="bi bi-percent me-1"></i> Downpayment: ₱ 20,000.00
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2">
                                Tentative
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-light rounded-circle" title="View Details"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-light rounded-circle" title="Record Balance"><i class="bi bi-credit-card-2-back text-primary"></i></button>
                            <button class="btn btn-sm btn-light rounded-circle text-success" title="Download Excel"><i class="bi bi-download"></i></button>
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






<style>
    /* --- Master Record Theme Variables --- */
    :root {
        --gold-primary: #bf9b30;
        --gold-soft: rgba(191, 155, 48, 0.1);
        --excel-green: #1d6f42; /* Excel Green */
        --excel-soft: rgba(29, 111, 66, 0.1);
    }

    /* --- Custom Branding --- */
    .text-custom-gold {
        color: var(--gold-primary) !important;
    }

    .btn-gold {
        background: linear-gradient(135deg, #bf9b30 0%, #a68525 100%);
        border: none;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-gold:hover {
        box-shadow: 0 4px 12px rgba(191, 155, 48, 0.35);
        transform: translateY(-1px);
        color: white;
    }

    /* --- Excel Export Button Style --- */
    .btn-outline-success {
        color: var(--excel-green);
        border-color: var(--excel-green);
    }

    .btn-outline-success:hover {
        background-color: var(--excel-green);
        border-color: var(--excel-green);
        color: white;
    }

    /* --- Advanced Filter Tray --- */
    .bg-light {
        background-color: #f8f9fa !important;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--gold-primary);
        box-shadow: 0 0 0 0.25rem rgba(191, 155, 48, 0.15);
    }

    /* --- Reporting Table Refinements --- */
    .table thead th {
        letter-spacing: 0.05em;
        font-size: 0.75rem;
        background-color: #ffffff;
        z-index: 10;
    }

    .table-responsive {
        scrollbar-width: thin;
        scrollbar-color: #dee2e6 transparent;
    }

    /* Custom Scrollbar for Chrome/Safari */
    .table-responsive::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: #dee2e6;
        border-radius: 10px;
    }

    /* --- Status Badge refinements --- */
    .badge {
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .bg-success-subtle {
        background-color: rgba(25, 135, 84, 0.1) !important;
    }

    .bg-primary-subtle {
        background-color: rgba(13, 110, 253, 0.1) !important;
    }

    /* --- Action Buttons --- */
    .btn-light.rounded-circle {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        transition: all 0.2s ease;
        border: 1px solid #eee;
    }

    .btn-light.rounded-circle:hover {
        background-color: var(--gold-soft);
        color: var(--gold-primary);
        border-color: var(--gold-primary);
    }

    /* --- Pagination Customization --- */
    .page-link {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #444;
    }

    .page-item.active .page-link {
        background-color: var(--gold-primary);
        border-color: var(--gold-primary);
    }
</style>