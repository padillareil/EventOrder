<div class="offcanvas offcanvas-end bg-dark" data-bs-scroll="true"  data-bs-backdrop="false"  tabindex="-1"  id="mdl-menupackage-list">
    <div class="offcanvas-header border-bottom gold-border">
        <div>
            <h6 class="mb-0 fw-bold text-gold">Food Packages</h6>
            <small class="text-light-50">Select and apply selection</small>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column p-3">
        <div class="mb-3 px-2">
            <input type="search" class="form-control gold-input" placeholder="Search...">
        </div>
        <div class="flex-grow-1 overflow-auto">
            <div class="card gold-card mb-2">
                <label class="card-body d-flex justify-content-between align-items-center m-0 cursor-pointer">

                    <div class="d-flex align-items-center">
                        <div class="form-check me-3">
                            <input class="form-check-input gold-checkbox" type="checkbox">
                        </div>

                        <div>
                            <div class="fw-semibold text-white">Buffet Package A</div>
                            <small class="text-light-50">5 Food Types • ₱1,200 / pax</small>
                        </div>
                    </div>

                    <span class="badge bg-primary text-primary">Standard</span>

                </label>
            </div>
            <div class="card gold-card mb-2">
                <label class="card-body d-flex justify-content-between align-items-center m-0 cursor-pointer">

                    <div class="d-flex align-items-center">
                        <div class="form-check me-3">
                            <input class="form-check-input gold-checkbox" type="checkbox">
                        </div>

                        <div>
                            <div class="fw-semibold text-white">Premium Buffet Set</div>
                            <small class="text-light-50">7 Food Types • ₱2,500 / pax</small>
                        </div>
                    </div>

                    <span class="badge bg-info text-info">
                        <i class="bi bi-crown-fill me-1"></i> Premium
                    </span>
                </label>
            </div>

        </div>
    </div>
    <div class="border-top gold-border p-3 d-flex justify-content-center">
        <nav>
            <ul class="pagination" id="pagination-amenities">
                <li class="page-item" id="li-prev-amenities">
                    <a class="page-link" href="#" id="btn-preview-amenities">Previous</a>
                </li>
                <li class="page-item" id="li-next-amenities">
                    <a class="page-link" href="#" id="btn-next-amenities">Next</a>
                </li>
            </ul>
        </nav>
        <div id="page-info-amenities" class="mt-3 small text-muted"></div>
    </div>
</div>






















<!-- 


<div class="offcanvas offcanvas-end bg-dark" data-bs-scroll="true"  data-bs-backdrop="false"  tabindex="-1"  id="mdl-menupackage-list">
    <div class="offcanvas-header border-bottom gold-border">
        <div>
            <h6 class="mb-0 fw-bold text-gold">Food Packages</h6>
            <small class="text-light-50">Select and apply selection</small>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column p-3">
        <div class="mb-3 px-2">
            <input type="search" class="form-control gold-input" placeholder="Search...">
        </div>
        <div class="flex-grow-1 overflow-auto">

            <div class="card gold-card mb-2">
                <label class="card-body d-flex justify-content-between align-items-center m-0 cursor-pointer">

                    <div class="d-flex align-items-center">
                        <div class="form-check me-3">
                            <input class="form-check-input gold-checkbox" type="checkbox">
                        </div>

                        <div>
                            <div class="fw-semibold text-white">Buffet Package A</div>
                            <small class="text-light-50">5 Food Types • ₱1,200 / pax</small>
                        </div>
                    </div>

                    <span class="badge bg-primary text-primary">Standard</span>

                </label>
            </div>
            <div class="card gold-card mb-2">
                <label class="card-body d-flex justify-content-between align-items-center m-0 cursor-pointer">

                    <div class="d-flex align-items-center">
                        <div class="form-check me-3">
                            <input class="form-check-input gold-checkbox" type="checkbox">
                        </div>

                        <div>
                            <div class="fw-semibold text-white">Premium Buffet Set</div>
                            <small class="text-light-50">7 Food Types • ₱2,500 / pax</small>
                        </div>
                    </div>

                    <span class="badge bg-info text-info">
                        <i class="bi bi-crown-fill me-1"></i> Premium
                    </span>

                </label>
            </div>

        </div>
    </div>

    <div class="border-top gold-border p-3 d-flex justify-content-center">
        <nav>
            <ul class="pagination" id="pagination-amenities">
                <li class="page-item" id="li-prev-amenities">
                    <a class="page-link" href="#" id="btn-preview-amenities">Previous</a>
                </li>
                <li class="page-item" id="li-next-amenities">
                    <a class="page-link" href="#" id="btn-next-amenities">Next</a>
                </li>
            </ul>
        </nav>
        <div id="page-info-amenities" class="mt-3 small text-muted"></div>
    </div>
</div>
 -->



<style>
    /* ===== THEME BASE ===== */
    .text-gold {
        color: #bf9b30;
    }

    .text-light-50 {
        color: rgba(255,255,255,0.6);
    }

    .gold-border {
        border-color: rgba(212,175,55,0.2) !important;
    }

    /* ===== INPUT ===== */
    .gold-input {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(212,175,55,0.3);
        color: #fff;
        border-radius: 10px;
    }

    .gold-input::placeholder {
        color: rgba(255,255,255,0.4);
    }

    .gold-input:focus {
        border-color: #bf9b30;
        box-shadow: 0 0 0 0.1rem rgba(212,175,55,0.2);
    }

    /* ===== CARD ===== */
    .gold-card {
        background: #121212;
        border: 1px solid rgba(212,175,55,0.15);
        border-radius: 12px;
        transition: all 0.2s ease;
    }

    /* Hover */
    .gold-card:hover {
        border-color: #bf9b30;
        box-shadow: 0 4px 12px rgba(212,175,55,0.15);
    }

    /* Selected */
    .gold-checkbox:checked ~ div,
    .gold-checkbox:checked {
        filter: none;
    }

    /* Active card highlight */
    .gold-checkbox:checked ~ div .fw-semibold {
        color: #bf9b30;
    }

    /* ===== CHECKBOX ===== */
    .gold-checkbox {
        width: 18px;
        height: 18px;
        border: 2px solid #bf9b30;
        background-color: transparent;
        accent-color: #bf9b30; /* modern browsers */
    }


    /* ===== BUTTON ===== */
    .gold-btn {
        background: #bf9b30;
        color: #000;
        font-weight: 600;
        border-radius: 10px;
        padding: 8px 16px;
        border: none;
        transition: 0.2s;
    }

    .gold-btn:hover {
        background: #e5c158;

</style>