<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-header border-0 pt-4 px-4">
    	<div class="input-group border mr-2 bg-light px-3 flex-grow-1" style="max-width: 300px;">
    	    <span class="input-group-text bg-transparent border-0 p-0 me-2">
    	        <i class="bi bi-search text-muted small"></i>
    	    </span>
    	    <input type="search" class="form-control bg-transparent border-0 small py-2 shadow-none" id="search-amenitieslist" placeholder="Search...">
    	</div>
    </div>

    <div class="card-body p-2">
       <div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-3" id="amenities_content">
           <div class="card-body p-0">
               <div class="table-responsive overflow-auto" style="height: 50vh;">
                   <table class="table table-hover align-middle mb-0">
                       <thead class="sticky-top bg-white border-bottom" style="z-index: 5;">
                           <tr>
                               <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted" style="width: 80px;">#</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Package Code</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Category</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Event Type</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted pe-4">Tier</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted pe-4">Est. Budget</th>
                           </tr>
                       </thead>
                       <tbody class="border-top-0" id="load_Amenities_content">
                       	<tr  class="row-action">
		                   <td class="text-muted text-center fw-medium small">
		                      1
		                   </td>

		                   <td class="fw-semibold text-muted small">
		                      PKG100002
		                   </td>
		                   <td class="fw-semibold text-muted small">
		                      MOVING UP CEREMONY
		                   </td>
		                    <td class="fw-semibold text-muted small">
		                        Organization Event
		                    </td>
			            	<td class="fw-semibold">
			            	    <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer bg-success-subtle text-success">Standard</span>
			            	</td>
			            	<td class="fw-semibold text-muted small">
			            	     ₱25,000
			            	</td>
		               </tr>
		               <tr  class="row-action">
		                   <td class="text-muted text-center fw-medium small">
		                      2
		                   </td>
		                   <td class="fw-semibold text-muted small">
		                      PKG100001
		                   </td>

		                   <td class="fw-semibold text-muted small">
		                       LGU SEMINAR
		                   </td>

		                    <td class="fw-semibold text-muted small">
		                        Government Event
		                    </td>
			            	<td class="fw-semibold">
			            	     <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer bg-info-subtle text-info"><i class="bi bi-gem"></i> Premium</span>
			            	</td>
			            	<td class="fw-semibold text-muted small">
			            	    ₱50,000
			            	</td>
		               </tr>
		              

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


<script>
	$(document).on("click", ".row-action", function () {
	  showalert();
	});
	
	function showalert() {
		alert('Reil Gwapo');
	}
</script>