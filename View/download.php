<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';

Session::startSession();

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



