<?php
if(session_status()===PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';

if(isset($_SESSION["role"]) && $_SESSION["role"]==2){

   // Redirect::redirectUrl('upload.php');
}else{
    Redirect::redirectUrl('login.php');
}

$vw=new View();
$vw->getView('admin');

