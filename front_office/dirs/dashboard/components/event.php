<div class="card shadow-sm">
  <div class="card-header p-2">
    <div class="d-flex flex-row flex-nowrap overflow-auto">
      <div class="me-3 mb-3" style="min-width: 200px;">
        <label for="event-name" class="form-label"><span class="text-success"><i class="bi bi-check2"></i></span> Event Name</label>
        <input type="text" name="event-name" class="form-control form-control-sm" autocomplete="off" required>
      </div>
      <div class="me-3 mb-3" style="min-width: 150px;">
        <label for="event-type" class="form-label"><span class="text-success"><i class="bi bi-check2"></i></span> Event Type</label>
        <select name="event-type" class="form-select form-select-sm">
          <option value="">---</option>
          <option value="Birthday">Birthday</option>
        </select>
      </div>
      <div class="me-3 mb-3" style="min-width: 150px;">
        <label for="event-date-start" class="form-label"><span class="text-success"><i class="bi bi-check2"></i></span> Event (From)</label>
        <input type="text" name="event-date-start" class="form-control form-control-sm" placeholder="Pick Start Date" required>
      </div>
      <div class="me-3 mb-3" style="min-width: 150px;">
        <label for="event-date-end" class="form-label"><span class="text-success"><i class="bi bi-check2"></i></span> Event (To)</label>
        <input type="text" name="event-date-end" class="form-control form-control-sm" placeholder="Pick End Date" required>
      </div>
      <div class="me-3 mb-3" style="min-width: 150px;">
        <label for="event-time-start" class="form-label"><span class="text-success"><i class="bi bi-check2"></i></span> Start Time</label>
        <input type="time" name="event-time-start" class="form-control form-control-sm" required>
      </div>
      <div class="me-3 mb-3" style="min-width: 150px;">
        <label for="event-time-end" class="form-label"><span class="text-success"><i class="bi bi-check2"></i></span> End Time</label>
        <input type="time" name="event-time-end" class="form-control form-control-sm" required>
      </div>
    </div>
  </div>


  <div class="card-body">
    <div class="mb-3 justify-content-end d-flex">
      <button class="btn btn-secondary btn-sm" type="button" onclick="createVenue()"><i class="bi bi-plus"></i> Add Venue</button>
    </div>

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
    <button class="btn btn-outline-secondary btn-sm" type="button" onclick="stepper.previous()">Back</button>
    <button class="btn btn-outline-primary btn-sm" type="button" onclick="stepper.next()">Next</button>
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


$(function() {
  // jQuery UI Datepicker
  $("input[name='event-date-start'], input[name='event-date-end']").datepicker({
    dateFormat: "yy-mm-dd",
    minDate: 0
  });


  // Example autocomplete
  var eventNames = ["Wedding", "Birthday", "Conference", "Corporate Meeting", "Government Event"];
  $("input[name='event-name']").autocomplete({ source: eventNames });

  var venues = ["Grand Hall", "Banquet Hall", "Conference Room A", "Conference Room B"];
  $("input[name='event-venue']").autocomplete({ source: venues });

  // Header tool buttons
  $("#add-event-type").on("click", function() {
    let type = prompt("Enter new event type:");
    if(type) $("select[name='event-type']").append(`<option value="${type}">${type}</option>`);
  });

  $("#add-venue").on("click", function() {
    let venue = prompt("Enter new venue/room:");
    if(venue) {
      let current = $("input[name='event-venue']").val();
      $("input[name='event-venue']").val(current ? current + ", " + venue : venue);
    }
  });
});

$("input[name='event-guests']").on("input", function() {
    const guests = parseInt($(this).val()) || 1;
    const packSize = 10; // default guests per pack
    $("input[name='event-pack']").val(Math.ceil(guests / packSize));
});
</script>


