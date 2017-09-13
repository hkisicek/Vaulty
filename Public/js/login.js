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
                }
            }
        });
    });
});
