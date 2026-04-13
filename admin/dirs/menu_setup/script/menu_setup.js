$(document).ready(function(){
    loadFoodMenusSetup();
});


function loadFoodMenusSetup() {
    $.post("dirs/menu_setup/components/main.php", {
    }, function (data){
        $("#load_FoodMenus").html(data);
    });
}
