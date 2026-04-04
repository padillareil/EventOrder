<template id="venue-form-template">
    <div class="card border-0 shadow-sm mb-4" >
        <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
            <h6 class="text-muted mb-0">
                <i class="bi bi-geo-alt-fill me-2 text-danger"></i>Venue Details
            </h6>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="form-input mb-3">
                        <label for="roomName">Room Name</label>
                        <input type="text" name="function-name[]" class="form-control" id="roomName" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-input mb-3">
                        <label for="building">Building & Wing</label>
                        <input type="text" name="function-building[]" class="form-control" id="building" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-input mb-3">
                        <label for="floor">Floor Level</label>
                        <input type="text" name="function-floorlevel[]" class="form-control" id="floor" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-input mb-3">
                        <label for="layout">Room Layout</label>
                        <select class="form-select" id="layout" name="function-layout[]">
                            <option value="Banquet">Banquet</option>
                            <option value="Theater">Theater</option>
                            <option value="Classroom">Classroom</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-input mb-3">
                        <label for="capacity">Max Capacity (Packs)</label>
                        <input type="number" name="function-maxcapacity[]" class="form-control" id="capacity" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-input mb-3">
                        <label for="speakers">Guest Speakers</label>
                        <input type="number" name="function-speaker[]" class="form-control" id="speakers">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-input mb-3">
                        <label for="wifi">Wifi Access</label>
                        <select class="form-select" id="wifi" name="function-wifi[]">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-input mb-3">
                        <label for="catering">Catering Service</label>
                        <select class="form-select" id="catering" name="function-services[]">
                            <option value="Buffet">Buffet</option>
                            <option value="Plated">Plated</option>
                            <option value="Pack-Meals">Pack-Meals</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-light border-0 py-3 px-4 d-flex justify-content-end">
           <button type="button" class="btn btn-link text-danger" onclick="removeVenue(this)">
               <i class="bi bi-trash"></i> Remove Venue
           </button>
        </div>
    </div>
</template>


