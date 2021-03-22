$(document).ready(function(){
    $()
});


document.querySelector('#filterbycourse').addEventListener('click', function (e) {
    e.preventDefault();
    // $('#birth_month option[value="data.month"]').prop('selected', true);
    var course = document.getElementById('#filterbycourse');
    let send_url = "";
    console.log(course);

    $.ajax({
        type: "POST",
        url: send_url,
        data: send_data,
        success: function (response) {
            $('.messages').css('display', 'block');
            $('.messages').html(response);

            setTimeout(function () {
                $('.messages').hide('slow');
            }, 2000);

            document.getElementById('ajax').reset();
            getStudents();

        }
    })
})