<div class="container my-5">

    <!-- System Logs Header Actions Panel -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        
        <!-- Left Group: Navigation Anchor & Identity Information -->
        <div class="d-flex align-items-center gap-3">
            <div>
                <h5 class="fw-bold text-dark mb-1">System Activty User Logs</h5>
                <p class="text-muted small mb-0">Real-time tracking of employee system interactions, access verifications, and property modifications.</p>
            </div>
        </div>
        
        <!-- Right Group: Administrative Action Utilities -->
        <div class="d-flex align-items-center gap-2 justify-content-md-end">
            <button type="button" class="btn btn-white border shadow text-secondary rounded-3 px-3 py-2 small fw-medium" onclick="refreshSystemLogs()">
                Refresh
            </button>
            <button type="button" class="btn btn-dark shadow rounded-3 px-3 py-2 small fw-medium shadow-sm" onclick="exportAuditTrail()">
                <i class="bi bi-download me-1.5"></i> Export
            </button>
        </div>

    </div>

    <!-- Filter Control Panel Card -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-4 mb-4">
        <div class="row align-items-center g-3">
            
            <!-- Left Side: Search Bar Input Matching Preferred Size -->
            <div class="col-12 col-md-4">
                <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                    <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-account" placeholder="Search...">
                </div>
            </div>
            
            <!-- Center Column Spacer (Hidden on mobile, collapses gracefully) -->
            <div class="col-md-4 d-none d-md-block"></div>
            
            <!-- Right Side: Pagination Controller pushed right -->
            <div class="col-12 col-md-4 d-flex justify-content-start justify-content-md-end">
                <nav aria-label="Log page navigation">
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
    </div>
    <!-- Master Log Entry Ledger Table Container -->
    <div class="card border-0 shadow-sm rounded-4 bg-white">
        
        <!-- Ledger Header Metadata Controls -->
        <div class="card-body p-4 border-bottom d-flex align-items-center justify-content-between">
            <h6 class="fw-bold text-dark mb-0">Operational Activy logs</h6>
            
            
        </div>
        
        <!-- Table Body Viewport Setup -->
        <div class="table-responsive" style="max-height: 55vh;">
            <table class="table table-hover align-middle border-top mb-0" style="font-size: 13px;">
                <thead class="table-light font-monospace text-secondary text-uppercase fs-7 sticky-top bg-light" style="z-index: 5;">
                    <tr>
                        <th class="ps-4" style="width: 90px;">Ref ID</th>
                        <th>User Account</th>
                        <th>Module Area</th>
                        <th>Operational Action Description</th>
                        <th>Device Framework</th>
                        <th>IP Address</th>
                        <th class="pe-4 text-end">Timestamp</th>
                    </tr>
                </thead>
                <tbody class="text-secondary" id="load_UserAccountLists">
                    
                    <!-- Row Item Example 1: Active Audit State -->
                    <tr>
                        <td class="ps-4 font-monospace fw-medium text-dark">#09841</td>
                        <td>
                            <div class="fw-bold text-dark">m.chang_frontdesk</div>
                            <div class="small text-muted" style="font-size: 0.75rem;">Michael Chang (Tier 2 Clerk)</div>
                        </td>
                        <td>
                            <span class="badge bg-info-subtle text-info border px-2 py-0.5 rounded fs-8 fw-medium">Folio Billing</span>
                        </td>
                        <td>Posted Final Settlement balance confirmation file for <span class="font-monospace fw-semibold text-dark">#SOA-2026-0924</span></td>
                        <td><i class="bi bi-display me-1"></i> Chrome Desktop (Win11)</td>
                        <td class="font-monospace">192.168.10.142</td>
                        <td class="pe-4 font-monospace text-end text-dark small">2026-05-17 22:14:05</td>
                    </tr>

                    <!-- Row Item Example 2: Active Audit State -->
                    <tr>
                        <td class="ps-4 font-monospace fw-medium text-dark">#09840</td>
                        <td>
                            <div class="fw-bold text-dark">s.alvarez_hk</div>
                            <div class="small text-muted" style="font-size: 0.75rem;">Sofia Alvarez (HK Supervisor)</div>
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success border px-2 py-0.5 rounded fs-8 fw-medium">Housekeeping</span>
                        </td>
                        <td>Updated room vector sequence assignment metrics for <span class="font-monospace text-dark">Suite 402</span> to <span class="text-success">Ready</span></td>
                        <td><i class="bi bi-phone me-1"></i> Mobile Safari (iOS)</td>
                        <td class="font-monospace">192.168.45.89</td>
                        <td class="pe-4 font-monospace text-end text-dark small">2026-05-17 21:58:32</td>
                    </tr>

                    <!-- Row Item Example 3: Active Audit State -->
                    <tr>
                        <td class="ps-4 font-monospace fw-medium text-dark">#09839</td>
                        <td>
                            <div class="fw-bold text-dark">j.villanueva_mgr</div>
                            <div class="small text-muted" style="font-size: 0.75rem;">Jon Villanueva (Admin/Ops)</div>
                        </td>
                        <td>
                            <span class="badge bg-danger-subtle text-danger border px-2 py-0.5 rounded fs-8 fw-medium">Security</span>
                        </td>
                        <td>Authorized security protocol overwrite bypass: Modified Master Contract rates on <span class="font-monospace text-dark">#CT-9024</span></td>
                        <td><i class="bi bi-display me-1"></i> Edge Browser (MacOS)</td>
                        <td class="font-monospace">10.0.2.15</td>
                        <td class="pe-4 font-monospace text-end text-dark small">2026-05-17 21:12:11</td>
                    </tr>

                    <!-- Un-comment this block via JS when empty state engine fires -->
                    <!-- 
                    <tr>
                        <td colspan="7" class="py-5 text-center bg-white">
                            <div class="mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle p-3 text-muted" style="width: 60px; height: 60px;">
                                    <i class="bi bi-clock-history fs-3"></i>
                                </div>
                            </div>
                            <h6 class="fw-bold text-dark mb-1">No operational activities recorded</h6>
                            <p class="text-muted small mb-0">There are no registered system metrics found for the selected query window.</p>
                        </td>
                    </tr>
                    -->

                </tbody>
            </table>
        </div>
        
    </div>
</div>