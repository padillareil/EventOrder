<template id="calendar-skeleton">
    <div class="calendar-cells-matrix-grid calendar-skeleton-wrapper">

        <!-- 42 cells = full calendar month view -->
        <!-- generated skeleton cells -->

        <div class="calendar-day-cell is-loading-skeleton">
            <div class="event-widget-container"></div>
        </div>
        <div class="calendar-day-cell is-loading-skeleton">
            <div class="event-widget-container"></div>
        </div>
        <div class="calendar-day-cell is-loading-skeleton">
            <div class="event-widget-container"></div>
        </div>
        <div class="calendar-day-cell is-loading-skeleton">
            <div class="event-widget-container"></div>
        </div>
        <div class="calendar-day-cell is-loading-skeleton">
            <div class="event-widget-container"></div>
        </div>
        <div class="calendar-day-cell is-loading-skeleton">
            <div class="event-widget-container"></div>
        </div>
        <div class="calendar-day-cell is-loading-skeleton">
            <div class="event-widget-container"></div>
        </div>

        <div class="calendar-day-cell is-loading-skeleton"><div class="event-widget-container"></div></div>
        <div class="calendar-day-cell is-loading-skeleton"><div class="event-widget-container"></div></div>
        <div class="calendar-day-cell is-loading-skeleton"><div class="event-widget-container"></div></div>
        <div class="calendar-day-cell is-loading-skeleton"><div class="event-widget-container"></div></div>
        <div class="calendar-day-cell is-loading-skeleton"><div class="event-widget-container"></div></div>
        <div class="calendar-day-cell is-loading-skeleton"><div class="event-widget-container"></div></div>
        <div class="calendar-day-cell is-loading-skeleton"><div class="event-widget-container"></div></div>

        <!-- (repeat until 42 cells total for full grid stability) -->

    </div>
</template>

<style>
    /* =========================
       CALENDAR GRID SYSTEM
    ========================= */

    .calendar-days-heading-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        font-weight: 600;
        color: #495057;
        border-radius: 8px;
    }

    .calendar-cells-matrix-grid {
        display: grid;
        grid-template-columns: repeat(7, minmax(0, 1fr)); /* 🔥 FIX 1 */
        gap: 10px;
        width: 100%; /* 🔥 FIX 2 */
        align-items: stretch;
    }

    /* =========================
       CALENDAR DAY CELL
    ========================= */

    .calendar-day-cell {
        min-height: 110px;
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        padding: 10px;
        transition: all 0.2s ease;
    }

    .calendar-day-cell:hover {
        background: #f8f9fa;
        border-color: #dee2e6;
        box-shadow: 0 6px 14px rgba(0,0,0,0.05);
    }

    /* =========================
       EVENT CONTAINER
    ========================= */

    .event-widget-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    /* =========================
       LOADING STATE (SKELETON)
    ========================= */

    @keyframes skeletonShimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }

    .is-loading-skeleton {
        position: relative;
        overflow: hidden;
        background: #f6f7f8 !important;
        border-color: #f1f3f5 !important;
        pointer-events: none;
    }

    /* shimmer base layer */
    .is-loading-skeleton .event-widget-container::before,
    .is-loading-skeleton .event-widget-container::after {
        content: "";
        display: block;
        background: linear-gradient(
            90deg,
            #eceeef 25%,
            #f6f7f8 50%,
            #eceeef 75%
        );
        background-size: 200% 100%;
        animation: skeletonShimmer 1.3s infinite linear;
        border-radius: 6px;
    }

    /* small "date" line */
    .is-loading-skeleton .event-widget-container::before {
        width: 35%;
        height: 14px;
        margin-bottom: 8px;
    }

    /* main "event" line */
    .is-loading-skeleton .event-widget-container::after {
        width: 90%;
        height: 22px;
    }

    /* =========================
       ADD EVENT BUTTON
    ========================= */

    .calendar-empty-trigger-box {
        margin-top: auto;
        text-align: center;
        padding: 6px;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.2s ease;
        color: #6c757d;
        font-size: 11px;
    }

    .calendar-empty-trigger-box:hover {
        background: #f1f3f5;
        color: #0d6efd;
    }
</style>