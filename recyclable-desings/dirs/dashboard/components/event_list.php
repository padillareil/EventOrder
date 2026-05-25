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
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted pe-4">Engager</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Hotel</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Event Name</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Function Room</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Schedule</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Status</th>
                           </tr>
                       </thead>
                       <tbody class="border-top-0" id="load_Amenities_content">
                       	<tr >
		                   <td class="text-muted text-center fw-medium small">
		                      1
		                   </td>

		                   <td class="fw-semibold text-muted small">
		                       Melba Casamorin
		                   </td>

		                    <td class="fw-semibold text-muted small">
		                        Grand Xing Hotel
		                    </td>
		                    <td class="fw-semibold text-muted small">
		                    	Guimaras State University
		                    </td>
			            	<td class="fw-semibold text-muted small">
			            	    Coral 1
			            	</td>
			            	<td class="fw-semibold text-muted small">
			            	    June 22, 2026 | Sunday (8:00 AM - 5:00 PM)
			            	</td>
			            	<td class="fw-semibold">
			            	    <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer bg-info-subtle text-info">Upcoming</span>
			            	</td>
		               </tr>
		               <tr >
		                   <td class="text-muted text-center fw-medium small">
		                      2
		                   </td>

		                   <td class="fw-semibold text-muted small">
		                       Almer Olasco
		                   </td>

		                    <td class="fw-semibold text-muted small">
		                        Grand Xing Hotel
		                    </td>
		                    <td class="fw-semibold text-muted small">
		                    	PRULIKE UK
		                    </td>
			            	<td class="fw-semibold text-muted small">
			            	    Pearl 1 & 2
			            	</td>
			            	<td class="fw-semibold text-muted small">
			            	    May 5, 2026 | Tuesday (8:00 AM - 5:00 PM)
			            	</td>
			            	<td class="fw-semibold">
			            	    <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer bg-success-subtle text-success">Ongoing</span>
			            	</td>
		               </tr>
		               <tr >
		                   <td class="text-muted text-center fw-medium small">
		                      3
		                   </td>

		                   <td class="fw-semibold text-muted small">
		                       Danica Suarez
		                   </td>

		                    <td class="fw-semibold text-muted small">
		                        Grand Xing Hotel
		                    </td>
		                    <td class="fw-semibold text-muted small">
		                    	Five to 10 Production
		                    </td>
			            	<td class="fw-semibold text-muted small">
			            	    Emerald 1 & 2
			            	</td>
			            	<td class="fw-semibold text-muted small">
			            	    Feb 21, 2026 | Saturday (8:00 AM - 5:00 PM)
			            	</td>
			            	<td class="fw-semibold">
			            	    <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer bg-primary-subtle text-primary">Completed</span>
			            	</td>
		               </tr>
			                <!-- <tr >
			                   <td class="text-muted text-center fw-medium small">
			                      4
			                   </td>

			                   <td class="fw-semibold text-muted small">
			                       Gauran Buyco
			                   </td>

			                    <td class="fw-semibold text-muted small">
			                        Grand Xing Hotel
			                    </td>
			                    <td class="fw-semibold text-muted small">
			                    	Philippine American Progress School
			                    </td>
				            	<td class="fw-semibold text-muted small">
				            	    Ruby 1 & 2
				            	</td>
				            	<td class="fw-semibold text-muted small">
				            	    May 13, 2026 | Wednesday (8:00 AM - 5:00 PM)
				            	</td>
				            	<td class="fw-semibold">
				            	    <span class="badge px-3 py-2 rounded-pill toggle-status cursor-pointer bg-secondary-subtle text-secondary">Cancelled</span>
				            	</td>
			               </tr> -->


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