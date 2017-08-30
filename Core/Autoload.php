<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:24 AM
 */

function __autoload($class)
{
    $dirs = array(
        '/Controller/',
        '/Core/',
        '/',
    );

    foreach ($dirs as $dir) {

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $dir . $class . '.php')) {
            require_once $_SERVER['DOCUMENT_ROOT'] . $dir . $class . '.php';
        }
    }
}