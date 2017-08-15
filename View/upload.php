<?php
if(session_status()===PHP_SESSION_NONE) {
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';

$vw=new View();
$vw->getView('upload');

if(isset($_POST['submit'])){

    UploadController::UploadFile();


}

