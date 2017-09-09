<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';

Session::startSession();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!isset($_SESSION['username'])){

    Redirect::redirectUrl('login.php');
}

$vw=new View();
$vw->getView('upload');

if(isset($_POST['submit'])){

    UploadController::UploadFile();
}

