<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 12:23 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
$dirs=array(
    '/Vaulty/Controller/',
    '/Vaulty/Core/',
    '/Vaulty/',
);

foreach ($dirs as $dir){
    echo $dir;
}

