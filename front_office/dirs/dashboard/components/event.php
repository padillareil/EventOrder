<div class="card border-0 rounded-4">
      <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
          <div class="d-flex justify-content-between align-items-start mb-2">
              <div>
                  <h5 class="fw-bold mb-0 text-dark">Event Setup & Capacity</h5>
                  <p class="text-muted small">Define where the event happens and who is attending.</p>
              </div>
              <button class="btn btn-primary rounded-pill px-3 shadow-sm btn-sm" type="button" onclick="createVenue()">
                  <i class="bi bi-plus-lg me-1"></i> Add Venue
              </button>
          </div>

          <div class="mt-3 p-3 rounded-4 border border-light-subtle bg-light-subtle">
              <h6 class="text-uppercase text-secondary x-small fw-bold mb-3 tracking-wider">General Event Information</h6>
              
              <div class="row g-3">
                  <div class="col-md-7 col-lg-8">
                      <label for="event-name" class="form-label small fw-semibold">
                          <i class="bi bi-pencil-square text-primary me-1"></i> Event Name
                      </label>
                      <input type="text" class="form-control border-light-subtle shadow-sm-focus" id="event-name" placeholder="e.g. Smith-Doe Wedding" autocomplete="off">
                  </div>

                  <div class="col-md-5 col-lg-4">
                      <label for="event-type" class="form-label small fw-semibold">
                          <i class="bi bi-tag text-primary me-1"></i> Event Type
                      </label>
                      <select class="form-select border-light-subtle shadow-sm-focus" id="event-type">
                          <option selected disabled>---</option>
                          <option value="Birthday">Birthday</option>
                          <option value="Wedding">Wedding</option>
                          <option value="Seminar">Seminar</option>
                          <option value="Corporate">Corporate Event</option>
                      </select>
                  </div>

                  <div class="col-md-6">
                      <label class="form-label small fw-semibold">
                          <i class="bi bi-calendar-event text-primary me-1"></i> Event Date
                      </label>
                      <div class="input-group input-group-sm">
                          <input type="date" class="form-control border-light-subtle shadow-sm-focus" id="event-date-start">
                          <span class="input-group-text bg-white border-light-subtle text-muted small px-2">to</span>
                          <input type="date" class="form-control border-light-subtle shadow-sm-focus" id="event-date-end">
                      </div>
                  </div>

                  <div class="col-md-6">
                      <label class="form-label small fw-semibold">
                          <i class="bi bi-clock text-primary me-1"></i> Event Time
                      </label>
                      <div class="input-group input-group-sm">
                          <input type="time" class="form-control border-light-subtle shadow-sm-focus" id="event-time-start">
                          <span class="input-group-text bg-white border-light-subtle text-muted small px-2">to</span>
                          <input type="time" class="form-control border-light-subtle shadow-sm-focus" id="event-time-end">
                      </div>
                  </div>
              </div>
          </div>
      </div>


    
    <div class="card-body px-4">
       <div id="event-rooms-container" class="position-relative min-vh-25">
           <div id="empty-state" class="text-center py-5 border-2 border-dashed rounded-4 bg-light mb-3" style="border: 2px dashed #dee2e6;">
               <div class="py-4">
                   <div class="display-4 text-muted opacity-25 mb-3">
                       <i class="bi bi-folder2-open"></i> </div>
                   <h5 class="text-secondary fw-semibold">No Venues Added Yet</h5>
                   <p class="text-muted small">Click the "Add Venue" button to start configuring your event spaces.</p>
               </div>
           </div>
       </div>
    </div>

    <div class="card-footer">
        <button class="btn btn-link text-decoration-none text-muted fw-semibold" type="button" onclick="stepper.previous()" title="Back to Guest Information">
            <i class="bi bi-arrow-left"></i> Back
        </button>
        <button class="btn btn-primary px-4 rounded-pill shadow-sm" type="button" onclick="stepper.next()" title="Next to Venue Package">
            Continue to Venue <i class="bi bi-arrow-right ms-1"></i>
        </button>
    </div>
</div>

<script>
  function createVenue() {
      const container = document.getElementById('event-rooms-container');
      const template = document.getElementById('venue-form-template');
      const emptyState = document.getElementById('empty-state');

      // 1. Hide the empty state if it's currently visible
      if (emptyState) {
          emptyState.style.display = 'none';
      }

      // 2. Clone and Append the form
      const clone = template.content.cloneNode(true);
      
      // Select the card within the clone to add a remove listener
      const card = clone.querySelector('.card');
      
      // Add event listener to the "Remove" button specifically
      const removeBtn = clone.querySelector('.btn-link, .btn-close');
      // Note: If you use the template from my previous message, 
      // we can override the onclick to handle the empty state check
      
      container.appendChild(clone);
  }

  // Add this function to handle smart deletion
  function removeVenue(button) {
      const card = button.closest('.card');
      const container = document.getElementById('event-rooms-container');
      const emptyState = document.getElementById('empty-state');
      
      card.remove();

      // Check if there are any cards left (excluding the empty-state div)
      const remainingCards = container.querySelectorAll('.card').length;
      
      if (remainingCards === 0 && emptyState) {
          emptyState.style.display = 'block';
      }
  }

</script>