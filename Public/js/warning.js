function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};

var result=getUrlParameter('problem');
var div = document.getElementById('warningLogin1');
var divv = document.getElementById('warningLogin2');

$("#warningLogin1").hide();
$("#warningLogin2").hide();

if(result=="u1"){
    $("#warningLogin2").hide();
    div.innerHTML = 'Sorry! This file already exists! :(';
    $("#warningLogin1").show();
}else if(result=="u2"){
    $("#warningLogin2").hide();
    div.innerHTML = 'Your file is to big! :(';
    $("#warningLogin1").show();
}else if(result=="u3"){
    $("#warningLogin2").hide();
    div.innerHTML = 'Something went wrong! :(';
    $("#warningLogin1").show();
}else if(result=="u4"){
    $("#warningLogin2").hide();
    div.innerHTML = 'Cannot upload your file! :(';
    $("#warningLogin1").show();
}else if(result=="u5"){
    $("#warningLogin1").hide();
    divv.innerHTML = 'File uploaded successfully!';
    $("#warningLogin2").show();
}