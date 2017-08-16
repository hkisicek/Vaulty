<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:25 AM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Class Session
 */
class Session
{
    protected static $_started = false;
    /**
     * Function for starting session
     */
    public static function startSession()
    {
        if (false === self::$_started) {
            session_start();
            self::$_started = true;
        }
    }
    /**
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        return $_SESSION[$key];
    }
    /**
     * @param $key
     * @param $value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    /**
     * Var dump on session
     */
    public static function display()
    {
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
    }
    /**
     * Function for destoying session
     */
    public static function destroy()
    {
        if (self::$_started == true) {
            $_SESSION = array();

            setcookie(session_name(), "", time() - 42000, "/");

            session_destroy();
        }
    }
    /**
     * @param $type
     * @param $message
     */
    public static function flash($type, $message)
    {
        self::set('flashClass', $type);
        self::set('flashMessage', $message);
    }
    /**
     * Function for unsetting session
     */
    public static function destroyFlash()
    {
        unset($_SESSION['flashClass']);
        unset($_SESSION['flashMessage']);
    }

}
