$(document).ready(function () {
  $("#register").on("click", function () {
    var name = $("#name").val();
    var email = $("#email").val();
    var password = $("#pwd").val();
    var gender = $('input[type="radio"]:checked').val();
    var mobile = $("#mobile").val();
    var age = $("#age").val();
    var address = $("#address").val();
    var dob = $("#dob").val();

    if (name == '' || email == '' || password == '' || gender == '' || mobile == '' || age == '' || address == '' || dob == '') {
      $(".msg").html("All fields are required!");
    }
    else if ($("#gender:checked").length == 0) {
      $(".msg").html("Gender is required!");
    }
    else {
      $.ajax(
        {
          url: './php/register.php',
          method: 'post',
          data: { name: name, email: email, pwd: password },
          success: function (data) {
            $(".successmsg").html(data);

            $.ajax(
              {
                url: './php/actions.php',
                method: 'post',
                data: { name: name, email: email ,gender: gender, mobile: mobile, age: age, address: address, dob: dob },
                success: function (data) {
                  $(".successmsg").html(data);
                }
              }
            );


          }
        }
      );
    }
  });
});
