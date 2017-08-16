<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';
session_start();
session_unset();
Redirect::redirectUrl('login.php');

?>
