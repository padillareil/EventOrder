<div class="row g-4">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center">
                <h6 class="fw-bold mb-0 text-uppercase">Venue Setup</h6>
            </div>
        </div>
        <div class="mt-2 mb-2">
            <button id="btn-add-venue" class="btn px-5 py-2 btn-primary shadow" type="button" onclick="createVenue()">
                <i class="bi bi-plus-lg"></i> Add Venue
            </button>
        </div>
        <!-- Empty State -->
        <div id="event-rooms-container" class="overscroll-atuo" style="height: 50vh;">
            <div id="empty-state" class="text-center py-5 border rounded-4 bg-light">
                <div class="py-4">
                    <div class="display-4 text-muted opacity-25 mb-3">
                        <i class="bi bi-question"></i>
                    </div>
                    <h6 class="text-secondary fw-semibold">No Venues</h6>
                    <p class="text-muted small mb-0">Click "Add" to create one.</p>
                </div>
            </div>
        </div>
        <!-- Dynamic List -->
        <div id="venue-list" class="d-none"></div>
    </div>
</div>


<script>
 function createVenue() {
     const container = document.getElementById('event-rooms-container');
     const template = document.getElementById('venue-form-template');
     const emptyState = document.getElementById('empty-state');
     if (emptyState) {
         emptyState.style.display = 'none';
     }
     const clone = template.content.cloneNode(true);
     container.prepend(clone);
     updateVenueIndices(); 
 }

 function updateVenueIndices() {
     const venues = document.querySelectorAll('.venue-instance');
     venues.forEach((venue, index) => {
         const indexSpan = venue.querySelector('.venue-index');
         if (indexSpan) {
             indexSpan.textContent = index + 1; 
         }
     });
 }

  function removeVenue(button) {
      const card = button.closest('.card');
      const container = document.getElementById('event-rooms-container');
      const emptyState = document.getElementById('empty-state');
      card.remove();
      const remainingCards = container.querySelectorAll('.card').length;
      if (remainingCards === 0 && emptyState) {
          emptyState.style.display = 'block';
      }
  }
</script>

<?php include 'template.php';  ?>
