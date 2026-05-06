<form id="frm-pencilbook">
    <div class="modal fade" id="mdl-pencilbook-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">Pencil Booking</h5>
                        <p class="text-muted small mb-0">Fill in the event details to reserve a slot.</p>
                    </div>
                    <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                            <div class="col-md-3">
                                <label class="form-label small fw-bold text-muted">Booking No.</label>
                                <input type="text" class="form-control" id="booking-number" readonly value="02132131313">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold text-muted">Package Code.</label>
                                <input type="text" class="form-control" id="package-code" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold text-muted">Type of Booking</label>
                                <select class="form-select" name="hotel-event">
                                    <option value="Tentative">Tentative</option>
                                    <option value="Confirmed">Confirmed</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small fw-bold text-muted">Package Tier</label>
                                <select class="form-select" name="package-tier">
                                    <option value="Basic">Basic</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                        <!-- Customer complete information -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold text-muted">Person in Charge</label>
                            <input type="text" class="form-control" id="customer-fullname" autocomplete="off" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold text-muted">Company</label>
                            <input type="text" class="form-control" id="customer-company" autocomplete="off" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold text-muted">Job Position (Optional)</label>
                            <input type="text" class="form-control" id="customer-jobposition" autocomplete="off">
                        </div>  
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold text-muted">Address</label>
                            <input type="text" class="form-control" id="customer-address" autocomplete="off" required>
                        </div> 
                        <div class="col-md-4 mb-2">
                            <label class="form-label small fw-bold text-muted">Mobile Number</label>
                            <input type="text" class="form-control" id="customer-contactnumber" autocomplete="off" required>
                        </div>  
                        <div class="col-md-4 mb-2">
                            <label class="form-label small fw-bold text-muted">Email</label>
                            <input type="email" class="form-control" id="customer-emailaddress" autocomplete="off" required>
                        </div>    
                        <div class="col-md-4 mb-2">
                            <label class="form-label small fw-bold text-muted">Messenger</label>
                            <input type="text" class="form-control" id="customer-messenger" autocomplete="off">
                        </div>

                        <!-- Customer Function information -->
                        <div class="col-md-12 mb-2">
                            <label class="form-label small fw-bold text-muted">Name of Function</label>
                            <textarea class="form-control" id="event-name" required autocomplete="off" style="height: 10vh;"></textarea>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold text-muted">Date of Function</label>
                            <div class="d-flex gap-2">
                                <input type="date" class="form-control" id="event-date-start" required>
                                <input type="date" class="form-control" id="event-date-end" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label small fw-bold text-muted">Time of Function</label>
                            <div class="d-flex gap-2">
                                <input type="time" class="form-control" id="evet-time-start" required>
                                <input type="time" class="form-control" id="event-time-end" required>
                            </div>
                        </div>

                        <!-- <div class="col-md-4 mb-2">
                            <label class="form-label small fw-bold text-muted">Hotel</label>
                            <input type="text" class="form-control" id="event-hotel" autocomplete="off" required value="Grand Xing">
                        </div> --> 
                        <div class="col-md-3 mb-2">
                            <label class="form-label small fw-bold text-muted">Rate per Pax</label>
                            <input type="text" class="form-control" id="rate-per-pax" autocomplete="off" required>
                        </div> 
                        <div class="col-md-3 mb-2">
                            <label class="form-label small fw-bold text-muted">Blocking Fee</label>
                            <input type="text" class="form-control" id="blocking-fee" autocomplete="off" required>
                        </div> 
                        <div class="col-md-3 mb-2">
                            <label class="form-label small fw-bold text-muted">Guaranteed Pax</label>
                            <input type="number" class="form-control" id="guaranteed-pax" autocomplete="off" required>
                        </div> 
                        <div class="col-md-3 mb-2">
                            <label class="form-label small fw-bold text-muted">Expected Pax</label>
                            <input type="number" class="form-control" id="expected-pax" autocomplete="off" required>
                        </div> 

                        <div class="accordion" id="accordionExample">
                          <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Pearl
                              </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                               <div class="list-group list-group-flush">
                                   <label class="list-group-item px-4 py-3 selection-row">
                                       <div class="form-check custom-check-success mb-0">
                                           <input class="form-check-input border-dark border me-3" type="checkbox" id="wired-mic">
                                           <span class="fw-semibold text-dark">Pear 1-A</span>
                                       </div>
                                   </label>
                                   <label class="list-group-item px-4 py-3 selection-row">
                                       <div class="form-check custom-check-success mb-0">
                                           <input class="form-check-input border-dark border me-3" type="checkbox" id="wired-mic">
                                           <span class="fw-semibold text-dark">Pear 2-A</span>
                                       </div>
                                   </label>
                                   <label class="list-group-item px-4 py-3 selection-row">
                                       <div class="form-check custom-check-success mb-0">
                                           <input class="form-check-input border-dark border me-3" type="checkbox" id="podium-mic">
                                           <span class="fw-semibold text-dark">Pear 3-A</span>
                                       </div>
                                   </label>
                                   <label class="list-group-item px-4 py-3 selection-row">
                                       <div class="form-check custom-check-success mb-0">
                                           <input class="form-check-input border-dark border me-3" type="checkbox" id="podium-mic">
                                           <span class="fw-semibold text-dark">Pear 4-A</span>
                                       </div>
                                   </label>
                                   <label class="list-group-item px-4 py-3 selection-row">
                                       <div class="form-check custom-check-success mb-0">
                                           <input class="form-check-input border-dark border me-3" type="checkbox" id="podium-mic">
                                           <span class="fw-semibold text-dark">Pear 1-B</span>
                                       </div>
                                   </label>
                                   
                               </div>
                              </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Jade
                              </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                              </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Ruby
                              </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <strong>This is the third item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="accordion mt-2" id="setupand_arrangement">
                          <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#setup-arrangement" aria-expanded="true" aria-controls="setup-arrangement">
                                Setup & Arrangement
                              </button>
                            </h2>
                            <div id="setup-arrangement" class="accordion-collapse collapse" data-bs-parent="#setupand_arrangement">
                              <div class="accordion-body">
                               <div class="list-group list-group-flush">
                                   <label class="list-group-item px-4 py-3 selection-row">
                                       <div class="form-check custom-check-success mb-0">
                                           <input class="form-check-input border-dark border me-3" type="checkbox" id="wired-mic">
                                           <span class="fw-semibold text-dark">Advance Banquet Setup</span>
                                       </div>
                                   </label>
                                   <label class="list-group-item px-4 py-3 selection-row">
                                       <div class="form-check custom-check-success mb-0">
                                           <input class="form-check-input border-dark border me-3" type="checkbox" id="wired-mic">
                                           <span class="fw-semibold text-dark">Long table</span>
                                       </div>
                                   </label>
                                   <label class="list-group-item px-4 py-3 selection-row">
                                       <div class="form-check custom-check-success mb-0">
                                           <input class="form-check-input border-dark border me-3" type="checkbox" id="podium-mic">
                                           <span class="fw-semibold text-dark">1 Podium</span>
                                       </div>
                                   </label>
                                   <label class="list-group-item px-4 py-3 selection-row">
                                       <div class="form-check custom-check-success mb-0">
                                           <input class="form-check-input border-dark border me-3" type="checkbox" id="podium-mic">
                                           <span class="fw-semibold text-dark">LCD Projector</span>
                                       </div>
                                   </label>
                                   <label class="list-group-item px-4 py-3 selection-row">
                                       <div class="form-check custom-check-success mb-0">
                                           <input class="form-check-input border-dark border me-3" type="checkbox" id="podium-mic">
                                           <span class="fw-semibold text-dark">1 Microphone with stand</span>
                                       </div>
                                   </label>
                                   
                               </div>
                              </div>
                            </div>
                          </div>
                        </div>
                       



                    </div>
                </div>
                <div class="modal-footer bg-light border-0 py-3">
                    <button class="btn btn-dark px-4 shadow-lg" type="button" data-bs-target="#mdl-pencilbook-foods" data-bs-toggle="modal">Next</button>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Booking Food Setup -->
    <div class="modal fade" id="mdl-pencilbook-foods" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header border-0 pb-0 pt-4 px-4 d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark">Food Setup and Arrangement</h5>
                        <p class="text-muted small mb-0">Fill in the event details to reserve a slot.</p>
                    </div>
                </div>
                <div class="modal-body p-4 bg-light">
                    <div class="row g-4">
                        <!-- AM SNACK SECTION -->
                        <div class="col-md-6">
                            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">
                                <div class="card-header bg-white border-0 pt-3 px-3">
                                    <h6 class="fw-bold text-dark mb-0 text-uppercase small tracking-wider">AM Snacks</h6>
                                    <input type="search" id="search-am-snack" class="form-control mt-2" placeholder="Search...">
                                </div>
                                
                                <div class="card-body p-0">
                                    <div class="list-group list-group-flush" id="amsnacks-list">
                                       
                                    </div>
                                    <div class="px-3 py-3">
                                        <button type="button" class="btn btn-light btn-sm w-100 text-success fw-bold border-dashed" onclick="addCustomAMSnack('amsnacks-list')">
                                            <i class="bi bi-plus-lg me-1"></i> Add Custom
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">
                                <div class="card-header bg-white border-0 pt-3 px-3">
                                    <h6 class="fw-bold text-dark mb-0 text-uppercase small tracking-wider">PM Snacks</h6>
                                    <input type="search" id="search-pm-snack" class="form-control mt-2" placeholder="Search...">
                                </div>
                                
                                <div class="card-body p-0">
                                    <div class="list-group list-group-flush" id="pmsnacks-list">
                                    </div>
                                    <div class="px-3 py-3">
                                        <button type="button" class="btn btn-light btn-sm w-100 text-success fw-bold border-dashed py-2" 
                                                onclick="addCustomPMSnack('pmsnacks-list')">
                                            <i class="bi bi-plus-lg me-1"></i> Add Custom
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">
                                <div class="card-header bg-white border-0 pt-3 px-3">
                                    <h6 class="fw-bold text-dark mb-0 text-uppercase small tracking-wider">Lunch</h6>
                                    <input type="search" id="search-lunch" class="form-control mt-2" placeholder="Search...">
                                </div>
                                
                                <div class="card-body p-0">
                                    <div class="list-group list-group-flush" id="lunch-list">
                                    </div>

                                    <!-- Add Button -->
                                    <div class="px-3 py-3">
                                        <button type="button" class="btn btn-light btn-sm w-100 text-success fw-bold border-dashed py-2" 
                                                onclick="addCustomlunch('lunch-list')">
                                            <i class="bi bi-plus-lg me-1"></i> Add Custom
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <div class="col-md-6">
                            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">
                                <div class="card-header bg-white border-0 pt-3 px-3">
                                    <h6 class="fw-bold text-dark mb-0 text-uppercase small tracking-wider">Dinner</h6>
                                    <input type="search" id="search-dinner" class="form-control mt-2" placeholder="Search...">
                                </div>
                                
                                <div class="card-body p-0">
                                    <div class="list-group list-group-flush" id="dinner-list">
                                    </div>
                                    <div class="px-3 py-3">
                                        <button type="button" class="btn btn-light btn-sm w-100 text-success fw-bold border-dashed py-2" 
                                                onclick="addCustomDinner('dinner-list')">
                                            <i class="bi bi-plus-lg me-1"></i> Add Custom
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <div class="col-md-12">
                            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">
                                <div class="card-header bg-white border-0 pt-3 px-3">
                                    <h6 class="fw-bold text-dark mb-0 text-uppercase small tracking-wider">Event Inclusion</h6>
                                </div>
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="list-group list-group-flush" id="inclusion-col-1"></div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="list-group list-group-flush" id="inclusion-col-2"></div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="list-group list-group-flush" id="inclusion-col-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label class="form-label small fw-bold text-muted">Special Instruction</label>
                            <textarea class="form-control" id="special-instruction" required autocomplete="off" style="height: 10vh;"></textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer bg-light border-0 py-3">
                    

                    <button class="btn btn-dark px-4 shadow-lg" data-bs-target="#mdl-pencilbook-form" data-bs-toggle="modal">Back</button>
                    <button class="btn btn-success px-4 shadow-lg" type="submit">Save Booking</button>
                </div>
            </div>
        </div>
    </div>




   
</form>



<script>
    function addCustomAMSnack(listId) {
        const container = document.getElementById(listId);
        const template = document.getElementById('custom-menu-am');
        const clone = template.content.cloneNode(true);
        container.appendChild(clone);
        const newItem = container.lastElementChild;
        const input = newItem.querySelector('input[type="text"]');
        if (input) {
            input.focus();
            input.addEventListener('keypress', (e) => { if(e.key === 'Enter') addCustomAMSnack(listId); });
        }
    }
</script>

<!-- AM Snacks Template -->
<template id="custom-menu-am">
    <div class="list-group-item px-3 py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center flex-grow-1 me-3">
                <div class="form-check custom-check-success mb-0">
                    <input class="form-check-input" type="checkbox" checked>
                </div>
                <input type="text" class="form-control border-0 bg-transparent p-0 ms-2" placeholder="Enter food name..." >
            </div>
            <div class="d-flex align-items-center">
                <select class="form-select form-select-sm w-auto" name="serving-type">
                    <option value="Snack">Snack</option>
                    <option value="Plated">Plated</option>
                    <option value="Pica-Pica">Pica-Pica</option>
                </select>
                <button type="button" class="btn btn-link text-danger p-0 ms-1" onclick="this.closest('.list-group-item').remove()">
                    <i class="bi bi-trash3"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    function addCustomPMSnack(listId) {
        const container = document.getElementById(listId);
        const template = document.getElementById('custom-menu-pm');
        const clone = template.content.cloneNode(true);
        container.appendChild(clone);
        const newItem = container.lastElementChild;
        const input = newItem.querySelector('input[type="text"]');
        if (input) {
            input.focus();
            input.addEventListener('keypress', (e) => { if(e.key === 'Enter') addCustomPMSnack(listId); });
        }
    }
</script>

<!-- AM Snacks Template -->
<template id="custom-menu-pm">
    <div class="list-group-item px-3 py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center flex-grow-1 me-3">
                <div class="form-check custom-check-success mb-0">
                    <input class="form-check-input" type="checkbox" checked>
                </div>
                <input type="text" class="form-control border-0 bg-transparent p-0 ms-2" placeholder="Enter food name..." >
            </div>
            <div class="d-flex align-items-center">
                <select class="form-select form-select-sm w-auto" name="serving-type">
                    <option value="Snack">Snack</option>
                    <option value="Plated">Plated</option>
                    <option value="Pica-Pica">Pica-Pica</option>
                </select>
                <button type="button" class="btn btn-link text-danger p-0 ms-1" onclick="this.closest('.list-group-item').remove()">
                    <i class="bi bi-trash3"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    function addCustomlunch(listId) {
        const container = document.getElementById(listId);
        const template = document.getElementById('custom-menu-lunch');
        const clone = template.content.cloneNode(true);
        container.appendChild(clone);
        const newItem = container.lastElementChild;
        const input = newItem.querySelector('input[type="text"]');
        if (input) {
            input.focus();
            input.addEventListener('keypress', (e) => { if(e.key === 'Enter') addCustomPMSnack(listId); });
        }
    }
</script>

<!-- Lunch Template -->
<template id="custom-menu-lunch">
    <div class="list-group-item px-3 py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center flex-grow-1 me-3">
                <div class="form-check custom-check-success mb-0">
                    <input class="form-check-input" type="checkbox" checked>
                </div>
                <input type="text" class="form-control border-0 bg-transparent p-0 ms-2" placeholder="Enter food name..." >
            </div>
            <div class="d-flex align-items-center">
                <select class="form-select form-select-sm w-auto" name="serving-type">
                    <option value="Lunch">Lunch</option>
                    <option value="Packed-Lunch">Packed-Lunch</option>
                    <option value="Plated Lunch">Plated Lunch</option>
                    <option value="Buffet">Buffet</option>
                    <option value="Assisted Buffet">Assisted Buffet</option>
                </select>
                <button type="button" class="btn btn-link text-danger p-0 ms-1" onclick="this.closest('.list-group-item').remove()">
                    <i class="bi bi-trash3"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    function addCustomDinner(listId) {
        const container = document.getElementById(listId);
        const template = document.getElementById('custom-menu-dinner');
        const clone = template.content.cloneNode(true);
        
        container.appendChild(clone);
        const newItem = container.lastElementChild;
        const input = newItem.querySelector('input[type="text"]');
        if (input) {
            input.focus();
            input.addEventListener('keypress', (e) => { if(e.key === 'Enter') addCustomPMSnack(listId); });
        }
    }
</script>

<!-- Dinner Template -->
<template id="custom-menu-dinner">
    <div class="list-group-item px-3 py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center flex-grow-1 me-3">
                <div class="form-check custom-check-success mb-0">
                    <input class="form-check-input" type="checkbox" checked>
                </div>
                <input type="text" class="form-control border-0 bg-transparent p-0 ms-2" placeholder="Enter food name..." >
            </div>
            <div class="d-flex align-items-center">
                <select class="form-select form-select-sm w-auto" name="serving-type">
                    <option value="Dinner">Dinner</option>
                    <option value="Packed-Dinner">Packed-Dinner</option>
                    <option value="Plated Dinner">Plated Dinner</option>
                    <option value="Buffet">Buffet</option>
                    <option value="Assisted Buffet">Assisted Buffet</option>
                    <option value="Pre-Dinner Cocktail">Pre-Dinner Cocktail</option>
                </select>
                <button type="button" class="btn btn-link text-danger p-0 ms-1" onclick="this.closest('.list-group-item').remove()">
                    <i class="bi bi-trash3"></i>
                </button>
            </div>
        </div>
    </div>
</template>