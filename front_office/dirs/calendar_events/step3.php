<div class="overscroll-auto" style="height: 50vh;">
    <div class="row g-4">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center">
                    <span class="badge rounded-pill me-2 bg-danger">4</span>
                    <h6 class="fw-bold mb-0 text-uppercase">Decor & Audio Setup</h6>
                </div>
            </div>
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                    <div class="d-flex align-items-center">
                        <h6 class="fw-bold mb-0 text-uppercase small tracking-wider">Engineering & AV</h6>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="wired-mic">
                                <span class="fw-semibold text-dark">Wired Microphone (2 Units)</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="wired-mic">
                                <span class="fw-semibold text-dark">1 Microphone with stand</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="podium-mic">
                                <span class="fw-semibold text-dark">Podium Microphone (1 Unit)</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="podium-mic">
                                <span class="fw-semibold text-dark">Wide Screen</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="podium-mic">
                                <span class="fw-semibold text-dark">Sound System</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="lcd-projector">
                                <span class="fw-semibold text-dark">LCD Projector</span>
                            </div>
                        </label>
                    </div>
                    <div class="p-3 bg-light-subtle border-top">
                        <textarea class="form-control form-control-sm border-primary shadow-none h-100" rows="2" placeholder="Others..."></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                    <h6 class="fw-bold mb-0 text-uppercase small tracking-wider">Arrangement & Setup</h6>
                </div>
                
                <div class="card-body p-0">
                    <div class="list-group list-group-flush" id="arrangement-list">
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="table-cloth">
                                <span class="fw-semibold text-dark">Table Cloth</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="stage-decor">
                                <span class="fw-semibold text-dark">Table Cloth</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="flower-arr">
                                <span class="fw-semibold text-dark">Table Runner</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="flower-arr">
                                <span class="fw-semibold text-dark">Seat Cover</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="flower-arr">
                                <span class="fw-semibold text-dark">Table Napkin White</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="flower-arr">
                                <span class="fw-semibold text-dark">Table Napkin Gold</span>
                            </div>
                        </label>
                    </div>

                    <div class="px-4 py-2 border-top bg-white">
                        <button type="button" class="btn btn-sm text-success fw-bold p-0" onclick="addCustomItem()">
                            <i class="bi bi-plus-circle-fill me-1"></i> Add Custom
                        </button>
                    </div>

                    <div class="p-3 bg-light-subtle border-top">
                        <textarea class="form-control form-control-sm border-primary h-100 shadow-none" rows="2" placeholder="Other specific instructions..."></textarea>
                    </div>
                </div>
            </div>
        </div>

        <template id="custom-item-template">
            <div class="list-group-item px-4 py-2 selection-row d-flex align-items-center justify-content-between animate-fade-in">
                <div class="d-flex align-items-center flex-grow-1">
                    <div class="form-check custom-check-success mb-0">
                        <input class="form-check-input me-3" type="checkbox" checked>
                    </div>
                    <input type="text" class="form-control form-control-sm border-0 bg-transparent fw-semibold p-0" placeholder="Type Custom" autofocus>
                </div>
                <button type="button" class="btn btn-link text-danger p-0 ms-2" onclick="this.closest('.list-group-item').remove()">
                    <i class="bi bi-trash3"></i>
                </button>
            </div>
        </template>

        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                    <div class="d-flex align-items-center">
                        <h6 class="fw-bold mb-0 text-uppercase small tracking-wider">BackDrop Setup</h6>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="stage-decor">
                                <span class="fw-semibold text-dark">With Backdrop</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox" id="flower-arr">
                                <span class="fw-semibold text-dark">Without Backdrop</span>
                            </div>
                        </label>
                    </div>
                    <div class="p-3 bg-light-subtle border-top">
                        <textarea class="form-control form-control-sm border-primary shadow-none h-100" rows="2" placeholder="Others..."></textarea>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


  <style>
      /* Default: Green stripe is ALWAYS visible */
      .selection-row {
          cursor: pointer;
          transition: all 0.2s ease;
          border-left: 5px solid #28a745 !important; /* Success Green Stripe by Default */
          background-color: #fff;
          border-bottom: 1px solid #f8f9fa;
      }

      /* Hover effect for better interactivity */
      .selection-row:hover {
          background-color: #f8f9fa;
      }

      /* Active State: Background turns green only when checked */
      .selection-row:has(.form-check-input:checked) {
          background-color: #f2faf4 !important; /* Subtle Success Green Background */
      }

      /* Checkbox Styling */
      .custom-check-success .form-check-input {
          width: 1.25rem;
          height: 1.25rem;
          border: 2px solid #28a745; /* Green border for the checkbox itself */
      }

      .custom-check-success .form-check-input:checked {
          background-color: #28a745;
          border-color: #28a745;
      }

      /* Integrated Textarea Styling */
      .others-section {
          background-color: #f8f9fa;
          border-top: 1px solid #eee;
      }

      .others-section textarea {
          border: 1px solid transparent;
          transition: all 0.3s ease;
      }

      .others-section textarea:focus {
          background-color: #fff !important;
          border-color: #28a745 !important;
          box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.1) !important;
      }
</style>

<script>
   function addCustomItem() {
       const container = document.getElementById('arrangement-list');
       const template = document.getElementById('custom-item-template');
       const clone = template.content.cloneNode(true);
       container.appendChild(clone);
       const newItem = container.lastElementChild;
       const input = newItem.querySelector('input[type="text"]');
       if (input) {
           input.focus();
       }
   }
</script>


<!-- Custom add checkbox for Decoration -->
<template id="custom-item-template">
    <div class="list-group-item px-4 py-2 selection-row d-flex align-items-center justify-content-between animate-fade-in">
        <div class="d-flex align-items-center flex-grow-1">
            <div class="form-check custom-check-success mb-0">
                <input class="form-check-input me-3" type="checkbox" checked>
            </div>
            <input type="text" class="form-control form-control-sm border-0 bg-transparent fw-semibold p-0" placeholder="Type Custom" autofocus>
        </div>
        <button type="button" class="btn btn-link text-danger p-0 ms-2" onclick="this.closest('.list-group-item').remove()">
            <i class="bi bi-trash3"></i>
        </button>
    </div>
</template>