<!-- Modal Hotel Form -->
<form id="frm-add-functionroom">
    <div class="modal fade" id="mdl-add-functionroom" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="functionroom-title">New Function Room</h5>
                        <p class="text-muted small mb-0" id="functionroom-info">Add a hotel function room to master data list.</p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="functionroom-id">
                    <div class="row g-3">
                        <div class="mb-2">
                          <label class="form-label fw-bold text-uppercase text-muted small">Function Room</label>
                          <input type="text" class="form-control" name="functionroom-name" id="functionroom-name" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Hotel Wing</label>
                            <input type="text" class="form-control" name="functionroom-hotelwing" id="functionroom-hotelwing" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Floor Level</label>
                            <input type="text" class="form-control" name="functionroom-floorlvl" id="functionroom-floorlvl" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">
                                    Max Capacity
                                </label>
                                <input type="number" class="form-control" name="functionroom-maxcapacity" id="functionroom-maxcapacity" required
                                >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">
                                    Unit of Measurement
                                </label>
                                <select class="form-select" id="unit-of-measurement" required>
                                    <option value="" disabled selected>---</option>
                                    <option value="Pax">Pax</option>
                                    <option value="Seats">Seats</option>
                                    <option value="Tables">Tables</option>
                                    <option value="Sqm">Square Meters</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-2">
                          <label class="form-label fw-semibold text-dark small">Rental Fee</label>
                          <div class="input-group">
                            <span class="input-group-text text-muted">₱</span>
                            <input type="text" id="functionroom-price" class="form-control number-format py-2 shadow-none" placeholder="0.00" required>
                          </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">Note</label>
                            <textarea class="form-control" id="functionroom-note" name="functionroom-note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="justify-content-end d-flex gap-2">
                     <button id="btn-submit-functionroom" class="btn btn-success shadow-sm" type="submit">
                       <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-functionroom"></span>
                       <span class="btn-text-functionroom">Save</span>
                     </button>
                     <button id="btn-update-functionroom" class="btn btn-success shadow-sm d-none" type="button">
                       <span class="btn-text-functionroom">Update</span>
                       <span id="btn-spinner-functionroom-upd" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                     </button>
                      <button class="btn btn-secondary  shadow-sm btn-sm" data-bs-dismiss="modal" type="reset" id="btn-cancel-functionroom">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $("#frm-add-functionroom").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-functionroom");
        let $btnCancel = $("#btn-cancel-functionroom");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-functionroom");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");

        var Functionroom  = $("#functionroom-name").val();
        var Wing   = $("#functionroom-hotelwing").val();
        var FloorLvl  = $("#functionroom-floorlvl").val();
        var Capacity  = $("#functionroom-maxcapacity").val();
        var Uom  = $("#unit-of-measurement").val();
        var RentalFee  = $("#functionroom-price").val();
        var Note  = $("#functionroom-note").val();


        $.post("dirs/hotel_room/actions/save_hotel_room.php", {
            Functionroom: Functionroom,
            Wing: Wing,
            FloorLvl: FloorLvl,
            Capacity: Capacity,
            Uom: Uom,
            RentalFee: RentalFee,
            Note: Note,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                loadHotelRooms();
                $text.text("Create Function Room");
                $("#frm-add-functionroom")[0].reset();
                $("#mdl-add-functionroom").modal('hide');
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New Function room added.",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });

            }else{
               Swal.fire({
                 icon: "error",
                 title: "Oops!",
                 text: data,
                 confirmButtonText: "OK"
               });
            }
        });
    });


    $("#btn-update-functionroom").on("click", function () {
        let $btnSubmit = $("#btn-update-functionroom");
        let $spinner = $("#btn-spinner-functionroom");
        let $text = $btnSubmit.find(".btn-text-functionroom");
        let $btnClose = $("#btn-cancel-functionroom");

        var Functionid = $("#functionroom-id").val();
        var FuncRoom  = $("#functionroom-name").val();
        var FloorLevel  = $("#functionroom-floorlvl").val();
        var UnitMeasurement = $("#unit-of-measurement").val();
        var MaxxCapacity  = $("#functionroom-maxcapacity").val();
        var FeeRent  = $("#functionroom-price").val();
        var FuncNote  = $("#functionroom-note").val();
        var HotelWing  = $("#functionroom-hotelwing").val();


        $btnSubmit.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Updating...");
        $btnClose.prop("disabled", true);

        $.post("dirs/hotel_room/actions/update_function_room.php", {

            Functionid: Functionid,
            FuncRoom: FuncRoom,
            FloorLevel: FloorLevel,
            UnitMeasurement: UnitMeasurement,
            MaxxCapacity: MaxxCapacity, 
            FeeRent: FeeRent,
            FuncNote :FuncNote,
            HotelWing :HotelWing,
        }, function (data) {

            $btnSubmit.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Updating...");
            $btnClose.prop("disabled", false);

            if ($.trim(data) === "success") {
                $text.text("Update");
                loadHotelRooms();
                $("#frm-add-functionroom")[0].reset();
                $("#mdl-add-functionroom").modal("hide");

                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "Successfully Updated",
                    showConfirmButton: false,
                    timer: 2000
                });

            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops!",
                    text: data
                });
            }
        });
    });


</script>


<!-- Modal Hotel Function Partition rooms -->
    <div class="modal fade" id="mdl-partition-rooms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="functionroom-title-table"></h5>
                        <p class="text-muted small mb-0" id="functionroom-info">Partition room lists.</p>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="functionroom-display-id"><!-- Mother Hotel Room id -->
                    <div class="card shadow-sm">
                        <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
                            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                                
                                <div class="input-group border bg-light px-3" style="max-width: 300px;">
                                    <span class="input-group-text bg-transparent border-0 p-0 me-2">
                                        <i class="bi bi-search text-muted small"></i>
                                    </span>
                                    <input type="search" class="form-control bg-transparent border-0 small py-2 shadow-none" id="search-partition-room" placeholder="Search rooms...">
                                </div>

                                <button class="btn btn-primary px-4 shadow-sm d-flex align-items-center justify-content-center" type="button" onclick="loadFunctionRoom__Partition()">
                                    <i class="bi bi-arrow-clockwise me-2"></i>
                                    <span class="small text-uppercase">Refresh</span>
                                </button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive overflow-auto" style="height: 50vh;">
                               <table class="table table-hover align-middle mb-0">
                                   <thead class="sticky-top bg-white border-bottom" style="z-index: 5;">
                                       <tr>
                                           <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted" style="width: 80px;">#</th>
                                           <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Room</th>
                                           <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Wing</th>
                                           <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Floor</th>
                                           <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Capacity</th>
                                           <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Rent Fee</th>
                                           <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Actions</th>
                                       </tr>
                                   </thead>
                                   <tbody class="border-top-0" id="load_PArtition_rooms">
                                   </tbody>
                               </table>
                           </div>
                        </div>
                        <div class="card-footer">
                            <nav>
                                <ul class="pagination" id="pagination-partition">
                                    <li class="page-item" id="li-prev-partition">
                                        <a class="page-link" href="#" id="btn-preview-partition">Previous</a>
                                    </li>
                                    <li class="page-item" id="li-next-partition">
                                        <a class="page-link" href="#" id="btn-next-partition">Next</a>
                                    </li>
                                </ul>
                            </nav>
                            <div id="page-info-partition" class="mt-3 small text-muted"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-submit-account" class="btn btn-success btn-lg rounded-3 fs-6 shadow-sm py-2" type="button" onclick="addParition()">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-account"></span>
                        <span class="btn-text-account">Add Partition</span>
                    </button>
                    <button id="btn-cancel-functionroom" class="btn btn-secondary btn-lg rounded-3 fs-6 shadow-sm py-2" type="button" data-bs-dismiss="modal">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-account"></span>
                        <span class="btn-text-account">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        /*Function add room partiion*/
        function addParition() {
            $("#partition-title").text('Add New Room Partition');
            $("#mdl-partition-addrooms").modal('show');
            $("#btn-submit-parition").removeClass('d-none');      // hide submit button
            $("#btn-submit-parition").prop('disabled', false);  // disable it
            $("#btn-update-parition").addClass('d-none');   // show update button
        }
    </script>


<!-- Modal to add partition for specific function room -->
<form id="frm-add-parition">
    <div class="modal fade" id="mdl-partition-addrooms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark" id="partition-title">Add New Room Partition</h5>
                    </div>
                </div>

                <div class="modal-body p-4">
                    <input type="hidden" id="partition-id">
                    <div class="mb-2">
                      <label class="form-label fw-bold text-uppercase text-muted small">Room name</label>
                      <input type="text" class="form-control" name="paritionroom-name" id="paritionroom-name" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">
                                Max Capacity
                            </label>
                            <input type="number" class="form-control" name="paritionroom-capacity" id="paritionroom-capacity" required
                            >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-muted tracking-wider">
                                Unit of Measurement
                            </label>
                            <select class="form-select" id="unit-of-measurement-partition" required>
                                <option value="" disabled selected>---</option>
                                <option value="Pax">Pax</option>
                                <option value="Seats">Seats</option>
                                <option value="Tables">Tables</option>
                                <option value="Sqm">Square Meters</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2">
                      <label class="form-label fw-bold text-uppercase text-muted small">Rental Fee</label>
                      <input type="text" class="form-control number-format" name="paritionroom-rentalfee" id="paritionroom-rentalfee" inputmode="numeric" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id="btn-submit-parition" class="btn btn-success btn-lg rounded-3 fs-6 shadow-sm py-2" type="submit">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-parition"></span>
                        <span class="btn-text-parition">Save</span>
                    </button>
                    <button id="btn-update-parition" class="btn btn-success btn-lg rounded-3 d-none fs-6 shadow-sm py-2" type="button">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-parition"></span>
                        <span class="btn-text-parition">Update</span>
                    </button>
                    <button id="btn-cancel-parition" class="btn btn-secondary btn-lg rounded-3 fs-6 shadow-sm py-2" type="reset" data-bs-dismiss="modal">
                        <span class="spinner-border spinner-border-sm d-none" id="btn-spinner-parition"></span>
                        <span class="btn-text-parition">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    /*Function formating input cannot enter text but number with comma only*/
    function formatInputNumber(number) {
        if (!number) return "";
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    var inputs = document.querySelectorAll(".number-format");
    inputs.forEach(input => {
        input.addEventListener("input", function (e) {
            let value = e.target.value;
            let numeric = value.replace(/\D/g, "");
            e.target.value = formatInputNumber(numeric);
        });
    });

    /*Function to create room partition*/
    $("#frm-add-parition").submit(function(event){
        event.preventDefault();
        let $btnSubmit = $("#btn-submit-parition");
        let $btnCancel = $("#btn-cancel-parition");
        let $spinner = $("#btn-spinner");
        let $text = $btnSubmit.find(".btn-text-parition");
        $btnSubmit.prop("disabled", true);
        $btnCancel.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Saving...");


        var Motherid = $("#functionroom-display-id").val();
        var RoomName  = $("#paritionroom-name").val();
        var Uom = $("#unit-of-measurement-partition").val();
        var Capacity  = $("#paritionroom-capacity").val();
        var Rental  = $("#paritionroom-rentalfee").val();


        $.post("dirs/hotel_room/actions/save_room_partition.php", {
            RoomName: RoomName,
            Uom: Uom,
            Capacity: Capacity,
            Rental: Rental,
            Motherid: Motherid,
        }, function(data){
            $btnSubmit.prop("disabled", false);
            $btnCancel.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Save");
            if($.trim(data) == "OK"){
                $text.text("Save");
                loadFunctionRoom__Partition();
                loadHotelRooms();
                $("#frm-add-parition")[0].reset();
                $("#mdl-partition-addrooms").modal('hide');
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "New partition room added.",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });

            }else{
               Swal.fire({
                 icon: "error",
                 title: "Oops!",
                 text: data,
                 confirmButtonText: "OK"
               });
            }
        });
    });

     /*Function format with comma*/
    function formatComma(number) {
        if (number == null) return "";
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }


    var CurrentPage = 1;
    var PageSizePartition = 10;
    var totalPages = 1;
    var isPackageMode = false;
    var selectedItems = [];


    function loadFunctionRoom__Partition(page = 1) {
        CurrentPage = page; 
        var display = $("#load_PArtition_rooms");
        display.html(`
                <tr>
                    <td colspan="8" class="p-5 text-center text-muted">
                        <div class="spinner-border text-dark"></div>
                        <div class="mt-2">Loading...</div>
                    </td>
                </tr>
        `);
        var Search = $("#search-partition-room").val();
        var Functionid = $("#functionroom-display-id").val();
        $.post("dirs/hotel_room/actions/get_pagination_partitions.php", {
            CurrentPage,
            PageSizePartition,
            Search,
            Functionid
        }, function (data) {
            let response;

            try {
                response = JSON.parse(data);
            } catch (e) {
                display.html(`<div class="text-dark text-center py-4">Server Error</div>`);
                return;
            }
            if ($.trim(response.isSuccess) === "success") {
                PartitionContent(response.Data);
                totalPages = (response.Data && response.Data.length > 0)
                    ? parseInt(response.Data[0].TotalPages)
                    : 1;

                    ParititionPaginationUi();
                    PartitionPageNumber();
            } else {
                emptyStatePartition("Partition rooms was empty.");
            }
        });
    }


    function PartitionContent(data) {
        const display = $("#load_PArtition_rooms");
        if (!data || data.length === 0) {
            showEmptyStatePartitions("No available.");
            return;
        }
        display.empty();

        data.forEach(smallroom => {
            display.append(`
               <tr class="beverage-row align-middle" data-value="${smallroom.LineNum}">
                   <td class="text-muted fw-medium small">
                       ${smallroom.OrderNumber}
                   </td>

                   <td class="fw-semibold text-info">
                       ${smallroom.RoomName || '—'}
                   </td>

                    <td class="fw-semibold text-muted small">
                        ${smallroom.HotelWing || '—'}
                    </td>
                    <td class="fw-semibold text-muted small">
                        ${smallroom.FloorLevel || '—'}
                    </td>
                    <td class="fw-semibold text-muted small">
                        ${smallroom.MaxCapacity ? smallroom.MaxCapacity + ' ' + smallroom.Uom : '-'}
                    </td>
                    <td class="fw-semibold text-success small">
                        ₱${formatComma(smallroom.RentalFee || '0')}
                    </td>
                    <td class="text-center pe-4">
                        <button class="btn btn-link me-1" type="button" title="Edit"aria-label="Edit" onclick="editRoom('${smallroom.LineNum}')"><i class="bi bi-pencil-square"></i>
                        </button>

                        <button class="btn btn-link" type="button"  title="Delete"aria-label="Delete" onclick="delRoom('${smallroom.LineNum}')"><i class="bi bi-trash text-danger"></i>
                        </button>
                    </td>
               </tr>
            `);
        });
    }


    /*Function for no record of beverages*/
    function emptyStatePartition(message) {
        $("#load_PArtition_rooms").html(`
            <tr>
              <td colspan="8" class="p-5 text-center text-muted">
                  <i class="bi bi-card-list text-lg"></i> 
                  <br>
                      No Rooms Available!
            <div class="small opacity-75">${message}</div>
                  </td>
            </tr>
        `);
    }


    /*Function for no record of beverages*/
    function showEmptyStatePartitions(message) {
        $("#load_PArtition_rooms").html(`
            <tr>
              <td colspan="8" class="p-5 text-center text-muted">
                  <i class="bi bi-card-list text-lg"></i> 
                  <br>
                      No Record Found!
            <div class="small opacity-75">${message}</div>
                  </td>
            </tr>
        `);
    }


    /*Function to count page number page 1 of and so on*/
    function ParititionPaginationUi() {
        $("#page-info-partition").text("Page " + CurrentPage + " of " + totalPages);
        if (CurrentPage <= 1) {
            $("#li-prev-partition").addClass("disabled");
        } else {
            $("#li-prev-partition").removeClass("disabled");
        }

        if (CurrentPage >= totalPages) {
            $("#li-next-partition").addClass("disabled");
        } else {
            $("#li-next-partition").removeClass("disabled");
        }
    }

    /*Function to build list of pagination*/
    function PartitionPageNumber() {
        $("#pagination-partition li.page-number-partition").remove();
        let prevLi = $("#li-prev-partition");
        let maxVisible = 5;
        let start = Math.max(1, CurrentPage - 2);
        let end = Math.min(totalPages, start + maxVisible - 1);
        if (end - start < maxVisible - 1) {
            start = Math.max(1, end - maxVisible + 1);
        }
        if (start > 1) {
            insertPagePartition(1, prevLi);
            prevLi = prevLi.next();

            if (start > 2) {
                prevLi.after(`<li class="page-item page-number-partition disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
        }
        for (let i = start; i <= end; i++) {
            insertPagePartition(i, prevLi);
            prevLi = prevLi.next();
        }
        if (end < totalPages) {
            if (end < totalPages - 1) {
                prevLi.after(`<li class="page-item page-number-partition disabled"><span class="page-link">...</span></li>`);
                prevLi = prevLi.next();
            }
            insertPagePartition(totalPages, prevLi);
        }
        function insertPagePartition(i, ref) {
            let activeClass = (i === CurrentPage) ? "active" : "";

            let li = `
                <li class="page-item page-number-partition ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>
            `;

            $(li).insertAfter(ref);
        }
    }

    /*search-amenitieslist*/
    $("#search-partition-room").on("keydown", function(e) {
        if (e.key === "Enter") {
            loadFunctionRoom__Partition();
        }
    });

      /* Pagination + Fetch Blocked Accounts */
      $("#btn-preview-partition").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage > 1) {
              loadFunctionRoom__Partition(CurrentPage - 1);
          }
      });

    /*Function load all important tags tickets*/
      $("#btn-next-partition").on("click", function(e) {
          e.preventDefault();

          if (CurrentPage < totalPages) {
              loadFunctionRoom__Partition(CurrentPage + 1);
          }
      });

      /*Function to remove this menu prompt*/
      function delRoom(LineNum) {
          Swal.fire({
              title: "Are you sure to remove this.",
              text: "This room will be permanently removed.",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#d33",
              cancelButtonColor: "#6c757d",
              confirmButtonText: "Remove",
              cancelButtonText: "Cancel"
          }).then((result) => {
              if (result.isConfirmed) {
                  removeRoom(LineNum);
              }
          });
      }

      /*Function to remove script*/
      function removeRoom(LineNum){
          $.post("dirs/hotel_room/actions/delete_room.php", {
              LineNum : LineNum
          },function(data){
              if(jQuery.trim(data) == "success"){
                loadFunctionRoom__Partition();
                loadHotelRooms();
                  Swal.fire({
                      icon: "success",
                      title: "Room Removed",
                      text: "successfully.",
                      showConfirmButton: false,
                      timer: 2000,
                      timerProgressBar: true
                  });  
              }else{
                   Swal.fire({
                      icon: "error",
                      title: "Oops!",
                      text: data
                  });
              }
          });
      }


    /*Function to edit room partition*/ 
    $("#btn-update-parition").on("click", function () {
        let $btnSubmit = $("#btn-update-parition");
        let $spinner = $("#btn-spinner-parition");
        let $text = $btnSubmit.find(".btn-text-parition");
        let $btnClose = $("#btn-cancel-parition");

        var LineNumber = $("#partition-id").val();
        var Room  = $("#paritionroom-name").val();
        var UnitMeasure = $("#unit-of-measurement-partition").val();
        var MxCapacity  = $("#paritionroom-capacity").val();
        var FeeRental  = $("#paritionroom-rentalfee").val();


        $btnSubmit.prop("disabled", true);
        $spinner.removeClass("d-none");
        $text.text("Updating...");
        $btnClose.prop("disabled", true);

        $.post("dirs/hotel_room/actions/update_room.php", {

            LineNumber: LineNumber,
            Room: Room,
            UnitMeasure: UnitMeasure,
            MxCapacity: MxCapacity, 
            FeeRental: FeeRental,

        }, function (data) {

            $btnSubmit.prop("disabled", false);
            $spinner.addClass("d-none");
            $text.text("Updating...");
            $btnClose.prop("disabled", false);

            if ($.trim(data) === "success") {
                $text.text("Update");
                loadFunctionRoom__Partition();
                $("#frm-add-parition")[0].reset();
                $("#mdl-partition-addrooms").modal("hide");

                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    title: "Successfully Updated",
                    showConfirmButton: false,
                    timer: 2000
                });

            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops!",
                    text: data
                });
            }
        });
    });

    
</script>