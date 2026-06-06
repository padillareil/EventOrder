<div class="container-fluid">
    <div class="card border-0 shadow rounded-4 overflow-hidden bg-light">
        
        <!-- TOP NAVIGATION & GLOBAL TOOLBAR -->
        <div class="bg-white border-bottom px-4 py-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                
                <!-- Modern Segmented Navigation Tabs (ERP Workspace switcher) -->
                <div class="p-1 bg-light rounded-3 d-inline-flex" style="border: 1px solid #e9ecef;">
                    <ul class="nav nav-pills gap-1" id="menuControlTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active px-3 py-1.5 fs-7 fw-semibold rounded-2 border-0 text-capitalize" id="form-tab" data-bs-toggle="tab" data-bs-target="#form-pane" type="button" role="tab" style="font-size: 0.85rem;">
                                Menu Registry
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-3 py-1.5 fs-7 fw-semibold rounded-2 border-0 text-capitalize" id="costing-tab" data-bs-toggle="tab" data-bs-target="#costing-pane" type="button" role="tab" style="font-size: 0.85rem;">
                                Costing
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-3 py-1.5 fs-7 fw-semibold rounded-2 border-0 text-capitalize" id="control-tab" data-bs-toggle="tab" data-bs-target="#control-pane" type="button" role="tab" style="font-size: 0.85rem;">
                                Control
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Sleek Action Tools Layout -->
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-light border bg-white text-secondary d-flex align-items-center gap-2 px-3 py-2 rounded-3" style="font-size: 0.825rem; font-weight: 500;" title="Download Data Template">
                        <i class="bi bi-download text-muted"></i> Excel Form
                    </button>
                    <button class="btn btn-light border bg-white text-secondary d-flex align-items-center gap-2 px-3 py-2 rounded-3" style="font-size: 0.825rem; font-weight: 500;" title="Upload Bulk Changes">
                        <i class="bi bi-upload text-muted"></i> Upload Form
                    </button>
                    <button class="btn btn-light border bg-white text-muted p-2 rounded-3 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" title="Refresh Form" onclick="loadCosting()">
                        <i class="bi bi-arrow-clockwise fs-6"></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- MAIN WORKSPACE CONTENT AREA -->
        <div class="tab-content bg-white" id="menuControlTabContent" >
            
            <!-- VIEW 1: FILL-UP FORM (Clean Data Input Minimalist Panels) -->
            <div class="tab-pane fade show active p-4" id="form-pane" role="tabpanel" aria-labelledby="form-tab">
                <?php include 'form.php';  ?>
            </div>

            <!-- VIEW 2: COSTING (Dense, direct value entry matrix) -->
            <div class="tab-pane fade" id="costing-pane" role="tabpanel" aria-labelledby="costing-tab">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="font-size: 0.85rem;">
                        <thead>
                            <tr class="bg-light border-bottom" style="border-bottom: 1px solid #efefef !important; font-size: 0.725rem; letter-spacing: 0.5px;">
                                <th class="ps-4 py-3 text-secondary text-uppercase fw-bold">Menu Code</th>
                                <th class="py-3 text-secondary text-uppercase fw-bold">Menu Name</th>
                                <th class="py-3 text-secondary text-uppercase fw-bold">Current Base Cost</th>
                                <th class="py-3 text-secondary text-uppercase fw-bold text-end pe-4" style="width: 220px;">Target Selling Price</th>
                            </tr>
                        </thead>
                        <tbody class="border-0">
                            <tr style="border-bottom: 1px solid #f8f9fa;">
                                <td class="ps-4 py-3 font-monospace text-muted fw-medium">MNU-9021</td>
                                <td class="fw-semibold text-dark">Pan-Seared Salmon Medallion</td>
                                <td class="text-secondary">₱180.00</td>
                                <td class="pe-4 py-2">
                                    <div class="input-group input-group-sm rounded-2 overflow-hidden border border-light-subtle">
                                        <span class="input-group-text bg-light border-0 text-muted px-2" style="font-size: 0.8rem;">₱</span>
                                        <input type="number" class="form-control border-0 text-end pe-3" value="350.00" step="0.01" style="font-size: 0.85rem; font-weight: 500;">
                                    </div>
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #f8f9fa;">
                                <td class="ps-4 py-3 font-monospace text-muted fw-medium">MNU-9022</td>
                                <td class="fw-semibold text-dark">Wild Mushroom Risotto Cavallo</td>
                                <td class="text-secondary">₱110.00</td>
                                <td class="pe-4 py-2">
                                    <div class="input-group input-group-sm rounded-2 overflow-hidden border border-light-subtle">
                                        <span class="input-group-text bg-light border-0 text-muted px-2" style="font-size: 0.8rem;">₱</span>
                                        <input type="number" class="form-control border-0 text-end pe-3" value="280.00" step="0.01" style="font-size: 0.85rem; font-weight: 500;">
                                    </div>
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #f8f9fa;">
                                <td class="ps-4 py-3 font-monospace text-muted fw-medium">MNU-9023</td>
                                <td class="fw-semibold text-dark">Classic Caesar Salad Base Platter</td>
                                <td class="text-secondary">₱85.00</td>
                                <td class="pe-4 py-2">
                                    <div class="input-group input-group-sm rounded-2 overflow-hidden border border-light-subtle">
                                        <span class="input-group-text bg-light border-0 text-muted px-2" style="font-size: 0.8rem;">₱</span>
                                        <input type="number" class="form-control border-0 text-end pe-3" value="195.00" step="0.01" style="font-size: 0.85rem; font-weight: 500;">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Inline Matrix Actions Panel -->
                <div class="p-3 bg-light border-top text-end pe-4 d-flex justify-content-between align-items-center">
                    <span class="text-muted" style="font-size: 0.775rem;"><i class="bi bi-info-circle me-1"></i> Changes made affect downstream active quotation configurations instantly.</span>
                    <button class="btn btn-dark btn-sm px-4 py-1.5 rounded-2 fw-medium" style="font-size: 0.825rem;"><i class="bi bi-check2-all me-1"></i> Commit Pricing Matrix</button>
                </div>
            </div>

            <!-- VIEW 3: CONTROL (Action Dropdowns Layout) -->
            <div class="tab-pane fade" id="control-pane" role="tabpanel" aria-labelledby="control-tab">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="font-size: 0.85rem;">
                        <thead>
                            <tr class="bg-light border-bottom" style="border-bottom: 1px solid #efefef !important; font-size: 0.725rem; letter-spacing: 0.5px;">
                                <th class="ps-4 py-3 text-secondary text-uppercase fw-bold">Code</th>
                                <th class="py-3 text-secondary text-uppercase fw-bold">Menu Description</th>
                                <th class="py-3 text-secondary text-uppercase fw-bold">Classification</th>
                                <th class="py-3 text-secondary text-uppercase fw-bold">Operational Status</th>
                                <th class="text-end pe-4 py-3 text-secondary text-uppercase fw-bold" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="border-0">
                            <tr style="border-bottom: 1px solid #f8f9fa;">
                                <td class="ps-4 py-3 font-monospace text-muted fw-medium">MNU-9021</td>
                                <td class="fw-semibold text-dark">Pan-Seared Salmon Medallion</td>
                                <td><span class="badge bg-light text-dark border border-light-subtle rounded-2 px-2 py-1 fw-medium" style="font-size: 0.75rem;">Ala Carte</span></td>
                                <td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 fw-semibold" style="font-size: 0.725rem;">Active</span></td>
                                <td class="text-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm border border-light-subtle bg-white rounded-2 px-2 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.8rem;">
                                            <i class="bi bi-three-dots-vertical text-secondary"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border border-light-subtle py-1" style="font-size: 0.825rem; min-width: 160px; border-radius: 8px;">
                                            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#"><i class="bi bi-pencil text-muted fs-7"></i> Edit Parameters</a></li>
                                            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#"><i class="bi bi-slash-circle text-muted fs-7"></i> Suspend Item</a></li>
                                            <li><hr class="dropdown-divider my-1 border-light-subtle"></li>
                                            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger fw-medium" href="#"><i class="bi bi-trash3 fs-7"></i> Archive Menu</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #f8f9fa;">
                                <td class="ps-4 py-3 font-monospace text-muted fw-medium">MNU-9022</td>
                                <td class="fw-semibold text-dark">Wild Mushroom Risotto Cavallo</td>
                                <td><span class="badge bg-light text-dark border border-light-subtle rounded-2 px-2 py-1 fw-medium" style="font-size: 0.75rem;">Ala Carte</span></td>
                                <td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 fw-semibold" style="font-size: 0.725rem;">Active</span></td>
                                <td class="text-end pe-4">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-sm border border-light-subtle bg-white rounded-2 px-2 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.8rem;">
                                            <i class="bi bi-three-dots-vertical text-secondary"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border border-light-subtle py-1" style="font-size: 0.825rem; min-width: 160px; border-radius: 8px;">
                                            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#"><i class="bi bi-pencil text-muted fs-7"></i> Edit Parameters</a></li>
                                            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#"><i class="bi bi-slash-circle text-muted fs-7"></i> Suspend Item</a></li>
                                            <li><hr class="dropdown-divider my-1 border-light-subtle"></li>
                                            <li><a class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger fw-medium" href="#"><i class="bi bi-trash3 fs-7"></i> Archive Menu</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>