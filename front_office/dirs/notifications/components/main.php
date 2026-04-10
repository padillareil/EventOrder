<div class="card border-0 shadow-lg rounded-0 mt-2">
    <div class="card-header bg-white border-0 pt-4 px-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div class="d-flex align-items-center">
                <div class="p-3 rounded-3 me-3" style="background-color: rgba(191, 155, 48, 0.1);">
                    <i class="bi bi-archive fs-5 text-custom-gold"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold text-dark">Notifications</h5>
                    <p class="text-muted small mb-0">Event and system updates.</p>
                </div>
            </div>
            <button class="btn btn-sm btn-light border rounded-pill px-3 text-muted fw-medium" style="font-size: 0.75rem;">
                Mark all as read
            </button>
        </div>

        <ul class="nav nav-pills bg-light p-1 rounded-pill d-inline-flex border mb-3" id="notifications" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-pill py-2 px-4 fw-medium" 
                        id="all-tab" data-bs-toggle="tab" data-bs-target="#all_notif" type="button">
                   <i class="bi bi-envelope me-2"></i>All
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill py-2 px-4 fw-medium" 
                        id="unread-tab" data-bs-toggle="tab" data-bs-target="#unread_notif" type="button">
                    <i class="bi bi-envelope-open me-2"></i>Unread
                </button>
            </li>
        </ul>
    </div>

    <div class="card-body p-0">
        <div class="tab-content" id="notificationsContent">
            
            <div class="tab-pane fade show active" id="all_notif" role="tabpanel">
                <ul class="list-unstyled mb-0" style="max-height: 60vh; overflow-y: auto;">
                    
                    <li class="notification-item p-4 border-bottom bg-light-subtle position-relative">
                        <div class="d-flex align-items-start">
                            <div class="bg-white border rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="min-width: 45px; height: 45px;">
                                <i class="bi bi-file-earmark-diff text-primary fs-5"></i>
                            </div>
                            
                            <div class="w-100">
                                <div class="d-flex justify-content-between mb-1">
                                    <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">EO #10005 - Pax Adjustment</h6>
                                    <span class="text-muted" style="font-size: 0.7rem;">12m ago</span>
                                </div>
                                <p class="small text-muted mb-2">
                                    Request to increase seating in <span class="text-dark fw-medium">Emerald 1</span>. 
                                    Awaiting Kitchen Lead confirmation.
                                </p>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex overflow-hidden me-2">
                                        <span class="bg-primary text-white rounded-circle border border-white d-flex align-items-center justify-content-center fw-bold" style="width: 20px; height: 20px; font-size: 7px;">KM</span>
                                        <span class="bg-success text-white rounded-circle border border-white d-flex align-items-center justify-content-center fw-bold" style="width: 20px; height: 20px; font-size: 7px; margin-left: -6px;">BL</span>
                                        <span class="bg-info text-white rounded-circle border border-white d-flex align-items-center justify-content-center fw-bold" style="width: 20px; height: 20px; font-size: 7px; margin-left: -6px;">CT</span>
                                        <span class="bg-danger text-white rounded-circle border border-white d-flex align-items-center justify-content-center fw-bold" style="width: 20px; height: 20px; font-size: 7px; margin-left: -6px;">RP</span>
                                    </div>
                                    <span class="text-muted" style="font-size: 0.65rem;">Acknowledged by Kitchen & Banquet</span>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="notification-item p-4 border-bottom transition-all">
                        <div class="d-flex align-items-start opacity-75">
                            <div class="bg-white border rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="min-width: 45px; height: 45px;">
                                <i class="bi bi-egg-fried text-warning fs-5"></i>
                            </div>
                            <div class="w-100">
                                <div class="d-flex justify-content-between mb-1">
                                    <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">Menu Revision: Corporate Gala</h6>
                                    <span class="text-muted" style="font-size: 0.7rem;">3h ago</span>
                                </div>
                                <p class="small text-muted mb-2">Main course swapped to Salmon Wellington. Financial impact approved.</p>
                                
                                <div class="d-flex align-items-center">
                                    <div class="d-flex overflow-hidden me-2">
                                        <span class="bg-primary text-white rounded-circle border border-white d-flex align-items-center justify-content-center fw-bold" style="width: 20px; height: 20px; font-size: 7px;">KM</span>
                                        <span class="bg-success text-white rounded-circle border border-white d-flex align-items-center justify-content-center fw-bold" style="width: 20px; height: 20px; font-size: 7px; margin-left: -6px;">BL</span>
                                    </div>
                                    <span class="text-muted" style="font-size: 0.65rem;">Acknowledged by Kitchen & Banquet</span>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>

            <div class="tab-pane fade" id="unread_notif" role="tabpanel">
                <div class="p-5 text-center">
                    <div class="mb-3">
                        <i class="bi bi-envelope-open text-custom-gold fs-1 opacity-25"></i>
                    </div>
                    <h6 class="text-dark fw-bold">All caught up!</h6>
                    <p class="text-muted small">No new unread notifications at the moment.</p>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* CUSTOM GOLD THEME SYNC */
    .text-custom-gold {
        color: #bf9b30 !important;
    }

    #notifications .nav-link.active {
        background-color: #bf9b30 !important;
        color: #ffffff !important; 
        box-shadow: 0 4px 12px rgba(191, 155, 48, 0.35);
    }

    #notifications .nav-link {
        color: #666;
        transition: all 0.25s ease;
        border: 1px solid transparent;
    }

    #notifications .nav-link:hover:not(.active) {
        color: #bf9b30;
        background-color: rgba(191, 155, 48, 0.05);
    }

    /* List Group Interaction */
    .list-group-item {
        transition: background-color 0.2s ease;
        cursor: pointer;
    }

    .list-group-item:hover {
        background-color: #fcfcfc;
    }

    /* Avatar Group Stack */
    .avatar-group .rounded-circle {
        box-shadow: 0 0 0 2px #fff;
    }
</style>