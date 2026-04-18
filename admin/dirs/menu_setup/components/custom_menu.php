<div class="justify-content-end mr-4 d-flex mt-2 gap-2">
	<div class="input-group border bg-light px-3 flex-grow-1" style="max-width: 300px;">
	    <span class="input-group-text bg-transparent border-0 p-0 me-2">
	        <i class="bi bi-search text-muted small"></i>
	    </span>
	    <input type="search" id="search-custom_menu" class="form-control bg-transparent border-0 small py-2 shadow-none" placeholder="Search...">
	</div>
	<button class="btn btn-primary" type="button" onclick="addCustomMenu()"><i class="bi bi-plus-lg"></i> Add Custom</button>
</div>
<div class="card mt-2">
	<div class="card-body p-0">
	    <div class="table-responsive overflow-auto" style="height: 50vh;">
	        <table class="table table-hover align-middle mb-0">
	            <thead class="sticky-top bg-white border-bottom" style="z-index: 5;">
	                <tr>
	                    <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted" style="width: 80px;">#</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Menu Name</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Description</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Ingredient</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Status</th>
	                    <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Actions</th>
	                </tr>
	            </thead>
	            <tbody class="border-top-0" id="load_CustomeMenu_content">
	            </tbody>
	        </table>
	    </div>
	</div>

	<div class="card-footer">
	    <nav>
	        <ul class="pagination" id="pagination-custommenu">
	            <li class="page-item" id="li-prev-custommenu">
	                <a class="page-link" href="#" id="btn-preview-custommenu">Previous</a>
	            </li>
	            <li class="page-item" id="li-next-custommenu">
	                <a class="page-link" href="#" id="btn-next-custommenu">Next</a>
	            </li>
	        </ul>
	    </nav>
	    <div id="page-info-custommenu" class="mt-3 small text-muted"></div>
	</div>
</div>



