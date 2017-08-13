<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:25 AM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Session
{
    protected static $started=false;

    public static function startSession(){

        if(self::$started === false){

            session_start();
            self::$started=true;
        }
    }

    public static function get(){

        return $_SESSION['key'];
    }

    public static function set($key,$value){

        $_SESSION[$key]=$value;
    }

    public static function destroySession(){

        if(self::$started==true){
            session_destroy();
        }

    }

}
