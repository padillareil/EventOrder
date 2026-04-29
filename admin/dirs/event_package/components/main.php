<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-header bg-white border-0 pt-4 px-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-2">
            <div class="d-flex align-items-center">
                <div class="p-3 rounded-3 me-3" style="background-color: rgba(191, 155, 48, 0.1);">
                    <i class="bi bi-boxes fs-5 text-custom-gold"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold text-dark">Event Package Management</h5>
                    <p class="text-muted small mb-0">Create, organize, setup event package.</p>
                </div>
            </div>
        </div>

        
    </div>

    <div class="card-body p-2">
       <div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-3" id="amenities_content">
           <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
               <div class="row g-3 align-items-center">
                   <div class="col-12 col-md-6 d-flex align-items-center gap-3">
                       <h5 class="fw-bold mb-0">Event Package List</h5>
                   </div>
                   <div class="col-12 col-md-6 d-flex justify-content-md-end">
                       <div class="input-group border mr-2 bg-light px-3 flex-grow-1" style="max-width: 300px;">
                           <span class="input-group-text bg-transparent border-0 p-0 me-2">
                               <i class="bi bi-search text-muted small"></i>
                           </span>
                           <input type="search" class="form-control bg-transparent border-0 small py-2 shadow-none" id="search-amenitieslist" placeholder="Search...">
                       </div>
                       <button class="btn btn-link text-decoration-none text-secondary" type="button" onclick="addMenuPackage()" title="Setup Event Package">
                           <i class="bi bi-ui-checks-grid text-lg"></i>
                       </button>
                   </div>
               </div>
           </div>

           <div class="card-body p-0">
               <div class="table-responsive overflow-auto" style="height: 50vh;">
                   <table class="table table-hover align-middle mb-0">
                       <thead class="sticky-top bg-white border-bottom" style="z-index: 5;">
                           <tr>
                               <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted" style="width: 80px;">#</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Description</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Category</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Rental Fee</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Corkage Fee</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Notes</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Status</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center pe-4">Actions</th>
                           </tr>
                       </thead>
                       <tbody class="border-top-0" id="load_Amenities_content">
                       </tbody>
                   </table>
               </div>
           </div>
           <div class="card-footer">
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
    </div>
</div>


<style>
    .text-custom-gold {
        color: #bf9b30 !important;
    }
</style>