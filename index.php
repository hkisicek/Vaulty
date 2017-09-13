<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/14/17
 * Time: 9:21 AM
 */



include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';

$router=new Router();
$router->add('/','LoginController#index');
$router->add('/home','LoginController#index');
$router->add('/home/register','LoginController#register');
$router->add('/upload','UploadController#index');
$router->add('/upload/submit','UploadController#uploadFile');
$router->add('/download','DownloadController#index');
$router->add('/download/submit','DownloadController#download');
$router->add('/logout','LogoutController#logout');

$router->dispatch();
error_reporting(E_ALL);
ini_set('display_errors', 1);