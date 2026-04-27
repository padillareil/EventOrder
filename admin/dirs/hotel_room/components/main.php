<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="card-header bg-white border-0 pt-4 px-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-2">
            <div class="d-flex align-items-center">
                <div class="p-3 rounded-3 me-3" style="background-color: rgba(191, 155, 48, 0.1);">
                    <i class="bi bi-megaphone fs-5 text-custom-gold"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold text-dark">Function Rooms Management</h5>
                    <p class="text-muted small mb-0">Create, organize, and manage hotel function rooms.</p>
                </div>
            </div>
        </div>

        
    </div>

    <div class="card-body p-2">
       <div class="card border-0 shadow-sm rounded-4 overflow-hidden mt-3">
           <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
               <div class="row g-3 align-items-center">
                   <div class="col-12 col-md-6 d-flex align-items-center gap-3">
                       <h5 class="fw-bold mb-0">Function Room List</h5>
                   </div>
                   <div class="col-12 col-md-6 d-flex justify-content-md-end">
                       <div class="input-group border mr-2 bg-light px-3 flex-grow-1" style="max-width: 300px;">
                           <span class="input-group-text bg-transparent border-0 p-0 me-2">
                               <i class="bi bi-search text-muted small"></i>
                           </span>
                           <input type="search" class="form-control bg-transparent border-0 small py-2 shadow-none" id="search-functionroom" placeholder="Search...">
                       </div>
                       <button class="btn btn-link text-decoration-none text-secondary" type="button" onclick="addFunctionRoom()" title="Setup Function Room">
                           <i class="bi bi-ui-checks-grid text-lg"></i>
                       </button>
                   </div>
               </div>
           </div>

           <div class="card-body p-0">
               <div class="table-responsive overflow-auto" style="height: 50vh;">
                   <table class="table table-hover align-middle mb-0">
                       <thead class="sticky-top bg-white border-bottom" style="z-index: 5;">
                           <tr>
                               <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted" style="width: 80px;">#</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Function Room</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Wing</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Floor</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Capacity</th>
                               <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center pe-4">Actions</th>
                           </tr>
                       </thead>
                       <tbody class="border-top-0" id="load_FunctionRooms">
                       </tbody>
                   </table>
               </div>
           </div>
           <div class="card-footer">
               <nav>
                   <ul class="pagination" id="pagination-rooms">
                       <li class="page-item" id="li-prev-rooms">
                           <a class="page-link" href="#" id="btn-preview-rooms">Previous</a>
                       </li>
                       <li class="page-item" id="li-next-rooms">
                           <a class="page-link" href="#" id="btn-next-rooms">Next</a>
                       </li>
                   </ul>
               </nav>
               <div id="page-info-rooms" class="mt-3 small text-muted"></div>
           </div>
       </div>
    </div>
</div>


<style>
    .text-custom-gold {
        color: #bf9b30 !important;
    }
</style>


<script>
        var CurrentPage = 1;
        var PageSize = 10;
        var totalPages = 1;
        var isPackageMode = false;
        var selectedItems = [];


        function loadHotelRooms(page = 1) {
            CurrentPage = page; 
            var display = $("#load_FunctionRooms");
            display.html(`
                    <tr>
                        <td colspan="6" class="p-5 text-center text-muted">
                            <div class="spinner-border text-dark"></div>
                            <div class="mt-2">Loading...</div>
                        </td>
                    </tr>
            `);
            var Search = $("#search-functionroom").val();
            $.post("dirs/hotel_room/actions/get_pagination_hotel_room.php", {
                CurrentPage,
                PageSize,
                Search
            }, function (data) {
                let response;

                try {
                    response = JSON.parse(data);
                } catch (e) {
                    display.html(`<div class="text-dark text-center py-4">Server Error</div>`);
                    return;
                }
                if ($.trim(response.isSuccess) === "success") {
                    HotelrooomsContent(response.Data);
                    totalPages = (response.Data && response.Data.length > 0)
                        ? parseInt(response.Data[0].TotalPages)
                        : 1;

                        HotelRoomPaginationUi();
                        HotelRoomPageNumber();
                } else {
                    emptyStateHroom("venue package was empty.");
                }
            });
        }


        function HotelrooomsContent(data) {
            const display = $("#load_FunctionRooms");
            if (!data || data.length === 0) {
                showEmptyStateHrooms("No available.");
                return;
            }
            display.empty();

            data.forEach(acc => {
                display.append(`
                   <tr class="beverage-row align-middle" data-value="${acc.Vid}">
                       <td class="text-muted fw-medium small">
                           ${acc.OrderNumber}
                       </td>

                       <td class="fw-semibold text-muted small">
                           ${acc.FunctioName || '—'}
                       </td>

                        <td class="fw-semibold text-muted small">
                            ${acc.HotelWing || '—'}
                        </td>
                        <td class="fw-semibold text-muted small">
                            ${acc.FloorLevel || '-'}
                        </td>
                        <td class="fw-semibold text-muted small">
                            ${acc.MaxCapacity ? acc.MaxCapacity + ' ' + acc.UoM : '-'}
                        </td>

                     <td class="text-center">
                       <div class="dropdown">
                           <button class="btn btn-sm btn-icon btn-light rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="function() {}alse">
                               <i class="bi bi-three-dots-vertical"></i>
                           </button>

                           <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="createpartition('${acc.Function_id}')">  <i class="bi bi-vr"></i>  Room Partition
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="mdlEditAmenties('${acc.Function_id}')">  <i class="bi bi-pencil"></i>  Edit Function Room
                                    </a>
                                </li>
                               <li>
                                   <a class="dropdown-item d-flex align-items-center gap-2" href="#"onclick="removeAmmenities('${acc.Function_id}')"> <i class="bi bi-trash"></i> Remove
                                   </a>
                               </li>

                               <li>
                                   <hr class="dropdown-divider">
                               </li>

                               <li>
                                   <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="enablerooms('${acc.Function_id}')">  <i class="bi bi-toggle-on text-success"></i>  Enable
                                   </a>
                               </li>

                               <li>
                                   <a class="dropdown-item d-flex align-items-center gap-2" href="#" onclick="disablerooms('${acc.Function_id}')">  <i class="bi bi-toggle-off text-danger"></i>  Disable
                                   </a>
                               </li>
                           </ul>
                       </div>
                   </td>
                   </tr>
                `);
            });
        }




        /*Function for no record of beverages*/
        function emptyStateHroom(message) {
            $("#load_FunctionRooms").html(`
                <tr>
                  <td colspan="6" class="p-5 text-center text-muted">
                      <i class="bi bi-card-list text-lg"></i> 
                      <br>
                          No Accounts Available!
                <div class="small opacity-75">${message}</div>
                      </td>
                </tr>
            `);
        }

        /*Function for no record of beverages*/
        function showEmptyStateHrooms(message) {
            $("#load_FunctionRooms").html(`
                <tr>
                  <td colspan="6" class="p-5 text-center text-muted">
                      <i class="bi bi-card-list text-lg"></i> 
                      <br>
                          No Record Found!
                <div class="small opacity-75">${message}</div>
                      </td>
                </tr>
            `);
        }


        /*Function to count page number page 1 of and so on*/
        function HotelRoomPaginationUi() {
            $("#page-info-rooms").text("Page " + CurrentPage + " of " + totalPages);
            if (CurrentPage <= 1) {
                $("#li-prev-rooms").addClass("disabled");
            } else {
                $("#li-prev-rooms").removeClass("disabled");
            }

            if (CurrentPage >= totalPages) {
                $("#li-next-rooms").addClass("disabled");
            } else {
                $("#li-next-rooms").removeClass("disabled");
            }
        }

        /*Function to build list of pagination*/
        function HotelRoomPageNumber() {
            $("#pagination-rooms li.page-number-rooms").remove();
            let prevLi = $("#li-prev-rooms");
            let maxVisible = 5;
            let start = Math.max(1, CurrentPage - 2);
            let end = Math.min(totalPages, start + maxVisible - 1);
            if (end - start < maxVisible - 1) {
                start = Math.max(1, end - maxVisible + 1);
            }
            if (start > 1) {
                insertPageBreakfast(1, prevLi);
                prevLi = prevLi.next();

                if (start > 2) {
                    prevLi.after(`<li class="page-item page-number-rooms disabled"><span class="page-link">...</span></li>`);
                    prevLi = prevLi.next();
                }
            }
            for (let i = start; i <= end; i++) {
                insertPageBreakfast(i, prevLi);
                prevLi = prevLi.next();
            }
            if (end < totalPages) {
                if (end < totalPages - 1) {
                    prevLi.after(`<li class="page-item page-number-rooms disabled"><span class="page-link">...</span></li>`);
                    prevLi = prevLi.next();
                }
                insertPageBreakfast(totalPages, prevLi);
            }
            function insertPageBreakfast(i, ref) {
                let activeClass = (i === CurrentPage) ? "active" : "";

                let li = `
                    <li class="page-item page-number-rooms ${activeClass}">
                        <a class="page-link" href="#" data-page="${i}">${i}</a>
                    </li>
                `;

                $(li).insertAfter(ref);
            }
        }

        /*search-roomslist*/
        $("#search-roomslist").on("keydown", function(e) {
            if (e.key === "Enter") {
                loadHotelRooms();
            }
        });

          /* Pagination + Fetch Blocked Accounts */
          $("#btn-preview-rooms").on("click", function(e) {
              e.preventDefault();

              if (CurrentPage > 1) {
                  loadHotelRooms(CurrentPage - 1);
              }
          });

        /*Function load all important tags tickets*/
          $("#btn-next-rooms").on("click", function(e) {
              e.preventDefault();

              if (CurrentPage < totalPages) {
                  loadHotelRooms(CurrentPage + 1);
              }
          });
</script>