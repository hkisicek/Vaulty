validno1 = /^[a-zA-Z0-9_-]{3,15}$/;
validno2 = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
validno3 = /^([a-zA-Z0-9@*#]{5,15})$/;
validno4 = /^([0-9]{6,12})$/;

var flag=false;

$("#register").prop("disabled",true);

$("#usernameR").focusout(function (event) {
    var ime = $("#usernameR").val();
    if (!validno1.test(ime)) {
        $("#usernameR").css("box-shadow", "0 0 2px #E9437F");
        $("#usernameR").focus();
        $("#usernameL").html("<i class=\"glyphicon glyphicon-ban-circle\" style=\"color:darkred\"></i>Invalid username!");
        $("#usernameL").css("color", "#555");
        flag1=false;
    } else {
        $("#usernameR").css("box-shadow", "0 0 2px #40B7AE");
        $("#usernameL").css("color", "#555");
        $("#usernameL").html("<i class=\"glyphicon glyphicon-user\"></i>Username");
        flag1=true;
    }
});

$("#emailR").focusout(function (event) {
    var email = $("#emailR").val();
    if (!validno2.test(email)) {
        $("#emailR").css("box-shadow", "0 0 2px #E9437F");
        $("#emailR").focus();
        $("#emailL").html("<i class=\"glyphicon glyphicon-ban-circle\" style=\"color:darkred\"></i>Invalid email! ");
        $("#emailL").css("color", "#555");
        flag=false;
    } else {
        $("#emailR").css("box-shadow", "0 0 2px #40B7AE");
        $("#emailL").css("color", "#555");
        $("#emailL").html("<i class=\"glyphicon glyphicon-user\"></i>Email");
        flag=true;
    }
});

$("#passwordR").focusout(function (event) {
    var lozinka = $("#passwordR").val();
    if (!validno3.test(lozinka)) {
        $("#passwordR").css("box-shadow", "0 0 2px #E9437F");
        $("#passwordR").focus();
        $("#passwordL").html("<i class=\"glyphicon glyphicon-ban-circle\" style=\"color:darkred\"></i>Invalid password! ");
        $("#passwordL").css("color", "#555");
        flag=false;
    } else {
        $("#passwordR").css("box-shadow", "0 0 2px #40B7AE");
        $("#passwordL").css("color", "#555");
        $("#passwordL").html("<i class=\"glyphicon glyphicon-lock\"></i>Password");
        flag=true;
    }
});

$("#passwordRP").focusout(function (event) {
    var lozinka = $("#passwordR").val();
    var ponovljena = $("#passwordRP").val();
    if (lozinka != ponovljena || ponovljena=="") {
        $("#passwordRP").css("box-shadow", "0 0 2px #E9437F");
        $("#passwordRP").focus();
        $("#passwordRL").html("<i class=\"glyphicon glyphicon-ban-circle\" style=\"color:darkred\"></i>No match!");
        $("#passwordRL").css("color", "#555");
        flag=false;
    } else {
        $("#passwordRP").css("box-shadow", "0 0 2px #40B7AE");
        $("#passwordRL").css("color", "#555");
        $("#passwordRL").html("<i class=\"glyphicon glyphicon-lock\"></i>Repeat password");
        flag=true;
    }
});


