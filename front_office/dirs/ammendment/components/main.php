<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-header bg-white border-0 pt-4 px-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div class="d-flex align-items-center">
                <div class="p-3 rounded-3 me-3" style="background-color: rgba(191, 155, 48, 0.1);">
                    <i class="bi bi-archive fs-5 text-custom-gold"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold text-dark">Document Amendments</h5>
                    <p class="text-muted small mb-0">Apply and Manage file.</p>
                </div>
            </div>
            <button class="btn btn-primary px-3" type="button" onclick="addAmmendment()">
                <i class="bi bi-plus-lg me-1"></i> New Amendment
            </button>
        </div>

        <ul class="nav nav-pills bg-light p-1 rounded-pill d-inline-flex border" id="ammendments" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-pill py-2 px-4 fw-medium" 
                        id="in-progress-tab" data-bs-toggle="tab" data-bs-target="#in_progress_files" type="button">
                   <i class="bi bi-clock-history me-2"></i>In Progress
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill py-2 px-4 fw-medium" 
                        id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved_files" type="button">
                    <i class="bi bi-check2-circle me-2"></i>Approved
                </button>
            </li>
        </ul>
    </div>

    <div class="card-body p-4">
        <div class="tab-content" id="ammendmentsContent">
            <div class="tab-pane fade show active" id="in_progress_files" role="tabpanel">
                <?php include 'in_progress_file.php'; ?>
            </div>
            <div class="tab-pane fade" id="approved_files" role="tabpanel">
                <?php include 'approved_file.php'; ?>
            </div>
        </div>
    </div>
</div>


<style>
    #ammendments .nav-link.active {
        background-color: #bf9b30 !important;
        color: #ffffff !important; 
        box-shadow: 0 4px 10px rgba(191, 155, 48, 0.3);
    }
    #ammendments .nav-link {
        color: #555;
        transition: all 0.2s ease-in-out;
    }
    #ammendments .nav-link:hover:not(.active) {
        color: #bf9b30;
        background-color: rgba(191, 155, 48, 0.08); 
    }
    .border-dashed {
        border: 2px dashed #e9ecef !important;
    }
    .text-custom-gold {
        color: #bf9b30 !important;
    }
</style>