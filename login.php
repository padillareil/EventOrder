<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Grand Xing-Event Order</title>
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/sweetalert2/sweetalert2.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="icon" href="assets/image/logo/favicon.png">
</head>
<body style="background-color: #363636;">
  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-6 col-lg-4">
      <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex justify-content-center">
        <img src="assets/image/logo/GXingLogo.png" alt="Grand Xing Logo" style="border-radius: 50%; width: 300px; height: auto;">
        </div>
        <div class="text-center mb-4">
          <h5 style="color: #bf9b30;">Event Order</h5>
        </div>
        <form id="frm_login" style="max-width: 300px; width: 100%;">
          <div class="form-floating mb-3">
            <input type="text" name="Username" id="Username" class="form-control" required autocomplete="off">
            <label for="Username">Username</label>
          </div>
          <div class="form-floating mb-3 position-relative">
            <input type="password" name="Password" id="Password" class="form-control"  required>
            <label for="Password">Password</label>
            <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3" 
               id="togglePassword" style="cursor: pointer;"></i>
          </div>
          <div class="form-checks ml-4 mb-4">
            <input class="form-check-input" type="checkbox" id="save-login">
            <label class="form-check-label text-light" for="save-login">Remember me</label>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn text-white py-3" style="background-color: #bf9b30;">Sign In</button>
          </div>
          <div class="mt-3 text-center">
            <a href="#"><small>Need help?</small></a>
            <br>
            <small class="text-light">V0.1</small>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="assets/plugins/bootstrap/scripts/jquery.min.js"></script>
  <script src="assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="assets/js/adminlte.js"></script>
  <script src="assets/js/global-scripts.js"></script>
  <script src="assets/js/login.js"></script>
</body>
</html>

  
