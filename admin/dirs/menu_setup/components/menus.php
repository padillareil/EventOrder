<nav class="navbar bg-body-light">
  <div class="container-fluid">
    <div class="d-flex align-items-center px-2 py-3 overflow-auto hide-scrollbar">
        <ul class="nav nav-pills flex-nowrap gap-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-pill px-5 py-2 fw-bold small border border-info" data-bs-toggle="pill" data-bs-target="#Appetizers" type="button">Appetizers</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-3 py-2 fw-bold small border border-info" data-bs-toggle="pill" type="button" data-bs-target="#Beverages">Beverages</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-3 py-2 fw-bold small border border-info" data-bs-toggle="pill" type="button" data-bs-target="#Breakfast">Breakfast</button>
            </li>
         
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-3 py-2 fw-bold small border border-info" data-bs-toggle="pill" type="button" data-bs-target="#Desserts">Desserts</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link rounded-pill px-3 py-2 fw-bold small border border-info" data-bs-toggle="pill" type="button" data-bs-target="#MainCourse">Main Course</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-3 py-2 fw-bold small border border-info" data-bs-toggle="pill" type="button" data-bs-target="#Pastry">Pastry</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-3 py-2 fw-bold small border border-info" data-bs-toggle="pill" type="button" data-bs-target="#Pasta">Pasta</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-3 py-2 fw-bold small border border-info" data-bs-toggle="pill" data-bs-target="#Salads" type="button">Salads</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-3 py-2 fw-bold small border border-info" data-bs-toggle="pill" type="button" data-bs-target="#Snacks">Snacks</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-3 py-2 fw-bold small border border-info" data-bs-toggle="pill" type="button" data-bs-target="#Soup">Soup</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-3 py-2 fw-bold small border border-info" data-bs-toggle="pill" type="button" data-bs-target="#Vegetable">Vegetable</button>
            </li>
        </ul>
    </div>
  </div>
</nav>

<form id="frm-add-package">
  
            <div class="tab-content mt-2" id="foodMenuContent">
                <div class="tab-pane fade show active" id="Appetizers" role="tabpanel">
                    <?php include 'menu_sorting/appetizer.php'; ?>
                </div>
                <div class="tab-pane fade" id="MainCourse" role="tabpanel">
                    <?php include 'menu_sorting/maincourse.php'; ?>
                </div>
                <div class="tab-pane fade show" id="Salads" role="tabpanel">
                    <?php include 'menu_sorting/salads.php'; ?>
                </div>
                <div class="tab-pane fade" id="Desserts" role="tabpanel">
                    <?php include 'menu_sorting/desserts.php'; ?>
                </div>
                <div class="tab-pane fade" id="Beverages" role="tabpanel">
                    <?php include 'menu_sorting/beverages.php'; ?>
                </div>
                <div class="tab-pane fade show" id="Pastry" role="tabpanel">
                    <?php include 'menu_sorting/pastry.php'; ?>
                </div>
                <div class="tab-pane fade" id="Breakfast" role="tabpanel">
                    <?php include 'menu_sorting/breakfast.php'; ?>
                </div>
                <div class="tab-pane fade" id="Snacks" role="tabpanel">
                    <?php include 'menu_sorting/snacks.php'; ?>
                </div>
                <div class="tab-pane fade" id="Pasta" role="tabpanel">
                    <?php include 'menu_sorting/pasta.php'; ?>
                </div>
                <div class="tab-pane fade" id="Soup" role="tabpanel">
                    <?php include 'menu_sorting/soup.php'; ?>
                </div>
                <div class="tab-pane fade" id="Vegetable" role="tabpanel">
                    <?php include 'menu_sorting/vegetable.php'; ?>
                </div>
            </div>
</form>





<style>
    /* Base Card */
    .selection-card {
        border: 1px solid #e9ecef !important;
        background-color: #ffffff;
        cursor: pointer;
        transition: all 0.25s ease-in-out;
    }

    /* Hover State */
    .selection-card:hover {
        background-color: #f8f9fa !important;
        transform: translateY(-3px);
    }

    /* THE SUCCESS STATE (When Checked) */
    .btn-check:checked + .selection-card {
        background-color: #f1fdf7 !important; /* Very light success green */
        border-color: #198754 !important;      /* Bootstrap Success Green */
        box-shadow: 0 4px 12px rgba(25, 135, 84, 0.15) !important;
    }

    /* Text and Icon Logic */
    .check-icon { display: none; }
    .btn-check:checked + .selection-card .check-icon { display: block; }
    .btn-check:checked + .selection-card .uncheck-icon { display: none; }

    /* Change item name to green when selected */
    .btn-check:checked + .selection-card .item-name {
        color: #198754 !important;
    }

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


<!-- 
<script>
function handleAddNewMenu() {
    // You can trigger a Modal or a SweetAlert here
    console.log("Open custom menu input...");
    alert("Triggering Custom Menu Modal!");
}




  /*Filter Menu*/
  $("#search_food_menu").on("keydown", function (e) {
      if (e.key === "Enter") {
          loadFoodMenusList();
      }
  });
  
  $("#filter_menus").on("change", function () {
      loadFoodMenusList();
  });

</script> -->