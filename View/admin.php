<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/14/17
 * Time: 12:57 PM
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';
if(session_status()===PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["role"])){

}

$vw=new View();
$vw->getView('admin');

