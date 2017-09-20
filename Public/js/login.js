$(document).ready(function() {
    $('#logform').submit(function(e) {
        e.preventDefault();
        $.ajax({

            type: "POST",
            url: '/Core/Response.php',
            data: $(this).serialize(),
            success: function(data)
            {
                data=JSON.parse(data);

                if (data.flag==="true") {
                  window.location = '/upload';
                }
                else {
                    console.log('Invalid Credentials');
                    var div = document.getElementById('warningLogin1');
                    div.innerHTML = 'Given credentials are not correct! Try again!';
                    div.style.display="block";
                }
            }
        });
    });
});
