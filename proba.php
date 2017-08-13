<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 12:23 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';
$a='123456';
$b='$2y$10$RbYJwLeQySo7WG6/hK2hwe4OtHP2xtqup.W1cOwYUr4RFZ.Nxv48u';
if(password_verify('123456','$2y$10$RbYJwLeQySo7WG6/hK2hwe4OtHP2xtqup.W1cOwYUr4RFZ.Nxv48u')){
    echo "banana";
}else{
    echo "nomatch";
}

$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

if(Hash::verifyHash('rasmuslerdorf', $hash)){
    echo "hhsahsh";
}