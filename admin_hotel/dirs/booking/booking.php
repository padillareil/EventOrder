<div class="container my-4">
    <!-- Header with Sleek Back Button -->
    <div class="d-flex mb-4 align-items-center gap-3">
        <div>
            <h5 class="fw-bold text-dark mb-1">Booked Events Schedule</h5>
            <p class="text-muted small mb-0">Search, filter, and manage all confirmed function hall and property event bookings.</p>
        </div>
    </div>

    <!-- Filter & Search Control Panel Card -->
    <div class="card border-0 shadow-sm rounded-4 bg-white p-4 mb-4">
        <form id="eventFilterForm" onsubmit="event.preventDefault(); filterEvents();">
            <div class="row align-items-center">
                
                <!-- 1. Text Search Input -->
                <div class="col-12 col-md-4">
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="search" class="form-control bg-transparent border-0 shadow-none py-0 small" id="search-events" placeholder="Search...">
                    </div>
                </div>

                <!-- 2. Date Period: From -->
                <div class="col-12 col-md-3">
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-calendar-event text-muted"></i>
                        </span>
                        <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small text-secondary" id="date-from">
                    </div>
                </div>

                <!-- 3. Date Period: To -->
                <div class="col-12 col-md-3">
                    <div class="input-group border rounded-3 bg-white px-2 py-1 shadow-sm" style="max-width: 260px;">
                        <span class="input-group-text bg-transparent border-0 py-0 pe-2">
                            <i class="bi bi-calendar-event text-muted"></i>
                        </span>
                        <input type="date" class="form-control bg-transparent border-0 shadow-none py-0 small text-secondary" id="date-to">
                    </div>
                </div>

                <!-- 4. Action Button Utility -->
                <div class="col-12 col-md-2">
                    <button type="button" class="btn btn-dark shadow rounded-3 px-3 py-2 small fw-medium shadow-sm">
                        Apply
                    </button>
                </div>

            </div>
        </form>
    </div>

    <!-- Active Events List Container (Preserved Design Layout) -->
    <div class="card border-0 shadow-sm rounded-4 bg-white">
        <div class="card-body p-4 bg-light-subtle d-flex flex-column gap-3" id="eventsListContainer">
            <div class="mt-2 mb-2 justify-content-md-end">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0 gap-1" id="pagination-ap">
                        <li class="page-item" id="li-prev-ap">
                            <a class="page-link rounded-3 border shadow-sm px-2.5 py-1.5 bg-white text-secondary d-flex align-items-center justify-content-center" href="#" style="height: 38px; width: 38px;">
                                <i class="bi bi-chevron-left" style="font-size: 11px;"></i>
                            </a>
                        </li>
                        <li class="page-item" id="li-next-ap">
                            <a class="page-link rounded-3 border shadow-sm px-2.5 py-1.5 bg-white text-secondary d-flex align-items-center justify-content-center" href="#" style="height: 38px; width: 38px;">
                                <i class="bi bi-chevron-right" style="font-size: 11px;"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <!-- Event Item 1 -->
            <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border" onclick="loadViewEnvent()">
                <div class="bg-primary-subtle text-primary rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; min-width: 36px;">
                    <i class="bi bi-building small"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="small fw-bold text-dark">Grand Ballroom Banquet — Corporate Gala</div>
                    <div class="text-muted small" style="font-size: 0.8rem;">Client: Acme Corp (ID: EV-9023) | Setup: Evening Dinner Configuration</div>
                </div>
                <div class="text-muted small text-end" style="font-size: 0.8rem; min-width: 110px;">
                    <div class="fw-semibold text-dark">May 24, 2026</div>
                    <div style="font-size: 0.75rem;">18:00 - 23:00</div>
                </div>
            </div>

            <!-- Event Item 2 -->
            <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border">
                <div class="bg-success-subtle text-success rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; min-width: 36px;">
                    <i class="bi bi-person small"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="small fw-bold text-dark">The Bistro Veranda — Private Wedding Reception</div>
                    <div class="text-muted small" style="font-size: 0.8rem;">Client: Henderson-Smith Party | Setup: Open Lounge & Buffet Bar</div>
                </div>
                <div class="text-muted small text-end" style="font-size: 0.8rem; min-width: 110px;">
                    <div class="fw-semibold text-dark">May 28, 2026</div>
                    <div style="font-size: 0.75rem;">11:00 - 16:00</div>
                </div>
            </div>

            <!-- Event Item 3 -->
            <div class="d-flex align-items-center gap-3 bg-white p-3 rounded-3 border">
                <div class="bg-info-subtle text-info rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; min-width: 36px;">
                    <i class="bi bi-mic-fill small"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="small fw-bold text-dark">Conference Room B — Tech Seminar Pitch</div>
                    <div class="text-muted small" style="font-size: 0.8rem;">Client: Alpha Venturers Hub | Setup: Theater Seating & AV Projector System</div>
                </div>
                <div class="text-muted small text-end" style="font-size: 0.8rem; min-width: 110px;">
                    <div class="fw-semibold text-dark">June 02, 2026</div>
                    <div style="font-size: 0.75rem;">09:00 - 12:30</div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="dirs/booking/script/booking.js"></script>