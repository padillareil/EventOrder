<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="input-group border mr-2 bg-light px-3 flex-grow-1" style="max-width: 300px;">
        <span class="input-group-text bg-transparent border-0 p-0 me-2">
            <i class="bi bi-search text-muted small"></i>
        </span>
        <input type="search" class="form-control bg-transparent border-0 small py-2 shadow-none" id="search-general" placeholder="Search...">
    </div>
    <div class="btn-group shadow-sm" role="group" aria-label="Tool Group">
        <button type="button" class="btn btn-outline-secondary btn-sm" title="Create New" onclick="modalCreate()">
            <i class="bi bi-plus-lg"></i> Create
        </button>
        <button type="button" class="btn btn-outline-secondary btn-sm" title="Download Excel Form">
            <i class="bi bi-download"></i> Download
        </button>
        <button type="button" class="btn btn-outline-secondary btn-sm" title="Upload CSV Form">
            <i class="bi bi-upload"></i> Upload
        </button>
        <button type="button" class="btn btn-outline-secondary btn-sm me-2" title="Refresh Page" onclick="refreshPage()">
            <i class="bi bi-arrow-clockwise"></i> Refresh
        </button>
        <div class="dropdown">
          <button class="btn btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Advanced Filters">
            <i class="bi bi-gear"></i>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Clear Record</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>
    </div>
</div>



<!-- Nav Tab content sorted Function Setup -->
<div class="folder-tabs-container">
    <!-- Tab Navigation -->
    <ul class="nav nav-tabs border-0" id="packageSettingsTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active"  id="basic-tab"  data-bs-toggle="tab"  data-bs-target="#pane-basic"  type="button"  role="tab"  aria-controls="pane-basic"  aria-selected="true">Basic</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link"  id="standard-tab"  data-bs-toggle="tab"  data-bs-target="#pane-standard"  type="button"  role="tab"  aria-controls="pane-standard"  aria-selected="false">Standard</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link"  id="premium-tab"  data-bs-toggle="tab"  data-bs-target="#pane-premium"  type="button"  role="tab"  aria-controls="pane-premium"  aria-selected="false">Premium</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link"  id="vip-tab"  data-bs-toggle="tab"  data-bs-target="#pane-vip"  type="button"  role="tab"  aria-controls="pane-vip"  aria-selected="false"><i class="bi bi-gem"></i> VIP</button>
        </li>
    </ul>

    <!-- Folder Card Body -->
    <div class="card folder-card shadow-sm">
        <div class="card-body p-4">
            <div class="tab-content" id="packageSettingsContent">
                <!-- Basic Pane -->
                <div class="tab-pane fade show active" id="pane-basic" role="tabpanel" aria-labelledby="basic-tab"> <?php include 'basic_tier.php'; ?>
                </div>

                <!-- Standard Pane -->
                <div class="tab-pane fade" id="pane-standard" role="tabpanel" aria-labelledby="standard-tab"> <?php include 'standard_tier.php'; ?>
                </div>

                <!-- Premium Pane -->
                <div class="tab-pane fade" id="pane-premium" role="tabpanel" aria-labelledby="premium-tab"> <?php include 'premium_tier.php'; ?>
                </div>

                <!-- VIP Pane -->
                <div class="tab-pane fade" id="pane-vip" role="tabpanel" aria-labelledby="vip-tab"> <?php include 'vip_tier.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>








































