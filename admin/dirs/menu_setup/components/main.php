<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-header bg-white border-0 pt-4 px-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-2">
            <div class="d-flex align-items-center">
                <div class="p-3 rounded-3 me-3" style="background-color: rgba(191, 155, 48, 0.1);">
                    <i class="bi bi-card-list fs-5 text-custom-gold"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold text-dark">Menu Management</h5>
                    <p class="text-muted small mb-0">Create, organize, and manage hotel food menus.</p>
                </div>
            </div>
        </div>

        <ul class="nav nav-pills bg-light p-1 rounded-pill d-inline-flex border" id="foodMenu" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-pill py-2 px-4 fw-medium" 
                        id="in-progress-tab" data-bs-toggle="tab" data-bs-target="#food_menus" type="button">
                   <i class="bi bi-list-check me-2"></i>Menu List
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill py-2 px-4 fw-medium" 
                        id="approved-tab" data-bs-toggle="tab" data-bs-target="#food_package" type="button">
                    <i class="bi bi-box-seam me-2"></i>Menu Package
                </button>
            </li>
        </ul>
    </div>

    <div class="card-body p-2">
        <div class="tab-content" id="foodMenuContent">
            <div class="tab-pane fade show active" id="food_menus" role="tabpanel">
                <?php include 'menus.php'; ?>
            </div>
            <div class="tab-pane fade" id="food_package" role="tabpanel">
                <?php include 'food_package.php'; ?>
            </div>
        </div>
    </div>
</div>


<style>
    #foodMenu .nav-link.active {
        background-color: #bf9b30 !important;
        color: #ffffff !important; 
        box-shadow: 0 4px 10px rgba(191, 155, 48, 0.3);
    }
    #foodMenu .nav-link {
        color: #555;
        transition: all 0.2s ease-in-out;
    }
    #foodMenu .nav-link:hover:not(.active) {
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