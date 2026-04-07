<form id="frm-add-event-order">
  <div class="modal fade" id="mdl-add-eventoder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content border-0 shadow-lg rounded-4">
              <div class="modal-header border-0 pb-0 pt-4 px-4">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body p-0"> 
                <!-- Bootstrap Stepper Vertical Guideline -->
                <div class="bs-stepper vertical" id="stepper">
                  <div class="bs-stepper-header bg-light border-end p-4" style="min-width: 180px;">
                      <div class="mb-4">
                          <h6 class="fw-bold mb-0">New Event Order</h6>
                          <p class="text-muted small">Complete the sections below</p>
                      </div>
                      <div class="step" data-target="#step-1">
                          <button type="button" class="step-trigger" role="tab">
                              <span class="bs-stepper-circle text-lg">
                                <i class="bi bi-calendar-event"></i>
                              </span>
                              <span class="bs-stepper-label fw-bold">Event Info</span>
                          </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#step-2">
                          <button type="button" class="step-trigger" role="tab">
                              <span class="bs-stepper-circle text-lg">
                               <i class="bi bi-geo-alt"></i>
                              </span>
                              <span class="bs-stepper-label fw-bold">Venue</span>
                          </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#step-3">
                          <button type="button" class="step-trigger" role="tab">
                              <span class="bs-stepper-circle text-lg">
                               <i class="bi bi-layout-wtf"></i>
                              </span>
                              <span class="bs-stepper-label fw-bold">Decoration</span>
                          </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#step-4">
                          <button type="button" class="step-trigger" role="tab">
                              <span class="bs-stepper-circle text-lg">
                                <i class="bi bi-menu-up"></i>
                              </span>
                              <span class="bs-stepper-label fw-bold">Food Menu</span>
                          </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#step-5">
                          <button type="button" class="step-trigger" role="tab">
                              <span class="bs-stepper-circle text-lg">
                                <i class="bi bi-clipboard-check"></i>
                              </span>
                              <span class="bs-stepper-label fw-bold">Finalize</span>
                          </button>
                      </div>
                  </div>

                  <!-- Stepper Content -->
                 <div class="flex-grow-1 overflow-auto position-relative">
                     
                     <div class="step-page" id="step-1">
                         <div class="p-3">
                             <?php include 'step1.php'; ?>
                         </div>
                     </div>

                     <div class="step-page d-none" id="step-2">
                         <div class="p-3">
                             <?php include 'step2.php'; ?>
                         </div>
                     </div>

                     <div class="step-page d-none" id="step-3">
                      <div class="p-3">
                          <?php include 'step3.php'; ?>
                      </div>
                     </div>

                     <div class="step-page d-none" id="step-4">
                      <div class="p-3">
                          <?php include 'step4.php'; ?>
                      </div>
                     </div>

                     <div class="step-page d-none" id="step-5">
                      <div class="p-3">
                          <?php include 'step5.php'; ?>
                      </div>
                     </div>

                 </div>
              </div>

              <div class="modal-footer border-0 p-4 pt-0">
                <button type="button" class="btn btn-danger fw-semibold me-auto" data-bs-dismiss="modal">
                 <i class="bi bi-trash"></i> Discard
                </button>
                  <button id="btn-back" class="btn py-2 btn-secondary shadow fw-semibold d-none" type="button">
                     Back
                  </button>
                  <button id="btn-next" class="btn px-5 py-2 fw-bold btn-primary shadow" type="button"> 
                      Next
                  </button>
              </div>
          </div>
      </div>
  </div>
</form>

<!-- Initialize Stepper -->
<script>
$(document).ready(function () {

    let currentStep = 1;
    const totalSteps = 5;

    function showStep(step) {
        // hide all pages
        $('.step-page').addClass('d-none');

        // show current
        $('#step-' + step).removeClass('d-none');

        // BACK BUTTON
        if (step === 1) {
            $('#btn-back').addClass('d-none');
        } else {
            $('#btn-back').removeClass('d-none');
        }

        // NEXT BUTTON TEXT
        if (step === totalSteps) {
            $('#btn-next').text('Finish');
        } else {
            $('#btn-next').text('Next');
        }

        // update sidebar active state
        $('.step').removeClass('active');
        $('.step').eq(step - 1).addClass('active');
    }

    // INITIAL LOAD
    showStep(currentStep);

    // NEXT
    $('#btn-next').click(function () {

        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
        } else {
            // FINAL SUBMIT
            $('#frm-add-event-order').submit();
        }

    });

    // BACK
    $('#btn-back').click(function () {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    });

    // CLICK SIDEBAR (OPTIONAL NAVIGATION)
    $('.step').click(function () {
        let index = $(this).index('.step') + 1;
        currentStep = index;
        showStep(currentStep);
    });

});
</script>
<style>
  /* Base circle style */
  .bs-stepper-circle {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border: 2px solid #bf9b30; /* outline color changed to gold */
      border-radius: 50%;         
      background-color: #fff;     
      color: #bf9b30;             /* icon color matches outline */
      transition: all 0.3s ease;
  }

  /* Active or completed step */
  .bs-stepper .step.active .bs-stepper-circle,
  .bs-stepper .step.complete .bs-stepper-circle {
      background-color: #bf9b30; /* fill with gold on active/complete */
      color: #fff;               /* icon becomes white */
      border-color: #bf9b30;     
  }

  /* Hover effect */
  .bs-stepper .step .step-trigger:hover .bs-stepper-circle {
      background-color: #fff2d1; /* light gold hover effect */
      border-color: #bf9b30;
  }
</style>

