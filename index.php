<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/14/17
 * Time: 9:21 AM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';

Redirect::redirectUrl('/Vaulty/View/login.php');