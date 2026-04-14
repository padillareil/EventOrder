<div class="justify-content-end mr-4 d-flex mt-2 gap-2">
	<div class="input-group border bg-light px-3 flex-grow-1" style="max-width: 300px;">
	    <span class="input-group-text bg-transparent border-0 p-0 me-2">
	        <i class="bi bi-search text-muted small"></i>
	    </span>
	    <input type="search" id="search-soup" class="form-control bg-transparent border-0 small py-2 shadow-none" placeholder="Search...">
	</div>
	<button class="btn btn-primary" type="button" onclick="addSoup()"><i class="bi bi-plus-lg"></i> Add Soup</button>
</div>

<!-- Load Appetizers Content -->
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
	<div id="load_Soup_content"></div>

			<div class="d-flex flex-column align-items-center text-muted py-5">
	           <div class="mb-3" style="font-size: 40px; opacity: .35;">
	                <i class="bi bi-card-list"></i>
	           </div>
	           <div class="fw-semibold">No Menu Available.</div>
	           <div class="small opacity-75">
	               Click the button 'Add Soup' to create menu.
	           </div>
	       </div>
</div>