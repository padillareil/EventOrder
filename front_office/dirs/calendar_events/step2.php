<div class="row g-4">
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center">
                <span class="badge rounded-pill me-2 bg-danger">3</span>
                <h6 class="fw-bold mb-0 text-uppercase">Venue</h6>
            </div>
        </div>
        <div class="mt-2 mb-2">
            <button id="btn-add-venue" class="btn py-2 btn-primary shadow" type="button" onclick="createVenue()">
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

<?php include 'template.php';  ?>
