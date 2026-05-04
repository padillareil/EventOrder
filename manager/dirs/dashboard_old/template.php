<template id="venue-form-template">
    <div class="card border border-light-subtle shadow-sm rounded-4 mb-4 venue-instance">
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-12 col-lg-7">
                    <h6 class="text-uppercase text-primary x-small fw-bold mb-3 tracking-wider">Location</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Partner Hotel</label>
                            <select class="form-select border-light-subtle bg-light-focus">
                                <option value="Grand Xing">Grand Xing</option>
                                <option value="Madison Hotel">Madison Hotel</option>
                                <option value="Citadines Amigo">Citadines Amigo</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Function Room</label>
                            <select class="form-select border-light-subtle">
                                <option value="Coral">Coral Room</option>
                                <option value="Dianne">Dianne Hall</option>
                                <option value="Pearl">Pearl Ballroom</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Room Number</label>
                            <select class="form-select border-light-subtle">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Floor / Wing</label>
                            <input type="text" class="form-control border-light-subtle" placeholder="e.g. 3rd Floor">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Seating Layout</label>
                            <select class="form-select border-light-subtle">
                                <option value="banquet">Banquet</option>
                                <option value="theater">Theater</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-semibold d-block mb-2">Venue Requirements</label>
                            <div class="d-flex flex-wrap gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="wifi-req-ID">
                                    <label class="form-check-label small" for="wifi-req-ID">High-speed WiFi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="parking-ID">
                                    <label class="form-check-label small" for="parking-ID">Reserved Parking</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="p-3 rounded-4 bg-light h-100">
                        <h6 class="text-uppercase text-primary x-small fw-bold mb-3 tracking-wider">Participant Overview</h6>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Expected Packs</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-people"></i></span>
                                <input type="number" class="form-control border-start-0" placeholder="0">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label small fw-semibold">Special Needs</label>
                            <div class="bg-white p-2 rounded border border-light-subtle">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="diet-ID">
                                    <label class="form-check-label small" for="diet-ID">Dietary Restrictions</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-light-subtle border-0 py-2 px-4 d-flex justify-content-end">
            <button type="button" class="btn btn-sm btn-link text-danger text-decoration-none fw-semibold" onclick="removeVenue(this)">
                <i class="bi bi-trash3 me-1"></i> Remove Location
            </button>
        </div>
    </div>
</template>



<script>
  function createVenue() {
      const container = document.getElementById('event-rooms-container');
      const template = document.getElementById('venue-form-template');
      const emptyState = document.getElementById('empty-state');

      // 1. Hide Empty State
      if (emptyState) emptyState.style.display = 'none';

      // 2. Prepare unique ID for this instance
      const uniqueId = Date.now();

      // 3. Clone and modify IDs
      let templateHtml = template.innerHTML;
      // Replace the placeholders with the unique timestamp
      templateHtml = templateHtml.replace(/-ID/g, `-${uniqueId}`);

      // 4. Create a temporary div to turn string back into DOM elements
      const wrapper = document.createElement('div');
      wrapper.innerHTML = templateHtml;
      const clone = wrapper.firstElementChild;

      // 5. Append to container
      container.appendChild(clone);
      
      // Optional: Smooth scroll to the new card
      clone.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }

  function removeVenue(button) {
      // Find the parent card with our specific class
      const card = button.closest('.venue-instance');
      const container = document.getElementById('event-rooms-container');
      const emptyState = document.getElementById('empty-state');
      
      // Add a small fade-out effect if you have CSS transitions
      card.style.opacity = '0';
      card.style.transform = 'scale(0.95)';
      
      setTimeout(() => {
          card.remove();
          
          // Re-check count to show empty state
          const remainingCards = container.querySelectorAll('.venue-instance').length;
          if (remainingCards === 0 && emptyState) {
              emptyState.style.display = 'block';
          }
      }, 200);
  }
</script>


