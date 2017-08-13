<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:25 AM
 */

class Session
{
    protected static $started=false;

    public static function startSession(){

        if(false===self::$started){
            session_start();
            self::$started=true;
        }
    }

    public static function get(){

        return $_SESSION['key'];
    }

    public static function set($key,$value){

        $_SESSION['key']=$value;
    }

    public static function destroySession(){

        if(self::$started==true){
            session_destroy();
        }

    }

}