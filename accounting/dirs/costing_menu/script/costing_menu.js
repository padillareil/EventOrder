$(document).ready(function(){
    loadCosting();
});


function loadCosting() {
    $.post("dirs/costing_menu/components/main.php", {
    }, function (data){
        $("#loadCosting_content").html(data);
        loadMenuCode();
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