<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-header bg-white border-0 pt-4 px-4">
        <ul class="nav nav-pills bg-light p-1 rounded-3 d-inline-flex" id="eventTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-3 py-2 px-4 fw-medium" 
                        id="calendar-tab" data-bs-toggle="tab" data-bs-target="#calendar" type="button">
                    <i class="bi bi-calendar-range me-2"></i>Calendar
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-3 py-2 px-4 fw-medium" 
                        id="bookings-tab" data-bs-toggle="tab" data-bs-target="#bookings" type="button">
                    <i class="bi bi-bookmark-check me-2"></i>Bookings
                </button>
            </li>
        </ul>
    </div>

    <div class="card-body p-4">
        <div class="tab-content" id="eventTabsContent">
            <div class="tab-pane fade show active" id="calendar" role="tabpanel">
                <?php include 'event_calendar.php';  ?>
            </div>

            <div class="tab-pane fade" id="bookings" role="tabpanel">
                <?php include 'event_bookings.php';  ?>
            </div>
        </div>
    </div>
</div>


<style>
    #eventTabs .nav-link.active {
        background-color: #bf9b30 !important;
        color: #ffffff !important; 
        box-shadow: 0 4px 10px rgba(191, 155, 48, 0.3);
    }
    #eventTabs .nav-link {
        color: #555;
        transition: all 0.2s ease-in-out;
    }
    #eventTabs .nav-link:hover:not(.active) {
        color: #bf9b30;
        background-color: rgba(191, 155, 48, 0.08); 
    }
    .border-dashed {
        border: 2px dashed #e9ecef !important;
    }
    .text-custom-gold {
        color: #bf9b30 !important;
    }
</style>