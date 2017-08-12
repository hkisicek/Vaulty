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

    public function startSession(){

        if(false===self::$started){
            session_start();
            self::$started=true;
        }
    }

    public function show(){

    }

    public function destroySession(){

        if(self::$started==true){
            session_destroy();
        }

    }

}