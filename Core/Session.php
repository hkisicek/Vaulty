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
    protected static $_started = false;

    public static function startSession()
    {
        if (false === self::$_started) {
            session_start();
            self::$_started = true;
        }
    }

    public static function get($key)
    {
        return $_SESSION[$key];
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function display()
    {
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
    }

    public static function destroy()
    {
        if (self::$_started == true) {
            $_SESSION = array();

            setcookie(session_name(), "", time() - 42000, "/");

            session_destroy();
        }
    }

    public static function flash($type, $message)
    {
        self::set('flashClass', $type);
        self::set('flashMessage', $message);
    }

    public static function destroyFlash()
    {
        unset($_SESSION['flashClass']);
        unset($_SESSION['flashMessage']);
    }

}
