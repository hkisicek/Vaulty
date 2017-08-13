<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 2:28 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';

$vw=new View();
$vw->getView('upload');

if(isset($_POST['submit'])){

    UploadController::UploadFile();

}