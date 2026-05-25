$(document).ready(function () {
  $("#togglePassword").on("click", function () {
    const input = $("#Password");
    const type = input.attr("type") === "password" ? "text" : "password";
    input.attr("type", type);
    $(this).toggleClass("bi-eye bi-eye-slash");
  });

  if (getCookie("Username") && getCookie("Password")) {
    $("#Username").val(getCookie("Username"));
    $("#Password").val(getCookie("Password"));
    $("#save-login").prop("checked", true);
  }

  $("#save-login").on("change", function () {
    if (this.checked) {
      setCookie("Username", $("#Username").val(), 7);
      setCookie("Password", $("#Password").val(), 7);
    } else {
      deleteCookie("Username");
      deleteCookie("Password");
    }
  });

  $("#frm_login_admin").on("submit", function (event) {
    event.preventDefault();

    var $frm = $(this);
    var Username = $frm.find("input[name='Username']").val().trim();
    var Password = $frm.find("input[name='Password']").val().trim();

    $.post("../actions/login_admin.php", { 
      Username: Username, 
      Password: Password 
    }, function (data) {
      var response = JSON.parse(data);

      if (response.response === "OK") {
        $frm[0].reset();
        if ($("#save-login").is(":checked")) {
          setCookie("Username", Username, 7);
          setCookie("Password", Password, 7);
        }

        var role = response.role;
        if (role === 'Admin') {
          window.location.assign("index.php");
        } else {
          window.location.assign("login.php");
        }

      } else {
        console.log("Login failed: " + response.message);
        $("#Username").addClass("input-error");
        $("#Username").addClass("is-invalid");
        $("#Password").addClass("input-error");
        $("#Password").addClass("is-invalid");
        $("#login-error").removeClass("d-none");
      }
    });
  });
});


var username = $("#session-user").val(); 
function setCookie(name, value, days) {
  let expires = "";
  if (days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + encodeURIComponent(value) + expires + "; path=/";
}

function getCookie(name) {
  const nameEQ = name + "=";
  const cookies = document.cookie.split(';');
  for (let i = 0; i < cookies.length; i++) {
    let c = cookies[i].trim();
    if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length));
  }
  return null;
}

$(document).ready(function () {
  const userTheme = $("#theme-pref").val();
  const userKey = "theme_" + username; // 👈 unique per user
  const savedTheme = getCookie(userKey) || userTheme || "light";

  if (savedTheme === "dark") {
    $("body").addClass("dark-mode");
    $("#theme-mode").prop("checked", true);
  } else {
    $("body").removeClass("dark-mode");
    $("#theme-mode").prop("checked", false);
  }

  $("#theme-mode").on("change", function () {
    const newTheme = $(this).is(":checked") ? "dark" : "light";
    $("body").toggleClass("dark-mode", newTheme === "dark");
    setCookie(userKey, newTheme, 7);
  });
});

