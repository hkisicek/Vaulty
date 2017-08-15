<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';

if(isset($_GET["file"])){

    $file=$_GET["file"];
    DownloadController::countDownloads($file);
    DownloadController::forceDownload($file);

}

$vw=new View();
$vw->getView('download');



