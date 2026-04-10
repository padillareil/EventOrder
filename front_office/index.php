<?php
require_once "../config/connection.php";
require_once "../config/functions.php";
session_start();


if (!isset($_SESSION['Uid'])) {
    header('Location: ../login.php');
    exit();
}
$User = $_SESSION['Uid'];

try {
    $ua = $conn->prepare("EXEC dbo.[Session_User_Account] ?");
    $ua->execute([$User]);
    $user = $ua->fetch(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
    echo "<b>Database Error:</b> " . htmlspecialchars($e->getMessage());
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Front Office</title>
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/jquery-ui/jquery-ui.theme.css">
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/pace/themes/gold/pace-theme-minimal.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/jsgrid/jsgrid-theme.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/jsgrid/jsgrid-theme.css">

    <link rel="stylesheet" type="text/css" href="../assets/plugins/fullcalendar/main.css">
<link rel="stylesheet" type="text/css" href="../assets/plugins/driver.js/dist/driver.css">

  <link rel="stylesheet" href="../assets/css/datatables.min.css">
  <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="../assets/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-lite.min.css">
  <link rel="stylesheet" href="../assets/plugins/datepicker/jquery-ui.structure.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- <link rel="stylesheet" type="text/css" href="../assets/css/logout.css"> -->
  <link rel="stylesheet" type="text/css" href="../assets/css/skeleton.css">
  <link rel="icon" href="../assets/image/logo/favicon.png">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- <nav class="main-header navbar navbar-expand bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item text-info">
                    <a href="#" class="nav-link text-center">
                        <i class="bi bi-clock ml-4"></i>
                        <strong class="ml-2">
                            <span id="clock"></span>
                            <input type="hidden" id="clockvalue">
                        </strong>
                    </a>
                </li>
            </ul>
        </nav> -->
        <nav class="main-header navbar navbar-expand bg-light border-bottom">
            <ul class="navbar-nav w-100">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="btn-toggle-sidebar"><i class="fas fa-bars"></i></a>
                </li>

                <li class="nav-item text-info">
                    <a href="#" class="nav-link text-center" onclick="startHelpTour()">
                        <i class="bi bi-clock ml-4"></i>
                        <strong class="ml-2">
                            <span id="clock"></span>
                            <input type="hidden" id="clockvalue">
                        </strong>
                    </a>
                </li>

                <li class="nav-item dropdown ms-auto pe-3" id="notif-bell">
                    <a class="nav-link position-relative" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="bi bi-bell"></i>
                        <span class="position-absolute top-1 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-0 p-0 mt-2" style="width: 320px;" id="notify-dropdown">
                        <div class="p-3 border-bottom bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="fw-bold m-0" style="font-size: 0.8rem; letter-spacing: 0.5px;">NOTIFICATIONS UPDATES</h6>
                                <span class="badge bg-dark rounded-0" style="font-size: 0.6rem;">3 NEW</span>
                            </div>
                        </div>

                        <div class="list-group list-group-flush" style="max-height: 350px; overflow-y: auto;" >
                            
                            <a href="#" class="list-group-item list-group-item-action border-bottom p-3" onclick="loadEOTesting()">
                                <p class="small m-0 text-muted mb-1 text-uppercase fw-bold" style="font-size: 0.65rem;">[ APPROVAL ]</p>
                                <p class="small m-0 text-dark fw-bold">EO #10001 HAS BEEN APPROVED</p>
                                <p class="small m-0 text-muted mt-1">Level 2 signature verified by Financial Dept.</p>
                                <p class="text-muted mt-1 m-0" style="font-size: 0.6rem;">2 minutes ago</p>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action border-bottom p-3 bg-light-subtle">
                                <p class="small m-0 text-muted mb-1 text-uppercase fw-bold" style="font-size: 0.65rem;">[ AMENDMENT ]</p>
                                <p class="small m-0 text-dark fw-bold">EO #09842 PAX CHANGE</p>
                                <p class="small m-0 text-muted mt-1">Kitchen notified of update (+20 pax).</p>
                                <p class="text-muted mt-1 m-0" style="font-size: 0.6rem;">1 hour ago</p>
                            </a>
                        </div>

                        <a href="#" class="d-block text-center py-2 bg-light text-decoration-none text-dark fw-bold border-top" style="font-size: 0.7rem; letter-spacing: 1px;">
                            View All Event Updates
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-secondary elevation-4">
            <p class="text-center brand-link">
                <a href="index.php" style="text-decoration: none; color: inherit;">
                    <img src="../assets/image/logo/favicon.png" alt="User Logo" id="profile-image"style="width: 100px; height: 100px; object-fit: cover;">
                    <br>
                </a>
                <br>Front Office

            </p>

            <div class="sidebar">
                <nav id="main-menu" class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <p class="text-muted">Menu</p>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active" name="menu" menucode="calendar_events" id="menu-calendar">
                                <i class="nva-icon bi bi-calendar2-event"></i>
                                <p>Hotel Event</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" name="menu" menucode="ammendment" id="menu-amendment">
                                <i class="nav-icon bi bi-card-checklist"></i>
                                <p>Ammendment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" name="menu" menucode="eventorder" id="menu-eventorder">
                                <i class="nav-icon bi bi-clipboard2-check"></i>
                                <p>Event Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <p class="text-muted">Account</p>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" name="menu" menucode="settings"  id="menu-settings">
                                <i class="nav-icon i bi-gear"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="showHelp()">
                                <i class="nav-icon bi bi-info-circle"></i>
                                <p>Help</p>
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="dialogLogout()">
                                <i class="nav-icon bi bi-box-arrow-right text-danger"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
    </div>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h4 class="m-0 text-bold" id="main-title"></h4>
            </div>
          </div>
        </div>
      </div>
      <section class="content">
        <div class="container-fluid" id="main-content"></div>
      </section>
    </div>
    <footer class="main-footer">
        <small>Grand Xing-Event Order v0.1.</small>
        <span id="current-year"></span>
        <div class="float-right d-none d-sm-inline-block">
        </div>
    </footer>
</div>


<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/plugins/toastr/toastr.min.js"></script>
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<script src="../assets/plugins/moment/moment.min.js"></script>

<!-- <script src="../assets/plugins/fullcalendar/main.min.js"></script> -->

<script src="../assets/plugins/driver.js/dist/driver.js.iife.js"></script>

<script src="../assets/plugins/pace/pace.min.js"></script>
<script src="../assets/plugins/jsgrid/jsgrid.min.js"></script>
<script src="../assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../assets/plugins/datatables/datatables.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../assets/plugins/summernote/summernote-lite.min.js"></script>
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../assets/plugins/elevatezoom-plus-master/src/jquery.ez-plus.js"></script>
<script src="../assets/js/adminlte.js"></script>
<script src="../assets/js/global-scripts.js"></script>
<script src="../assets/js/datatables.min.js"></script>
<script src="../assets/plugins/datepicker/jquery-ui.min.js"></script>
<script src="script/script.js"></script>
<script src="script/driver_guide.js"></script>
<?php include 'modal.php';?>
</body>
</html>


<style>
.btn-yes {
    background-color: #363636 !important;
    color: white !important;
}
.btn-no {
    background-color: black !important;
    color: white !important;
}
</style>



