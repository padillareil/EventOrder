<div class="d-flex align-items-center">
    <div class="p-3 rounded-3 me-3" style="background-color: rgba(191, 155, 48, 0.1);">
        <i class="bi bi-bookmark-check fs-5 text-custom-gold"></i>
    </div>
    <div>
        <h5 class="mb-0 fw-bold text-dark">Event Bookings</h5>
        <p class="text-muted small mb-0">Review and monitor customer reservations.</p>
    </div>
</div>


<div class="mt-3">
    <button class="btn btn-primary" type="button" onclick="addEO()"><i class="bi bi-plus-lg"></i> New Event Order</button>
</div>

<div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-2">
   <div class="card-header bg-white border-0 pt-4 px-4">
       <div class="row g-3 align-items-center mb-3">
           <div class="col-12 col-md-4">
               <div class="input-group border px-3 py-1 bg-light">
                   <span class="input-group-text bg-transparent border-0"><i class="bi bi-search text-muted small"></i></span>
                   <input type="search" class="form-control bg-transparent border-0 small" placeholder="Search event or file...">
               </div>
           </div>

           <div class="col-12 col-md-8 d-flex justify-content-md-end align-items-center gap-2">
               <div class="d-flex align-items-center bg-light border px-3 py-1">
                   <span class="small text-muted me-2">From</span>
                   <input type="date" class="form-control form-control-sm bg-transparent border-0 fw-medium p-0" style="width: 110px; font-size: 0.8rem;">
                   <span class="mx-2 text-muted">|</span>
                   <span class="small text-muted me-2">To</span>
                   <input type="date" class="form-control form-control-sm bg-transparent border-0 fw-medium p-0" style="width: 110px; font-size: 0.8rem;">
               </div>
               <button class="btn btn-light border-0 rounded-circle p-2" title="Refresh">
                   <i class="bi bi-arrow-clockwise text-primary"></i>
               </button>
           </div>
       </div>

    <div class="card-body p-0 overscroll-auto" style="height: 55vh;">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="bg-light sticky-top">
                    <tr>
                        <th>#</th>
                        <th>Event</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>Prepared by</th>
                    </tr>
                </thead>
                <!-- <tbody>
                    <tr>
                        <td colspan="6" class="py-5 text-center">
                            <div class="py-4">
                                <div class="bg-light d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 80px; height: 80px;">
                                    <i class="fa fa-calendar-times fa-2x text-muted opacity-50"></i>
                                </div>
                                <h6 class="text-dark fw-bold">No Events Found</h6>
                                <p class="text-muted small">Click button "New Event Order" to create event order.</p>
                            </div>
                        </td>
                    </tr>
                </tbody> -->

                <tbody class="text-dark">
                    <!-- Example Row 1: Upcoming -->
                    <tr class="text-center">
                        <td class="ps-4 text-muted small">01</td>
                        <td>
                            <div class="fw-bold text-dark">Business Review</div>
                            <div class="small text-muted">Emerald 1, Grand Xing Imperial Hotel</div>
                        </td>
                        <td>
                            <div class="fw-medium">Oct 24, 2023</div>
                            <div class="small text-muted">09:00 AM - 11:00 AM</div>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-info-subtle text-info border px-3 py-2">
                                Upcoming
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 10px;">JD</div>
                                <span class="small fw-medium">John Doe</span>
                            </div>
                        </td>
                    </tr>

                    <!-- Example Row 2: Completed -->
                    <tr class="text-center">
                        <td class="ps-4 text-muted small">02</td>
                        <td>
                            <div class="fw-bold text-dark">Christmas Party</div>
                            <div class="small text-muted">Pearl 1, Grand Xing Imperial Hotel</div>
                        </td>
                        <td>
                            <div class="fw-medium">Dec 15, 2023</div>
                            <div class="small text-muted">02:00 PM - 10:00 PM</div>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2">
                                Complete
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 10px;">AS</div>
                                <span class="small fw-medium">Ana Santos</span>
                            </div>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="ps-4 text-muted small">03</td>
                        <td>
                            <div class="fw-bold text-dark">LGU Seminar</div>
                            <div class="small text-muted">Emerald 1, Grand Xing Imperial Hotel</div>
                        </td>
                        <td>
                            <div class="fw-medium">Dec 27, 2023</div>
                            <div class="small text-muted">09:00 AM - 2:00 PM</div>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2">
                                In Progress
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 10px;">JD</div>
                                <span class="small fw-medium">John Doe</span>
                            </div>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="ps-4 text-muted small">03</td>
                        <td>
                            <div class="fw-bold text-dark">60th Anniversary Sacred Heart Academy Iloilo</div>
                            <div class="small text-muted">Ruby 2, Grand Xing Imperial Hotel</div>
                        </td>
                        <td>
                            <div class="fw-medium">Dec 27, 2023</div>
                            <div class="small text-muted">08:30 AM - 5:00 PM</div>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-danger-subtle text-danger border border-danger-subtle px-3 py-2">
                                Cancelled
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 10px;">RP</div>
                                <span class="small fw-medium">Reil Padilla</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   <div class="card-footer bg-white border-0 py-3 px-4">
       <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
           
           <div class="text-muted order-2 order-md-1">
               Showing <span class="text-dark">1</span> to <span class="text-dark">10</span> of <span>24</span> results
           </div>

           <nav class="order-1 order-md-2">
               <ul class="pagination pagination-sm mb-0 gap-1">
                   <li class="page-item disabled">
                       <a class="page-link border-0 rounded-3 bg-light px-3 text-muted" href="#" tabindex="-1">
                           <i class="fa fa-chevron-left"></i>
                       </a>
                   </li>
                   <li class="page-item active">
                       <a class="page-link border-0 rounded-3 px-3 shadow-sm" href="#">1</a>
                   </li>
                   <li class="page-item">
                       <a class="page-link border-0 rounded-3 bg-transparent text-dark px-3" href="#">2</a>
                   </li>
                   <li class="page-item d-none d-sm-block">
                       <a class="page-link border-0 rounded-3 bg-transparent text-dark px-3" href="#">3</a>
                   </li>

                   <li class="page-item">
                       <a class="page-link border-0 rounded-3 bg-light px-3 text-primary" href="#">
                           <i class="fa fa-chevron-right"></i>
                       </a>
                   </li>

               </ul>
           </nav>
       </div>
   </div>
</div>

<!-- <div class="border rounded-3 p-5 text-center bg-light border-dashed">
    <span class="text-muted">No active bookings.</span>
</div> -->




<style>
    .border-dashed {
        border: 2px dashed #e9ecef !important;
    }
    .text-custom-gold {
        color: #bf9b30 !important;
    }
</style>