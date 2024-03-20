$(document).ready(function () {

  $("#SIGNUPFORM").submit(function (e) {
    e.preventDefault();
    var form = $("#SIGNUPFORM").serialize();
    $.ajax(
      {
        url: './php/register.php',
        method: 'post',
        data: form,
        success: function (res) {
          alert(res)
          if (res == 'Registration successfull!') {
            value(form)
          }
        }
      }
    );
  });
});

function value(form) {
  $.ajax(
    {
      url: './php/actions.php',
      method: 'post',
      data: form,
      success: function (res) {
        $("#SIGNUPFORM")[0].reset();
        window.location.href = `http://${window.location.hostname}/usergo/login.html`
      }

    }
  );
}