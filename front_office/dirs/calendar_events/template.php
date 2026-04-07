<template id="venue-form-template">
    <div class="card shadow-lg rounded-4 mb-4 venue-instance position-relative">
        <div class="card-body p-4 pt-5">
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-secondary">Hotel</label>
                    <select class="form-select form-select-lg border-primary shadow-none py-2 fs-6">
                        <option value="Grand Xing">Grand Xing Imperial Hotel</option>
                        <option value="Madison Hotel">Madison Hotel</option>
                        <option value="Citadines Amigo">Citadines Amigo Hotel</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-secondary">Function Room</label>
                    <select class="form-select form-select-lg border-primary shadow-none py-2 fs-6">
                        <option value="Pearl">Pearl</option>
                        <option value="Emerald">Emerald</option>
                        <option value="Ruby">Ruby</option>
                        <option value="Coral">Coral</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-secondary">Wing</label>
                    <select class="form-select form-select-lg border-primary shadow-none py-2 fs-6">
                        <option value="1st Floor">1st Floor</option>
                        <option value="2nd Floor">2nd Floor</option>
                        <option value="3rd Floor">3rd Floor</option>
                        <option value="4th Floor">4th Floor</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-secondary">Layout</label>
                    <select class="form-select form-select-lg border-primary shadow-none py-2 fs-6">
                        <option value="Banquet Style">Banquet Style</option>
                        <option value="Theater Style">Theater Style</option>
                        <option value="Classroom">Classroom</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
           <button type="button" class="btn btn-danger fs-6 text-decoration-none fw-semibold" onclick="removeVenue(this)">
               <i class="bi bi-trash3 me-1"></i> Remove
           </button>
        </div>
    </div>
</template>