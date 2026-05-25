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
function mdlPencilBook(){
    $.post("dirs/dashboard/actions/get_pencilcode.php",{
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#booking-number").val(response.Data.FormNumber);
            $("#mdl-pencilbook-form").modal('show');
            loadFunctionRooms();
            loadInclusion();
            loadSnacksAm();
            loadSnacksPM();
            loadLunch();
            loadDinner();
            loadBeverage();
        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
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
                                <input class="form-check-input border border-dark" name="inclusions" type="checkbox" value="${item.InclusionDescription}">
                                <label class="form-check-label small">
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
                                <input class="form-check-input border border-dark" type="checkbox" value="${snackam.LineNum}" name="amsnack-name">
                                <label class="form-check-label fw-bold text-dark small">
                                    ${snackam.DishName}
                                </label>
                            </div>
                            <select class="form-select form-select-sm w-auto" name="amsnack-serving">
                                <option value="Snack">Snack</option>
                                <option value="Plated">Plated</option>
                                <option value="Pica-Pica">Pica-Pica</option>
                                <option value="Packed Meal">Packed Meal</option>
                                <option value="Food Station">Food Station</option>
                                <option value="Bowl Service">Bowl Service</option>
                                <option value="Tray Service">Tray Service</option>
                                <option value="Family Style">Family Style</option>
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
                                <input class="form-check-input border border-dark" type="checkbox" value="${snackpm.LineNum}" name="pmsnack-name">
                                <label class="form-check-label fw-bold text-dark small">
                                    ${snackpm.DishName}
                                </label>
                            </div>
                            <select class="form-select form-select-sm w-auto" name="pmsnack-serving">
                                <option value="Snack">Snack</option>
                                <option value="Plated">Plated</option>
                                <option value="Pica-Pica">Pica-Pica</option>
                                <option value="Packed Meal">Packed Meal</option>
                                <option value="Food Station">Food Station</option>
                                <option value="Bowl Service">Bowl Service</option>
                                <option value="Tray Service">Tray Service</option>
                                <option value="Family Style">Family Style</option>
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
                                <input class="form-check-input border border-dark" type="checkbox" value="${lunch.LineNum}" name="lunch-name">
                                <label class="form-check-label fw-bold text-dark small">
                                    ${lunch.DishName}
                                </label>
                            </div>
                            <select class="form-select form-select-sm w-auto" name="lunch-serving">
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
                                <input class="form-check-input border border-dark" type="checkbox" value="${dinner.LineNum}" name="dinner-name">
                                <label class="form-check-label fw-bold text-dark small">
                                    ${dinner.DishName}
                                </label>
                            </div>
                            <select class="form-select form-select-sm w-auto" name="dinner-serving">
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

/*Function Display Main dishes Dinner*/
function loadBeverage() {
    $.post("dirs/dashboard/actions/get_beverages.php", {}, function (data) {
        let response = JSON.parse(data);
        if ($.trim(response.isSuccess) === "success") {
            let items = response.Data;
            let containerdinner = $("#beverage-list");
            containerdinner.html("");
            items.forEach((dinner, index) => {
                let id_dinner = "snack-" + index;
                let html = `
                    <div class="list-group-item px-3 py-2 border-0 border-bottom">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="form-check custom-check-success mb-0">
                                <input class="form-check-input border border-dark" type="checkbox" value="${dinner.LineNum}" name="beverage-name">
                                <label class="form-check-label fw-bold text-dark small">
                                    ${dinner.DishName}
                                </label>
                            </div>
                            <select class="form-select form-select-sm w-auto" name="serving-beverage">
                                <option value="Beverage">Beverage</option>
                                <option value="Beverage Tower">Beverage Tower</option>
                                <option value="Assisted Service">Assisted Service</option>
                                <option value="Full Service">Full Service</option>
                                <option value="Table Service">Table Service</option>
                                <option value="Station Service">Station Service</option>
                                <option value="Tray Service">Tray Service</option>
                                <option value="Counter Service">Counter Service</option>
                                <option value="Buffet Service">Buffet Service</option>
                                <option value="Semi-Assisted Buffet">Semi-Assisted Buffet</option>
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

/*Function Display siorted function hall and child rooms*/
function loadFunctionRooms() {
    $.post("dirs/dashboard/actions/get_functionrooms.php", {}, function(response) {
        if (response.isSuccess == "success") {
            let roomsData = response.Data;
            let html = '<div class="list-group shadow-sm border-0">';

            roomsData.forEach((mother, index) => {
                let groupId = `group-${index}`;
                
                // 1. MOTHER ROW (Section Header / Master Toggle)
                html += `
                <div class="list-group-item bg-light border-bottom py-3">
                    <div class="form-check">
                        <input class="form-check-input border-primary mother-sel" type="checkbox" value="${mother.mother_name}" data-group="${groupId}" id="parent-${index}" name="function-room">
                        <label class="form-check-label fw-bold text-dark mb-0" for="parent-${index}">
                            ${mother.mother_name} Function Room
                        </label>
                    </div>
                </div>`;

                mother.children.forEach((child) => {
                    html += `
                    <label class="list-group-item ps-5 py-3 list-group-item-action border-0 border-bottom child-row-${groupId}">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input border-dark child-sel ${groupId}" type="checkbox" value="${child.line_num}" id="room-${child.line_num}"   >
                                <div class="ms-2">
                                    <span class="fw-semibold d-block">${child.room_name}</span>
                                </div>
                            </div>
                        </div>
                    </label>`;
                });
            });

            html += '</div>';
            $("#accordion-functionrooms").html(html);

            // --- AUTO-DISABLE LOGIC ---

            $(".mother-sel").off("change").on("change", function() {
                let groupClass = $(this).data("group");
                let isMotherChecked = $(this).prop("checked");
                
                // Find all children belonging to this mother
                let $children = $(`.${groupClass}`);
                let $childRows = $(`.child-row-${groupClass}`);

                if (isMotherChecked) {
                    // 1. Check all children
                    // 2. Disable them so sales can't uncheck them individually
                    // 3. Add a visual "disabled" look to the row
                    $children.prop("checked", true).prop("disabled", true);
                    $childRows.addClass("bg-light text-muted").css("opacity", "0.7");
                } else {
                    // 1. Uncheck all children
                    // 2. Re-enable them
                    // 3. Restore visual appearance
                    $children.prop("checked", false).prop("disabled", false);
                    $childRows.removeClass("bg-light text-muted").css("opacity", "1");
                }
            });

        }
    }, "json");
}

var BookingStatus = "TENTATIVE";
$(document).on("click", ".save-booking", function (e) {
    e.preventDefault();
    BookingStatus = $(this).data("status");
    $("#frm-pencilbook").submit();

});

$("#frm-pencilbook").submit(function (event) {

    event.preventDefault();

    let $btnSubmit = $("#btn-submit-booking");
    let $spinner = $("#btn-spinner-booking");
    let $text = $(".btn-text-booking");

    $btnSubmit.prop("disabled", true);

    $spinner.removeClass("d-none");
    $text.text("Saving...");

    /* HEADER */
    var Tier = $("#package-tier").val();
    var Customer = $("#customer-fullname").val();
    var Company = $("#customer-company").val();
    var Position = $("#customer-jobposition").val();
    var Address = $("#customer-address").val();
    var Contact = $("#customer-contactnumber").val();
    var Email = $("#customer-emailaddress").val();
    var Messenger = $("#customer-messenger").val();

    var FunctionName = $("#event-name").val();

    var FuncStartDate = $("#event-date-start").val();
    var FuncEndDate = $("#event-date-end").val();

    var FuncStartTime = $("#event-time-start").val();
    var FuncEndTime = $("#event-time-end").val();

    var RatePax = $("#rate-per-pax").val();
    var BlockingFee = $("#blocking-fee").val();

    var GuaranteedPax = $("#guaranteed-pax").val();
    var ExpectedPax = $("#expected-pax").val();

    var FunctionType = $("#function-type").val();

    /* ROOMS */
    var FunctionRooms = [];

    $("input[name='function-room']:checked").each(function () {
        FunctionRooms.push($(this).val());
    });

    /* CHILD */
    var FunctionChild = [];

    $("input[name='function-child']:checked").each(function () {
        FunctionChild.push($(this).val());
    });

    /*Food*/
    var AMSnack = [];
    var servingType = $("select[name='amsnack-serving']").val();
    $("input[name='amsnack-name']:checked").each(function () {
        var foodName = $(this).val();
        AMSnack.push({
            FoodName: foodName,
            ServingType: servingType
        });
    });


    
    var PMSnack = [];
    var servingType = $("select[name='pmsnack-serving']").val();
    $("input[name='pmsnack-name']:checked").each(function () {
        var foodName = $(this).val();
        PMSnack.push({
            FoodName: foodName,
            ServingType: servingType
        });
    });



    var Lunch = [];
    var servingType = $("select[name='lunch-serving']").val();
    $("input[name='lunch-name']:checked").each(function () {
        var foodName = $(this).val();
        Lunch.push({
            FoodName: foodName,
            ServingType: servingType
        });
    });



    var Dinner = [];
    var servingType = $("select[name='dinner-serving']").val();
    $("input[name='dinner-name']:checked").each(function () {
        var foodName = $(this).val();
        Dinner.push({
            FoodName: foodName,
            ServingType: servingType
        });
    });



    var Beverage = [];
    var servingType = $("select[name='serving-beverage']").val();
    $("input[name='beverage-name']:checked").each(function () {
        var foodName = $(this).val();
        Beverage.push({
            FoodName: foodName,
            ServingType: servingType
        });
    });

    /* INCLUSIONS */
    var Inclusions = [];

    $("input[name='inclusions']:checked").each(function () {
        Inclusions.push($(this).val());
    });

    /* AJAX */
   $.post("dirs/dashboard/actions/save_pencilbooking.php", {

       BookingStatus: BookingStatus,

       Tier: Tier,
       Customer: Customer,
       Company: Company,
       Position: Position,
       Address: Address,
       Contact: Contact,
       Email: Email,
       Messenger: Messenger,

       FunctionName: FunctionName,

       FuncStartDate: FuncStartDate,
       FuncEndDate: FuncEndDate,

       FuncStartTime: FuncStartTime,
       FuncEndTime: FuncEndTime,

       RatePax: RatePax,
       BlockingFee: BlockingFee,

       GuaranteedPax: GuaranteedPax,
       ExpectedPax: ExpectedPax,

       FunctionType: FunctionType,

       FunctionRooms: FunctionRooms,
       FunctionChild: FunctionChild,

       AMSnack: AMSnack,
       PMSnack: PMSnack,
       Lunch: Lunch,
       Dinner: Dinner,
       Beverage: Beverage,

       Inclusions: Inclusions

   }, function (response) {

       $btnSubmit.prop("disabled", false);

       $spinner.addClass("d-none");
       $text.text("Save");

       /* PARSE JSON */
       let data = JSON.parse(response);

       if (data.data == "success") {

           $("#frm-pencilbook")[0].reset();

           $("#mdl-pencilbook-foods").modal('hide');

           loadDashboard();
           clearValidation();

           Swal.fire({
               toast: true,
               position: "top-end",
               icon: "success",
               title: "Booking saved",
               showConfirmButton: false,
               timer: 2000,
               timerProgressBar: true
           });

       } else {

           Swal.fire({
               icon: "error",
               title: "Oops!",
               text: data.message
           });

       }

   });

});

function clearValidation() {
    $("#frm-pencilbook")
        .find(".is-valid, .is-invalid")
        .removeClass("is-valid is-invalid");
    $(".mother-sel").removeClass("is-invalid");
    $(".child-sel").removeClass("is-invalid");
}




/*Booking Form 2*/

function mdlForm2() {
    $("#mdl-form-2").modal('show');
}