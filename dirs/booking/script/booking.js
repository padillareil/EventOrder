$(document).ready(function(){
    loadBooking();
});


function loadBooking() {
    $.post("dirs/booking/components/main.php", {
    }, function (data){
        $("#loadBooking_content").html(data);
    });
}


/*Function show modal create user account*/
/*function mdladdAccount() {
    $("#mdl-add-account").modal('show');
}   
*/


function loadBookingDetails() {
    $.post("dirs/booking/components/booking_details.php", {
    }, function (data){
        $("#loadBooking_content").html(data); 
    });
}



/*Function show booking form*/

function mdlBookForm(selectedDate) {
    $.post("dirs/booking/form/bookingform.php", { 
        target_date: selectedDate 
    }, function (data) {
        $("#main-content").html(data);
        if (selectedDate) {
            $("#start_date").val(selectedDate);
            $("#end_date").val(selectedDate);
        }
    });
}

/*Function to return home display*/
function loadHome() {
    $.post("dirs/booking/booking.php", {
    }, function (data){
        $("#main-content").html(data);
    });
}





function openReviewBooking(docId){
            redirectEditForm();
    $.post("dirs/booking/actions/get_reviewbooking.php",{
        docId : docId
    },function(data){
        response = JSON.parse(data);
        if(jQuery.trim(response.isSuccess) == "success"){
            $("#event_title_edit").val(response.Data.EventTitle);
            $("#start_date_edit").val(response.Data.EventStartDate);
            $("#end_date_edit").val(response.Data.EventEndDate);
            $("#engager_category_edit").val(response.Data.GuestType);
            $("#guest-name_edit").val(response.Data.GuestName);
            $("#job_position_edit").val(response.Data.JobPosition);
            $("#guest_company_edit").val(response.Data.GuestCompany);
            $("#guest_address_edit").val(response.Data.Address);
            $("#mobile-number_edit").val(response.Data.MobileNumber);
            $("#guest_email_edit").val(response.Data.Customer_Email);
            $("#booking-id").val(response.Data.Booked_Hotel);
            $("#other_info_edit").val(response.Data.OtherInfo);
            $("#booking-id").val(response.Data.DocId);


            if (response.Data.DocStatus == 2) { 
                $("#list-booking").addClass('d-none');
            } else {
                $("#list-booking").removeClass('d-none');
                $("#list-confirmed").addClass('d-none');
            }
        }else{
            console.log(jQuery.trim(response.Data));
        }
    });
}


function redirectEditForm() {
    $.post("dirs/booking/form/edit_booking.php", {
    }, function (data){
        $("#loadBooking_content").html(data);
    });
}



function loadBookingList() {
    $.post("dirs/booking/components/booking_lists.php", {
    }, function (data){
        $("#loadBooking_content").html(data);
        loadEvents();
    });
}

/*Function modal payment*/
function modalPayment() {
    var modal = document.getElementById('mdl-confirmation-booking');
    var modal = new bootstrap.Modal(modal);
    modal.show();
}

/*Function form 2 of pencil booking*/
function mdlBookForm2() {
    $.post("dirs/booking/form2/main.php", {
    }, function (data){
        $("#main-content").html(data); 
    });
}
