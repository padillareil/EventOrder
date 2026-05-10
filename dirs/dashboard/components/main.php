<div class="container-fluid px-lg-5">
  <nav class="navbar navbar-expand-lg sticky-top py-3 mb-2" id="navbar-menu">
    <div class="container-fluid px-lg-5">
      <ul class="navbar-nav nav-underline flex-row flex-nowrap me-auto fw-semibold" id="menu-list">
        <li class="nav-item me-3">
          <a class="nav-link active" href="#" data-menu="overview">Overview</a>
        </li>
        <!-- <li class="nav-item me-3">
          <a class="nav-link text-secondary" href="#" data-menu="pencil" onclick="mdlPencilBook()">Pencil Book</a>
        </li> -->

        <li class="nav-item dropdown me-3">
          <a class="nav-link dropdown-toggle" href="#" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Pencil Book Forms
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="nav-link dropdown-item" href="#" onclick="mdlPencilBook()">Form 1</a>
            </li>
            <li>
              <a class="nav-link dropdown-item" href="#" onclick="mdlForm2()">Form 2</a>
            </li>
          </ul>
        </li>

        <li class="nav-item me-3">
          <a class="nav-link" href="#" data-menu="reservation">Bookings</a>
        </li>
        <li class="nav-item dropdown me-3">
          <a class="nav-link dropdown-toggle" href="#" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Events
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="nav-link dropdown-item" href="#" data-menu="event_packages">Event Packages</a>
            </li>
            <li>
              <a class="nav-link dropdown-item" href="#" data-menu="event_list">Event List</a>
            </li>
          </ul>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link" href="#" data-menu="performance">Performance</a>
        </li>

      </ul>

    </div>

  </nav>
  <!-- <div class="row g-3 mb-3">
    <div class="col-md-4">
      <div class="card border-0 rounded-4 p-3">
        <div class="d-flex align-items-center">
          <div class=" bg-opacity-10 p-3 rounded-3 me-3">
            <i class="bi bi-people text-primary fs-4"></i>
          </div>
          <div>
            <p class="text-muted small mb-0 fw-bold text-uppercase">Engagers</p>
            <h3 class="fw-bold mb-0">5</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 rounded-4 p-3">
        <div class="d-flex align-items-center">
          <div class="bg-opacity-10 p-3 rounded-3 me-3">
            <i class="bi bi-file-earmark-text text-primary fs-4"></i>
          </div>
          <div>
            <p class="text-muted small mb-0 fw-bold text-uppercase">Event Orders</p>
            <h3 class="fw-bold mb-0">5</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 rounded-4 p-3">
        <div class="d-flex align-items-center">
          <div class="bg-opacity-10 p-3 rounded-3 me-3">
            <i class="bi bi-calendar-check text-primary fs-4"></i>
          </div>
          <div>
            <p class="text-muted small mb-0 fw-bold text-uppercase">Bookings</p>
            <h3 class="fw-bold mb-0">5</h3>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <div id="display-content"></div>
</div>





<script>
  $(document).ready(function () {

    var $menu = $("#menu-list");
    var $content = $("#display-content");
    var $title = $("#main-title");
    let currentRequest = null;
    var MENU_CONFIG = {
      overview: {
        title: "",
        file: "dirs/dashboard/components/overview.php",
        onLoad: function () {
        }
      },
      reservation: {
        title: "",
        file: "dirs/dashboard/components/reservation.php"
      },
      event_list: {
        title: "",
        file: "dirs/dashboard/components/event_list.php"
      },
      event_packages: {
        title: "",
        file: "dirs/dashboard/components/event_packages.php"
      },
      performance: {
        title: "",
        file: "dirs/dashboard/components/performance.php"
      }
    };

    function spinner() {
      return `
        <div class="d-flex flex-column justify-content-center align-items-center" style="height:60vh;">
          <div class="spinner-border text-dark"></div>
          <p class="mt-2 text-secondary small">Loading...</p>
        </div>
      `;
    }

    function loadContent($el) {
      var menu = $el.data("menu");
      var config = MENU_CONFIG[menu];
      if (!config) return;
      if (currentRequest) {
        currentRequest.abort();
      }
      $menu.find(".nav-link")
        .removeClass("active");

      $el.addClass("active");
      $title.hide().text(config.title || "").fadeIn(150);
      $content.html(spinner());
      currentRequest = $.ajax({
        url: config.file,
        type: "POST",
        success: function (data) {
          $content.hide().html(data).fadeIn(200);
        },
        error: function () {
          $content.html(`
            <div class="text-center py-5 text-danger">
              Failed to load content.
            </div>
          `);
        },
        complete: function () {
          currentRequest = null;
        }
      });
    }
    $menu.on("click", ".nav-link", function (e) {
      e.preventDefault();
      loadContent($(this));
    });
    const $default = $menu.find(".nav-link.active").first();
    if ($default.length) {
      loadContent($default);
    }
  });
  </script>