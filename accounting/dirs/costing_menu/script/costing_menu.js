$(document).ready(function(){
    loadCosting();
});



/*Skeleton Fallback if system interupted or error loading page*/
function showSkeletonDashboard() {
    const template = document.getElementById("sekeleton-dashboard");
    $("#loadCosting_content").html(template.innerHTML);
}

function loadCosting() {
    showSkeletonDashboard();
    $.post("dirs/costing_menu/components/main.php", {}, function (data) {
        let result = $.trim(data);
        setTimeout(function () {
            if (!result) return;
            $("#loadCosting_content")
                .hide()
                .html(result)
                .fadeIn(500);
        }, 500);
    }).fail(function () {
        showSkeletonDashboard();
    });

}


/*Function load food form*/
function showSkeletonFood() {
    const template = document.getElementById("skeleton-food-form");
    $("#loadCosting_content").html(template.innerHTML);
}

function loadMenuSetup() {
    showSkeletonFood();
    $.post("dirs/costing_menu/components/msenu_main.php", {}, function (data) {
        let result = $.trim(data);
        setTimeout(function () {
            if (!result) return;
            $("#loadCosting_content")
                .hide()
                .html(result)
                .fadeIn(500);
        }, 500);
    }).fail(function () {
        showSkeletonFood();
    });

}


/*Function to show menucode*/
function loadMenuCode() {
    $.ajax({
        url: "dirs/costing_menu/actions/get_itemcode.php",
        type: "POST",
        dataType: "json",
        success: function (response) {
            if (response.isSuccess === "success") {
                $("#itemmenu_code")
                    .val(response.Data.NewItemCode)
                    .prop("readonly", true);
            } else {
                console.log(response.Data);
            }
        }
    });

}