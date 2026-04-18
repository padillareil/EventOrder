    <!-- Nav Tools -->
  <nav class="navbar bg-light shadow-lg border-bottom px-3 py-2">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <div class="nav d-flex align-items-center">
        <a href="#" class="nav-link fw-bold px-3 border-end" onclick="loadMenuPackage()">
           Back
        </a>
      </div>
    </div>
</nav>


<form id="frm-add-package">
  <div class="card shadow-sm border-0 rounded-4 m-3">
    <div class="card-body px-4 py-4">
      <div class="row g-4">
        <div class="col-md-4">
            <!-- Event Name -->
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark small">Package</label>
              <input type="text" class="form-control py-2 px-3 shadow-none" id="event-name" required>
            </div>
            <!-- Engager Category -->
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark small">Engager Category</label>
              <select class="form-select py-2 px-3" id="engager-category" required>
                <option selected value="">Select Category</option>
                <option>Association & Organizations</option>
                <option>Corporate</option>
                <option>Educational Institutions</option>
                <option>Government</option>
                <option>Health Care</option>
                <option>Private Groups</option>
                <option>Tourism & Travel</option>
              </select>
            </div>
            <!-- Per Pax Amount -->
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark small">Per Pax Amount</label>
              <div class="input-group">
                <span class="input-group-text text-muted">₱</span>
                <input type="number" id="pax-amount" class="form-control py-2 shadow-none" placeholder="0.00" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark small">Inclusion</label>
              <textarea class="form-control h-100" required id="event-inclusion"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark small">Payment Arrangement</label>
              <textarea class="form-control h-100" required id="event-payment-arrangement"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold text-dark small">Note</label>
              <textarea class="form-control h-100" required id="event-note"></textarea>
            </div>
        </div>

        <!-- RIGHT: MODULES -->
        <div class="col-md-8 overflow-auto" style="height: 55vh;">

          <div id="food-event-menulist"></div>
         

        </div>

      </div>

    </div>

    <div class="card-footer">
        <button id="btn-submit-package" class="btn btn-success shadow-sm" type="submit">
          <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-submit-package"></span>
          <span class="btn-text-package">Save</span>
        </button>
        <button id="btn-update-package" class="btn btn-success shadow-sm d-none mr-3" type="button">
          <span class="btn-text-update">Update</span>
          <span id="btn-spinner-update" class="spinner-border spinner-border-sm ms-2 d-none"></span>
        </button>
        <button id="btn-clear-package" class="btn btn-danger shadow-sm" type="reset">
          <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-clear"></span>
          <span class="btn-text-clear">Clear</span>
        </button>
    </div>
  </div>
</form>



<style>
  /* base row */
  .selection-row {
      cursor: pointer;
      transition: all 0.2s ease;
      border: 1px solid transparent;
      border-radius: 0.5rem;
  }

  /* hover */
  .selection-row:hover {
      background-color: #f8f9fa;
  }

  /* ✅ selected style (Grab-inspired) */
  .selection-row.active {
      border: 1.5px solid #28a745;
      background-color: #f6fff8; /* very light green */
  }

  /* text stays clean but slightly emphasized */
  .selection-row.active .fw-semibold {
      color: #155724;
  }

  /* checkbox accent */
  .selection-row.active .form-check-input {
      border-color: #28a745;
  }


</style>


<script>
    $(document).on("change", ".form-check-input", function () {
        let row = $(this).closest(".selection-row");
        row.toggleClass("active", this.checked);
    });

    /*Function create a Package*/
    $("#frm-add-package").submit(function (event) {
        event.preventDefault();
        var $btnSubmit = $("#btn-submit-package");
        var $spinner = $("#btn-spinner-submit-package");
        var $text = $btnSubmit.find(".btn-text-package");
        var $btnClear = $("#btn-clear-package");
        var EventName = $("#event-name").val();
        var EngagerCategory = $("#engager-category").val();
        var PaxAmount = $("#pax-amount").val();
        var Inclusion = $("#event-inclusion").val();
        var PaymentArrangement = $("#event-payment-arrangement").val();
        var Note = $("#event-note").val();
        var Menus = [];
        $("input[name='menu-variant']:checked").each(function () {
            Menus.push($(this).val());
        });

        if (Menus.length === 0) {
            Swal.fire({
                icon: "warning",
                title: "No Menu Selected",
                text: "Please select a menu before saving."
            });
            return; 
        }
        $btnSubmit.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");
        $btnClear.prop("disabled", true);

        $.post("dirs/menu_setup/actions/save_create_package.php", {
            EventName: EventName,
            EngagerCategory: EngagerCategory,
            PaxAmount: PaxAmount,
            Inclusion: Inclusion,
            PaymentArrangement: PaymentArrangement,
            Note: Note,
            Menus: Menus
        }, function (data) {
            $btnSubmit.prop("disabled", false);
            $btnClear.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if ($.trim(data) == "OK") {
                $("#frm-add-package")[0].reset();
                loadMenuPackage();
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Venue Package",
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
        });
    });

    /*Function to clear the higlkighted selected green*/
    $("#btn-clear-package").on("click", function () {
        $("input[name='menu-variant']").prop("checked", false);
        $(".selection-row").removeClass("active");
    });



























    
    /*Function to save as draft the unfinished events*/ 
    /*$("#btn-clear-package").on("click", function () {

    let $btnSubmit = $("#btn-submit-package");
    let $spinner = $("#btn-spinner-submit-package");
    let $text = $btnSubmit.find(".btn-text-package");

    let $btnDraft = $("#btn-clear-package");
    let $btnClear = $("#btn-clear-package"); // ✅ FIXED (was duplicate)

    let EventName = $("#event-name").val();
    let EngagerCategory = $("#engager-category").val();
    let PaxAmount = $("#pax-amount").val();
    let Inclusion = $("#event-inclusion").val();
    let PaymentArrangement = $("#event-payment-arrangement").val();
    let Note = $("#event-note").val();

    let Menus = [];
    $("input[name='menu-variant']:checked").each(function () {
        Menus.push($(this).val());
    });

    if (Menus.length === 0) {
        Swal.fire({
            icon: "warning",
            title: "No Menu Selected",
            text: "Please select at least one menu before saving draft."
        });
        return;
    }

    // UI loading state
    $btnSubmit.prop("disabled", true);
    $spinner.removeClass("d-none");
    $text.text("Saving Draft...");

    $btnDraft.prop("disabled", true);
    $btnClear.prop("disabled", true);

    $.post("dirs/menu_setup/actions/save_package_draft.php", {
        EventName: EventName,
        EngagerCategory: EngagerCategory,
        PaxAmount: PaxAmount,
        Inclusion: Inclusion,
        PaymentArrangement: PaymentArrangement,
        Note: Note,
        Menus: Menus
    }, function (data) {

        $btnSubmit.prop("disabled", false);
        $btnDraft.prop("disabled", false);
        $btnClear.prop("disabled", false);

        $spinner.addClass("d-none");
        $text.text("Save");
        if ($.trim(data) == "OK") {
            $("#frm-add-package")[0].reset();
            createPackage();
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "success",
                title: "Successfully Saved",
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
    });
});*/
</script>










<style>
    /* Solid Base Theme */
    .modern-solid-offcanvas {
      background-color: #28282B !important;
      border-right: 1px solid #3f3f46 !important; /* Slightly lighter border for definition */
      color: #e4e4e7;
      width: 380px !important;
    }

    /* Header Styling */
    .modern-solid-offcanvas .offcanvas-header {
      border-color: #3f3f46 !important;
    }

    .draft-icon-box {
      background: #3f3f46;
      color: #6366f1;
      padding: 8px 12px;
      border-radius: 10px;
      font-size: 1.1rem;
    }

    /* Search Input Styling */
    .search-container .input-group {
      background: #1e1e20; /* Slightly darker than base for contrast */
      border-radius: 8px;
      border: 1px solid #3f3f46;
    }

    .search-container .form-control, 
    .search-container .input-group-text {
      border: none;
      color: white;
      font-size: 0.9rem;
    }

    .search-container .form-control:focus {
      box-shadow: none;
      background: transparent;
      color: white;
    }

    /* Solid Draft Card */
    .solid-draft-item {
      background: #323235; /* Slightly lighter than #28282B to stand out */
      border: 1px solid #3f3f46;
      border-radius: 12px;
      padding: 14px;
      transition: transform 0.2s, background 0.2s;
      cursor: pointer;
    }

    /* Internal Card Typography */
    .item-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-top: 1px solid #3f3f46;
      padding-top: 10px;
      margin-top: 10px;
    }

    .tiny-text {
      font-size: 0.65rem;
      letter-spacing: 0.5px;
      padding: 4px 8px;
    }

    .line-clamp-1 {
      display: -webkit-box;
      -webkit-line-clamp: 1;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }
</style>