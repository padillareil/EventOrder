<div class="row">
    <!-- Modern Row Menu Tools & Text Widgets (Unified Header) -->
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 bg-white">
            <div class="card-body p-3">
                <div class="row align-items-center g-3">
                    
                    <!-- 1. Search Control Element (Expanded to 6 columns on medium+ screens) -->
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="input-group border rounded-3 bg-light px-2 py-1 align-items-center" style="max-width: 400px;">
                            <span class="input-group-text bg-transparent border-0 p-0 pe-2">
                                <i class="bi bi-search text-muted fs-7"></i>
                            </span>
                            <input type="search" class="form-control bg-transparent border-0 shadow-none py-1 fs-7" id="search-event-order" placeholder="Quick search events...">
                        </div>
                    </div>

                    <!-- 2. Action Tools Menu (Expanded to 6 columns, pushes buttons to the far right edge) -->
                    <div class="col-12 col-sm-6 col-md-6 d-flex justify-content-sm-end gap-2">
                        <button type="button" class="btn btn-light border btn-sm rounded-3 px-3 fw-medium text-secondary d-inline-flex align-items-center fs-7 hover-shadow-sm" onclick="loadBookingList();">
                            <i class="bi bi-list me-2 text-primary"></i> List All Events
                        </button>
                        <button class="btn btn-primary btn-sm py-2 px-3 rounded-3 d-inline-flex align-items-center fw-medium fs-7 shadow-sm" type="button" onclick="mdlBookForm2()">
                             New Event
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Calendar Layout Container -->
    <div class="col-12">
        <div class="card border-0 shadow-lg rounded-4 bg-white overflow-hidden">
            
            <!-- Unified Calendar Navigation Control Header -->
            <div class="card-header bg-white border-bottom border-light p-3">
                <div class="row align-items-center g-2">
                    <div class="col-12 d-flex align-items-center gap-3">
                        <div>
                            <h5 class="fw-bold mb-0 text-dark font-monospace text-uppercase" id="lbl-calendar-month" style="letter-spacing: -0.5px; min-width: 130px;">
                                <!-- Managed via JavaScript -->
                            </h5>
                        </div>
                        <!-- Custom Pagination Controls -->
                        <ul class="pagination pagination-sm mb-0" id="pagination-calendar">
                            <li class="page-item" id="li-prev-calendar">
                                <a class="page-link shadow-none border rounded-start-3 px-2.5 py-1.5" href="javascript:void(0);" id="btn-prev-calendar">
                                    <i class="bi bi-chevron-left small"></i>
                                </a>
                            </li>
                            <li class="page-item" id="li-next-calendar">
                                <a class="page-link shadow-none border border-start-0 rounded-end-3 px-2.5 py-1.5" href="javascript:void(0);" id="btn-next-calendar">
                                    <i class="bi bi-chevron-right small"></i>
                                </a>
                            </li>
                        </ul>
                        <div id="page-info-amenities" class="small text-muted ms-auto"></div>
                    </div>
                </div>
            </div>

            <!-- Calendar View Canvas Engine -->
            <div class="card-body p-3">
                <!-- Weekday Labels -->
                <div class="calendar-days-heading-grid mb-1 bg-light rounded-2">
                    <div class="text-center fs-7 fw-medium d-block mb-1 py-1.5 text-secondary">Sunday</div>
                    <div class="text-center fs-7 fw-medium d-block mb-1 py-1.5 text-secondary">Monday</div>
                    <div class="text-center fs-7 fw-medium d-block mb-1 py-1.5 text-secondary">Tuesday</div>
                    <div class="text-center fs-7 fw-medium d-block mb-1 py-1.5 text-secondary">Wednesday</div>
                    <div class="text-center fs-7 fw-medium d-block mb-1 py-1.5 text-secondary">Thursday</div>
                    <div class="text-center fs-7 fw-medium d-block mb-1 py-1.5 text-secondary">Friday</div>
                    <div class="text-center fs-7 fw-medium d-block mb-1 py-1.5 text-secondary">Saturday</div>
                </div>

                <!-- 7-Column Grid Target Container Insertion Point -->
                <div class="calendar-cells-matrix-grid" id="calendar-grid-canvas">
                    <!-- Dynamically populated via dynamic JS engine loops -->
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    /* ==========================================================================
       Responsive Calendar Dashboard Adjustments
       ========================================================================== */

    /* 1. Desktop & Large Screens Sticky Behaviors */
    @media (min-width: 992px) {
      .col-md-3 .card {
        position: sticky;
        top: 1.5rem;
        z-index: 10;
      }
    }

    /* 2. Tablet & Medium Screen Layout Optimization (Breakpoint Match) */
    @media (min-width: 768px) and (max-width: 991.98px) {
      
      /* Forces the split action container to span beautifully in a row on tablets */
      .col-md-3 .card-header .row {
        display: flex !important;
        flex-direction: row !important;
        align-items: center;
        gap: 1rem;
      }
      
      .col-md-3 .card-header .row > div {
        flex: 1;
        margin-bottom: 0 !important;
      }

      /* Arranges the metric summary cards side-by-side to preserve vertical space */
      .col-md-3 .card-body .row {
        display: flex !important;
        flex-direction: row !important;
        gap: 0.5rem;
      }
      
      .col-md-3 .card-body .row > div {
        flex: 1;
        width: 50%;
      }

      /* Scales down calendar text labels to prevent clipping on narrow grids */
      .calendar-days-heading-grid div {
        font-size: 11px !important;
        padding: 6px 2px !important;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
      }
    }

    /* ==========================================================================
       Standard Calendar CSS Grid Framework Rules
       ========================================================================== */

    /* Defines the 7-Column Layout Structure for Week Headings */
    .calendar-days-heading-grid {
      display: grid;
      grid-template-columns: repeat(7, minmax(0, 1fr));
      border-radius: 8px;
      font-weight: 600;
      color: #495057;
    }

    /* Defines the 7-Column Layout Structure for Calendar Cells */
    .calendar-cells-matrix-grid {
      display: grid;
      grid-template-columns: repeat(7, minmax(0, 1fr));
      gap: 4px;
    }

    /* Smooth scaling transitions for control metrics buttons */
    .hover-shadow {
      transition: all 0.2s ease-in-out;
    }
    .hover-shadow:hover {
      background-color: #f8f9fa !important;
      transform: translateY(-1px);
      box-shadow: 0 .5rem 1rem rgba(0,0,0,.08)!important;
    }
    /* Sizing structure helper overrides for high-density components */
    .fs-7 {
        font-size: 0.8rem !important;
    }
    .fw-extrabold {
        font-weight: 800;
    }

    /* Ensure inputs with structural components inside buttons or wrappers don't show focus rings */
    input[type="date"]::-webkit-calendar-picker-indicator {
        background-color: transparent;
        cursor: pointer;
        padding: 2px;
    }
    /* --- Core Structural Grid Alignments --- */
    .calendar-days-heading-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background-color: #f8f9fa;
        border-radius: 6px;
    }

    .calendar-cells-matrix-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background-color: #ffffff;
        border-right: 1px solid #e9ecef;
        border-bottom: 1px solid #e9ecef;
    }

    .calendar-day-cell {
        min-height: 135px;
        background-color: #ffffff;
        border-color: #e9ecef !important;
        display: flex;
        flex-direction: column;
        align-items: stretch;
        justify-content: flex-start;
        position: relative;
    }

    /* Gray styling for adjacent calendar month spillover padding days */
    .calendar-day-cell.spillover-day {
        background-color: rgba(248, 249, 250, 0.4);
        opacity: 0.45;
    }

    /* --- State B: Empty Day Visual Box Trigger Markup --- */
    .calendar-empty-trigger-box {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 2px dashed #e3e6ec;
        border-radius: 8px;
        background-color: #fafbfc;
        cursor: pointer;
        padding: 4px;
        color: #8c98a5;
        transition: all 0.15s ease-in-out;
    }
    .calendar-empty-trigger-box span {
        font-size: 8.5px;
        font-weight: 700;
    }
    .calendar-empty-trigger-box:hover {
        background-color: #f0f3f7;
        border-color: #0d6efd;
        color: #0d6efd;
    }

    /* --- State A: Colored Status Bars (Accordion Items) --- */
    .event-item-btn {
        font-size: 10.5px !important;
        font-weight: 600 !important;
        padding: 4px 6px !important;
        border-radius: 5px !important;
        box-shadow: none !important;
        outline: none !important;
    }
    .event-item-btn::after {
        width: 0.5rem !important;
        height: 0.5rem !important;
        background-size: 0.5rem !important;
    }

    .event-item-btn.status-confirmed { background-color: #d1f7e3 !important; color: #116d3e !important; }
    .event-item-btn.status-ongoing   { background-color: #cfe2ff !important; color: #0a58ca !important; }
    .event-item-btn.status-pencil    { background-color: #e2e3e5 !important; color: #41464b !important; }
    .event-item-btn.status-ended     { background-color: #f8d7da !important; color: #b02a37 !important; }

    .event-item-btn:not(.collapsed) {
        border-bottom-left-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
    }

    /* Native Bootstrap Pagination Custom Anchor Reset Overrides */
    #pagination-calendar .page-link {
        color: #495057;
        background-color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #pagination-calendar .page-link:hover {
        background-color: #f8f9fa;
        color: #212529;
    }

    @keyframes liveBroadcastPulse {
        0% { opacity: 1; }
        50% { opacity: 0.4; }
        100% { opacity: 1; }
    }
    .animate-pulse {
        animation: liveBroadcastPulse 1.5s infinite ease-in-out;
    }
</style>



<!-- First Design for event calendar Accordion Design  -->
<!-- <script>
    // GLOBAL CALENDAR CONTEXT
    var currentActiveCalendarMoment = moment();
    var structuredEventPayloadData = [];

    // Static mapping table for fast class lookups
    var STATUS_MAP = {
        1: "secondary", // Pencil
        2: "success",   // Confirmed
        3: "primary",   // Ongoing
        4: "danger"     // Event Ended
    };

    $(document).ready(function () {
        /* INITIAL RENDER & DATA FETCH */
        generateMockCalendarPayloadData();

        /* MONTH NAVIGATION */
        $("#btn-prev-calendar").on("click", function (e) {
            e.preventDefault();
            currentActiveCalendarMoment.subtract(1, 'months');
            generateMockCalendarPayloadData();
        });

        $("#btn-next-calendar").on("click", function (e) {
            e.preventDefault();
            currentActiveCalendarMoment.add(1, 'months');
            generateMockCalendarPayloadData();
        });

        // Safe event handling when the accordion is clicked
        $(document).on('click', '.calendar-accordion-btn', function() {
            const targetDocId = $(this).data('doc-id');
            if(typeof reviewBooking === "function") {
                reviewBooking(targetDocId);
            }
        });
    });

    /**
     * LOAD DATABASE EVENTS
     */
    function generateMockCalendarPayloadData() {
        const startOfMonth = moment(currentActiveCalendarMoment).startOf('month');
        const endOfMonth = moment(currentActiveCalendarMoment).endOf('month');
        const propertyFilter = $("#filter-property").val() || "";

        $.post("dirs/booking/actions/get_event.php", {
            StartDate: startOfMonth.format("YYYY-MM-DD"),
            EndDate: endOfMonth.format("YYYY-MM-DD"),
            Property: propertyFilter
        }, function (data) {
            const response = JSON.parse(data);

            if ($.trim(response.isSuccess) === "success") {
                structuredEventPayloadData = response.Data.map(row => ({
                    docId: row.DocId,
                    rawStart: moment(row.EventStartDate).format("YYYY-MM-DD"),
                    rawEnd: moment(row.EventEndDate).format("YYYY-MM-DD"),
                    periodDisplay: `${moment(row.EventStartDate).format("MMM DD, YYYY")} - ${moment(row.EventEndDate).format("MMM DD, YYYY")}`,
                    orderNumber: row.PencilCode,
                    eventTitle: row.EventTitle,
                    statusKey: STATUS_MAP[row.DocStatus] || "secondary",
                    hotelKey: row.Property
                }));

                renderSystemCalendarGridCanvas(currentActiveCalendarMoment);
            } else {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "error",
                    title: response.message,
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });
            }
        });
    }

    /**
     * MAIN CALENDAR ENGINE
     */
    function renderSystemCalendarGridCanvas(targetingMomentContext) {
        const $canvas = $("#calendar-grid-canvas").empty();
        $("#lbl-calendar-month").text(targetingMomentContext.format("MMMM YYYY"));

        const startOfTargetMonth = moment(targetingMomentContext).startOf('month');
        const countDaysInMonth = targetingMomentContext.daysInMonth();
        const leadingWeekdayOffset = startOfTargetMonth.day();

        // 1. PREVIOUS MONTH SPILLOVER
        const totalDaysInPrevMonth = moment(targetingMomentContext).subtract(1, 'months').daysInMonth();
        let fragments = "";

        for (let i = leadingWeekdayOffset - 1; i >= 0; i--) {
            fragments += `
                <div class="calendar-day-cell spillover-day p-2 border-top border-start">
                    <span class="font-monospace fw-bold text-secondary small">${totalDaysInPrevMonth - i}</span>
                </div>`;
        }

        // 2. MAIN MONTH LOOP
        for (let currentDayNum = 1; currentDayNum <= countDaysInMonth; currentDayNum++) {
            const stringISOTrackingDate = moment(targetingMomentContext).date(currentDayNum).format("YYYY-MM-DD");
            
            // Filter events falling within range
            const targetFilteredDayEvents = structuredEventPayloadData.filter(ev => {
                return stringISOTrackingDate >= ev.rawStart && stringISOTrackingDate <= ev.rawEnd;
            });
            
            const eventCount = targetFilteredDayEvents.length;
            let cellBodyContent = "";

            if (eventCount > 0) {
                const accordionRootID = `acc-root-day-${currentDayNum}`;
                let accordionItemsHTML = "";

                targetFilteredDayEvents.forEach((eventItem) => {
                    const collapseItemUniqueID = `collapse-node-doc-${eventItem.docId}-day-${currentDayNum}`;
                    
                    const isStartDate = (stringISOTrackingDate === eventItem.rawStart);
                    const isEndDate = (stringISOTrackingDate === eventItem.rawEnd);
                    
                    // Determine corner radius look based on position in schedule sequence
                    let customBorderRadiusStyle = "border-radius: 0px !important;";
                    let rangeBadgeHTML = "";

                    if (isStartDate && isEndDate) {
                        customBorderRadiusStyle = "border-radius: 4px !important;";
                    } else if (isStartDate) {
                        customBorderRadiusStyle = "border-radius: 4px 0px 0px 4px !important;";
                        rangeBadgeHTML = `<span class="badge bg-white text-dark fw-bold px-1 me-1" style="font-size: 7.5px; opacity: 0.9; vertical-align: middle;">START</span>`;
                    } else if (isEndDate) {
                        customBorderRadiusStyle = "border-radius: 0px 4px 4px 0px !important;";
                        rangeBadgeHTML = `<span class="badge bg-white text-dark fw-bold px-1 me-1" style="font-size: 7.5px; opacity: 0.9; vertical-align: middle;">END</span>`;
                    } else {
                        // Intermediate day indicator arrow
                        rangeBadgeHTML = `<i class="bi bi-arrow-right-short me-1 opacity-75" style="font-size: 10px;"></i>`;
                    }

                    accordionItemsHTML += `
                        <div class="accordion-item border-0 mb-1 overflow-hidden shadow-sm" style="${customBorderRadiusStyle}">
                            <h2 class="accordion-header">
                                <button class="accordion-button calendar-accordion-btn collapsed py-1 px-2 border-0 shadow-none bg-${eventItem.statusKey} text-white"
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#${collapseItemUniqueID}"
                                        data-doc-id="${eventItem.docId}"
                                        style="font-size:10px; min-height:28px; ${customBorderRadiusStyle}">
                                    <div class="w-100 overflow-hidden">
                                        <div class="fw-bold text-truncate lh-sm">
                                            ${rangeBadgeHTML}${eventItem.orderNumber}
                                        </div>
                                        <div class="text-truncate opacity-75 lh-sm" style="font-size:9px; padding-left: ${isStartDate || isEndDate ? '0px' : '0px'};">${eventItem.eventTitle}</div>
                                    </div>
                                </button>
                            </h2>
                            <div id="${collapseItemUniqueID}" class="accordion-collapse collapse" data-bs-parent="#${accordionRootID}">
                                <div class="accordion-body p-2 bg-white border border-top-0" style="font-size:9px; line-height:1.35; border-radius: 0px 0px 4px 4px;">
                                    <div class="fw-bold text-dark text-truncate mb-1">
                                        <i class="bi bi-building me-1"></i> ${eventItem.hotelKey}
                                    </div>
                                    <div class="text-muted text-truncate mt-1 pt-1 border-top" style="font-size:8.5px;">
                                        <span class="d-block text-uppercase text-secondary fw-semibold mb-0.5" style="font-size:7.5px; letter-spacing: 0.5px;">Event Period</span>
                                        <i class="bi bi-calendar2-range me-1 text-primary"></i> ${eventItem.periodDisplay}
                                    </div>
                                </div>
                            </div>
                        </div>`;
                });

                cellBodyContent = `
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="font-monospace fw-bold text-dark small">${currentDayNum}</span>
                        <span class="badge bg-light text-secondary border" style="font-size:9px;">
                            ${eventCount} Item${eventCount > 1 ? 's' : ''}
                        </span>
                    </div>
                    <div class="accordion border-0 shadow-none w-100" id="${accordionRootID}">
                        ${accordionItemsHTML}
                        <div class="calendar-empty-trigger-box border border-dashed rounded-2 p-1 text-center bg-light-subtle mt-1 d-flex align-items-center justify-content-center gap-1"
                             style="cursor:pointer; min-height:28px;" onclick="mdlBookForm('${stringISOTrackingDate}')">
                            <i class="bi bi-plus text-primary" style="font-size:11px;"></i>
                            <span class="font-monospace text-uppercase fw-bold text-secondary" style="font-size:9px;">Create</span>
                        </div>
                    </div>`;
            } else {
                cellBodyContent = `
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="font-monospace fw-bold text-dark small">${currentDayNum}</span>
                    </div>
                    <div class="calendar-empty-trigger-box" onclick="mdlBookForm('${stringISOTrackingDate}')">
                        <i class="bi bi-plus text-primary fs-5"></i>
                        <span class="font-monospace text-uppercase">Create</span>
                    </div>`;
            }

            fragments += `
                <div class="calendar-day-cell p-2 border-top border-start" data-date-node="${stringISOTrackingDate}">
                    ${cellBodyContent}
                </div>`;
        }

        $canvas.append(fragments);
    }
</script>
 -->

<!-- 2nd Design for widget design -->
<!--  <style>
     /* SYSTEM CONTAINER DESIGN SCHEMA */
     .calendar-grid-wrapper {
         display: grid;
         grid-template-columns: repeat(7, 1fr);
         background-color: #dee2e6;
         gap: 1px;
         border: 1px solid #dee2e6;
     }

     .calendar-day-cell {
         background-color: #ffffff;
         min-height: 140px; 
         position: relative;
         display: flex;
         flex-direction: column;
         justify-content: space-between;
     }

     .spillover-day {
         background-color: #f8f9fa;
     }

     /* THE TRACK CONTAINER LAYER */
     .event-widget-container {
         position: relative;
         width: 100%;
         margin-top: 4px;
         margin-bottom: 4px;
         min-height: 30px; 
     }

     /* THE FLOATING MULTI-DAY RIBBONS */
     .floating-widget-btn {
         display: block;
         border: none;
         outline: none;
         font-size: 10px;
         font-weight: 500;
         text-align: left;
         padding: 5px 8px;
         white-space: nowrap;
         overflow: hidden;
         text-overflow: ellipsis;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
         transition: transform 0.1s ease, filter 0.1s ease;
         height: 26px;
         line-height: 16px;
         cursor: pointer;
     }

     .floating-widget-btn:hover {
         transform: translateY(-1px);
         filter: brightness(0.92);
     }
     
     .calendar-empty-trigger-box {
         position: relative;
         margin-top: auto; 
         z-index: 100;
     }
 </style>

 <script>
     // GLOBAL CALENDAR CONTEXT
     var currentActiveCalendarMoment = moment();
     var structuredEventPayloadData = [];

     var STATUS_MAP = {
         1: "secondary", // Pencil
         2: "success",   // Confirmed
         3: "primary",   // Ongoing
         4: "danger"     // Event Ended
     };

     $(document).ready(function () {
         generateMockCalendarPayloadData();

         /* MONTH NAVIGATION CONTROLS */
         $("#btn-prev-calendar").on("click", function (e) {
             e.preventDefault();
             currentActiveCalendarMoment.subtract(1, 'months');
             generateMockCalendarPayloadData();
         });

         $("#btn-next-calendar").on("click", function (e) {
             e.preventDefault();
             currentActiveCalendarMoment.add(1, 'months');
             generateMockCalendarPayloadData();
         });

         $(document).on('click', '.floating-widget-btn', function (e) {
             e.stopPropagation();
             const targetDocId = $(this).data('doc-id');
             if (typeof reviewBooking === "function") {
                 reviewBooking(targetDocId);
             }
         });
     });

     function generateMockCalendarPayloadData() {
         const startOfMonth = moment(currentActiveCalendarMoment).startOf('month');
         const endOfMonth = moment(currentActiveCalendarMoment).endOf('month');
         const propertyFilter = $("#filter-property").val() || "";

         $.post("dirs/booking/actions/get_event.php", {
             StartDate: startOfMonth.format("YYYY-MM-DD"),
             EndDate: endOfMonth.format("YYYY-MM-DD"),
             Property: propertyFilter
         }, function (data) {
             const response = JSON.parse(data);

             if ($.trim(response.isSuccess) === "success") {
                 structuredEventPayloadData = response.Data.map(row => ({
                     docId: parseInt(row.DocId, 10), // Cast explicitly to integer for robust math sorting
                     rawStart: moment(row.EventStartDate).format("YYYY-MM-DD"),
                     rawEnd: moment(row.EventEndDate).format("YYYY-MM-DD"),
                     orderNumber: row.PencilCode,
                     eventTitle: row.EventTitle,
                     statusKey: STATUS_MAP[row.DocStatus] || "secondary",
                     hotelKey: row.Property
                 }));

                 renderSystemCalendarGridCanvas(currentActiveCalendarMoment);
             }
         });
     }

     /**
      * CALENDAR GENERATOR - ORDERED BY DOCID
      */
     function renderSystemCalendarGridCanvas(targetingMomentContext) {
         const $canvas = $("#calendar-grid-canvas").empty().addClass("calendar-grid-wrapper");
         $("#lbl-calendar-month").text(targetingMomentContext.format("MMMM YYYY"));

         const startOfTargetMonth = moment(targetingMomentContext).startOf('month');
         const countDaysInMonth = targetingMomentContext.daysInMonth();
         const leadingWeekdayOffset = startOfTargetMonth.day();

         let totalCellsRendered = 0;
         let baseLayoutDOMFragments = "";
         const gridCellDateMap = [];

         // 1. PREVIOUS MONTH SPILLOVER
         const prevMonthMoment = moment(targetingMomentContext).subtract(1, 'months');
         const totalDaysInPrevMonth = prevMonthMoment.daysInMonth();

         for (let i = leadingWeekdayOffset - 1; i >= 0; i--) {
             const dayNum = totalDaysInPrevMonth - i;
             baseLayoutDOMFragments += `
                 <div class="calendar-day-cell spillover-day p-2" data-cell-idx="${totalCellsRendered}">
                     <div class="mb-1"><span class="font-monospace fw-bold text-secondary small">${dayNum}</span></div>
                     <div class="event-widget-container" id="widget-tray-idx-${totalCellsRendered}"></div>
                 </div>`;
             gridCellDateMap.push(prevMonthMoment.date(dayNum).format("YYYY-MM-DD"));
             totalCellsRendered++;
         }

         // 2. MAIN ACTIVE MONTH RENDER
         for (let currentDayNum = 1; currentDayNum <= countDaysInMonth; currentDayNum++) {
             const stringISOTrackingDate = moment(targetingMomentContext).date(currentDayNum).format("YYYY-MM-DD");
             
             baseLayoutDOMFragments += `
                 <div class="calendar-day-cell p-2" data-date-node="${stringISOTrackingDate}">
                     <div class="d-flex justify-content-between align-items-center mb-1">
                         <span class="font-monospace fw-bold text-dark small">${currentDayNum}</span>
                     </div>
                     
                     <div class="event-widget-container" id="widget-tray-idx-${totalCellsRendered}"></div>
                     
                     <div class="calendar-empty-trigger-box" onclick="mdlBookForm('${stringISOTrackingDate}')">
                         <i class="bi bi-plus text-primary fs-5"></i>
                         <span class="font-monospace text-uppercase">Create</span>
                     </div>
                 </div>`;
                 
             gridCellDateMap.push(stringISOTrackingDate);
             totalCellsRendered++;
         }

         $canvas.append(baseLayoutDOMFragments);

         // 3. SORTING CONTEXT SWITCH: STABLE ORDER BY DOCID ASCENDING
         const sequencedEvents = [...structuredEventPayloadData].sort((a, b) => a.docId - b.docId);

         const verticalTrackAllocationMatrix = [];
         const cellMaxTrackHeightRecords = new Array(totalCellsRendered).fill(0);

         sequencedEvents.forEach(eventItem => {
             let startCellIndex = gridCellDateMap.indexOf(eventItem.rawStart);
             let endCellIndex = gridCellDateMap.indexOf(eventItem.rawEnd);

             if (startCellIndex === -1 && endCellIndex === -1) return;
             if (startCellIndex === -1) startCellIndex = 0;
             if (endCellIndex === -1) endCellIndex = gridCellDateMap.length - 1;

             let processingPointer = startCellIndex;

             while (processingPointer <= endCellIndex) {
                 let currentLineRowIndex = Math.floor(processingPointer / 7);
                 let currentLineEndBoundary = (currentLineRowIndex * 7) + 6;
                 let activeSegmentEndCell = Math.min(endCellIndex, currentLineEndBoundary);

                 let segmentCellSpanCount = (activeSegmentEndCell - processingPointer) + 1;

                 let targetVerticalRowSlot = 0;
                 while (true) {
                     let slotIsBlocked = false;
                     for (let c = processingPointer; c <= activeSegmentEndCell; c++) {
                         if (verticalTrackAllocationMatrix[c] && verticalTrackAllocationMatrix[c][targetVerticalRowSlot]) {
                             slotIsBlocked = true;
                             break;
                         }
                     }
                     if (!slotIsBlocked) break;
                     targetVerticalRowSlot++;
                 }

                 for (let c = processingPointer; c <= activeSegmentEndCell; c++) {
                     if (!verticalTrackAllocationMatrix[c]) verticalTrackAllocationMatrix[c] = [];
                     verticalTrackAllocationMatrix[c][targetVerticalRowSlot] = true;
                     
                     if (targetVerticalRowSlot + 1 > cellMaxTrackHeightRecords[c]) {
                         cellMaxTrackHeightRecords[c] = targetVerticalRowSlot + 1;
                     }
                 }

                 let calculatedWidthCSS = "";
                 let customBorders = "border-radius: 4px !important;";

                 if (segmentCellSpanCount > 1) {
                     let additionPixelGaps = segmentCellSpanCount - 1;
                     calculatedWidthCSS = `width: calc(${segmentCellSpanCount * 100}% + ${additionPixelGaps}px - 4px);`;
                     
                     if (processingPointer === startCellIndex && activeSegmentEndCell === endCellIndex) {
                         customBorders = "border-radius: 4px !important;";
                     } else if (processingPointer === startCellIndex) {
                         customBorders = "border-radius: 4px 0px 0px 4px !important;";
                     } else if (activeSegmentEndCell === endCellIndex) {
                         customBorders = "border-radius: 0px 4px 4px 0px !important;";
                     } else {
                         customBorders = "border-radius: 0px !important;";
                     }
                 } else {
                     calculatedWidthCSS = "width: calc(100% - 4px);";
                 }

                 let topOffsetSpacingPx = (targetVerticalRowSlot * 30); 

                 const buttonWidgetHTML = `
                     <button class="floating-widget-btn text-white bg-${eventItem.statusKey}"
                             data-doc-id="${eventItem.docId}"
                             style="
                                 position: absolute;
                                 top: ${topOffsetSpacingPx}px;
                                 left: 2px;
                                 ${calculatedWidthCSS}
                                 ${customBorders}
                                 z-index: ${20 + targetVerticalRowSlot};
                             "
                             title="${eventItem.orderNumber} - ${eventItem.eventTitle}">
                         <strong>${eventItem.orderNumber}</strong> - ${eventItem.eventTitle}
                     </button>`;

                 $(`#widget-tray-idx-${processingPointer}`).append(buttonWidgetHTML);
                 processingPointer = activeSegmentEndCell + 1;
             }
         });

         // 4. AUTO-STRETCH CONTAINER HEIGHTS
         cellMaxTrackHeightRecords.forEach((maxTrackCount, cellIdx) => {
             if (maxTrackCount > 0) {
                 const calculatedContainerHeight = maxTrackCount * 30; 
                 $(`#widget-tray-idx-${cellIdx}`).css("height", calculatedContainerHeight + "px");
             }
         });
     }
 </script> -->

<!-- 3rd Design ribbon design -->

<!--  <style>
     /* SYSTEM CONTAINER DESIGN SCHEMA */
     .calendar-grid-wrapper {
         display: grid;
         grid-template-columns: repeat(7, 1fr);
         background-color: #dee2e6;
         gap: 1px;
         border: 1px solid #dee2e6;
     }

     .calendar-day-cell {
         background-color: #ffffff;
         min-height: 140px; 
         position: relative;
         display: flex;
         flex-direction: column;
         justify-content: space-between;
     }

     .spillover-day {
         background-color: #f8f9fa;
     }

     /* TRACK CONTAINER TRAY LAYER */
     .event-widget-container {
         position: relative;
         width: 100%;
         margin-top: 4px;
         margin-bottom: 4px;
         min-height: 30px; 
     }

     /* MINIMALIST ACCENT RIBBON CARD (EASY ON THE EYES) */
     .floating-widget-btn {
         display: block;
         outline: none;
         font-size: 11px;
         font-weight: 500;
         text-align: left;
         padding: 4px 8px 4px 10px; /* Left padding adjusted to accommodate status border strip */
         white-space: nowrap;
         overflow: hidden;
         text-overflow: ellipsis;
         height: 26px;
         line-height: 16px;
         cursor: pointer;
         
         /* High contrast, low stress color framework */
         background-color: #ffffff !important;
         color: #212529 !important; /* Rich dark gray text for optimal reading comfort */
         border: 1px solid #ced4da !important;
         box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
         transition: background-color 0.15s ease, box-shadow 0.15s ease;
     }

     .floating-widget-btn:hover {
         background-color: #f8f9fa !important;
         box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
     }

     /* LEFT-SIDE STATUS COLOR ACCENT BANDS */
     .floating-widget-btn.status-secondary { border-left: 4px solid #6c757d !important; }
     .floating-widget-btn.status-success   { border-left: 4px solid #198754 !important; }
     .floating-widget-btn.status-primary   { border-left: 4px solid #0d6efd !important; }
     .floating-widget-btn.status-danger    { border-left: 4px solid #dc3545 !important; }

     .calendar-empty-trigger-box {
         position: relative;
         margin-top: auto; 
         z-index: 100;
     }
 </style>

 <script>
     // GLOBAL CALENDAR CONTEXT
     var currentActiveCalendarMoment = moment();
     var structuredEventPayloadData = [];

     // Keeping mapping keys standard
     var STATUS_MAP = {
         1: "secondary", // Pencil
         2: "success",   // Confirmed
         3: "primary",   // Ongoing
         4: "danger"     // Event Ended
     };

     $(document).ready(function () {
         generateMockCalendarPayloadData();

         /* MONTH NAVIGATION CONTROLS */
         $("#btn-prev-calendar").on("click", function (e) {
             e.preventDefault();
             currentActiveCalendarMoment.subtract(1, 'months');
             generateMockCalendarPayloadData();
         });

         $("#btn-next-calendar").on("click", function (e) {
             e.preventDefault();
             currentActiveCalendarMoment.add(1, 'months');
             generateMockCalendarPayloadData();
         });

         $(document).on('click', '.floating-widget-btn', function (e) {
             e.stopPropagation();
             const targetDocId = $(this).data('doc-id');
             if (typeof reviewBooking === "function") {
                 reviewBooking(targetDocId);
             }
         });
     });

     function generateMockCalendarPayloadData() {
         const startOfMonth = moment(currentActiveCalendarMoment).startOf('month');
         const endOfMonth = moment(currentActiveCalendarMoment).endOf('month');
         const propertyFilter = $("#filter-property").val() || "";

         $.post("dirs/booking/actions/get_event.php", {
             StartDate: startOfMonth.format("YYYY-MM-DD"),
             EndDate: endOfMonth.format("YYYY-MM-DD"),
             Property: propertyFilter
         }, function (data) {
             const response = JSON.parse(data);

             if ($.trim(response.isSuccess) === "success") {
                 structuredEventPayloadData = response.Data.map(row => ({
                     docId: parseInt(row.DocId, 10),
                     rawStart: moment(row.EventStartDate).format("YYYY-MM-DD"),
                     rawEnd: moment(row.EventEndDate).format("YYYY-MM-DD"),
                     orderNumber: row.PencilCode,
                     eventTitle: row.EventTitle,
                     statusKey: STATUS_MAP[row.DocStatus] || "secondary",
                     hotelKey: row.Property
                 }));

                 renderSystemCalendarGridCanvas(currentActiveCalendarMoment);
             }
         });
     }

     /**
      * CALENDAR GENERATOR - ACCENT RIBBON ENGINE
      */
     function renderSystemCalendarGridCanvas(targetingMomentContext) {
         const $canvas = $("#calendar-grid-canvas").empty().addClass("calendar-grid-wrapper");
         $("#lbl-calendar-month").text(targetingMomentContext.format("MMMM YYYY"));

         const startOfTargetMonth = moment(targetingMomentContext).startOf('month');
         const countDaysInMonth = targetingMomentContext.daysInMonth();
         const leadingWeekdayOffset = startOfTargetMonth.day();

         let totalCellsRendered = 0;
         let baseLayoutDOMFragments = "";
         const gridCellDateMap = [];

         // 1. PREVIOUS MONTH SPILLOVER
         const prevMonthMoment = moment(targetingMomentContext).subtract(1, 'months');
         const totalDaysInPrevMonth = prevMonthMoment.daysInMonth();

         for (let i = leadingWeekdayOffset - 1; i >= 0; i--) {
             const dayNum = totalDaysInPrevMonth - i;
             baseLayoutDOMFragments += `
                 <div class="calendar-day-cell spillover-day p-2" data-cell-idx="${totalCellsRendered}">
                     <div class="mb-1"><span class="font-monospace fw-bold text-secondary small">${dayNum}</span></div>
                     <div class="event-widget-container" id="widget-tray-idx-${totalCellsRendered}"></div>
                 </div>`;
             gridCellDateMap.push(prevMonthMoment.date(dayNum).format("YYYY-MM-DD"));
             totalCellsRendered++;
         }

         // 2. MAIN ACTIVE MONTH RENDER
         for (let currentDayNum = 1; currentDayNum <= countDaysInMonth; currentDayNum++) {
             const stringISOTrackingDate = moment(targetingMomentContext).date(currentDayNum).format("YYYY-MM-DD");
             
             baseLayoutDOMFragments += `
                 <div class="calendar-day-cell p-2" data-date-node="${stringISOTrackingDate}">
                     <div class="d-flex justify-content-between align-items-center mb-1">
                         <span class="font-monospace fw-bold text-dark small">${currentDayNum}</span>
                     </div>
                     
                     <div class="event-widget-container" id="widget-tray-idx-${totalCellsRendered}"></div>
                     
                     <div class="calendar-empty-trigger-box" onclick="mdlBookForm('${stringISOTrackingDate}')">
                         <i class="bi bi-plus text-primary fs-5"></i>
                         <span class="font-monospace text-uppercase">Create</span>
                     </div>
                 </div>`;
                 
             gridCellDateMap.push(stringISOTrackingDate);
             totalCellsRendered++;
         }

         $canvas.append(baseLayoutDOMFragments);

         // 3. SEAMLESS MATRIX TRACKING - ORDERED STABLY BY DOCID
         const sequencedEvents = [...structuredEventPayloadData].sort((a, b) => a.docId - b.docId);

         const verticalTrackAllocationMatrix = [];
         const cellMaxTrackHeightRecords = new Array(totalCellsRendered).fill(0);

         sequencedEvents.forEach(eventItem => {
             let startCellIndex = gridCellDateMap.indexOf(eventItem.rawStart);
             let endCellIndex = gridCellDateMap.indexOf(eventItem.rawEnd);

             if (startCellIndex === -1 && endCellIndex === -1) return;
             if (startCellIndex === -1) startCellIndex = 0;
             if (endCellIndex === -1) endCellIndex = gridCellDateMap.length - 1;

             let processingPointer = startCellIndex;

             while (processingPointer <= endCellIndex) {
                 let currentLineRowIndex = Math.floor(processingPointer / 7);
                 let currentLineEndBoundary = (currentLineRowIndex * 7) + 6;
                 let activeSegmentEndCell = Math.min(endCellIndex, currentLineEndBoundary);

                 let segmentCellSpanCount = (activeSegmentEndCell - processingPointer) + 1;

                 let targetVerticalRowSlot = 0;
                 while (true) {
                     let slotIsBlocked = false;
                     for (let c = processingPointer; c <= activeSegmentEndCell; c++) {
                         if (verticalTrackAllocationMatrix[c] && verticalTrackAllocationMatrix[c][targetVerticalRowSlot]) {
                             slotIsBlocked = true;
                             break;
                         }
                     }
                     if (!slotIsBlocked) break;
                     targetVerticalRowSlot++;
                 }

                 for (let c = processingPointer; c <= activeSegmentEndCell; c++) {
                     if (!verticalTrackAllocationMatrix[c]) verticalTrackAllocationMatrix[c] = [];
                     verticalTrackAllocationMatrix[c][targetVerticalRowSlot] = true;
                     
                     if (targetVerticalRowSlot + 1 > cellMaxTrackHeightRecords[c]) {
                         cellMaxTrackHeightRecords[c] = targetVerticalRowSlot + 1;
                     }
                 }

                 let calculatedWidthCSS = "";
                 let customBorders = "border-radius: 4px !important;";

                 if (segmentCellSpanCount > 1) {
                     let additionPixelGaps = segmentCellSpanCount - 1;
                     calculatedWidthCSS = `width: calc(${segmentCellSpanCount * 100}% + ${additionPixelGaps}px - 4px);`;
                     
                     if (processingPointer === startCellIndex && activeSegmentEndCell === endCellIndex) {
                         customBorders = "border-radius: 4px !important;";
                     } else if (processingPointer === startCellIndex) {
                         customBorders = "border-radius: 4px 0px 0px 4px !important;";
                     } else if (activeSegmentEndCell === endCellIndex) {
                         customBorders = "border-radius: 0px 4px 4px 0px !important;";
                     } else {
                         customBorders = "border-radius: 0px !important;";
                     }
                 } else {
                     calculatedWidthCSS = "width: calc(100% - 4px);";
                 }

                 let topOffsetSpacingPx = (targetVerticalRowSlot * 30); 

                 // Elegant minimal ribbon execution
                 const buttonWidgetHTML = `
                     <button class="floating-widget-btn status-${eventItem.statusKey}"
                             data-doc-id="${eventItem.docId}"
                             style="
                                 position: absolute;
                                 top: ${topOffsetSpacingPx}px;
                                 left: 2px;
                                 ${calculatedWidthCSS}
                                 ${customBorders}
                                 z-index: ${20 + targetVerticalRowSlot};
                             "
                             title="${eventItem.orderNumber} - ${eventItem.eventTitle}">
                         <strong class="text-dark">${eventItem.orderNumber}</strong> - <span class="text-muted">${eventItem.eventTitle}</span>
                     </button>`;

                 $(`#widget-tray-idx-${processingPointer}`).append(buttonWidgetHTML);
                 processingPointer = activeSegmentEndCell + 1;
             }
         });

         // 4. AUTO-STRETCH CONTAINER HEIGHTS
         cellMaxTrackHeightRecords.forEach((maxTrackCount, cellIdx) => {
             if (maxTrackCount > 0) {
                 const calculatedContainerHeight = maxTrackCount * 30; 
                 $(`#widget-tray-idx-${cellIdx}`).css("height", calculatedContainerHeight + "px");
             }
         });
     }
 </script> -->

<!-- 4th Design using the border design -->
<style>
    /* SYSTEM CONTAINER DESIGN SCHEMA */
    .calendar-grid-wrapper {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background-color: #dee2e6;
        gap: 1px;
        border: 1px solid #dee2e6;
    }

    .calendar-day-cell {
        background-color: #ffffff;
        min-height: 140px; 
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .spillover-day {
        background-color: #f8f9fa;
    }

    /* TRACK CONTAINER TRAY LAYER */
    .event-widget-container {
        position: relative;
        width: 100%;
        margin-top: 4px;
        margin-bottom: 4px;
        min-height: 30px; 
    }

    /* DUAL-TONE BORDER RIBBON FRAME */
    .floating-widget-btn {
        display: block;
        outline: none;
        font-size: 11px;
        font-weight: 500;
        text-align: left;
        padding: 4px 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 26px;
        line-height: 16px;
        cursor: pointer;
        transition: background-color 0.15s ease, filter 0.15s ease;
    }

    .floating-widget-btn:hover {
        filter: brightness(0.95);
    }

    /* STATUS-SPECIFIC FRAMES (2px Border + Subtle 5% Background Tint) */
    .floating-widget-btn.status-secondary { 
        border: 2px solid #6c757d !important; 
        background-color: rgba(108, 117, 125, 0.05) !important;
        color: #495057 !important;
    }
    .floating-widget-btn.status-info { 
        border: 2px solid #0dcaf0 !important; 
        background-color: rgba(13, 202, 240, 0.05) !important;
        color: #087990 !important;
    }
    .floating-widget-btn.status-success { 
        border: 2px solid #198754 !important; 
        background-color: rgba(25, 135, 84, 0.05) !important;
        color: #146c43 !important;
    }
    .floating-widget-btn.status-warning { 
        border: 2px solid #ffc107 !important; 
        background-color: rgba(255, 193, 7, 0.05) !important;
        color: #664d03 !important;
    }
    .floating-widget-btn.status-dark { 
        border: 2px solid #212529 !important; 
        background-color: rgba(33, 37, 41, 0.05) !important;
        color: #212529 !important;
    }

    /* SUBTLE DISPLAY LABELS FOR INTERNAL RIBBON BADGES */
    .status-text-badge {
        font-weight: 700;
        text-transform: uppercase; /* FIXED: Was text-uppercase: uppercase */
        font-size: 10px;
        margin-right: 4px;
    }

    .calendar-empty-trigger-box {
        position: relative;
        margin-top: auto; 
        z-index: 100;
    }
</style>

<script>
    // GLOBAL CALENDAR CONTEXT
    var currentActiveCalendarMoment = moment();
    var structuredEventPayloadData = [];

    // CORRECTED LIFECYCLE MAP TO MATCH BACKEND INDEX KEYS
    var STATUS_MAP = {
        1: "secondary", // Pencil Book
        2: "info",      // Booked
        3: "success",   // Confirmed
        4: "warning",   // Event Ongoing
        5: "dark"       // Event Ended
    };

    // EXPLICIT TITLE STRING DICTIONARY 
    var STATUS_TEXT_MAP = {
        1: "Pencil Book",
        2: "Booked",
        3: "Confirmed",
        4: "Event Ongoing",
        5: "Event Ended"
    };

    $(document).ready(function () {
        generateMockCalendarPayloadData();

        /* MONTH NAVIGATION CONTROLS */
        $("#btn-prev-calendar").on("click", function (e) {
            e.preventDefault();
            currentActiveCalendarMoment.subtract(1, 'months');
            generateMockCalendarPayloadData();
        });

        $("#btn-next-calendar").on("click", function (e) {
            e.preventDefault();
            currentActiveCalendarMoment.add(1, 'months');
            generateMockCalendarPayloadData();
        });

        $(document).on('click', '.floating-widget-btn', function (e) {
            e.stopPropagation();
            const targetDocId = $(this).data('doc-id');
            if (typeof reviewBooking === "function") {
                reviewBooking(targetDocId);
            }
        });
    });

    function showCalendarSpinnerLoader() {
        let html = `
            <div class="d-flex justify-content-center align-items-center p-5 w-100"
                 style="min-height: 420px; grid-column: span 7;">
                <div class="text-center">
                    <div class="spinner-border text-dark" role="status"></div>
                    <div class="mt-2 small text-muted">Loading calendar...</div>
                </div>
            </div>
        `;
        $("#calendar-grid-canvas").html(html);
    }

    function generateMockCalendarPayloadData() {
        const startOfMonth = moment(currentActiveCalendarMoment).startOf('month');
        const endOfMonth = moment(currentActiveCalendarMoment).endOf('month');

        const propertyFilter = $("#filter-property").val() || "";
        var Search = $("#search-event-order").val();

        /* =========================
           SHOW SPINNER LOADER
        ========================== */
        showCalendarSpinnerLoader();

        var spinner = `
            <span class="spinner-border spinner-border-sm text-dark" role="status"></span>
        `;

        $("#total-bookings").html(spinner);
        $("#confirmed-bookings").html(spinner);

        $.post("dirs/booking/actions/get_event.php", {
            StartDate: startOfMonth.format("YYYY-MM-DD"),
            EndDate: endOfMonth.format("YYYY-MM-DD"),
            Property: propertyFilter,
            Search: Search
        }, function (data) {

            let response;
            try {
                response = JSON.parse(data);
            } catch (e) {
                return;
            }

            if ($.trim(response.isSuccess) === "success") {

                /* =========================
                   EMPTY STATE
                ========================== */
                if (!response.Data || response.Data.length === 0) {
                    $("#total-bookings").text(0);
                    $("#confirmed-bookings").text(0);
                    structuredEventPayloadData = [];
                    renderSystemCalendarGridCanvas(currentActiveCalendarMoment);

                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "warning",
                        title: "No Event Found.",
                        showConfirmButton: false,
                        timer: 2000
                    });
                    return;
                }

                /* =========================
                   KPI UPDATE
                ========================== */
                $("#total-bookings").text(response.TotalBooked || 0);
                $("#confirmed-bookings").text(response.Confirmed || 0);

                /* =========================
                   MAP EVENTS
                ========================== */
                structuredEventPayloadData = response.Data.map(row => ({
                    docId: parseInt(row.DocId, 10),
                    rawStart: moment(row.EventStartDate).format("YYYY-MM-DD"),
                    rawEnd: moment(row.EventEndDate).format("YYYY-MM-DD"),
                    orderNumber: row.PencilCode,
                    eventTitle: row.EventTitle,
                    statusKey: STATUS_MAP[row.DocStatus] || "secondary",
                    statusLabelText: STATUS_TEXT_MAP[row.DocStatus] || "Unknown Status",
                    hotelKey: row.Property
                }));

                /* =========================
                   RENDER CALENDAR
                ========================== */
                renderSystemCalendarGridCanvas(currentActiveCalendarMoment);
            }
        });
    }

    /*Function search */
    $("#search-event-order").on("keydown", function(e) {
        if (e.key === "Enter") {
            generateMockCalendarPayloadData();
        }
    });

    /**
     * CALENDAR GENERATOR - WITH EXPLICIT TEXT LABELS
     */
    function renderSystemCalendarGridCanvas(targetingMomentContext) {
        const $canvas = $("#calendar-grid-canvas").empty().addClass("calendar-grid-wrapper");
        $("#lbl-calendar-month").text(targetingMomentContext.format("MMMM YYYY"));

        const startOfTargetMonth = moment(targetingMomentContext).startOf('month');
        const countDaysInMonth = targetingMomentContext.daysInMonth();
        const leadingWeekdayOffset = startOfTargetMonth.day();

        let totalCellsRendered = 0;
        let baseLayoutDOMFragments = "";
        const gridCellDateMap = [];

        // 1. PREVIOUS MONTH SPILLOVER
        const prevMonthMoment = moment(targetingMomentContext).subtract(1, 'months');
        const totalDaysInPrevMonth = prevMonthMoment.daysInMonth();

        for (let i = leadingWeekdayOffset - 1; i >= 0; i--) {
            const dayNum = totalDaysInPrevMonth - i;
            baseLayoutDOMFragments += `
                <div class="calendar-day-cell spillover-day p-2" data-cell-idx="${totalCellsRendered}">
                    <div class="mb-1"><span class="font-monospace fw-bold text-secondary small">${dayNum}</span></div>
                    <div class="event-widget-container" id="widget-tray-idx-${totalCellsRendered}"></div>
                </div>`;
            gridCellDateMap.push(prevMonthMoment.date(dayNum).format("YYYY-MM-DD"));
            totalCellsRendered++;
        }

        // 2. MAIN ACTIVE MONTH RENDER
        for (let currentDayNum = 1; currentDayNum <= countDaysInMonth; currentDayNum++) {
            const stringISOTrackingDate = moment(targetingMomentContext).date(currentDayNum).format("YYYY-MM-DD");
            
            baseLayoutDOMFragments += `
                <div class="calendar-day-cell p-2" data-date-node="${stringISOTrackingDate}">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="font-monospace fw-bold text-dark small">${currentDayNum}</span>
                    </div>
                    
                    <div class="event-widget-container" id="widget-tray-idx-${totalCellsRendered}"></div>
                    
                    <div class="calendar-empty-trigger-box" onclick="loadForm2('${stringISOTrackingDate}')">
                        <i class="bi bi-plus text-primary fs-5"></i>
                        <span class="font-monospace text-uppercase">Add Event</span>
                    </div>
                </div>`;
                
            gridCellDateMap.push(stringISOTrackingDate);
            totalCellsRendered++;
        }

        $canvas.append(baseLayoutDOMFragments);

        // 3. SEAMLESS MATRIX TRACKING - ORDERED STABLY BY DOCID
        const sequencedEvents = [...structuredEventPayloadData].sort((a, b) => a.docId - b.docId);

        const verticalTrackAllocationMatrix = [];
        const cellMaxTrackHeightRecords = new Array(totalCellsRendered).fill(0);

        sequencedEvents.forEach(eventItem => {
            let startCellIndex = gridCellDateMap.indexOf(eventItem.rawStart);
            let endCellIndex = gridCellDateMap.indexOf(eventItem.rawEnd);

            if (startCellIndex === -1 && endCellIndex === -1) return;
            if (startCellIndex === -1) startCellIndex = 0;
            if (endCellIndex === -1) endCellIndex = gridCellDateMap.length - 1;

            let processingPointer = startCellIndex;

            while (processingPointer <= endCellIndex) {
                let currentLineRowIndex = Math.floor(processingPointer / 7);
                let currentLineEndBoundary = (currentLineRowIndex * 7) + 6;
                let activeSegmentEndCell = Math.min(endCellIndex, currentLineEndBoundary);

                let segmentCellSpanCount = (activeSegmentEndCell - processingPointer) + 1;

                let targetVerticalRowSlot = 0;
                while (true) {
                    let slotIsBlocked = false;
                    for (let c = processingPointer; c <= activeSegmentEndCell; c++) {
                        if (verticalTrackAllocationMatrix[c] && verticalTrackAllocationMatrix[c][targetVerticalRowSlot]) {
                            slotIsBlocked = true;
                            break;
                        }
                    }
                    if (!slotIsBlocked) break;
                    targetVerticalRowSlot++;
                }

                for (let c = processingPointer; c <= activeSegmentEndCell; c++) {
                    if (!verticalTrackAllocationMatrix[c]) verticalTrackAllocationMatrix[c] = [];
                    verticalTrackAllocationMatrix[c][targetVerticalRowSlot] = true;
                    
                    if (targetVerticalRowSlot + 1 > cellMaxTrackHeightRecords[c]) {
                        cellMaxTrackHeightRecords[c] = targetVerticalRowSlot + 1;
                    }
                }

                let calculatedWidthCSS = "";
                let customBorders = "border-radius: 4px !important;";

                if (segmentCellSpanCount > 1) {
                    let additionPixelGaps = segmentCellSpanCount - 1;
                    calculatedWidthCSS = `width: calc(${segmentCellSpanCount * 100}% + ${additionPixelGaps}px - 4px);`;
                    
                    if (processingPointer === startCellIndex && activeSegmentEndCell === endCellIndex) {
                        customBorders = "border-radius: 4px !important;";
                    } else if (processingPointer === startCellIndex) {
                        customBorders = "border-radius: 4px 0px 0px 4px !important;";
                    } else if (activeSegmentEndCell === endCellIndex) {
                        customBorders = "border-radius: 0px 4px 4px 0px !important;";
                    } else {
                        customBorders = "border-radius: 0px !important;";
                    }
                } else {
                    calculatedWidthCSS = "width: calc(100% - 4px);";
                }

                let topOffsetSpacingPx = (targetVerticalRowSlot * 30); 

                const buttonWidgetHTML = `
                    <button class="floating-widget-btn status-${eventItem.statusKey}"
                            data-doc-id="${eventItem.docId}"
                            style=" position: absolute; top: ${topOffsetSpacingPx}px; left: 2px; ${calculatedWidthCSS} ${customBorders}
                                z-index: ${20 + targetVerticalRowSlot};
                            "
                            title="[${eventItem.statusLabelText}] ${eventItem.orderNumber} - ${eventItem.eventTitle}" onclick="openReviewBooking(${eventItem.docId})">
                        <strong>${eventItem.orderNumber}</strong> 
                        <span class="status-text-badge">[${eventItem.statusLabelText}]</span> 
                        - ${eventItem.eventTitle}
                    </button>`;

                $(`#widget-tray-idx-${processingPointer}`).append(buttonWidgetHTML);
                processingPointer = activeSegmentEndCell + 1;
            }
        });

        // 4. AUTO-STRETCH CONTAINER HEIGHTS
        cellMaxTrackHeightRecords.forEach((maxTrackCount, cellIdx) => {
            if (maxTrackCount > 0) {
                const calculatedContainerHeight = maxTrackCount * 30; 
                $(`#widget-tray-idx-${cellIdx}`).css("height", calculatedContainerHeight + "px");
            }
        });
    }
</script>