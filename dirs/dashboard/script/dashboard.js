$(document).ready(function(){
    loadDashboard();
});

function loadDashboard() {
    $.post("dirs/dashboard/components/main.php", {
    }, function (data){
        $("#load_Dashboard").html(data);
    });
}


/*Function show modal pencil booking form*/
function mdlPencilBook() {
    $("#mdl-pencilbook-form").modal('show');
    loadInclusion();
    loadSnacksAm();
    loadSnacksPM();
    loadLunch();
    loadDinner();
}


// Function Display Inclusions
function loadInclusion() {
    $.post("dirs/dashboard/actions/get_inclusions.php", {}, function (data) {
        let response = JSON.parse(data);
        if ($.trim(response.isSuccess) === "success") {
            let items = response.Data;
            $("#inclusion-col-1, #inclusion-col-2, #inclusion-col-3").html("");
            let perCol = Math.ceil(items.length / 3);
            items.forEach((item, index) => {
                let colIndex = Math.floor(index / perCol) + 1;
                let container = $("#inclusion-col-" + colIndex);
                let LineNum = "inc-" + index;
                let html = `
                    <div class="list-group-item px-3 py-2 border-0 border-bottom">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input border border-dark" type="checkbox" 
                                    id="${LineNum}" 
                                    value="${item.InclusionDescription}">
                                <label class="form-check-label small" for="${LineNum}">
                                    ${item.InclusionDescription}
                                </label>
                            </div>
                        </div>
                    </div>
                `;
                container.append(html);
            });
        } else {
            console.log($.trim(response.Data));
        }
    });
}

/*Function Display all snacks*/
function loadSnacksAm() {
    $.post("dirs/dashboard/actions/get_snacks.php", {}, function (data) {
        let response = JSON.parse(data);
        if ($.trim(response.isSuccess) === "success") {
            let itemsam = response.Data;
            let containeram = $("#amsnacks-list");
            containeram.html("");
            itemsam.forEach((snackam, index) => {
                let idsnackam = "snack-" + index;
                let html = `
                    <div class="list-group-item px-3 py-2 border-0 border-bottom">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input border border-dark" type="checkbox" value="${snackam.DishName}">
                                <label class="form-check-label fw-bold text-dark small">
                                    ${snackam.DishName}
                                </label>
                            </div>
                            <select class="form-select form-select-sm w-auto">
                                <option value="Plated">Plated</option>
                                <option value="Pica-Pica">Pica-Pica</option>
                                <option value="Buffet">Buffet</option>
                            </select>
                        </div>
                    </div>
                `;
                containeram.append(html);
            });
        } else {
            console.log($.trim(response.Data));
        }

    });
}
/*Function Display PM Snacks*/
function loadSnacksPM() {
    $.post("dirs/dashboard/actions/get_snacks.php", {}, function (data) {
        let response = JSON.parse(data);
        if ($.trim(response.isSuccess) === "success") {
            let itemspm = response.Data;
            let containerpm = $("#pmsnacks-list");
            containerpm.html("");
            itemspm.forEach((snackpm, index) => {
                let idsnackpm = "snack-" + index;
                let html = `
                    <div class="list-group-item px-3 py-2 border-0 border-bottom">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input border border-dark" type="checkbox" value="${snackpm.DishName}">
                                <label class="form-check-label fw-bold text-dark small">
                                    ${snackpm.DishName}
                                </label>
                            </div>
                            <select class="form-select form-select-sm w-auto">
                                <option value="Plated">Plated</option>
                                <option value="Pica-Pica">Pica-Pica</option>
                                <option value="Buffet">Buffet</option>
                            </select>
                        </div>
                    </div>
                `;
                containerpm.append(html);
            });
        } else {
            console.log($.trim(response.Data));
        }

    });
}

/*Function Display Main dishes lunch*/
function loadLunch() {
    $.post("dirs/dashboard/actions/get_maindish.php", {}, function (data) {
        let response = JSON.parse(data);
        if ($.trim(response.isSuccess) === "success") {
            let items = response.Data;
            let containerlunch = $("#lunch-list");
            containerlunch.html("");
            items.forEach((lunch, index) => {
                let id_lunch = "snack-" + index;
                let html = `
                    <div class="list-group-item px-3 py-2 border-0 border-bottom">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input border border-dark" type="checkbox" value="${lunch.DishName}">
                                <label class="form-check-label fw-bold text-dark small">
                                    ${lunch.DishName}
                                </label>
                            </div>
                            <select class="form-select form-select-sm w-auto">
                                <option value="Lunch">Lunch</option>
                                <option value="Packed-Lunch">Packed-Lunch</option>
                                <option value="Plated Lunch">Plated Lunch</option>
                                <option value="Buffet">Buffet</option>
                                <option value="Assisted Buffet">Assisted Buffet</option>
                            </select>
                        </div>
                    </div>
                `;
                containerlunch.append(html);
            });
        } else {
            console.log($.trim(response.Data));
        }
    });
}

/*Function Display Main dishes Dinner*/
function loadDinner() {
    $.post("dirs/dashboard/actions/get_maindish.php", {}, function (data) {
        let response = JSON.parse(data);
        if ($.trim(response.isSuccess) === "success") {
            let items = response.Data;
            let containerdinner = $("#dinner-list");
            containerdinner.html("");
            items.forEach((dinner, index) => {
                let id_dinner = "snack-" + index;
                let html = `
                    <div class="list-group-item px-3 py-2 border-0 border-bottom">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input border border-dark" type="checkbox" value="${dinner.DishName}">
                                <label class="form-check-label fw-bold text-dark small">
                                    ${dinner.DishName}
                                </label>
                            </div>
                            <select class="form-select form-select-sm w-auto">
                                <option value="Dinner">Dinner</option>
                                <option value="Packed-Dinner">Packed-Dinner</option>
                                <option value="Plated Dinner">Plated Dinner</option>
                                <option value="Buffet">Buffet</option>
                                <option value="Assisted Buffet">Assisted Buffet</option>
                                <option value="Pre-Dinner Cocktail">Pre-Dinner Cocktail</option>
                            </select>
                        </div>
                    </div>
                `;
                containerdinner.append(html);
            });
        } else {
            console.log($.trim(response.Data));
        }
    });
}