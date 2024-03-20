var email = localStorage.getItem('userEmail')
if (email) {
    $(document).ready(function () {

        $.ajax({
            type: 'POST',
            url: './php/profile.php',
            data: { email: email },
            success: function (data) {
                var _data = JSON.parse(data)
                console.log(_data)

                var userData = '';
                userData += '<tr>';
                userData += '<td>' + _data.name + '</td>';
                userData += '<td>' + _data.email + '</td>';
                userData += '<td>' + _data.gender + '</td>';
                userData += '<td>' + _data.dob + '</td>';
                userData += '<td>' + _data.age + '</td>';
                userData += '<td>' + _data.mobile + '</td>';
                userData += '<td>' + _data.address + '</td>';
                userData += '</tr>';
                $('#userData tbody').html(userData);
            }
        });
    });
} else {
    location.href = './login.html'
}

