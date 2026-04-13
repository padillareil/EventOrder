<div class="card border-0 shadow-lg rounded-4 overflow-hidden mt-2">
   <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
       <div class="row g-3 align-items-center">
           
           <div class="col-12 col-md-8 col-lg-7 d-flex align-items-center gap-2">
               <button id="btnCreatePackage" class="btn btn-primary px-3 py-2 d-flex align-items-center gap-2 shadow-lg border-0">
                   <i class="bi bi-plus-lg"></i>
                   <span>Create Package</span>
               </button>

               <div class="input-group border bg-light px-3 flex-grow-1" style="max-width: 300px;">
                   <span class="input-group-text bg-transparent border-0 p-0 me-2">
                       <i class="bi bi-search text-muted small"></i>
                   </span>
                   <input type="search" class="form-control bg-transparent border-0 small py-2 shadow-none" placeholder="Search menu...">
               </div>
           </div>

           <div class="col-12 col-md-4 col-lg-5 d-flex justify-content-md-end align-items-center gap-2">
               <div class="d-flex align-items-center bg-light border px-3 py-1">
                   <i class="bi bi-funnel text-muted small me-2"></i>
                   <select class="form-select form-select-sm bg-transparent border-0 shadow-none fw-medium" style="cursor: pointer; min-width: 100px;">
                       <option selected value="">All Menu</option>
                       <option value="Dessert">Dessert</option>
                       <option value="Main Course">Main Course</option>
                       <option value="Snack">Snack</option>
                   </select>
               </div>

               <button class="btn btn-light border rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="min-width: 40px; height: 40px;" title="Refresh">
                   <i class="bi bi-arrow-clockwise text-primary"></i>
               </button>
           </div>

       </div>
   </div>

   <div class="card-body p-4">
       <div class="category-section mb-5 px-4">
           <div class="d-flex align-items-center mb-4 sticky-top bg-white py-2" style="z-index: 10;">
               <div class="bg-primary rounded-pill me-2" style="width: 4px; height: 20px;"></div>
               <h6 class="fw-bold mb-0 text-uppercase small tracking-wider">Main Course</h6>
               <div class="flex-grow-1 ms-3 border-bottom opacity-25"></div>
           </div>
           
           <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
               
               <div class="col">
                   <input type="checkbox" class="btn-check" id="dessert-1" autocomplete="off">
                   <label class="btn btn-outline-light d-flex align-items-center p-3 rounded-4 border w-100 h-100 transition-all shadow-sm selection-card" for="dessert-1">
                       <div class="custom-check-indicator me-3">
                           <i class="bi bi-check-circle-fill fs-5 text-primary check-icon"></i>
                           <i class="bi bi-circle fs-5 text-muted uncheck-icon"></i>
                       </div>
                       <div class="text-start">
                           <span class="fw-bold text-dark d-block mb-0">Beef Brocolli</span>
                           <small class="text-muted">Yummy</small>
                       </div>
                   </label>
               </div>

               <div class="col">
                   <input type="checkbox" class="btn-check" id="dessert-2" autocomplete="off">
                   <label class="btn btn-outline-light d-flex align-items-center p-3 rounded-4 border w-100 h-100 transition-all shadow-sm selection-card" for="dessert-2">
                       <div class="custom-check-indicator me-3">
                           <i class="bi bi-check-circle-fill fs-5 text-primary check-icon"></i>
                           <i class="bi bi-circle fs-5 text-muted uncheck-icon"></i>
                       </div>
                       <div class="text-start">
                           <span class="fw-bold text-dark d-block mb-0">Lechon Paksiw</span>
                           <small class="text-muted">Yummy</small>
                       </div>
                   </label>
               </div>

               <div class="col">
                   <input type="checkbox" class="btn-check" id="dessert-3" autocomplete="off">
                   <label class="btn btn-outline-light d-flex align-items-center p-3 rounded-4 border w-100 h-100 transition-all shadow-sm selection-card" for="dessert-3">
                       <div class="custom-check-indicator me-3">
                           <i class="bi bi-check-circle-fill fs-5 text-primary check-icon"></i>
                           <i class="bi bi-circle fs-5 text-muted uncheck-icon"></i>
                       </div>
                       <div class="text-start">
                           <span class="fw-bold text-dark d-block mb-0">Leche Flan</span>
                           <small class="text-muted">Classic Filipino Custard</small>
                       </div>
                   </label>
               </div>

               <div class="col">
                   <input type="checkbox" class="btn-check" id="dessert-4" autocomplete="off">
                   <label class="btn btn-outline-light d-flex align-items-center p-3 rounded-4 border w-100 h-100 transition-all shadow-sm selection-card" for="dessert-4">
                       <div class="custom-check-indicator me-3">
                           <i class="bi bi-check-circle-fill fs-5 text-primary check-icon"></i>
                           <i class="bi bi-circle fs-5 text-muted uncheck-icon"></i>
                       </div>
                       <div class="text-start">
                           <span class="fw-bold text-dark d-block mb-0">Buko Pandan</span>
                           <small class="text-muted">Creamy & Aromatic</small>
                       </div>
                   </label>
               </div>

               <div class="col">
                   <div class="selection-card d-flex align-items-center justify-content-center p-3 rounded-4 border border-2 border-dashed bg-light h-100 cursor-pointer transition-all add-menu-btn" 
                        onclick="handleAddNewMenu()" 
                        style="min-height: 82px;">
                       
                       <div class="text-center">
                           <i class="bi bi-plus-circle-dotted text-primary fs-4 d-block mb-1"></i>
                           <span class="fw-bold text-primary small text-uppercase tracking-wide">Add Custom Menu</span>
                       </div>
                   </div>
               </div>

              

           </div>
       </div>
       <div class="category-section mb-5 px-4">
           <div class="d-flex align-items-center mb-4 sticky-top bg-white py-2" style="z-index: 10;">
               <div class="bg-primary rounded-pill me-2" style="width: 4px; height: 20px;"></div>
               <h6 class="fw-bold mb-0 text-uppercase small tracking-wider">Dessert Selection</h6>
               <div class="flex-grow-1 ms-3 border-bottom opacity-25"></div>
           </div>
           
           <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
               
               <div class="col">
                   <input type="checkbox" class="btn-check" id="dessert-1" autocomplete="off">
                   <label class="btn btn-outline-light d-flex align-items-center p-3 rounded-4 border w-100 h-100 transition-all shadow-sm selection-card" for="dessert-1">
                       <div class="custom-check-indicator me-3">
                           <i class="bi bi-check-circle-fill fs-5 text-primary check-icon"></i>
                           <i class="bi bi-circle fs-5 text-muted uncheck-icon"></i>
                       </div>
                       <div class="text-start">
                           <span class="fw-bold text-dark d-block mb-0">Gulaman w/ Lychee</span>
                           <small class="text-muted">Refreshing & Sweet</small>
                       </div>
                   </label>
               </div>

               <div class="col">
                   <input type="checkbox" class="btn-check" id="dessert-2" autocomplete="off">
                   <label class="btn btn-outline-light d-flex align-items-center p-3 rounded-4 border w-100 h-100 transition-all shadow-sm selection-card" for="dessert-2">
                       <div class="custom-check-indicator me-3">
                           <i class="bi bi-check-circle-fill fs-5 text-primary check-icon"></i>
                           <i class="bi bi-circle fs-5 text-muted uncheck-icon"></i>
                       </div>
                       <div class="text-start">
                           <span class="fw-bold text-dark d-block mb-0">Soft Serve Ice Cream</span>
                           <small class="text-muted">Vanilla or Chocolate</small>
                       </div>
                   </label>
               </div>

               <div class="col">
                   <input type="checkbox" class="btn-check" id="dessert-3" autocomplete="off">
                   <label class="btn btn-outline-light d-flex align-items-center p-3 rounded-4 border w-100 h-100 transition-all shadow-sm selection-card" for="dessert-3">
                       <div class="custom-check-indicator me-3">
                           <i class="bi bi-check-circle-fill fs-5 text-primary check-icon"></i>
                           <i class="bi bi-circle fs-5 text-muted uncheck-icon"></i>
                       </div>
                       <div class="text-start">
                           <span class="fw-bold text-dark d-block mb-0">Leche Flan</span>
                           <small class="text-muted">Classic Filipino Custard</small>
                       </div>
                   </label>
               </div>

               <div class="col">
                   <input type="checkbox" class="btn-check" id="dessert-4" autocomplete="off">
                   <label class="btn btn-outline-light d-flex align-items-center p-3 rounded-4 border w-100 h-100 transition-all shadow-sm selection-card" for="dessert-4">
                       <div class="custom-check-indicator me-3">
                           <i class="bi bi-check-circle-fill fs-5 text-primary check-icon"></i>
                           <i class="bi bi-circle fs-5 text-muted uncheck-icon"></i>
                       </div>
                       <div class="text-start">
                           <span class="fw-bold text-dark d-block mb-0">Buko Pandan</span>
                           <small class="text-muted">Creamy & Aromatic</small>
                       </div>
                   </label>
               </div>

           </div>
       </div>

     
   </div>



</div>






<style>
    .selection-card {
        border-color: #eee !important;
        transition: all 0.2s ease;
    }
    .selection-card:hover {
        background-color: #f8f9fa !important;
        border-color: #0d6efd !important;
        transform: translateY(-2px);
    }
    .cursor-pointer {
        cursor: pointer;
    }
    /* Change text color when checkbox is checked */
    .form-check-input:checked + span {
        color: #0d6efd !important;
    }

    .check-icon { display: none; }
    .btn-check:checked + .selection-card .check-icon { display: block; }
    .btn-check:checked + .selection-card .uncheck-icon { display: none; }

    /* Text Color change when selected */
    .btn-check:checked + .selection-card .text-dark {
        color: #0d6efd !important;
    }
</style>

<style>
    /* Dashed border for the "Add" action */
    .border-dashed {
        border-style: dashed !important;
        border-color: #dee2e6 !important;
    }

    .add-menu-btn {
        background-color: #fdfdfd !important;
        opacity: 0.8;
    }

    .add-menu-btn:hover {
        background-color: #ffffff !important;
        border-color: #0d6efd !important;
        opacity: 1;
        transform: scale(1.02);
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .transition-all {
        transition: all 0.2s ease-in-out;
    }
</style>

<script>
function handleAddNewMenu() {
    // You can trigger a Modal or a SweetAlert here
    console.log("Open custom menu input...");
    alert("Triggering Custom Menu Modal!");
}
</script>