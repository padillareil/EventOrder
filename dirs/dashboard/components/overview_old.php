<div class="row g-4">
    <div class="col-lg-8">
      <div class="card border-0 overflow-auto" style="height: 65vh;">
          <div id="CalendarofEvents"></div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card border-0" style="height: 65vh;">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
          <h5 class="fw-bold mb-0">Notification Feed</h5>
        </div>
        <div class="card-body p-0 overflow-auto">
          <div class="list-group list-group-flush">

            <div class="list-group-item p-4 border-0 border-bottom bg-light bg-opacity-50">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill">Draft</span>
                <small class="text-muted">EO-2026-003</small>
              </div>
              <h6 class="fw-bold mb-1">Wedding: Tan-Garcia</h6>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt me-1"></i> Sky Lounge</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="small fw-semibold text-dark">Maria Tan</span>
                <span class="small text-muted">June 15</span>
              </div>
            </div>
            
            <div class="list-group-item p-4 border-0 border-bottom">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Approved</span>
                <small class="text-muted">EO-2026-002</small>
              </div>
              <h6 class="fw-bold mb-1">Tech Innovators Gala</h6>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt me-1"></i> Grand Ballroom</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="small fw-semibold text-dark">Google Philippines</span>
                <span class="small text-muted">May 10</span>
              </div>
            </div>

            <div class="list-group-item p-4 border-0 border-bottom bg-light bg-opacity-50">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill">Draft</span>
                <small class="text-muted">EO-2026-001</small>
              </div>
              <h6 class="fw-bold mb-1">Wedding: Tan-Garcia</h6>
              <p class="text-muted small mb-2"><i class="bi bi-geo-alt me-1"></i> Sky Lounge</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="small fw-semibold text-dark">Maria Tan</span>
                <span class="small text-muted">June 15</span>
              </div>
            </div>



          </div>
        </div>
        <div class="card-footer">
          <div class="justify-content-center d-flex">
            <a href="#">View all</a>
          </div>
        </div>
      </div>
    </div>

</div>


<script>
$(document).ready(function () {

  $('#CalendarofEvents').bsCalendar({

    topbarAddons: [],
    sidebarAddons: [],
    showAddButton: false,

    url: function (query) {

      return new Promise(function (resolve, reject) {

        $.ajax({
          url: "dirs/dashboard/actions/get_calendarofevent.php",
          type: "POST",
          data: {
            mMonth: query.fromDate ? new Date(query.fromDate).getMonth() + 1 : null,
            mYear: query.fromDate ? new Date(query.fromDate).getFullYear() : null
          },
          success: function (data) {

            let response = JSON.parse(data);

            if (response.isSuccess === "success") {

              const events = (response.Data || [])
                .map(e => ({

                  // ✅ REQUIRED FIELDS FOR BS-CALENDAR
                  title: safeString(e.EventName),

                  // 🔥 DIRECT DATETIME FROM DB (NO MORE BUILDING)
                  start: safeString(e.StartDateTime),
                  end: safeString(e.EndDateTime),

                  // Optional display info
                  description: buildDescription(e)

                }))
                .filter(e =>
                  e.title &&
                  e.start &&
                  e.end
                );

              resolve(events);

            } else {
              reject(response.Data);
            }

          },
          error: function (err) {
            reject(err);
          }
        });

      });

    }

  });

});


// ===============================
// 🔥 HELPERS
// ===============================

function safeString(value) {
  return (value ?? "").toString().trim();
}

function buildDescription(e) {
  return `
    Hotel: ${e.Hotel ?? "-"} |
    Room: ${e.FunctionRoom ?? "-"}
  `.trim();
}

</script>