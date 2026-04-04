$(document).ready(function(){
    load_Dashboard();
});


function load_Dashboard() {
    $.post("dirs/dashboard/components/main.php", {
    }, function (data){
        $("#load_Home_dashboard").html(data);
    });
}

/*Form field Change base on guest category*/
/* Updated Form field templates with Modern UI */
var guestForms = {
    Regular: `
        <div class="animate__animated animate__fadeIn animate__faster">
            <div class="mb-3">
                <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">First Name</label>
                <input type="text" name="guest-firstname" class="form-control form-control-sm border-light-subtle shadow-sm-focus" placeholder="Enter first name" autocomplete="off">
            </div>
            <div class="row g-2 mb-3">
                <div class="col-8">
                    <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">Middle Name</label>
                    <input type="text" name="guest-middlename" class="form-control form-control-sm border-light-subtle shadow-sm-focus" placeholder="Optional" autocomplete="off">
                </div>
                <div class="col-4">
                    <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">Suffix</label>
                    <input list="suffix-list" name="guest-suffix" class="form-control form-control-sm border-light-subtle shadow-sm-focus" placeholder="N/A">
                    <datalist id="suffix-list">
                        <option value="Jr."><option value="Sr."><option value="II"><option value="III"><option value="IV"><option value="V"><option value="N/A">
                    </datalist>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">Last Name</label>
                <input type="text" name="guest-lastname" class="form-control form-control-sm border-light-subtle shadow-sm-focus" placeholder="Enter last name" autocomplete="off">
            </div>
            <div class="mb-2">
                <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">Contact Person</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white border-light-subtle text-muted"><i class="bi bi-person-badge"></i></span>
                    <input type="text" name="guest-contactperson" class="form-control border-light-subtle shadow-sm-focus" placeholder="Primary Contact">
                </div>
            </div>
        </div>
    `,

    VIP: `
        <div class="animate__animated animate__fadeIn animate__faster">
            <div class="row g-2 mb-3">
                <div class="col-6">
                    <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">First Name</label>
                    <input type="text" name="guest-firstname" class="form-control form-control-sm border-light-subtle shadow-sm-focus" autocomplete="off">
                </div>
                <div class="col-6">
                    <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">Last Name</label>
                    <input type="text" name="guest-lastname" class="form-control form-control-sm border-light-subtle shadow-sm-focus" autocomplete="off">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label x-small fw-bold text-primary text-uppercase mb-1"><i class="bi bi-building me-1"></i> Company Name</label>
                <input type="text" name="vip-company" class="form-control form-control-sm border-primary-subtle shadow-sm-focus" placeholder="VIP Organization" autocomplete="off">
            </div>
            <div class="mb-2">
                <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">Assigned Contact Person</label>
                <input type="text" name="guest-contactperson" class="form-control form-control-sm border-light-subtle shadow-sm-focus">
            </div>
        </div>
    `,

    Corporate: `
        <div class="animate__animated animate__fadeIn animate__faster">
            <div class="mb-3">
                <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">Corporate Name</label>
                <input type="text" name="guest-company" class="form-control form-control-sm border-light-subtle shadow-sm-focus" placeholder="e.g. Acme Corp" autocomplete="off">
            </div>
            <div class="mb-2">
                <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">Authorized Representative</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white border-light-subtle text-muted"><i class="bi bi-person-check"></i></span>
                    <input type="text" name="guest-contactperson" class="form-control border-light-subtle shadow-sm-focus" autocomplete="off">
                </div>
            </div>
        </div>
    `,

    Government: `
        <div class="animate__animated animate__fadeIn animate__faster">
            <div class="mb-3">
                <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">Department / Agency</label>
                <input type="text" name="guest-department" class="form-control form-control-sm border-light-subtle shadow-sm-focus" placeholder="e.g. Department of Energy" autocomplete="off">
            </div>
            <div class="row g-2 mb-3">
                <div class="col-12">
                    <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">Contact Person</label>
                    <input type="text" name="guest-contactperson" class="form-control form-control-sm border-light-subtle shadow-sm-focus" autocomplete="off">
                </div>
                <div class="col-12">
                    <label class="form-label x-small fw-bold text-muted text-uppercase mb-1">Official Position</label>
                    <input type="text" name="guest-contactperson-position" class="form-control form-control-sm border-light-subtle shadow-sm-focus" placeholder="e.g. Director IV" autocomplete="off">
                </div>
            </div>
        </div>
    `
};