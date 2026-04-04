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
var guestForms = {
  Regular: `
    <div class="mb-2">
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> First Name</label>
        <input type="text" name="guest-firstname" class="form-control form-control-sm guest-firstname" autocomplete="off">
      </div>
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Middle Name</label>
        <input type="text" name="guest-middlename" class="form-control form-control-sm guest-middlename" autocomplete="off">
      </div>
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Last Name</label>
        <input type="text" name="guest-lastname" class="form-control form-control-sm guest-lastname" autocomplete="off">
      </div>
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Suffix</label>
        <input list="suffix-list" name="guest-suffix" class="form-control form-control-sm guest-suffix" autocomplete="off">
        <datalist id="suffix-list">
          <option value="Jr.">
          <option value="Sr.">
          <option value="II">
          <option value="III">
          <option value="IV">
          <option value="V">
          <option value="N/A">
        </datalist>
      </div>
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Contact Person</label>
        <input type="text" name="guest-contactperson" class="form-control form-control-sm guest-contactperson" autocomplete="off">
      </div>
    </div>
  `,

  VIP: `
    <div class="mb-2">
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> First Name</label>
        <input type="text" name="guest-firstname" class="form-control form-control-sm guest-firstname" autocomplete="off">
      </div>
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Last Name</label>
        <input type="text" name="guest-lastname" class="form-control form-control-sm guest-lastname" autocomplete="off">
      </div>
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Company Name</label>
        <input type="text" name="vip-company" class="form-control form-control-sm vip-company" autocomplete="off">
      </div>
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Contact Person</label>
        <input type="text" name="guest-contactperson" class="form-control form-control-sm guest-contactperson">
      </div>
    </div>
  `,

  Corporate: `
    <div class="mb-2">
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Company Name</label>
        <input type="text" name="guest-company" class="form-control form-control-sm guest-company" autocomplete="off">
      </div>
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Contact Person</label>
        <input type="text" name="guest-contactperson" class="form-control form-control-sm guest-contactperson" autocomplete="off">
      </div>
    </div>
  `,

  Government: `
    <div class="mb-2">
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Department/Agency</label>
        <input type="text" name="guest-department" class="form-control form-control-sm guest-department" autocomplete="off">
      </div>
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> TIN</label>
        <input type="text" name="guest-tinumber" class="form-control form-control-sm guest-tinumber" autocomplete="off">
      </div>
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Contact Person</label>
        <input type="text" name="guest-contactperson" class="form-control form-control-sm guest-contactperson" autocomplete="off">
      </div>
      <div class="mb-2">
        <label class="form-label small"><span class="text-success"><i class="bi bi-check2"></i></span> Position</label>
        <input type="text" name="guest-contactperson-position" class="form-control form-control-sm guest-contactperson-position" autocomplete="off">
      </div>
    </div>
  `
};