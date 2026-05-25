<div class="container my-5">
	
    <!-- Main Card Wrapper -->
    <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
    	<div class="card-header">
    		<div class="d-flex mb-4 align-items-center gap-3">
    		    <button type="button" class="btn btn-light btn-sm rounded-circle p-2 d-inline-flex align-items-center justify-content-center border shadow-sm" style="width: 36px; height: 36px;" title="Go back" onclick="loadMetrics()">
    		        <i class="bi bi-arrow-left text-secondary fs-5"></i>
    		    </button>
    		    <div>
    		        <h5 class="fw-bold text-dark mb-1">Device Specifications</h5>
    		        <p class="text-muted small mb-0">Live diagnostic hardware metrics and system resource monitoring details.</p>
    		    </div>
    		</div>
    	</div>
        <div class="card-body p-4 p-md-5 bg-light-subtle">
                    <div class="row g-4">
                        
                        <!-- Left Side: Hardware & Network Specifications Info -->
                        <div class="col-12 col-md-6 border-end-md">
                            <!-- Hardware Section -->
                            <h6 class="fw-bold text-dark mb-3">Host Environment Details</h6>
                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <span class="text-secondary small d-block mb-0">Processor</span>
                                    <span class="fw-semibold text-dark small">Intel Xeon E-2324G @ 3.10GHz</span>
                                </div>
                                <div class="col-6">
                                    <span class="text-secondary small d-block mb-0">Installed Memory (RAM)</span>
                                    <span class="fw-semibold text-dark small">32.00 GB DDR4 ECC</span>
                                </div>
                                <div class="col-6">
                                    <span class="text-secondary small d-block mb-0">Operating System</span>
                                    <span class="fw-semibold text-dark small">Ubuntu Server 24.04 LTS</span>
                                </div>
                                <div class="col-6">
                                    <span class="text-secondary small d-block mb-0">System Type</span>
                                    <span class="fw-semibold text-dark small">64-bit OS, x64-based CPU</span>
                                </div>
                            </div>

                            <!-- Network Section (Newly Added) -->
                            <h6 class="fw-bold text-dark mb-3 pt-2 border-top">Network Configuration</h6>
                            <div class="row g-3">
                                <div class="col-6">
                                    <span class="text-secondary small d-block mb-0">IPv4 Address</span>
                                    <span class="fw-semibold text-dark small d-flex align-items-center gap-1.5">
                                        192.168.1.105 
                                        <span class="badge bg-light text-secondary border rounded-2 font-monospace fs-8 px-1.5 py-0.5">LAN</span>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <span class="text-secondary small d-block mb-0">Public IP</span>
                                    <span class="fw-semibold text-dark small">172.56.21.89</span>
                                </div>
                                <div class="col-6">
                                    <span class="text-secondary small d-block mb-0">Subnet Mask</span>
                                    <span class="fw-semibold text-dark small font-monospace text-secondary">255.255.255.0</span>
                                </div>
                                <div class="col-6">
                                    <span class="text-secondary small d-block mb-0">Gateway</span>
                                    <span class="fw-semibold text-dark small font-monospace text-secondary">192.168.1.1</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side: Real-time CPU Usage Performance Progress Bar -->
                        <div class="col-12 col-md-6 ps-md-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-bold text-dark mb-0">
                                    <i class="bi bi-cpu text-secondary me-2"></i>CPU Utilization
                                </h6>
                                <span class="fw-bold text-success fs-5" id="cpu-percentage-label">42<span class="fs-6 fw-normal text-muted ms-0.5">%</span></span>
                            </div>

                            <!-- Modern Progress Container -->
                            <div class="progress rounded-pill bg-light border shadow-sm mb-3" style="height: 16px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success rounded-pill" 
                                     role="progressbar" 
                                     style="width: 42%;" 
                                     aria-valuenow="42" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100"
                                     id="cpu-progress-bar">
                                </div>
                            </div>

                            <!-- Secondary Performance Info -->
                            <div class="d-flex align-items-center justify-content-between text-muted fs-7">
                                <span>Core Threads: 8 Active</span>
                                <span>Clock Speed: ~3.42 GHz</span>
                            </div>
                        </div>

                    </div>
                </div>

    </div>
</div>