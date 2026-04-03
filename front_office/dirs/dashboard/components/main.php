<div class="card shadow-sm">
  <!-- tools -->
  <div class="card-header">
    <div class="justify-content-end d-flex">
      <div class="btn-group" role="group">
        <button class="btn btn-light" id="btn-draft" title="Save as draft">
          <i class="bi bi-save"></i> Save Pencil
        </button>
        <button class="btn btn-light" id="btn-cancel" title="Cancel creation">
          <i class="bi bi-trash"></i> Cancel
        </button>
        <button class="btn btn-light" id="btn-draft" title="Event Order Drafts">
          <i class="bi bi-archive"></i> Drafts
        </button>
        <button class="btn btn-light" id="btn-refresh" onclick="load_Dashboard()" title="Reload this Page">
          <i class="bi bi-arrow-clockwise"></i> Refresh
        </button>
      </div>
    </div>
  </div>

  <div class="card-body d-flex flex-column" style="height: 80vh;">
    <div class="bs-stepper h-100 d-flex flex-column" id="stepper">

      <!-- HEADER (NO SCROLL, but horizontal scroll allowed) -->
      <div class="bs-stepper-header flex-nowrap overflow-auto" role="tablist">
       <div class="step" data-target="#client-part">
         <button type="button" class="step-trigger">
           <span class="bs-stepper-circle">
             <i class="bi bi-person"></i>
           </span>
           <span class="bs-stepper-label">Guest Information</span>
         </button>
       </div>
       <div class="line"></div>
       <div class="step" data-target="#event-part">
         <button type="button" class="step-trigger">
           <span class="bs-stepper-circle">
             <i class="bi bi-calendar-check"></i>
           </span>
           <span class="bs-stepper-label">Event Details</span>
         </button>
       </div>
       <div class="line"></div>
       <div class="step" data-target="#venue-part">
         <button type="button" class="step-trigger">
           <span class="bs-stepper-circle">
             <i class="bi bi-geo-alt"></i>
           </span>
           <span class="bs-stepper-label">Venue Package</span>
         </button>
       </div>
       <div class="line"></div>
       <div class="step" data-target="#pricing-part">
         <button type="button" class="step-trigger">
           <span class="bs-stepper-circle">
             <i class="bi bi-tag"></i>
           </span>
           <span class="bs-stepper-label">Pricing</span>
         </button>
       </div>
       <div class="line"></div>
       <div class="step" data-target="#payment-part">
         <button type="button" class="step-trigger">
           <span class="bs-stepper-circle">
             <i class="bi bi-credit-card-2-back"></i>
           </span>
           <span class="bs-stepper-label">Payment</span>
         </button>
       </div>
       <div class="line"></div>
       <div class="step" data-target="#confirm-part">
         <button type="button" class="step-trigger">
           <span class="bs-stepper-circle">
             <i class="bi bi-check2-circle"></i>
           </span>
           <span class="bs-stepper-label">Confirmation</span>
         </button>
       </div>
      </div>

      <!-- CONTENT (VERTICAL SCROLL ONLY) -->
      <div class="bs-stepper-content flex-grow-1 overflow-auto mt-3">
        
        <div id="client-part" class="content">
          <?php include 'client.php'; ?>
        </div>

        <div id="event-part" class="content">
          <?php include 'event.php'; ?>
        </div>

        <div id="venue-part" class="content">
          <?php include 'venue.php'; ?>
        </div>

        <div id="pricing-part" class="content">
          <?php include 'pricing.php'; ?>
        </div>

        <div id="payment-part" class="content">
          <?php include 'payment.php'; ?>
        </div>

        <div id="confirm-part" class="content">
          <?php include 'confirmation.php'; ?>
        </div>

      </div>

    </div>
  </div>
</div>












<script>
  var stepper = new Stepper(document.querySelector('#stepper'))
  // Bind Next button
  document.getElementById('next-step').addEventListener('click', function () {
    stepper.next();
  });
</script>



<style>
  .bs-stepper-header {
    white-space: nowrap;
  }

  .bs-stepper-header .step {
    flex: 0 0 auto;
  }
  @media (max-width: 768px) {
    .bs-stepper-label {
      display: none;
    }
  }
</style>