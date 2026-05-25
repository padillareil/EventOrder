<form id="frm-upload-profile">
  <div class="modal fade" id="mdl-upload-profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
      <div class="modal-content border-0 shadow-lg rounded-4">
        <div class="modal-header border-0 pt-4 px-4 pb-0">
          <h5 class="modal-title fw-bold text-dark fs-7">Profile Setup</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4 text-center">
          <div class="position-relative d-inline-block my-4">
            <div id="avatar-preview-box" class="bg-light rounded-circle border d-flex align-items-center justify-content-center shadow-sm mx-auto overflow-hidden" 
                 style="width: 130px; height: 130px; border-width: 3px !important; cursor: pointer;" 
                 onclick="triggerProfileFileInput()">
                <i id="avatar-icon-placeholder" class="bi bi-person text-secondary fs-1"></i>
                <img id="img-avatar-preview" class="w-100 h-100 object-fit-cover d-none" src="../assets/image/uploads/noimage.avif" alt="Profile Image Target">
                
            </div>
            <button type="button" class="btn btn-dark btn-sm rounded-circle p-0 position-absolute d-flex align-items-center justify-content-center shadow" 
                    style="width: 34px; height: 34px; bottom: 2px; right: 2px; border: 2px solid #ffffff;" 
                    onclick="triggerProfileFileInput()">
                <i class="bi bi-camera-fill" style="font-size: 13px;"></i>
            </button>
            <input type="file" id="inp-profile-avatar" accept=".jpg, .jpeg, .png" class="d-none">
          </div>
          
        </div>
        
        <div class="modal-footer border-0 px-4 pb-4 pt-2">
          <button type="submit" id="btn-submit-profile" class="btn btn-dark px-4 py-2 rounded-3 fw-medium shadow-sm w-100 mb-2">
            <span class="spinner-border spinner-border-sm d-none me-2" id="btn-spinner-profile"></span>
            <span class="btn-text-profile">Save Changes</span>
          </button>
          <button class="btn btn-light border text-secondary px-4 py-2 rounded-3 fw-medium w-100" type="reset" data-bs-dismiss="modal" id="btn-cancel-profile">
            Cancel
          </button>
        </div>
        
      </div>
    </div>
  </div>
</form>

<script>
  // Triggers the hidden file click node when the user hits the circle container or camera badge
  function triggerProfileFileInput() {
      document.getElementById('inp-profile-avatar').click();
  }

  // Monitors file selection changes and loads the image directly into your circular frame
  document.getElementById('inp-profile-avatar').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
          if (!file.type.startsWith('image/')) {
              Swal.fire({
                  toast: true,
                  position: "top-end",
                  icon: "info",
                  title: "Sorry, image format is not supported.",
                  showConfirmButton: false,
                  timer: 2000,
                  timerProgressBar: true
              });
              return;
          }

          const reader = new FileReader();
          reader.onload = function(e) {
              const imgPreview = document.getElementById('img-avatar-preview');
              const iconPlaceholder = document.getElementById('avatar-icon-placeholder');
              imgPreview.src = e.target.result;
              imgPreview.classList.remove('d-none');
              iconPlaceholder.classList.add('d-none');
          };
          reader.readAsDataURL(file);
      }
  });

  // Resets modal field view layout logic instances back to default when closed
  document.getElementById('mdl-upload-profile').addEventListener('hidden.bs.modal', function () {
      document.getElementById('frm-upload-profile').reset();
      document.getElementById('img-avatar-preview').src = '';
      document.getElementById('img-avatar-preview').classList.add('d-none');
      document.getElementById('avatar-icon-placeholder').classList.remove('d-none');
  });


  $("#frm-upload-profile").submit(function(event) {
      event.preventDefault();

      let fileInput = $("#inp-profile-avatar")[0];
      let formData = new FormData();
      
      // Check if a file actually exists, then append it using the 'ProfileImage' key
      if (fileInput.files.length > 0) {
          formData.append("ProfileImage", fileInput.files[0]);
      } else {
          Swal.fire({
              icon: "warning",
              title: "Hold on",
              text: "Please select an image file to upload first.",
              confirmButtonText: "OK"
          });
          return;
      }

      // Map UI Button and Spinner elements
      let $btnSubmit = $("#btn-submit-profile");
      let $btnCancel = $("#btn-cancel-profile");
      let $spinner = $("#btn-spinner-profile");
      let $text = $btnSubmit.find(".btn-text-profile");

      // Toggle loading states
      $btnSubmit.prop("disabled", true);
      $btnCancel.prop("disabled", true);
      $spinner.removeClass("d-none");
      $text.text("Saving...");

      $.ajax({
          url: "dirs/settings/actions/update_profile.php",
          type: "POST",
          data: formData,
          contentType: false, // Prevents jQuery from overriding header rules
          processData: false, // Prevents jQuery from turning the file into a text string
          success: function(data) {
              $btnSubmit.prop("disabled", false);
              $btnCancel.prop("disabled", false);
              $spinner.addClass("d-none");
              $text.text("Upload");

              if ($.trim(data) === "success") {
                  $("#frm-upload-profile")[0].reset();
                  $("#mdl-upload-profile").modal("hide");

                  loadSettings();
                  Swal.fire({
                      toast: true,
                      position: "top-end",
                      icon: "success",
                      title: "Great! New profile uploaded.",
                      showConfirmButton: false,
                      timer: 2000,
                      timerProgressBar: true
                  });
              } else {
                  Swal.fire({
                      icon: "error",
                      title: "Oops!",
                      text: data,
                      confirmButtonText: "OK"
                  });
              }
          },
          error: function() {
              $btnSubmit.prop("disabled", false);
              $btnCancel.prop("disabled", false);
              $spinner.addClass("d-none");
              $text.text("Upload");
              
              Swal.fire({
                  icon: "error",
                  title: "Network Failure",
                  text: "An error occurred while communicating with the server.",
                  confirmButtonText: "OK"
              });
          }
      });
  });
</script>