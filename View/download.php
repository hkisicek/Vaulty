<?php
if(session_status()===PHP_SESSION_NONE) {
    session_start();
}

include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';

if(!isset($_SESSION['username'])){

    Redirect::redirectUrl('login.php');
}

if(isset($_GET["file"])){

    $file=$_GET["file"];
    DownloadController::countDownloads($file);
    DownloadController::forceDownload($file);
}

$vw=new View();
$vw->getView('download');



