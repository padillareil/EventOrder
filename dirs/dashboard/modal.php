<form id="frm-pencilbook">
    <div class="modal fade" id="mdl-pencilbook-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="amenites-title">Pencil Booking</h5>
                        <p class="text-muted small mb-0" id="amenites-info">Add a amenities to master data list.</p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="amenites-id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Description</label>
                            <textarea class="form-control bg-light" name="amenities-description" id="amenities-description" rows="2" maxlength="500" required></textarea>
                            <div class="form-text small">Max 500 Characters.</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Category</label>
                            <select class="form-select py-2 px-3" id="category-type" required>
                                <option selected value=""></option>
                                <option value="Band">Band</option>
                                <option value="Food">Food</option>
                                <option value="Beverage">Beverage</option>
                                <option value="Decoration">Decoration</option>
                                <option value="LED Wall">LED Wall</option>
                                <option value="Lighting">Lighting</option>
                                <option value="Microphone">Microphone</option>
                                <option value="Projector">Projector</option>
                                <option value="Sound">Sound</option>

                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Rental Fee</label>
                            <input type="number" class="form-control" name="amenities-rentalfee" id="amenities-rentalfee" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Corkage Fee</label>
                            <input type="number" class="form-control" name="amenities-corkagefee" id="amenities-corkagefee" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Notes</label>
                            <textarea class="form-control bg-light" name="amenities-notes" id="amenities-notes" rows="2" maxlength="500"></textarea>
                            <div class="form-text small">Max 500 Characters.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-amenities" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-amenities"></span>
                       <span class="btn-text-amenities">Save</span>
                     </button>
                     <button id="btn-update-amenities" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-amenities">Update</span>
                       <span id="btn-spinner-amenities-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-amenities">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
