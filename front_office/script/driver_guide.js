// $(document).on("click", "a[menucode='eventorder']", function () {
//   setTimeout(() => {
//     startTour(); // or a different tour for EO
//   }, 800); // wait for content load
// });

// $(document).on("click", "a[menucode='calendar_events']", function () {
//   let menucode = $(this).attr("menucode");

//   $("#main-content").load("modules/" + menucode + ".php", function () {
//     // ✅ Content is now loaded → safe to start
//     startTour();
//   });
// });

// function startTour() {
//   const driver = window.driver.js.driver;

//   const tour = driver({
//     showProgress: true,
//     animate: true,
//     smoothScroll: true,
//     steps: [
//       {
//         element: '#btn-toggle-sidebar',
//         popover: {
//           title: 'Sidebar Toggle',
//           description: 'Click here to collapse or expand the sidebar.'
//         }
//       },
//       {
//         element: '#notif-bell',
//         popover: {
//           title: 'Notifications',
//           description: 'Check event order updates here.'
//         }
//       },
//       {
//         element: '#menu-calendar',
//         popover: {
//           title: 'Hotel Event',
//           description: 'View and manage all scheduled events.'
//         }
//       },
//       {
//         element: '#menu-eventorder',
//         popover: {
//           title: 'Event Order',
//           description: 'Create and manage event orders here.'
//         }
//       },
//       {
//         element: '#main-content',
//         popover: {
//           title: 'Main Workspace',
//           description: 'This is where your selected module will load.'
//         }
//       },
//       {
//         element: '#menu-help',
//         popover: {
//           title: 'Help Section',
//           description: 'Click here anytime to replay this guide.'
//         }
//       }
//     ]
//   });

//   tour.drive();
// }
$(document).on("click", "a[name='menu']", function () {
  let menucode = $(this).attr("menucode");
  loadPage(menucode);
});

function startHelpTour() {
  clearTour();
  initTour();
}


let tour = null;

/* =========================
   STEP MAP (CLEAN ORDER)
========================= */
const STEP = {
  SIDEBAR: 0,
  NOTIF: 1,

  CALENDAR_CLICK: 2,
  CALENDAR_PAGE: 3,

  AMENDMENT_CLICK: 4,
  AMENDMENT_PAGE: 5,

  EO_CLICK: 6,
  EO_PAGE: 7,

  SETTINGS_CLICK: 8,
  SETTINGS_PAGE: 9,

  HELP: 10,
  FINAL: 11
};


/* =========================
   INIT TOUR
========================= */
function initTour() {
  const driver = window.driver.js.driver;

  tour = driver({
    showProgress: true,
    animate: true,
    smoothScroll: true,
    allowClose: false,
    overlayClickNext: false,
    disableActiveInteraction: true,

    steps: getSteps(),

    onDestroyed: () => {
      clearTour();
    }
  });

  tour.drive(0);
}


/* =========================
   STEPS
========================= */
function getSteps() {
  return [
    /* 1 - SIDEBAR */
    {
      element: '#btn-toggle-sidebar',
      popover: {
        title: 'Sidebar',
        description: 'Toggle navigation menu.'
      }
    },

    /* 2 - NOTIFICATION */
    {
      element: '#notif-bell',
      popover: {
        title: 'Notifications',
        description: 'Check updates here',
        onNextClick: () => {
          tour.moveTo(STEP.CALENDAR_CLICK);
        }
      }
    },

    /* 3 - CALENDAR CLICK */
    {
      element: '#menu-calendar',
      popover: {
        title: 'Hotel Event',
        description: 'Open Calendar module',

        onNextClick: () => {
          goToStepWithPage("calendar_events", STEP.CALENDAR_PAGE);
        }
      }
    },

    /* 4 - CALENDAR PAGE */
    {
      element: '#main-content',
      popover: {
        title: 'Calendar of Events',
        description: 'Calendar loaded successfully'
      }
    },

    /* 5 - AMENDMENT CLICK */
    {
      element: '#menu-amendment',
      popover: {
        title: 'Event Amendment',
        description: 'Open Amendment module',

        onNextClick: () => {
          goToStepWithPage("ammendment", STEP.AMENDMENT_PAGE);
        }
      }
    },

    /* 6 - AMENDMENT PAGE */
    {
      element: '#main-content',
      popover: {
        title: 'Amendment Documents',
        description: 'Update event changes here'
      }
    },

    /* 7 - EVENT ORDER CLICK */
    {
      element: '#menu-eventorder',
      popover: {
        title: 'Event Order',
        description: 'Open Event Order module',

        onNextClick: () => {
          goToStepWithPage("eventorder", STEP.EO_PAGE);
        }
      }
    },

    /* 8 - EVENT ORDER PAGE */
    {
      element: '#main-content',
      popover: {
        title: 'Event Orders Master Record',
        description: 'Manage event orders and generate report here'
      }
    },

    /* 9 - SETTINGS CLICK */
    {
      element: '#menu-settings',
      popover: {
        title: 'Settings',
        description: 'Open system settings',

        onNextClick: () => {
          goToStepWithPage("settings", STEP.SETTINGS_PAGE);
        }
      }
    },

    /* 10 - SETTINGS PAGE */
    {
      element: '#main-content',
      popover: {
        title: 'Account Settings',
        description: 'This is wher you manage profile, security, and system settings'
      }
    },

    /* 11 - HELP */
   {
     element: '#menu-help',
     popover: {
       title: 'Help',
       description: 'Click to open help system guidelines',

       onNextClick: () => {
         window.location.reload();
       }
     }
   },

  ];
}


/* =========================
   PAGE LOADER (FIXED)
========================= */
function loadPage(menucode, callback = null) {
  let file = getPagePath(menucode);

  $("#main-content").load(file, function (response, status) {
    if (status === "error") {
      console.error("Failed loading:", file);
      return;
    }

    $("a[name='menu']").removeClass("active");
    $("a[menucode='" + menucode + "']").addClass("active");

    if (callback) callback();
  });
}


/* =========================
   SAFE TOUR NAVIGATION
========================= */
function goToStepWithPage(menucode, nextStepIndex) {
  if (!tour) return;

  loadPage(menucode, function () {
    setTimeout(() => {
      requestAnimationFrame(() => {
        tour.moveTo(nextStepIndex);
      });
    }, 200); // IMPORTANT: prevents skipping
  });
}


/* =========================
   HELP MODAL
========================= */
function showHelp() {
  let modalEl = document.getElementById('mdl-help');
  let modal = new bootstrap.Modal(modalEl);
  modal.show();
}


/* =========================
   CLEANUP
========================= */
function clearTour() {
  localStorage.removeItem("tour_step");
  localStorage.removeItem("tour_done");
}


/* =========================
   PAGE ROUTER
========================= */
function getPagePath(menucode) {
  switch (menucode) {
    case "calendar_events":
      return "dirs/calendar_events/calendar_events.php";
    case "ammendment":
      return "dirs/ammendment/ammendment.php";
    case "eventorder":
      return "dirs/eventorder/eventorder.php";
    case "settings":
      return "dirs/settings/settings.php";
    default:
      return "";
  }
}


/* =========================
   HELP CLICK OVERRIDE
========================= */
$(document).on("click", "#menu-help", function (e) {
  e.preventDefault();
  showHelp();
});