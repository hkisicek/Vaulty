<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';

Session::startSession();

Session::destroy();

Redirect::redirectUrl('login.php');

?>
