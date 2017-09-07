<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/14/17
 * Time: 9:21 AM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

/*if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}*/

include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';

Redirect::redirectUrl('/View/login.php');