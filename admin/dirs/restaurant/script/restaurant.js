$(document).ready(function(){
    loadRestaurant();
});


function loadRestaurant() {
    $.post("dirs/restaurant/components/main.php", {
    }, function (data){
        $("#restaurant_content").html(data);
    });
}
