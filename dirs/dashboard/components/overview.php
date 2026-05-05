<div class="card border-0 shadow-lg calendar-wrapper">
    <div class="card-header bg-transparent border-0 pt-4">
        <div class="d-flex justify-content-between align-items-center px-2">
            <!-- Navigation Left -->
            <button class="btn btn-sm btn-outline-gold px-3" id="prev">
                <i class="bi bi-chevron-left"></i> Prev
            </button>

            <!-- Centered Header -->
            <div class="text-center">
                <h5 id="monthDisplay" class="mb-0 fw-bold text-gold text-uppercase tracking-wider"></h5>
                <input type="month" id="calendarPicker" class="form-control form-control-sm mt-2 border-gold-light">
            </div>

            <!-- Navigation Right -->
            <button class="btn btn-sm btn-outline-gold px-3" id="next">
                Next <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <!-- Weekday Labels -->
        <div class="calendar-day-labels text-center mb-2">
            <div class="label-gold">Sun</div>
            <div class="label-gold">Mon</div>
            <div class="label-gold">Tue</div>
            <div class="label-gold">Wed</div>
            <div class="label-gold">Thu</div>
            <div class="label-gold">Fri</div>
            <div class="label-gold">Sat</div>
        </div>

        <!-- Scrollable Grid Area -->
        <div class="calendar-scroll-container custom-scrollbar" style="height: 60vh; overflow: auto; overscroll-behavior: contain;">
            <div id="calendarGrid" class="calendar-grid" style="min-width: 800px;"> <!-- Min-width ensures horizontal scroll on mobile -->
            </div>
        </div>
    </div>
</div>
<style>
  :root {
      --gold-metallic: #d4af37;
      --gold-dark: #b8860b;
      --gold-soft: #fffdf2;
      --bg-off-white: #f4f7f6;
  }

  /* Main Container Background */
  .col-lg-8 {
      background-color: var(--bg-off-white);
      padding: 20px;
      border-radius: 12px;
  }

  /* Navigation & Header */
  .text-gold { color: var(--gold-dark) !important; }
  .tracking-wider { letter-spacing: 1px; }

  .btn-outline-gold {
      color: var(--gold-metallic);
      border-color: var(--gold-metallic);
      transition: 0.3s;
  }

  .btn-outline-gold:hover {
      background-color: var(--gold-metallic);
      color: white;
  }

  .border-gold-light {
      border: 1px solid #e0d1a3;
      color: var(--gold-dark);
  }

  /* Grid Logic: Use Grid instead of Flex to fix the Saturday issue */
  .calendar-day-labels, .calendar-grid {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 10px;
  }

  .label-gold {
      font-weight: bold;
      color: var(--gold-dark);
      font-size: 0.85rem;
      text-transform: uppercase;
      padding-bottom: 5px;
  }

  /* Individual Day Card */
  .calendar-card {
      min-height: 130px;
      background: #ffffff;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      display: flex;
      flex-direction: column;
      transition: transform 0.2s;
  }

  .calendar-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  }

  .today-card {
      background-color: var(--gold-soft) !important;
      border: 2px solid var(--gold-metallic) !important;
  }

  .other-month {
      background-color: #f9f9f9 !important;
      opacity: 0.5;
  }

  .date-label {
      font-size: 0.8rem;
      padding: 5px 8px;
      color: #666;
  }

  /* Event Badges */
  .event-badge {
      background-color: #fcf8e3;
      border-left: 3px solid var(--gold-metallic);
      color: #856404;
      font-size: 0.72rem;
      padding: 5px;
      margin: 2px 4px;
      border-radius: 4px;
      line-height: 1.2;
  }

  .event-badge i {
      color: var(--gold-metallic);
  }
</style>


<script>
 var currentDisplayDate = moment();
 var eventData = [];

 $(document).ready(function() {
     initCalendar();
 });

 function initCalendar() {
     const picker = document.getElementById('calendarPicker');
     picker.value = currentDisplayDate.format('YYYY-MM');

     picker.addEventListener('change', function() {
         currentDisplayDate = moment(this.value);
         displayCalendarEvents();
     });

     displayCalendarEvents();
 }

 function displayCalendarEvents() {
     var Month = currentDisplayDate.format('MM');
     var Year = currentDisplayDate.format('YYYY');

     // Update UI Header
     document.getElementById('monthDisplay').innerText = currentDisplayDate.format('MMMM YYYY');
     document.getElementById('calendarPicker').value = currentDisplayDate.format('YYYY-MM');

     $.post("dirs/dashboard/actions/get_calendarofevent.php", {
         Month: Month,
         Year: Year
     }, function(data) {
         try {
             var response = JSON.parse(data);
             eventData = (response.isSuccess === "success") ? response.Data : [];
         } catch(e) {
             eventData = [];
         }
         renderCalendar();
     });
 }

 function renderCalendar() {
     // --- STEP 1: RESET GRID ---
     const grid = document.getElementById('calendarGrid');
     const monthLabel = document.getElementById('monthDisplay');
     grid.innerHTML = '';
     monthLabel.innerText = currentDisplayDate.format('MMMM YYYY');

     // --- STEP 2: CALCULATE DATE RANGE ---
     // Get the start and end of the week for the current month view
     const startDay = currentDisplayDate.clone().startOf('month').startOf('week');
     const endDay = currentDisplayDate.clone().endOf('month').endOf('week');
     let date = startDay.clone().subtract(1, 'day');

     // --- STEP 3: LOOP THROUGH EACH CALENDAR DAY ---
     while (date.isBefore(endDay, 'day')) {
         date.add(1, 'day');
         
         // Check cell properties
         const isToday = date.isSame(moment(), 'day') ? 'today-card' : '';
         const isOtherMonth = !date.isSame(currentDisplayDate, 'month') ? 'other-month' : '';
         
         // --- STEP 4: FILTER AND MAP EVENTS FOR THIS DATE ---
         let dayEvents = eventData.filter(ev => {
             const mStart = moment(ev.StartDateTime).startOf('day');
             const mEnd = moment(ev.EndDateTime).endOf('day');
             return date.isBetween(mStart, mEnd, null, '[]'); 
         });

         let eventHtml = dayEvents.map(ev => {
             const isStart = date.isSame(moment(ev.StartDateTime), 'day');
             const isEnd = date.isSame(moment(ev.EndDateTime), 'day');
             
             let statusText = "";
             let badgeClass = "event-badge shadow-sm";
             
             // Logic for badge status icon and text
             if (isStart) {
                 statusText = `<i class="bi bi-play-fill"></i> Starts ${moment(ev.StartDateTime).format('h:mm A')}`;
             } else if (isEnd) {
                 statusText = `<i class="bi bi-stop-fill"></i> Ends ${moment(ev.EndDateTime).format('h:mm A')}`;
             } else {
                 statusText = `<i class="bi bi-arrow-right-short"></i> Continued`;
                 badgeClass += " opacity-75 ongoing-day"; 
             }

             return `
                 <div class="${badgeClass}" title="${ev.EventName} at ${ev.Hotel}">
                     <div class="d-flex align-items-center gap-1 mb-1" style="font-size: 0.6rem;">
                         <span>${statusText}</span>
                     </div>
                     <div class="fw-bold text-truncate" style="font-size: 0.75rem;">${ev.EventName}</div>
                     ${isStart ? `<div class="small opacity-75 text-truncate"><i class="bi bi-geo-alt-fill"></i> ${ev.FunctionRoom}</div>` : ''}
                 </div>
             `;
         }).join('');

         // --- STEP 5: RENDER THE CELL ---
         const dayCell = document.createElement('div');
         dayCell.innerHTML = `
             <div class="calendar-card ${isToday} ${isOtherMonth}">
                 <div class="text-end p-1">
                     <small class="date-label fw-bold">${date.date()}</small>
                 </div>
                 <div class="flex-grow-1 overflow-auto px-1 pb-1" style="max-height: 100px;">
                     ${eventHtml}
                 </div>
             </div>
         `;
         grid.appendChild(dayCell);
     }
 }
 // Navigation Listeners
 document.getElementById('prev').onclick = () => {
     currentDisplayDate.subtract(1, 'month');
     displayCalendarEvents();
 };

 document.getElementById('next').onclick = () => {
     currentDisplayDate.add(1, 'month');
     displayCalendarEvents();
 };
</script>