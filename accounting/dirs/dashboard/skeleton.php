<template id="skeleton-dashboard">
    <div class="container my-1">
        <div class="mb-4">
            <div class="skeleton-loader mb-1" style="height:14px;width:120px;"></div>
            <div class="skeleton-loader mb-1" style="height:14px;width:120px;"></div>
        </div>
            <div class="row">
                <div class=" col-lg-4">
                    <div class="card border-0 shadow rounded-4 bg-white">
                        <div class="card-body p-4 d-flex flex-column gap-2">
                            <div class="skeleton-loader mb-1" style="height:14px;width:120px;"></div>

                            <button type="button" id="notificationBtn" data-bs-toggle="popover" class="btn skeleton-loader text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary">
                                <span>
                                    Notifications
                                </span>
                                <i class="bi bi-chevron-right fs-7 text-muted"></i>
                            </button>
                            <button type="button" class="btn skeleton-loader text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary">
                                <span><i class="bi bi-calendar3 me-2 text-primary"></i> Calendar of Events</span>
                                <i class="bi bi-chevron-right fs-7 text-muted"></i>
                            </button>
                            <button type="button" class="btn skeleton-loader text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary">
                                <span><i class="bi bi-archive me-2 text-dark"></i> Statement of Accounts</span>
                                <i class="bi bi-chevron-right fs-7 text-muted"></i>
                            </button>
                            <button type="button" class="btn skeleton-loader text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary">
                                <span><i class="bi bi-archive me-2 text-dark"></i> Event Orders</span>
                                <i class="bi bi-chevron-right fs-7 text-muted"></i>
                            </button>
                            <button type="button" class="btn skeleton-loader text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary">
                                <span><i class="bi bi-archive me-2 text-dark"></i> Event Orders Contract</span>
                                <i class="bi bi-chevron-right fs-7 text-muted"></i>
                            </button>
                            <button type="button" class="btn skeleton-loader text-start p-3 border rounded-3 fw-medium d-flex align-items-center justify-content-between text-secondary">
                                <span><i class="bi bi-archive me-2 text-dark"></i> Billing Statements</span>
                                <i class="bi bi-chevron-right fs-7 text-muted"></i>
                            </button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-8"> <!-- Display content -->
                    <div class="card border-0 shadow rounded-4 bg-white" >
                        <div class="card-body bg-light-subtle" >
                            <div class="border rounded-3 shadow-sm w-100 mb-2">
                                <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                            </div>
                            <div class="mb-1 justify-content-end d-flex">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-sm mb-0" >
                                        <li class="page-item skeleton-loader">
                                            <a class="page-link shadow-none skeleton-loader" href="#">
                                                <i class="bi bi-chevron-left small"></i>
                                            </a>
                                        </li>
                                        <li class="page-item skeleton-loader">
                                            <a class="page-link shadow-none skeleton-loader" href="#">
                                                <i class="bi bi-chevron-right small"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="justify-content-end d-flex">
                                <div id="page-info-approval" class="mt-1 small text-muted"></div>
                            </div>
                            <div class="card card-body skeleton-loader" style="height: 60vh;">
                            <div class="d-flex flex-column gap-2" id="load_EventApprovalList" ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<!-- Skeleton for Approvals Only -->
<template id="skeleton-approvals">
    <div class="container my-1">
        <div class="mb-4">
            <div class="skeleton-loader mb-1" style="height:14px;width:120px;"></div>
            <div class="skeleton-loader mb-1" style="height:14px;width:120px;"></div>
        </div>
            <div class="row">
                <div class="col-lg-8"> <!-- Display content -->
                    <div class="card border-0 shadow rounded-4 bg-white" >
                        <div class="card-body bg-light-subtle" >
                            <div class="border rounded-3 shadow-sm w-100 mb-2">
                                <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                            </div>
                            <div class="mb-1 justify-content-end d-flex">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-sm mb-0" >
                                        <li class="page-item skeleton-loader">
                                            <a class="page-link shadow-none skeleton-loader" href="#">
                                                <i class="bi bi-chevron-left small"></i>
                                            </a>
                                        </li>
                                        <li class="page-item skeleton-loader">
                                            <a class="page-link shadow-none skeleton-loader" href="#">
                                                <i class="bi bi-chevron-right small"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="justify-content-end d-flex">
                                <div id="page-info-approval" class="mt-1 small text-muted"></div>
                            </div>
                            <div class="card card-body skeleton-loader" style="height: 60vh;">
                            <div class="d-flex flex-column gap-2" id="load_EventApprovalList" ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>


<!-- Skeleton Template 2 for Notification New Documents -->
<template id="skeleton-notification">
    <div class="container my-1">
                <div class="col-lg-12"> 
                </div>
        </div>
</template>




<template id="skeleton-payments">
    <div class="container-fluid">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-light  rounded-circle me-3 skeleton-loader" title="Go back" style="width:40px;height:40px;">
                </button>

                <div>
                    <h5 class="fw-bold text-dark mb-0 skeleton-loader">Payment Transactions</h5>
                    <small class="text-muted skeleton-loader">Customer receivables and payment history</small>
                </div>
            </div>

            <!-- Right Section -->
            <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center gap-2">
                <button type="button" class="btn  skeleton-loader">
                    Customer Ledger
                </button>
                <button type="button" class="btn  skeleton-loader">
                    Post Payment
                </button>
                <button type="button" class="btn  skeleton-loader">
                    Post Amendment
                </button>
                <button type="button" class="btn  skeleton-loader">
                    Add Charges
                </button>
                <button type="button" class="btn  skeleton-loader">
                    Refresh
                </button>
            </div>
        </div>
        <!-- Statement of ACcount Table -->
        <div class="mb-1 justify-content-end d-flex">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm mb-0" >
                    <li class="page-item skeleton-loader">
                        <a class="page-link shadow-none skeleton-loader" href="#">
                            <i class="bi bi-chevron-left small"></i>
                        </a>
                    </li>
                    <li class="page-item skeleton-loader">
                        <a class="page-link shadow-none skeleton-loader" href="#">
                            <i class="bi bi-chevron-right small"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="justify-content-end d-flex">
            <div class="mt-1 small text-muted"></div>
        </div>
            <div class="table-responsive border shadow overflow-auto" style="height: 100vh;">
                <table class="table table-sm table-bordered align-middle mb-0" style="font-size: 13px;">

                    <thead class="sticky-top border-bottom align-middle" style="z-index: 5; height: 52px;">
                            <tr class="text-muted text-sm">
                                <th></th>
                                <th>
                                    <div class="skeleton-loader" style="height:14px;width:120px;"></div>
                                </th>
                                <th>
                                    <div class="skeleton-loader" style="height:14px;width:120px;"></div>
                                </th>
                                <th>
                                    <div class="d-flex gap-1">
                                        <div class="skeleton-loader" style="height:14px;width:120px;"></div>
                                       <div class="skeleton-loader" style="height:14px;width:800px;"></div>
                                    </div>
                                </th>
                                <th>
                                    <div class="skeleton-loader" style="height:14px;width:120px;">
                                    </div>
                                </th>
                                <th>
                                    <div class="skeleton-loader" style="height:14px;width:120px;"></div>
                                </th>
                                <th class="text-center" style="width:200px;">
                                </th>

                                <th class="text-center" style="width:200px;">
                                </th>

                                <th class="text-center" style="width:200px;">
                                </th>
                            </tr>
                        <tr class="text-uppercase">
                            <th class="text-center skeleton-loader" style="width: 10px;">
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </th>
                            <th class="ps-4 fw-bold skeleton-loader" style="width: 120px;">
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </th>
                            <th class="ps-4 fw-bold skeleton-loader" style="width: 150px;">
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </th>
                            <th class="fw-bold text-center skeleton-loader">
                                <div class="skeleton-loader" style="height:14px;width:1000px;">
                                </div>
                            </th>
                            <th class="fw-bold text-center skeleton-loader">
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </th>
                            <th class="fw-bold text-center skeleton-loader" style="width: 200px;">
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </th>
                            <th class="fw-bold text-center skeleton-loader" style="width: 200px;">
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </th>
                            <th class="fw-bold text-center skeleton-loader" style="width: 200px;">
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </th>
                            <th class="fw-bold text-center skeleton-loader" style="width: 200px;">
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:1000px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:1000px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:1000px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:1000px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:1000px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:1000px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:1000px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:1000px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <td>
                                <div class="skeleton-loader" style="height:14px;width:120px;">
                                </div>
                            </td>
                            <tr>
                                <td>
                                    <div class="skeleton-loader" style="height:14px;width:120px;">
                                    </div>
                                </td>
                                <td>
                                    <div class="skeleton-loader" style="height:14px;width:120px;">
                                    </div>
                                </td>
                                <td>
                                    <div class="skeleton-loader" style="height:14px;width:120px;">
                                    </div>
                                </td>
                                <td>
                                    <div class="skeleton-loader" style="height:14px;width:1000px;">
                                    </div>
                                </td>
                                <td>
                                    <div class="skeleton-loader" style="height:14px;width:120px;">
                                    </div>
                                </td>
                                <td>
                                    <div class="skeleton-loader" style="height:14px;width:120px;">
                                    </div>
                                </td>
                                <td>
                                    <div class="skeleton-loader" style="height:14px;width:120px;">
                                    </div>
                                </td>
                                <td>
                                    <div class="skeleton-loader" style="height:14px;width:120px;">
                                    </div>
                                </td>
                                <td>
                                    <div class="skeleton-loader" style="height:14px;width:120px;">
                                    </div>
                                </td>
                                <tr>
                                    <td>
                                        <div class="skeleton-loader" style="height:14px;width:120px;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="skeleton-loader" style="height:14px;width:120px;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="skeleton-loader" style="height:14px;width:120px;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="skeleton-loader" style="height:14px;width:1000px;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="skeleton-loader" style="height:14px;width:120px;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="skeleton-loader" style="height:14px;width:120px;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="skeleton-loader" style="height:14px;width:120px;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="skeleton-loader" style="height:14px;width:120px;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="skeleton-loader" style="height:14px;width:120px;">
                                        </div>
                                    </td>
                                    <tr>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:1000px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:1000px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="skeleton-loader" style="height:14px;width:120px;">
                                            </div>
                                        </td>
                                    </tr>
                                </tr>
                            </tr>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
    </div>

</template>

<style>
    .skeleton-loader {
        position: relative;
        overflow: hidden;
        background: #e9ecef;
        border-radius: 6px;

        color: transparent !important;
        user-select: none;
        pointer-events: none;
    }

    /* Hide selected text */
    .skeleton-loader::selection {
        background: transparent;
        color: transparent;
    }

    .skeleton-loader * {
        color: transparent !important;
        user-select: none;
    }

    .skeleton-loader *::selection {
        background: transparent;
        color: transparent;
    }

    .skeleton-loader::after {
        content: "";
        position: absolute;
        top: 0;
        left: -150px;
        width: 150px;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,0.6),
            transparent
        );
        animation: shimmer 1.2s infinite;
    }

    @keyframes shimmer {
        100% {
            left: 100%;
        }
    }
</style>