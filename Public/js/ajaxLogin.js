jQuery(function($) {
    $(document).ready(function () {
        $('#loginform').submit(function (e) {
            e.preventDefault();

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'ajaxLogin'; // 'the key/name of the attribute/field that is sent to the server
            input.value = '1';
            this.append(input);

            $.ajax({
                type: "POST",
                url: '/View/login.php',
                data: $(this).serialize(),
                success: function (data) {
                    data  =  JSON.parse(data);
                    if (data.status === 1) {
                        window.location.href = data.url;
                    }
                    else {
                        alert('Invalid Credentials');
                    }
                }
            });
        });
    });
});