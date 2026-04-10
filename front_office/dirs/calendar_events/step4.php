<div class="overscroll-auto px-2" style="height: 60vh; overflow-y: auto;">
    <div class="row g-4">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center">
                    <h6 class="fw-bold mb-0 text-uppercase">Food & Menus Setup</h6>
                </div>
            </div>
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                    <h6 class="fw-bold mb-0 text-uppercase small tracking-wider">AM Snacks</h6>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush" id="amsnacks-list">
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox">
                                <span class="fw-semibold text-dark">Sandwich</span>
                            </div>
                        </label>
                    </div>
                    <div class="px-4 py-2 border-top bg-white">
                        <button type="button" class="btn btn-sm text-success fw-bold p-0" onclick="addCustomItem('amsnacks-list')">
                            <i class="bi bi-plus-circle-fill me-1"></i> Add Snack Option
                        </button>
                    </div>
                    <div class="p-3 bg-light-subtle border-top">
                        <textarea class="form-control form-control-sm border-primary shadow-none" rows="2" placeholder="Dietary restrictions or specific snack requests..."></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                <h6 class="fw-bold mb-0 text-uppercase small tracking-wider">PM Snacks</h6>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush" id="pmsnacks-list">
                    <label class="list-group-item px-4 py-3 selection-row">
                        <div class="form-check custom-check-success mb-0">
                            <input class="form-check-input me-3" type="checkbox">
                            <span class="fw-semibold text-dark">Sandwich</span>
                        </div>
                    </label>
                </div>
                <div class="px-4 py-2 border-top bg-white">
                    <button type="button" class="btn btn-sm text-success fw-bold p-0" onclick="addCustomItem('pmsnacks-list')">
                        <i class="bi bi-plus-circle-fill me-1"></i> Add Snack Option
                    </button>
                </div>
                <div class="p-3 bg-light-subtle border-top">
                    <textarea class="form-control form-control-sm border-primary shadow-none" rows="2" placeholder="Dietary restrictions or specific snack requests..."></textarea>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                    <h6 class="fw-bold mb-0 text-uppercase small tracking-wider">Dinner</h6>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush" id="dinner-list">
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox">
                                <span class="fw-semibold text-dark">Plated Service</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox">
                                <span class="fw-semibold text-dark">Buffet Style</span>
                            </div>
                        </label>
                    </div>
                    <div class="px-4 py-2 border-top bg-white">
                        <button type="button" class="btn btn-sm text-success fw-bold p-0" onclick="addCustomItem('dinner-list')">
                            <i class="bi bi-plus-circle-fill me-1"></i> Add Dinner Option
                        </button>
                    </div>
                    <div class="p-3 bg-light-subtle border-top">
                        <textarea class="form-control form-control-sm border-primary shadow-none" rows="2" placeholder="Dinner specific notes..."></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                    <h6 class="fw-bold mb-0 text-uppercase small tracking-wider">Main Course</h6>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush" id="maincourse-list">
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox">
                                <span class="fw-semibold text-dark">Beef / Pork</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox">
                                <span class="fw-semibold text-dark">Chicken / Poultry</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox">
                                <span class="fw-semibold text-dark">Seafood / Fish</span>
                            </div>
                        </label>
                    </div>
                    <div class="px-4 py-2 border-top bg-white">
                        <button type="button" class="btn btn-sm text-success fw-bold p-0" onclick="addCustomItem('maincourse-list')">
                            <i class="bi bi-plus-circle-fill me-1"></i> Add Dish
                        </button>
                    </div>
                    <div class="p-3 bg-light-subtle border-top">
                        <textarea class="form-control form-control-sm border-primary shadow-none" rows="2" placeholder="List specific dishes here..."></textarea>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                    <h6 class="fw-bold mb-0 text-uppercase small tracking-wider">Beverages</h6>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush" id="beverage-list">
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox">
                                <span class="fw-semibold text-dark">Lemon Juice</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox">
                                <span class="fw-semibold text-dark">Watermelon Juice</span>
                            </div>
                        </label>
                        <label class="list-group-item px-4 py-3 selection-row">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input me-3" type="checkbox">
                                <span class="fw-semibold text-dark">San Mig Light (1 case 330 mL)</span>
                            </div>
                        </label>
                    </div>
                    <div class="px-4 py-2 border-top bg-white">
                        <button type="button" class="btn btn-sm text-success fw-bold p-0" onclick="addCustomItem('beverage-list')">
                            <i class="bi bi-plus-circle-fill me-1"></i> Add Beverage
                        </button>
                    </div>
                    <div class="p-3 bg-light-subtle border-top">
                        <textarea class="form-control form-control-sm border-primary shadow-none" rows="2" placeholder="List specific beverage here..."></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-white border-0 pt-4 px-4 pb-2">
                    <h6 class="fw-bold mb-0 text-uppercase small tracking-wider">Add-ons</h6>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush" id="addons-list">
                    </div>
                    <div class="px-4 py-2 border-top bg-white">
                        <button type="button" class="btn btn-sm text-success fw-bold p-0" onclick="addCustomItem('addons-list')">
                            <i class="bi bi-plus-circle-fill me-1"></i> Add Add-ons
                        </button>
                    </div>
                    <div class="p-3 bg-light-subtle border-top">
                        <textarea class="form-control form-control-sm border-primary shadow-none" rows="2" placeholder="List specific add-ons here..."></textarea>
                    </div>
                </div>
            </div>
        </div>
        

        </div>
</div>

<template id="custom-item-template">
    <div class="list-group-item px-4 py-2 selection-row d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center flex-grow-1">
            <div class="form-check custom-check-success mb-0">
                <input class="form-check-input me-3" type="checkbox" checked>
            </div>
            <input type="text" class="form-control form-control-sm border-primary bg-transparent fw-semibold p-0 text-success" placeholder="Type custom requirement...">
        </div>
        <button type="button" class="btn btn-link text-danger p-0 ms-2" onclick="this.closest('.list-group-item').remove()">
            <i class="bi bi-trash3"></i>
        </button>
    </div>
</template>

<script>
    function addCustomItem(listId) {
        const container = document.getElementById(listId);
        const template = document.getElementById('custom-item-template');
        const clone = template.content.cloneNode(true);
        
        container.appendChild(clone);
        
        // Focus the new input
        const newItem = container.lastElementChild;
        const input = newItem.querySelector('input[type="text"]');
        if (input) {
            input.focus();
            // Optional: Add Enter key support
            input.addEventListener('keypress', (e) => { if(e.key === 'Enter') addCustomItem(listId); });
        }
    }
</script>