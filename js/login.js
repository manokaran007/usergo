$(document).ready(function () {

    $("#SIGNINFORM").submit(function (e) {
        e.preventDefault();
        var form = $("#SIGNINFORM").serialize();
        $.ajax(
            {
                url: './php/login.php',
                method: 'post',
                data: form,
                success: function (res) {
                    const data = JSON.parse(res)
                    localStorage.setItem('userEmail', data?.email);
                    $("#SIGNINFORM")[0].reset();
                    window.location.href = `http://${window.location.hostname}/usergo/profile.html`
                }
            }
        );
    });
});
