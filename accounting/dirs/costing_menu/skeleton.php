<template id="sekeleton-dashboard">
    <div class="container">
        <div class="d-flex mb-4 align-items-center gap-3">
            <div>
                <h5 class="fw-bold text-dark mb-1 skeleton-loader">Costing Dashboard</h5>
                <p class="text-muted small mb-0 skeleton-loader">Manage menu, equipment, and production cost analysis.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12 col-sm-6 col-md-4 col-xl-4">
                <div class="card border-0 shadow rounded-4 bg-white p-3 h-100 skeleton-loader">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-secondary-subtle text-secondary rounded-3 d-flex align-items-center justify-content-center shadow" style="width: 44px; height: 44px;">
                            <i class="bi bi-gear fs-5"></i>
                        </div>
                        <div>
                            <span class="text-secondary small fw-medium d-block mb-0 skeleton-loader">Menu Configuration</span>
                            <h4 class="fw-bold text-dark mb-0 skeleton-loader">1,240</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-xl-4">
                <div class="card border-0 shadow rounded-4 bg-white p-3 h-100 skeleton-loader">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-secondary-subtle text-secondary rounded-3 d-flex align-items-center justify-content-center shadow" style="width: 44px; height: 44px;">
                            <i class="bi bi-gear fs-5"></i>
                        </div>
                        <div>
                            <span class="text-secondary small fw-medium d-block mb-0 skeleton-loader">Menu Configuration</span>
                            <h4 class="fw-bold text-dark mb-0 skeleton-loader">1,240</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<!-- template for food menu form -->
<template id="skeleton-food-form">
    <div class="row g-3 shadow-sm">
        <div class="col-md-2">
            <div class="card shadow-sm skeleton-loader">
                <div class="card-header bg-secondary-subtle fw-bold">
                    <h6 class="skeleton-loader">Item Identity</h6>
                </div>

                <div class="card-body">

                    <div class="mb-2">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1 skeleton-loader" class="form-label">Item SKU</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1" class="form-label">Item Name</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1">
                            Menu Category
                        </label>

                        <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1">
                            Sub-category
                        </label>

                        <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1" class="form-label">Yield (Servings)</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1" class="form-label">Selling Price</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    

                    <div>
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1" class="form-label">Description</label>
                        <div class="skeleton-loader rounded-3" style="height: 68px;"></div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Cost Analysis -->
        <div class="col-md-2">
            <div class="card shadow-sm skeleton-loader">
                <div class="card-header bg-secondary-subtle fw-bold">
                   <h6 class="skeleton-loader">Costing</h6>
                </div>

                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1" class="form-label">Overhead Allocation</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1">Total Recipe Cost</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1">Cost Per Serving</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1">Final Price (incl. tax)</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1">Gross Profit per Dish</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    <div>
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1">Food Cost %</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1">Discounted %</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1">Discounted Price</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label skeleton-loader small text-muted fw-medium mb-1">VAT Rate</label>
                            <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recipe Formula -->
        <div class="col-md-8">
            <div class="row">
               <div class="col-md-12">
                   <div class="card shadow-sm overflow-auto" style="height: 60vh;">
                       <div class="card-header bg-secondary-subtle">
                           <div class="justify-content-end d-flex">
                               <button type="button" class="btn btn-sm skeleton-loader" title="Add Ingredient">
                                   <i class="bi bi-plus fs-5"></i>Add Item
                               </button>
                           </div>
                       </div>
                       <div class="card-body">
                           <h6 class="skeleton-loader">Ingredients Recipe (BOM)</h6>
                               <table class="table table-sm table-bordered align-middle mb-0">
                                   <thead class="table-secondary text-muted small">
                                       <tr>
                                           <th colspan="6">
                                                <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                                           </th>
                                       </tr>
                                       <tr>
                                           <th scope="col" class="text-center skeleton-loader">Ingredient</th>
                                           <th scope="col" class="text-center skeleton-loader">Qty</th>
                                           <th scope="col" class="text-center skeleton-loader" title="Unit of Measurement">UOM</th>
                                           <th scope="col" class="text-center skeleton-loader">Unit Cost</th>
                                           <th scope="col" class="text-center skeleton-loader">Amount</th>
                                           <th scope="col" class="text-center skeleton-loader"></th>
                                       </tr>
                                   </thead>

                                   <tbody id="ingredient-body">

                                       <tr>
                                            <td>
                                                <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                                           </td>

                                            <td>
                                                <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                                           </td>

                                           <td>
                                               <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                                           </td>

                                            <td>
                                                <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                                           </td>

                                            <td>
                                                <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                                           </td>

                                           <td class="text-center">
                                               <a href="#" class="text-danger skeleton-loader">
                                                   <i class="bi bi-trash3"></i>
                                               </a>
                                           </td>
                                       </tr>

                                   </tbody>

                               </table>
                       </div>
                       <div class="card-footer">
                           <div class="row">
                               <div class="col-md-12">
                                   <label class="form-label skeleton-loader small text-muted fw-medium mb-1" class="form-label">Serving Size</label>
                                    <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                               </div>
                              <div class="col-md-6">
                                  <label class="form-label skeleton-loader small text-muted fw-medium mb-1">
                                      Prep Time
                                  </label>
                                  <div class="input-group input-group-sm">
                                      <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                                      <span class="input-group-text skeleton-loader">Hour(s)</span>

                                      <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                                      <span class="input-group-text skeleton-loader">Min(s)</span>
                                  </div>
                              </div>
                               <div class="col-md-6">
                                   <label class="form-label skeleton-loader small text-muted fw-medium mb-1" class="form-label">Cook Time</label>
                                   <div class="input-group input-group-sm">
                                       <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                                       <span class="input-group-text skeleton-loader">Hour(s)</span>

                                       <div class="skeleton-loader rounded-3" style="height: 38px;"></div>
                                       <span class="input-group-text skeleton-loader">Min(s)</span>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
        <div class="justify-content-end d-flex mt-2 mb-3 gap-2">
            <button type="button" id="btn-submit-account" class="skeleton-loader btn  rounded-3 fw-medium">
                <span class="spinner-border spinner-border-sm d-none me-1" id="btn-spinner-account" role="status" aria-hidden="true"></span>
                <span class="btn-text-account">Save</span>
            </button>
            <button type="reset" class="btn  rounded-3 fw-medium skeleton-loader" >
                Reset
            </button>
            <button type="reset" class="btn  rounded-3 fw-medium skeleton-loader">
                Cancel
            </button>
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